<?php

defined( 'ABSPATH' ) or die( 'Keep Silent' );

if ( ! class_exists( 'Woo_2Checkout_Gateway_API' ) ):

	class Woo_2Checkout_Gateway_API {

		const POST = 'POST';
		const GET = 'GET';
		const PUT = 'PUT';
		const DELETE = 'DELETE';

		protected $merchant_code;

		protected $secret_key;

		public function __construct( $merchant_code, $secret_key ) {
			$this->merchant_code = $merchant_code;
			$this->secret_key    = $secret_key;
		}

		// https://knowledgecenter.2checkout.com/Documentation/07Commerce/2Checkout-ConvertPlus/ConvertPlus_Buy-Links_Signature
		public function convertplus_buy_link( $data, $merchant_code, $buy_link_secret_word, $expiration = false ) {

			$data = array( 'merchant' => $merchant_code ) + $data;

			if ( $expiration ) {
				$data['expiration'] = absint( time() + DAY_IN_SECONDS ); // 1 day; 24 hours; 60 mins; 60 secs
			}

			$data['signature'] = $this->convertplus_buy_link_signature( $data, $buy_link_secret_word );

			return 'https://secure.2checkout.com/checkout/buy/?' . http_build_query( $data );
		}

		// https://knowledgecenter.2checkout.com/Documentation/07Commerce/2Checkout-ConvertPlus/ConvertPlus_Buy-Links_Signature
		public function convertplus_buy_link_signature( $params, $buy_link_secret_word ) {

			$signature_params = array(
				'return-url',
				'return-type',
				'expiration',
				'order-ext-ref',
				'item-ext-ref',
				'customer-ref',
				'customer-ext-ref',
				'currency',
				'prod',
				'price',
				'qty',
				'tangible',
				'type',
				'opt',
				'description',
				'recurrence',
				'duration',
				'renewal-price'
			);

			$filtered_params = array_filter( $params, function ( $key ) use ( $signature_params ) {
				return in_array( $key, $signature_params );
			}, ARRAY_FILTER_USE_KEY );

			$serialize_string = $this->convertplus_serialize( $filtered_params );

			return hash_hmac( 'sha256', $serialize_string, $buy_link_secret_word );
		}

		public function convertplus_serialize( $params ) {

			ksort( $params );

			$map_data = array_map( function ( $value ) {
				return strlen( stripslashes( $value ) ) . stripslashes( $value );
			}, $params );

			return implode( '', $map_data );
		}

		// https://knowledgecenter.2checkout.com/API-Integration/Webhooks/06Instant_Payment_Notification_(IPN)/Calculate-the-IPN-HASH-signature
		public function is_valid_ipn_lcn_hash( $post_data ) {

			$ipn_hash = $post_data["HASH"];

			$generate_string = '';
			array_walk_recursive( $post_data, function ( $value, $key ) use ( &$generate_string ) {
				if ( $key !== 'HASH' ) {
					$generate_string .= strlen( stripslashes( $value ) ) . stripslashes( $value );
				}
			} );

			$server_hash = hash_hmac( 'md5', $generate_string, $this->secret_key );

			return $server_hash === $ipn_hash;
		}

		// https://knowledgecenter.2checkout.com/API-Integration/Webhooks/06Instant_Payment_Notification_(IPN)/Read-receipt-response-for-2Checkout
		public function ipn_receipt_response( $post_data ) {
			// <EPAYMENT>DATE|HASH</EPAYMENT>

			if ( ! isset( $post_data["IPN_PID"] ) || ! isset( $post_data["IPN_PNAME"] ) ) {
				return false;
			}

			$receipt_date = date( 'YmdGis' );

			$ipn_receipt = array(
				$post_data["IPN_PID"][0],
				$post_data["IPN_PNAME"][0],
				$post_data["IPN_DATE"],
				$receipt_date
			);

			$receipt_return = implode( '', array_map( function ( $value ) {
				return strlen( stripslashes( $value ) ) . stripslashes( $value );
			}, $ipn_receipt ) );

			$receipt_hash = hash_hmac( 'md5', $receipt_return, $this->secret_key );

			if ( $this->is_valid_ipn_lcn_hash( $post_data ) ) {
				return "<EPAYMENT>{$receipt_date}|{$receipt_hash}</EPAYMENT>";
			} else {
				return false;
			}
		}

		// https://knowledgecenter.2checkout.com/Documentation/07Commerce/2Checkout-ConvertPlus/Signature_validation_for_return_URL_via_ConvertPlus
		// https://knowledgecenter.2checkout.com/Documentation/07Commerce/InLine-Checkout-Guide/Signature_validation_for_return_URL_via_InLine_checkout

		public function generate_return_signature( $params, $buy_link_secret_word ) {

			if ( empty( $params ) || ! isset( $params['signature'] ) || empty( $params['signature'] ) ) {
				return false;
			}

			// Remove signature key from params list.
			unset( $params['signature'], $params['wc-api'] );
			$serialize_string = $this->convertplus_serialize( $params );

			return hash_hmac( 'sha256', $serialize_string, $buy_link_secret_word );
		}

		public function is_valid_return_signature( $params, $buy_link_secret_word ) {

			if ( empty( $params ) || ! isset( $params['signature'] ) || empty( $params['signature'] ) ) {
				return false;
			}

			$return_signature = sanitize_text_field( $params['signature'] );

			// Remove signature key from params list.
			unset( $params['signature'], $params['wc-api'] );
			$serialize_string    = $this->convertplus_serialize( $params );
			$generated_signature = hash_hmac( 'sha256', $serialize_string, $buy_link_secret_word );

			return $generated_signature === $return_signature;
		}
	}
endif;
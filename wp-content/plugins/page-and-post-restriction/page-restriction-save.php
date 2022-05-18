<?php
require( 'page-restriction-class-customer.php' );
require_once('page-and-post-restriction.php');
include_once 'page-restriction-utility.php';

function papr_save_setting(){

    if( papr_check_option_admin_referer("papr_restrict_pages_roles_login") ){
        unset($_POST['_wpnonce']);
        unset($_POST['_wp_http_referer']);
        unset($_POST['option']);
        
        $allowed_roles = get_option('papr_allowed_roles_for_pages')!='' ? get_option('papr_allowed_roles_for_pages') : array();
	    $restrictedpages = get_option('papr_restricted_pages')!='' ? get_option('papr_restricted_pages') : array();
        $allowed_redirect_pages = get_option('papr_allowed_redirect_for_pages')!='' ? get_option('papr_allowed_redirect_for_pages') : array();
	    $default_role_parent = get_option('papr_default_role_parent')!='' ? get_option('papr_default_role_parent') : array();
        $default_role_toggle = get_option('papr_default_role_parent_page_toggle')!='' ? get_option('papr_default_role_parent_page_toggle') : "";
        $default_login_toggle = get_option('papr_access_for_only_loggedin')!='' ? get_option('papr_access_for_only_loggedin') : "";
        $unrestricted_pages = get_option('papr_login_unrestricted_pages') ? get_option( 'papr_login_unrestricted_pages' ) : array();
    	
        $pages=array();
		foreach($_POST as $key=>$value) {
			$pageid = (int) filter_var($key,FILTER_SANITIZE_NUMBER_INT);  
			if(!in_array($pageid,$pages)){
		 		array_push($pages,$pageid);
		 	}
        }

        for($i=0;$i<sizeof($pages);$i++) {

            $pageid = $pages[$i];

            $roles = 'mo_page_roles_' . $pageid;
            $login = 'mo_page_login_' . $pageid;
            $default = 'mo_page_default_role_'.$pageid;

            if(array_key_exists($roles, $_POST)) {
                if($pageid==0){
                    $allowed_roles['mo_page_0'] = stripslashes(sanitize_text_field($_POST[$roles]));
                } else {
                $allowed_roles[$pageid] = stripslashes(sanitize_text_field($_POST[$roles]));
                }
            }

            if(array_key_exists($roles, $_POST)) {
                if($_POST[$roles] != ''){
                    if(!in_array($pageid,$restrictedpages)){                    
                        array_push($restrictedpages, $pageid);
                    }
                } else {
                    unset($restrictedpages[$pageid]);
                }
            }

            if(array_key_exists($login, $_POST)) {
                if($_POST[$login]==1 || $_POST[$login]=='on' || $_POST[$login]=='true'){
                    $allowed_redirect_pages[$pageid]=true;
                    unset($unrestricted_pages[$pageid]);
                }
            }
            else if ( $default_login_toggle==1 && !array_key_exists($login, $_POST) ) {
                unset($allowed_redirect_pages[$pageid]);
                $unrestricted_pages[$pageid] = true;
            }
            else {
                unset($allowed_redirect_pages[$pageid]);
                $unrestricted_pages[$pageid] = true;
            }

            if(array_key_exists($default, $_POST)) {
                if($_POST[$default]==1 || $_POST[$default]=='on' || $_POST[$default]=='true'){
                    $default_role_parent[$pageid]=true;
                }
            } else{
                unset($default_role_parent[$pageid]);
            }

            if(array_key_exists($pageid, $default_role_parent) || $default_role_toggle==1) {
                if($pageid != 0){
                    $default_role_parent[$pageid]=true;
                    
                    $children = get_pages( array( 'child_of' => $pageid ) );
                
                    if(count($children)>0) {
                        
                        foreach($children as $child) {
                            $child_id = $child->ID;
                            $login_child = 'mo_page_login_' . $child->ID;
                            $roles_child = 'mo_page_roles_' . $child->ID;
                            $default_child = 'mo_page_default_role_'.$child->ID;

                            unset($_POST[$roles_child]);

                            if(array_key_exists($login,$_POST)){
                                $_POST[$login_child] = $_POST[$login];
                            } else {
                                unset($_POST[$login_child]); 
                            }

                            $allowed_roles[$child->ID] = $allowed_roles[$pageid];

                            if($allowed_roles[$child->ID] != ''){
                                if(!in_array($child->ID,$restrictedpages)){                    
                                    array_push($restrictedpages, $child->ID);
                                }
                            } else {
                                unset($restrictedpages[$child->ID]);
                            }

                            if(array_key_exists($pageid, $allowed_redirect_pages)) {
                                if($allowed_redirect_pages[$pageid]==1 || $allowed_redirect_pages[$pageid]=='on' || $allowed_redirect_pages[$pageid]=='true'){
                                    $allowed_redirect_pages[$child->ID]=true;
                                    unset($unrestricted_pages[$child->ID]);
                                }
                            }
                            else {
                                unset($allowed_redirect_pages[$child->ID]);
                                $unrestricted_pages[$child->ID] = true;
                            }

                            $children_of_children = get_pages( array( 'child_of' => $child->ID ) );

                            if(count($children_of_children)>0){
                                $default_role_parent[$child->ID]=true;
                                $_POST[$default_child] = 'on';
                            }
                        }
                    }
                }        
            }
        }

        update_option('papr_allowed_roles_for_pages', $allowed_roles);
        update_option('papr_restricted_pages', $restrictedpages);
        update_option('papr_allowed_redirect_for_pages',$allowed_redirect_pages);
        update_option('papr_login_unrestricted_pages',$unrestricted_pages);
        update_option( 'papr_default_role_parent', $default_role_parent);

        update_option( 'papr_message', 'Selected pages have been restricted successfully.');
        papr_success_message();
        return;
    }

    if( papr_check_option_admin_referer("papr_restrict_post_roles_login") ){
        
        $allowed_roles = get_option('papr_allowed_roles_for_posts')!='' ? get_option('papr_allowed_roles_for_posts') : array();
        $restrictedpost = get_option('papr_restricted_posts')!='' ? get_option('papr_restricted_posts') : array();
        $allowed_redirect_post = get_option('papr_allowed_redirect_for_posts')!='' ? get_option('papr_allowed_redirect_for_posts') : array();
        $access_for_only_loggedin_post = get_option('papr_access_for_only_loggedin_posts')!='' ? get_option('papr_access_for_only_loggedin_posts') : "";
        $unrestricted_posts = get_option( 'papr_login_unrestricted_posts' ) ? get_option( 'papr_login_unrestricted_posts' ) : array();

        unset($_POST['_wpnonce']);
        unset($_POST['_wp_http_referer']);
        unset($_POST['option']);

        $post=array();
		foreach($_POST as $key=>$value)
		{
			$postid = (int) filter_var($key,FILTER_SANITIZE_NUMBER_INT);  
			if(!in_array($postid,$post)){
		 		array_push($post,$postid);
		 	}
        }
        
        for($i=0;$i<sizeof($post);$i++) {

            $postid = $post[$i];

            $roles = 'mo_post_roles_' . $postid;
            $login = 'mo_post_login_' . $postid;

            if(array_key_exists($roles, $_POST)) {
                $allowed_roles[$postid] = stripslashes(sanitize_text_field($_POST[$roles]));

                if($_POST[$roles] != ''){
                    if(!in_array($postid,$restrictedpost)){                    
                        array_push($restrictedpost, $postid);
                    }
                } else {
                    unset($restrictedpost[$postid]);
                }
            }

            if(array_key_exists($login, $_POST)) {
                if($_POST[$login]==1 || $_POST[$login]=='on' || $_POST[$login]=='true'){
                    $allowed_redirect_post[$postid]=true;
                    unset($unrestricted_posts[$postid]);
                }
                }
            else if ( $access_for_only_loggedin_post==1 && !array_key_exists($login, $_POST) ) {
                unset($allowed_redirect_post[$postid]);
                $unrestricted_posts[$postid] = true;
            }
            else {
                unset($allowed_redirect_post[$postid]);
                $unrestricted_posts[$postid] = true;
            }
        }

        update_option('papr_allowed_roles_for_posts',$allowed_roles);
        update_option('papr_restricted_posts',$restrictedpost);
        update_option('papr_allowed_redirect_for_posts',$allowed_redirect_post);
        update_option('papr_login_unrestricted_posts',$unrestricted_posts);
        update_option( 'papr_message', 'Selected post have been restricted successfully.');
        papr_success_message();
        return;
    }

    if( papr_check_option_admin_referer("papr_results_per_page") ){
        $results_per_page = $_POST['papr_results_per_page'];
        update_option('papr_results_per_page',$results_per_page);
        return;
    }

    if( papr_check_option_admin_referer("papr_search_page") ){
        $mo_page_search_value = stripslashes(sanitize_text_field($_POST['mo_page_search']));
        update_option('papr_page_search_value',$mo_page_search_value);
        return;
    }

    if( papr_check_option_admin_referer("papr_search_post") ){
        $mo_post_search_value = stripslashes(sanitize_text_field($_POST['mo_post_search']));
        update_option('papr_post_search_value',$mo_post_search_value);
        return;
    }

    if( papr_check_option_admin_referer("papr_post_type") ){
        $mo_post_type = $_POST['papr_post_type'];
        update_option('papr_post_type',$mo_post_type);
        return;
    }

    if( papr_check_option_admin_referer("papr_default_role_parent_page_toggle") ){
        if ( isset( $_POST["papr_default_role_parent_page_toggle"])){
            
            $allowed_roles = get_option('papr_allowed_roles_for_pages')!='' ? get_option('papr_allowed_roles_for_pages') : array();
            $restrictedpages = get_option('papr_restricted_pages')!='' ? get_option('papr_restricted_pages') : array();
            $allowed_redirect_pages = get_option('papr_allowed_redirect_for_pages')!='' ? get_option('papr_allowed_redirect_for_pages') : array();
            $default_role_parent = get_option('papr_default_role_parent')!='' ? get_option('papr_default_role_parent') : array();
            
            $all_parent_pages = array(  
                'post_parent' => 0,
                'numberposts' => -1,                                                     
                'post_type' => 'page'
            );

            $total_parent_pages = get_posts( $all_parent_pages );
            
            foreach($total_parent_pages as $page ){
                $pageid = $page->ID;
                $default_role_parent[$page->ID]=true;

                $children = get_pages( array( 'child_of' => $page->ID ) );

                if(count( $children ) > 0){
                    foreach($children as $child){

                        $allowed_roles[$child->ID] = $allowed_roles[$page->ID];

                        if($allowed_roles[$child->ID] != ''){
                            if(!in_array($child->ID,$restrictedpages)){                    
                                array_push($restrictedpages, $child->ID);
                            }
                        } else {
                            unset($restrictedpages[$child->ID]);
                        }

                        if(array_key_exists($pageid, $allowed_redirect_pages)) {
                            if($allowed_redirect_pages[$pageid]==1 || $allowed_redirect_pages[$pageid]=='on' || $allowed_redirect_pages[$pageid]=='true'){
                                $allowed_redirect_pages[$child->ID]=true;
                            }
                        } else {
                            unset($allowed_redirect_pages[$child->ID]);
                        }

                        $children_of_children = get_pages( array( 'child_of' => $child->ID ) );

                        if(count($children_of_children)>0) {
                            $default_role_parent[$child->ID]=true;
                        }
                    }
                }
            }

            update_option('papr_allowed_roles_for_pages', $allowed_roles);
            update_option('papr_restricted_pages', $restrictedpages);
            update_option('papr_allowed_redirect_for_pages',$allowed_redirect_pages);
            update_option('papr_default_role_parent',$default_role_parent);
            update_option('papr_default_role_parent_page_toggle',1);
            update_option('papr_select_all_pages','checked');
        }

        else{
            $default_role_parent = array();
            update_option('papr_default_role_parent_page_toggle',0);
            update_option('papr_select_all_pages','unchecked');
            update_option('papr_default_role_parent',$default_role_parent);
        }

        return;
    }

    if( papr_check_option_admin_referer("papr_access_for_only_loggedin") ){
        if ( isset( $_POST["papr_access_for_only_loggedin"])){
            $unrestricted_pages = array();
            update_option('papr_login_unrestricted_pages',$unrestricted_pages);
            update_option('papr_access_for_only_loggedin',1);
        } else{
            $allowed_redirect_pages = array();
            update_option('papr_allowed_redirect_for_pages',$allowed_redirect_pages);
            update_option('papr_access_for_only_loggedin',0);
        }

        return;
    }

    if( papr_check_option_admin_referer("papr_access_for_only_loggedin_posts") ){
        if ( isset( $_POST["papr_access_for_only_loggedin_posts"])){
            $unrestricted_post = array();
            update_option('papr_login_unrestricted_posts',$unrestricted_post);
            update_option('papr_access_for_only_loggedin_posts',1);
        } else{
            $allowed_redirect_post = array();
            update_option('papr_allowed_redirect_for_posts',$allowed_redirect_post);
            update_option('papr_access_for_only_loggedin_posts',0);
        }

        return;
    }

    if( papr_check_option_admin_referer("papr_post_per_page") ){
        $results_per_page = $_POST['papr_post_per_page'];
        update_option('papr_post_per_page',$results_per_page);

        return;
    }

    if( papr_check_option_admin_referer("papr_category_per_page") ){
        $results_per_page = $_POST['papr_category_per_page'];
        update_option('papr_category_per_page',$results_per_page);

        return;
    }

    else if(papr_check_option_admin_referer('papr_contact_us_query_option')){

        if ( ! papr_is_curl_installed() ) {
            update_option( 'papr_message', 'ERROR: <a href="http://php.net/manual/en/curl.installation.php" target="_blank">PHP cURL extension</a> is not installed or disabled. Query submit failed.' );
            papr_error_message();
            return;
        }

        // Contact Us query
        $email    = sanitize_email($_POST['papr_contact_us_email']);
        $phone    = htmlspecialchars($_POST['papr_contact_us_phone']);
        $query    = htmlspecialchars($_POST['papr_contact_us_query']);

        $customer = new Customer_page_restriction();
        if ( papr_check_empty_or_null( $email ) || papr_check_empty_or_null( $query ) ) {
            update_option( 'papr_message', 'Please fill up Email and Query fields to submit your query.' );
            papr_error_message();
        } 
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            update_option( 'papr_message', 'Please enter a valid email address.' );
            papr_error_message();
        } 
        else {
            $submited = $customer->papr_submit_contact_us( $email, $phone, $query );
            if(!is_null($submited)){
                if ( $submited == false ) {
                    update_option( 'papr_message', 'Your query could not be submitted. Please try again.' );
                    papr_error_message();
                } else {
                    update_option( 'papr_message', 'Thanks for getting in touch! We shall get back to you shortly.' );
                    papr_success_message();
                }
            }
        }
    }

    else if (papr_check_option_admin_referer('papr_change_miniorange')){
        papr_remove_account();
        update_option('papr_guest_enabled',true);
        return;
    }

    else if ( papr_check_option_admin_referer("papr_go_back") ) {
        update_option( 'papr_registration_status', '' );
        update_option( 'papr_verify_customer', '' );
        delete_option( 'papr_new_registration' );
        delete_option( 'papr_admin_email' );
        delete_option( 'papr_admin_phone' );
    }

    else if ( papr_check_option_admin_referer("papr_goto_login") ) {
        delete_option( 'papr_new_registration' );
        update_option( 'papr_verify_customer', 'true' );
    }

    else if ( papr_check_option_admin_referer("papr_forgot_password_form_option") ) {
        if ( ! papr_is_curl_installed() ) {
            update_option( 'papr_message', 'ERROR: <a href="http://php.net/manual/en/curl.installation.php" target="_blank">PHP cURL extension</a> is not installed or disabled. Resend OTP failed.' );
            papr_show_error_message();
            return;
        }

        $email = get_option( 'papr_admin_email' );
        $customer = new Customer_page_restriction();
        $content  = json_decode( $customer->papr_forgot_password( $email ), true );
        if(!is_null($content)){
            if ( strcasecmp( $content['status'], 'SUCCESS' ) == 0 ) {
                update_option( 'papr_message', 'Your password has been reset successfully. Please enter the new password sent to ' . $email . '.' );
                papr_success_message();
            } else {
                update_option( 'papr_message', 'An error occured while processing your request. Please Try again.' );
                papr_error_message();
            }
        }
    }

    else if( papr_check_option_admin_referer("papr_verify_customer") ) {    //register the admin to miniOrange
        if ( ! papr_is_curl_installed() ) {
            update_option( 'papr_message', 'ERROR: <a href="http://php.net/manual/en/curl.installation.php" target="_blank">PHP cURL extension</a> is not installed or disabled. Login failed.' );
            papr_error_message();
            return;
        }

        $email    = '';
        $password = '';
        if ( papr_check_empty_or_null( $_POST['email'] ) || papr_check_empty_or_null( $_POST['password'] ) ) {
            update_option( 'papr_message', 'All the fields are required. Please enter valid entries.' );
            papr_error_message();
            return;
        } else if(papr_check_password_pattern(htmlspecialchars($_POST['password']))){
            update_option( 'papr_message', 'Minimum 6 characters should be present. Maximum 15 characters should be present. Only following symbols (!@#.$%^&*-_) should be present.' );
            papr_error_message();
            return;
        }else {
            $email    = sanitize_email( $_POST['email'] );
            $password = stripslashes( htmlspecialchars($_POST['password'] ));
        }

        update_option( 'papr_admin_email', $email );
        update_option( 'papr_admin_password', $password );
        $customer    = new Customer_page_restriction();
        $content     = $customer->papr_get_customer_key();

        if(!is_null($content)){
            $customerKey = json_decode( $content, true );
            if ( json_last_error() == JSON_ERROR_NONE ) {
                update_option( 'papr_admin_customer_key', $customerKey['id'] );
                update_option( 'papr_admin_api_key', $customerKey['apiKey'] );
                update_option( 'papr_customer_token', $customerKey['token'] );
                update_option( 'papr_admin_phone', $customerKey['phone'] );
                update_option( 'papr_admin_password', '' );
                update_option( 'papr_message', 'Customer retrieved successfully' );
                update_option( 'papr_registration_status', 'Existing User' );
                delete_option( 'papr_verify_customer' );
                papr_success_message();
                wp_redirect( admin_url( '/admin.php?page=page_restriction&tab=account_setup' ), 301 );
                exit;
            } 
            else {
                update_option( 'papr_message', 'Invalid username or password. Please try again.' );
                papr_error_message();
            }
            update_option( 'papr_admin_password', '' );
        }
    }

    else if ( papr_check_option_admin_referer("papr_register_customer")) {
        $user = wp_get_current_user();
        if ( ! papr_is_curl_installed() ) {
            update_option( 'papr_message', 'ERROR: <a href="http://php.net/manual/en/curl.installation.php" target="_blank">PHP cURL extension</a> is not installed or disabled. Registration failed.' );
            papr_error_message();
            return;
        }

        $email           = '';
        $password        = '';
        $confirmPassword = '';

        if ( papr_check_empty_or_null( $_POST['email'] ) || papr_check_empty_or_null( $_POST['password'] ) || papr_check_empty_or_null( $_POST['confirmPassword'] ) ) {
            update_option( 'papr_message', 'Please enter the required fields.' );
            papr_error_message();
            return;
        }  
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            update_option( 'papr_message', 'Please enter a valid email address.' );
            papr_error_message();
            return;
        }
        else if(papr_check_password_pattern(htmlspecialchars($_POST['password']))){
            update_option( 'papr_message', 'Minimum 6 characters should be present. Maximum 15 characters should be present. Only following symbols (!@#.$%^&*-_) should be present.' );
            papr_error_message();
            return;
        }
        else {
            $email           = sanitize_email( $_POST['email'] );
            $password        = stripslashes( htmlspecialchars($_POST['password'] ));
            $confirmPassword = stripslashes( htmlspecialchars($_POST['confirmPassword'] ));
        }
        update_option( 'papr_admin_email', $email );
        
        if ( strcmp( $password, $confirmPassword ) == 0 ) {
            update_option( 'papr_admin_password', $password );
            $email    = get_option( 'papr_admin_email' );
            $customer = new Customer_page_restriction();
            $content  = json_decode( $customer->papr_check_customer(), true );
            if(!is_null($content)){
                if ( strcasecmp( $content['status'], 'CUSTOMER_NOT_FOUND' ) == 0 ) {
                    $response = papr_create_customer();
                    if(is_array($response) && array_key_exists('status', $response) && $response['status'] == 'success'){
                        update_option( 'papr_message', 'Customer created successfully.' );
                        wp_redirect( admin_url( '/admin.php?page=page_restriction&tab=account_setup' ), 301 );
                        papr_success_message();
                        exit;
                    }
                    else{
                        update_option( 'papr_message', 'This is not a valid email. Please enter a valid email.' );
                        wp_redirect( admin_url( '/admin.php?page=page_restriction&tab=account_setup' ), 301 );
                        papr_error_message();
                        exit;
                    }
                } 
                else if(strcasecmp($content['status'], 'INVALID_EMAIL') == 0){
                    update_option( 'papr_message', 'This is not a valid email. Please enter a valid email.' );
                    wp_redirect( admin_url( '/admin.php?page=page_restriction&tab=account_setup' ), 301 );
                    papr_error_message();
                    exit;
                }
                else {
                    $response = papr_get_current_customer();
                    if(is_array($response) && array_key_exists('status', $response) && $response['status'] == 'success'){
                        update_option( 'papr_message', 'Customer Retrieved Successfully.' );
                        wp_redirect( admin_url( '/admin.php?page=page_restriction&tab=account_setup' ), 301 );
                        papr_success_message();
                        exit;
                    }
                }
            }
        } 
        else {
            update_option( 'papr_message', 'Passwords do not match.' );
            delete_option( 'papr_verify_customer' );
            papr_error_message();
        }
        return;
    }

    else if ( papr_check_option_admin_referer("papr_skip_feedback") ) {
        update_option( 'papr_message', 'Plugin deactivated successfully' );
        papr_success_message();
        deactivate_plugins( 'page-and-post-restriction\page-and-post-restriction.php' );
        wp_redirect('plugins.php');
    }

    if ( papr_check_option_admin_referer("papr_feedback") ) {
        $user = wp_get_current_user();
        $message = 'Plugin Deactivated';
        $deactivate_reason_message = array_key_exists( 'papr_query_feedback', $_POST ) ? htmlspecialchars($_POST['papr_query_feedback']) : false;
        $message.= ', Feedback : '.$deactivate_reason_message.'';
        $reason='';
        if (isset($_POST['papr_reason']))
                $reason = htmlspecialchars($_POST['papr_reason']);
        
        $email = '';
        $message.= ', [Reason :'.$reason.']';
        if(isset($_POST['papr_query_mail'])){
            $email = $_POST['papr_query_mail'];
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email = get_option('papr_admin_email');
            if(empty($email))
                $email = $user->user_email;
        }
        $phone = get_option( 'papr_admin_phone' );
        $feedback_reasons = new Customer_page_restriction();
        if(!is_null($feedback_reasons)){
            if(!papr_is_curl_installed()){
                deactivate_plugins( 'page-and-post-restriction\page-and-post-restriction.php' );
                wp_redirect('plugins.php');
            } else {
                $submited = json_decode( $feedback_reasons->papr_send_email_alert( $email, $phone, $message ), true );

                if ( json_last_error() == JSON_ERROR_NONE ) {
                    if ( is_array( $submited ) && array_key_exists( 'status', $submited ) && $submited['status'] == 'ERROR' ) {
                        update_option( 'papr_message', $submited['message'] );
                        papr_error_message();
                    }
                    else {
                        if ( $submited == false ) {
                            update_option( 'papr_message', 'Error while submitting the query.' );
                            papr_error_message();
                        }
                    }
                }
            deactivate_plugins( 'page-and-post-restriction\page-and-post-restriction.php');
            wp_redirect('plugins.php');
            update_option( 'papr_message', 'Thank you for the feedback.' );
            papr_success_message();
            }
        }
    }

}

function papr_check_empty_or_null( $value ) {
    if ( ! isset( $value ) || empty( $value ) ) {
        return true;
    }
    return false;
}

 function papr_is_curl_installed() {
    if ( in_array( 'curl', get_loaded_extensions() ) ) {
        return 1;
    } 
    else {
        return 0;
    }
}

function papr_remove_account() {
    //delete all customer related key-value pairs
    delete_option('papr_host_name');
    delete_option('papr_new_registration');
    delete_option('papr_admin_phone');
    delete_option('papr_admin_password');
    delete_option('papr_verify_customer');
    delete_option('papr_admin_customer_key');
    delete_option('papr_admin_api_key');
    delete_option('papr_customer_token');
    delete_option('papr_admin_email');
    delete_option('papr_message');
    delete_option('papr_registration_status');
    delete_option('papr_proxy_host');
    delete_option('papr_proxy_username');
    delete_option('papr_proxy_port');
    delete_option('papr_proxy_password');
}

function papr_check_password_pattern($password){
    $pattern = '/^[(\w)*(\!\@\#\$\%\^\&\*\.\-\_)*]+$/';
    return !preg_match($pattern,$password);
}

function papr_get_current_customer() {
    $customer    = new Customer_page_restriction();
    $content     = $customer->papr_get_customer_key();
    if(!is_null($content)){
        $customerKey = json_decode( $content, true );
        $response = array();
        if ( json_last_error() == JSON_ERROR_NONE ) {
            update_option( 'papr_admin_customer_key', $customerKey['id'] );
            update_option( 'papr_admin_api_key', $customerKey['apiKey'] );
            update_option( 'papr_customer_token', $customerKey['token'] );
	        update_option( 'papr_admin_phone', $customerKey['phone'] );
            update_option( 'papr_admin_password', '' );
            delete_option( 'papr_verify_customer' );
            delete_option( 'papr_new_registration' );
            $response['status'] = "success";
            return $response;
        } 
        else {
            update_option( 'papr_message', 'You already have an account with miniOrange. Please enter a valid password.' );
            papr_error_message();
            $response['status'] = "error";
            return $response;
        }
    }
}

function papr_create_customer() {
    $customer    = new Customer_page_restriction();
    $customerKey = json_decode( $customer->papr_create_customer(), true );
    if(!is_null($customerKey)){
        $response = array();
        if ( strcasecmp( $customerKey['status'], 'CUSTOMER_USERNAME_ALREADY_EXISTS' ) == 0 ) {
            $api_response = papr_get_current_customer();
            if($api_response){
                $response['status'] = "success";
            }
            else
                $response['status'] = "error";
        } 
        else if ( strcasecmp( $customerKey['status'], 'SUCCESS' ) == 0 ) {
            if(isset($customerKey['id'])){
                update_option( 'papr_admin_customer_key', $customerKey['id'] );
            }
            if(isset($customerKey['apiKey'])){
                update_option( 'papr_admin_api_key', $customerKey['apiKey'] );
            }
            if(isset($customerKey['token'])){
                update_option( 'papr_customer_token', $customerKey['token'] );
            }
            if(isset($customerKey['phone'])){
	            update_option( 'papr_admin_phone', $customerKey['phone'] );
            }
            update_option( 'papr_admin_password', '' );
            update_option( 'papr_message', 'Thank you for registering with miniOrange.' );
            update_option( 'papr_registration_status', '' );
            delete_option( 'papr_verify_customer' );
            delete_option( 'papr_new_registration' );
            $response['status']="success";
            return $response;
        }
        update_option( 'papr_admin_password', '' );
        return $response;
    }
}
?>
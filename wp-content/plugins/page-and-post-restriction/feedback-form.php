<?php

function papr_display_feedback_form() {
	if ( 'plugins.php' != basename( $_SERVER['PHP_SELF'] ) ) {
		return;
	}
	wp_enqueue_style( 'papr_admin_plugins_style_settings', plugins_url( '/includes/css/style_settings.css?ver=1.2.0', __FILE__ ) );
	?>

    <div id="papr_feedback_modal" class="mo_modal" style="width:90%; margin-left:12%; margin-top:5%; text-align:center; margin-left">

        <div class="mo_modal-content" style="width:25%;">
            <h3 style="margin: 2%; text-align:center;"><b>Your feedback</b><span class="papr_close" style="cursor: pointer;color: #aaaaaa; float: right; font-size: 28px; font-weight: bold;">&times;</span>
            </h3>
            <hr style="width:75%;">

            <form name="f" method="post" action="" id="papr_feedback">
				<?php wp_nonce_field("papr_feedback");?>
                <input type="hidden" name="option" value="papr_feedback"/>
                <div>
                    <p style="margin:2%">
                    <h4 style="margin: 2%; text-align:center;">Please tell us what went wrong.<br></h4>

                    <div style="text-align: left;padding:2% 10%;">
                        <input type="radio" name="papr_reason" value="Missing Features" id="papr_feature"/>
                        <label for="papr_feature" style="line-height:20px;"> Does not have the features I'm looking for</label>
                        <br>

                        <input style="display: inline-block" type="radio" name="papr_reason" value="Costly" id="papr_costly" />
                        <label for="papr_costly" style="line-height:20px;">Do not want to upgrade - Too costly</label>
                        <br>

                        <input style="display: inline-block" class="papr_radio" type="radio" name="papr_reason" value="Confusing" id="papr_confusing"/>
                        <label for="papr_confusing" style="line-height:20px;">Confusing Interface</label>
                        <br>

                        <input style="display: inline-block" class="papr_radio" type="radio" name="papr_reason" value="Bugs" id="papr_bugs"/>
                        <label for="papr_bugs" style="line-height:20px;">Bugs in the plugin</label>
                        <br>

                        <input style="display: inline-block" class="papr_radio" type="radio" name="papr_reason" value="other" id="papr_other"/>
                        <label for="papr_other" style="line-height:20px;">Other Reasons</label>
                        <br><br>
                        <textarea id="papr_query_feedback" name="papr_query_feedback" rows="4" style="width: 100%"
                                  placeholder="Tell us what happened!"></textarea>
                    </div>

                    <hr style="width:75%;">

                    <div>Thank you for your valuable time</div>
                    <br>

					<?php $email = get_option("papr_admin_email");
					if(empty($email)){
						$user = wp_get_current_user();
						$email = $user->user_email;
					}
					?>
                    <div style="text-align:center;height:0px;">
                        <input type="email" id="papr_query_mail" name="papr_query_mail" style="visibility: hidden;text-align:center;"
                               placeholder="your email address" required value="<?php echo $email; ?>" readonly="readonly"/>
                    </div>

                    <div class="mo-modal-footer" style="text-align: center;margin-bottom: 2%">
                        <input type="submit" name="miniorange_feedback_submit"
                               class="button button-primary button-large" value="Send"/>
                        <span width="30%">&nbsp;&nbsp;</span>
                        <input type="button" name="miniorange_skip_feedback"
                               class="button button-primary button-large" value="Skip" onclick="document.getElementById('papr_feedback_form_close').submit();"/>
                    </div>
                </div>


            </form>
            <form name="f" method="post" action="" id="papr_feedback_form_close">
				<?php wp_nonce_field("papr_skip_feedback");?>
                <input type="hidden" name="option" value="papr_skip_feedback"/>
            </form>

        </div>

    </div>

    <script>
        jQuery('a[aria-label="Deactivate WordPress Page Post Protection"]').click(function () {

            var mo_modal = document.getElementById('papr_feedback_modal');

            var span = document.getElementsByClassName("papr_close")[0];

            mo_modal.style.display = "block";
            document.querySelector("#papr_query_feedback").focus();
            span.onclick = function () {
                mo_modal.style.display = "none";
                jQuery('#papr_feedback_form_close').submit();
            };

            window.onclick = function (event) {
                if (event.target === mo_modal) {
                    mo_modal.style.display = "none";
                }
            };
            return false;

        });
    </script><?php
}

?>
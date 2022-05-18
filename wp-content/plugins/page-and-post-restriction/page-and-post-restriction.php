<?php
/**
* Plugin Name: Page Restriction WordPress (WP) - Protect WP Pages/Post
* Description: This plugin allows restriction over users based on their roles and whether they are logged in or not.
* Version: 1.2.8
* Author: miniOrange
* Author URI: http://miniorange.com
* License: MIT/Expat
* License URI: https://docs.miniorange.com/mit-license
*/

require_once('page-restriction-save.php');
require_once('feedback-form.php');
require_once('page-restriction-menu-settings.php');
include_once 'page-restriction-utility.php';


class page_and_post_restriction_add_on {

    function __construct(){
        update_option('papr_host_name','https://login.xecurify.com');
        add_action( 'admin_menu', array( $this, 'papr_menu'),11 );
        add_action( 'admin_init', 'papr_save_setting', 1, 0 );
        add_action( 'admin_enqueue_scripts', array( $this, 'papr_plugin_settings_script') );
	    register_deactivation_hook(__FILE__, array( $this, 'papr_deactivate'));
        remove_action( 'admin_notices', 'papr_success_message');
        remove_action( 'admin_notices', 'papr_error_message' );
        add_action( 'save_post', array($this, 'papr_save_meta_box_info'),10,3);
        add_action('wp',array($this, 'papr_initialize_page_restrict'),0);
        add_action('add_meta_boxes',array($this, 'papr_add_custom_meta_box'));
        add_action( 'admin_footer', array( $this, 'papr_feedback_request' ) );
        add_shortcode('restrict_content', array($this, 'papr_restrict_content'));
	    add_action('plugin_action_links_'.plugin_basename(__FILE__), array($this,'papr_add_plugin_settings'));
    }

    function papr_menu() {
        add_menu_page('Page and Post Restriction','Page Restriction', 'administrator', 'page_restriction','papr_page_restriction',plugin_dir_url(__FILE__) . 'includes/images/miniorange.png');
    }

    function papr_add_plugin_settings($links) {
	    $links = array_merge( array(
		    '<a href="' . esc_url( admin_url( 'admin.php?page=page_restriction' ) ) . '">' . __( 'Settings' ) . '</a>'
	    ), $links );
	    return $links;
    }

    function papr_feedback_request() {
        papr_display_feedback_form();
    }

    function papr_deactivate() {
        wp_redirect('plugins.php');
        delete_option('papr_admin_email');
        delete_option('papr_admin_customer_key');
        delete_option('papr_host_name');
        delete_option('papr_new_registration');
        delete_option('papr_admin_phone');
        delete_option('papr_admin_password');
        delete_option('papr_admin_customer_key');
        delete_option('papr_admin_api_key');
        delete_option('papr_customer_token');
        delete_option('papr_message');
        delete_option('papr_allowed_roles_for_pages');
        delete_option('papr_restricted_pages');
        delete_option('papr_allowed_roles_for_posts');
        delete_option('papr_restricted_posts');
        delete_option('papr_allowed_redirect_for_pages');
        delete_option('papr_allowed_redirect_for_posts');
    }

    function papr_plugin_settings_script($page) {
        if($page != 'toplevel_page_page_restriction'){
            return;
        }
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-autocomplete');
        wp_enqueue_script('papr_admin_settings_phone_script', plugins_url('includes/js/phone.js', __FILE__));
        wp_enqueue_style('papr_admin_bootstrap_settings_script', plugins_url('includes/js/bootstrap/bootstrap.min.js', __FILE__));
        wp_enqueue_style('papr_admin_bootstrap_settings_script', plugins_url('includes/js/bootstrap/popper.min.js', __FILE__));
        wp_enqueue_style('papr_admin_settings_phone_style', plugins_url('includes/css/phone.css', __FILE__));
        wp_enqueue_style('papr_admin_bootstrap_settings_style', plugins_url('includes/css/bootstrap/bootstrap.min.css', __FILE__));
        wp_enqueue_style('papr_admin_settings_style', plugins_url('includes/css/papr_settings_style.css', __FILE__));
    }

    function papr_restrict_content($attr, $content = '') {
        if(!is_user_logged_in())
            return '';
        return '<p>'.$content.'</p>';
    }

    function papr_add_custom_meta_box($post_type) {

    	global $pagenow;
        $papr_metabox_allowed_roles = get_option('papr_allowed_metabox_roles');
        if(empty($papr_metabox_allowed_roles))
            $papr_metabox_allowed_roles = 'Editor; Author;';
        if($papr_metabox_allowed_roles == 'papr_no_roles')
            $papr_metabox_allowed_roles = '';
        $metabox_roles_array = explode(';', $papr_metabox_allowed_roles);
        $current_user = wp_get_current_user();
        $user_roles = $current_user->roles;

    	if(in_array( $pagenow, array('post-new.php') )){
    		if($post_type == 'page' && get_option('papr_select_all_pages') == 'checked'){
    			$pages_for_loggedin_users=get_option('papr_allowed_redirect_for_pages');
    			$pages_for_loggedin_users[get_the_ID()]=true;
    			update_option('papr_allowed_redirect_for_pages',$pages_for_loggedin_users);
    		}else if(get_option('papr_select_all_posts') == 'checked'){
    			$pages_for_loggedin_users=get_option('papr_allowed_redirect_for_posts');
    			$pages_for_loggedin_users[get_the_ID()]=true;
    			update_option('papr_allowed_redirect_for_posts',$pages_for_loggedin_users);
            }
    	}

        if(is_array($user_roles))
            if(empty(array_intersect($metabox_roles_array, $user_roles)) && !in_array('administrator', $user_roles))
                return;

        $type = get_post_type_object( $post_type );
        add_meta_box("demo-meta-box", "Page Restrict Access", array($this, "papr_meta_box"), $post_type, "side", "high", null);
    }

    /*If the user is not logged in then it checks if the page or post are retricted to logged in user only or not. */
    function papr_restrict_logged_in_users($page_post_id){
    	$restricted_pages = get_option( 'papr_allowed_redirect_for_pages' ) ? get_option( 'papr_allowed_redirect_for_pages' ) : array();
    	$restricted_posts = get_option( 'papr_allowed_redirect_for_posts' ) ? get_option( 'papr_allowed_redirect_for_posts' ) : array();
        
        $default_login_toggle = get_option('papr_access_for_only_loggedin')!='' ? get_option('papr_access_for_only_loggedin') : "";
        $unrestricted_pages = get_option( 'papr_login_unrestricted_pages' ) ? get_option( 'papr_login_unrestricted_pages' ) : array();
    	
        $default_login_toggle_posts = get_option('papr_access_for_only_loggedin_posts')!='' ? get_option('papr_access_for_only_loggedin_posts') : "";
        $unrestricted_posts = get_option( 'papr_login_unrestricted_posts' ) ? get_option( 'papr_login_unrestricted_posts' ) : array();
    
        //Settings when global toggle is all and fe pages/posts has unticked checkbox
        if( is_page() && ($default_login_toggle==1) && !array_key_exists($page_post_id, $unrestricted_pages) ) {
            $papr_message_text = 'Oops! You are not authorized to access this';
    	    wp_die( $papr_message_text );
        }

        if( is_single() && ($default_login_toggle_posts==1) && !array_key_exists($page_post_id, $unrestricted_posts) ) {
            $papr_message_text = 'Oops! You are not authorized to access this';
    	    wp_die( $papr_message_text );
        }

        //Added condition for front page restriction
    	if ( (is_page() && array_key_exists($page_post_id, $restricted_pages)) || (is_front_page() && array_key_exists(get_option('page_on_front'), $restricted_pages)) || (is_single() && array_key_exists($page_post_id, $restricted_posts)) ) {
    	    $papr_message_text = 'Oops! You are not authorized to access this';
    	    wp_die( $papr_message_text );
    	}
    }

    /*If user is logged in then this function checks if the user is restricted to access any page or post*/
    function papr_restrict_by_role($page_post_id){
    	$allowed_roles_for_posts = get_option("papr_allowed_roles_for_posts");
        $allowed_roles_for_pages = get_option("papr_allowed_roles_for_pages");
        $restricted_pages = get_option('papr_restricted_pages');
        $restricted_posts = get_option('papr_restricted_posts');

        if(!is_front_page() && empty($allowed_roles_for_pages['mo_page_0'])) {
            if (is_page($page_post_id)) {
                if (is_array($restricted_pages)) {
                    if (!in_array($page_post_id, $restricted_pages)) {
                        if ($page_post_id !== 1)
                            return;
                    }
                }
            } else {
                if (is_array($restricted_posts)) {
                    if (!in_array($page_post_id, $restricted_posts)) {
                        return;
                    }
                }
            }
        }

    	$current_user = wp_get_current_user();
        $user_roles = $current_user->roles;

        foreach ($user_roles as $key => $user_role) {
    		if(is_front_page()&&!empty($allowed_roles_for_pages['mo_page_0'])){
    			if( strripos($allowed_roles_for_pages['mo_page_0'],$user_role) !== FALSE)
    				return;
    		}
    		else if( !empty($allowed_roles_for_pages[$page_post_id]) || !empty($allowed_roles_for_posts[$page_post_id]) ){
               if(is_array($allowed_roles_for_pages) ){
                    if (array_key_exists( $page_post_id, $allowed_roles_for_pages )&& strripos($allowed_roles_for_pages[$page_post_id],$user_role) !== false )
                   return;
               }
               if(is_array($allowed_roles_for_posts)){
                    if (array_key_exists( $page_post_id, $allowed_roles_for_posts )&& strripos($allowed_roles_for_posts[$page_post_id],$user_role)!== false )
                   return;
               }
            }			
        }

    	//default access to all users
        if(is_array($allowed_roles_for_pages) || is_array($allowed_roles_for_posts)) {
            if(is_page()&&array_key_exists( $page_post_id, $allowed_roles_for_pages )&&(strlen($allowed_roles_for_pages[$page_post_id])==0))
                return;
            elseif( (is_single()&& !empty($allowed_roles_for_posts[$page_post_id])) || (is_front_page() && !empty($allowed_roles_for_pages['mo_page_0'])) || (is_page() && !empty($allowed_roles_for_pages[$page_post_id])) ){
                $papr_message_text = 'Oops! You are not authorized to access this';
                wp_die( $papr_message_text );
            }
        }
    }

    function papr_initialize_page_restrict(){
        $page_post_id = get_the_ID()?get_the_ID():0;
        $guest_user_logged_in = false;
      
        if(!is_user_logged_in() and !$guest_user_logged_in)
    	    $this->papr_restrict_logged_in_users($page_post_id);
    	else
    		$this->papr_restrict_by_role($page_post_id);
    }

    public static function papr_meta_box($post ) {
        wp_nonce_field('my_meta_box_nonce','meta_box_nonce');
        global $wp_roles;
        $wp_name_roles=($wp_roles->role_names);
        asort($wp_name_roles);
        $type=$post->post_type;
        if($type == 'page')
            $role=get_option('papr_allowed_roles_for_pages');
        else
            $role=get_option('papr_allowed_roles_for_posts');
        $roles=array();
        if(!empty($role) && array_key_exists($post->ID, $role)){
            $string=$role[$post->ID];
            $roles=explode(";",$string);
        }

    $is_page_restrcited_for_loggedin_users = 'false';

    if($type == 'page')
        $pages_for_loggedin_users=get_option('papr_allowed_redirect_for_pages');
    else
        $pages_for_loggedin_users=get_option('papr_allowed_redirect_for_posts');

    if(!empty($pages_for_loggedin_users))
        if(array_key_exists($post->ID, $pages_for_loggedin_users) && $pages_for_loggedin_users[$post->ID]=='true'){
            $is_page_restrcited_for_loggedin_users = 'true';
        }
    ?>
    <div class="row">
        <img src="<?php echo plugin_dir_url(__FILE__) ?>includes/images/miniorange-logo.png" alt="miniOrange Page and Post Restriction" width="35px">
        <h4 style="position:absolute;top:-0.6rem;left:4.2rem;">Page and Post Restriction</h4>
    </div>

    <p> <?php esc_html_e( "Limit access to Logged in users.", 'mo-wpum' ); ?> </p>
        <div class="page-restrict-loggedin-user-div">
            <input type="hidden" name="papr_metabox" value="true">
            <ul class="page-restrict-loggedin-user">
                <?php if(filter_var($is_page_restrcited_for_loggedin_users, FILTER_VALIDATE_BOOLEAN)){ ?>
                    <input type="checkbox" name="restrict_page_access_loggedin_user" checked value="true" />
                <?php }else{ ?>
                    <input type="checkbox" name="restrict_page_access_loggedin_user"  value="true" /><?php } ?>
                Require Login
            </ul>
        </div>

        <hr>
        <p>
            <?php esc_html_e( "Limit access to this post's content to users of the selected roles.", 'mo-wpum' );  ?>
        </p>

        <div class="role-list-wrap">

            <ul class="role-list">

                <?php foreach ( $wp_name_roles as $role => $name ) : ?>
                    <li>
                        <label>
                            <input type="checkbox" name="papr_access_role[]" <?php checked( is_array( $roles ) && (in_array( $role, $roles )  || in_array($name, $roles))); ?> value="<?php echo esc_attr( $role ); ?>" />
                            <?php echo esc_html( translate_user_role( $name ) ); ?>
                        </label>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
     <?php
    }

/* Function to save the meta box details during creation/editing */
    static function papr_save_meta_box_info($post_id , $post, $update) {

        if(!isset($_POST['papr_metabox'])) return;

        $type=get_post_type();
        //TODO : handle UI for different post types

        $allowed_redirect_pages=array();
        $restricted_pages = array();
        $page_allowed_roles = array();
        
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

        $default_role_parent = get_option('papr_default_role_parent')!='' ? get_option('papr_default_role_parent') : array();
        if($type=='page'){
            $allowed_roles= maybe_unserialize(get_option('papr_allowed_roles_for_pages'));
            $restrictedposts = get_option('papr_restricted_pages');
            if(!$restrictedposts)
                $restrictedposts = array();
            $allowed_redirect_pages = get_option('papr_allowed_redirect_for_pages');
            $unrestricted_pages = get_option( 'papr_login_unrestricted_pages' ) ? get_option( 'papr_login_unrestricted_pages' ) : array();
        } else {
            $allowed_roles= maybe_unserialize(get_option('papr_allowed_roles_for_posts'));
            $restrictedposts = get_option('papr_restricted_posts');
            if(!$restrictedposts)
                $restrictedposts = array();
            $allowed_redirect_pages = get_option('papr_allowed_redirect_for_posts');
            $unrestricted_pages = get_option( 'papr_login_unrestricted_posts' ) ? get_option( 'papr_login_unrestricted_posts' ) : array();
        }

        if(isset( $_POST['papr_access_role'] )){
            array_push($restrictedposts, $post_id);
            $new_roles = $_POST['papr_access_role'];
            $allowed_roles[$post_id] = implode(";",$new_roles);
        } else {
            $restrictedpostsarray = $restrictedposts;
            if(is_array($restrictedpostsarray))
                while(($i = array_search($post_id, $restrictedpostsarray)) !== false) {
                unset($restrictedpostsarray[$i]);
                unset($allowed_roles[$post_id]);
            }
            $restrictedposts = $restrictedpostsarray;
        }

        if( isset($_POST['restrict_page_access_loggedin_user']) ) {
            $allowed_redirect_pages[$post_id]=true;
            unset($unrestricted_pages[$post_id]);
        }else{
            unset($allowed_redirect_pages[$post_id]);
            $unrestricted_pages[$post_id] = true;
        }

        $parent_id = wp_get_post_parent_id($post_id);
        if($type=='page' && $parent_id){
            if($default_role_parent[$parent_id]==true){
                $restrictedposts = get_option('papr_restricted_pages');

                if(in_array($parent_id, $restrictedposts)){
                    array_push($restrictedposts, $post_id);
                    $allowed_roles= get_option('papr_allowed_roles_for_pages');
                    $role_string = $allowed_roles[$parent_id];
                    $parent_allowed_roles = explode(";",$role_string);
                    $allowed_roles[$post_id] = implode(";",$parent_allowed_roles);
                    if($allowed_roles[$post_id] != ''){
                        if(!in_array($post_id,$restrictedposts)){                    
                            array_push($restrictedposts, $post_id);
                        }
                    } else {
                        unset($restrictedposts[$post_id]);
                    }
                }
                if(in_array($parent_id, $allowed_redirect_pages)){
                    $allowed_redirect_pages[$post_id]=true;
                    unset($unrestricted_pages[$post_id]);
                } else{
                    unset($allowed_redirect_pages[$post_id]);
                    $unrestricted_pages[$post_id] = true;
                }
            }
        }

        if($type=='page'){
            $default_role_toggle = get_option('papr_default_role_parent_page_toggle')!='' ? get_option('papr_default_role_parent_page_toggle') : "";
            if(array_key_exists($post_id, $default_role_parent) || $default_role_toggle==1) {
                if($post_id != 0){
                    $default_role_parent[$post_id]=true;
                    
                    $children = get_pages( array( 'child_of' => $post_id ) );
                
                    if(count($children)>0) {
                        
                        foreach($children as $child) {
                            $child_id = $child->ID;
                            
                            $allowed_roles[$child->ID] = $allowed_roles[$post_id];

                            if($allowed_roles[$child->ID] != ''){
                                if(!in_array($child->ID,$restrictedposts)){                    
                                    array_push($restrictedposts, $child->ID);
                                }
                            } else {
                                unset($restrictedposts[$child->ID]);
                            }

                            if(array_key_exists($post_id, $allowed_redirect_pages)) {
                                if($allowed_redirect_pages[$post_id]==1 || $allowed_redirect_pages[$post_id]=='on' || $allowed_redirect_pages[$post_id]=='true'){
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
                            }
                        }
                    }
                }        
            }
        }

        if($type=='page'){
            update_option('papr_default_role_parent', $default_role_parent);
            update_option('papr_login_unrestricted_pages',$unrestricted_pages);
            update_option('papr_restricted_pages', $restrictedposts);
            update_option('papr_allowed_roles_for_pages', $allowed_roles);
            update_option('papr_allowed_redirect_for_pages',$allowed_redirect_pages);
            update_option('papr_message', 'This page has been restricted successfully.');
        }
        else {
            update_option('papr_restricted_posts', $restrictedposts);
            update_option('papr_allowed_roles_for_posts', $allowed_roles);
            update_option('papr_allowed_redirect_for_posts',$allowed_redirect_pages);
            update_option('papr_login_unrestricted_posts',$unrestricted_pages);
            update_option('papr_message', 'This post has been restricted successfully.');
        }
    }
}
new page_and_post_restriction_add_on;
?>
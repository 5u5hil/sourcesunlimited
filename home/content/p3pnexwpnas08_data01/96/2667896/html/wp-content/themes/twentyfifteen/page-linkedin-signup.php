<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once('inc/linkedinoauth.php');
 
class LinkedIn_Login_Widget extends WP_Widget 
{
    public function __construct() 
    {
        parent::__construct("linkedin_login_widget", "LinkedIn Login", array("description" => __("Display a LinkedIn Login Button")));
    }
         
    public function form( $instance ) 
    {
        // Check values
        if($instance) 
        {
            $title = esc_attr($instance['title']);
            $api_key = $instance['api_key'];
            $secret_key = $instance['secret_key'];
        } 
        else
        {
            $title = '';
            $api_key = '';
            $secret_key = '';
        }
        ?>
 
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'linkedin_login_widget'); ?></label>  
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('api_key'); ?>"><?php _e('API Key:', 'api_login_widget'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('api_key'); ?>" name="<?php echo $this->get_field_name('api_key'); ?>" value="<?php echo $api_key; ?>" />
        </p>
         
        <p>
            <label for="<?php echo $this->get_field_id('secret_key'); ?>"><?php _e('Secret Key:', 'linkedin_login_widget'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('secret_key'); ?>" name="<?php echo $this->get_field_name('secret_key'); ?>" value="<?php echo $secret_key; ?>" />
        </p>
 
        <p>
            While creating a LinkedIn app use "<?php echo get_site_url() . '/wp-admin/admin-ajax.php?action=linkedin_oauth_callback'  ?>" as callback URL.
        </p>
 
        <?php
    }
         
    public function update( $new_instance, $old_instance ) 
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['api_key'] = strip_tags($new_instance['api_key']);
        $instance['secret_key'] = strip_tags($new_instance['secret_key']);
         
        update_option("linkedin_app_key", $new_instance['api_key']);
        update_option("linkedin_app_secret", $new_instance['secret_key']);
         
        return $instance;
    }
         
    public function widget( $args, $instance ) 
    {
        extract($args);
         
        $title = apply_filters('widget_title', $instance['title']);
        echo $before_widget;
         
        if($title) 
        {
            echo $before_title . $title . $after_title ;
        }
         
        if(is_user_logged_in()) 
        {
            ?>
                <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout"><input type="button" value="Logout" /></a>
            <?php
        }
        else
        {
            ?>
                <a href="<?php echo site_url() . '/wp-admin/admin-ajax.php?action=linkedin_oauth_redirect'; ?>"><input type="button" value="Login Using LinkedIn" /></a>
            <?php
        }
         
         
         
         
        echo $after_widget;
    }
}
register_widget("LinkedIn_Login_Widget");
?>
<?php
if ($_POST['email']) 
    {
   // echo get_user_id_from_string($_POST['email']);
     $current_user = get_user_by( 'email', $_POST['email'] );
     $args = array('offset' => 0, 'post_type' => get_user_meta($current_user->ID, "entity", true), 'author' => $current_user->ID);

$the_query = new WP_Query($args);

$post = $the_query->post;
//var_dump($post); 
  $post_status = $post->post_status;  // die;
 
if($post_status == 'publish')
{
//    $creds = array();
//    $creds['user_login'] = $_POST['email'];
//    $creds['user_password'] = $_POST['password'];
//    $user = wp_signon($creds, false);
//   
//    
// if (is_wp_error($user)) {
// 
// }
//    else {
       header("location:/" . get_user_meta($current_user->ID, "entity", true) . "-dashboard");
  //  }
}
 else {
   $msg = "Oops! You are not yet verified. We will contact you soon for verification. Thank You.";
}
}
get_header();
?>
<?php echo $msg ?>

<?php 
get_footer();
?>
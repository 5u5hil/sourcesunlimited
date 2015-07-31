<?php get_header();
?>


<div class="container">
    <!-- **primary - Starts** --> 
    <section id="primary" class="content-full-width">
        <!-- **woocommerce - Starts** --> 
        <div class="woocommerce">
<?php

  $current_user = wp_get_current_user();
  
                
                $my_post = array(
    'post_title' => $_POST['applicant_name'],
    'post_status' => 'publish',
    'post_type' => 'application',
    'post_category' => array($_POST['alumni_inst'],$_POST['address']),
    'post_author' => $current_user->ID,
);
$post_id = wp_insert_post($my_post);

if ($post_id) { 
    
   
    update_post_meta($post_id, 'Application Name', $_POST['applicant_name'], true);
    update_post_meta($post_id, 'Mobile', $_POST['mobile'], true);
    update_post_meta($post_id, 'Address', $_POST['address'], true);
    update_post_meta($post_id, 'Add address', $_POST['add_address'], true);
    update_post_meta($post_id, 'Alumni', $_POST['alumni_inst'], true); 
    update_post_meta($post_id, 'Add Alumni', $_POST['add_alumni'], true);
    update_post_meta($post_id, 'Think Tank', $_POST['think_tank'], true); 
    update_post_meta($post_id, 'Campus', $_POST['campus'], true); 
    update_post_meta($post_id, 'Average', $_POST['average'], true); 
}
 
?>
            <div class="dt-sc-margin50"></div>
            <p style="text-align: center;">You have successfully submitted application form , Will get back to you shortly. Thank You!</p>
<div class="dt-sc-margin50"></div>

    </section> <!-- **Primary - Ends** -->          

</div> <!-- **container - Ends** --> 
<?php get_footer(); ?>
<?php

get_header();
if (!function_exists('wp_handle_upload'))
    require_once( ABSPATH . 'wp-admin/includes/file.php' );

require_once(ABSPATH . 'wp-admin/includes/image.php');
$postCats = array($_POST['year_of_invester']);

//print_r($postCats);
//            if (isset($_POST['alumni_inst'])) {
//                if (!empty($_POST['add_institute'])) {
//
//                    $arg = array('parent' => 18);
//
//                    $my_cat_id = wp_insert_term($_POST['add_institute'], "category", $arg);
//
//                    $institute = $my_cat_id['term_id'];
//
//                    array_push($postCats, $my_cat_id['term_id']);
//                } //else {
//
//                    $institute = $_POST['alumni_inst'];
//                    $postCats = array_merge($postCats, $institute);
//                   
//                // }
//            }
            
            
$institute_array = array();
if (isset($_POST['alumni_inst'])) {
    $institute = $_POST['alumni_inst'];
    $icount = count($_POST['alumni_inst']);


    for ($i = 0; $i < $icount; $i++) {


        if ($institute[$i] == 'other') {
            if (!empty($_POST['add_institute'])) {
                $arg = array('parent' => 18);
                $my_cat_id = wp_insert_term($_POST['add_institute'], "category", $arg);
                $new_insti_cat = $my_cat_id['term_id'];
            }
        } else {

            array_push($institute_array, $institute[$i]);
        }
    }
    if (isset($new_insti_cat)) {
        array_push($institute_array, $new_insti_cat);
    }

    $postCats = array_merge($postCats, $institute_array);
}
            

//echo "alumni_inst";
//print_r($postCats);
//echo"<br/>";
            if (isset($_POST['address'])) {
                if (!empty($_POST['add_address'])) {

                    $arg = array('parent' => 34);

                    $my_cat_id = wp_insert_term($_POST['add_address'], "category", $arg);

                    $city = $my_cat_id['term_id'];

                    array_push($postCats, $my_cat_id['term_id']);
                } else {

                    $city = $_POST['address'];

                    array_push($postCats, $_POST['address']);
                }
            }
//echo "address";
//print_r($postCats);
//echo"<br/>";
            if (isset($_POST['member'])) {

                if (!empty($_POST['add_member'])) {

                    $arg = array('parent' => 14);

                    $my_cat_id = wp_insert_term($_POST['add_member'], "category", $arg);

                    $member = $my_cat_id['term_id'];

                    array_push($postCats, $my_cat_id['term_id']);
                } else {

                    $member = $_POST['member'];

                    array_push($postCats, $_POST['member']);
                }
            }


//echo "member";
//print_r($postCats);
//echo"<br/>";

            if (isset($_POST['sector'])) {
                $sector = $_POST['sector'];
                $postCats = array_merge($postCats, $sector);
            }
         //   print_r($postCats);  // die;
?>


<div class="container">

    <!-- **primary - Starts** --> 

    <section id="primary" class="content-full-width">

        <!-- **woocommerce - Starts** --> 

        <div class="woocommerce">

            <?php
            

            $user_id = username_exists($_POST['email']);

               if (!$user_id && $_POST['email'] != "" && $_POST['password'] != "" && $_POST['investor_name']!="" && $postCats!="" ) {



                $userdata = array(
                    'user_login' => $_POST['email'],
                    'user_email' => $_POST['email'],
                    'investor_name' => $_POST['investor_name'],
                    'first_name' => $_POST['investor_name'],
                    'role' => 'contributor',
                    'user_pass' => $_POST['password']
                );



                $user_id = wp_insert_user($userdata);



                update_user_meta($user_id, 'entity', $_POST['entity']);





                $my_post = array(
                    'post_title' => $_POST['investor_name'],
                    'post_status' => 'private',
                    'post_type' => 'investor',
                    'post_category' => $postCats,
                    'post_author' => $user_id,
                );

                $post_id = wp_insert_post($my_post);



                if ($post_id) {
                    
                     update_post_meta($post_id, 'Secondary Role', $_POST['secrole'], true);

                    update_post_meta($post_id, 'Organization Name', $_POST['company_name'], true);

                    update_post_meta($post_id, 'Alumni', implode(',',$institute_array), true);

                    update_post_meta($post_id, 'Name Of investor', $_POST['investor_name'], true);

                    update_post_meta($post_id, 'Member', $member, true);

                    update_post_meta($post_id, 'City Of location', $city, true);

                    update_post_meta($post_id, 'Mobile', $_POST['mobile'], true);

                    update_post_meta($post_id, 'email', $_POST['email'], true);

                    update_post_meta($post_id, 'password', $_POST['password'], true);

                    update_post_meta($post_id, 'Sector', implode(',',$sector), true);

                    update_post_meta($post_id, 'Companies Invested', $_POST['companies_invested'], true);

                    update_post_meta($post_id, 'Part of investment network', $_POST['part_of_investment'], true);

                    update_post_meta($post_id, 'Year of invester', $_POST['year_of_invester'], true);

                    update_post_meta($post_id, 'Funding Amount', $_POST['funding_amt'], true);

                    update_post_meta($post_id, 'Twitter', $_POST['twitter'], true);

                    update_post_meta($post_id, 'Website', $_POST['website'], true);

                    update_post_meta($post_id, 'Type of investor', $_POST['investor_type'], true);
                    
                    update_post_meta($post_id, 'User Likes', json_encode(array()), true);
                    
                     update_post_meta($post_id, 'Facebook', $_POST['facebook'], true);
                     update_post_meta($post_id, 'Questions Asked', json_encode(array()), true);
                    
                }
                
                  if ($_FILES['logo']) {
                $uploadedfile = $_FILES['logo'];
                $upload_overrides = array('test_form' => false);
                $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
                if ($movefile) {
                    $wp_filetype = wp_check_filetype($movefile['file'], null);
                    $attachment = array(
                        'post_mime_type' => $wp_filetype['type'],
                        'post_title' => sanitize_file_name($movefile['file']),
                        'post_content' => '',
                        'post_status' => 'inherit'
                    );
                    $attach_id = wp_insert_attachment($attachment, $movefile['file'], $post_id);
                    $attach_data = wp_generate_attachment_metadata($attach_id, $file);
                    wp_update_attachment_metadata($attach_id, $attach_data);
                    set_post_thumbnail($post_id, $attach_id);
                }
            }

            
            
              if ($_POST['email']) {
   
    $email_to = $_POST['email'];

    $subject = "Thank You for registering with - IvyCamp.in";
   
    $content = "Hello  ".$_POST['investor_name'].",<br> <br>
      Welcome to the IvyCamp Platform. You have successfully registered. <br>
Within the next 48 hours, IvyCamp will schedule a brief phone discussion with you (at your convenience) to understand your investment goals and how IvyCamp may help you meet them. After the discussion, you will be provided with a link to activate your membership. 


<br><br>
Thank You<br>
IvyCamp Team<br><br><br><br><br><br>";

    $headers[] = 'From: IvyCamp <no-reply@ivycamp.in>';
    //$headers[] = 'Bcc: ivycamp@ivycapventures.com';
    $headers[] = 'Content-type:  text/html'; // note you can just use a simple email address

  
    $status = wp_mail($email_to, $subject, $content, $headers);
    if($status == '1')
    {
        //echo "success";
    }  else {
       // echo "fail";  
    }

    } 
    ?>
   <div class="dt-sc-margin100"></div>
 <h3>Thank you for Registering with IvyCamp. <br>
                    Please follow the instructions in your email  for next steps to activate your membership</h3>

<div class="dt-sc-margin100"></div>
    <?php    
    } else {
        ?>
        <div class="dt-sc-margin100"></div><h3> Email Id is already registered with us.</h3>
        <div class="dt-sc-margin100"></div>
   <?php  }
    ?>



            <div class="dt-sc-margin50"></div>



    </section> <!-- **Primary - Ends** -->          



</div> <!-- **container - Ends** --> 

<?php get_footer(); ?>
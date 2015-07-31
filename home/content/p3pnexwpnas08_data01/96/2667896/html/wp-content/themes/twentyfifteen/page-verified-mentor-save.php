<?php
get_header();

global $current_user;
get_currentuserinfo();


if (!function_exists('wp_handle_upload'))
    require_once( ABSPATH . 'wp-admin/includes/file.php' );

require_once(ABSPATH . 'wp-admin/includes/image.php');

$postCats = array($_POST['year_of_mentor']);
//print_r($postCats);
//echo "<br>";
if ($_POST['working_org'] == 'yes') {
    if (!empty($_POST['add_role'])) {
        $arg = array('parent' => 28);
        $my_cat_id = wp_insert_term($_POST['add_role'], "category", $arg);
        $role = $my_cat_id['term_id'];
        array_push($postCats, $my_cat_id['term_id']);
    } else {
        $role = $_POST['role'];
        array_push($postCats, $_POST['role']);
    }

   // echo "role";
   // print_r($postCats);
   // echo "<br>";
}
if (!empty($_POST['add_address'])) {
    $arg = array('parent' => 34);
    $my_cat_id = wp_insert_term($_POST['add_address'], "category", $arg);
    $city = $my_cat_id['term_id'];
    array_push($postCats, $my_cat_id['term_id']);
} else {
    $city = $_POST['address'];
    array_push($postCats, $_POST['address']);
}
//echo "address";
//print_r($postCats);
//echo "<br>";

$expertise_array = array();
if (isset($_POST['expertise'])) {
    $expertise = $_POST['expertise'];
    $ecount = count($_POST['expertise']);


    for ($i = 0; $i < $ecount; $i++) {


        if ($expertise[$i] == 'other') {
            if (!empty($_POST['add_expertise'])) {
                $arg = array('parent' => 147);
                $my_cat_id = wp_insert_term($_POST['add_expertise'], "category", $arg);
                $new_expertise_cat = $my_cat_id['term_id'];
            }
        } else {

            array_push($expertise_array, $expertise[$i]);
        }
    }
    if (isset($new_expertise_cat)) {
        array_push($expertise_array, $new_expertise_cat);
    }

    $postCats = array_merge($postCats, $expertise_array);
}



//if (isset($_POST['expertise'])) {
//    if (!empty($_POST['add_expertise'])) {
//        $arg = array('parent' => 147);
//        $my_cat_id = wp_insert_term($_POST['add_expertise'], "category", $arg);
//        $expertise = $my_cat_id['term_id'];
//        array_push($postCats, $my_cat_id['term_id']);
//    } //else {
//    $expertise = $_POST['expertise'];
//    $postCats = array_merge($postCats, $expertise);
//    // }
//}
//echo "expertise";
//print_r($postCats);
//echo "<br>";

$interest_to_mentor_array = array();
if (isset($_POST['interest_to_mentor'])) {
    $sector = $_POST['interest_to_mentor'];
    $scount = count($_POST['interest_to_mentor']);


    for ($i = 0; $i < $scount; $i++) {
        if ($sector[$i] == 'other') {
            if (!empty($_POST['add_sector'])) {
                $arg = array('parent' => 1);
                $my_cat_id = wp_insert_term($_POST['add_sector'], "category", $arg);
                $new_sector_cat = $my_cat_id['term_id'];
            }
        } else {

            array_push($interest_to_mentor_array, $sector[$i]);
        }
    }
    if (isset($new_sector_cat)) {
        array_push($interest_to_mentor_array, $new_sector_cat);
    }

    $postCats = array_merge($postCats, $interest_to_mentor_array);
}



//if (isset($_POST['interest_to_mentor'])) {
//    if (!empty($_POST['add_sector'])) {
//        $arg = array('parent' => 1);
//        $my_cat_id = wp_insert_term($_POST['add_sector'], "category", $arg);
//        $sector = $my_cat_id['term_id'];
//        array_push($postCats, $my_cat_id['term_id']);
//    } //else {
//    $sector = $_POST['interest_to_mentor'];
//    $postCats = array_merge($postCats, $sector);
//    // }
//}
//echo "interest_to_mentor";
///print_r($postCats);
//echo "<br>";
//if (isset($_POST['alumni_inst'])) {
//    if (!empty($_POST['add_alumni'])) {
//        $arg = array('parent' => 14);
//        $my_cat_id = wp_insert_term($_POST['add_alumni'], "category", $arg);
//        $institute = $my_cat_id['term_id'];
//        array_push($postCats, $my_cat_id['term_id']);
//    } //else {
//    $institute = $_POST['alumni_inst'];
//    // array_push($postCats, $_POST['alumni_inst']);
//    $postCats = array_merge($postCats, $institute);
//    //}
//}
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
//echo "<br>";
if (!empty($_POST['other_organization'])) {
    $arg = array('parent' => 14);
    $my_cat_id = wp_insert_term($_POST['other_organization'], "category", $arg);
    $member = $my_cat_id['term_id'];
    array_push($postCats, $my_cat_id['term_id']);
} else {
    $member = $_POST['member'];
    array_push($postCats, $_POST['member']);
}

//echo "member";
//print_r($postCats);
//echo "<br>";
//die;
?>


<div class="container">
    <!-- **primary - Starts** --> 
    <section id="primary" class="content-full-width">
        <!-- **woocommerce - Starts** --> 
        <div class="woocommerce">
            <?php
           



            $user_id = username_exists($_POST['email']);
            if (!$user_id && $_POST['email']!="" && $_POST['password']!="" && $_POST['mentor_name']!="" && $postCats!="") {
                $userdata = array(
                    'user_login' => $_POST['email'],
                    'user_email' => $_POST['email'],
                    'mentor_name' => $_POST['mentor_name'],
                    'first_name' => $_POST['mentor_name'],
                    'role' => 'contributor',
                    'user_pass' => $_POST['password']
                );

                $user_id = wp_insert_user($userdata);

                update_user_meta($user_id, 'entity', $_POST['entity']);


                $my_post = array(
                    'post_title' => $_POST['mentor_name'],
                    'post_status' => 'publish',
                    'post_type' => 'mentor',
                    'post_category' => $postCats,
                    'post_author' => $user_id,
                );
                $post_id = wp_insert_post($my_post);

                if ($post_id) {

                    update_post_meta($post_id, 'Secondary Role', $_POST['secrole'], true);

                    update_post_meta($post_id, 'Address', $_POST['address'], true);
                    update_post_meta($post_id, 'Areas of expertise', implode(',', $expertise_array), true);
                    update_post_meta($post_id, 'Alumni of Institute', implode(',', $institute_array), true);
                    update_post_meta($post_id, 'Organization', $_POST['organization'], true);
                    update_post_meta($post_id, 'Currently working at', $_POST['working_org'], true);
                    update_post_meta($post_id, 'Role', $role, true);
                    update_post_meta($post_id, 'Mobile', $_POST['mobile'], true);
                    update_post_meta($post_id, 'Email', $_POST['email'], true);
                    update_post_meta($post_id, 'Password', $_POST['password'], true);
                    update_post_meta($post_id, 'City Of location', $city, true);
                    // update_post_meta($post_id, 'Alumni of Institute', $_POST['alumni_inst'], true);
                    update_post_meta($post_id, 'Member of Organizations', $member, true);
                    update_post_meta($post_id, 'interest to mentor', implode(',', $interest_to_mentor_array), true);
                    update_post_meta($post_id, 'Companies associated', $_POST['company_associate'], true);
                    update_post_meta($post_id, 'Years as a mentor', $_POST['year_of_mentor'], true);
                    update_post_meta($post_id, 'Twitter', $_POST['twitter'], true);
                    update_post_meta($post_id, 'Website', $_POST['website'], true);
                    update_post_meta($post_id, 'Facebook', $_POST['facebook'], true);
                    update_post_meta($post_id, 'User Likes', json_encode(array()), true);
                    update_post_meta($post_id, 'Questions Asked', json_encode(array()), true);
                    update_post_meta($post_id, 'Interested in Investing', json_encode(array()), true);
                     update_post_meta($post_id, 'post_views_count', json_encode(array()), true);
                    
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

//                if ($_POST['email']) {
//   
//    $email_to = $_POST['email'];
//
//    $subject = "Thank You for registering with - IvyCamp.in";
//   
//    $content = "Hello  ".$_POST['mentor_name'].",<br> <br>
//       Welcome to the IvyCamp Platform. You have successfully registered. <br>
//Click on the link below to complete the registration process. By clicking on the link you agree to the additional terms and conditions laid out in this email. 
//
//<br> <br>
//<u>Additional Terms and Conditions</u>
//<br> <br>
//
//IvyCamp will schedule a brief phone discussion with the mentor( at his/her convenience) to understand the mentor goals and how the mentor expertise could be best leveraged. After the discussion, the mentor will be provided with a login link 
//<br>
//There will be an annual fee of Rs. 5,000 to register on IvyCamp. This fee is waived for the first six months and will be charged if you choose to continue participating as a mentor on the IvyCamp platform 6 months after your registration date.
//<br>
//As a mentor, you can view summary information on all the startups that are on the Ivy
//Camp Platform. You can then select upto 3 startups for whom you can view details in order to choose whether to mentor them. If you would like details on more than 3 startups, you will need to send an email to us at ivycamp@ivycapventures.com for us to provide you that access
//
//<br>
//If you choose to invest in any of the IvyCamp startups, you will need to send us an email at ivycamp@ivycapventures.com to be provided this access. You will then be charged an annual fee of Rs. 30,000 (again waived for the first 6 months after originally registering) as an investor.
//<br>
//If you do fund any startup on the IvyCamp platform, you will be charged an administrative fee of  1% of the amount of funding.
//<br>
//<br>
//
//<b><u><a href ='http://ivycamp.in/login/'>Activate Membership</a></u></b><br><br>";
//  
//    $headers[] = 'From: IvyCaamp <no-reply@ivycamp.in>';
//    $headers[] = 'Bcc: ivycamp@ivycapventures.com';
//    $headers[] = 'Content-type:  text/html'; // note you can just use a simple email address
//
//  
//    $status = wp_mail($email_to, $subject, $content, $headers);
//    if($status == '1')
//    {
//        //echo "success";
//    }  else {
//       // echo "fail";  
//    }
//
//    } 
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
<?php
 get_header();
global $current_user;

get_currentuserinfo();

if (!function_exists('wp_handle_upload'))
    require_once( ABSPATH . 'wp-admin/includes/file.php' );



require_once(ABSPATH . 'wp-admin/includes/image.php' );

    $postCats = array();
///////////////////////// key city ////////////////////////////////////////
    $key_city_array = array();
if(isset($_POST['key_city']))
{
$key_city = $_POST['key_city'];
    $kccount = count($_POST['key_city']);
    for ($i = 0; $i < $kccount; $i++) {
          if ($key_city[$i] == 'other') {
    if (!empty($_POST['add_key_city'])) {
        $arg = array('parent' => 34);
        $my_cat_id = wp_insert_term($_POST['add_key_city'], "category", $arg);
        $key_new_city = $my_cat_id['term_id'];
            }
          }
          else
              {
                array_push($key_city_array, $key_city[$i]);
              }
    
    if (isset($key_new_city)) {
        array_push($key_city_array, $key_new_city);
    }
    }
    $postCats = array_merge($postCats, $key_city_array);
}



// print_r($postCats);
//////////////////////////////  key member ////////////////////////////////////////
$key_member_array = array();
if ($_POST['member_org']) {
    $key_member = $_POST['member_org'];
    $kcount = count($_POST['member_org']);

    for ($i = 0; $i < $kcount; $i++) {
        if ($key_member[$i] == 'other') {
            $arg = array('parent' => 28);
            $my_cat_id = wp_insert_term($_POST['member_type'], "category", $arg);
            $new_key_member = $my_cat_id['term_id'];
        } else {
            array_push($key_member_array, $key_member[$i]);
        }
    }
    if (isset($new_key_member)) {
        array_push($key_member_array, $new_key_member);
    }
    $postCats = array_merge($postCats, $key_member_array);
}

//////////////////////////////  City ////////////////////////////////////////
if (!empty($_POST['add_city'])) {

    $arg = array('parent' => 34);

    $my_cat_id = wp_insert_term($_POST['add_city'], "category", $arg);
    $city = $my_cat_id['term_id'];

    array_push($postCats, $my_cat_id['term_id']);
} else {

    $city = $_POST['address'];

    array_push($postCats, $_POST['address']);
}


//////////////////////////////  $mentoring_array ////////////////////////////////////////

$mentoring_array = array();
if (isset($_POST['mentoring'])) {
    $mentoring = $_POST['mentoring'];
    $mcount = count($_POST['mentoring']);
    for ($i = 0; $i < $mcount; $i++) {
        if ($mentoring[$i] == 'other') {
            $arg = array('parent' => 50);
            $my_cat_id = wp_insert_term($_POST['add_mentoring'], "category", $arg);
            $new_mentoring_cat = $my_cat_id['term_id'];
        } else {
            array_push($mentoring_array, $mentoring[$i]);
        }
    }
    if (isset($new_mentoring_cat)) {
        array_push($mentoring_array, $new_mentoring_cat);
    }
    $postCats = array_merge($postCats, $mentoring_array);
}



//////////////////////////////  Support looking  ////////////////////////////////////////



$support_array = array();
if (isset($_POST['support_looking'])) {
    $support_looking = $_POST['support_looking'];
    $scount = count($_POST['support_looking']);
    for ($i = 0; $i < $scount; $i++) {
        if ($support_looking[$i] == 'other') {
            $arg = array('parent' => 72);
            $my_cat_id = wp_insert_term($_POST['add_support'], "category", $arg);
            $new_support_cat = $my_cat_id['term_id'];
        } else {
            array_push($support_array, $support_looking[$i]);
        }
    }
    if (isset($new_support_cat)) {
        array_push($support_array, $new_support_cat);
    }
    $postCats = array_merge($postCats, $support_array);
}




//if (isset($_POST['support_looking'])) {
//    if (!empty($_POST['add_support'])) {
//        $arg = array('parent' => 72);
//        $my_cat_id = wp_insert_term($_POST['add_support'], "category", $arg);
//        $support_looking = $my_cat_id['term_id'];
//
//        // print_r($support_looking);
//        array_push($postCats, $my_cat_id['term_id']);
//    }
//    $support_looking = $_POST['support_looking'];
////        if(in_array('other', $support_looking))
////        {
////            
////        }
//    //  print_r($support_looking);
//    $count = count($support_looking);
//
//    for ($i = 0; $i < $count; $i++) {
//        if ($support_looking[$i] != 'other') {
//            array_push($postCats, $support_looking[$i]);
//        }
//    }
//    //      $postCats = array_merge($postCats, $support_looking);
//}





////////////////////////////////  Role  ////////////////////////////////////////


$role_array = array();

if (isset($_POST['role'])) {
    $role = $_POST['role'];
    $rcount = count($_POST['role']);
    for ($i = 0; $i < $rcount; $i++) {
        if ($role[$i] == 'other') {
            $arg = array('parent' => 50);
            $my_cat_id = wp_insert_term($_POST['add_role'], "category", $arg);
            $new_role_cat = $my_cat_id['term_id'];
        } else {
            array_push($role_array, $role[$i]);
        }
    }
    if (isset($new_role_cat)) {
        array_push($role_array, $new_role_cat);
    }
    $postCats = array_merge($postCats, $role_array);
}

 //print_r($postCats); //  die;
//////////////////////////////  Institute  ////////////////////////////////////////


$institute_array = array();
if (isset($_POST['institute_name'])) {
    $institute = $_POST['institute_name'];
    $icount = count($_POST['institute_name']);


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
//echo "<br>";
 //print_r($postCats);
//////////////////////////////  Sector  ////////////////////////////////////////

$sector_array = array();
    if (isset($_POST['sector'])) {
        $sector = $_POST['sector'];
        $scount = count($_POST['sector']);
        for ($i = 0; $i < $scount; $i++) {
            if ($sector[$i] == 'other') {
                if (!empty($_POST['add_sector'])) {
                    $arg = array('parent' => 1);
                    $my_cat_id = wp_insert_term($_POST['add_sector'], "category", $arg);
                    $sector_new_city = $my_cat_id['term_id'];
                }
            } else {
                array_push($sector_array, $sector[$i]);
            }

            if (isset($sector_new_city)) {
                array_push($sector_array, $sector_new_city);
            }
        }
        $postCats = array_merge($postCats, $sector_array);
    }
//echo "<br>";
//print_r($postCats); die;
?>





<div class="container">

    <!-- **primary - Starts** --> 

    <section id="primary" class="content-full-width">

        <!-- **woocommerce - Starts** --> 

        <div class="woocommerce">

<?php
$user_id = username_exists($_POST['email']);

if (!$user_id && $_POST['email'] != "" && $_POST['password'] != "" && $_POST['innovation_name']!="" && $postCats!="") {

    $userdata = array(
        'user_login' => $_POST['email'],
        'user_email' => $_POST['email'],
        'first_name' => $_POST['innovator_name'],
        'innovator_name' => $_POST['innovator_name'],
        'role' => 'contributor',
        'user_pass' => $_POST['password']
    );



    $user_id = wp_insert_user($userdata);



    update_user_meta($user_id, 'entity', $_POST['entity']);




    $my_post = array(
        'post_title' => $_POST['innovation_name'],
        'post_status' => 'publish',
        'post_type' => 'innovator',
        'post_category' => $postCats,
        'post_author' => $user_id,);

    $post_id = wp_insert_post($my_post);



    if ($post_id) {

        update_post_meta($post_id, 'member First name', implode(',', $_POST['member_fname']), true);

        update_post_meta($post_id, 'member Last name', implode(',', $_POST['member_lname']), true);

        update_post_meta($post_id, 'member mobile', implode(',', $_POST['member_mobile']), true);

        update_post_meta($post_id, 'member email', implode(',', $_POST['member_email']), true);

        update_post_meta($post_id, 'member address', implode(',', $key_city_array), true);

        update_post_meta($post_id, 'Secondary Role', $_POST['secrole'], true);

        update_post_meta($post_id, 'Innovation Name', $_POST['innovation_name'], true);

        update_post_meta($post_id, 'Innovator Name', $_POST['innovator_name'], true);

        update_post_meta($post_id, 'Mentoring Required', implode(',', $mentoring_array), true); // not using

        update_post_meta($post_id, 'Mentoring', implode(',', $mentoring_array), true);

        update_post_meta($post_id, 'sayear', $_POST['sayear'], true);

        update_post_meta($post_id, 'member name', implode(',', $_POST['member_name']), true);

        update_post_meta($post_id, 'member contact', implode(',', $_POST['member_contact']), true);

        update_post_meta($post_id, 'Members of Organizations', implode(',', $key_member_array), true);

        update_post_meta($post_id, 'Address', $city, true);

        update_post_meta($post_id, 'Sector', implode(',', $sector_array), true);

        update_post_meta($post_id, 'Mobile', $_POST['mobile'], true);

        update_post_meta($post_id, 'email', $_POST['email'], true);

        update_post_meta($post_id, 'password', $_POST['password'], true);

        update_post_meta($post_id, 'Website', $_POST['website'], true);

        update_post_meta($post_id, 'Facebook', $_POST['facebook'], true);

        update_post_meta($post_id, 'Twitter', $_POST['twitter'], true);

        update_post_meta($post_id, 'One line pitch', $_POST['linepitch'], true);

        // update_post_meta($post_id, 'S/A Year', $_POST['sayear'], true);
        update_post_meta($post_id, 'Summary of innovation', $_POST['summary_innovation'], true);
        update_post_meta($post_id, 'Summary of market addressed', $_POST['market_address'], true);
        update_post_meta($post_id, 'Key differentiator/ISP', $_POST['key_differentiator'], true);

        update_post_meta($post_id, 'Key competitors', $_POST['key_competitors'], true);

        update_post_meta($post_id, 'Innovation pitch ', $_POST['innovatiobn_pitch'], true);

        update_post_meta($post_id, 'Twitter pitch', $_POST['twitter_pitch'], true);
        update_post_meta($post_id, 'Status of patent', $_POST['status_of_patent'], true);
        update_post_meta($post_id, 'Support you are looking for', implode(',', $support_array), true);
        update_post_meta($post_id, 'upload vlink', $_POST ['upload_vlink'], true);
        update_post_meta($post_id, 'Student Or Alumni', $_POST['student_alumni'], true);
        update_post_meta($post_id, 'Year of graduation', $_POST['graduation'], true);
        update_post_meta($post_id, 'Institute Name', implode(',', $institute_array), true);
        update_post_meta($post_id, 'Interested in Investing', json_encode(array()), true);
        update_post_meta($post_id, 'Show Interest', json_encode(array()), true);
        update_post_meta($post_id, 'Questions Asked', json_encode(array()), true);
        update_post_meta($post_id, 'Interested in Incubating', json_encode(array()), true);
        update_post_meta($post_id, 'Role', implode(',', $role_array));
         update_post_meta($post_id, 'post_views_count', json_encode(array()), true);
        if ($_FILES['upload_logo']) {

            $uploadedfile = $_FILES['upload_logo'];
            $upload_overrides = array('test_form' => false);

            $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
            if ($movefile) {

                $wp_filetype = wp_check_filetype($movefile['file'], null);
                $attachment = array(
                    'post_mime_type' => $wp_filetype['type'], 'post_title' => sanitize_file_name($movefile['file']),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );

                $attach_id = wp_insert_attachment($attachment, $movefile['file'], $post_id);

                $attach_data = wp_generate_attachment_metadata($attach_id, $file);

                wp_update_attachment_metadata($attach_id, $attach_data);
                set_post_thumbnail($post_id, $attach_id);
            }
        }





        $extraAttachments = array();



        if ($_FILES['upload_doc']) {



            $files = $_FILES['upload_doc'];

            foreach ($files['name'] as $key => $value) {

                if ($files['name'][$key]) {

                    $file = array(
                        'name' => $files['name'][$key],
                        'type' => $files ['type'][$key], 'tmp_name' => $files['tmp_name'][$key],
                        'error' => $files['error'][$key], 'size' => $files['size'][$key]
                    );



                    $upload_overrides = array('test_form' => false);

                    $movefile = wp_handle_upload($file, $upload_overrides);

                    if ($movefile) {

                        $wp_filetype = wp_check_filetype($movefile['file'], null);

                        $attachment = array(
                            'post_mime_type' => $wp_filetype['type'], 'post_title' => sanitize_file_name($movefile['file']),
                            'post_content' => '',
                            'post_status' => 'inherit'
                        );

                        $attach_id = wp_insert_attachment($attachment, $movefile['file'], $post_id);

                        if ($attach_id) {
                            array_push($extraAttachments, $attach_id);
                        }
                    }
                }
            }









            update_post_meta($post_id, 'File Attach', json_encode($extraAttachments));
        }
    }

    if ($_POST['email']) {

        $email_to = $_POST['email'];

        $subject = "Thank You for registering with - IvyCamp";

        $content = "Hello  " . $_POST['innovator_name'] . ",<br> <br>
       Welcome to the IvyCamp Platform. You have successfully registered. 
Please click on the link at the end of this email to activate your membership on the Platform. By clicking on the link you agree to the additional terms and conditions laid out in this email. 
<br>
<br>
<u>Additional Terms and Conditions</u><br>
<br>
There is no fee for registering and uploading your details on the IvyCamp Platform. However there may be a small fee in case you would like to catch the attention of specific investors by taking our Funding Eligibility Score Test available on the IvyCamp platform. This test is based on a questionnaire you will shortly find on your dashboard post your registration. This score will help you in getting the Funds that you are eligible for.
<br>
The questionnaire will be made available shortly. The fees for generating the IvyCamp Score using this questionnaire is Rs. 2500.
<br>
Once the Funding Eligibility Score is generated, you cannot regenerate a new score prior to 3 months from the date of the first score generation.  
  <br>
If you receive funding from an investor on the IvyCamp Platform, you will be charged an administration fee of 1% of the funding received. But, this fee will be waived in the case when IvyCap Ventures Advisors Private Limited Invests through one of the funds under its management.
<br><br>
<b><u><a href ='http://ivycamp.in/login/'>Activate Membership</a></u></b><br><br>
    Thank You<br>
IvyCamp Team<br><br><br><br><br><br>"; 





        $headers[] = 'From: IvyCamp <no-reply@ivycamp.in>';
        //$headers[] = 'Bcc: ivycamp@ivycapventures.com';
        $headers[] = 'Content-type:  text/html'; // note you can just use a simple email address


        $status = wp_mail($email_to, $subject, $content, $headers);
        if ($status == '1') {
            //echo "success";
        } else {
            // echo "fail";  
        }
    }
    ?>           
                <div class="dt-sc-margin100"></div>
                 <h3>Thank you for Registering with IvyCamp. <br>
                    Please follow the instructions in your email for next steps to activate your membership</h3>

                <div class="dt-sc-margin100"></div>
                <?php
            } else {
                ?>
                <div class="dt-sc-margin100"></div><h3> Email Id is already registered with us.</h3>
                <div class="dt-sc-margin100"></div>
            <?php }
            ?>



            <div class="dt-sc-margin50"></div>



    </section> <!-- **Primary - Ends** -->          



</div> <!-- **container - Ends** --> 

<?php get_footer(); ?>
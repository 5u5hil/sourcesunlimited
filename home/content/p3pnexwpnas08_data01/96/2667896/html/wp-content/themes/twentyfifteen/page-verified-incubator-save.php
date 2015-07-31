<?php 
get_header();

global $current_user;
get_currentuserinfo();


if (!function_exists('wp_handle_upload'))
    require_once( ABSPATH . 'wp-admin/includes/file.php' );

require_once(ABSPATH . 'wp-admin/includes/image.php');


$postCats = array();
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


$sector_array = array();
if(isset($_POST['sector']))
{
$sector = $_POST['sector'];
    $scount = count($_POST['sector']);
    for ($i = 0; $i < $scount; $i++) {
          if ($sector[$i] == 'other') {
    if (!empty($_POST['add_sector'])) {
        $arg = array('parent' => 1);
        $my_cat_id = wp_insert_term($_POST['add_sector'], "category", $arg);
        $sector_new_city = $my_cat_id['term_id'];
            }
          }
          else
              {
                array_push($sector_array, $sector[$i]);
              }
    
    if (isset($sector_new_city)) {
        array_push($sector_array, $sector_new_city);
    }
    }
    $postCats = array_merge($postCats, $sector_array);
}


$service_array = array();
if(isset($_POST['service_provided']))
{
$service_provided = $_POST['service_provided'];
    $spcount = count($_POST['service_provided']);
    for ($i = 0; $i < $spcount; $i++) {
          if ($service_provided[$i] == 'other') {
    if (!empty($_POST['service_id'])) {
        $arg = array('parent' => 50);
        $my_cat_id = wp_insert_term($_POST['service_id'], "category", $arg);
        $service_new_city = $my_cat_id['term_id'];
            }
          }
          else
              {
                array_push($service_array, $service_provided[$i]);
              }
    
    if (isset($service_new_city)) {
        array_push($service_array, $service_new_city);
    }
    }
    $postCats = array_merge($postCats, $service_array);
}



$tools_array = array();
if(isset($_POST['tools_provided']))
{
$tools_provided = $_POST['tools_provided'];
    $tpcount = count($_POST['tools_provided']);
    for ($i = 0; $i < $tpcount; $i++) {
          if ($tools_provided[$i] == 'other') {
    if (!empty($_POST['tool_id'])) {
        $arg = array('parent' => 327);
        $my_cat_id = wp_insert_term($_POST['tool_id'], "category", $arg);
        $tools_new_city = $my_cat_id['term_id'];
            }
          }
          else
              {
                array_push($tools_array, $tools_provided[$i]);
              }
    
    if (isset($tools_new_city)) {
        array_push($tools_array, $tools_new_city);
    }
    }
    $postCats = array_merge($postCats, $tools_array);
}


if (isset($_POST['funding_provided'])) {
    if (!empty($_POST['funding_id'])) {
        $arg = array('parent' => 333);
        $my_cat_id = wp_insert_term($_POST['funding_id'], "category", $arg);
        $funding_provided= $my_cat_id['term_id'];
        array_push($postCats, $my_cat_id['term_id']);
    } else {
        $funding_provided = $_POST['funding_provided'];
        array_push($postCats, $_POST['funding_provided']);
    }
}


if (isset($_POST['incubatee_supported'])) {
    if (!empty($_POST['support_id'])) {
        $arg = array('parent' => 323);
        $my_cat_id = wp_insert_term($_POST['support_id'], "category", $arg);
        $incubatee_supported = $my_cat_id['term_id'];
        array_push($postCats, $my_cat_id['term_id']);
    } else {
        $incubatee_supported = $_POST['incubatee_supported'];
        array_push($postCats, $_POST['incubatee_supported']);
    }
}

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

if (isset($_POST['corporate'])) {
    if (!empty($_POST['add_corpoarte'])) {
        $arg = array('parent' => 340);
        $my_cat_id = wp_insert_term($_POST['add_corpoarte'], "category", $arg);
        $corporate = $my_cat_id['term_id'];
        array_push($postCats, $my_cat_id['term_id']);
    } else {
        $corporate = $_POST['corporate'];
        array_push($postCats, $_POST['corporate']);
    }
}


if (isset($_POST['investment_network'])) {
    if (!empty($_POST['add_investment'])) {
        $arg = array('parent' => 157);
        $my_cat_id = wp_insert_term($_POST['add_investment'], "category", $arg);
        $investment_network = $my_cat_id['term_id'];
        array_push($postCats, $my_cat_id['term_id']);
    } else {
        $investment_network = $_POST['investment_network'];
        array_push($postCats, $_POST['investment_network']);
    }
}


?>
<div class="container">
    <!-- **primary - Starts** --> 
    <section id="primary" class="content-full-width">
        <!-- **woocommerce - Starts** --> 
        <div class="woocommerce">
<?php
$user_id = username_exists($_POST['email']);
if (!$user_id && $_POST['contact_name'] != "" && $postCats != ""  && $_POST['email'] != "" && $_POST['password'] != "" ) {
    $userdata = array(
        'user_login' => $_POST['email'],
        'user_email' => $_POST['email'],
        'first_name' => $_POST['contact_name'],
        //'last_name' => $_POST['contact_name'],
        'role' => 'contributor',
        'user_pass' => $_POST['password']
    );

    $user_id = wp_insert_user($userdata);

    update_user_meta($user_id, 'entity', $_POST['entity']);


    $my_post = array(
        'post_title' => $_POST['contact_name'],
        'post_status' => 'publish',
        'post_type' => 'incubator',
        'post_category' => $postCats,
        'post_author' => $user_id,
    );
    $post_id = wp_insert_post($my_post);

    if ($post_id) {
        
        update_post_meta($post_id, 'Institute Name', implode(',',$institute_array), true);
        update_post_meta($post_id, 'Corporate', $_POST['corporate_name'], true);
        update_post_meta($post_id, 'Investment Network', $_POST['investment_network'], true);
        update_post_meta($post_id, 'Other associate', $_POST['other_associate'], true);

        update_post_meta($post_id, 'Secondary Role', $_POST['secrole'], true);
        update_post_meta($post_id, 'Contact Person Name', $_POST['cname'], true);
        update_post_meta($post_id, 'Address', $city, true);
        update_post_meta($post_id, 'Website', $_POST['website'], true);
        update_post_meta($post_id, 'Email', $_POST['email'], true);
        update_post_meta($post_id, 'Mobile', $_POST['mobile'], true);
        update_post_meta($post_id, 'Facebook', $_POST['facebook'], true);
        update_post_meta($post_id, 'incubator name', $_POST['incubator_name'], true);
        update_post_meta($post_id, 'year started', $_POST['year_started'], true);
        update_post_meta($post_id, 'Sector', implode(',', $sector_array), true);
        update_post_meta($post_id, 'Independant or Associated', $_POST['independant_associated'], true);
        update_post_meta($post_id, 'partners', $_POST['partners'], true);
        update_post_meta($post_id, 'Associated', $_POST['associate'], true);
        
        update_post_meta($post_id, 'Incubation Center', $_POST['incubation_center'], true);
        update_post_meta($post_id, 'facilities provided', $_POST['facilities_provided'], true);
        update_post_meta($post_id, 'fees incubatees', $_POST['fees_incubatees'], true);
        update_post_meta($post_id, 'criteria incubatees', $_POST['criteria_incubatees'], true);
        update_post_meta($post_id, 'incubation process', $_POST['incubation_process'], true);
        update_post_meta($post_id, 'contact name', $_POST['contact_name'], true);
        update_post_meta($post_id, 'mobile', $_POST['mobile'], true);
        update_post_meta($post_id, 'landline', $_POST['landline'], true);
        update_post_meta($post_id, 'password', $_POST['password'], true);
        // update_post_meta($post_id, 'Mentoring required', implode(',', $mentoring_array), true);
        update_post_meta($post_id, 'service provided', implode(',',$service_array), true);
        update_post_meta($post_id, 'tools provided', implode(',',$tool_array), true);
        update_post_meta($post_id, 'incubatee supported', $_POST['incubatee_supported'], true);
        update_post_meta($post_id, 'funding provided', $_POST['funding_provided'], true);
        update_post_meta($post_id, 'facebook', $_POST['facebook'], true);
        update_post_meta($post_id, 'recent article', $_POST['recent_article'], true);
          
        update_post_meta($post_id, 'sample company', $_POST['sample_comp'], true);
            
        
        update_post_meta($post_id, 'Interested in Investing', json_encode(array()), true);
        update_post_meta($post_id, 'Show Interest', json_encode(array()), true);
        update_post_meta($post_id, 'User Likes', json_encode(array()), true);
        update_post_meta($post_id, 'post_views_count', json_encode(array()), true);



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

        $extraAttachments = array();

        if ($_FILES['upload_video']) {

            $files = $_FILES['upload_video'];
            foreach ($files['name'] as $key => $value) {
                if ($files['name'][$key]) {
                    $file = array(
                        'name' => $files['name'][$key],
                        'type' => $files['type'][$key],
                        'tmp_name' => $files['tmp_name'][$key],
                        'error' => $files['error'][$key],
                        'size' => $files['size'][$key]
                    );

                    $upload_overrides = array('test_form' => false);
                    $movefile = wp_handle_upload($file, $upload_overrides);
                    if ($movefile) {
                        $wp_filetype = wp_check_filetype($movefile['file'], null);
                        $attachment = array(
                            'post_mime_type' => $wp_filetype['type'],
                            'post_title' => sanitize_file_name($movefile['file']),
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

        $subject = "Thank You for registering with - IvyCamp.in";

        $content = "Hello  " . $_POST['first_name'] . ",<br> <br>
       Welcome to the IvyCamp Platform. You have successfully registered.  <br><br>
Please click on the Activate Membership link at the end of this email to activate your membership on the Platform. By clicking on the link you agree to the additional terms and conditions laid out in this email. 
<br>
<br>
<u>Additional Terms and Conditions</u><br>
<br><br>
For the first six months after registering on the platform, there is no annual fee.
<br><br>
For any investment made in a startup on this platform, you will be charged an administrative fee of 1% of the amount of your investment.
<br><br>

<b><u><a href ='http://ivycamp.in/login/'>Activate Membership</a></u></b><br><br>
    Thank You<br>
IvyCamp Team<br><br><br><br><br><br>"; 




        $headers[] = 'From: IvyCamp <no-reply@ivycamp.in>';
        $headers[] = 'Bcc: ivycamp@ivycapventures.com';
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
                    Please follow the instructions in your email  for next steps to activate your membership</h3>

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
<?php
get_footer();
?>
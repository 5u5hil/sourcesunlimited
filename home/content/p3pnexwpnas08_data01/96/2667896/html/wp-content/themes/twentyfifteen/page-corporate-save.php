<?php
get_header();
global $current_user;
get_currentuserinfo();
$postCats = array();


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
//if (isset($_POST['institute_name'])) {
//    if (!empty($_POST['add_institute'])) {
//        $arg = array('parent' => 18);
//        $my_cat_id = wp_insert_term($_POST['add_institute'], "category", $arg);
//        $institute = $my_cat_id['term_id'];
//        array_push($postCats, $my_cat_id['term_id']);
//    } // else {
//    $institute = $_POST['institute_name'];
//    $postCats = array_merge($postCats, $institute);
//    //}
//}
// echo "institute_name";
//print_r( $postCats );
//echo "<br>";
if (!empty($_POST['add_city'])) {
    $arg = array('parent' => 34);
    $my_cat_id = wp_insert_term($_POST['add_city'], "category", $arg);
    $city = $my_cat_id['term_id'];
    array_push($postCats, $my_cat_id['term_id']);
} else {
    $city = $_POST['address'];
    array_push($postCats, $_POST['address']);
}
//  echo "city";
// print_r( $postCats );
//  echo "<br>";

$member_array = array();
if (isset($_POST['member'])) {
    $member = $_POST['member'];
    $mcount = count($_POST['member']);


    for ($i = 0; $i < $mcount; $i++) {


        if ($member[$i] == 'other') {
            if (!empty($_POST['add_institute'])) {
                $arg = array('parent' => 14);
                $my_cat_id = wp_insert_term($_POST['add_institute'], "category", $arg);
                $new_member_cat = $my_cat_id['term_id'];
            }
        } else {

            array_push($member_array, $member[$i]);
        }
    }
    if (isset($new_member_cat)) {
        array_push($member_array, $new_member_cat);
    }

    $postCats = array_merge($postCats, $member_array);
}


//if (isset($_POST['member'])) {
//    if (!empty($_POST['other_organization'])) {
//        $arg = array('parent' => 14);
//        $my_cat_id = wp_insert_term($_POST['other_organization'], "category", $arg);
//        $member = $my_cat_id['term_id'];
//        array_push($postCats, $my_cat_id['term_id']);
//    } //else {
//    $member = $_POST['member'];
//    $postCats = array_merge($postCats, $member);
//    // }
//}

// echo "member";
// print_r( $postCats );
// echo "<br>";

if (isset($_POST['sector'])) {

    $sector = $_POST['sector'];
    $postCats = array_merge($postCats, $sector);
    
}
// echo "mentor";
// print_r( $postCats );
// echo "<br>";

if (isset($_POST['isector'])) {
    $isector = $_POST['isector'];
    $postCats = array_merge($postCats, $isector);
}

// print_r($postCats); die;
?>
<div class="container">
    <!-- **primary - Starts** -->     
    <section id="primary" class="content-full-width">
        <!-- **woocommerce - Starts** -->         
        <div class="woocommerce">
            <?php
            $user_id = username_exists($_POST['email']);
            if (!$user_id && $_POST['email'] != "" && $_POST['password'] != "" && $_POST['corporation_name'] != "" && $postCats != "" ) {
                $other_organization = $_POST['other_organization'];
                $userdata = array('user_login' => $_POST['email'], 'user_email' => $_POST['email'], 'corporation_name' => $_POST['corporation_name'], 'first_name' => $_POST['corporation_name'], 'role' => 'contributor', 'user_pass' => $_POST['password']);
                $user_id = wp_insert_user($userdata);
                update_user_meta($user_id, 'entity', $_POST['entity']);
                $my_post = array('post_title' => $_POST['corporation_name'], 'post_status' => 'private', 'post_type' => 'corporate', 'post_category' => $postCats, 'post_author' => $user_id,);
                $post_id = wp_insert_post($my_post);
                if ($post_id) {
                    update_post_meta($post_id, 'Secondary Role', $_POST['secrole'], true);
                    update_post_meta($post_id, 'Corporation name', $_POST['corporation_name'], true);
                    update_post_meta($post_id, 'Institute name', implode(',', $institute_array), true);
                    update_post_meta($post_id, 'CEO', $_POST['ceo_name'], true);
                    update_post_meta($post_id, 'Mobile', $_POST['mobile'], true);
                    update_post_meta($post_id, 'City Of location', $city, true);
                   // update_post_meta($post_id, 'Interest mentor', implode(',', $mentor), true);
                    update_post_meta($post_id, 'Landline', $_POST['landline'], true);
                    update_post_meta($post_id, 'Member of Organizations', implode(',', $member_array), true);
                    update_post_meta($post_id, 'Sector of interest', implode(',', $sector), true);
                    update_post_meta($post_id, 'InnovatorsSectors', implode(',', $isector), true);
                    update_post_meta($post_id, 'Other organization', $_POST['other_organization'], true);
                    update_post_meta($post_id, 'Incubation program', $_POST['incubation_program'], true);
                    update_post_meta($post_id, 'Entrepreneurship Programs', $_POST['entrepreneurship_programs'], true);
                    update_post_meta($post_id, 'Twitter', $_POST['twitter'], true);
                    update_post_meta($post_id, 'Website', $_POST['website'], true);
                     update_post_meta($post_id, 'Email', $_POST['email'], true);
                    update_post_meta($post_id, 'password', $_POST['password'], true);
                    update_post_meta($post_id, 'Facebook', $_POST['facebook'], true);
                    update_post_meta($post_id, 'User Likes', json_encode(array()), true);
                    update_post_meta($post_id, 'Questions Asked', json_encode(array()), true);
                     update_post_meta($post_id, 'post_views_count', json_encode(array()), true);
                } if ($_POST['email']) {
                      $email_to = $_POST['email'];

    $subject = "Thank You for registering with - IvyCamp";
   
    $content = "Hello  ".$_POST['corporation_name'].",<br> <br>
    Welcome to the IvyCamp Platform. You have successfully registered. <br>
Within the next 48 hours, IvyCamp will schedule a brief phone discussion with you (at your convenience) to understand your entrepreneurship and innovation related goals and how IvyCamp may help you meet them. After the discussion, you will be provided with a link to activate your membership. 
<br>
<br>
Thank You<br>
IvyCamp Team<br><br><br><br><br><br>";

    $headers[] = 'From: IvyCamp <no-reply@ivycamp.in>';
    $headers[] = 'Bcc: ivycamp@ivycapventures.com';
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
   <?php 
            }
            ?>            
            <div class="dt-sc-margin50"></div>
    </section>

</div> <!-- **container - Ends** --> 

<?php get_footer(); ?>
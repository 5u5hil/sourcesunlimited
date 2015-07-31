<?php  get_header();
if($_POST['incubation']=='yes')
            {
                $postCats = array($_POST['person_role'],$_POST['year_inception']); 
            }  else {
                 $postCats = array($_POST['person_role']);
            }
           
// print_r($postCats);    
            if (!empty($_POST['add_institute'])) {
                $arg = array('parent' => 18);
                $my_cat_id = wp_insert_term($_POST['add_institute'], "category", $arg);
                $institute = $my_cat_id['term_id'];
                array_push($postCats, $my_cat_id['term_id']);
            } else {
                $institute = $_POST['institute_name'];
                array_push($postCats, $_POST['institute_name']);
            }
          //  echo "institute_name";
          // print_r($postCats);    
//echo "<br/>";
            if (!empty($_POST['add_city'])) {
                $arg = array('parent' => 34);
                $my_cat_id = wp_insert_term($_POST['add_city'], "category", $arg);
                $city = $my_cat_id['term_id'];
                array_push($postCats, $my_cat_id['term_id']);
            } else {
                $city = $_POST['city'];
                array_push($postCats, $_POST['city']);
            }
          //  echo "city";
          // print_r($postCats);    
//echo "<br/>";
            if (!empty($_POST['add_position'])) {
                $arg = array('parent' => 45);
                $my_cat_id = wp_insert_term($_POST['add_position'], "category", $arg);
                $position = $my_cat_id['term_id'];
                array_push($postCats, $my_cat_id['term_id']);
            } else {
                $position = $_POST['pos'];
                array_push($postCats, $_POST['pos']);
            }
         //   echo "pos";
         //  print_r($postCats);    
//echo "<br/>";
            if (!empty($_POST['add_role'])) {
                $arg = array('parent' => 28);
                $my_cat_id = wp_insert_term($_POST['add_position'], "category", $arg);
                $role = $my_cat_id['term_id'];
                array_push($postCats, $my_cat_id['term_id']);
            } else {
                $role = $_POST['person_role'];
                array_push($postCats, $_POST['person_role']);
            }
            // echo "person_role";
      // print_r($postCats); // die;   
    ?>
<div class="container">
    <!-- **primary - Starts** -->     
    <section id="primary" class="content-full-width">
        <!-- **woocommerce - Starts** -->         
        <div class="woocommerce">
            <?php
            
            ?> 
            <?php
            $user_id = username_exists($_POST['email']);
            if (!$user_id &&  $postCats != "" && $_POST['email']!="" && $_POST['password']!="" && $_POST['institute_name']!="") {
                $userdata = array(
                    'user_login' => $_POST['email'],
                    'user_email' => $_POST['email'],
                    'institute_name' => $_POST['institute_name'],
                    'first_name' => $_POST['institute_name'],
                    'role' => 'contributor',
                    'user_pass' => $_POST['password']);
                $user_id = wp_insert_user($userdata);
                update_user_meta($user_id, 'entity', $_POST['entity']);

                $my_post = array(
                    'post_title' => get_the_category_by_ID($_POST['institute_name']),
                    'post_status' => 'publish',
                    'post_type' => 'institute',
                    'post_category' => $postCats,
                    'post_author' => $user_id,
                );
                $post_id = wp_insert_post($my_post);
                if ($post_id) {
                     update_post_meta($post_id, 'Secondary Role', $_POST['secrole'], true);
                    update_post_meta($post_id, 'Institute name', get_the_category_by_ID($_POST['institute_name']), true);
                    update_post_meta($post_id, 'Director', $_POST['director'], true);
                    update_post_meta($post_id, 'Contact person Name', $_POST['c_name'], true);
                    update_post_meta($post_id, 'City Of location', $city, true);
                    update_post_meta($post_id, 'Landline', $_POST['landline'], true);
                    update_post_meta($post_id, 'Alumni of Institute', $institute, true);
                    update_post_meta($post_id, 'Position', $position, true);
                    //update_post_meta($post_id, 'Add position', $position_id, true);
                    //update_post_meta($post_id, 'Add Institute', $my_cat_id, true);
                    update_post_meta($post_id, 'Mobile', $_POST['mobile'], true);
                    update_post_meta($post_id, 'landline', $_POST['landline'], true);
                    update_post_meta($post_id, 'email', $_POST['email'], true);
                    update_post_meta($post_id, 'password', $_POST['password'], true);
                    update_post_meta($post_id, 'Alumni offc head', $_POST['alumni_offc_head'], true);
                    update_post_meta($post_id, 'Alumni email', $_POST['alumni_email'], true);
                    update_post_meta($post_id, 'Alumni number', $_POST['alumni_number'], true);
                    update_post_meta($post_id, 'ecell head', $_POST['ecell_head'], true);
                    update_post_meta($post_id, 'Ecell Mobile', $_POST['ecell_mob'], true);
                    if ($_POST['incubation'] == 'Yes') {
                        update_post_meta($post_id, 'Center', $_POST['center'], true);
                        update_post_meta($post_id, 'Year inception', $_POST['year_inception'], true);
                        update_post_meta($post_id, 'Person role', $role, true);
                        update_post_meta($post_id, 'Person email', $_POST['person_email'], true);
                        update_post_meta($post_id, 'Person mobile', $_POST['person_mobile'], true);
                        update_post_meta($post_id, 'Companies incubated', $_POST['companies_incubated'], true);
                        update_post_meta($post_id, 'Sample company', $_POST['sample_company'], true);
                    } update_post_meta($post_id, 'Twitter', $_POST['twitter'], true);
                    update_post_meta($post_id, 'Website', $_POST['website'], true);
                    update_post_meta($post_id, 'Facebook', $_POST['facebook'], true);
                     update_post_meta($post_id, 'Questions Asked', json_encode(array()), true);
                      update_post_meta($post_id, 'post_views_count', json_encode(array()), true);
                }

                if ($_POST['email']) {
                    $institutename = get_the_category_by_ID($_POST['institute_name']);

                   $email_to = $_POST['email'];

    $subject = "Thank You for registering with - IvyCamp.in";
   
    $content = "Hello  ".$institutename.",<br> <br>
      Welcome to the IvyCamp Platform. You have successfully registered. Please enjoy your 90 days of free access on the IvyCamp Platform. <br>
Please click on the link at the end of this email to activate your membership on the Platform. By clicking on the link you agree to the additional terms and conditions laid out in this email.  <br><br>
<u>Additional Terms and Conditions</u><br><br>
-The institute will initiate the creation of a virtual IvyCamp office/think tank with a team IvyCamp can help in the recruitment of. For each startup that a virtual team member brings to the platform, that registers and generates an IvyCamp Funding score, that team member will receive a monetary award as discussed previously.
<br>
-The institute will verify teams that submit business plans/patents on the IvyCamp platform and identify themselves as current students or alumni of the institute. As part of the IvyCamp giveback, for each verified team that gets funded on the IvyCamp platform, the Institute will receive a monetary benefit discussed previously.

<br><br>
<b><u><a href ='http://ivycamp.in/login/'>Activate Membership</a></u></b><br><br>
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
<?php
get_footer();
?>

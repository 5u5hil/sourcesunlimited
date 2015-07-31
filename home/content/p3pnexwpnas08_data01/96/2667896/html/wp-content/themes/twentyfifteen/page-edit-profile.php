<?php

$user = wp_get_current_user();

$user_id = $user->ID;
$args = array('offset' => 0, 'post_type' => 'startup', 'author' => $user->ID);

$the_query = new WP_Query($args);

$post = $the_query->post;
$post_id = $post->ID;
?>

<?php


if (!function_exists('wp_handle_upload'))
    require_once( ABSPATH . 'wp-admin/includes/file.php' );

require_once(ABSPATH . 'wp-admin/includes/image.php');
if ($_POST['email']) {
    // echo $_POST['email']; 
//var_dump($_FILES['business_plan']); die;


   $postCats = array($_POST['startup_stage']);
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
$role_array = array();

if (isset($_POST['role'])) {
    $role = $_POST['role'];
    $rcount = count($_POST['role']);
    for ($i = 0; $i < $rcount; $i++) {
        if ($role[$i] == 'other') {
            $arg = array('parent' => 28);
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
//var_dump($role_array); die;
$mentoring_array = array();

if (isset($_POST['mentoring_req'])) {
    $mentoring = $_POST['mentoring_req'];
    $mcount = count($_POST['mentoring_req']);
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

$key_member_array = array();
if ($_POST['key_member']) {
    $key_member = $_POST['key_member'];
    $kcount = count($_POST['key_member']);

    for ($i = 0; $i < $kcount; $i++) {
        if ($key_member[$i] == 'other') {
            $arg = array('parent' => 28);
            $my_cat_id = wp_insert_term($_POST['member_type'], "category", $arg);
            $new_key_member = $my_cat_id['term_id'];
        } else {
            array_push($mentoring_array, $key_member[$i]);
        }
    }
    if (isset($new_key_member)) {
        array_push($mentoring_array, $new_key_member);
    }
    $postCats = array_merge($postCats, $key_member_array);
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

    $my_post = array(
        'ID' => $post_id,
        'post_title' => $_POST['cname'],
        'post_status' => 'publish',
        'post_type' => 'startup',
        'post_category' => $postCats,
        'post_author' => $user_id,
    );


    $post_id_new = wp_update_post($my_post);
   // echo update_post_meta($post_id_new, 'Mentoring required', implode(',', $_POST['mentoring']));die;

    update_post_meta($post_id_new, 'Secondary Role', $_POST['secrole']);
    update_post_meta($post_id_new, 'Role', implode(',', $role_array));
    update_post_meta($post_id_new, 'Company Name', $_POST['cname']);
    update_post_meta($post_id_new, 'Founding Year', $_POST['Founding']);
    update_post_meta($post_id_new, 'Sector', implode(',', $sector_array));
    update_post_meta($post_id_new, 'member First name', implode(',', $_POST['member_fname']));
    update_post_meta($post_id_new, 'member Last name', implode(',', $_POST['member_lname']));
    update_post_meta($post_id_new, 'member mobile', implode(',', $_POST['member_mobile']));
    update_post_meta($post_id_new, 'member email', implode(',', $_POST['member_email']));
    update_post_meta($post_id_new, 'member address', implode(',', $_POST['member_address']));
    update_post_meta($post_id_new, 'Startup stage', $_POST['startup_stage']);
    update_post_meta($post_id_new, 'Level of investment', $_POST['level_of_investment']);
    update_post_meta($post_id_new, 'Key Team Members', $member);
    update_post_meta($post_id_new, 'venture', $_POST['venture']);
   // update_post_meta($post_id_new, 'Founding year', $_POST['Founding']);
    update_post_meta($post_id_new, 'Address', $city);
    update_post_meta($post_id_new, 'Service Pitch', $_POST['service_pitch']);
    update_post_meta($post_id_new, 'ISP', $_POST['isp']);
    update_post_meta($post_id_new, 'Target market', $_POST['target_market']);
    update_post_meta($post_id_new, 'Revenue model', $_POST['revenue']);
    update_post_meta($post_id_new, 'One line pitch', $_POST['linepitch']);
    update_post_meta($post_id_new, 'Amount already raised', $_POST['already_raised']);
    update_post_meta($post_id_new, 'Total Amount  to be raised', $_POST['to_be_raised']);
    update_post_meta($post_id_new, 'Mentoring desired', $_POST['mentoring_desired']);
    update_post_meta($post_id_new, 'Mentoring required', implode(',', $mentoring_array));
    update_post_meta($post_id_new, 'Website', $_POST['website']);
    update_post_meta($post_id_new, 'Facebook', $_POST['facebook']);
    update_post_meta($post_id_new, 'Twitter', $_POST['twitter']);
    // update_post_meta($post_id_new, 'Email', $_POST['email']);
    update_post_meta($post_id_new, 'Password', $_POST['password']);
    update_post_meta($post_id_new, 'Mobile', $_POST['mobile']);
    update_post_meta($post_id_new, 'Video Link', $_POST['videolink']);
    update_post_meta($post_id_new, 'Student Or Alumni', $_POST['student_alumni']);
    update_post_meta($post_id_new, 'Year of graduation', $_POST['graduation']);
    update_post_meta($post_id_new, 'Institute Name', implode(',', $institute_array));
    update_post_meta($post_id_new, 'First Name', $_POST['first_name']);
    update_post_meta($post_id_new, 'Last Name', $_POST['last_name']);
     update_post_meta($post_id, 'upload vlink', $_POST ['upload_vlink'], true);
   // update_post_meta($post_id_new, 'User Likes', json_encode(array()));
    
    
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
                $attach_id = wp_insert_attachment($attachment, $movefile['file'], $post_id_new);
                $attach_data = wp_generate_attachment_metadata($attach_id, $file);
                wp_update_attachment_metadata($attach_id, $attach_data);
                set_post_thumbnail($post_id_new, $attach_id);
            }
        }
        
     if($_FILES['business_plan']['name'] != "") {
// No file was selected for upload, your (re)action goes here

        
        $extraAttachments = array();

        if ($_FILES['business_plan']) {

            $files = $_FILES['business_plan'];
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
                        $attach_id = wp_insert_attachment($attachment, $movefile['file'], $post_id_new);
                        if ($post_id_new) {
                            array_push($extraAttachments, $attach_id);
                        }
                    }
                }
            }




            update_post_meta($post_id_new, 'File Attach', json_encode($extraAttachments));
        }
        }
}
?>




<?php
//check_startup();

if ( is_user_logged_in() ) {

get_header();


 ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="http://ivycamp.cruxservers.in/wp-content/themes/twentyfifteen/js/jquery.sumoselect.min.js"></script>
<link href="http://ivycamp.cruxservers.in/wp-content/themes/twentyfifteen/css/sumoselect.css" rel="stylesheet" />


<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script type="text/javascript">
    $ = jQuery;
    $(document).ready(function () {
        window.asd = $('.SlectBox').SumoSelect({csvDispCount: 3});

    });



//    $(function () {
//        $('.Founding').datepicker({
//            changeYear: true,
//            showButtonPanel: true,
//            dateFormat: 'yy',
//            onClose: function (dateText, inst) {
//                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
//                $(this).datepicker('setDate', new Date(year, 1));
//            }
//        });
//        $(".Founding").focus(function () {
//            $(".ui-datepicker-month").hide();
//            $('.ui-datepicker-calendar').hide();
//        });
//    });





</script> 





<div class="parallax full-width-bg lr_widget">
    <div class="container">
        <div class="main-title">
            <div class="column dt-sc-three-fifth first">
                <h1>Edit Profile</h1>
            </div>
        </div>
    </div>
</div>
<div class="dt-sc-margin30"></div>
<div class="container">
    <!-- **secondary - starts** --> 
    <section id="secondary-left" class="secondary-sidebar secondary-has-left-sidebar">
        <aside class="widget widget_product_categories">
            <ul>
                <li> <a href="/startup-dashboard/" >Dashboard</a> </li>
                <li> <a href="/investor-listing">Investors</a> </li>
                <li> <a href="/mentor-listing">Mentors</a> </li>
                <li> <a href="/corporate-listing">Corporates</a> </li>
                <li> <a href="/institute-listing">Institute</a> </li>
<!--                <li> <a href="/funding-eligiblility-question/">Funding Eligibility Questioners</a> </li>-->
                <li> <a href="/edit-profile/" class="active_menu">Edit Profile</a> </li>
            </ul>	
        </aside>
        
        <?php ?>
        
        
    </section> <!-- **secondary - Ends** -->  

    <!-- **primary - Starts** --> 

    <section id="primary" class="with-left-sidebar page-with-sidebar">
        <div class="woocommerce">
            <div class="col2-set">
                <form name="checkout" method="post" class="checkout" action="/edit-profile/" enctype="multipart/form-data" id="edprofile">

                    <div id="edit-profile">

                            <?php
                            if (has_post_thumbnail()) {
                                // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); 

                                the_post_thumbnail();
                            } else {

                                $img = wp_get_attachment_image_src(693);

                                echo "<img src='" . $img[0] . "' />";
                            }
                            ?>

                            <br>
						<div class="clr"></div>
                                                <lable>Change Logo:</lable>
			<input type="file" value="change" name="logo">
                        
                        
                        </div> 
                    
                                <div id="edit-profile">

                            <?php  $attachment_docs =  get_post_meta(get_the_ID(), 'File Attach', true);
                            
                           // echo get_attached_file($attachment_docs);
                          $business = json_decode($attachment_docs, true);
                         if($business){
                          foreach ($business as $business_plan)
                          {
                          //  print_r($business_plan);
                           // echo  wp_get_attachment_url($business_plan);?>
						   <a href="<?php echo wp_get_attachment_url($business_plan); ?>"><u>Business Plan</u></a> <br/>
						   <lable> Change Business Plan:  </lable>
						               
                          <?php }
                         }else
                         {
                             echo "Add Business Plan: ";
                         }
                           
                           ?>

                         
                        <input type="file" value="change" name="business_plan[]" id="business_plan"  multiple="multiple"  >
                            
                        </div>
                    
                    
                    
                    
                    
                
                        
             
                        
                         
                    
                    <!-- ============ start of section  -->
                    <div class="fieldsection mtop30"> 
                        <h5> STARTUP DETAILS</h5>
                        <div class="col-1">

                            <div class="woocommerce-billing-fields"> 
                                <input type="hidden" class="input-text " name="entity" id="entity" placeholder=""  value="startup" required="" />

                                <p class="form-row form-row-wide " >
                                    <label for="cname" class="">Startup Name *</label>
                                    <input type="text" class="input-text " name="cname" id="cname" placeholder=""  value="<?php echo get_post_meta(get_the_ID(), 'Company Name', true); ?>"  /></p>
                                <p>
                                <div class="form-row form-row-wide address-field ">
                                    <label for="address" class="">City of Location *</label>
                                    <select name="address" id="address" class="country_to_state country_select">

                                        <option value="">-- Select --</option>

<?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>

<?php foreach ($Organizations as $Organizationsval) { ?>

                                            <option value="<?php echo $Organizationsval->term_id; ?>"<?php if ((get_post_meta($post->ID, 'Address', true)) == $Organizationsval->term_id) echo 'selected';
    else echo ''; ?>><?php echo $Organizationsval->name ?></option>
<?php } ?>
                                             <option value="other">Other</option>



                                    </select></div>
                                <div id="city_id" style="display: none">
                                    <input type="text" class="input-text " name="add_city" id="add_city" placeholder="Add City"  value=""  /> 
                                </div>

                                <div class="form-row form-row-wide address-field" id="sectordiv">	
                                    <label for="sector" class="">Sectors *</label>
                                   
                                        <select  multiple="multiple"  name="sector[]" id="sector"  required="" placeholder="-- Select --" class="SlectBox"> 

<?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>
<?php foreach ($categories as $cat) { ?>

                                                <option value="<?php echo $cat->term_id; ?>"<?php if (in_array($cat->term_id,(explode(',',(get_post_meta($post->ID, 'Sector', true)))))) echo 'selected';
    else echo ''; ?>><?php echo $cat->name ?></option>

<?php } ?>
                                               <option value="other">Other</option>
                                                

                                        </select>
                                  
                                </div>

                                <div id="sector_id" style="display:none">
                                    <p class="form-row form-row-wide " >                                

                                        <input type="text" class="input-text " name="add_sector" id="add_sector" placeholder="Add Sector "  value="" />
                                    </p>
                                </div>


                                <p class="form-row form-row-first " >
                                    <label for="startup_stage" class="">Startup Stage *</label>
<?php // echo (get_the_category_by_ID(get_post_meta($user->ID(), 'Startup stage', true))) ?>
                                    <select name="startup_stage" class="startup_stage" id="startup_stage" required="" >
                                        <option value="">-- Select --</option>
<?php $Idproof = get_categories(array('parent' => 7, 'hide_empty' => 0)); ?>
<?php foreach ($Idproof as $proof) { ?>

                                            <option value="<?php echo $proof->term_id; ?>"<?php if ((get_post_meta($post->ID, 'Startup stage', true)) == $proof->term_id) echo 'selected';
    else echo ''; ?>><?php echo $proof->name ?></option>
<?php } ?>
                                    </select>
                                </p>


                                <p class="form-row form-row-last " >
                                    <label for="level_of_investment" class="">Level of Investment Required (In Lacs) *</label>
                                    <input type="text" class="input-text " name="level_of_investment" id="level_of_investment" placeholder=""  value="<?php echo get_post_meta(get_the_ID(), 'Level of investment', true); ?>" required=""  onkeypress="return isNumber(event);" /></p>
                                <div class="clear"></div>

                                </p>


                                <p class="form-row form-row-wide  " >
                                    <label for="venture" class="">Summary of Venture (product, market, etc.) * </label>
                                    <input type="text" class="input-text " name="venture" id="venture" placeholder=""  value="<?php if ((get_post_meta($post->ID, 'venture', true))) echo get_post_meta($post->ID, 'venture', true);
else echo ""; ?>" required=""   /></p>
                                <div class="clear"></div>

                                <p class="form-row form-row-wide address-field " >
                                    <label for="already_raised" class="">Amount Already Raised (In Lacs)</label>
                                    <input type="text" class="input-text " name="already_raised" id="already_raised" placeholder="" onkeypress="return isNumber(event);"  value="<?php if ((get_post_meta($post->ID, 'Amount already raised', true))) echo get_post_meta($post->ID, 'Amount already raised', true); else echo ""; ?>"   /></p>


                                <p class="form-row form-row-wide address-field " >
                                    <label for="to_be_raised" class="">Total Amount  to be Raised (In Lacs)</label>
                                    <input type="text" class="input-text " name="to_be_raised" id="to_be_raised" placeholder="" onkeypress="return isNumber(event);"  value="<?php if ((get_post_meta($post->ID, 'Total Amount  to be raised', true))) echo get_post_meta($post->ID, 'Total Amount  to be raised', true);else echo ""; ?>"   /></p>

                            </div>  

                        </div>

                        <div class="col-2">
                            <div class="woocommerce-shipping-fields">



                                <div class="shipping_address">
                                    <p class="form-row form-row-wide address-field " >
                                        <label for="Founding" class="">Founding Year *</label>
                                        <select class="input-text " name="Founding" id="Founding">
                                         <option value="">-- Select --</option>
									
									<?php 
									$d = date("Y");
									for ($i=$d; $i>1950; $i--) { ?>
                                        <option value="<?php echo $i; ?>" <?php if ((get_post_meta($post->ID, 'Founding Year', true))== $i) echo "selected"; else ""; ?> ><?php echo $i; ?></option>
                                                                        <?php }?>
                                        </select>
<!--                                        <input type="text" class="input-text " name="Founding" id="Founding" placeholder=""  value="<?php // if ((get_post_meta($post->ID, 'Founding year', true))) echo get_post_meta($post->ID, 'Founding year', true);
//else echo ""; ?>"  required=""  /></p>-->
                                    </p>


                                    <p class="form-row form-row-wide address-field" >
                                        <label>Product/Service Pitch (400 char)* </label>
                                        <input type="text" class="input-text " value="<?php if ((get_post_meta($post->ID, 'Service Pitch', true))) echo get_post_meta($post->ID, 'Service Pitch', true);
else echo ""; ?>"  placeholder="Text entry of up to 400 char" id="service_pitch" maxlength="400" name="service_pitch" required=""/></p>

                                    <p class="form-row form-row-wide address-field " >
                                        <label for="isp" class="">What’s your USP (400 char) *</label>
                                        <input type="text" class="input-text " name="isp" id="isp" placeholder="Text entry of up to 400 char" maxlength="400" value="<?php if ((get_post_meta($post->ID, 'ISP', true))) echo get_post_meta($post->ID, 'ISP', true);
else echo ""; ?>"   required=""  /></p><div class="clear"></div>

                                    <p class="form-row form-row-wide" >
                                        <label for="target-market" class="">Target Market (400 char)*</label>
                                        <input type="text" class="input-text " name="target_market" id="target_market" placeholder="Text entry of upto 400 char" maxlength="400" value="<?php if ((get_post_meta($post->ID, 'Target market', true))) echo get_post_meta($post->ID, 'Target market', true);
else echo ""; ?>"  required="" /></p>

                                    <p class="form-row form-row-wide" >
                                        <label for="revenue" class="">Revenue Model (400 char)*</label>
                                        <input type="text" class="input-text " name="revenue" id="revenue" placeholder="Text entry of upto 400 char"  maxlength="400" value="<?php if ((get_post_meta($post->ID, 'Revenue model', true))) echo get_post_meta($post->ID, 'Revenue model', true);
else echo ""; ?>" required="" /></p>

                                    <p class="form-row form-row-wide" >
                                        <label for="linepitch" class="">One Line Pitch (100 char) *</label>
                                        <input type="text" class="input-text " name="linepitch" id="linepitch" placeholder="Text entry of upto 100 char"  maxlength="100" value="<?php if ((get_post_meta($post->ID, 'One line pitch', true))) echo get_post_meta($post->ID, 'One line pitch', true);
else echo ""; ?>" required="" /></p>



                                    <p class="form-row form-row-wide address-field " >
                                        <label>Website </label>
                                        <input type="text" class="input-text " value="<?php if ((get_post_meta($post->ID, 'Website', true))) echo get_post_meta($post->ID, 'Website', true);
else echo ""; ?>" placeholder="" id="website" name="website"/></p>

                                    <br>

                                </div>




                            </div> 


                        </div>
                    </div>

                    <!-- ============ end of section  -->


                    <!-- ============ start of section  -->
                    <div class="fieldsection"> 
                        <h5>FOUNDER DETAILS</h5>
                        <div class="col-1">
                            <div class="woocommerce-billing-fields"> 
                                <p class="form-row form-row-wide " >
                                    <label for="first_name" class="">First Name *</label>
                                    <input type="text" class="input-text " name="first_name" id="first_name" placeholder=""  value="<?php echo $user->first_name; ?>" required=""   /></p>
                                <p class="form-row form-row-wide " >
                                    <label for="last_name" class="">Last Name *</label>
                                    <input type="text" class="input-text " name="last_name" id="last_name" placeholder=""  value="<?php echo $user->last_name; ?>" required=""   /></p>

                                <p class="form-row form-row-wide " >
                                    <label for="email" class=""> Email *</label>
                                    <input type="email" class="input-text " name="email" id="email" placeholder=""  value="<?php echo $user->user_email; ?>" readonly=""  /></p>

                          <p class="form-row form-row-wide " >
                                <label for="password" class="">Password *</label>
                                <input type="password" class="input-text " name="password" id="password" placeholder=""  value="<?php if ((get_post_meta($post->ID, 'Password', true))) echo get_post_meta($post->ID, 'Password', true);
else echo ""; ?>" required=""    /></p>

                                <p class="form-row form-row-wide " >
                                    <label for="mobile" class="">Mobile *</label>
                                    <input type="text" class="input-text " name="mobile" id="mobile" placeholder=""  min="10" value="<?php if ((get_post_meta($post->ID, 'Mobile', true))) echo get_post_meta($post->ID, 'Mobile', true);
else echo ""; ?>" required=""   /></p>

                                <br>
                            </div>  

                        </div>

                        <div class="col-2">
                            <div class="woocommerce-shipping-fields">



                                <div class="shipping_address">
                                    <p class="form-row form-row-wide " >
                                        <label for="Role" class="">Role *</label>

                                        <select multiple="multiple" placeholder="-- Select --" name="role[]" id="role"  class="role SlectBox">
                                            <?php $role = get_categories(array('parent' => 28, 'hide_empty' => 0)); ?>

<?php foreach ($role as $roleval) { ?>

                                                <option value="<?php echo $roleval->term_id; ?>"<?php if (in_array($roleval->term_id,(explode(',',(get_post_meta($post->ID, 'Role', true)))))) echo 'selected';  else echo ''; ?>><?php echo $roleval->name ?></option> 
   
<?php } ?>
 <option value="other" >Other</option>
                                        </select>
                                    </p>
                                    
                                    <div id="role_id" style="display: none">
                                    <input type="text" class="input-text " name="add_role" id="add_role" placeholder="Add Role"  value=""  /> 
                                </div>

                                                <?php if ((get_post_meta($post->ID, 'Student Or Alumni', true)) == 'student') { ?>
                                        <div id="scheck"  >
                                            <p class="form-row form-row-first address-field validate-state" >
                                                <label> Year of Graduation * </label>
                                                <select name="graduation" class="graduation"   >
                                                    <option value="">-- Select --</option>
    <?php $graduation = get_categories(array('parent' => 57, 'hide_empty' => 0)); ?>
    <?php foreach ($graduation as $graduationval) { ?>
                                                        <option value="<?php echo $graduationval->term_id; ?>"<?php if ((get_post_meta($post->ID, 'Year of graduation', true)) == $graduationval->term_id) echo 'selected';
        else echo ''; ?>><?php echo $graduationval->name ?></option>   
                                        <?php } ?>
                                                </select>
                                            </p>



                                        </div>
                                            <?php } ?>

                                    <p class="form-row form-row-wide address-field validate-state" >
                                        <label> Institute*  </label>
                                        <select multiple="multiple" placeholder ="-- Select --" id="institute_name" name="institute_name[]"  class="institute_name SlectBox "  >

<?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>
<?php foreach ($Alumni as $Alumnival) { ?>
                                                <option value="<?php echo $Alumnival->term_id; ?>"<?php if (in_array($Alumnival->term_id,(explode(',',(get_post_meta($post->ID, 'Institute Name', true)))))) echo 'selected';  else echo ''; ?>><?php echo $Alumnival->name ?></option>   
<?php } ?>
                                                <option value="other">Other</option>
                                        </select>
                                    </p>  
                                </div>

                                <div id="institute_id" style="display:none">
                                    <p class="form-row form-row-wide " >                                
                                        <input type="text" class="input-text " name="add_institute" id="add_institute" placeholder="Add Institute"  value="" />
                                    </p>
                                </div>
                                <br>

                            </div>

                            <div class="clear"></div>



                        </div>
                    </div>
            
            <!-- ============ end of section  -->

 


            <!-- ============ start of section  -->
            <div class="fieldsection"> 
                <h5>OTHER DETAILS</h5>
                <div class="col-1">
                    <div id="mentoring_required">
                        <p class="form-row form-row-wide  " >
                            <label for="mentoring" class="">Area in which mentoring required </label>

                            <select multiple="multiple"  name="mentoring_req[]" id="mentoring" placeholder="-- Select --" class="SlectBox "  >
<?php $mentoring_id = get_categories(array('parent' => 50, 'hide_empty' => 0)); ?>
<?php foreach ($mentoring_id as $mot) { ?>

                                    <option value="<?php echo $mot->term_id; ?>"<?php  if (in_array($mot->term_id,(explode(',',(get_post_meta($post->ID, 'Mentoring required', true)))))) echo 'selected';  else echo ''; ?>><?php echo $mot->name ?></option> 
 <?php } ?>
                               
                            </select>
                        </p>
                    </div>
                    <p>
                    <div id="mentoring_id" style="display:none">
                        <input type="text" name="add_mentoring" id="add_mentoring" placeholder="Add area in which mentoring required" >  
                    </div>

                </div>
                <div class="col-2">
                    <div class="woocommerce-shipping-fields">



                        <div class="shipping_address">



                            <p class="form-row form-row-wide " >
                                <label for="facebook" class="">Facebook page</label>
                                <input type="text" class="input-text " name="facebook" id="facebook" placeholder=""  value="<?php echo (get_post_meta($post->ID, 'Facebook', true)); ?>" /></p>

                            <p class="form-row form-row-wide " >
                                <label for="twitter" class="">Twitter handle </label>
                                <input type="text" class="input-text " name="twitter" id="twitter" placeholder=""  value="<?php if ((get_post_meta($post->ID, 'Twitter', true))) echo get_post_meta($post->ID, 'Twitter', true);
else echo ""; ?>"  /></p>

                            <p class="form-row form-row-wide" >




                        </div>

                        <div class="clear"></div>

                    </div>

                </div> 
            </div> 
            <!-- ============ end of section  -->

            <input type='hidden' name="ID" value="<?= $user->ID ?>" />   
            <input type="submit"  name="" id="submit" value="Submit" data-value="Submit" />



            </form> 
                </div> 
        </div> 














</section> 

<!-- **primary - Ends** --> 
<div class="dt-sc-margin80"></div>
</div>
<div class="dt-sc-hr-invisible"></div>		 <!-- **container - Ends** --> 
<?php  get_footer(); 

} else
{
    
     header("location:/login/");
}
?>
<script>
    $ = jQuery;
    $(document).ready(function () {
        $(".student_alumni").click(function () {

            if ($(this).val() == "alumni")
            {
                $('#acheck').show();
                $('#scheck').hide();

            }
            else
            {
                $('#acheck').hide();
                $('#scheck').show();
            }
        });

//
//        $(".mentoring_desired").click(function () {
//
//            if ($(this).val() == "yes")
//            {
//                $('#mentoring_').show();
//                $('#mentoring_required').prop('required', true);
//
//            }
//            else
//            {
//                $('#mentoring_required').hide();
//                $('#mentoring_required').prop('required', false);
//            }
//        });

        $("#address").live('change', function () {

            if ($(this).val() == "other")
            {
                $('#city_id').show()
                $('#add_city').prop('required', true);
                // $("input").$("input").prop('required',true);
            }
            else
            {
                $('#city_id').hide();
                $('#add_city').prop('required', false);
            }
        });


 $("#role").change(function () {
            $('#role option:selected').each(function (index, value) {
                if ($(this).val() == "other")
                {
                    $('#role_id').show()
                    $('#add_role').prop('required', true);

                }
                else
                {
                    $('#role_id').hide();
                    $('#add_role').prop('required', false);
                }
            });
        });

        $("#sector").change(function () {
 $('#sector option:selected').each(function (index, value) {
            if ($(this).val() == "other")
            
            {
                $('#sector_id').show()
                $('#add_sector').prop('required', true);
                // $("input").$("input").prop('required',true);
            }
            else
            {
                $('#sector_id').hide();
                $('#add_sector').prop('required', false);
            }
        });
        });



        $(".institute_name").change(function () {
            $('.institute_name option:selected').each(function (index, value) {

                if ($(this).val() == "other")
                {
                    $('#institute_id').show()
                    $('#add_institute').prop('required', true);
                    // $("input").$("input").prop('required',true);
                }
                else
                {
                    $('#institute_id').hide();
                    $('#add_institute').prop('required', false);
                }
            });
        });

        $("#mentoring").change(function () {
            //alert($(this).val());
            var mentoring = $(this).val();
            $('#mentoring option:selected').each(function (index, value) {
                //alert($(this).val());

                if ($(this).val() == "other")
                {
                    $('#mentoring_id').show()
                    $('#add_mentoring').prop('required', true);
                    // $("input").$("input").prop('required',true);
                }
                else
                {
                    $('#mentoring_id').hide();
                    $('#add_mentoring').prop('required', false);
                }
            });
        });

        $('#key_member').change(function () {
            if ($('#key_member').val() !== null) {
                var member_count = ($('#key_member').val()).length;
                var key_member = $('#key_member').val();
            }

            if (key_member !== null && member_count != 0)
            {

                var aa = '';
                $('#key_member option:selected').each(function (index, value) {

                    $('#member_id').show();

                    aa += '<div class="col-1"><input type="text" name="member_type[]" id="member_type" value="' + $(this).text() + '"><input type="text" name="member_fname[]"  placeholder ="First Name" ><input type="text" name="member_lname[]"  placeholder ="Last Name" ></div><div class="col-2"><input type="text" name="member_moble[]"  placeholder ="Mobile"><input type="text" name="member_email[]"  placeholder ="Email"><input type="text" name="member_address[]"  placeholder ="Address"></div>';
                });

                $('#member_id').html(aa);
            }
            else
            {
                $('#member_id').hide();
            }



        });



        $("#submit").click(function () {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var numbers = /^[\d\-\+\s]+$/;
            var cname = $('#cname').val();
            //   alert(cname);
            var address = $('#address').val();
            var first_name = $('#first_name').val();

            var mobile = $('#mobile').val();
            var email = $('#email').val();
            // var password = $('#password').val();
            var sector = $('#sector').val();
            var startup_stage = $('#startup_stage').val();
            var ktm = $('#ktm p.SlectBox').text();
            var level_of_investment = $('#level_of_investment').val();
            var venture = $('#venture').val();
            var Founding = $('#Founding').val();
            var service_pitch = $('#service_pitch').val();
            var isp = $('#isp').val();
            var target_market = $('#target_market').val();
            var linepitch = $('#linepitch').val();
            var revenue = $('#revenue').val();
            var answer = $('#answer').val();
            var hidden_answer = $('#hidden_answer').val();
            var policy = $('#policy').val();
            var flag = '0';
            if (cname == '' || cname == null)
            {
                $('#cname').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#cname').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (address == '' || address == null)
            {
                $('#address').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#address').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (first_name == '' || first_name == null)
            {
                $('#first_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#first_name').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            ///////
            if (email == null || email == "" || !emailPattern.test(email))
            {

                $('#email').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {

                $('#email').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

//            if (password == '' || password == null)
//            {
//                $('#password').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
//
//                flag++;
//            }
//            else
//            {
//                $('#password').css({"border-color": "", "border-weight": "", "border-style": ""});
//            }


            if (sector == '' || sector == null)
            {
                $('#sector').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#sector').css({"border-color": "", "border-weight": "", "border-style": ""});
            }


            if (mobile == "" || mobile == null || !numbers.test(mobile))
            {
                $('#mobile').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#mobile').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            /////


            if (startup_stage == '' || startup_stage == null)
            {
                $('#startup_stage').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#startup_stage').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (level_of_investment == '' || level_of_investment == null)
            {
                $('#level_of_investment').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#level_of_investment').css({"border-color": "", "border-weight": "", "border-style": ""});
            }



            //if( $(ktm).empty()){
            //	 $('#ktm p.SlectBox').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
            //	 flag++;
            //	}else{
            //	  $('#level_of_investment').css({"border-color": "", "border-weight": "", "border-style": ""});
            //	}





            /////


            if (venture == '' || venture == null)
            {
                $('#venture').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#venture').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (Founding == '' || Founding == null)
            {
                $('#Founding').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#Founding').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (service_pitch == '' || service_pitch == null)
            {
                $('#service_pitch').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#service_pitch').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (isp == '' || isp == null)
            {
                $('#isp').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#isp').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            //


            if (target_market == '' || target_market == null)
            {
                $('#target_market').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#target_market').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (linepitch == '' || linepitch == null)
            {
                $('#linepitch').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#linepitch').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (revenue == '' || revenue == null)
            {
                $('#revenue').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#revenue').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (hidden_answer == answer) {

                $('#answer').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            else {
                $('#answer').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            if (policy == false)
            {
                flag++;
            }


            if (flag == 0)
            {
                return true;
            }
            else
            {
              //  $('#error').html('<span style="color:red;">* Marked fields are mandatory. Kindly fill those fields to proceed ahead. </span>');
                return false;
            }

            

        });
    });


</script>
<script type="text/javascript">

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    </script>
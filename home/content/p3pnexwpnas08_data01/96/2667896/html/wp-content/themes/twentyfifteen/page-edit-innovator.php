<?php
$user = wp_get_current_user();

$user_id = $user->ID;

$args = array('offset' => 0, 'post_type' => 'innovator', 'author' => $user->ID);

$the_query = new WP_Query($args);

// print_r($the_query);
//echo "<br>";
// echo $the_query->the_post(); 

$post = $the_query->post;

$post_id = $post->ID;

//  while ($the_query->have_posts()) : $the_query->the_post(); 
?>


<?php
if ($_POST['email']) {

    
    

    if (!function_exists('wp_handle_upload'))
        require_once( ABSPATH . 'wp-admin/includes/file.php' );



    require_once(ABSPATH . 'wp-admin/includes/image.php');





    //  $Support = get_categories(array('parent' => 72, 'hide_empty' => 0)); 
     // var_dump($_FILES['business_plan']);
    // echo "<br>"; 
    // die;
    // echo  (get_post_meta($post->ID, 'Support you are looking for', true)); die;



    $postCats = array();

    if (isset($_POST['graduation'])) {

        $postCats = array($_POST['graduation']);
    } else {

        $postCats = array();
    }



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
    
    
    
    $my_post = array(
        'ID' => $post_id,
        'post_title' => $_POST['innovation_name'],
        'post_status' => 'publish',
        'post_type' => 'innovator',
        'post_category' => $postCats,
        'post_author' => $user_id,
    );


    $post_id_new = wp_update_post($my_post);

    // echo "<br>";
    // $post_id = the_ID(); die;
    //   get_post_meta($post->ID, 'Support you are looking for');
    //  echo "<br>";
    //  print_r($support_array);



    update_post_meta($post_id_new, 'Support you are looking for', implode(',', $support_array));

    update_post_meta($post_id_new, 'member First name', implode(',', $_POST['member_fname']));

    update_post_meta($post_id_new, 'member Last name', implode(',', $_POST['member_lname']));

    update_post_meta($post_id_new, 'member mobile', implode(',', $_POST['member_mobile']));

    update_post_meta($post_id_new, 'member email', implode(',', $_POST['member_email']));

    update_post_meta($post_id_new, 'member address', implode(',', $_POST['member_address']));
    // update_post_meta($post_id_new, 'Secondary Role', $_POST['secrole']);

    update_post_meta($post_id_new, 'Innovation Name', $_POST['innovation_name']);

    update_post_meta($post_id_new, 'Innovator Name', $_POST['innovator_name']);

    update_post_meta($post_id_new, 'Mentoring Required', implode(',', $mentoring_array)); // not using

    update_post_meta($post_id_new, 'Mentoring', implode(',', $mentoring_array));

    update_post_meta($post_id_new, 'sayear', $_POST['sayear']);

    update_post_meta($post_id_new, 'member name', implode(',', $_POST['member_name']));

    update_post_meta($post_id_new, 'member contact', implode(',', $_POST['member_contact']));

    update_post_meta($post_id_new, 'Members of Organizations', implode(',', $member));

    update_post_meta($post_id_new, 'Address', $city);

    update_post_meta($post_id_new, 'Sector', implode(',', $sector_array));

    update_post_meta($post_id_new, 'Mobile', $_POST['mobile']);

    update_post_meta($post_id_new, 'email', $_POST['email']);

     update_post_meta($post_id_new, 'password', $_POST['password']);

    update_post_meta($post_id_new, 'Website', $_POST['website']);

    update_post_meta($post_id_new, 'Facebook', $_POST['facebook']);

    update_post_meta($post_id_new, 'Twitter', $_POST['twitter']);

    update_post_meta($post_id_new, 'One line pitch', $_POST['linepitch']);

    update_post_meta($post_id_new, 'Summary of innovation', $_POST['summary_innovation']);

    update_post_meta($post_id_new, 'Summary of market addressed', $_POST['market_address']);

    update_post_meta($post_id_new, 'Key differentiator/ISP', $_POST['key_differentiator']);

    update_post_meta($post_id_new, 'Key competitors', $_POST['key_competitors']);

    update_post_meta($post_id_new, 'Innovation pitch ', $_POST['innovatiobn_pitch']);

    update_post_meta($post_id_new, 'Twitter pitch', $_POST['twitter_pitch']);

    update_post_meta($post_id_new, 'Status of patent', $_POST['status_of_patent']);

    update_post_meta($post_id_new, 'Support you are looking for', implode(',', $support_array));

    update_post_meta($post_id_new, 'upload vlink', $_POST ['upload_vlink']);

    update_post_meta($post_id_new, 'Student Or Alumni', $_POST['student_alumni']);

    update_post_meta($post_id_new, 'Year of graduation', $_POST['graduation']);

    update_post_meta($post_id_new, 'Institute Name', implode(',', $institute_array));

    update_post_meta($post_id_new, 'Role', implode(',', $_POST['role']));



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

}
?>

<?php
//check_startup();



if (is_user_logged_in()) {



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


        $(function () {

            $('.Founding').datepicker({
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy',
                onClose: function (dateText, inst) {

                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();

                    $(this).datepicker('setDate', new Date(year, 1));

                }

            });

            $(".Founding").focus(function () {

                $(".ui-datepicker-month").hide();

                $('.ui-datepicker-calendar').hide();

            });

        });

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

                    <li> <a href="/innovator-dashboard/">Dashboard</a> </li>

                    <li> <a href="/incubator-listing">Incubators</a> </li>

                    <li> <a href="/investor-listing">Investors</a> </li>

                    <li> <a href="/mentor-listing">Mentors</a> </li>

                    <li> <a href="/corporate-listing">Corporates</a> </li>

                    <li> <a href="/institute-listing">Institute</a> </li>

<!--                    <li> <a href="/funding-eligiblility-question/">Funding Eligibility Questioners</a> </li>-->

                    <li> <a href="#">Edit Profile</a> </li>

                </ul>	

            </aside>	 

        </section> <!-- **secondary - Ends** -->  



        <!-- **primary - Starts** --> 



        <section id="primary" class="with-left-sidebar page-with-sidebar">



            <!-- **woocommerce - Starts** --> 



            <div class="woocommerce">







                <!-- **checkout - Starts** -->



                <p style="font-size:14px; margin-bottom:10px;"><script type='in/Login' data-onAuth="onLinkedInAuth"></script></p>



                <form name="checkout" method="post" class="checkout" action="/edit-innovator/" enctype="multipart/form-data">

                    <div id="edit-profile">



    <?php
    if (has_post_thumbnail()) {

        // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); 



        the_post_thumbnail();
    } else {



        $img = wp_get_attachment_image_src(756);



        echo "<img src='" . $img[0] . "' />";
    }
    ?>

                        <div class="clr"></div>

                        Change Logo: <input type="file" value="change" name="upload_logo">

                        <div class="clear"></div>

                    </div>





                    <div id="edit-profile">



    <?php
    $attachment_docs = get_post_meta(get_the_ID(), 'File Attach', true);



    // echo get_attached_file($attachment_docs);

    $business = json_decode($attachment_docs, true);

    if ($business) {

        foreach ($business as $business_plan) {

            //  print_r($business_plan);
            // echo  wp_get_attachment_url($business_plan);
            ?>

                                <a href="<?php echo wp_get_attachment_url($business_plan); ?>"><u>Business Plan</u></a> <br/>
                                <lable> Change Business Plan:  </lable>

        <?php
        }
    } else {

        echo "<div class='clr'></div><lable>Add Business Plan: </lable>";
    }
    ?>


                        <input type="file" value="change" name="business_plan[]" id="business_plan"  multiple="multiple"  >



                    </div>


                    <div class="clr"></div>
                    <div class="col2-set mtop30" id="customer_details">

                        <h5><b><u>INNOVATOR DETAILS</u></b></h5>

                        <!-- **col-1 - Starts** -->   



                        <div class="col-1">



                            <input type="hidden" class="input-text " name="entity" id="entity" placeholder=""  value="innovator"  />

                            <input type="hidden" class="input-text " name="secrole" id="secrole" placeholder=""  value="<?php echo $_REQUEST['secrole']; ?>"  />

                            <!-- **woocommerce-billing-fields - Starts** -->   



                            <div class="woocommerce-billing-fields"> 



                                <p class="form-row form-row-wide" >



                                    <label for="innovation_name" class="">Innovation Name *</label>



                                    <input type="text" class="input-text " name="innovation_name" id="innovation_name" placeholder=""  value="<?php echo get_post_meta($post->ID, 'Innovation Name', true) ?>" required="" /></p>







                                <p class="form-row form-row-wide address-field" >



                                    <label for="address" class="">City of Location * </label>



                                    <select name="address" id="address" required="">



                                        <option value="">-- Select --</option>



    <?php $address = get_categories(array('parent' => 34, 'hide_empty' => 0));
    ?>



    <?php foreach ($address as $addresss) { ?>



                                            <option value="<?php echo $addresss->term_id; ?>"<?php if ((get_post_meta($post->ID, 'Address', true)) == $addresss->term_id)
            echo 'selected';
        else
            echo '';
        ?>><?php echo $addresss->name ?></option>





                        <?php } ?>



                                        <option value="other">Other</option>



                                    </select>



                                </p> 







                                                        <div id="city_id" style="display: none">

                                

                                                                <input type="text" class="input-text " name="add_city" id="add_city" placeholder="Add City"  value=""  /> 

                                

                                                            </div>



                                <div class="form-row form-row-wide address-field" id="sectordiv">		

                                    <label for="sector" class="">Sector *</label>



                                    <select  multiple="multiple"  name="sector[]" id="sector"  required="" placeholder="-- Select --" class="SlectBox  "> 



    <?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0));
    ?>

    <?php foreach ($categories as $cat) { ?> 



                                            <option value="<?php echo $cat->term_id; ?>"<?php if (in_array($cat->term_id, (explode(',', (get_post_meta($post->ID, 'Sector', true))))))
            echo 'selected';
        else
            echo '';
        ?>><?php echo $cat->name ?></option>

    <?php } ?>

                                        <option value="other">Other</option>

                                    </select>



                                </div>



                                                          <div id="sector_id" style="display:none">

                                                                <p class="form-row form-row-wide " >                                

                                

                                                                    <input type="text" class="input-text " name="add_sector" id="add_sector" placeholder="Add sector "  value="" />

                                                                </p>

                                                            </div>

                                <p>

                                    <label>  Status of Patent* </label>



                                    <select name="status_of_patent" id="status_of_patent" required="" >

                                        <option value="no patent"  <?php if ((get_post_meta($post->ID, 'Status of patent', true)) == "no patent") echo "selected";
    else echo""; ?> >no patent</option> no

                                        <option value="under patent application"  <?php if ((get_post_meta($post->ID, 'Status of patent', true)) == "under patent application") echo "selected";
    else echo""; ?>   >under patent application</option>

                                        <option value="patented"  <?php if ((get_post_meta($post->ID, 'Status of patent', true)) == "patented") echo "selected";
                                    else echo""; ?>>patented</option>

                                    </select></p>

                                <p class="form-row form-row-wide address-field" >



                                    <label> Website </label>



                                    <input type="text" class="input-text " value="<?php if ((get_post_meta($post->ID, 'Website', true))) echo get_post_meta($post->ID, 'Website', true);
                                    else echo ""; ?>" placeholder="" name="website"/></p>





                                <div class="clear"></div>







                            </div> <!-- **woocommerce-billing-fields - Ends** --> 



                        </div> <!-- **col-1 - Ends** -->  



                        <!-- **col-2 - Starts** --> 



                        <div class="col-2">



                            <!-- **woocommerce-shipping-fields - Starts** -->



                            <div class="woocommerce-shipping-fields">



                                <p class="form-row form-row-wide address-field" >







                                <p class="form-row form-row-wide" id="isprt">


                                    <label for="support_looking" class="">Support you are looking for*</label>



                                    <select   multiple="multiple" placeholder="-- Select --" name="support_looking[]" class="SlectBox" id="support_looking" required="" > 





    <?php $Support = get_categories(array('parent' => 72, 'hide_empty' => 0)); ?>



    <?php foreach ($Support as $looking) { ?>Support you are looking for



                                            <option value="<?php echo $looking->term_id; ?>"<?php if ((in_array($looking->term_id, (explode(',', (get_post_meta($post->ID, 'Support you are looking for', true))))))) echo 'selected';
        else echo ''; ?>><?php echo $looking->name ?></option>    

    <?php } ?>
             <option value="other">Other</option>

                                    </select></p>

                                <p>   



                                <div id="support_id" style="display: none">



                                    <input type="text" class="input-text " name="add_support" id="add_support" placeholder="Add upport you are looking for"  value=""  /> 



                                </div>

                                </p>

                                <p class="form-row form-row-wide address-field" >



                                    <label> Summary of Innovation (product, application, etc.) (Max 400 char) *</label>



                                    <input type="text" class="input-text " value="<?php if ((get_post_meta($post->ID, 'Summary of innovation', true))) echo get_post_meta($post->ID, 'Summary of innovation', true);
    else echo ""; ?>" placeholder="" maxlength="400" id="summary_innovation" name="summary_innovation" required=""/></p>



                                <p class="form-row form-row-wide" >



                                    <label for="market_address" class="">Summary of Problem Addressed (Max 400 char)*</label>



                                    <input type="text" class="input-text " name="market_address" maxlength="400"  id="market_address" placeholder=""  value="<?php if ((get_post_meta($post->ID, 'Summary of market addressed', true))) echo get_post_meta($post->ID, 'Summary of market addressed', true);
    else echo ""; ?>" required=""  /></p>



                                <p class="form-row form-row-wide" >



                                    <label for="key_differentiator" class="">Key Differentiator/USP (Max 400 char) *</label>



                                    <input type="text" class="input-text " name="key_differentiator" maxlength="400"  id="key_differentiator" placeholder="" value="<?php if ((get_post_meta($post->ID, 'Key differentiator/ISP', true))) echo get_post_meta($post->ID, 'Key differentiator/ISP', true);
    else echo ""; ?>"  required="" /></p>



                                <p class="form-row form-row-wide" >

                                    <label for="linepitch" class="">One Line Pitch (Max 100 char)* </label>

                                    <input type="text" class="input-text " name="linepitch" id="linepitch" placeholder=""  maxlength="100" value="<?php if ((get_post_meta($post->ID, 'One line pitch', true))) echo get_post_meta($post->ID, 'One line pitch', true);
    else echo ""; ?>" required="" /></p>

                                <div class="clear"></div>

                            </div>

                        </div> <!-- **shipping_address - Ends** --> 

                    </div> <!-- **woocommerce-shipping-fields - Ends** --> 

                    <div class="col2-set" id="customer_details"> 

                        <h5><b><u>INNOVATOR DETAILS</u></b></h5>

                        <div class="col-1">

                            <p class="form-row form-row-wide" >



                                <label for="innovator_name" class="">Innovator Name *</label>



                                <input type="text" class="input-text " name="innovator_name" id="innovator_name" placeholder=""  value="<?php if ((get_post_meta($post->ID, 'Innovator Name', true))) echo get_post_meta($post->ID, 'Innovator Name', true);
    else echo ""; ?>" required="" /></p>


                            <div class="clear"></div>



                            <p class="form-row form-row-wide" >



                                <label for="i_phone" class="">Mobile *</label>



                                <input type="text" class="input-text " name="mobile" id="mobile" min="10"  placeholder=""  value="<?php if ((get_post_meta($post->ID, 'Mobile', true))) echo get_post_meta($post->ID, 'Mobile', true);
    else echo ""; ?>"  /></p>


                            <p class="form-row form-row-wide" >

                                <label for="email" class=""> Email * </label>

                                <input type="email" class="input-text " readonly='readonly' name="email" id="email" placeholder=""  value="<?php if ((get_post_meta($post->ID, 'email', true))) echo get_post_meta($post->ID, 'email', true);
    else echo ""; ?>" required=""  /></p>
<div class="clear"></div>
                            <p class="form-row form-row-wide " >

                             <label for="Password" class="">Password *</label>
                             <input type="password" class="input-text " name="password" id="password" placeholder="" value="<?php if ((get_post_meta($post->ID, 'password', true))) echo get_post_meta($post->ID, 'password', true);
    else echo ""; ?>" /></p>

                        </div> 

                        <div class="col-2">


                            <p class="form-row form-row-wide " id="prole">

                                <label for="Role" class="">Role *</label>



                                <select multiple="multiple" placeholder="-- Select --" name="role[]" id="role"  class="role SlectBox">

    <?php $role = get_categories(array('parent' => 28, 'hide_empty' => 0)); ?>



    <?php foreach ($role as $roleval) { ?>



                                        <option value="<?php echo $roleval->term_id; ?>"<?php if (in_array($roleval->term_id,(explode(',',(get_post_meta($post->ID, 'Role', true)))))) echo 'selected';  else echo ''; ?>><?php echo $roleval->name ?></option>   



    <?php } ?>



                                </select>

                            </p>



    <?php if ((get_post_meta($post->ID, 'Student Or Alumni', true)) == 'student') { ?>

                                <div id="scheck"  >



                                    <p class="form-row form-row-first address-field" id="stfield">



                                        <label> Year of Graduation </label>



                                        <select name="graduation" class="graduation"   >



                                            <option value="">-- Select --</option>



        <?php $institute = get_categories(array('parent' => 57, 'hide_empty' => 0)); ?>



        <?php foreach ($institute as $instituteval) { ?>

                                                <option value="<?php echo $instituteval->term_id; ?>"<?php if ((get_post_meta($post->ID, 'Year of graduation', true)) == $instituteval->term_id) echo 'selected';
            else echo ''; ?>><?php echo $instituteval->name ?></option>    


        <?php } ?>
                                        </select>

                                    </p>

                                </div>

    <?php } ?>
                            <div id="acheck" >



                                <p class="form-row form-row-wide address-field" id="inst" >



                                    <label> Institute  </label>



                                    <select  multiple="multiple" placeholder="-- Select --" name="institute_name[]" id="institute_name" class="institute_name SlectBox "  >



    <?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>



                                    <?php foreach ($Alumni as $Alumnival) { ?>







                                            <option value="<?php echo $Alumnival->term_id; ?>"<?php if (in_array($Alumnival->term_id, (explode(',', (get_post_meta($post->ID, 'Institute Name', true)))))) echo 'selected';
                                else echo ''; ?>><?php echo $Alumnival->name ?></option>   





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

                        </div>



                    </div>

                    <div class="col2-set">

                        <!--<p class="form-row form-row-wide " id="ktm" >-->

                        <!--                        <label for="member_org" class="">Key Team Members </label>
                        
                        
                        
                                                <select multiple="multiple" placeholder="-- Select --" name="member_org[]" id="member_org"  class="member_org SlectBox">
                        
                            <?php //$role = get_categories(array('parent' => 28, 'hide_empty' => 0));  ?>
                        
                        
                        
    <?php // foreach ($role as $roleval) {  ?>
                        
                                                          <option value="<?php // echo $roleval->term_id;  ?>"<?php //if(  in_array($roleval->term_id, explode(',',get_post_meta($post->ID, 'Sector', true))) !="") echo 'selected';  else echo '';  ?>><?php // echo $roleval->name  ?></option>
                        
                           
                        
    <?php //}  ?>
                        
                                                    <option value="other">Other</option>
                        
                                                </select>
                        
                                            </p>-->



                        <div id="member_id" style="display:none">

                            <p class="form-row form-row-wide " >                                



                            </p>

                        </div>



                    </div>

                    <div class="col2-set" id="customer_details">

                        <h5><b><u>OTHER DETAILS</u></b></h5>

                        <div class="col-1">



<!--                            <p class="form-row form-row-wide" >



                                <label for="upload_doc" class="">Upload Supporting Documents (Maximum file upload size 2mb )</label>



                                <input type="file" class="input-text " name="upload_doc[]" id="upload_doc" placeholder=""  value=""   multiple="multiple"/></p>
-->


                          

                            <label for="mentoring" class="">Area in which Mentoring Required </label>

                            <select multiple="multiple"  name="mentoring[]" id="mentoring" placeholder="-- Select --" class="SlectBox "  >

    <?php $categories = get_categories(array('parent' => 50, 'hide_empty' => 0)); ?>

    <?php foreach ($categories as $mot) { ?>

                                    <option value="<?php echo $mot->term_id; ?>"<?php if (in_array($mot->term_id, (explode(',', (get_post_meta($post->ID, 'Mentoring required', true)))))) echo 'selected';
        else echo ''; ?>><?php echo $mot->name ?></option> 

    <?php } ?>

                                <option value="other">Other</option>

                            </select>

                            </p>



                            <p>

                            <div id="mentoring_id" style="display:none">

                                <input type="text" name="add_mentoring" id="add_mentoring" placeholder="Add area in which mentoring required" >  

                            </div>



                        </div> 

                        <div class="col-2">





                            <p class="form-row form-row-wide" >



                                <label for="facebook" class="">Facebook Page</label>



                                <input type="text" class="input-text " name="facebook" id="facebook" placeholder=""  value="<?php if ((get_post_meta($post->ID, 'Facebook', true))) echo get_post_meta($post->ID, 'Facebook', true);
    else echo ""; ?>"  /></p>







                            <p class="form-row form-row-wide" >



                                <label for="twitter" class="">Twitter Handle </label>



                                <input type="text" class="input-text " name="twitter" id="twitter" placeholder=""   value="<?php if ((get_post_meta($post->ID, 'Twitter', true))) echo get_post_meta($post->ID, 'Twitter', true);
    else echo ""; ?>"  /></p> 



                            <label for="innovatiobn_pitch" class="">Innovation Pitch (400 char)</label>



                            <input type="text" class="input-text " name="innovatiobn_pitch" maxlength="400" id="innovatiobn_pitch" placeholder=""  value="<?php if ((get_post_meta($post->ID, 'Innovation pitch', true))) echo get_post_meta($post->ID, 'Innovation pitch', true);
    else echo ""; ?>"   /></p>



                            <p class="form-row form-row-wide" >



                                <label for="twitter_pitch" class="">Twitter Pitch (100 char)</label>



                                <input type="text" class="input-text " name="twitter_pitch" maxlength="100" id="twitter_pitch" placeholder=""  value="<?php if ((get_post_meta($post->ID, 'Twitter pitch', true))) echo get_post_meta($post->ID, 'Twitter pitch', true);
    else echo ""; ?>"   /></p>



                        </div>

                    </div>





                    <input type="submit"  name="innovator_signup" id="innovator_signup" value="Submit" data-value="Submit" />

                    <div id="error"></div>





                    <div class="clear"></div>







                </form>



            </div> <!-- **woocommerce - Ends** --> 



            <div class="dt-sc-margin50"></div>







        </section> 



    </div>







    <!-- **primary - Ends** --> 

    <div class="dt-sc-margin80"></div>

    </div>

    <div class="dt-sc-hr-invisible"></div>		 <!-- **container - Ends** --> 

    <?php
    get_footer();
} else {



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
   $("#address").change(function () {

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









        $("#mentoring").change(function () {





            $('#mentoring option:selected').each(function (index, value) {



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











        $("#support_looking").change(function () {



            $('#support_looking option:selected').each(function (index, value) {



                if ($(this).val() == "other")



                {



                    $('#support_id').show()



                    $('#add_support').prop('required', true);



                    // $("input").$("input").prop('required',true);



                }



                else



                {



                    $('#support_id').hide();



                    $('#add_support').prop('required', false);



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



        $('#member_org').change(function () {



            // var member_count = ($('#member_org').val()).length;

            // var key_member = $('#member_org').val();

            if ($('#member_org').val() !== null) {

                var member_count = ($('#member_org').val()).length;

                var key_member = $('#member_org').val();

            }

            var aa = '';

            $('#member_org option:selected').each(function (index, value) {



                $('#member_id').show();



                aa += '<div class="col-1"><input type="text" name="member_type[]"  value="' + $(this).text() + '"><input type="text" name="member_fname[]"  placeholder ="First Name" ><input type="text" name="member_lname[]"  placeholder ="Last Name" ></div><div class="col-2"><input type="text" name="member_moble[]"  placeholder ="Mobile"><input type="text" name="member_email[]"  placeholder ="Email"><input type="text" name="member_address[]"  placeholder ="Address"></div>';

            });

            $('#member_id').html(aa);



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

          $(".student_alumni").click(function () {



           if ($(this).val() == "alumni")
            {
             
			$('#stfield').addClass('inst_inactive');
			
            }
            else
            {
				$('#stfield').removeClass('inst_inactive');
				
               
            }

        });



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


        $("#sector").live('change', function () {



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







        $(".institute_name").live('change', function () {

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


 $('#innovator_signup').click(function () {

            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            var numbers = /^[\d\-\+\s]+$/;

            var innovation_name = $('#innovation_name').val();

            var status_of_patent = $('#status_of_patent').val();

            var address = $('#address').val();

            var mobile = $('#mobile').val();

            var email = $('#email').val();

            var password = $('#password').val();

            var sector = $('#sector').val();

            var key_differentiator = $('#key_differentiator').val();

            var summary_innovation = $('#summary_innovation').val();

            var linepitch = $('#linepitch').val();

            var support_looking = $('#support_looking').val();

            var market_address = $('#market_address').val();

            var graduation =$('#graduation').val();
            var vsupport = $('#isprt p.CaptionCont span').text();
            var vsector=$('#sectordiv p.CaptionCont span').text();
	    var vrole=$('#prole p.CaptionCont span').text();
	    var vinst=$('#inst p.CaptionCont span').text();

            var flag = '0';
        if (innovation_name == '' || innovation_name == null)
            {

                $('#innovation_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {

                $('#innovation_name').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (status_of_patent == '' || status_of_patent == null)
            {

                $('#status_of_patent').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {

                $('#status_of_patent').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            
            if (email == "" || email == null || !emailPattern.test(email))
            {
                alert('email');

                $('#email').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {

                $('#email').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (password == '' || password == null)
            {
                $('#password').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                alert(password);
                flag++;
            }
            else
            {
                $('#password').css({"border-color": "", "border-weight": "", "border-style": ""});
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
           
           	
			 if (vsector =='-- Select --')
            {
                $('#sectordiv p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
 //alert('sectordiv');
                flag++;
            }
            else
            {
                $('#sectordiv p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
			
			
			 if (vrole =='-- Select --')
            {
              //   alert('vrole');
                $('#prole p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
				
                flag++;
            }
            else
            {
                $('#prole p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
			
			
			 if (vinst =='-- Select --')
            {
               //  alert('inst');
                $('#inst p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
				
                flag++;
            }
            else
            {
                $('#inst p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
             if (key_differentiator == '' || key_differentiator == null || key_differentiator > 400)
            {
               //  alert('key_differentiator');
                $('#key_differentiator').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#key_differentiator').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (summary_innovation == '' || summary_innovation == null )
            {
              //   alert('summary_innovation');
                $('#summary_innovation').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#summary_innovation').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
//            if (graduation == '' || graduation == null)
//            {
//                 alert('vsupport');
//                $('#graduation').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
//
//                flag++;
//            }
//            else
//            {
//                $('#graduation').css({"border-color": "", "border-weight": "", "border-style": ""});
//            }
            
            if (linepitch == '' || linepitch == null || linepitch > 100)
            {
               //  alert('linepitch');
                $('#linepitch').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#linepitch').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
             if (vsupport =='-- Select --')
            {
              //    alert('vsupport');
                $('#isprt p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#isprt p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (market_address == '' || market_address == null || market_address > 400)
            {
              //  alert('market_address');
                $('#market_address').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#market_address').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
			
           

            if (flag == 0)

            {


            }

            else

            {
//alert(flag);
                $('#error').html('<span style="color:red;">* Marked fields are mandatory. Kindly fill those fields to proceed ahead. </span>');

                return false;

            }





         

        });




      

    });





</script>
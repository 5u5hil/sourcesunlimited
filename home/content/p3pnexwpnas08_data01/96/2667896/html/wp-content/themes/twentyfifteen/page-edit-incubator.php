<?php
$user = wp_get_current_user();
$user_id = $user->ID;
$args = array('offset' => 0, 'post_type' => 'incubator', 'author' => $user->ID);

$the_query = new WP_Query($args);

$post = $the_query->post;
$post_id = $post->ID; //die;
?>

<?php
if ($_POST['email']) {
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


    $service_array = array();
    if (isset($_POST['service_provided'])) {
        $service_provided = $_POST['service_provided'];
        $spcount = count($_POST['service_provided']);
        for ($i = 0; $i < $spcount; $i++) {
            if ($service_provided[$i] == 'other') {
                if (!empty($_POST['service_id'])) {
                    $arg = array('parent' => 50);
                    $my_cat_id = wp_insert_term($_POST['service_id'], "category", $arg);
                    $service_new_city = $my_cat_id['term_id'];
                }
            } else {
                array_push($service_array, $service_provided[$i]);
            }

            if (isset($service_new_city)) {
                array_push($service_array, $service_new_city);
            }
        }
        $postCats = array_merge($postCats, $service_array);
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

    $tools_array = array();
    if (isset($_POST['tools_provided'])) {
        $tools_provided = $_POST['tools_provided'];
        $tpcount = count($_POST['tools_provided']);
        for ($i = 0; $i < $tpcount; $i++) {
            if ($tools_provided[$i] == 'other') {
                if (!empty($_POST['tool_id'])) {
                    $arg = array('parent' => 344);
                    $my_cat_id = wp_insert_term($_POST['tool_id'], "category", $arg);
                    $tools_new_city = $my_cat_id['term_id'];
                }
            } else {
                array_push($tools_array, $tools_provided[$i]);
            }

            if (isset($tools_new_city)) {
                array_push($tools_array, $tools_new_city);
            }
        }
        $postCats = array_merge($postCats, $tools_array);
    }


    if (isset($_POST['corporate_name'])) {
        if (!empty($_POST['add_corpoarte'])) {
            $arg = array('parent' => 333);
            $my_cat_id = wp_insert_term($_POST['add_corpoarte'], "category", $arg);
            $corporate = $my_cat_id['term_id'];
            array_push($postCats, $my_cat_id['term_id']);
        } else {
            $corporate = $_POST['corporate_name'];
            array_push($postCats, $_POST['corporate_name']);
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

    if (isset($_POST['funding_provided'])) {
        if (!empty($_POST['funding_id'])) {
            $arg = array('parent' => 338);
            $my_cat_id = wp_insert_term($_POST['funding_id'], "category", $arg);
            $funding_provided = $my_cat_id['term_id'];
            array_push($postCats, $my_cat_id['term_id']);
        } else {
            $funding_provided = $_POST['funding_provided'];
            array_push($postCats, $_POST['funding_provided']);
        }
    }


    if (isset($_POST['incubatee_supported'])) {
        if (!empty($_POST['support_id'])) {
            $arg = array('parent' => 350);
            $my_cat_id = wp_insert_term($_POST['support_id'], "category", $arg);
            $incubatee_supported = $my_cat_id['term_id'];
            array_push($postCats, $my_cat_id['term_id']);
        } else {
            $incubatee_supported = $_POST['incubatee_supported'];
            array_push($postCats, $_POST['incubatee_supported']);
        }
    }
    //   print_r($postCats);  // die;

    $my_post = array(
        'ID' => $post_id,
        'post_title' => $_POST['incubator_name'],
        'post_status' => 'publish',
        'post_type' => 'incubator',
        'post_category' => $postCats,
        'post_author' => $user_id,
    );

    $post_id_new = wp_insert_post($my_post);

    if ($post_id_new) {

        update_post_meta($post_id_new, 'Institute Name', implode(',', $institute_array));
        update_post_meta($post_id_new, 'Corporate', $_POST['corporate_name']);
        update_post_meta($post_id_new, 'Investment Network', $_POST['investment_network']);
        update_post_meta($post_id_new, 'Other associate', $_POST['other_associate']);


        update_post_meta($post_id_new, 'Secondary Role', $_POST['secrole']);
        update_post_meta($post_id_new, 'Contact Person Name', $_POST['contact_name']);
        update_post_meta($post_id_new, 'Address', $city);
        update_post_meta($post_id_new, 'Website', $_POST['website']);
        update_post_meta($post_id_new, 'Email', $_POST['email']);
        update_post_meta($post_id_new, 'Mobile', $_POST['mobile']);
        update_post_meta($post_id_new, 'Facebook', $_POST['facebook']);
        update_post_meta($post_id_new, 'incubator name', $_POST['incubator_name']);
        update_post_meta($post_id_new, 'year started', $_POST['year_started']);
        update_post_meta($post_id_new, 'Sector', implode(',', $sector_array));
        update_post_meta($post_id_new, 'Independant or Associated', $_POST['independant_associated']);
        update_post_meta($post_id_new, 'Associated', $_POST['associate']);
        update_post_meta($post_id_new, 'partners', $_POST['partners']);

        update_post_meta($post_id_new, 'Incubation Center', $_POST['incubation_center']);
        update_post_meta($post_id_new, 'facilities provided', $_POST['facilities_provided']);
        update_post_meta($post_id_new, 'fees incubatees', $_POST['fees_incubatees']);
        update_post_meta($post_id_new, 'criteria incubatees', $_POST['criteria_incubatees']);
        update_post_meta($post_id_new, 'incubation process', $_POST['incubation_process']);
        update_post_meta($post_id_new, 'contact name', $_POST['contact_name']);
        update_post_meta($post_id_new, 'mobile', $_POST['mobile']);
        update_post_meta($post_id_new, 'landline', $_POST['landline']);
        update_post_meta($post_id_new, 'password', $_POST['password']);
        // update_post_meta($post_id_new, 'Mentoring required', implode(',', $mentoring_array));
        update_post_meta($post_id_new, 'service provided', implode(',', $service_array));
        update_post_meta($post_id_new, 'tools provided', implode(',', $tools_array));

        update_post_meta($post_id_new, 'incubatee supported', $_POST['incubatee_supported']);
        update_post_meta($post_id_new, 'funding provided', $_POST['funding_provided']);
        update_post_meta($post_id_new, 'facebook', $_POST['facebook']);
        update_post_meta($post_id_new, 'recent article', $_POST['recent_article']);

        update_post_meta($post_id_new, 'sample company', $_POST['sample_comp']);


        update_post_meta($post_id_new, 'Interested in Investing', json_encode(array()));
        update_post_meta($post_id_new, 'Show Interest', json_encode(array()));




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
                        $attach_id = wp_insert_attachment($attachment, $movefile['file'], $post_id_new);
                        if ($attach_id) {
                            array_push($extraAttachments, $attach_id);
                        }
                    }
                }
            }




            update_post_meta($post_id, 'File Attach', json_encode($extraAttachments));
        }
    }






    $post_id_new = wp_insert_post($my_post);
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
                    <li> <a href="/incubator-dashboard/" >Dashboard</a> </li>
                    <li> <a href="/startup-listing">Startup</a> </li>
                    <li> <a href="/innovator-listing">Innovator</a> </li>

                    <li> <a href="/edit-incubator/" class="active_menu">Edit Profile</a> </li>
                </ul>	
            </aside>

            <?php ?>


        </section> <!-- **secondary - Ends** -->  

        <!-- **primary - Starts** --> 

        <section id="primary" class="with-left-sidebar page-with-sidebar">
            <div class="woocommerce">
                <div class="col2-set">
                    <form name="checkout" method="post" class="checkout" action="/edit-incubator/" enctype="multipart/form-data" id="edprofile">

<!--                        <div id="edit-profile">

                            <?php
                            if (has_post_thumbnail()) {
                                // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); 

                                the_post_thumbnail();
                            } else {

                                $img = wp_get_attachment_image_src(414);

                                echo "<img src='" . $img[0] . "' />";
                            }
                            ?>
                            <div class="clr"></div>
                            <input type="file" value="change" name="logo">
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
                                    <?php
                                }
                            } else {
                                echo "No Video Uploaded";
                            }
                            ?>
                            <div class="clr"></div>
                            <lable> Change / Upload  Video </lable>
                            <input type="file" value="change" name="upload_video[]" id="upload_video"  multiple="multiple"  >

                        </div>-->

 <div id="edit-profile">

                            <?php
                            if (has_post_thumbnail()) {
                                // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); 

                                the_post_thumbnail();
                            } else {

                                $img = wp_get_attachment_image_src(414);

                                echo "<img src='" . $img[0] . "' />";
                            }
                            ?>
                            <div class="clr"></div>
                           Change Logo:  <input type="file" value="change" name="logo">
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
									<lable> Change Video:  </lable>
                                    <a href="<?php echo wp_get_attachment_url($business_plan); ?>"><u>Business Plan</u></a> <br/>
                                    <?php
                                }
                            } else {
                                echo "<lable>Upload Video: </lable>";
                            }
                            ?>
                           <input type="file" value="change" name="upload_video[]" id="upload_video"  multiple="multiple"  >

                        </div>

                        <!-- ============ start of section  -->
                        <div class="fieldsection"> 
                            <h5> INCUBATOR DETAILS</h5>
                            <div class="col-1">

                                <input type="hidden" class="input-text " name="entity" id="entity" placeholder=""  value="incubator"  />

                                <!-- **woocommerce-billing-fields - Starts** -->   




                                <p class="form-row form-row-wide " >

                                    <label for="ifirst_name" class="">Name of Incubator *</label>

                                    <input type="text" class="input-text " name="incubator_name" id="incubator_name" placeholder=""  value="<?php echo get_post_meta(get_the_ID(), 'incubator name', true); ?>" required="" /></p>



                                <p class="form-row form-row-wide " >

                                    <label for="ifirst_name" class="">Website *</label>

                                    <input type="text" class="input-text " name="website" id="website" placeholder=""  value="<?php echo get_post_meta(get_the_ID(), 'Website', true); ?>" required="" /></p>

                                <p class="form-row form-row-wide address-field" >

                                    <label>Year started * </label>

                                    <select class="input-text"  name="year_started" id="year_started"/>
                                <option value="">-- Select --</option>

                                <?php $year_of_mentor = get_categories(array('parent' => 57, 'hide_empty' => 0, 'order' => 'DESC')); ?>

                                <?php foreach ($year_of_mentor as $year_of_exp) { ?>

                                    <option value="<?php echo $year_of_exp->term_id ?>" <?php
                                    if ((get_post_meta($post->ID, 'year started', true)) == $year_of_exp->term_id)
                                        echo 'selected';
                                    else
                                        echo '';
                                    ?>><?php echo $year_of_exp->name ?></option>  

    <?php } ?>

                                </select>
                                </p>

                                <p class="form-row form-row-wide address-field" >
                                    <label> Independant or Associated  (with an institute, corporate etc.) * </label>
                                    <input  type="radio" class="input-radio independant_associated" name="independant_associated" value="Independant" <?php if ((get_post_meta($post->ID, 'Independant or Associated', true)) == 'Independant') { ?>checked="checked" <?php } ?> style="display:inline !important;"/> Independant
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" class="input-radio independant_associated" name="independant_associated" value="Associated"  <?php if ((get_post_meta($post->ID, 'Independant or Associated', true)) == 'Associated') { ?>  checked="checked" <?php } ?>  style="display:inline;"  /> Associated
                                </p>
    <?php if ((get_post_meta($post->ID, 'Independant or Associated', true)) == 'Associated') { ?>
                                    <div id="indec_assoc" >
                                        <input  type="radio" class="input-radio associate " name="associate" value="Institute" <?php if ((get_post_meta($post->ID, 'Associated', true)) == 'Institute') { ?> checked="checked" <?php } ?> style="display:inline !important;"/> Institute  
                                        <input  type="radio" class="input-radio associate " name="associate" value="Corporate"  <?php if ((get_post_meta($post->ID, 'Associated', true)) == 'Corporate') { ?> checked="checked" <?php } ?> style="display:inline !important;"/> Corporate
                                        <input  type="radio" class="input-radio associate " name="associate" value="Investment Network"  <?php if ((get_post_meta($post->ID, 'Associated', true)) == 'Investment Network') { ?> checked="checked" <?php } ?> style="display:inline !important;"/> Investment Network
                                        <input  type="radio" class="input-radio associate " name="associate" value="Other"   <?php if ((get_post_meta($post->ID, 'Associated', true)) == 'Other') { ?> checked="checked" <?php } ?> style="display:inline !important;"/> Other
                                    </div>
                                <?php } ?>
    <?php if ((get_post_meta($post->ID, 'Associated', true)) == 'Institute') { ?>
                                    <div  id="institute_div" >

                                        <label> Institute  </label>
                                        <select multiple="multiple" placeholder ="-- Select --" name="institute_name[]" class="institute_name SlectBox  "  >

                                            <?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>
                                            <?php foreach ($Alumni as $Alumnival) { ?>
                                                <option value="<?php echo $Alumnival->term_id ?>" ><?php echo $Alumnival->name ?></option>
        <?php } ?>
                                            <option value="other">Other</option>
                                        </select>

                                    </div>


                                    <div id="institute_id" style="display:none">
                                        <input type="text" name="add_institute" id="add_institute" value="" placeholder="Add Institute Name">
                                    </div>
                                <?php } ?>
    <?php if ((get_post_meta($post->ID, 'Associated', true)) == 'Corporate') { ?>
                                    <div id="corporate_div" >
                                        <label> Corporate / Organization </label>
                                        <select  name="corporate" class="corporate"  id="corporate" >
                                            <option value="">---Select---</option>
                                            <?php $corpoarte = get_categories(array('parent' => 333, 'hide_empty' => 0)); ?>
                                            <?php foreach ($corpoarte as $corpoarte_val) { ?>
                                                <option value="<?php echo $corpoarte_val->term_id ?>" ><?php echo $corpoarte_val->name ?></option>
        <?php } ?>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div id="corporate_id" style="display:none">
                                        <input type="text" name="add_corpoarte" id="add_corpoarte" value="" placeholder="Add Corporate / Organization">
                                    </div>
                                <?php } ?>
    <?php if ((get_post_meta($post->ID, 'Associated', true)) == 'Investment Network') { ?>
                                    <div id="investment_div" style="display:none">
                                        <label> Investment Network  </label>
                                        <select  name="investment_network" class="investment_network"  id="investment_network" >
                                            <option value="">---Select---</option>
                                            <?php $investment_network = get_categories(array('parent' => 157, 'hide_empty' => 0)); ?>
                                            <?php foreach ($investment_network as $investment_network_val) { ?>
                                                <option value="<?php echo $investment_network_val->term_id ?>" ><?php echo $investment_network_val->name ?></option>
        <?php } ?>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>


                                    <div id="investment_id" style="display:none">
                                        <input type="text" name="add_investment" id="add_investment" value="" placeholder="Add Investment Network">
                                    </div>
                                <?php } ?>
    <?php if ((get_post_meta($post->ID, 'Associated', true)) == 'Other') { ?>
                                    <div id="other_div" style="display:none">
                                        <input type="text" class="input-text " value="" placeholder="" name="other_associate" id="other_associate"/>
                                    </div>
    <?php } ?>

                                <p class="form-row form-row-wide address-field" >
                                    <label> Partners </label>
                                    <input type="text" class="input-text " value="<?php echo (get_post_meta($post->ID, 'partners', true)) ?>" placeholder="" name="partners" id="partners"/></p>


                            </div>

                            <div class="col-2">
                                <p class="form-row form-row-wide  " >  
                                    <label>  Objectives of the Incubation Center * </label>
                                    <input type="text" class="input-text " value="<?php echo (get_post_meta($post->ID, 'Incubation Center', true)) ?>" placeholder="" name="incubation_center" id="incubation_center"/>

                                </p>
                                <p class="form-row form-row-wide  " >  
                                    <label>  Facilities provided * </label>
                                    <input type="text" class="input-text " value="<?php echo (get_post_meta($post->ID, 'facilities provided', true)) ?>" placeholder="" name="facilities_provided" id="facilities_provided"/>

                                </p>
                                <p class="form-row form-row-wide  " >  
                                    <label>  Fees for Incubatees * </label>
                                    <input type="text" class="input-text " value="<?php echo (get_post_meta($post->ID, 'fees incubatees', true)) ?>" placeholder="" name="fees_incubatees" id="fees_incubatees"/>

                                </p>
                                <p class="form-row form-row-wide  " >  
                                    <label>  Selection Criteria for Incubatees * </label>
                                    <input type="text" class="input-text " value="<?php echo (get_post_meta($post->ID, 'criteria incubatees', true)) ?>" placeholder="" name="criteria_incubatees" id="criteria_incubatees"/>

                                </p>



                                <div class="form-row form-row-wide address-field " id="sectordiv">	

                                    <label for="sector" class="">Sectors to Invest in *</label>



                                    <select multiple="multiple" placeholder="-- Select --"  name="sector[]" id="sector" class="sector SlectBox "  required="" >



                                        <?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>

    <?php foreach ($categories as $cats) { ?>

                                            <option value="<?php echo $cats->term_id ?>"<?php if (in_array($cats->term_id, (explode(',', (get_post_meta($post->ID, 'Sector', true))))))
                                                echo 'selected';
                                            else
                                                echo '';
                                            ?>><?php echo $cats->name ?></option>   

    <?php } ?>
                                        <option value="other">Other</option>

                                    </select>



                                </div>
                                <div id="sector_div" style="display: none;">
                                    <input type="text" class="input-text " value="" placeholder="Add sectors to Invest in" name="add_sector" id="add_sector"/> 
                                </div>


                                <p class="form-row form-row-wide  " >  
                                    <label>  Incubation Process</label>
                                    <input type="text" class="input-text " value="<?php echo (get_post_meta($post->ID, 'incubation process', true)) ?>"" placeholder="" name="incubation_process" id="incubation_process"/>

                                </p> 



                            </div>
                        </div>

                        <!-- ============ end of section  -->


                        <!-- ============ start of section  -->
                        <div class="fieldsection"> 
                            <h5>DETAILS ON RESOURCES</h5>
                            <div class="col-1">


                                <p class="form-row form-row-wide " >

                                    <label for="contact-name" class=""> Contact Person Name * </label>

                                    <input type="text" class="input-text " name="contact_name" id="contact_name" placeholder=""  value="<?php echo (get_post_meta($post->ID, 'Contact Person Name', true)) ?>" required=""   /></p>







                                <p class="form-row form-row-wide  " >

                                    <label for="i_phone" class="">Mobile * </label>

                                    <input type="text" class="input-text " name="mobile" id="mobile" placeholder="" min="10" value="<?php echo (get_post_meta($post->ID, 'Mobile', true)) ?>"  required=""  /></p>

                                <p class="form-row form-row-wide  " >

                                    <label for="i_phone" class="">Landline * </label>

                                    <input type="text" class="input-text " name="landline" id="landline" placeholder="" min="10" value="<?php echo (get_post_meta($post->ID, 'landline', true)) ?>"  required=""  /></p>
                                <div class="clear"></div>





                            </div>

                            <div class="col-2">






                                <div class="form-row form-row-wide address-field " >

                                    <label for="address" class="">City of Location * </label>

                                    <select name="address" id="address" required="">

                                        <option value="">-- Select --</option>

                                        <?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0, 'order' => 'DESC')); ?>

                                        <?php foreach ($Organizations as $Organizationsval) { ?>

                                            <option value="<?php echo $Organizationsval->term_id; ?>"<?php
                                            if ((get_post_meta($post->ID, 'Address', true)) == $Organizationsval->term_id)
                                                echo 'selected';
                                            else
                                                echo '';
                                            ?>><?php echo $Organizationsval->name ?></option>

    <?php } ?>

                                        <option value="other">Other</option>

                                    </select>

                                </div>



                                <div id="address_id" style="display: none">

                                    <p class="form-row form-row-wide " > 

                                        <input type="text" class="input-text " name="add_address" id="add_address" placeholder="Add City of Location"    /> 

                                    </p>

                                </div>

                                <p class="form-row form-row-wide  validate-email" >

                                    <label for="email" class="">Email *</label>

                                    <input type="email" class="input-text " name="email" id="email" placeholder=""  value="<?php echo (get_post_meta($post->ID, 'Email', true)) ?>" required=""   /></p>



                                <p class="form-row form-row-wide  " >

                                    <label for="i_email" class="">Password *</label>

                                    <input type="password" class="input-text " name="password" id="password" placeholder=""  value="<?php echo (get_post_meta($post->ID, 'password', true)) ?>"  required=""  /></p>



                                <div class="clear"></div>




                            </div> 
                        </div>

                        <!-- ============ end of section  -->

                        <div class="fieldsection"> 
                            <h5>CONTACT DETAILS</h5>
                            <div class="col-1">


                                <p class="form-row form-row-wide " >

                                    <label for="incubatee_supported" class=""> Time for which Incubatee is Supported in house </label>


                                    <select name="incubatee_supported" id="incubatee_supported" >
                                        <option value="">-- Select --</option>

                                        <?php $incubatee = get_categories(array('parent' => 350, 'hide_empty' => 0, 'order' => 'DESC')); ?>

                                        <?php foreach ($incubatee as $incubateeval) { ?>


                                            <option value="<?php echo $incubateeval->term_id; ?>"<?php
                                            if ((get_post_meta($post->ID, 'incubatee supported', true)) == $incubateeval->term_id)
                                                echo 'selected';
                                            else
                                                echo '';
                                            ?>><?php echo $incubateeval->name ?></option>

    <?php } ?>

                                        <option value="other">Other</option>
                                    </select>
                                </p>

                                <div id="support_div" style="display:none">
                                    <input type="text" class="input-text " name="support_id" id="support_id" placeholder="Add Time for which incubatee is supported in house"  value=""  />
                                </div>




                                <p class="form-row form-row-wide" id="tooldiv" >

                                    <label for="i_phone" class="">Tools Provided </label>
                                    <select  multiple="multiple" placeholder="-- Select --"  name="tools_provided[]" id="tools_provided" name="tools_provided" class="SlectBox" >


                                        <?php $tools = get_categories(array('parent' => 344, 'hide_empty' => 0, 'order' => 'DESC')); ?>

    <?php foreach ($tools as $toolsval) { ?>

                                            <option value="<?php echo $toolsval->term_id; ?>"<?php if (in_array($toolsval->term_id, (explode(',', (get_post_meta($post->ID, 'tools provided', true))))))
            echo 'selected';
        else
            echo '';
        ?>><?php echo $toolsval->name ?></option>   

    <?php } ?>

                                        <option value="other">Other</option>
                                    </select>

                                </p>
                                <div id="tools_div" style="display:none">
                                    <input type="text" class="input-text " name="tool_id" id="tool_id" placeholder="Add Tools provided"  value=""   />
                                </div>

                                <div class="clear"></div>





                            </div>

                            <div class="col-2">


                                <p class="form-row form-row-wide" id="servicediv" >

                                    <label for="i_phone" class="">Services Provided </label>
                                    <select  multiple="multiple" placeholder="-- Select --"  name="service_provided[]" id="service_provided" class="SlectBox" >



    <?php $service = get_categories(array('parent' => 50, 'hide_empty' => 0, 'order' => 'DESC')); ?>

    <?php foreach ($service as $serviceval) { ?>

                                            <option value="<?php echo $serviceval->term_id; ?>"<?php if (in_array($serviceval->term_id, (explode(',', (get_post_meta($post->ID, 'service provided', true))))))
            echo 'selected';
        else
            echo '';
        ?>><?php echo $serviceval->name ?></option>   


    <?php } ?>

                                        <option value="other">Other</option>
                                    </select></p>

                                <div id="service_div" style="display:none">
                                    <input type="text" class="input-text " name="service_id" id="service_id" placeholder="Add Services provided"  value=""   />
                                </div>
                                <p class="form-row form-row-wide  " >

                                    <label for="i_email" class="">Funding Provided</label>
                                    <select name="funding_provided" id="funding_provided" >

                                        <option value="">-- Select --</option>

    <?php $funding = get_categories(array('parent' => 338, 'hide_empty' => 0, 'order' => 'DESC')); ?>

    <?php foreach ($funding as $fundingval) { ?>


                                            <option value="<?php echo $fundingval->term_id; ?>"<?php
        if ((get_post_meta($post->ID, 'funding provided', true)) == $fundingval->term_id)
            echo 'selected';
        else
            echo '';
        ?>><?php echo $fundingval->name ?></option>

    <?php } ?>

                                        <option value="other">Other</option>
                                    </select></p>
                                <div id="funding_div" style="display:none">
                                    <input type="text" class="input-text " name="funding_id" id="funding_id" placeholder="Add Funding provided"  value=""    />
                                </div>


                                <div class="clear"></div>






                            </div> 
                        </div>


                        <!-- ============ start of section  -->
                        <div class="fieldsection"> 
                            <h5>OTHER DETAILS</h5>
                            <div class="col-1">	
                                <p class="form-row form-row-wide " >

                                    <label for="istart_name" class="">Facebook Page</label>

                                    <input type="text" class="input-text " name="facebook" id="facebook" placeholder=""  value="<?php echo get_post_meta($post->ID, 'Facebook', true) ?>"  /></p>
                                <div class="clear"></div>
                            </div>
                            <div class="col-2">	

                                <p class="form-row form-row-wide " >

                                    <label for="ifirst_name" class="">Recent article links </label>

                                    <input type="text" class="input-text " name="recent_article" id="recent_article" placeholder=""  value="<?php echo get_post_meta($post->ID, 'recent article', true) ?>" /></p>

                                <p class="form-row form-row-wide " > 

                                    <label for="ifirst_name" class="">Sample companies incubated </label>

                                    <input type="text" class="input-text " name="sample_comp" id="sample_comp" placeholder=""  value="<?php echo get_post_meta($post->ID, 'sample company', true) ?>" /></p>




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
    <?php
    get_footer();
} else {

    header("location:/login/");
}
?>
<script>

    $ = jQuery;

    $(document).ready(function () {

        $(".institute_name").live('change', function () {
            $('.institute_name option:selected').each(function (index, value) {

                if ($(this).val() == "other")
                {
                    $('#institute_id').show()

                    // $("input").$("input").prop('required',true);
                }
                else
                {
                    $('#institute_id').hide();

                }
            });
        });

        $(".corporate_name").live('change', function () {
            $('.corporate_name option:selected').each(function (index, value) {

                if ($(this).val() == "other")
                {
                    $('#corporate_id').show()

                    // $("input").$("input").prop('required',true);
                }
                else
                {
                    $('#corporate_id').hide();

                }
            });
        });

        $(".investment_network").live('change', function () {
            $('.investment_network option:selected').each(function (index, value) {

                if ($(this).val() == "other")
                {
                    $('#investment_id').show()

                    // $("input").$("input").prop('required',true);
                }
                else
                {
                    $('#investment_id').hide();

                }
            });
        });

       $(".independant_associated").click(function () {

            if ($(this).val() == "Associated")
            {
                $('#indec_assoc').show();
                $('#institute_div').show();
            }
            else
            {
                $('#indec_assoc').hide();
                $('#corporate_id').hide();
                $('#corporate_div').hide();
                $('#investment_div').hide();
                $('#investment_id').hide();
                $('#institute_div').hide();
            }
        });
        $('.associate').click(function () {
           
            if ($(this).val() == "Institute")
            {
                $('#institute_div').show();
                $('#corporate_id').hide();
                $('#corporate_div').hide();
                $('#investment_div').hide();
                $('#investment_id').hide();
                $('#other_div').hide();
                 $('#other_id').hide();
            }
            else if ($(this).val() == "Corporate")
            {
                $('#corporate_div').show();
                $('#institute_div').hide();
                $('#institute_id').hide();
                 $('#investment_id').hide();
                $('#investment_div').hide();
                $('#other_div').hide();
                 $('#other_id').hide();
            }
            else if ($(this).val() == "Investment Network")
            {
                $('#corporate_div').hide();
                 $('#corporate_id').hide();
                $('#institute_div').hide();
                 $('#institute_id').hide();
                $('#investment_div').show();
                $('#other_div').hide();
                 $('#other_id').hide();
            }
            else
            {
                $('#corporate_div').hide();
                 $('#corporate_id').hide();
                $('#institute_div').hide();
                 $('#institute_id').hide();
                $('#investment_div').hide();
                 $('#investment_id').hide();
                $('#other_div').show();
            }

        });



        $("#address").live('change', function () {



            if ($(this).val() == "other")

            {

                $('#address_id').show()

                $('#add_address').prop('required', true);

                // $("input").$("input").prop('required',true);

            }

            else

            {

                $('#address_id').hide();

                $('#add_address').prop('required', false);

            }

        });

        $("#sector").live('change', function () {

            $('#sector option:selected').each(function (index, value) {

                if ($(this).val() == "other")

                {

                    $('#sector_div').show()
                    $('#add_sector').prop('required', true);

                }

                else

                {

                    $('#sector_div').hide();
                    $('#add_sector').prop('required', false);

                }
            });
        });



        $("#incubatee_supported").live('change', function () {



            if ($(this).val() == "other")

            {

                $('#support_div').show()

            }

            else

            {

                $('#support_div').hide();

            }

        });



        $("#tools_provided").live('change', function () {

            $('#tools_provided option:selected').each(function (index, value) {

                if ($(this).val() == "other")

                {

                    $('#tools_div').show()



                    // $("input").$("input").prop('required',true);

                }

                else

                {

                    $('#tools_div').hide();


                }
            });
        });





        $("#service_provided").live('change', function () {
            $('#service_provided option:selected').each(function (index, value) {
//alert($(this).val());  

                if ($(this).val() == "other")

                {

                    $('#service_div').show()



                    // $("input").$("input").prop('required',true);

                }

                else

                {

                    $('#service_div').hide();



                }

            });
        });
        $("#funding_provided").live('change', function () {



            if ($(this).val() == "other")

            {

                $('#funding_div').show()



            }

            else

            {

                $('#funding_div').hide();



            }

        });

        $("#submit").click(function () {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var numbers = /^[\d\-\+\s]+$/;
            var incubator_name = $('#incubator_name').val();
            var website = $('#website').val();
            var year_started = $('#year_started').val();
            var contact_name = $('#contact_name').val();
            var email = $('#email').val();
            var address = $('#address').val();
            var mobile = $('#mobile').val();
            var landline = $('#landline').val();
            var password = $('#password').val();
            // var independant_associated = $('#independant_associated').val();
            var partners = $('#partners').val();
            var incubation_center = $('#incubation_center').val();

            var facilities_provided = $('#facilities_provided').val();
            var fees_incubatees = $('#fees_incubatees').val();
            var criteria_incubatees = $('#criteria_incubatees').val();
            var incubation_process = $('#incubation_process').val();
            var contact_name = $('#contact_name').val();


            var incubatee_supported = $('#incubatee_supported').val();
            var tools_provided = $('#tools_provided').val();
            var service_provided = $('#service_provided').val();
            var funding_provided = $('#funding_provided').val();


            var facebook = $('#facebook').val();
            var recent_article = $('#recent_article').val();
            var sample_comp = $('#sample_comp').val();

            var sectordiv = $('#sectordiv p.CaptionCont span').text();
            var tooldiv = $('#tooldiv p.CaptionCont span').text();
            var servicediv = $('#servicediv p.CaptionCont span').text();

            var answer = $('#answer').val();
            var hidden_answer = $('#hidden_answer').val();
            var policy = $('#policy').val();

            var flag = '0';
            if (incubator_name == '' || incubator_name == null)
            {
                $('#incubator_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#incubator_name').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (website == '' || website == null)
            {
                $('#website').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#website').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (year_started == '' || year_started == null)
            {
                $('#year_started').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#year_started').css({"border-color": "", "border-weight": "", "border-style": ""});
            }


            if (incubation_center == '' || incubation_center == null)
            {
                $('#incubation_center').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#incubation_center').css({"border-color": "", "border-weight": "", "border-style": ""});
            }



            if (fees_incubatees == '' || fees_incubatees == null)
            {
                $('#fees_incubatees').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#fees_incubatees').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (facilities_provided == '' || facilities_provided == null)
            {
                $('#facilities_provided').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#facilities_provided').css({"border-color": "", "border-weight": "", "border-style": ""});
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


            if (sectordiv == '-- Select --')
            {
                $('#sectordiv p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#sectordiv p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (criteria_incubatees == '' || criteria_incubatees == null)
            {
                $('#criteria_incubatees').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#criteria_incubatees').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (contact_name == '' || contact_name == null)
            {
                $('#contact_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#contact_name').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (email == '' || email == null || !emailPattern.test(email))
            {
                $('#email').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#email').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (mobile == '' || mobile == null  || !numbers.test(mobile))
            {
                $('#mobile').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#mobile').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (password == '' || password == null)
            {
                $('#password').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#password').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (landline == '' || landline == null || isNaN(landline))
            {
                $('#landline').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#landline').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (criteria_incubatees == '' || criteria_incubatees == null)
            {
                $('#criteria_incubatees').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#criteria_incubatees').css({"border-color": "", "border-weight": "", "border-style": ""});
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
                $('#error').html('<span style="color:red;">* Marked fields are mandatory. Kindly fill those fields  to proceed ahead. </span>');
                return false;
            }

//            if ($("#email").val()) {
//                alert('afjasfjsh');
//                $.ajax({
//                    url: "/register-email/",
//                    type: "post",
//                    data: {email: $("#email").val(), name: $("#investor_name").val()},
//                    success: function (data) {
//
//                    }
//                });
//            }


        });
    });
</script>
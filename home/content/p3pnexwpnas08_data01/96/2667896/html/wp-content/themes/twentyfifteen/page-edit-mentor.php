<?php

$user = wp_get_current_user();

$user_id = $user->ID;

$args = array('offset' => 0, 'post_type' => 'mentor', 'author' => $user->ID);



$the_query = new WP_Query($args);



$post = $the_query->post;

$post_id = $post->ID;

?>



<?php

if ($_POST['email']) {

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











    $my_post = array(

        'ID' => $post_id,

        'post_title' => $_POST['mentor_name'],

        'post_status' => 'publish',

        'post_type' => 'mentor',

        'post_category' => $postCats,

        'post_author' => $user_id,

    );







    $post_id_new = wp_insert_post($my_post);







    if ($post_id_new) {



        //update_post_meta($post_id_new, 'Secondary Role', $_POST['secrole']);



                    update_post_meta($post_id_new, 'Address', $_POST['address']);

                    update_post_meta($post_id_new, 'Areas of expertise', implode(',', $expertise_array));

                    update_post_meta($post_id_new, 'Alumni of Institute', implode(',', $institute_array));

                    update_post_meta($post_id_new, 'Organization', $_POST['organization']);

                    update_post_meta($post_id_new, 'Currently working at', $_POST['working_org']);

                    update_post_meta($post_id_new, 'Role', $role);

                    update_post_meta($post_id_new, 'Mobile', $_POST['mobile']);

                    update_post_meta($post_id_new, 'Email', $_POST['email']);

                    update_post_meta($post_id_new, 'Password', $_POST['password']);

                    update_post_meta($post_id_new, 'City Of location', $city);

                    // update_post_meta($post_id_new, 'Alumni of Institute', $_POST['alumni_inst']);

                    update_post_meta($post_id_new, 'Member of Organizations', $member);

                    update_post_meta($post_id_new, 'interest to mentor', implode(',', $interest_to_mentor_array));

                    update_post_meta($post_id_new, 'Companies associated', $_POST['company_associate']);

                    update_post_meta($post_id_new, 'Years as a mentor', $_POST['year_of_mentor']);

                    update_post_meta($post_id_new, 'Twitter', $_POST['twitter']);

                    update_post_meta($post_id_new, 'Website', $_POST['website']);

                    update_post_meta($post_id_new, 'Facebook', $_POST['facebook']);

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

            $attach_id = wp_insert_attachment($attachment, $movefile['file'], $post_id_new);

            $attach_data = wp_generate_attachment_metadata($attach_id, $file);

            wp_update_attachment_metadata($attach_id, $attach_data);

            set_post_thumbnail($post_id_new, $attach_id);

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

                    <li> <a href="/mentor-dashboard/" >Dashboard</a> </li>

                    <li> <a href="/startup-listing">Startup</a> </li>

                    <li> <a href="/innovator-listing">Innovator</a> </li>



                    <li> <a href="/edit-mentor/" class="active_menu">Edit Profile</a> </li>

                </ul>	

            </aside>



    <?php ?>





        </section> <!-- **secondary - Ends** -->  



        <!-- **primary - Starts** --> 



        <section id="primary" class="with-left-sidebar page-with-sidebar">

            <div class="woocommerce">

                <div class="col2-set">

                    <form name="checkout" method="post" class="checkout" action="/edit-mentor/" enctype="multipart/form-data" id="edprofile">



                        <div id="edit-profile">



    <?php

    if (has_post_thumbnail()) {

        // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); 



        the_post_thumbnail();

    } else {



        $img = wp_get_attachment_image_src(415);



        echo "<img src='" . $img[0] . "' />";

    }

    ?>
<div class="clr"></div>
Change Logo: <input type="file" value="change" name="logo">

                        </div>

                       

                        











                        <!-- ============ start of section  -->

                        <div class="fieldsection mtop30"> 

                            <h5> MENTOR DETAILS</h5>

                            <div class="col-1">



                                <div class="woocommerce-billing-fields"> 

                                    <input type="hidden" class="input-text " name="entity" id="entity" placeholder=""  value="mentor" required="" />



                                </div>

                                <p class="form-row form-row-wide" >

                                <label for="ifirst_name" class="">Mentor Name *</label> 

                                <input type="text" class="input-text " name="mentor_name" id="mentor_name" placeholder=""  value="<?php  echo $user->first_name; ?>" required="" >   

                                </p>

                                <p class="form-row form-row-wide" >

                                    <label for="ifirst_name" class="">Currently Working at Organization * </label>                                       

                                    <select class="input-text " name="working_org" id="working_org" required="" >

                                        <option value="yes" <?php if(get_post_meta($post->ID, 'Currently working at', true) == 'yes') echo "selected"; else echo "";?>>Yes</option>

                                        <option value="no" <?php if(get_post_meta($post->ID, 'Currently working at', true)=='no') echo "selected"; else echo "";?>>No</option>

                                    </select>

                                </p>

                                <?php if(get_post_meta($post->ID, 'Currently working at', true) == yes) { ?>

                                <div id="corporation">

                                    <p class="form-row form-row-wide" > 

                                        <label for="ilast_name" class="">Corporation Currently Working at </label>      

                                        <input type="text" class="input-text " name="organization" id="organization" placeholder=""  value="<?php echo get_post_meta($post->ID, 'Organization', true); ?>"  />  

                                    </p>

                                    <div class="clear"></div>

                                    <p class="form-row form-row-wide " >

                                        <label for="i_email" class="">Designation at Corporation *</label>                                                                                              

                                        <select name="role" id="role" class="role " required="" >

                                            <option value="">-- Select --</option>

    <?php $role = get_categories(array('parent' => 28, 'hide_empty' => 0)); ?>  

                                            <?php foreach ($role as $roleval) { ?>                                            

                                                <option value="<?php echo $roleval->term_id; ?>"<?php if (get_post_meta($post->ID, 'Role', true) == $roleval->term_id) echo 'selected';   else echo ''; ?>><?php echo $roleval->name ?></option>

                                            <?php } ?>                                        

                                            <option value="other">Other</option>

                                        </select>

                                    </p>

                                </div>

                                <?php }?>

                                <p>                            

                                <div id="role_id" style="display:none"> 

                                    <input type="text" name="add_role" id="add_role" placeholder="Add role" >   

                                </div>

                                </p>                            



                                <div class="clear"></div>

                            </div>



                            <div class="col-2">

                                <div class="woocommerce-shipping-fields">





                                    <p class="form-row form-row-wide" >

                                        <label for="ifirst_name" class="">City of Location *</label>                                                                

                                        <select name="address" id="address" required="">

                                            <option value="">-- Select --</option>

    <?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>   

                                            <?php foreach ($Organizations as $Organizationsval) { ?>                                        

                                                  <option value="<?php echo $Organizationsval->term_id; ?>"<?php if ((get_post_meta($post->ID, 'City Of location', true)) == $Organizationsval->term_id) echo 'selected';   else echo ''; ?>><?php echo $Organizationsval->name ?></option>

                                            <?php } ?>                                    

                                            <option value="other">Other</option>

                                        </select>

                                    </p>

                                    <p>                            

                                    <div id="address_id" style="display:none">   

                                        <input type="text" name="add_address" id="add_address" placeholder="Add City Of location" >  

                                    </div>

                                    </p>  





                                    <p class="form-row form-row-wide" >

                                        <label for="i_email" class="">Alumni of Institute(s) *</label>                                                                                               

                                        <select multiple="multiple" placeholder="-- Select --" name="alumni_inst[]" id="alumni_inst" class="alumni_inst SlectBox" required=""  >

    <?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>   

                                 <?php foreach ($Alumni as $Alumnival) { ?>                                        

                                                <option value="<?php echo $Alumnival->term_id; ?>"<?php if (in_array($Alumnival->term_id,(explode(',',(get_post_meta($post->ID, 'Alumni of Institute', true)))))) echo 'selected';  else echo ''; ?>><?php echo $Alumnival->name ?></option>   

<?php } ?>

                                                                            

                                            <option value="other">Other</option>

                                        </select>

                                    </p>

                                    <p>                            

                                    <div id="alumni_id" style="display:none">      

                                        <input type="text" name="add_alumni" id="add_alumni" placeholder="Add alumni of Institute" > 

                                    </div>

                                    </p>                            

                                    <div class="clear"></div>



                                    <p class="form-row form-row-wide" >

                                        <label for="ifirst_name" class="">Sectors of Interest to Mentor * </label>                                                                 

                                        <select multiple="multiple" placeholder="-- Select --" name="interest_to_mentor[]" id="interest_to_mentor" class="interest_to_mentor SlectBox" required="" >

    <?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>    

                                <?php foreach ($categories as $cat) { ?>                                        

                                                  <option value="<?php echo $cat->term_id; ?>"<?php if (in_array($cat->term_id,(explode(',',(get_post_meta($post->ID, 'interest to mentor', true)))))) echo 'selected';

    else echo ''; ?>><?php echo $cat->name ?></option>



                                            <?php } ?>                                    

                                            <option value="other">Other</option>

                                        </select>

                                    </p>

                                    <div id="sector_id" style="display:none">

                                        <p class="form-row form-row-wide " >      

                                            <input type="text" class="input-text " name="add_sector" id="add_sector" placeholder="Add sector of intrest"  value="" />                                </p>

                                    </div>



                                    





                                </div> 





                            </div>

                        </div>



                        <!-- ============ end of section  -->





                        <!-- ============ start of section  -->

                        <div class="fieldsection"> 

                            <h5>CONTACT DETAILS</h5>

                            <div class="col-1">

                                 <div class="woocommerce-billing-fields">

                            <p class="form-row form-row-wide validate-email" >     

                                <label for="i_email" class="">Email *</label>       

                                <input type="email" class="input-text " name="email" id="email" placeholder=""  value="<?php echo get_post_meta($post->ID, 'Email', true) ?>" required=""  />

                            </p>

                            <div class="clear"></div>

                            <p class="form-row form-row-wide" >  

                                <label for="i_email" class="">Password *</label>     

                                <input type="password" class="input-text " name="password" id="password" placeholder=""  value="<?php echo get_post_meta($post->ID, 'Password', true) ?>"  required="" />                            </p>

                            <p class="form-row form-row-wide validate-phone" >    

                                <label for="i_phone" class="">Mobile * </label>          

                                <input type="text" class="input-text " name="mobile" id="mobile"  placeholder=" "  value="<?php echo get_post_meta($post->ID, 'Mobile', true) ?>"  />                            </p>



                            <p class="form-row form-row-wide validate-phone" >    

                                <label for="i_phone" class="">Companies Associated with as a Mentor  </label>          

                                <input type="text" class="input-text " name="company_associate" id="company_associate"    value="<?php  echo get_post_meta($post->ID, 'Companies associated', true) ?>"  />                            </p>







                            <div class="clear"></div>

                        </div>







                            </div>



                            <div class="col-2">





 <div class="woocommerce-shipping-fields">

                            <!-- **shipping-address - Starts** -->   



                            <p class="form-row form-row-wide" >

                                <label for="expertise" class="">Areas of Expertise *</label>                                                                                               

                                <select multiple="multiple" placeholder="-- Select --" name="expertise[]" id="expertise" class="experience SlectBox" required=""  >

<?php $expertise = get_categories(array('parent' => 147, 'hide_empty' => 0)); ?> 

                                   <?php foreach ($expertise as $expertiseval) { ?>                                        

                                       <option value="<?php echo $expertiseval->term_id; ?>"<?php if (in_array($expertiseval->term_id,(explode(',',(get_post_meta($post->ID, 'Areas of expertise', true)))))) echo 'selected';

    else echo ''; ?>><?php echo $expertiseval->name ?></option>

                                    <?php } ?>                                    

                                    <option value="other">Other</option>

                                </select>

                            </p>

                            <p>                            

                            <div id="expertise_id" style="display:none">     

                                <input type="text" name="add_expertise" id="add_expertise" placeholder="Add Areas of expertise" >     

                            </div>

                            </p>                            



                            <div class="clear"></div>

                            <p class="form-row form-row-wide " >

                                <label for="i_phone" class="">Member of Organizations  </label>                                                                                          

                                <select name="member" id="member" class="member " >

                                    <option value="">-- Select --</option>

<?php $Organizations = get_categories(array('parent' => 14, 'hide_empty' => 0)); ?>  

                                  <?php foreach ($Organizations as $Organizationsval) { ?>                                        

                                        <option value="<?php echo $Organizationsval->term_id; ?>"<?php if ((get_post_meta($post->ID, 'Member of Organizations', true)) == $Organizationsval->term_id) echo 'selected';

    else echo ''; ?>><?php echo $Organizationsval->name ?></option>

                                    <?php } ?>                                    

                                    <option value="other">Other</option>

                                </select>

                            </p>

                            <p>                            

                            <div id="add_organization" style="display:none">    

                                <input type="text" name="other_organization" id="other_organization" placeholder="Add Organization here" >  

                            </div>

                            </p>                            





                            <div class="clear"></div>

                            <p class="form-row form-row-wide" >

                                <label for="year_of_mentor" class="">Years as a Mentor  </label>                                                                                          

                                <select name="year_of_mentor" id="year_of_mentor" class="year_of_mentor"  >

                                    <option value="">-- Select --</option>

                                <?php $year_of_mentor = get_categories(array('parent' => 23, 'hide_empty' => 0)); ?>    

                                <?php foreach ($year_of_mentor as $year_of_exp) { ?>                                        

                                        <option value="<?php echo $year_of_exp->term_id; ?>"<?php if ((get_post_meta($post->ID, 'Years as a mentor', true)) == $year_of_exp->term_id) echo 'selected';

    else echo ''; ?>><?php echo $year_of_exp->name ?></option>

                                    <?php } ?>                                

                                </select>

                            </p>



                            <div class="clear"></div>

                            <p class="form-row form-row-wide " >  

                                <label for="ifirst_name" class="">Twitter Handle </label>   

                                <input type="text" class="input-text " name="twitter" id="twitter" placeholder=""  value="<?php echo get_post_meta($post->ID, 'Twitter', true) ?>" />  

                            </p>



                            









                                <div class="clear"></div>







                            </div>

                        </div>

                        </div>



                        <!-- ============ end of section  -->









                        <!-- ============ start of section  -->

                      

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

        $("#member").live('change', function () {

            if ($(this).val() == "other")

            {

                $('#add_organization').show()

            }

            else

            {

                $('#add_organization').hide();

            }

        });

        $("#address").live('change', function () {

            if ($(this).val() == "other")

            {

                $('#address_id').show();

                $('#add_address').prop('required', true);

            }

            else

            {

                $('#address_id').hide();

                $('#add_address').prop('required', false);

            }

        });

        $("#expertise").live('change', function () {

            $('#expertise option:selected').each(function (index, value) {

                if ($(this).val() == "other")

                {

                    $('#expertise_id').show();

                    $('#add_expertise').prop('required', true);

                }

                else

                {

                    $('#expertise_id').hide();

                    $('#add_expertise').prop('required', false);

                }

            });

        });

        $("#interest_to_mentor").live('change', function () {

            $('#interest_to_mentor option:selected').each(function (index, value) {

                if ($(this).val() == "other")

                {

                    $('#sector_id').show();

                    $('#add_sector').prop('required', true);

                }

                else

                {

                    $('#sector_id').hide();

                    $('#add_sector').prop('required', false);

                }

            });

        });



        $("#alumni_inst").live('change', function () {

            $('#alumni_inst option:selected').each(function (index, value) {

                if ($(this).val() == "other")

                {

                    $('#alumni_id').show();

                    $('#add_alumni').prop('required', true);

                }

                else

                {

                    $('#alumni_id').hide();

                    $('#add_alumni').prop('required', false);

                }

            });

        });

        $("#role").live('change', function () {

            if ($(this).val() == "other")

            {

                $('#role_id').show();

                $('#add_role').prop('required', true);

            }

            else

            {

                $('#role_id').hide();

                $('#add_role').prop('required', false);

            }

        });

        $("#working_org").live('change', function () {

            if ($(this).val() == "yes")

            {

                $('#corporation').show();

                $('#organization').prop('required', true);

                $('#role').prop('required', true);

            } else

            {

                $('#corporation').hide();

                $('#organization').prop('required', false);

                $('#role').prop('required', false);

            }

        });

        $('#submit_mentor').click(function () {

            var emailPattern = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

            var numbers = /^[\d\-\+\s]+$/;

            var mentor_name = $('#mentor_name').val();

            var email = $('#email').val();

            var address = $('#address').val();



            var mobile = $('#mobile').val();

            var password = $('#password').val();

            var organization = $('#organization').val();

            var role = $('#role').val();

            var working_org = $('#working_org').val();



            var expertise = $('#expertise').val();

            var alumni_inst = $('#alumni_inst').val();

            var interest_to_mentor = $('#interest_to_mentor').val();

            var answer = $('#answer').val();

            var hidden_answer = $('#hidden_answer').val();

            var policy = $('#policy').val();





            var flag = '0';

            if (mentor_name == '' || mentor_name == null)

            {



                $('#mentor_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});



                flag++;

            }

            else

            {



                $('#mentor_name').css({"border-color": "", "border-weight": "", "border-style": ""});

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

            if (working_org == "yes")

            {

                if (organization == '' || organization == null)

                {

                    $('#organization').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});



                    flag++;

                }

                else

                {

                    $('#organization').css({"border-color": "", "border-weight": "", "border-style": ""});

                }



                if (role == '' || role == null)

                {

                    $('#role').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});



                    flag++;

                }

                else

                {

                    $('#role').css({"border-color": "", "border-weight": "", "border-style": ""});

                }

            }





            if (email == null || email == "" || !emailPattern.test(email))

            {



                $('#email').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});



                flag++;

            }

            else

            {



                $('#email').css({"border-color": "", "border-weight": "", "border-style": ""});

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











            if (password == '' || password == null)

            {

                $('#password').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});



                flag++;

            }

            else

            {

                $('#password').css({"border-color": "", "border-weight": "", "border-style": ""});

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



//            $('p .SlectBox').each(function(){

//		var a=$(this).text();

//              //  alert(a);

//		if($(a).empty()){

//                   

//			$(this).css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

//                         flag++;

//			}

//		});



            if (flag == 0)

            {

                return true;

            }

            else

            {

                $('#error').html('<span style="color:red;">* Marked fields are mandatory. Kindly fill those fields to proceed ahead. </span>');

                return false;

            }





            if ($("#email").val()) {



                $.ajax({

                    url: "/register-email/",

                    type: "post",

                    data: {email: $("#email").val(), name: $("#mentor_name").val()},

                    success: function (data) {



                    }

                });

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
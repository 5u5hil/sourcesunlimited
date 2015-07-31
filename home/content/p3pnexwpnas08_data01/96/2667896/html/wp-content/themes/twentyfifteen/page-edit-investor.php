<?php
$user = wp_get_current_user();

$user_id = $user->ID;

$args = array('offset' => 0, 'post_type' => 'investor', 'author' => $user->ID);



$the_query = new WP_Query($args);



$post = $the_query->post;

$post_id = $post->ID;


if (!function_exists('wp_handle_upload'))
        require_once( ABSPATH . 'wp-admin/includes/file.php' );



    require_once(ABSPATH . 'wp-admin/includes/image.php');
?>
<?php
if ($_POST['email']) {

  //ssss  echo "DGDg"; die;

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
            if (!empty($_POST['add_alumni'])) {
                $arg = array('parent' => 18);
                $my_cat_id = wp_insert_term($_POST['add_alumni'], "category", $arg);
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


    //   print_r($postCats);  // die;



    $my_post = array(
        'ID' => $post_id,
        'post_title' => $_POST['investor_name'],
        'post_status' => 'publish',
        'post_type' => 'investor',
        'post_category' => $postCats,
        'post_author' => $user_id,
    );







    $post_id_new = wp_insert_post($my_post);







    if ($post_id_new) {



        // update_post_meta($post_id_new, 'Secondary Role', $_POST['secrole']);



        update_post_meta($post_id_new, 'Organization Name', $_POST['company_name']); // die;



        update_post_meta($post_id_new, 'Alumni', implode(',', $institute_array));



        update_post_meta($post_id_new, 'Name Of investor', $_POST['investor_name']);



        update_post_meta($post_id_new, 'Member', $member);



        update_post_meta($post_id_new, 'City Of location', $city);



        update_post_meta($post_id_new, 'Mobile', $_POST['mobile']);



        update_post_meta($post_id_new, 'email', $_POST['email']);



        update_post_meta($post_id_new, 'password', $_POST['password']);



        update_post_meta($post_id_new, 'Sector', implode(',', $sector_array));



        update_post_meta($post_id_new, 'Companies Invested', $_POST['companies_invested']);



        update_post_meta($post_id_new, 'Part of investment network', $_POST['part_of_investment']);



        update_post_meta($post_id_new, 'Year of invester', $_POST['year_of_invester']);



        update_post_meta($post_id_new, 'Funding Amount', $_POST['funding_amt']);



        update_post_meta($post_id_new, 'Twitter', $_POST['twitter']);



        update_post_meta($post_id_new, 'Website', $_POST['website']);



        update_post_meta($post_id_new, 'Type of investor', $_POST['investor_type']);



        update_post_meta($post_id_new, 'User Likes', json_encode(array()));



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

                    <li> <a href="/investor-dashboard/" >Dashboard</a> </li>

                    <li> <a href="/startup-listing">Startup</a> </li>

                    <li> <a href="/innovator-listing">Innovator</a> </li>



                    <li> <a href="/edit-investor/" class="active_menu">Edit Profile</a> </li>

                </ul>	

            </aside>



    <?php ?>





        </section> <!-- **secondary - Ends** -->  



        <!-- **primary - Starts** --> 



        <section id="primary" class="with-left-sidebar page-with-sidebar">

            <div class="woocommerce">

                <div class="col2-set">

                    <form name="checkout" method="post" class="checkout" action="/edit-investor/" enctype="multipart/form-data" id="edprofile">



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

                            Change Logo: 	<input type="file" value="change" name="logo">
                        </div>













                        <!-- ============ start of section  -->

                        <div class="fieldsection mtop30"> 

                            <h5> INVESTOR DETAILS</h5>

                            <div class="col-1">



                                <div class="woocommerce-billing-fields"> 

                                    <input type="hidden" class="input-text " name="entity" id="entity" placeholder=""  value="investor" required="" />
                                    <input type="hidden" class="input-text " name="investor_type" id="investor_type" placeholder=""  value="<?php echo get_post_meta(get_the_ID(), 'Type of investor', true); ?>"   required="" />

                                </div>



                                <p class="form-row form-row-wide " >



                                    <label for="ifirst_name" class="">Name of Investor *</label>



                                    <input type="text" class="input-text " name="investor_name" id="investor_name" placeholder=""  value="<?php echo get_post_meta(get_the_ID(), 'Name Of investor', true); ?>"   required="" /></p>
 


                            <?php if (get_post_meta(get_the_ID(), 'Type of investor', true) != 'Individual') { ?> 



                                    <p class="form-row form-row-wide " >



                                        <label for="ifirst_name" class="">Name of Investment Organization *</label>



                                        <input type="text" class="input-text " name="company_name" id="company_name" placeholder=""  value="<?php echo get_post_meta($post->ID, 'Organization Name', true); ?>" required="" /></p>



                                    <p class="form-row form-row-wide address-field" >



                                        <label>Website of Organisation </label>



                                        <input type="text" class="input-text " value="<?php echo get_post_meta($post->ID, 'Website', true); ?>" placeholder="" name="website"/></p>



                                    <p class="form-row form-row-wide address-field" >

    <?php } ?>



                            </div>



                            <div class="col-2">

                                <div class="woocommerce-shipping-fields">





                                    <div class="form-row form-row-wide address-field " id="sectordiv">	



                                        <label for="sector" class="">Sectors to Invest in *</label>


  <select multiple="multiple" placeholder="-- Select --"  name="sector[]" id="sector" class="sector SlectBox "  required="" >


    <?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>



    <?php foreach ($categories as $cat) { ?>



        <option value="<?php echo $cat->term_id; ?>"<?php if (in_array($cat->term_id, (explode(',', (get_post_meta($post->ID, 'Sector', true))))))
            echo 'selected';
        else
            echo '';
        ?>><?php echo $cat->name ?></option>

    <?php } ?>
        
          <option value="other" >Other</option>
                                    </select>
                               
                            </div>

                            <div id="sector_id" style="display:none">
                                <p class="form-row form-row-wide " >                                

                                    <input type="text" class="input-text " name="add_sector" id="add_sector" placeholder="Add sector "  value="" />
                                </p>
                            </div>
                                    <div class="form-row form-row-wide address-field " >



                                        <label for="address" class="">City of Location * </label>



                                        <select name="address" id="address" required="">



                                            <option value="">-- Select --</option>



    <?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>



    <?php foreach ($Organizations as $Organizationsval) { ?>



                                                <option value="<?php echo $Organizationsval->term_id; ?>"<?php if ((get_post_meta($post->ID, 'City Of location', true)) == $Organizationsval->term_id)
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



                                            <input type="text" class="input-text " name="add_address" id="add_address" placeholder="Add Address"    /> 



                                        </p>



                                    </div>







                                </div> 





                            </div>

                        </div>



                        <!-- ============ end of section  -->





                        <!-- ============ start of section  -->

                        <div class="fieldsection"> 

                            <h5>CONTACT DETAILS</h5>

                            <div class="col-1">

                                <p class="form-row form-row-wide  validate-email" >



                                    <label for="email" class="">Email *</label>



                                    <input type="email" class="input-text " name="email" id="email" placeholder=""  value="<?php echo get_post_meta($post->ID, 'email', true); ?>" required=""   /></p>







                                <p class="form-row form-row-wide  validate-phone" >



                                    <label for="i_phone" class="">Mobile * </label>



                                    <input type="text" class="input-text " name="mobile" id="mobile" placeholder="" min="10" value="<?php echo get_post_meta($post->ID, 'Mobile', true); ?>"  required=""  /></p>



                                <div class="clear"></div>







                                <p class="form-row form-row-wide  " >



                                    <label for="i_email" class="">Password *</label>



                                    <input type="password" class="input-text " name="password" id="password" placeholder=""  value="<?php echo get_post_meta($post->ID, 'password', true); ?>"  required=""  /></p>





                                <div class="form-row form-row-wide " id="inst">



                                    <label for="Alumni" class="">Alumni of Institution * </label>



                                    <select multiple="multiple" name="alumni_inst[]" id="alumni_inst" placeholder="-- Select --" class="alumni_inst SlectBox  " required=""    >



    <?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>



    <?php foreach ($Alumni as $Alumnival) { ?>



                                            <option value="<?php echo $Alumnival->term_id; ?>"<?php if (in_array($Alumnival->term_id, (explode(',', (get_post_meta($post->ID, 'Alumni', true)))))) echo 'selected';
        else echo ''; ?>><?php echo $Alumnival->name ?></option>   



    <?php } ?>



                                        <option value="other">Other</option>



                                    </select>

                                </div>





                                <div id="alumni_id" style="display: none">



                                    <p class="form-row form-row-wide " > 



                                        <input type="text" class="input-text " name="add_alumni" id="add_alumni" placeholder="Add Alumni of Institution"    /> 



                                    </p>



                                </div>







                            </div>



                            <div class="col-2">







                                        <?php if (get_post_meta(get_the_ID(), 'Type of investor', true) == 'Individual') { ?>





                                    <label>Part of Investment Network </label>



                                    <input type="text" class="input-text " value="" placeholder="" name="part_of_investment" value="<?php echo get_post_meta($post->ID, 'Part of investment network', true); ?>" /></p>

    <?php } ?>





















                                <!--                        <div id="investor_id" style="display: none">
                                
                                
                                
                                                            <p class="form-row form-row-wide " > 
                                
                                
                                
                                                                <input type="text" class="input-text " name="add_investor" id="add_investor" placeholder="Add investor"    /> 
                                
                                
                                
                                                            </p>
                                
                                
                                
                                                        </div>-->



















                                <div class="form-row form-row-wide address-field  " >



                                    <label for="member" class="">Members of Organizations </label>







                                    <select name="member" id="member" class="member  " >



                                        <option value="">-- Select --</option>



    <?php $Members = get_categories(array('parent' => 14, 'hide_empty' => 0)); ?>



    <?php foreach ($Members as $Membersval) { ?>



                                            <option value="<?php echo $Membersval->term_id; ?>"<?php if ((get_post_meta($post->ID, 'Member', true)) == $Membersval->term_id)
            echo 'selected';
        else
            echo '';
        ?>><?php echo $Membersval->name ?></option>





    <?php } ?>



                                        <option value="other">Other</option>



                                    </select>

                                </div>





                                <div id="member_id" style="display: none">



                                    <p class="form-row form-row-wide " > 



                                        <input type="text" class="input-text " name="add_member" id="add_member" placeholder="Add member"    /> 



                                    </p>



                                </div>





                                <div class="form-row form-row-wide address-field ">		



                                    <label>Years as an Investor </label>







                                    <select name="year_of_invester" id="year_of_invester" class="year_of_invester  "  >



                                        <option value="">-- Select --</option>



                                        <?php $year_of_mentor = get_categories(array('parent' => 23, 'hide_empty' => 0, 'order' => 'ASC')); ?>



    <?php foreach ($year_of_mentor as $year_of_exp) { ?>



                                            <option value="<?php echo $year_of_exp->term_id; ?>"<?php if ((get_post_meta($post->ID, 'Year of invester', true)) == $year_of_exp->term_id)
            echo 'selected';
        else
            echo '';
        ?>><?php echo $year_of_exp->name ?></option>



    <?php } ?>



                                    </select>







                                </div>	





                                <div class="form-row form-row-wide address-field " >



                                    <label for="funding_amt" class="">Average Level of Investments </label>









                                    <select class="input-text " name="funding_amt" id="funding_amt" placeholder=""  value=""  />



                                    <option value="">-- Select --</option>



                                    <option value="Less than 10 Lacs" <?php if ((get_post_meta($post->ID, 'Funding Amount', true)) == "Less than 10 Lacs") echo "selected";
    else echo""; ?> >Less than 10 Lacs</option>



                                    <option value="10 Lacs - 20 Lacs" <?php if ((get_post_meta($post->ID, 'Funding Amount', true)) == "10 Lacs - 20 Lacs") echo "selected";
    else echo""; ?> >10 Lacs -20 Lacs</option>



                                    <option value="20 Lacs - 50 Lacs" <?php if ((get_post_meta($post->ID, 'Funding Amount', true)) == "20 Lacs - 50 Lacs") echo "selected";
                                    else echo""; ?> >20 Lacs - 50 Lacs</option>



                                    <option value="50 Lacs - 70 Lacs" <?php if ((get_post_meta($post->ID, 'Funding Amount', true)) == "50 Lacs - 70 Lacs") echo "selected";
                                    else echo""; ?> >50 Lacs - 70 Lacs</option>



                                    <option value="70 Lacs - 1 Cr" <?php if ((get_post_meta($post->ID, 'Funding Amount', true)) == "70 Lacs - 1 Cr") echo "selected";
                                    else echo""; ?>>70 Lacs - 1 Cr </option>



                                    <option value="1 Cr - 5 Cr" <?php if ((get_post_meta($post->ID, 'Funding Amount', true)) == "1 Cr - 5 Cr") echo "selected";
                                    else echo""; ?> >1 Cr - 5 Cr </option>



                                    <option value="5 Cr - 10 Cr" <?php if ((get_post_meta($post->ID, 'Funding Amount', true)) == "5 Cr - 10 Cr") echo "selected";
                                    else echo""; ?> >5 Cr - 10 Cr </option>







                                    </select>







                                </div>

                                <div class="form-row form-row-wide address-field ">		



                                    <label>Sample Companies Invested in </label>



                                    <input type="text" name="companies_invested" class="companies_invested " value="<?php echo get_post_meta($post->ID, 'Companies Invested', true) ?>"  >





                                </div>





                                <div class="clear"></div>









                                <div class="clear"></div>







                            </div>

                        </div>



                        <!-- ============ end of section  -->









                        <!-- ============ start of section  -->

                        <div class="fieldsection"> 

                            <h5>OTHER DETAILS</h5>

                            <div class="col-1">



                                <p class="form-row form-row-wide " >



                                    <label for="istart_name" class="">Facebook Page</label>



                                    <input type="text" class="input-text " name="facebook" id="facebook" placeholder=""  value="<?php echo get_post_meta($post->ID, 'Facebook', true); ?>"  /></p>

                                <div class="clear"></div>







                            </div>

                            <div class="col-2">

                                <div class="woocommerce-shipping-fields">







                                    <div class="shipping_address">







                                        <p class="form-row form-row-wide " >



                                            <label for="ifirst_name" class="">Twitter Handle </label>



                                            <input type="text" class="input-text " name="twitter" id="twitter" placeholder=""  value="<?php echo get_post_meta($post->ID, 'Twitter', true) ?>" /></p>





                                    </div>



                                    <div class="clear"></div>



                                </div>



                            </div> 

                        </div> 

                        <!-- ============ end of section  -->



                        <input type='hidden' name="ID" value="<?= $user->ID ?>" />   

                        <input type="submit"  name="submit" id="submit" value="Submit" data-value="Submit" />







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











        $("#member").live('change', function () {







            if ($(this).val() == "other")



            {



                $('#member_id').show()



                $('#add_member').prop('required', true);







            }



            else



            {



                $('#member_id').hide();



                $('#add_member').prop('required', false);



            }



        });







        $("#investor").live('change', function () {







            if ($(this).val() == "other")



            {



                $('#investor_id').show()



                $('#add_investor').prop('required', true);



                // $("input").$("input").prop('required',true);



            }



            else



            {



                $('#investor_id').hide();



                $('#add_investor').prop('required', false);



            }



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








        $("#alumni_inst").live('change', function () {

$('#alumni_inst option:selected').each(function (index, value) {

//alert($(this).val());  



            if ($(this).val() == "other")



            {



                $('#alumni_id').show()



                $('#add_alumni').prop('required', true);



                // $("input").$("input").prop('required',true);



            }



            else



            {



                $('#alumni_id').hide();



                $('#add_alumni').prop('required', false);



            }



        });
         });







        $("#submit").click(function () {
           // alert('fasfasfasf');

            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            var numbers = /^[\d\-\+\s]+$/;

            var investor_name = $('#investor_name').val();

            var investor_type = $('#investor_type').val();

            var company_name = $('#company_name').val();

            var email = $('#email').val();

            var address = $('#address').val();

            var mobile = $('#mobile').val();

            var password = $('#password').val();

            var alumni_inst = $('#alumni_inst').val();

            var sector = $('#sector').val();

            var answer = $('#answer').val();

            var hidden_answer = $('#hidden_answer').val();

            var policy = $('#policy').val();

            var vinst = $('#inst p.CaptionCont span').text();

            var vsector = $('#sectordiv p.CaptionCont span').text();

            var flag = '0';

            if (investor_name == '' || investor_name == null)

            {

                $('#investor_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});



                flag++;

            }

            else

            {

                $('#investor_name').css({"border-color": "", "border-weight": "", "border-style": ""});

            }

            if (investor_type != 'Individual')

            {

                if (company_name == '' || company_name == null)

                {

                    $('#company_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});



                    flag++;

                }

                else

                {

                    $('#company_name').css({"border-color": "", "border-weight": "", "border-style": ""});

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

            if (mobile == "" || mobile == null ||  !numbers.test(mobile))

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







            if (address == '' || address == null)

            {

                $('#address').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});



                flag++;

            }

            else

            {

                $('#address').css({"border-color": "", "border-weight": "", "border-style": ""});

            }





            if (vinst == '-- Select --')

            {

                $('#inst p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});



                flag++;

            }

            else

            {

                $('#inst p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});

            }





//            if (alumni_inst == '' || alumni_inst == null)

//            {

//                $('#alumni_inst').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

//

//                flag++;

//            }

//            else

//            {

//                $('#alumni_inst').css({"border-color": "", "border-weight": "", "border-style": ""});

//            }



            if (vsector == '-- Select --')

            {

                $('#sectordiv p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});



                flag++;

            }

            else

            {

                $('#sectordiv p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});

            }



//            if (sector == '' || sector == null)

//            {

//                $('#sector').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

//

//                flag++;

//            }

//            else

//            {

//                $('#sector').css({"border-color": "", "border-weight": "", "border-style": ""});

//            }



//            if (hidden_answer == answer) {
//
//
//
//                $('#answer').css({"border-color": "", "border-weight": "", "border-style": ""});
//
//            }
//
//            else {
//
//                $('#answer').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
//
//                flag++;
//
//            }
//
//            if (policy == false)
//
//            {
//
//                flag++;
//
//            }

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
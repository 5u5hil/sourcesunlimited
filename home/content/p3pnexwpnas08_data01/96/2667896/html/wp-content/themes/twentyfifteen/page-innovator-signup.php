<?php
get_header();

session_start();
$digit1 = mt_rand(1, 20);
$digit2 = mt_rand(1, 20);
if (mt_rand(0, 1) === 1) {
    $math = "$digit1 + $digit2";
    $_SESSION['answer'] = $digit1 + $digit2;
} else {
    $math = "$digit1 - $digit2";
    $_SESSION['answer'] = $digit1 - $digit2;
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="http://ivycamp.in/wp-content/themes/twentyfifteen/js/jquery.sumoselect.min.js"></script>
<link href="http://ivycamp.in/wp-content/themes/twentyfifteen/css/sumoselect.css" rel="stylesheet" />

<script type="text/javascript">
    $(document).ready(function () {
        window.asd = $('.SlectBox').SumoSelect({csvDispCount: 3});



$("input[maxlength]").on("keyup",function(){
 

$(this).parent().find(".error").remove();
$(this).parent().append("<p class='error' style='color:green;'>"+ (parseInt($(this).attr("maxlength")) - parseInt($(this).val().length)) +" Characters left</p>");



});
    });
</script>

<div class="parallax full-width-bg">

    <div class="container">

        <div class="main-title">

            <h1>Sign up as a Innovator</h1>



        </div>

    </div>

</div>

<div class="dt-sc-margin50"></div>    

<!-- Container starts-->

<div class="container">

    <!-- **primary - Starts** --> 

    <section id="primary" class="content-full-width">

        <!-- **woocommerce - Starts** --> 

        <div class="woocommerce">



            <!-- **checkout - Starts** -->
            
            <p style="font-size:14px; margin-bottom:10px;"><script type='in/Login' data-onAuth="onLinkedInAuth"></script></p>
            <b>Register using the form below.</b>
            <br/>
            <br/>

            <form name="checkout" method="post" class="checkout" action="/innovator-save/" enctype="multipart/form-data">

                <!-- **col2-set - Starts** -->    

                <div class="col2-set" id="customer_details">
                    <h5><b><u>INNOVATOR DETAILS</u></b></h5>
                    <!-- **col-1 - Starts** -->   

                    <div class="col-1">

                        <input type="hidden" class="input-text " name="entity" id="entity" placeholder=""  value="innovator"  />
                        <input type="hidden" class="input-text " name="secrole" id="secrole" placeholder=""  value="<?php echo $_REQUEST['secrole']; ?>"  />
                        <!-- **woocommerce-billing-fields - Starts** -->   

                        <div class="woocommerce-billing-fields"> 

                            <p class="form-row form-row-wide" >

                                <label for="innovation_name" class="">Innovation Name *</label>

                                <input type="text" class="input-text " name="innovation_name" id="innovation_name" placeholder=""  value="" required="" /></p>



                            <p class="form-row form-row-wide address-field" >

                                <label for="address" class="">City of Location * </label>

                                <select name="address" id="address" required="">

                                    <option value="">-- Select --</option>

                                    <?php $address = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>

                                    <?php foreach ($address as $addresss) { ?>

                                        <option value="<?php echo $addresss->term_id ?>" ><?php echo $addresss->name ?></option>

                                    <?php } ?>

                                    <option value="other">Other</option>

                                </select>

                            </p>



                            <div id="city_id" style="display: none">

                                <input type="text" class="input-text " name="add_city" id="add_city" placeholder="Add City of Location"  value=""  /> 

                            </div>

                            <div class="form-row form-row-wide address-field"  id="sectordiv">	
                                <label for="sector" class="">Sectors *</label>
                                
                                <select  multiple="multiple"  name="sector[]"  id="sector" required="" placeholder="-- Select --" class="SlectBox  "> 

                                        <?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>
                                        <?php foreach ($categories as $cat) { ?>
                                            <option value="<?php echo $cat->term_id ?>" ><?php echo $cat->name ?></option>
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
                                <label>  Status of Patent * </label>

                                <select name="status_of_patent" id="status_of_patent" required="" >



                                    <option value="no patent">no patent</option> no

                                    <option value="under patent application">under patent application</option>

                                    <option value="patented">patented</option>

                                </select></p>



                            <p class="form-row form-row-wide address-field" >

                                <label> Website </label>

                                <input type="text" class="input-text " value="" placeholder="" name="website"/></p>


                            <div class="clear"></div>



                        </div> <!-- **woocommerce-billing-fields - Ends** --> 

                    </div> <!-- **col-1 - Ends** -->  

                    <!-- **col-2 - Starts** --> 

                    <div class="col-2">

                        <!-- **woocommerce-shipping-fields - Starts** -->

                        <div class="woocommerce-shipping-fields">

                            <p class="form-row form-row-wide address-field" >



                            <p class="form-row form-row-wide" id="isprt">

                                <label for="support_looking" class="">Support you are looking for *</label>

                                <select   multiple="multiple" placeholder="-- Select --" name="support_looking[]" class="SlectBox" id="support_looking" required="" > 


                                    <?php $Support = get_categories(array('parent' => 72, 'hide_empty' => 0)); ?>

                                    <?php foreach ($Support as $looking) { ?>

                                        <option value="<?php echo $looking->term_id ?>" ><?php echo $looking->name ?></option>

                                    <?php } ?>

                                    <option value="other">Other</option>







                                </select></p>

                            <p>   

                            <div id="support_id" style="display: none">

                                <input type="text" class="input-text " name="add_support" id="add_support" placeholder="Add Support you are looking for"  value=""  /> 

                            </div>



                            </p>



                            <p class="form-row form-row-wide address-field" >

                                <label> Summary of Innovation (product, application, etc.)  *</label>

                                <input type="text" class="input-text " value="" placeholder=""  id="summary_innovation" name="summary_innovation" required=""/></p>

                            <p class="form-row form-row-wide" >

                                <label for="market_address" class="">Summary of Problem Addressed (<strong>Max 400 char</strong>) *</label>

                                <input type="text" class="input-text " name="market_address" maxlength="400"  id="market_address" placeholder=""  value="" required=""  /></p>

                            <p class="form-row form-row-wide" >

                                <label for="key_differentiator" class="">Key Differentiator/USP (<strong>Max 400 char</strong>) *</label>

                                <input type="text" class="input-text " name="key_differentiator" maxlength="400"  id="key_differentiator" placeholder="" value=""  required="" /></p>

                            <p class="form-row form-row-wide" >
                                <label for="linepitch" class="">One Line Pitch (<strong>Max 100 char</strong>) * </label>
                                <input type="text" class="input-text " name="linepitch" id="linepitch" placeholder=""  maxlength="100" value="" required="" /></p>






                            <div class="clear"></div>




                        </div>


                    </div> <!-- **shipping_address - Ends** --> 







                </div> <!-- **woocommerce-shipping-fields - Ends** --> 
                <div class="col2-set" id="customer_details"> 
                    <h5><b><u>INNOVATOR DETAILS</u></b></h5>
                    <div class="col-1">
                        <p class="form-row form-row-wide" >

                            <label for="innovator_name" class="">Innovator Name *</label>

                            <input type="text" class="input-text " name="innovator_name" id="innovator_name" placeholder=""  value="" required="" /></p>



                        <div class="clear"></div>

                        <p class="form-row form-row-wide validate-phone" >

                            <label for="i_phone" class="">Mobile *</label>

                            <input type="text" class="input-text " name="mobile" id="mobile" min="10"  placeholder=""  value=""  /></p>



                        <p class="form-row form-row-wide validate-email" >

                            <label for="email" class=""> Email * </label>

                            <input type="email" class="input-text " name="email" id="email" placeholder=""  value="" required=""  /></p>

                        <p class="form-row form-row-wide " >

                        <div class="clear"></div>

                        <label for="Password" class="">Password *</label>

                        <input type="password" class="input-text " name="password" id="password" placeholder=""  value=""   /></p>


                    </div> 
                    <div class="col-2">
<!--                         <p lass="form-row form-row-wide">



                                <label  class="">Student Or Alumni * </label>



                            <div id="payment">

                                <ul class="payment_methods methods">



                                    <li class="payment_method_cheque">

                                        <input  type="radio" class="input-radio student_alumni " name="student_alumni" value="student" checked="checked" data-order_button_text="" />

                                        <span></span>Student 

                                        <input type="radio" class="input-radio student_alumni" name="student_alumni" value="alumni"  data-order_button_text="" />

                                        <span></span>Alumni



                                    </li>



                                </ul>



                            </div>

                            </p>-->
                        <p class="form-row form-row-wide " id="prole">
                            <label for="Role" class="">Role *</label>

                            <select multiple="multiple" placeholder="-- Select --" name="role[]" id="role"  class="role SlectBox">
                                <?php $role = get_categories(array('parent' => 28, 'hide_empty' => 0)); ?>

                                <?php foreach ($role as $roleval) { ?>
                                    <option value="<?php echo $roleval->term_id ?>" ><?php echo $roleval->name ?></option>
                                <?php } ?>
                               <option value="other" >Other</option>

                                    </select>
                        </p>
                                <div id="role_id" style="display: none">
                                    <input type="text" class="input-text " name="add_role" id="add_role" placeholder="Add Role"  value=""  /> 
                                </div>

                        
                        <p>

                            <label  class="">Student or Alumni *  </label>

                            <br/>

                            <input  type="radio" class="input-radio student_alumni " name="student_alumni" value="student" checked="checked" style="display:inline !important;"/> Student
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" class=" student_alumni" name="student_alumni" value="alumni" style="display:inline;"  /> Alumni



                        </p>

                        <div id="scheck"  >

                            <div class="form-row form-row-first address-field" id="stfield">

                                <label> Year of Graduation </label>

                                <select name="graduation" class="graduation" id="graduation"  >

                                    <option value="">-- Select --</option>

                                    <?php $institute = get_categories(array('parent' => 57, 'hide_empty' => 0)); ?>

                                    <?php foreach ($institute as $instituteval) { ?>

                                        <option value="<?php echo $instituteval->term_id ?>" ><?php echo $instituteval->name ?></option>

                                    <?php } ?>

                                </select>

                            </div>
 


                            <div class="form-row form-row-last address-field" id="inst" >

                                <label> Institute * </label>

                                <select  multiple="multiple" placeholder="-- Select --" name="institute_name[]" id="institute_name" class="institute_name SlectBox "  >


                                    <?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>

                                    <?php foreach ($Alumni as $Alumnival) { ?>

                                        <option value="<?php echo $Alumnival->term_id ?>" ><?php echo $Alumnival->name ?></option>

                                    <?php } ?>

                                    <option value="other">Other</option>

                                </select>

                            </div>



                        </div>




                        <div id="institute_id" style="display:none">

                            <p class="form-row form-row-wide " >                                

                                <input type="text" class="input-text " name="add_institute" id="add_institute" placeholder="Add Institute"  value="" />

                            </p>

                        </div>
                    </div>

                </div>
                <div class="col2-set">
                    <p class="form-row form-row-wide " id="ktm" >
                        <label for="member_org" class="">Key Team Members </label>

                        <select multiple="multiple" placeholder="-- Select --" name="member_org[]" id="member_org"  class="member_org SlectBox">
                            <?php $role = get_categories(array('parent' => 28, 'hide_empty' => 0)); ?>

                            <?php foreach ($role as $roleval) { ?>
                                <option value="<?php echo $roleval->term_id ?>" ><?php echo $roleval->name ?></option>
                            <?php } ?>
                            <option value="other">Other</option>
                        </select>
                    </p>

                    <div id="member_id" style="display:none">
                        <p class="form-row form-row-wide " >                                

                        </p>
                    </div>

                </div>
                <div class="col2-set" id="customer_details">
                    <h5><b><u>OTHER DETAILS</u></b></h5>
                    <div class="col-1">

                        <p class="form-row form-row-wide" >

                            <label for="upload_vlonk" class="">Upload Video Link</label>

                            <input type="text" class="input-text " name="upload_vlink" id="upload_vlink" placeholder=""  value="http://"  /></p>

                        <p class="form-row form-row-wide" >

                            <label for="upload_doc" class="">Upload Supporting Documents (Max file upload size 2mb )</label>

                            <input type="file" class="input-text " name="upload_doc[]" id="upload_doc" placeholder=""  value=""   multiple="multiple"/></p>

                        
                        <p class="form-row form-row-wide" >

                            <label for="upload_logo" class="">Upload Logo (Max file upload size 2mb )</label>

                            <input type="file" class="input-text " name="upload_logo" id="upload_logo" placeholder=""  value=""  /></p>

                        <label for="mentoring" class="">Area in which Mentoring is required </label>
                        <select multiple="multiple"  name="mentoring[]" id="mentoring" placeholder="-- Select --" class="SlectBox "  >
                           <?php $Mentoring = get_categories(array('parent' => 50, 'hide_empty' => 0)); ?>
                            <?php foreach ($Mentoring as $serviceval) { 
                                    
                                if($serviceval->term_id == 156) { ?>
                                    <option value="<?php echo $serviceval->term_id ?>" ><?php echo $serviceval->name ?></option>

                                <?php } } ?>
                                <?php foreach ($Mentoring as $serviceval) { 
                                    
                                if($serviceval->term_id != 156) { ?> 
                                    <option value="<?php echo $serviceval->term_id ?>" ><?php echo $serviceval->name ?></option>

                                <?php } } ?>
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

                            <input type="text" class="input-text " name="facebook" id="facebook" placeholder=""  value=""  /></p>



                        <p class="form-row form-row-wide" >

                            <label for="twitter" class="">Twitter Handle </label>

                            <input type="text" class="input-text " name="twitter" id="twitter" placeholder=""  value="" /></p> 

                        <label for="innovatiobn_pitch" class="">Innovation Pitch (400 char)</label>

                        <input type="text" class="input-text " name="innovatiobn_pitch" maxlength="400" id="innovatiobn_pitch" placeholder=""  value="" /></p>

                        <p class="form-row form-row-wide" >

                            <label for="twitter_pitch" class="">Twitter Pitch (100 char)</label>

                            <input type="text" class="input-text " name="twitter_pitch" maxlength="100" id="twitter_pitch" placeholder="" value=""   /></p>
                        <p class="form-row form-row-wide  " >
                                <label for="business_plan" class="">Captcha * </label>
                                <?php echo $math; ?> = <input name="answer"  id="answer" type="text" />
                                <input name="hidden_answer"  id="hidden_answer"  value="<?php echo $_SESSION['answer']; ?>"type="hidden"   />
                            </p>
                    </div>
                </div>

   <div class="col2-set" id="starup_details">
                    <input type="checkbox" name="policy" id="policy" required="">* &nbsp; I / We agree to the <a href="/privacy-policy/">Privacy Policy</a> & <a href="/terms-conditions/">Terms of Use</a> at IvyCamp.in

                </div>
                <input type="submit"  name="" id="innovator_signup" value="Submit" data-value="Submit" />
                <div id="error"></div>


                <div class="clear"></div>



            </form>

        </div> <!-- **woocommerce - Ends** --> 

        <div class="dt-sc-margin50"></div>



    </section> <!-- **Primary - Ends** -->          



</div> <!-- **container - Ends** --> 

<?php get_footer(); ?>



<script>

    $ = jQuery;

    $(document).ready(function () {

//        $('#mentoring').on('change', function () {
//
//
//
//            if ($(this).val() == 'yes')
//
//            {
//
//                $('#mentoring_member').show();
//
//                $('#mentoring_required').prop('required', true);
//
//            }
//
//            else
//
//            {
//
//                $('#mentoring_member').hide();
//
//                $('#mentoring_required').prop('required', true);
//
//            }
//
//        });



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




        $("#mentoring").live('change', function () {


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





        $("#support_looking").live('change', function () {

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

        $('#member_org').change(function () {

            // var member_count = ($('#member_org').val()).length;
            // var key_member = $('#member_org').val();
            if ($('#member_org').val() !== null) {
                var member_count = ($('#member_org').val()).length;
                var key_member = $('#member_org').val();
            }
 var  append_data ='';
//var addre_val = [];
$('.address option').each(function() { 
//    alert("dgsdgsd");
   // addre_val.push($(this).attr('value'));
      append_data += '<option value="' + $(this).attr('value') + '">'+$(this).text()+'</option>';
});
            
            var aa = '';
            $('#member_org option:selected').each(function (index, value) {

                $('#member_id').show();

                aa += '<div class="col-1"><input type="text" name="member_type[]" id="member_type" value="' + $(this).text() + '"><input type="text" name="member_fname[]"  placeholder ="First Name" ><input type="text" name="member_lname[]"  placeholder ="Last Name" ></div><div class="col-2"><input type="text" name="member_mobile[]"  placeholder ="Mobile"><input type="text" name="member_email[]"  placeholder ="Email"><select name="key_city"  class="key_city">'+append_data+'</select><div class="key_id" style="display:none"><input type="text" name="add_key_city" class="add_key_city" value="" placeholder="Add City of Location"/></div></div>';
            });
            $('#member_id').html(aa);

        });
        
        $('body').on('change', '.key_city', function () {
            $('.key_city option:selected').each(function (index, value) {

                if ($(this).parent('.key_city').val() == "other")
                {
                    $(this).parent('.key_city').siblings('.key_id').show();
                }
                else
                {
                    $(this).parent('.key_city').siblings('.key_id').hide();
                }

            });
        });


        $("#sector").live('change', function () {
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
        
        
        $('#innovator_signup').click(function () {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var numbers = /^[\d\-\+\s]+$/;
            var innovation_name = $('#innovation_name').val();
            var innovator_name =  $('#innovator_name').val();
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
             var answer = $('#answer').val();
            var hidden_answer = $('#hidden_answer').val();
            var policy = $('#policy').val();
            var graduation =$('#graduation').val();
            var vsupport = $('#isprt p.CaptionCont span').text();
            var vsector=$('#sectordiv p.CaptionCont span').text();
	    var vrole=$('#prole p.CaptionCont span').text();
	    var vinst=$('#inst p.CaptionCont span').text();
            var flag = '0';
            if (innovator_name == '' || innovator_name == null)
            {

                $('#innovator_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {

                $('#innovator_name').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
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

            if (address == '' || address == null)
            {

                $('#address').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {

                $('#address').css({"border-color": "", "border-weight": "", "border-style": ""});
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

            if (password == '' || password == null)
            {
                $('#password').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#password').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
            
            	
			
			 if (vsector =='-- Select --')
            {
                $('#sectordiv p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#sectordiv p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
			
			
			 if (vrole =='-- Select --')
            {
                $('#prole p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
				
                flag++;
            }
            else
            {
                $('#prole p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
			
			
			 if (vinst =='-- Select --')
            {
                $('#inst p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
				
                flag++;
            }
            else
            {
                $('#inst p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
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
//
//
            if (mobile == "" || mobile == null || !numbers.test(mobile))
            {
                $('#mobile').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#mobile').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
//            
//            
            if (key_differentiator == '' || key_differentiator == null || key_differentiator > 400)
            {
                $('#key_differentiator').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#key_differentiator').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (summary_innovation == '' || summary_innovation == null )
            {
                $('#summary_innovation').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#summary_innovation').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
//            if (graduation == '' || graduation == null)
//            {
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
                $('#linepitch').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#linepitch').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
             if (vsupport =='-- Select --')
            {
                $('#isprt p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#isprt p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (market_address == '' || market_address == null || market_address > 400)
            {
                $('#market_address').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#market_address').css({"border-color": "", "border-weight": "", "border-style": ""});
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
               // alert(flag);
                $('#error').html('<span style="color:red;">* Marked fields are mandatory. Kindly fill those fields to proceed ahead. </span>');
                return false;
            }


            
        });
    });

</script>
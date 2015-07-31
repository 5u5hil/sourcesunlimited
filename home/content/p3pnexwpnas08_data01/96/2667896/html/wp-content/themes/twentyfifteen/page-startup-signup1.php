<?php 

?>


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

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="http://ivycamp.cruxservers.in/wp-content/themes/twentyfifteen/js/jquery.sumoselect.min.js"></script>
<link href="http://ivycamp.cruxservers.in/wp-content/themes/twentyfifteen/css/sumoselect.css" rel="stylesheet" />


<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>




<script type="text/javascript">
// $ = jQuery;
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


<div class="parallax full-width-bg">
    <div class="container">
        <div class="main-title">
            <h1>Sign up as a Startup</h1>

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



            <b> Register using the form below.</b>
            <br/>
            <br/>
            <form name="checkout" method="post" class="checkout" action="/insert-page1/" enctype="multipart/form-data">
                <!-- **col2-set - Starts** -->    
                <div class="col2-set" id="starup_details">
                    <!-- **col-1 - Starts** -->   
                    <h5><b><u>STARTUP DETAILS</u></b></h5>
                    <div class="col-1">
                        <!-- **woocommerce-billing-fields - Starts** -->   
                        <div class="woocommerce-billing-fields"> 
                            <input type="hidden" class="input-text " name="entity" id="entity" placeholder=""  value="startup" required="" />
                            <input type="hidden" class="input-text " name="secrole" id="secrole" placeholder=""  value="<?php echo $_REQUEST['secrole']; ?>"  />
                            <p class="form-row form-row-wide " >
                                <label for="cname" class="">Startup Name *</label>
                                <input type="text" class="input-text " name="cname" id="cname" placeholder=""  value=""   /></p>
                            <p>
                            <div class="form-row form-row-wide address-field ">
                                <label for="address" class="">City of Location *</label>
                                <select name="address" id="address" class="country_to_state country_select">

                                    <option value="">-- Select --</option>

                                    <?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>

                                    <?php foreach ($Organizations as $Organizationsval) { ?>

                                        <option value="<?php echo $Organizationsval->term_id ?>" ><?php echo $Organizationsval->name ?></option>

                                    <?php } ?>
                                    <option value="other">Other</option>


                                </select></div>
                            <div id="city_id" style="display: none">
                                <input type="text" class="input-text " name="add_city" id="add_city" placeholder="Add City of Location"  value=""  /> 
                            </div>

                            <div class="form-row form-row-wide address-field" id="sectordiv">	
                                <label for="sector" class="">Sectors *</label>
                                <div class="selection-box">    
                                    <select  multiple="multiple"  name="sector[]" id="sector"  required="" placeholder="-- Select --" class="SlectBox"> 

                                        <?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>
                                        <?php foreach ($categories as $cat) { ?>
                                            <option value="<?php echo $cat->term_id ?>" ><?php echo $cat->name ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>

                            <div id="sector_id" style="display:none">
                                <p class="form-row form-row-wide " >                                

                                    <input type="text" class="input-text " name="add_sector" id="add_sector" placeholder="Add sector "  value="" />
                                </p>
                            </div>


                            <p class="form-row form-row-first " >
                                <label for="startup_stage" class="">Startup Stage *</label>

                                <select name="startup_stage" class="startup_stage" id="startup_stage" required="" >
                                    <option value="">-- Select --</option>
                                    <?php $Idproof = get_categories(array('parent' => 7, 'hide_empty' => 0)); ?>
                                    <?php foreach ($Idproof as $proof) { ?>
                                        <option value="<?php echo $proof->term_id ?>" ><?php echo $proof->name ?></option>
                                    <?php } ?>
                                </select>
                            </p>


                            <p class="form-row form-row-last " >
                                <label for="level_of_investment" class="">Level of Investment Required (In Lacs) *</label>
                                <input type="text" class="input-text " name="level_of_investment" id="level_of_investment" placeholder=""  value="" onkeypress="return isNumber(event);"  required="" /></p>
                            <div class="clear"></div>

                            </p>


                            <p class="form-row form-row-wide  " >
                                <label for="venture" class="">Summary of Venture (product, market, etc.) (400 char) * </label>
                                <input type="text" class="input-text " name="venture" id="venture" placeholder=""  value="" required=""   /></p>
                            <div class="clear"></div>

                            <p class="form-row form-row-wide address-field " >
                                <label for="already_raised" class="">Amount Already Raised (In Lacs)</label>
                                <input type="text" class="input-text " name="already_raised" id="already_raised" placeholder=""  value="" onkeypress="return isNumber(event);"   /></p>


                            <p class="form-row form-row-wide address-field " >
                                <label for="to_be_raised" class="">Total Amount  to be Raised (In Lacs)</label>
                                <input type="text" class="input-text " name="to_be_raised" id="to_be_raised" placeholder=""  value="" onkeypress="return isNumber(event);"  /></p>

                        </div>  
                    </div>  

                    <div class="col-2">

                        <div class="woocommerce-shipping-fields">



                            <div class="shipping_address">
                                <p class="form-row form-row-wide address-field " style="display:block; position:relative;">
                                    <label for="Founding" class="">Founding Year *</label>
									
									<select name="Founding" class="Founding" id="Founding" required="" >
                                    <option value="">-- Select --</option>
									
									<?php 
									$d = date("Y");
									for ($i=$d; $i>1950; $i--) { ?>
                                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
									</select>
									
									
									
                                   <!-- <input type="text" class="Founding input-text " name="Founding" id="Founding" placeholder="Year"  value=""  required=""  />-->
									
								
									
									
									</p>


                                <p class="form-row form-row-wide address-field" >
                                    <label>Product/Service Pitch (400 char) * </label>
                                    <input type="text" class="input-text " value="" placeholder="" id="service_pitch" maxlength="400" name="service_pitch" required=""/></p>

                                <p class="form-row form-row-wide address-field " >
                                    <label for="isp" class="">What’s your USP (Max 400 char) *</label>
                                    <input type="text" class="input-text " name="isp" id="isp" placeholder="" maxlength="400" value=""  required=""  /></p><div class="clear"></div>

                                <p class="form-row form-row-wide" >
                                    <label for="target-market" class="">Target Market (Max 400 char) *</label>
                                    <input type="text" class="input-text " name="target_market" id="target_market" placeholder="" maxlength="400" value="" required="" /></p>

                                <p class="form-row form-row-wide" >
                                    <label for="revenue" class="">Revenue Model (Max 400 char) *</label>
                                    <input type="text" class="input-text " name="revenue" id="revenue" placeholder=""  maxlength="400" value="" required="" /></p>

                                <p class="form-row form-row-wide" >
                                    <label for="linepitch" class="">One Line Pitch (Max 100 char) *</label>
                                    <input type="text" class="input-text " name="linepitch" id="linepitch" placeholder=""  maxlength="100" value="" required="" /></p>



                                <p class="form-row form-row-wide address-field " >
                                    <label>Website </label>
                                    <input type="text" class="input-text " value="" placeholder="" id="website" name="website"/></p>

                                <br>

                            </div>




                        </div> <!-- **shipping_address - Ends** --> 



                    </div> <!-- **woocommerce-shipping-fields - Ends** --> 

                </div> <!-- **col-2 - Ends** -->

                <!-- **col2-set - Ends** -->
                <div class="col2-set" id="starup_details">
                    <!-- **col-1 - Starts** -->   
                    <h5><b><u>FOUNDER DETAILS</u></b></h5>
                    <div class="col-1">
                        <!-- **woocommerce-billing-fields - Starts** -->   
                        <div class="woocommerce-billing-fields"> 
                            <p class="form-row form-row-wide " >
                                <label for="first_name" class="">First Name *</label>
                                <input type="text" class="input-text " name="first_name" id="first_name" placeholder=""  value="<?php echo $value['firstName']; ?>" required=""   /></p>
                            <p class="form-row form-row-wide " >
                                <label for="last_name" class="">Last Name *</label>
                                <input type="text" class="input-text " name="last_name" id="last_name" placeholder=""  value="<?php echo $value['lastName']; ?>" required=""   /></p>

                            <p class="form-row form-row-wide " >
                                <label for="email" class=""> Email *</label>
                                <input type="email" class="input-text " name="email" id="email" placeholder=""  value="<?php echo $value['emailAddress']; ?>" required=""   /></p>

                            <p class="form-row form-row-wide " >
                                <label for="password" class="">Password *</label>
                                <input type="password" class="input-text " name="password" id="password" placeholder=""  value="" required=""   /></p>

                            <p class="form-row form-row-wide " >
                                <label for="mobile" class="">Mobile *</label>
                                <input type="text" class="input-text " name="mobile" id="mobile" placeholder=""  min="10" value="" required=""   /></p>

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
                                            <option value="<?php echo $roleval->term_id ?>" ><?php echo $roleval->name ?></option>
                                        <?php } ?>

                                    </select>
                                </p>
                                <p>

                                    <label  class="">Student or Alumni *  </label>

                                    <br/>

                                    <input  type="radio" class="input-radio student_alumni " name="student_alumni" value="student" checked="checked" style="display:inline !important;"/> Student
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" class=" student_alumni" name="student_alumni" value="alumni" style="display:inline;"  /> Alumni



                                </p>

                                <div id="scheck"  >
                                    <p class="form-row form-row-first address-field validate-state" >
                                        <label> Year of Graduation * </label>
                                        <select name="graduation" class="graduation"   >
                                            <option value="">-- Select --</option>
                                            <?php $institute = get_categories(array('parent' => 57, 'hide_empty' => 0)); ?>
                                            <?php foreach ($institute as $instituteval) { ?>
                                                <option value="<?php echo $instituteval->term_id ?>" ><?php echo $instituteval->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </p>

                                    <p class="form-row form-row-last address-field validate-state" >
                                        <label> Institute * </label>
                                        <select multiple="multiple" placeholder ="-- Select --" name="institute_name[]" class="institute_name SlectBox  "  >

                                            <?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>
                                            <?php foreach ($Alumni as $Alumnival) { ?>
                                                <option value="<?php echo $Alumnival->term_id ?>" ><?php echo $Alumnival->name ?></option>
                                            <?php } ?>
                                            <option value="other">Other</option>
                                        </select>
                                    </p>

                                </div>
                                <div id="acheck" style="display: none" >
                                    <p class="form-row form-row-wide address-field validate-state" >
                                        <label> Institute *  </label>
                                        <select multiple="multiple" placeholder ="-- Select --" name="institute_name[]"  class="institute_name SlectBox "  >

                                            <?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>
                                            <?php foreach ($Alumni as $Alumnival) { ?>
                                                <option value="<?php echo $Alumnival->term_id ?>" ><?php echo $Alumnival->name ?></option>
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



                        </div> <!-- **shipping_address - Ends** --> 



                    </div> <!-- **woocommerce-shipping-fields - Ends** --> 

                </div> 
                <div class="col2-set">
                    <p class="form-row form-row-wide " id="ktm" >
                        <label for="key_member" class="">Key Team Members </label>

                        <select multiple="multiple" placeholder="-- Select --" name="key_member[]" id="key_member"  class="key_member SlectBox">
                            <?php $role = get_categories(array('parent' => 28, 'hide_empty' => 0)); ?>

                            <?php foreach ($role as $roleval) { ?>
                                <option value="<?php echo $roleval->term_id ?>" ><?php echo $roleval->name ?></option>
                            <?php } ?>
                            <option value="other">Other</option>
                        </select>
                    </p>

                    <div id="member_id" style="display:none">
                        <p class="form-row form-row-wide " >                                
                            <input type="text" class="input-text " name="add_member" id="add_member" placeholder="Add Key Team Members "  value="" />
                        </p>
                    </div>

                </div>


                <div class="col2-set" id="starup_details">
                    <!-- **col-1 - Starts** -->   
                    <h5><b><u>OTHER DETAILS</u></b></h5>
                    <div class="col-1">
                        <!-- **woocommerce-billing-fields - Starts** -->   
                        <div class="woocommerce-billing-fields"> 
                            <p class="form-row form-row-wide " >
                                <label for="upload-logo" class="">Upload Logo (Max file upload size 250kb) </label>
                                <input type="file" class="input-text " name="logo" id="file" placeholder=""  value=""  /></p>

                            <p class="form-row form-row-wide " >
                                <label for="upload-logo" class="">Upload Video Link </label>
                                <input type="file" class="input-text " name="videolink" id="videolink" placeholder=""  value=""  /></p>

                            <p class="form-row form-row-wide " >
                                <label for="business_plan" class="">Upload Business Plan (Max file upload size 250kb)</label>
                                <input type="file" class="input-text " name="business_plan[]" id="business_plan"  multiple="multiple" placeholder=""  value=""  /></p>
                            <p class="form-row form-row-wide  " >
                                <label for="business_plan" class="">Captcha *</label>
                                <?php echo $math; ?> = <input name="answer"  id="answer" type="text"  />
                                <input name="hidden_answer"  id="hidden_answer"  value="<?php echo $_SESSION['answer']; ?>"type="hidden" />
                            </p>
                        </div>  
                    </div>  

                    <div class="col-2">

                        <div class="woocommerce-shipping-fields">



                            <div class="shipping_address">
                                <div id="mentoring_required">
                                    <p class="form-row form-row-wide  " >
                                        <label for="mentoring" class="">Area in which Mentoring is required </label>

                                        <select multiple="multiple"  name="mentoring[]" id="mentoring" placeholder="-- Select --" class="SlectBox "  >
                                            <?php $categories = get_categories(array('parent' => 50, 'hide_empty' => 0)); ?>
                                            <?php foreach ($categories as $cat) { ?>
                                                <option value="<?php echo $cat->term_id ?>" ><?php echo $cat->name ?></option>
                                            <?php } ?>
                                            <option value="other">Other</option>
                                        </select>
                                    </p>

                                </div>
                                <p>
                                <div id="mentoring_id" style="display:none">
                                    <input type="text" name="add_mentoring" id="add_mentoring" placeholder="Add Area in which Mentoring required" >  
                                </div>


                                <p class="form-row form-row-wide " >
                                    <label for="facebook" class="">Facebook page</label>
                                    <input type="text" class="input-text " name="facebook" id="facebook" placeholder=""  value="" /></p>

                                <p class="form-row form-row-wide " >
                                    <label for="twitter" class="">Twitter handle </label>
                                    <input type="text" class="input-text " name="twitter" id="twitter" placeholder=""  value=""  /></p>

                                <p class="form-row form-row-wide" >




                            </div>

                            <div class="clear"></div>



                        </div> <!-- **shipping_address - Ends** --> 



                    </div> <!-- **woocommerce-shipping-fields - Ends** --> 

                </div> 

                <div class="col2-set" id="starup_details" >
                    <input type="checkbox" name="policy" id="policy" required="">* &nbsp; I / We agree to the <a href="/privacy-policy/">Privacy Policy</a> & <a href="/terms-conditions/">Terms of Use</a> at ivycamp.in
                </div>
                <input type="submit"  name="" id="submit" value="Submit" data-value="Submit" />
                <div id="error"></div>
                <div class="clear"></div>
            </form>
        </div> <!-- **woocommerce - Ends** --> 
        <div class="dt-sc-margin50"></div>

    </section> <!-- **Primary - Ends** -->          

</div>  
<!-- **container - Ends** --> 
<?php get_footer(); ?>

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


//        $("#key_member").live('change', function () {
//
//            if ($(this).val() == "other")
//            {
//                $('#member_id').show()
//                $('#add_member').prop('required', true);
//                // $("input").$("input").prop('required',true);
//            }
//            else
//            {
//                $('#member_id').hide();
//                $('#add_member').prop('required', false);
//            }
//        });

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



        $("#submit").click(function () {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var numbers = /^[\d\-\+\s]+$/;
            var cname = $('#cname').val();
            //   alert(cname);
            var address = $('#address').val();
            var first_name = $('#first_name').val();

            var mobile = $('#mobile').val();
            var email = $('#email').val();
            var password = $('#password').val();
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

            if (password == '' || password == null)
            {
                $('#password').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#password').css({"border-color": "", "border-weight": "", "border-style": ""});
            }


            if (sector == '' || sector == null)
            {
                $('#sector').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#sector').css({"border-color": "", "border-weight": "", "border-style": ""});
            }


            if (mobile == "" || mobile == null || isNaN(mobile) || mobile.length != '10')
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
                $('#error').html('<span style="color:red;">* Marked fields are mandatory. Kindly fill those fields to proceed ahead. </span>');
                return false;
            }




        });
    });


</script>
<script type="text/javascript">

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 49 || charCode > 57)) {
            return false;
        }
        return true;
    }
    </script>

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
<div class="parallax full-width-bg">
    <div class="container">
        <div class="main-title">
            <h1>Sign up as a Institute</h1>

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



            <form name="checkout" method="post" class="checkout" action="/institute-save/" >
                <!-- **col2-set - Starts** -->    
                <div class="col2-set" id="customer_details">
                    <h5><b><u>INSTITUTE DETAILS</u></b></h5>
                    <!-- **col-1 - Starts** -->   
                    <div class="col-1">
                        <!-- **woocommerce-billing-fields - Starts** -->   
                        <div> 

                            <p class="form-row form-row-wide " > 
                                <input type="hidden"  name="entity" value="institute" />
                                <label for="institute_name" class=""> Institute Name *</label>

                                <select name="institute_name" id="institute_name" class="institute_name  " required=""  >
                                    <option value="">-- Select --</option>
                                    <?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>
                                    <?php foreach ($Alumni as $Alumnival) { ?>
                                        <option value="<?php echo $Alumnival->term_id ?>" ><?php echo $Alumnival->name ?></option>
                                    <?php } ?>
                                    <option value="other">Other</option>
                                </select>
                            </p>
                            <div id="institute_id" style="display: none">
                                <p class="form-row form-row-wide " > 
                                    <input type="text" class="input-text " name="add_institute" id="add_institute" placeholder="Add Institute"    /> 
                                </p>
                            </div>

                            <p class="form-row form-row-wide " >
                                <label for="address" class=""> City of Location *</label>
                                <select name="city" id="city" required="">
                                    <option value="">-- Select --</option>
                                    <?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>
                                    <?php foreach ($Organizations as $Organizationsval) { ?>
                                        <option value="<?php echo $Organizationsval->term_id ?>" ><?php echo $Organizationsval->name ?></option>
                                    <?php } ?>
                                    <option value="other">Other</option>
                                </select>
                            </p>
                            <div id="city_id" style="display: none">
                                <input type="text" class="input-text " name="add_city" id="add_city" placeholder="Add City of Location"  value=""  /> 
                            </div>

                        </div> <!-- **woocommerce-billing-fields - Ends** --> 
                    </div> <!-- **col-1 - Ends** -->  
                    <!-- **col-2 - Starts** --> 
                    <div class="col-2">
                        <!-- **woocommerce-shipping-fields - Starts** -->
                        <div class="woocommerce-shipping-fields">


                            <!-- **shipping-address - Starts** -->

                            <p class="form-row form-row-wide address-field " >
                                <label>Website </label>
                                <input type="text" class="input-text " value="" placeholder="" name="website"/></p>




                            <div class="clear"></div>






                        </div> <!-- **shipping_address - Ends** --> 



                    </div> <!-- **woocommerce-shipping-fields - Ends** --> 

                </div> <!-- **col-2 - Ends** -->

                <div class="col2-set" id="customer_details">

                    <label  class="">Does the institute have an incubation center/research park *</label>


                    <div>

                        <ul class="">
                            <li class=""> 
                                <input  type="radio" class="incubation" name="incubation" value="Yes"  data-order_button_text="" /> 
                                <label >Yes </label>                        
                            </li>
                            <li class=""> 
                                <input  type="radio" class="incubation" name="incubation" value="No" checked="checked"  data-order_button_text="" />  
                                <label >No </label>   
                            </li>
                        </ul>

                    </div>


                    <div id="incubation_show" style="display: none">
                        <div class="col-1"> 
                            <p class="form-row form-row-wide " >
                                <label for="center" class="">Name of Center * </label>
                                <input type="text" class="input-text " name="center" id="center" placeholder=""  /></p>


                            <p class="form-row form-row-wide " >
                                <label for="year_inception" class="">Year of Inception * </label>

                                <select name="year_inception" class="year_inception"  id="year_inception"   >
                                    <option value="">-- Select --</option>
                                    <?php $institute = get_categories(array('parent' => 57, 'hide_empty' => 0)); ?>
                                    <?php foreach ($institute as $instituteval) { ?>
                                        <option value="<?php echo $instituteval->term_id ?>" ><?php echo $instituteval->name ?></option>
                                    <?php } ?>
                                </select>
                            </p>
                            <p class="form-row form-row-wide " >
                                <label for="person_role" class="">Contact Person Role * </label>

                                <select name="person_role" id="person_role" class="person_role  "  >
                                    <option value="">-- Select --</option>
                                    <?php $role = get_categories(array('parent' => 28, 'hide_empty' => 0)); ?>
                                    <?php foreach ($role as $roleval) { ?>
                                        <option value="<?php echo $roleval->term_id ?>" ><?php echo $roleval->name ?></option>
                                    <?php } ?>
                                    <option value="other">Other</option>
                                </select>
                            </p>
                            <div id="role_id" style="display: none">
                                <input type="text" class="input-text " name="add_role" id="add_role" placeholder=""  value="" /> 
                            </div>
                        </div>
                        <div class="col-2">
                            <p class="form-row form-row-wide " >
                                <label for="person_email" class="">Contact Person Email * </label>
                                <input type="text" class="input-text " name="person_email" id="person_email" placeholder="" /></p>


                            <p class="form-row form-row-wide " >
                                <label for="person_mobile" class="">Contact Person Mobile * </label>
                                <input type="text" class="input-text " name="person_mobile" id="person_mobile" placeholder=""  /></p>

                            <p class="form-row form-row-wide " >
                                <label for="companies_incubated" class="">Number of Companies Incubated to date * </label>
                                <input type="text" class="input-text " name="companies_incubated" id="companies_incubated" placeholder=""   /></p>
                            <p class="form-row form-row-wide " >
                                <label for="sample_campany" class="">Sample Companies Incubated * </label>
                                <input type="text" class="input-text " name="sample_company" id="sample_campany" placeholder=""  /></p>
                        </div>
                    </div>


                </div>


                <div class="col2-set" id="customer_details">
                    <!-- **col-1 - Starts** -->   
                    <h5><b><u>CONTACT DETAILS</u></b></h5>
                    <div class="col-1">



                        <p class="form-row form-row-wide " >
                            <label for="director" class=""> Director Name </label>
                            <input type="text" class="input-text " name="director" id="director" placeholder=""  value=""/></p>

                        <p class="form-row form-row-wide " >
                            <label for="ifirst_name" class=""> Contact Person Name *</label>
                            <input type="text" class="input-text " name="c_name" id="c_name" placeholder=""  value="" required="" /></p>


                        <p class="form-row form-row-wide " >
                            <label for="ifirst_name" class="">Contact Person Position at Institute *</label>
                            <select name="pos" id="position" class="position  " required="" >
                                <option value=""> -- Select -- </option>
                                <?php $position = get_categories(array('parent' => 45, 'hide_empty' => 0)); ?>
                                <?php foreach ($position as $positionval) { ?>
                                    <option value="<?php echo $positionval->term_id ?>" ><?php echo $positionval->name ?></option>
                                <?php } ?>
                                <option value="other">Other</option>
                            </select></p>
                        <div id="position_id" style="display: none">
                            <input type="text" class="input-text " name="add_position" id="add_position" placeholder="Position at institute"  value="" /> 
                        </div>

                        <div class="clear"></div>

                        <p class="form-row form-row-wide " >
                            <label for="email" class="">Email *</label>
                            <input type="email" class="input-text " name="email" id="email" placeholder=""  value="" required=""   /></p>
                        <p class="form-row form-row-wide " >
                            <label for="Password" class="">Password *</label>
                            <input type="password" class="input-text " name="password" id="password" placeholder=""  value="" required="" /></p>
                        <div class="clear"></div>
                        <p class="form-row form-row-first  " >
                            <label for="Landline" class="">Landline * </label>
                            <input type="text" class="input-text " name="landline" id="landline" placeholder=""  value="" required=""   /></p>

                        <p class="form-row form-row-last  validate-phone" >
                            <label for="Mobile" class="">Mobile * </label>
                            <input type="text" class="input-text " name="mobile" id="mobile" placeholder=""  min="10"  value=""  required="" /></p>


                        <!-- **col2-set - Ends** -->
                    </div>
                    <div class="col-2">



                        <p class="form-row form-row-wide " >
                            <label for="alumni_offc_head" class="">Alumni Office Head *</label>
                            <input type="text" class="input-text " name="alumni_offc_head" id="alumni_offc_head" placeholder=""  value="" /></p>

                        <p class="form-row form-row-wide  " >
                            <label for="alumni_email" class="">Alumni Office Email *</label>
                            <input type="text" class="input-text " name="alumni_email" id="alumni_email" placeholder=""  value="" required=""   /></p>

                        <p class="form-row form-row-wide  " >
                            <label for="alumni_number" class="">Alumni Office Mobile Number *</label>
                            <input type="text" class="input-text " name="alumni_number" id="alumni_number" placeholder=""  value="" required=""   /></p>

                        <p class="form-row form-row-wide " >
                            <label for="ecell_head" class="">Ecell Head * </label>
                            <input type="text" class="input-text " name="ecell_head" id="ecell_head" placeholder=""  value="" required="" /></p>


                        <p class="form-row form-row-wide " >
                            <label for="ecell_mob" class="">Ecell Mobile * </label>
                            <input type="text" class="input-text " name="ecell_mob" id="ecell_mob" placeholder=""  value=""  required=""/></p>

                        <!-- **col2-set - Ends** -->
                    </div>
                </div>

                <div class="col2-set" id="customer_details">
                    <!-- **col-1 - Starts** -->  
                    <h5><b><u>OTHER DETAILS</u></b></h5>
                    <div class="col-1">
                        <!-- **woocommerce-billing-fields - Starts** -->   
                        <div> 

                            <p class="form-row form-row-wide " >
                                <label for="istart_name" class="">Facebook Page</label>
                                <input type="text" class="input-text " name="facebook" id="facebook" placeholder=""  value="" /></p>

                        </div> <!-- **woocommerce-billing-fields - Ends** --> 
                    </div> <!-- **col-1 - Ends** -->  
                    <!-- **col-2 - Starts** --> 
                    <div class="col-2">
                        <!-- **woocommerce-shipping-fields - Starts** -->
                        <div class="woocommerce-shipping-fields">


                            <p class="form-row form-row-wide " >
                                <label for="ifirst_name" class="">Twitter Handle </label>
                                <input type="text" class="input-text " name="Twitter" id="Twitter" placeholder=""  value=""  /></p>

<p class="form-row form-row-wide  " >
                                <label for="business_plan" class="">Captcha*</label>
                        <?php echo $math; ?> = <input name="answer"  id="answer" type="text" />
                                <input name="hidden_answer" id="hidden_answer"  value="<?php echo $_SESSION['answer']; ?>" type="hidden" />
                            </p>

                            <!-- **shipping-address - Starts** -->






                        </div> <!-- **shipping_address - Ends** --> 



                    </div> <!-- **woocommerce-shipping-fields - Ends** --> 

                </div> <!-- **col-2 - Ends** -->
                
                <div class="col2-set" id="starup_details">
                    <input type="checkbox" name="policy" id="policy" required="">* &nbsp; I / We agree to the <a href="/privacy-policy/">Privacy Policy</a> & <a href="/terms-conditions/">Terms of Use</a> at ivycamp.in

                </div>
                <input type="submit"  name="submit_inst" id="submit_inst" value="Submit" data-value="Submit" />
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
        
        $(".incubation").click(function () {
          //  alert($(this).val());
            if ($(this).val() == "Yes")
            {
                $('#incubation_show').show()
                $('#center').prop('required', true);
                $('#year_inception').prop('required', true);
                $('#person_role').prop('required', true);
                $('#person_email').prop('required', true);
                $('#person_mobile').prop('required', true);
                $('#companies_incubated').prop('required', true);
                $('#sample_company').prop('required', true);
            }
            else
            {
                $('#incubation_show').hide();
                $('#center').prop('required', false);
                $('#year_inception').prop('required', false);
                $('#person_role').prop('required', false);
                $('#person_email').prop('required', false);
                $('#person_mobile').prop('required', false);
                $('#companies_incubated').prop('required', false);
                $('#sample_company').prop('required', false);
            }
        });

        $("#position").change(function () {

            if ($(this).val() == "other")
            {
                $('#position_id').show()
                $('#add_position').prop('required', true);
                // $("input").$("input").prop('required',true);
            }
            else
            {
                $('#position_id').hide();
                $('#add_position').prop('required', false);
            }
        });
        $("#person_role").change(function () {

            if ($(this).val() == "other")
            {
                $('#role_id').show()
                $('#add_role').prop('required', true);
                // $("input").$("input").prop('required',true);
            }
            else
            {
                $('#role_id').hide();
                $('#add_role').prop('required', false);
            }
        });
        $("#city").change(function () {

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


        $("#institute_name").change(function () {

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

        $("#submit_inst").click(function () {
            // alert('submit');
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var numbers = /^[\d\-\+\s]+$/;
            var institute_name = $('#institute_name').val();
            var city = $('#city').val();
            var email = $('#email').val();
            var c_name = $('#c_name').val();
            var mobile = $('#mobile').val();
            var password = $('#password').val();
            var position = $('#position').val();
            var landline = $('#landline').val();


            var alumni_offc_head = $('#alumni_offc_head').val();
            var alumni_email = $('#alumni_email').val();
            var alumni_number = $('#alumni_number').val();
            var ecell_head = $('#ecell_head').val();
            var ecell_mob = $('#ecell_mob').val();


            //var incubation = $('.incubation').val();
            // alert($(this).is(".incubation:checked").val());

            var incubation = $('input:radio:checked').val();
            // alert(incubation)
            var center = $('#center').val();
            var year_inception = $('#year_inception').val();


            var person_role = $('#person_role').val();
            var person_email = $('#person_email').val();
            var person_mobile = $('#person_mobile').val();
            var companies_incubated = $('#companies_incubated').val();

            var sample_campany = $('#sample_campany').val();
            var answer = $('#answer').val();
            var hidden_answer = $('#hidden_answer').val();
            var policy = $('#policy').val();

            var flag = '0';
            if (institute_name == '' || institute_name == null)
            {

                $('#institute_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {

                $('#institute_name').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (city == '' || city == null)
            {
                $('#city').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#city').css({"border-color": "", "border-weight": "", "border-style": ""});
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
            if (mobile == "" || mobile == null  || !numbers.test(mobile))
            {
                $('#mobile').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#mobile').css({"border-color": "", "border-weight": "", "border-style": ""});
            }


            if (c_name == '' || c_name == null)
            {
                $('#c_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#c_name').css({"border-color": "", "border-weight": "", "border-style": ""});
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

            if (position == '' || position == null)
            {
                $('#position').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#position').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (landline == '' || landline == null || !numbers.test(landline))
            {
                $('#landline').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#landline').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (alumni_offc_head == '' || alumni_offc_head == null)
            {
                $('#alumni_offc_head').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#alumni_offc_head').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (alumni_email == '' || alumni_email == null || !emailPattern.test(alumni_email))
            {
                $('#alumni_email').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#alumni_email').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (alumni_number == '' || alumni_number == null || !numbers.test(alumni_number))
            {
                $('#alumni_number').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#alumni_number').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (ecell_head == '' || ecell_head == null)
            {
                $('#ecell_head').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#ecell_head').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (ecell_mob == '' || ecell_mob == null || !numbers.test(ecell_mob))
            {
                $('#ecell_mob').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#ecell_mob').css({"border-color": "", "border-weight": "", "border-style": ""});
            }


            if (incubation == 'Yes')
            {
                if (center == '' || center == null)
                {
                    $('#center').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                    flag++;
                }
                else
                {
                    $('#center').css({"border-color": "", "border-weight": "", "border-style": ""});
                }
                if (year_inception == '' || year_inception == null)
                {
                    $('#year_inception').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                    flag++;
                }
                else
                {
                    $('#year_inception').css({"border-color": "", "border-weight": "", "border-style": ""});
                }
                if (person_role == '' || person_role == null)
                {
                    $('#person_role').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                    flag++;
                }
                else
                {
                    $('#person_role').css({"border-color": "", "border-weight": "", "border-style": ""});
                }
                if (person_email == '' || person_email == null || !emailPattern.test(person_email))
                {
                    $('#person_email').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                    flag++;
                }
                else
                {
                    $('#person_email').css({"border-color": "", "border-weight": "", "border-style": ""});
                }

                if (person_mobile == '' || person_mobile == null ||  !numbers.test(person_mobile))
                {
                    $('#person_mobile').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                    flag++;
                }
                else
                {
                    $('#person_mobile').css({"border-color": "", "border-weight": "", "border-style": ""});
                }
                if (companies_incubated == '' || companies_incubated == null)
                {
                    $('#companies_incubated').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                    flag++;
                }
                else
                {
                    $('#companies_incubated').css({"border-color": "", "border-weight": "", "border-style": ""});
                }
                if (sample_campany == '' || sample_campany == null)
                {
                    $('#sample_campany').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                    flag++;
                }
                else
                {
                    $('#sample_campany').css({"border-color": "", "border-weight": "", "border-style": ""});
                }
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
                $('#error').html('<span style="color:red;">*Marked fields are mandatory. Kindly fill those fields to proceed ahead. </span>');
                return false;
            }

        });

    });
</script>
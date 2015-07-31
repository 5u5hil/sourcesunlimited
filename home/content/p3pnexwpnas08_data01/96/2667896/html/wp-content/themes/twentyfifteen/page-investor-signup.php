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

    });
</script>
<div class="parallax full-width-bg">
    <div class="container">
        <div class="main-title">
            <h1>Sign up as a Investor</h1>
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
            <p><b>Register using your linked in profile. Your details will be automatically updated from Linked in.</b></p>

            <?php
            if ($_REQUEST['subtype'] == 'Individual') {

                if ($_REQUEST['secrole'] == 'mentor') {
                    ?>

                    <a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&amp;client_id=75fcybemoqsci1&amp;redirect_uri=http://ivycamp.in/investor-signup/?subtype=Individual&secrole=mentor&amp;state=987654321&amp;scope=r_basicprofile%20r_emailaddress%20w_share"><img src="<?= get_template_directory_uri(); ?>/images/Sign-In-Small.png" alt="Linkedin" style="  width: 150px;"/> </a>
                    <?php
                    $url = 'https://www.linkedin.com/uas/oauth2/accessToken';
                    $fields = array(
                        'grant_type' => urlencode('authorization_code'),
                        'code' => urlencode($_GET['code']),
                        'redirect_uri' => urlencode('http://ivycamp.in/investor-signup/?subtype=Individual&secrole=mentor'),
                        'client_id' => urlencode('75fcybemoqsci1'),
                        'client_secret' => urlencode('ABj1SfJUvTH8mCPx')
                    );
                } else {
                    ?>
                    <a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&amp;client_id=75fcybemoqsci1&amp;redirect_uri=http://ivycamp.in/investor-signup/?subtype=Individual&amp;state=987654321&amp;scope=r_basicprofile%20r_emailaddress%20w_share"><img src="<?= get_template_directory_uri(); ?>/images/Sign-In-Small.png" alt="Linkedin" style="  width: 150px;"/> </a>
                    <?php
                    $url = 'https://www.linkedin.com/uas/oauth2/accessToken';
                    $fields = array(
                        'grant_type' => urlencode('authorization_code'),
                        'code' => urlencode($_GET['code']),
                        'redirect_uri' => urlencode('http://ivycamp.in/investor-signup/?subtype=Individual'),
                        'client_id' => urlencode('75fcybemoqsci1'),
                        'client_secret' => urlencode('ABj1SfJUvTH8mCPx')
                    );
                }
            } else {
                ?>
                <a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&amp;client_id=75fcybemoqsci1&amp;redirect_uri=http://ivycamp.in/investor-signup/&amp;state=987654321&amp;scope=r_basicprofile%20r_emailaddress%20w_share"><img src="<?= get_template_directory_uri(); ?>/images/Sign-In-Small.png" alt="Linkedin" style="  width: 150px;"/> </a>
                <?php
                $url = 'https://www.linkedin.com/uas/oauth2/accessToken';
                $fields = array(
                    'grant_type' => urlencode('authorization_code'),
                    'code' => urlencode($_GET['code']),
                    'redirect_uri' => urlencode('http://ivycamp.in/investor-signup/'),
                    'client_id' => urlencode('75fcybemoqsci1'),
                    'client_secret' => urlencode('ABj1SfJUvTH8mCPx')
                );
            }
            ?>

            <p><b>OR  Register using the form below.</b></p>
            <br/>
            <br/>
            <?php
//url-ify the data for the POST
            foreach ($fields as $key => $value) {
                $fields_string .= $key . '=' . $value . '&';
            }
            rtrim($fields_string, '&');




            $a = json_decode(curll($url, $fields, $fields_string), true);





            $opts = array(
                'http' => array(
                    'method' => "GET",
                    'header' => "Authorization: Bearer " . $a['access_token']
                )
            );

            $context = stream_context_create($opts);

// Open the file using the HTTP headers set above https://api.linkedin.com/v1/people/~:(id,firstName,lastName,positions,headline,picture-url,email-address)
            $file = file_get_contents('https://api.linkedin.com/v1/people/~:(id,firstName,lastName,positions,headline,picture-url,email-address)?format=json', false, $context);

            //echo $file;
            //echo "<br>";
            $value = json_decode($file, true);

            function curll($url, $fields, $fields_string) {
                //open connection
                $ch = curl_init();

//set the url, number of POST vars, POST data
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, count($fields));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//execute post
                $result = curl_exec($ch);

//close connection
                curl_close($ch);

                return $result;
            }
            ?>
            <form name="checkout" method="post" class="checkout" action="/investor-save/" enctype="multipart/form-data">

                <!-- **col2-set - Starts** -->    

                <div class="col2-set" id="customer_details">

                    <!-- **col-1 - Starts** -->   
                    <h5><b><u>INVESTOR DETAILS</u></b></h5>
                    <div class="col-1">

                        <input type="hidden" class="input-text " name="entity" id="entity" placeholder=""  value="investor"  />
                        <input type="hidden" class="input-text " name="investor_type" id="investor_type" placeholder=""  value="<?php echo $_REQUEST['subtype']; ?>"  />
                        <input type="hidden" class="input-text " name="secrole" id="secrole" placeholder=""  value="<?php echo $_REQUEST['secrole']; ?>" />
                        <!-- **woocommerce-billing-fields - Starts** -->   




                        <p class="form-row form-row-wide " >

                            <label for="ifirst_name" class="">Name of Investor *</label>

                            <input type="text" class="input-text " name="investor_name" id="investor_name" placeholder=""  value="<?php if(isset($value['firstName'])) echo $value['firstName']." ".$value['lastName']; else echo ""; ?>" required="" /></p>

<?php if ($_REQUEST['subtype'] != 'Individual') { ?>

                            <p class="form-row form-row-wide " >

                                <label for="ifirst_name" class="">Name of Investment Organization *</label>

                                <input type="text" class="input-text " name="company_name" id="company_name" placeholder=""  value="" required="" /></p>

                            <p class="form-row form-row-wide address-field" >

                                <label>Website of Organisation </label>

                                <input type="text" class="input-text " value="" placeholder="" name="website"/></p>

                            <p class="form-row form-row-wide address-field" >
<?php } ?>

                    </div>

                    <div class="col-2">
                        <div class="form-row form-row-wide address-field " id="sectordiv">	

                            <label for="sector" class="">Sectors to Invest in *</label>



                            <select multiple="multiple" placeholder="-- Select --"  name="sector[]" id="sector" class="sector SlectBox "  required="" >



<?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>

<?php foreach ($categories as $cats) { ?>

                                    <option value="<?php echo $cats->term_id ?>" ><?php echo $cats->name ?></option>

<?php } ?>
 <option value="other" >Other</option>
                            </select>



                        </div>
                        
                         <div id="sector_id" style="display:none">
                                    <p class="form-row form-row-wide " >                                

                                        <input type="text" class="input-text " name="add_sector" id="add_sector" placeholder="Add Sector "  value="" />
                                    </p>
                                </div>



                        <div class="form-row form-row-wide address-field " >

                            <label for="address" class="">City of Location * </label>

                            <select name="address" id="address" required="">

                                <option value="">-- Select --</option>

<?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>

<?php foreach ($Organizations as $Organizationsval) { ?>

                                    <option value="<?php echo $Organizationsval->term_id ?>" ><?php echo $Organizationsval->name ?></option>

<?php } ?>

                                <option value="other">Other</option>

                            </select>

                        </div>
                        
                        <div id="address_id" style="display: none">

                            <p class="form-row form-row-wide " > 

                                <input type="text" class="input-text " name="add_address" id="add_address" placeholder="Add City of Location"    /> 

                            </p>

                        </div>

                    </div>





                    <div class="clear"></div>







                    <h5><b><u>CONTACT DETAILS</u></b></h5>	





                    <div class="col-1">



                        <p class="form-row form-row-wide  validate-email" >

                            <label for="email" class="">Email *</label>

                            <input type="email" class="input-text " name="email" id="email" placeholder=""  value="<?php echo $value['emailAddress']; ?>" required=""   /></p>










                        <p class="form-row form-row-wide  validate-phone" >

                            <label for="i_phone" class="">Mobile * </label>

                            <input type="text" class="input-text " name="mobile" id="mobile" placeholder="" min="10" value=""  required=""  /></p>

                        <div class="clear"></div>



                        <p class="form-row form-row-wide  " >

                            <label for="i_email" class="">Password *</label>

                            <input type="password" class="input-text " name="password" id="password" placeholder=""  value=""  required=""  /></p>


                        <div class="form-row form-row-wide " id="inst">

                            <label for="Alumni" class="">Alumni of Institution * </label>

                            <select multiple="multiple" name="alumni_inst[]" id="alumni_inst" placeholder="-- Select --" class="alumni_inst SlectBox  " required=""    >

<?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>

<?php foreach ($Alumni as $Alumnival) { ?>

                                    <option value="<?php echo $Alumnival->term_id ?>" ><?php echo $Alumnival->name ?></option>

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




<?php if ($_REQUEST['subtype'] == 'Individual') { ?>


                            <label>Part of Investment Network </label>

                            <input type="text" class="input-text " value="" placeholder="" name="part_of_investment"/></p>
<?php } ?>










                        <div id="investor_id" style="display: none">

                            <p class="form-row form-row-wide " > 

                                <input type="text" class="input-text " name="add_investor" id="add_investor" placeholder="Add investor"    /> 

                            </p>

                        </div>









                        <div class="form-row form-row-wide address-field  " >

                            <label for="member" class="">Members of Organizations </label>



                            <select name="member" id="member" class="member  " >

                                <option value="">-- Select --</option>

<?php $Organizations = get_categories(array('parent' => 14, 'hide_empty' => 0)); ?>

<?php foreach ($Organizations as $Organizationsval) { ?>

                                    <option value="<?php echo $Organizationsval->term_id ?>" ><?php echo $Organizationsval->name ?></option>

<?php } ?>

                                <option value="other">Other</option>

                            </select>
                        </div>


                        <div id="member_id" style="display: none">

                            <p class="form-row form-row-wide " > 

                                <input type="text" class="input-text " name="add_member" id="add_member" placeholder="Add Members of Organizations"    /> 

                            </p>

                        </div>


                        <div class="form-row form-row-wide address-field ">		

                            <label>Years as an Investor </label>



                            <select name="year_of_invester" id="year_of_invester" class="year_of_invester  "  >

                                <option value="">-- Select --</option>

<?php $year_of_mentor = get_categories(array('parent' => 23, 'hide_empty' => 0, 'order' => 'ASC')); ?>

<?php foreach ($year_of_mentor as $year_of_exp) { ?>

                                    <option value="<?php echo $year_of_exp->term_id ?>" ><?php echo $year_of_exp->name ?></option>

<?php } ?>

                            </select>



                        </div>	


                        <div class="form-row form-row-wide address-field " >

                            <label for="funding_amt" class="">Average Level of Investments </label>




                            <select class="input-text " name="funding_amt" id="funding_amt" placeholder=""  value=""  />

                            <option value="">-- Select --</option>

                            <option value="Less than 10 Lacs" >Less than 10 Lacs</option>

                            <option value="10 Lacs - 20 Lacs" >10 Lacs -20 Lacs</option>

                            <option value="20 Lacs - 50 Lacs" >20 Lacs - 50 Lacs</option>

                            <option value="50 Lacs -  70 Lacs" >50 Lacs -  70 Lacs</option>

                            <option value="70 Lacs - 1 Cr" >70 Lacs - 1 Cr </option>

                            <option value="1 Cr - 5 Cr" >1 Cr - 5 Cr </option>

                            <option value="5 Cr - 10 Cr" >5 Cr - 10 Cr </option>



                            </select>



                        </div>
                        <div class="form-row form-row-wide address-field ">		

                            <label>Sample Companies Invested in </label>

                            <input type="text" name="companies_invested" class="companies_invested " >


                        </div>


                        <div class="clear"></div>






                    </div> <!-- **woocommerce-billing-fields - Ends** --> 

                    <div class="clear"></div>
                    <h5><b><u>OTHER DETAILS</u></b></h5>

                    <div class="col-1">	
                        <p class="form-row form-row-wide " >

                            <label for="istart_name" class="">Facebook Page</label>

                            <input type="text" class="input-text " name="facebook" id="facebook" placeholder=""  value=""  /></p>
                        <div class="clear"></div>
                        <p class="form-row form-row-wide " >
                            <label for="upload-logo" class="">Upload Picture (Maximum file upload size 2mb) </label>
                            <input type="file" class="input-text " name="logo" id="file" placeholder=""  value=""  /></p>
                    </div>
                    <div class="col-2">	

                        <p class="form-row form-row-wide " >

                            <label for="ifirst_name" class="">Twitter Handle </label>

                            <input type="text" class="input-text " name="twitter" id="twitter" placeholder=""  value="" /></p>



                        <p class="form-row form-row-wide  " >
                            <label for="business_plan" class="">Captcha*</label>
<?php echo $math; ?> = <input name="answer"  id="answer" type="text" />
                            <input name="hidden_answer" id="hidden_answer"  value="<?php echo $_SESSION['answer']; ?>" type="hidden" />
                        </p>
                    </div>
                </div> <!-- **col-1 - Ends** -->  

                <!-- **col-2 - Starts** --> 

                <div class="col-2">

                    <!-- **woocommerce-shipping-fields - Starts** -->

                    <div class="woocommerce-shipping-fields">





                        <!-- **shipping-address - Starts** -->















                        <div class="clear"></div>


                        <div class="col2-set" id="starup_details">
                            <input type="checkbox" name="policy" id="policy" required="">* &nbsp; I / We agree to the <a href="/privacy-policy/">Privacy Policy</a> & <a href="/terms-conditions/">Terms of Use</a> at IvyCamp.in

                        </div>


                        <input type="submit"  name="" id="submit" value="Submit" data-value="Submit" />
                        <div id="error"></div>


                        <div class="clear"></div>







                    </div> <!-- **shipping_address - Ends** --> 







                </div> <!-- **woocommerce-shipping-fields - Ends** --> 



        </div> <!-- **col-2 - Ends** -->



</div> <!-- **col2-set - Ends** -->





</form>

</div> <!-- **woocommerce - Ends** --> 

<div class="dt-sc-margin50"></div>



</section> <!-- **Primary - Ends** -->          



</div> <!-- **container - Ends** --> 

<?php get_footer(); ?>



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

//alert($(this).val()); 
  $('#alumni_inst option:selected').each(function (index, value) {

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
            if (mobile == "" || mobile == null  || !numbers.test(mobile))
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




        });
    });
</script>

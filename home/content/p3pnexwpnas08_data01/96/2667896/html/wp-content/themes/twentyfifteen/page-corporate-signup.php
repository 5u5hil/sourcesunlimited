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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js">
</script><script src="http://ivycamp.in/wp-content/themes/twentyfifteen/js/jquery.sumoselect.min.js"></script>
<link href="http://ivycamp.in/wp-content/themes/twentyfifteen/css/sumoselect.css" rel="stylesheet" />
<script type="text/javascript">
    $(document).ready(function () {
        window.asd = $('.SlectBox').SumoSelect({csvDispCount: 3});
    });
</script>
<div class="parallax full-width-bg">
    <div class="container">
        <div class="main-title">
            <h1>Sign up as a Corporate</h1>
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


            <a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&amp;client_id=75fcybemoqsci1&amp;redirect_uri=http://ivycamp.in/corporate-signup/&amp;state=987654321&amp;scope=r_basicprofile%20r_emailaddress%20w_share"><img src="<?= get_template_directory_uri(); ?>/images/Sign-In-Small.png" alt="Linkedin" style="  width: 150px;"/> </a>


            <p><b>OR  Register using the form below.</b></p>
            <br/>
            <br/>
            <?php
            $url = 'https://www.linkedin.com/uas/oauth2/accessToken';
            $fields = array(
                'grant_type' => urlencode('authorization_code'),
                'code' => urlencode($_GET['code']),
                'redirect_uri' => urlencode('http://ivycamp.in/corporate-signup/'),
                'client_id' => urlencode('75fcybemoqsci1'),
                'client_secret' => urlencode('ABj1SfJUvTH8mCPx')
            );

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
            <!-- **checkout - Starts** -->                       
            <form name="checkout" method="post" class="checkout" action="/corporate-save/" >
                <!-- **col2-set - Starts** -->                    
                <div class="col2-set" id="customer_details">
                    <!-- **col-1 - Starts** -->   
                    <h5><b><u>CORPORATE DETAILS</u></b></h5>
                    <div class="woocommerce-billing-fields"> 
                        <div class="col-1">
                            <p class="form-row form-row-wide " >   
                                <label for="Corporation_name" class="">Corporation Name *</label>   
                                <input type="hidden" class="input-text " name="entity" id="entity" placeholder=""  value="corporate"  required="" />                                                    
                                <input type="text" class="input-text " name="corporation_name" id="corporation_name" placeholder=""  value="" /></p>
                            <p class="form-row form-row-wide " >

                                <label for="Address" class="">City of Location *</label>                                
                                <select name="address" id="address"  required="" >
                                    <option value="">-- Select --</option>
<?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>   
                                    <?php foreach ($Organizations as $Organizationsval) { ?>                                        
                                        <option value="<?php echo $Organizationsval->term_id ?>" ><?php echo $Organizationsval->name ?></option>
                                    <?php } ?>                                    
                                    <option value="other">Other</option>
                                </select>
                            </p>
                            <div id="city_id" style="display: none">  
                                <input type="text" class="input-text " name="add_city" id="add_city" placeholder="Add City"  value=""  /> 
                            </div> 
                            <p class="form-row form-row-wide " >  

                                <label for="istart_name" class="">Website *</label>  
                                <input type="text" class="input-text " name="website" id="website" placeholder=""  value=""  /></p>
                        </div>

                        <!-- **col-1 - Ends** -->                      <!-- **col-2 - Starts** -->                     

                        <!-- **woocommerce-shipping-fields - Starts** -->                        
                        <div class="col-2">
                            <p class="form-row form-row-wide " id="sec" >
                                <label for="ifirst_name" class="">Sectors * </label>                                                                 
                                <select multiple="multiple" placeholder="-- Select --" name="sector[]" id="sector" class="interest_to_mentor SlectBox" >
<?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>                                    <?php foreach ($categories as $cat) { ?>                                        
                                        <option value="<?php echo $cat->term_id ?>" ><?php echo $cat->name ?></option>
                                    <?php } ?>                                                                   
                                </select>
                            </p>
                            <!-- **shipping-address - Starts** -->                            
                            <p class="form-row form-row-wide "  id="isec">
                                <label for="ifirst_name" class="">Interested to look at innovation areas in sector * </label>                                                                 
                                <select multiple="multiple" placeholder="-- Select --" name="isector[]" id="isector"  class="isector SlectBox  " required="" >
<?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>                                    <?php foreach ($categories as $cat) { ?>                                        
                                        <option value="<?php echo $cat->term_id ?>" ><?php echo $cat->name ?></option>
                                    <?php } ?>                                
                                </select>
                            </p>

                            <p class="form-row form-row-wide " >     
                                <label for="entrepreneurship_programs" class="">Types of entrepreneurship programs associated with (programes, business plan or case study competitions, etc.) *</label>                                <input type="text" class="input-text " name="entrepreneurship_programs" id="entrepreneurship_programs" placeholder=""  value="" required="" /></p>


<!--                            <input type="submit"  name="submit" id="submit-corporate" value="Submit" data-value="Submit" />    
 <div id="error"></div>
 <div class="clear"></div>-->
                        </div>
                        <!-- **shipping_address - Ends** -->                     
                    </div>
                    <!-- **woocommerce-shipping-fields - Ends** -->                 
                </div>


                <div class="col2-set" id="customer_details">
                    <!-- **col-1 - Starts** -->    
                    <h5><b><u>CONTACT DETAILS</u></b></h5>
                    <div class="col-1">
                        <p class="form-row form-row-wide " >  
                            <label for="CEO_Name" class="">CEO Name *</label>    
                            <input type="text" class="input-text " name="ceo_name" id="ceo_name" placeholder=""   value="<?php if (isset($value['firstName'])) echo $value['firstName'] . " " . $value['lastName'];
                                    else echo ""; ?>"  required="" /></p>
                        <p class="form-row form-row-wide" >  
                            <label for="c_name" class="">Conatct Person Name *</label>        
                            <input type="text" class="input-text " name="c_name" id="c_name" placeholder=""  value=""  required="" /></p>
                        <p class="form-row form-row-wide" >    
                            <label for="email" >Email *</label>                  
                            <input type="email" class="input-text " name="email" id="email" placeholder=""   value="<?php echo $value['emailAddress']; ?>"   required="" /></p>
                        <div class="clear"></div>
                        <p class="form-row form-row-wide " >          
                            <label for="Password" class="">Password *</label>      
                            <input type="password" class="input-text " name="password" id="password" placeholder=""  value=""  required=""  /></p>
                        <p class="form-row form-row-wide" >   
                            <label for="i_phone" class="">Mobile * </label>       
                            <input type="text" class="input-text " name="mobile" id="mobile" placeholder="" min="10"  value=""   required=""  /></p>
                        <div class="clear"></div>

                        <p class="form-row form-row-wide " >   
                            <label for="landline" class="">Landline * </label>     
                            <input type="text" class="input-text " name="landline" id="landline" placeholder=""  value=""  required=""  /></p>
                        <!-- **col-1 - Ends** -->                      <!-- **col-2 - Starts** -->                     

                    </div>
                    <div class="col-2">
                        <p class="form-row form-row-wide  " >
                            <label for="i_phone" class="">Member of Organizations </label>                                                                                          
                            <select multiple="multiple"  placeholder="-- Select --" name="member[]" id="member" class="member SlectBox " >
                                <?php $Organizations = get_categories(array('parent' => 14, 'hide_empty' => 0)); ?>                                    <?php foreach ($Organizations as $Organizationsval) { ?>                                        
                                    <option value="<?php echo $Organizationsval->term_id ?>" ><?php echo $Organizationsval->name ?></option>
                                <?php } ?>                                    
                                <option value="other">Other</option>
                            </select>
                        </p>

                        <p>                            
                        <div id="add_organization" style="display:none">        
                            <input type="text" name="other_organization" id="other_organization" placeholder="Add Organization here" >                              </div>
                        </p>   
                        <p class="form-row form-row-wide address-field" >
                            <label>Institutions interested in  </label>                                
                            <select multiple="multiple" placeholder="-- Select --" name="institute_name[]" id="institute_name" class="institute_name SlectBox"   >
                                <?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>                                    <?php foreach ($Alumni as $Alumnival) { ?>                                        
                                    <option value="<?php echo $Alumnival->term_id ?>" ><?php echo $Alumnival->name ?></option>
                                <?php } ?>                                    
                                <option value="other">Other</option>
                            </select>
                        </p>
                        <div id="institute_id" style="display: none">
                            <p class="form-row form-row-wide " >   
                                <input type="text" class="input-text " name="add_institute" id="add_institute" placeholder="Add Institute"    />                                 </p>
                        </div>

                        <p class="form-row form-row-wide " >    
                            <label for="istart_name" class="">Facebook Page</label>  
                            <input type="text" class="input-text " name="facebook" id="facebook" placeholder=""  value=""  /></p>
                        <p class="form-row form-row-wide  " >
                            <label for="business_plan" class="">Captcha*</label>
                            <?php echo $math; ?> = <input name="answer"  id="answer" type="text" />
                            <input name="hidden_answer" id="hidden_answer"  value="<?php echo $_SESSION['answer']; ?>" type="hidden" />
                        </p>
                    </div>
                    <!-- **woocommerce-shipping-fields - Ends** -->                 
                </div>
                <div class="col2-set" id="starup_details">
                    <input type="checkbox" name="policy" id="policy" required="">* &nbsp; I / We agree to the <a href="/privacy-policy/">Privacy Policy</a> & <a href="/terms-conditions/">Terms of Use</a> at IvyCamp.in

                </div>
                <input type="submit"  name="submit" id="submit-corporate" value="Submit" data-value="Submit" />    
                <div id="error"></div>
                <div class="clear"></div>

                <!-- **col2-set - Ends** -->        </form>
        </div>
        <!-- **woocommerce - Ends** --> <div class="dt-sc-margin50"></div></section> <!-- **Primary - Ends** -->          </div> <!-- **container - Ends** --> <?php get_footer(); ?><script>    $ = jQuery;
    $(document).ready(function () {
        $("#member").live('change', function () {
            $('#member option:selected').each(function (index, value) {
                if ($(this).val() == "other")
                {
                    $('#add_organization').show();
                    $('#other_organization').prop('required', true);
                } else
                {
                    $('#add_organization').hide();
                    $('#other_organization').prop('required', false);

                }
            });
        });

        $("#institute_name").live('change', function () {
            $('#institute_name option:selected').each(function (index, value) {
                if ($(this).val() == "other")
                {
                    $('#institute_id').show()
                    $('#add_institute').prop('required', true);
                    //$("input").$("input").prop('required',true);  
                }
                else
                {
                    $('#institute_id').hide();
                    $('#add_institute').prop('required', false);
                }
            });
        });
        $("#address").live('change', function () {
            if ($(this).val() == "other")
            {
                $('#city_id').show()
                $('#add_city').prop('required', true);
            }
            else
            {
                $('#city_id').hide();
                $('#add_city').prop('required', false);
            }
        });
        $("#submit-corporate").click(function () {
            //  alert('dgsdgsdg');

            var numbers = /^[\d\-\+\s]+$/;
            var corporation_name = $('#corporation_name').val();
            var c_name = $('#c_name').val();
            var address = $('#address').val();
            var email = $('#email').val();
            var emailPattern = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            var ceo_name = $('#ceo_name').val();
            var mobile = $('#mobile').val();
            var password = $('#password').val();
            var landline = $('#landline').val();
            var website = $('#website').val();
            var sector = $('#sector').val();
            var isector = $('#isector').val();
            var vsec = $('#sec p.CaptionCont span').text();
            var visec = $('#isec p.CaptionCont span').text();
            var entrepreneurship_programs = $('#entrepreneurship_programs').val();
            var answer = $('#answer').val();
            var hidden_answer = $('#hidden_answer').val();
            var policy = $('#policy').val();
            var flag = '0';
            if (corporation_name == '' || corporation_name == null)
            {

                $('#corporation_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {

                $('#corporation_name').css({"border-color": "", "border-weight": "", "border-style": ""});
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


            if (!emailPattern.test(email) || email == "" || email == null)
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

            if (vsec == '-- Select --')
            {
                $('#sec p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#sec p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (visec == '-- Select --')
            {
                $('#isec p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#isec p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
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
            if (landline == '' || landline == null)
            {
                $('#landline').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#landline').css({"border-color": "", "border-weight": "", "border-style": ""});
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

            if (ceo_name == '' || ceo_name == null)
            {
                $('#ceo_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#ceo_name').css({"border-color": "", "border-weight": "", "border-style": ""});
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


            if (isector == '' || isector == null)
            {


                $('#isector').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {


                $('#isector').css({"border-color": "", "border-weight": "", "border-style": ""});
            }


            if (entrepreneurship_programs == '' || entrepreneurship_programs == null)
            {


                $('#entrepreneurship_programs').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {


                $('#entrepreneurship_programs').css({"border-color": "", "border-weight": "", "border-style": ""});
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


            if ($("#email").val()) {

                $.ajax({
                    url: "/register-email/",
                    type: "post",
                    data: {email: $("#email").val(), name: $("#corporation_name").val()},
                    success: function (data) {

                    }
                });
            }
        });
    });
</script>
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
            <h1>Sign up as a Mentor</h1>
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

            <!-- **checkout - Starts** -->
            <p><b>Register using your linked in profile. Your details will be automatically updated from Linked in.</b></p>


            <a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&amp;client_id=75fcybemoqsci1&amp;redirect_uri=http://ivycamp.in/mentor-signup/&amp;state=987654321&amp;scope=r_basicprofile%20r_emailaddress%20w_share"><img src="<?= get_template_directory_uri(); ?>/images/Sign-In-Small.png" alt="Linkedin" style="  width: 150px;"/> </a>

         
            <p> <b>OR  Register using the form below.</b></p>
            <br/>
            <br/>
            <?php
            $url = 'https://www.linkedin.com/uas/oauth2/accessToken';
            $fields = array(
                'grant_type' => urlencode('authorization_code'),
                'code' => urlencode($_GET['code']),
                'redirect_uri' => urlencode('http://ivycamp.in/mentor-signup/'),
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


            <form name="checkout" method="post" class="checkout" action="/mentor-save/" enctype="multipart/form-data">
                <!-- **col2-set - Starts** -->                                    
                <div class="col2-set" id="customer_details">
                    <!-- **col-1 - Starts** -->  
                    <h5><b><u>MENTOR DETAILS</u></b></h5>
                    <div class="col-1">
                        <!-- **woocommerce-billing-fields - Starts** -->                                                   
                        <div class="woocommerce-billing-fields">
                            <p class="form-row form-row-wide" > 
                                <label for="ifirst_name" class="">Mentor Name *</label> 
                                <input type="hidden" class="input-text " name="entity" id="entity" placeholder=""  value="mentor" required="" />          
                                <input type="hidden" class="input-text " name="secrole" id="secrole" placeholder=""  value="<?php echo $_REQUEST['secrole']; ?>"  /> 
                                <input type="text" class="input-text " name="mentor_name" id="mentor_name" placeholder=""  value="<?php if(isset($value['firstName'])) echo $value['firstName'] . " " . $value['lastName']; else echo ""; ?>" required="" >   
                            </p>
                            <p class="form-row form-row-wide" >
                                <label for="ifirst_name" class="">Currently Working at Organization * </label>                                       
                                <select class="input-text " name="working_org" id="working_org" required="" >
                                    <option value="yes" selected="selected">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </p>
                            <div id="corporation">
                                <p class="form-row form-row-wide" > 
                                    <label for="ilast_name" class="">Corporation Currently Working at </label>      
                                    <input type="text" class="input-text " name="organization" id="organization" placeholder=""  value=""  />  
                                </p>
                                <div class="clear"></div>
                                <p class="form-row form-row-wide " >
                                    <label for="i_email" class="">Designation at Corporation *</label>                                                                                              
                                    <select name="role" id="role" class="role " required="" >
                                        <option value="">-- Select --</option>
<?php $role = get_categories(array('parent' => 28, 'hide_empty' => 0)); ?>  
                                        <?php foreach ($role as $roleval) { ?>                                            
                                            <option value="<?php echo $roleval->term_id ?>" ><?php echo $roleval->name ?></option>
                                        <?php } ?>                                        
                                        <option value="other">Other</option>
                                    </select>
                                </p>
                            </div>
                            <p>                            
                            <div id="role_id" style="display:none"> 
                                <input type="text" name="add_role" id="add_role" placeholder="Add role" >   
                            </div>
                            </p>                            

                            <div class="clear"></div>
                        </div>
                        <!-- **woocommerce-billing-fields - Ends** -->                                         
                    </div>
                    <!-- **col-1 - Ends** -->                      <!-- **col-2 - Starts** -->                                         
                    <div class="col-2">
                        <!-- **woocommerce-shipping-fields - Starts** -->                                                
                        <div class="woocommerce-shipping-fields">
                            <!-- **shipping-address - Starts** -->   
                            <p class="form-row form-row-wide" >
                                <label for="ifirst_name" class="">City of Location *</label>                                                                
                                <select name="address" id="address" required="">
                                    <option value="">-- Select --</option>
<?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>   
                                    <?php foreach ($Organizations as $Organizationsval) { ?>                                        
                                        <option value="<?php echo $Organizationsval->term_id ?>" ><?php echo $Organizationsval->name ?></option>
                                    <?php } ?>                                    
                                    <option value="other">Other</option>
                                </select>
                            </p>
                            <p>                            
                            <div id="address_id" style="display:none">   
                                <input type="text" name="add_address" id="add_address" placeholder="Add City Of location" >  
                            </div>
                            </p>  


                            <p class="form-row form-row-wide" id="inst" >
                                <label for="i_email" class="">Alumni of Institute(s) *</label>                                                                                               
                                <select multiple="multiple" placeholder="-- Select --" name="alumni_inst[]" id="alumni_inst" class="alumni_inst SlectBox" required=""  >
<?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>                                    <?php foreach ($Alumni as $Alumnival) { ?>                                        
                                        <option value="<?php echo $Alumnival->term_id ?>" ><?php echo $Alumnival->name ?></option>
                                    <?php } ?>                                    
                                    <option value="other">Other</option>
                                </select>
                            </p>
                            <p>                            
                            <div id="alumni_id" style="display:none">      
                                <input type="text" name="add_alumni" id="add_alumni" placeholder="Add alumni of Institute" >                              </div>
                            </p>                            
                            <div class="clear"></div>

                            <p class="form-row form-row-wide" id="sec" >
                                <label for="ifirst_name" class="">Sectors of Interest to Mentor * </label>                                                                 
                                <select multiple="multiple" placeholder="-- Select --" name="interest_to_mentor[]" id="interest_to_mentor" class="interest_to_mentor SlectBox" required="" >
<?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>                                    <?php foreach ($categories as $cat) { ?>                                        
                                        <option value="<?php echo $cat->term_id ?>" ><?php echo $cat->name ?></option>
                                    <?php } ?>                                    
                                    <option value="other">Other</option>
                                </select>
                            </p>
                            <div id="sector_id" style="display:none">
                                <p class="form-row form-row-wide " >      
                                    <input type="text" class="input-text " name="add_sector" id="add_sector" placeholder="Add sector of intrest"  value="" />                                </p>
                            </div>

                            <p class="form-row form-row-wide " >
                                <label for="upload-logo" class="">Upload Picture (Maximum file upload size 2mb) </label>
                                <input type="file" class="input-text " name="logo" id="file" placeholder=""  value=""  /></p>


                            <div class="clear"></div>
                        </div>
                        <!-- **shipping_address - Ends** -->                                             
                    </div>
                    <!-- **woocommerce-shipping-fields - Ends** -->                                     
                </div>
                <!-- **col-2 - Ends** -->     



                <div class="col2-set" id="customer_details">
                    <h5><b><u>CONTACT DETAILS</u></b></h5>
                    <div class="col-1">
                        <!-- **woocommerce-billing-fields - Starts** -->                                                   
                        <div class="woocommerce-billing-fields">
                            <p class="form-row form-row-wide validate-email" >     
                                <label for="i_email" class="">Email *</label>       
                                <input type="email" class="input-text " name="email" id="email" placeholder=""  value=" <?php echo $value['emailAddress'] ?>" required=""  />
                            </p>
                            <div class="clear"></div>
                            <p class="form-row form-row-wide" >  
                                <label for="i_email" class="">Password *</label>     
                                <input type="password" class="input-text " name="password" id="password" placeholder=""  value=""  required="" />                            </p>
                            <p class="form-row form-row-wide validate-phone" >    
                                <label for="i_phone" class="">Mobile * </label>          
                                <input type="text" class="input-text " name="mobile" id="mobile"  placeholder="Telephone Number(with country code)"  value=""  />                            </p>

                            <p class="form-row form-row-wide validate-phone" >    
                                <label for="i_phone" class="">Companies Associated with as a Mentor  </label>          
                                <input type="text" class="input-text " name="company_associate" id="company_associate"    value=""  />                            </p>



                            <div class="clear"></div>
                        </div>
                        <!-- **woocommerce-billing-fields - Ends** -->                                         
                    </div>
                    <!-- **col-1 - Ends** -->                      <!-- **col-2 - Starts** -->                                         
                    <div class="col-2">
                        <!-- **woocommerce-shipping-fields - Starts** -->                                                
                        <div class="woocommerce-shipping-fields">
                            <!-- **shipping-address - Starts** -->   

                            <p class="form-row form-row-wide" id="exp" >
                                <label for="expertise" class="">Areas of Expertise *</label>                                                                                               
                                <select multiple="multiple" placeholder="-- Select --" name="expertise[]" id="expertise" class="experience SlectBox" required=""  >
<?php $expertise = get_categories(array('parent' => 147, 'hide_empty' => 0)); ?>                                    <?php foreach ($expertise as $expertiseval) { ?>                                        
                                        <option value="<?php echo $expertiseval->term_id ?>" ><?php echo $expertiseval->name ?></option>
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


                            <div class="clear"></div>
                            <p class="form-row form-row-wide" >
                                <label for="year_of_mentor" class="">Years as a Mentor  </label>                                                                                          
                                <select name="year_of_mentor" id="year_of_mentor" class="year_of_mentor"  >
                                    <option value="">-- Select --</option>
                                <?php $year_of_mentor = get_categories(array('parent' => 23, 'hide_empty' => 0)); ?>                                    <?php foreach ($year_of_mentor as $year_of_exp) { ?>                                        
                                        <option value="<?php echo $year_of_exp->term_id ?>" ><?php echo $year_of_exp->name ?></option>
                                    <?php } ?>                                
                                </select>
                            </p>

                            <div class="clear"></div>
                            <p class="form-row form-row-wide " >  
                                <label for="ifirst_name" class="">Twitter Handle </label>   
                                <input type="text" class="input-text " name="twitter" id="twitter" placeholder=""  value="" />  
                            </p>

                            <p class="form-row form-row-wide  " >
                                <label for="business_plan" class="">Captcha*</label>
                        <?php echo $math; ?> = <input name="answer"  id="answer" type="text" />
                                <input name="hidden_answer" id="hidden_answer"  value="<?php echo $_SESSION['answer']; ?>" type="hidden" />
                            </p>

                        </div>
                        <!-- **shipping_address - Ends** -->                                             
                    </div>
                    <!-- **woocommerce-shipping-fields - Ends** -->                                     
                </div>
                <div class="col2-set" id="starup_details">
                    <input type="checkbox" name="policy" id="policy" required="">* &nbsp; I / We agree to the <a href="/privacy-policy/">Privacy Policy</a> & <a href="/terms-conditions/">Terms of Use</a> at IvyCamp.in

                </div>
                <input type="submit"  name="" id="submit_mentor" value="Submit" data-value="Submit" />      
                <div id="error">

                    <div class="clear"></div>

                </div>





        </div> 




        <!-- **col2-set - Ends** -->            </form>        
</div>
<!-- **woocommerce - Ends** -->  
<div class="dt-sc-margin50"></div> 
</section> <!-- **Primary - Ends** -->        
</div> <!-- **container - Ends** -->
<?php get_footer(); ?>
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
            var vsector = $('#sec p.CaptionCont span').text();
            var vexp = $('#exp p.CaptionCont span').text();
            var vinst = $('#inst p.CaptionCont span').text();
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

if (vexp == '-- Select --')
            {
                $('#exp p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#exp p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
            if (vsector == '-- Select --')
            {
                $('#sec p.CaptionCont').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#sec p.CaptionCont').css({"border-color": "", "border-weight": "", "border-style": ""});
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

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
            <h1>Sign up as a Incubator</h1>
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

                    <a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&amp;client_id=75fcybemoqsci1&amp;redirect_uri=http://ivycamp.in/incubator-signup/?subtype=Individual&secrole=mentor&amp;state=987654321&amp;scope=r_basicprofile%20r_emailaddress%20w_share"><img src="<?= get_template_directory_uri(); ?>/images/Sign-In-Small.png" alt="Linkedin" style="  width: 150px;"/> </a>
                    <?php
                    $url = 'https://www.linkedin.com/uas/oauth2/accessToken';
                    $fields = array(
                        'grant_type' => urlencode('authorization_code'),
                        'code' => urlencode($_GET['code']),
                        'redirect_uri' => urlencode('http://ivycamp.in/incubator-signup/?subtype=Individual&secrole=mentor'),
                        'client_id' => urlencode('75fcybemoqsci1'),
                        'client_secret' => urlencode('ABj1SfJUvTH8mCPx')
                    );
                } else {
                    ?>
                    <a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&amp;client_id=75fcybemoqsci1&amp;redirect_uri=http://ivycamp.in/incubator-signup/?subtype=Individual&amp;state=987654321&amp;scope=r_basicprofile%20r_emailaddress%20w_share"><img src="<?= get_template_directory_uri(); ?>/images/Sign-In-Small.png" alt="Linkedin" style="  width: 150px;"/> </a>
                    <?php
                    $url = 'https://www.linkedin.com/uas/oauth2/accessToken';
                    $fields = array(
                        'grant_type' => urlencode('authorization_code'),
                        'code' => urlencode($_GET['code']),
                        'redirect_uri' => urlencode('http://ivycamp.in/incubator-signup/?subtype=Individual'),
                        'client_id' => urlencode('75fcybemoqsci1'),
                        'client_secret' => urlencode('ABj1SfJUvTH8mCPx')
                    );
                }
            } else {
                ?>
                <a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&amp;client_id=75fcybemoqsci1&amp;redirect_uri=http://ivycamp.in/incubator-signup/&amp;state=987654321&amp;scope=r_basicprofile%20r_emailaddress%20w_share"><img src="<?= get_template_directory_uri(); ?>/images/Sign-In-Small.png" alt="Linkedin" style="  width: 150px;"/> </a>
                <?php
                $url = 'https://www.linkedin.com/uas/oauth2/accessToken';
                $fields = array(
                    'grant_type' => urlencode('authorization_code'),
                    'code' => urlencode($_GET['code']),
                    'redirect_uri' => urlencode('http://ivycamp.in/incubator-signup/'),
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
            <form name="checkout" method="post" class="checkout" action="/incubator-save/" enctype="multipart/form-data">

                <!-- **col2-set - Starts** -->    

                <div class="col2-set" id="customer_details">

                    <!-- **col-1 - Starts** -->   
                    <h5><b><u>INCUBATORS DETAILS</u></b></h5>
                    <div class="col-1">

                        <input type="hidden" class="input-text " name="entity" id="entity" placeholder=""  value="incubator"  />
                        <input type="hidden" class="input-text " name="investor_type" id="investor_type" placeholder=""  value="<?php echo $_REQUEST['subtype']; ?>"  />
                        <input type="hidden" class="input-text " name="secrole" id="secrole" placeholder=""  value="<?php echo $_REQUEST['secrole']; ?>" />
                        <!-- **woocommerce-billing-fields - Starts** -->   




                        <p class="form-row form-row-wide " >

                            <label for="ifirst_name" class="">Name of Incubator *</label>

                            <input type="text" class="input-text " name="incubator_name" id="incubator_name" placeholder=""  value="" required="" /></p>



                        <p class="form-row form-row-wide " >

                            <label for="ifirst_name" class="">Website *</label>

                            <input type="text" class="input-text " name="website" id="website" placeholder=""  value="" required="" /></p>
                        <span id="error_website" style="color: red;"></span>
                        <p class="form-row form-row-wide address-field" >

                            <label>Year started * </label>

                            <select class="input-text"  name="year_started" id="year_started"/>
                        <option value="">-- Select --</option>

                        <?php $year_of_mentor = get_categories(array('parent' => 57, 'hide_empty' => 0, 'order' => 'DESC')); ?>

                        <?php foreach ($year_of_mentor as $year_of_exp) { ?>

                            <option value="<?php echo $year_of_exp->term_id ?>" ><?php echo $year_of_exp->name ?></option>

                        <?php } ?>

                        </select>
                        </p>

                        <p class="form-row form-row-wide address-field" >
                            <label> Independant or Associated  (with an institute, corporate etc.) * </label>
                            <input  type="radio" class="input-radio independant_associated" name="independant_associated" value="Independant"  style="display:inline !important;"/> Independant
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" class="input-radio independant_associated" name="independant_associated" value="Associated"  checked="checked"  style="display:inline;"  /> Associated
                        </p>
                        <div id="indec_assoc" >
                            <input  type="radio" class="input-radio associate " name="associate"  value="Institute" checked="checked" style="display:inline !important;"/> Institute  
                            <input  type="radio" class="input-radio associate " name="associate" value="Corporate"  style="display:inline !important;"/> Organization
                            <input  type="radio" class="input-radio associate " name="associate" value="Investment Network"  style="display:inline !important;"/> Investment Network
                            <input  type="radio" class="input-radio associate " name="associate" value="Other"  style="display:inline !important;"/> Other
                        </div>
                        <div  id="institute_div">
                           
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
                        <div id="corporate_div" style="display:none">
                                <label> Corporate / Organization </label>
                                 <select  name="corporate_name" class="corporate_name"  id="corporate_name" >
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
                        <div id="other_div" style="display:none">
                            <input type="text" class="input-text " value="" placeholder="" name="other_associate" id="other_associate"/>
                        </div>

                        <p class="form-row form-row-wide address-field" >
                            <label> Partners </label>
                            <input type="text" class="input-text " value="" placeholder="" name="partners" id="partners"/></p>


                    </div>

                    <div class="col-2">
                        
                          <div class="form-row form-row-wide address-field " >

                            <label for="address" class="">City of Location * </label>

                            <select name="address" id="address" required="">

                                <option value="">-- Select --</option>

                                <?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0, 'order' => 'DESC')); ?>

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
                        <p class="form-row form-row-wide  " >  
                            <label>  Objectives of the Incubation Center * </label>
                            <input type="text" class="input-text " value="" placeholder="" name="incubation_center" id="incubation_center"/>

                        </p>
                        <p class="form-row form-row-wide  " >  
                            <label>  Facilities provided * </label>
                            <input type="text" class="input-text " value="" placeholder="" name="facilities_provided" id="facilities_provided"/>

                        </p>
                        <p class="form-row form-row-wide  " >  
                            <label>  Fees for Incubatees * </label>
                            <input type="text" class="input-text " value="" placeholder="" name="fees_incubatees" id="fees_incubatees"/>

                        </p>
                        <p class="form-row form-row-wide  " >  
                            <label>  Selection Criteria for Incubatees * </label>
                            <input type="text" class="input-text " value="" placeholder="" name="criteria_incubatees" id="criteria_incubatees"/>

                        </p>



                        <div class="form-row form-row-wide address-field " id="sectordiv">	

                            <label for="sector" class="">Sectors to Invest in *</label>



                            <select multiple="multiple" placeholder="-- Select --"  name="sector[]" id="sector" class="sector SlectBox "  required="" >



                                <?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>

                                <?php foreach ($categories as $cats) { ?>

                                    <option value="<?php echo $cats->term_id ?>" ><?php echo $cats->name ?></option>

                                <?php } ?>
                                <option value="other">Other</option>

                            </select>



                        </div>
                        <div id="sector_div" style="display: none;">
                            <input type="text" class="input-text " value="" placeholder="Add sectors to Invest in" name="add_sector" id="add_sector"/> 
                        </div>


                        <p class="form-row form-row-wide  " >  
                            <label>  Incubation Process</label>
                            <input type="text" class="input-text " value="" placeholder="" name="incubation_process" id="incubation_process"/>

                        </p> 



                    </div>





                    <div class="clear"></div>

                    <h5><b><u>CONTACT DETAILS</u></b></h5>	

                    <div class="col-1">


                        <p class="form-row form-row-wide " >

                            <label for="contact-name" class=""> Contact Person Name * </label>

                            <input type="text" class="input-text " name="contact_name" id="contact_name" placeholder=""  value="<?php  if (isset($value['firstName']))
                                echo $value['firstName'] . " " . $value['lastName'];
                            else
                                echo "";
                            ?>" required=""   /></p>







                        <p class="form-row form-row-wide  " >

                            <label for="i_phone" class="">Mobile * </label>

                            <input type="text" class="input-text " name="mobile" id="mobile" placeholder="" min="10" value=""  required=""  /></p>

                        <p class="form-row form-row-wide  " >

                            <label for="i_phone" class="">Landline * </label>

                            <input type="text" class="input-text " name="landline" id="landline" placeholder="" min="10" value=""  required=""  /></p>
                        <div class="clear"></div>





                    </div>

                    <div class="col-2">






                      

                        <p class="form-row form-row-wide  validate-email" >

                            <label for="email" class="">Email *</label>

                            <input type="email" class="input-text " name="email" id="email" placeholder=""  value="<?php echo $value['emailAddress']; ?>" required=""   /></p>



                        <p class="form-row form-row-wide  " >

                            <label for="i_email" class="">Password *</label>

                            <input type="password" class="input-text " name="password" id="password" placeholder=""  value=""  required=""  /></p>



                        <div class="clear"></div>




                    </div> <!-- **woocommerce-billing-fields - Ends** --> 


                    <div class="clear"></div>


                    <h5><b><u>DETAILS ON RESOURCES</u></b></h5>	





                    <div class="col-1">


                        <p class="form-row form-row-wide " >

                            <label for="incubatee_supported" class=""> Time for which Incubatee is Supported in house </label>


                            <select name="incubatee_supported" id="incubatee_supported" >
                                <option value="">-- Select --</option>

                                <?php $incubatee = get_categories(array('parent' => 350, 'hide_empty' => 0, 'order' => 'DESC')); ?>

                                <?php foreach ($incubatee as $incubateeval) { ?>

                                    <option value="<?php echo $incubateeval->term_id ?>" ><?php echo $incubateeval->name ?></option>

                                <?php } ?>

                                <option value="other">Other</option>
                            </select>
                        </p>

                        <div id="support_div" style="display:none">
                            <input type="text" class="input-text " name="support_id" id="support_id" placeholder="Add Time for which incubatee is supported in house"  value=""  />
                        </div>




                        <p class="form-row form-row-wide" id="tooldiv" >

                            <label for="i_phone" class="">Tools Provided </label>
                            <select  multiple="multiple" placeholder="-- Select --"  name="tools_provided[]" id="tools_provided" class="SlectBox" >


                                <?php $tools = get_categories(array('parent' => 344, 'hide_empty' => 0, 'order' => 'DESC')); ?>

                                <?php foreach ($tools as $toolsval) { ?>

                                    <option value="<?php echo $toolsval->term_id ?>" ><?php echo $toolsval->name ?></option>

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



                                <?php $service = get_categories(array('parent' => 50, 'hide_empty' => 0)); ?>
                                 <?php foreach ($service as $serviceval) { 
                                    
                                if($serviceval->term_id == 156) { ?>
                                    <option value="<?php echo $serviceval->term_id ?>" ><?php echo $serviceval->name ?></option>

                                <?php } } ?>
                                <?php foreach ($service as $serviceval) { 
                                    
                                if($serviceval->term_id != 156) { ?>
                                    <option value="<?php echo $serviceval->term_id ?>" ><?php echo $serviceval->name ?></option>

                                <?php } } ?>

                                <option value="other">Other</option>
                            </select></p>

                        <div id="service_div" style="display:none">
                            <input type="text" class="input-text " name="service_id" id="service_id" placeholder="Add Services provided"  value=""   />
                        </div>
                        <p class="form-row form-row-wide  " >

                            <label for="i_email" class="">Funding Provided</label>
                            <select name="funding_provided" id="funding_provided" >

                                <option value="">-- Select --</option>

                                <?php $funding = get_categories(array('parent' => 338, 'hide_empty' => 0,  'orderby'=> 'ID','order' => 'ASC')); ?>
                                <?php foreach ($funding as $fundingval) { 
                                    if($fundingval->term_id == 339) { ?>
                                    <option value="<?php echo $fundingval->term_id ?>" ><?php echo $fundingval->name ?></option>

                                <?php } } ?>
                                <?php foreach ($funding as $fundingval) { 
                                     if($fundingval->term_id != 339) { ?>
                                    <option value="<?php echo $fundingval->term_id ?>" ><?php echo $fundingval->name ?></option>

                                <?php }  } ?>

                                <option value="other">Other</option>
                            </select></p>
                        <div id="funding_div" style="display:none">
                            <input type="text" class="input-text " name="funding_id" id="funding_id" placeholder="Add Funding provided"  value=""    />
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
                            <label for="upload-logo" class="">Upload Logo (Maximum file upload size 2mb) </label>
                            <input type="file" class="input-text " name="logo" id="file" placeholder=""  value=""  /></p>

                        <p class="form-row form-row-wide " >
                            <label for="upload-video" class="">Upload Video </label>
                            <input type="file" class="input-text " name="upload_video" id="upload_video" multiple="multiple" placeholder=""  value=""  /></p>
                    </div>
                    <div class="col-2">	

                        <p class="form-row form-row-wide " >

                            <label for="ifirst_name" class="">Recent article links </label>

                            <input type="text" class="input-text " name="recent_article" id="recent_article" placeholder=""  value="" /></p>

                        <p class="form-row form-row-wide " >

                            <label for="ifirst_name" class="">Sample companies incubated </label>

                            <input type="text" class="input-text " name="sample_comp" id="sample_comp" placeholder=""  value="" /></p>



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
        
        $(".institute_name").change(function () {
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
        
        $(".corporate_name").change(function () {
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
            var website_patterns = /^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
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

            if (website == '' || website == null || !website_patterns.test(website))
            {
                $('#website').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                $('#error_website').text('Please enter valid website url');
                flag++;
            }
            else
            {
                $('#website').css({"border-color": "", "border-weight": "", "border-style": ""});
                $('#error_website').text('');
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
            if (mobile == '' || mobile == null || !numbers.test(mobile))
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
            if (landline == '' || landline == null || isNaN(landline) )
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

<?php get_header(); ?>
<style>    .nextQn,.prevQn{               display: inline-block;        padding: 10px;        width: 75px;        text-align: center;    }    .nextQn{        float: right;    }    p label {        font-size: 20px;    } .prevQn{ display: none; }</style>
<div class="parallax full-width-bg">
    <div class="container">
        <div class="main-title">
            <h1>Questionnaire for Evaluation</h1>
        </div>
    </div>
</div>
<div class="dt-sc-margin50"></div>
<!-- Container starts-->
<div class="container">
    <!-- **primary - Starts** -->
    <section id="primary" class="content-full-width">
        <!-- **woocommerce - Starts** -->
        <div>
            <!-- **checkout - Starts** -->
            <div id="ques_no" style="text-align:right; float:right;"> 1 of 15 </div>
            <form name="checkoutt" method="post" class="checkout" action="/eligible/" enctype="multipart/form-data">
                <!-- 2nd div-->
                <div class="col2-set">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="working_experience" class="qheading">Average number of years of working experience per founding member </label>
                    <ul class="payment_methods methods">
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="working_experience" value="0" checked="checked" data-order_button_text="" />
                            <label >
                                <span></span> Less than 1 year 
                            </label>
                        </li>
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="working_experience" value="1.3"  data-order_button_text="" />
                            <label >
                                <span></span>1 to 5 years 
                            </label>
                        </li>
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="working_experience" value="2.7"  data-order_button_text="" />
                            <label >
                                <span></span> 5  to 10 years
                            </label>
                        </li>
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="working_experience" value="4"  data-order_button_text="" />
                            <label >
                                <span></span>10 to 15 years
                            </label>
                        </li>
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="working_experience" value="2.7"  data-order_button_text="" />
                            <label >
                                <span></span>15 to 20 years
                            </label>
                        </li>
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="working_experience" value="1.3"  data-order_button_text="" />
                            <label >
                                <span></span>20 to 25 years
                            </label>
                        </li>
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="working_experience" value="0"  data-order_button_text="" />
                            <label >
                                <span></span>More than 25 years 
                            </label>
                        </li>
                    </ul>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="2">Next</a>
                </div>
                <!-- 2nd div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="education" class="qheading">Educational background of share holders</label>
                    <ul class="payment_methods methods">
                        <li class="payment_method_cheque">
                            <input  type="checkbox" class="input-radio" name="educationn[]" value="4.2" checked="checked" data-order_button_text="" />
                            <label for="education">
                                <span></span>Shareholding of more than 50% with engineering degree from IITs/ BITS 
                            </label>
                        </li>
                        <li>
                            <input  type="checkbox" class="input-radio" name="educationn[]" value="2.2"  data-order_button_text="" />
                            <label for="education">
                                <span></span>Shareholding of more than 50% with engineering degree not from IITs/ BITS
                            </label>
                        </li>
                        <li>
                            <input  type="checkbox" class="input-radio" name="educationn[]" value="4.2"  data-order_button_text="" />
                            <label for="education">
                                <span></span>Shareholding of more than 50% with management degree from IIMs/ ISB
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" class="input-radio" name="educationn[]" value="2.2"  data-order_button_text="" />
                            <label for="education">
                                <span></span>Shareholding of more than 50% with engineering degree not from IIMs/ ISB
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" class="input-radio" name="educationn[]" value="2.2"  data-order_button_text="" />
                            <label for="education">
                                <span></span>Shareholding of more than 50% with other degrees
                            </label>
                        </li>
                    </ul>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="1">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="3">Next</a>
                </div>
                <!-- 3nd div-->
                <div class="col2-set" style="display: none;">
                    <p class="form-row form-row-wide validate-required" >

                    <h3 class="qheading">Sectors Operated in</h3>

                    <div class="column dt-sc-one-third first">
                        <label for="application" class="subqn"><input type="checkbox" name="sector_operated_in" class="sector_operated_in" value="0"> Technology Business  </label>	
                        <ul class="education-value methods one soi" style="display:none">
                            <li class="payment_method_cheque">
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.5"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Healthcare 
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.25"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Education
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.375"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Food and Agriculture
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.5"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Financial Services
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.25"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Social media
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.25"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>eCommerce
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.375"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Supply Chain Management 
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.25"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Customer Relationship Management
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.5"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Consumer Products
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.5"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Mobile Technology
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.5"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Internet of Things
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.5"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Highly Specialized Technologies
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.375"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Media & Entertainment
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Infrastructure
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Real Estate
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.25"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Business to Business Applications
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.5"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Data Analytics and Management
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="aapplication[]" value="0.125"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Others
                                </label>
                            </li>
                        </ul>

                    </div>

                    <div class="column dt-sc-one-third">
                        <label for="business" class="subqn"><input type="checkbox" name="sector_operated_in" id="sector_operated_in" value="0"> Manufacturing Business   </label>
                        <ul class="education-value methods two soi" style="display:none">
                            <li class="payment_method_cheque">
                                <input  type="checkbox" class="input-radio" name="businesss[]"  value="0.75"  data-order_button_text="" />
                                <label for="business">
                                    <span></span>Healthcare 
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="businesss[]" value="0.45"  data-order_button_text="" />
                                <label for="business">
                                    <span></span>Education
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="businesss[]" value="0.45"  data-order_button_text="" />
                                <label for="business">
                                    <span></span>Food and Agriculture
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="businesss[]" value="0.225"  data-order_button_text="" />
                                <label for="business">
                                    <span></span>Industrial  Products
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="businesss[]" value="0.45"  data-order_button_text="" />
                                <label for="business">
                                    <span></span>Consumer Products
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="businesss[]" value="0.225"  data-order_button_text="" />
                                <label for="business">
                                    <span></span>Real Estate
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="businesss[]" value="0.225"  data-order_button_text="" />
                                <label for="business">
                                    <span></span>Infrastructure
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="businesss[]" value="0.225"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Others
                                </label>
                            </li>
                        </ul>

                    </div>
                    <div class="column dt-sc-one-third">
                        <label for="services" class="subqn"><input type="checkbox" name="sector_operated_in" id="sector_operated_in" value="0"> Services Business  </label>
                        <ul class="education-value methods three soi" style="display:none">
                            <li class="payment_method_cheque">
                                <input  type="checkbox" class="input-radio" name="servicess[]"  value="0"  data-order_button_text="" />
                                <label for="services">
                                    <span></span>Consulting Services
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="servicess[]" value="0.15"  data-order_button_text="" />
                                <label for="services">
                                    <span></span>Highly specialized technologies 
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="servicess[]" value="0.15"  data-order_button_text="" />
                                <label for="services"> <span></span>Healthcare</label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="servicess[]" value="0.15"  data-order_button_text="" />
                                <label for="services">
                                    <span></span>Education
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="servicess[]" value="0.15"  data-order_button_text="" />
                                <label for="services">
                                    <span></span>Food and Agriculture
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="servicess[]" value="0.15"  data-order_button_text="" />
                                <label for="services">
                                    <span></span>Retail Business
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="servicess[]" value="0.15"  data-order_button_text="" />
                                <label for="business">
                                    <span></span>Banking and Financial Services
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="servicess[]" value="0.1"  data-order_button_text="" />
                                <label for="application">
                                    <span></span>Others
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="clr"></div>


                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="2">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="4">Next</a>
                </div>
                <!-- 8 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="services" class="">Stage of the Business </label> (Number of years of Operation)                 

                    <ul class="education-value methods">
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="sobusiness" checked="checked" value="0"  data-order_button_text="" />
                            <label for="services">
                                <span></span>Less than and 1 year
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="sobusiness" value="0.75"  data-order_button_text="" />
                            <label for="services">
                                <span></span>1 to 3 years
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="sobusiness" value="1.05"  data-order_button_text="" />
                            <label for="services">
                                <span></span>3 to 5 years
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="sobusiness" value="1.4"  data-order_button_text="" />
                            <label for="services">
                                <span></span>5 to 7 years
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="sobusiness" value="1.05"  data-order_button_text="" />
                            <label for="services">
                                <span></span>7 to 10 years
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="sobusiness" value="0.75"  data-order_button_text="" />
                            <label for="services">
                                <span></span>10 to 15 years
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="sobusiness" value="0"  data-order_button_text="" />
                            <label for="business">
                                <span></span>More than 15 years
                            </label>
                        </li>
                    </ul>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="3">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="5">Next</a>
                </div>
                <!-- 9 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="services" class="">Average monthly revenue for the last three months                        </label>
                    <ul class="education-value methods">
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="amr" value="0" checked="checked"  data-order_button_text="" />
                            <label for="services">
                                <span></span>Zero
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amr" value="0.24"  data-order_button_text="" />
                            <label for="services">
                                <span></span>Less than 10 lakhs
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amr" value="0.46"  data-order_button_text="" />
                            <label for="services">
                                <span></span>10 lakhs to 50 lakhs
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amr" value="0.69"  data-order_button_text="" />
                            <label for="services">
                                <span></span>50 lakhs to 1 crore
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amr" value="0.96"  data-order_button_text="" />
                            <label for="services">
                                <span></span>1 crore to 2 crore
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amr" value="1.25"  data-order_button_text="" />
                            <label for="services">
                                <span></span>2 crore to 5 crore
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amr" value="1.4"  data-order_button_text="" />
                            <label for="business">
                                <span></span>More than 5 crore
                            </label>
                        </li>
                    </ul>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="4">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="6">Next</a>
                </div>
                <!-- 10 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="services" class="">Average monthly profitability for the last 3 months </label>
                    <ul class="education-value methods">
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="amp" value="0" checked="checked"  data-order_button_text="" />
                            <label for="amp">
                                <span></span>Loss less than 1 crore
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amp" value="0.1"  data-order_button_text="" />
                            <label for="amp">
                                <span></span>Loss between 1 crore and 50 lakhs
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amp" value="0.2"  data-order_button_text="" />
                            <label for="amp">
                                <span></span>Loss between 50 lakhs and  10 lakhs
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amp" value="0.3"  data-order_button_text="" />
                            <label for="amp">
                                <span></span>Loss between 10 lakhs and Zero
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="business" value="0.4"  data-order_button_text="" />
                            <label for="amp">
                                <span></span>Profit between Zero and  10 lakhs
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amp" value="0.5"  data-order_button_text="" />
                            <label for="amp">
                                <span></span>Profit between 10 lakhs and 50 lakhs
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amp" value="0.6"  data-order_button_text="" />
                            <label for="amp">
                                <span></span>Profit between 50 lakhs and  1 crore
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amp" value="0.7"  data-order_button_text="" />
                            <label for="amp">
                                <span></span>Profit more than 1 crore 
                            </label>
                        </li>
                    </ul>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="5">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="7">Next</a>
                </div>
                <!-- 11 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="services" class="">Average monthly growth rate of net revenue to the company for the last three months</label>
                    <ul class="education-value methods">
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="amg" value="0" checked="checked"  data-order_button_text="" />
                            <label for="amg">
                                <span></span>Less than Zero
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amg" value="0.17"  data-order_button_text="" />
                            <label for="amg">
                                <span></span>  Zero to 5%
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amg" value="0.33"  data-order_button_text="" />
                            <label for="amg">
                                <span></span>5% to 10%
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amg" value="0.51"  data-order_button_text="" />
                            <label for="amg">
                                <span></span> 10% to 15%
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amg" value="0.68"  data-order_button_text="" />
                            <label for="amg">
                                <span></span>15% to 20%
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amg" value="0.82"  data-order_button_text="" />
                            <label for="amg">
                                <span></span> 20% to 25%
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amg" value="1"  data-order_button_text="" />
                            <label for="amg">
                                <span></span> 25% to 30%
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amg" value="1.15"  data-order_button_text="" />
                            <label for="amg">
                                <span></span>30% to 50%
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="amg" value="1.34"  data-order_button_text="" />
                            <label for="amg">
                                <span></span> More than 50%
                            </label>
                        </li>
                    </ul>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="6">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="8">Next</a>
                </div>
                <!-- 12 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                    <h3 class="qheading">Cumulative funds raised by the company so far</h3>
                    <div class="column dt-sc-one-half first">
                        <label for="overall" class="subqn">Overall including promoters' money</label>
                        <ul class="education-value methods">
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="overall" value="0.21" checked="checked"  data-order_button_text="" />
                                <label for="overall">
                                    <span></span>Zero
                                </label>
                            </li>
                            <li>
                                <input  type="radio" class="input-radio" name="overall" value="0.84"  data-order_button_text="" />
                                <label for="overall">
                                    <span></span>  Zero to 1 crore
                                </label>
                            </li>
                            <li>
                                <input  type="radio" class="input-radio" name="overall" value="1.25"  data-order_button_text="" />
                                <label for="overall">
                                    <span></span>  1 crore to 5 crore
                                </label>
                            </li>
                            <li>
                                <input  type="radio" class="input-radio" name="overall" value="0.84"  data-order_button_text="" />
                                <label for="overall">
                                    <span></span>  5 crore to 10 crore
                                </label>
                            </li>
                            <li>
                                <input  type="radio" class="input-radio" name="overall" value="0.42"  data-order_button_text="" />
                                <label for="overall">
                                    <span></span> 10 crore to 20 crore
                                </label>
                            </li>
                            <li>
                                <input  type="radio" class="input-radio" name="overall" value="0.21"  data-order_button_text="" />
                                <label for="overall">
                                    <span></span> 20 crore to 30 crore
                                </label>
                            </li>
                            <li>
                                <input  type="radio" class="input-radio" name="overall" value="0"  data-order_button_text="" />
                                <label for="overall">
                                    <span></span> More 30 crore
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="column dt-sc-one-half">
                        <label for="promoters" class="subqn">From the promoters </label>
                        <ul class="education-value methods">
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="promoters" value="0" checked="checked"  data-order_button_text="" />
                                <label for="promoters">
                                    <span></span>Zero
                                </label>
                            </li>
                            <li>
                                <input  type="radio" class="input-radio" name="promoters" value="0.21"  data-order_button_text="" />
                                <label for="promoters">
                                    <span></span>  Zero to  25%
                                </label>
                            </li>
                            <li>
                                <input  type="radio" class="input-radio" name="promoters" value="0.42"  data-order_button_text="" />
                                <label for="promoters">
                                    <span></span>  25% to 50%
                                </label>
                            </li>
                            <li>
                                <input  type="radio" class="input-radio" name="promoters" value="0.63"  data-order_button_text="" />
                                <label for="promoters">
                                    <span></span>  50% to 75%
                                </label>
                            </li>
                            <li>
                                <input  type="radio" class="input-radio" name="promoters" value="0.84"  data-order_button_text="" />
                                <label for="promoters">
                                    <span></span> More than 75%
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="clr"></div>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="7">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="9">Next</a>
                </div>
                <!-- 14 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="fund" class="qheading">Source of funds so far </label>
                    <ul class="education-value methods">
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="fund" value="1"  checked="checked"  data-order_button_text="" />
                            <label for="fund"><span></span>Promoters</label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="fund" value="0.67"  data-order_button_text="" />
                            <label for="fund">
                                <span></span>Friends and Family
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="fund" value="1"  data-order_button_text="" />
                            <label for="fund">
                                <span></span> Organized Angel Investors
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="fund" value="1.33"  data-order_button_text="" />
                            <label for="fund">
                                <span></span> VC Funds
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="fund" value="0"  data-order_button_text="" />
                            <label for="fund">
                                <span></span> PE Funds
                            </label>
                        </li>
                    </ul>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="8">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="10">Next</a>
                </div>
                <!-- 15 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="competition" class="qheading">Competition</label>


                    <div class="column dt-sc-one-third first">
                        <div class="subqn"><label for=compt><input type="radio" value="0" name="compt" /> There is no competition</label></div>
                        <ul class="education-value methods" style="display: none;">
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="competition[]" value="3.7"  data-order_button_text="" />
                                <label for="competition">
                                    <span></span>First of its kind business concept - never done before
                                </label>
                                <input type="text" placeholder="Kindly Elaborate" />
                            </li>
                        </ul>
                    </div>

                    <div class="column dt-sc-one-third">
                        <div class="subqn"><label for=compt><input type="radio" value="0" name="compt" /> There are at the most 5 more players in the market</label></div>
                        <ul class="education-value methods" style="display: none;">
                            <li>
                                <input  type="checkbox" class="input-radio" name="competition[]" value="0.9"  data-order_button_text="" />
                                <label for="mpim">
                                    <span></span>Done before but first time in our target market                            
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="competition[]" value="0.9"  data-order_button_text="" />
                                <label for="mpim">
                                    <span></span> Done before but we have different products in the same market
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="competition[]" value="0.9"  data-order_button_text="" />
                                <label for="mpim">
                                    <span></span> Different features on products as compared to competition
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="competition[]" value="0.9"  data-order_button_text="" />
                                <label for="mpim">
                                    <span></span> Others
                                </label>
                            </li>												 
                        </ul>
                    </div>
                    <div class="column dt-sc-one-third">
                        <div class="subqn"><label for=compt><input type="radio" value="0" name="compt" /> There are at least 5 more players in the market</label></div>
                        <ul class="education-value methods" style="display: none;">
                            <li>
                                <input  type="checkbox" class="input-radio" name="competition[]" value="0.6"  data-order_button_text="" />
                                <label for="lpim">
                                    <span></span> But we compete on price and quality
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="competition[]" value="0.6"  data-order_button_text="" />
                                <label for="lpim">
                                    <span></span> But we building faster traction
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="competition[]" value="0.6"  data-order_button_text="" />
                                <label for="lpim">
                                    <span></span> But we have a differentiation in our execution model
                                </label>
                            </li>
                            <li>
                                <input  type="checkbox" class="input-radio" name="competition[]" value="0.6"  data-order_button_text="" />
                                <label for="lpim">
                                    <span></span> Others
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="clr"></div>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="9">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="11">Next</a>
                </div>
                <!-- 16 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="competition" class="qheading">Industry size and growth (Growth rate in India over the next three years)</label>

                    <div class="column dt-sc-one-fourth first">
                        <div class="subqn">Potential size of the target market in India</div>
                        <ul class="education-value methods">

                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="sizei" value="0"  checked="checked" data-order_button_text="" />
                                <label for="sizei">
                                    <span></span>Less than 100 mn USD
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="sizei" value="0.18"  data-order_button_text="" />
                                <label for="sizei">
                                    <span></span> 100 mn USD and 500 mn USD
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="sizei" value="0.36"  data-order_button_text="" />
                                <label for="sizei">
                                    <span></span> 500 mn USD and 1 bn USD
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="sizei" value="0.72"  data-order_button_text="" />
                                <label for="sizei">
                                    <span></span> More than 1 bn USD
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="column dt-sc-one-fourth">
                        <div class="subqn">Potential size of the target market in the world</div>
                        <ul class="education-value methods">
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="sizew" value="0" checked="checked"  data-order_button_text="" />
                                <label for="sizew">
                                    <span></span>Less than 100 mn USD
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="sizew" value="0.18"  data-order_button_text="" />
                                <label for="sizew">
                                    <span></span>100 mn USD and 500 mn USD
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="sizew" value="0.36"  data-order_button_text="" />
                                <label for="sizew">
                                    <span></span>500 mn USD and  1 bn USD
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="sizew" value="0.72"  data-order_button_text="" />
                                <label for="sizew">
                                    <span></span> More than 1 bn USD
                                </label>
                            </li>	
                        </ul>
                    </div>

                    <div class="column dt-sc-one-fourth">
                        <div class="subqn">Expected annual growth rate of the target market in India</div>
                        <ul class="education-value methods">
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="growthi" value="0"  checked="checked" data-order_button_text="" />
                                <label for="growthi">
                                    <span></span>Less than 10%
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="growthi" value="0.18"  data-order_button_text="" />
                                <label for="growthi">
                                    <span></span> 10% and  25%
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="growthi" value="0.36"  data-order_button_text="" />
                                <label for="growthi">
                                    <span></span>25% and  50%
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="growthi" value="0.72"  data-order_button_text="" />
                                <label for="growthi">
                                    <span></span>More than 50%
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="column dt-sc-one-fourth">
                        <div class="subqn">Annual growth rate of the target market in the world</div>
                        <ul class="education-value methods">
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="growthw" value="0"  checked="checked" data-order_button_text="" />
                                <label for="growthw">
                                    <span></span>Less than 10%
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="growthw" value="0.18"  data-order_button_text="" />
                                <label for="growthw">
                                    <span></span> 10% and  25%
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="growthw" value="0.36"  data-order_button_text="" />
                                <label for="growthw">
                                    <span></span> 25% and  50%
                                </label>
                            </li>
                            <li class="payment_method_cheque">
                                <input  type="radio" class="input-radio" name="growthw" value="0.72"  data-order_button_text="" />
                                <label for="growthw">
                                    <span></span>More than 50%
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="clr"></div>

                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="10">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="12">Next</a>
                </div>
                <!-- 17 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="innovation" class="">Innovation (On a scale of 1 to 10 how innovative is your business concept. 10 being extremely innovative and first of its kind) </label>
                    <ul class="education-value methods">
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="innovation" value="0"  checked="checked"  data-order_button_text="" />
                            <label for="innovation">
                                <span></span> 0 to 3 
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="innovation" value="0.5"  data-order_button_text="" />
                            <label for="innovation">
                                <span></span> 4 to 6 
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="innovation" value="1"  data-order_button_text="" />
                            <label for="innovation">
                                <span></span> 7 to 9 
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="innovation" value="1.5"  data-order_button_text="" />
                            <label for="innovation">
                                <span></span> 10
                            </label>
                        </li>
                    </ul>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="11">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="13">Next</a>
                </div>
                <!-- 18 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="innovation" class="">Amount of funding required from external sources at this stage </label>
                    <ul class="education-value methods">
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="fundingreq" value="AA"  checked="checked" data-order_button_text="" />
                            <label for="innovation">
                                <span></span>Less than 50 lakhs 
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="fundingreq" value="BB"  data-order_button_text="" />
                            <label for="innovation">
                                <span></span>  50 lakhs to  1 crore
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="fundingreq" value="CC"  data-order_button_text="" />
                            <label for="innovation">
                                <span></span>  1 crore to 5 crore
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="fundingreq" value="DD"  data-order_button_text="" />
                            <label for="innovation">
                                <span></span>  5 crore to 10 crore
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="fundingreq" value="EE"  data-order_button_text="" />
                            <label for="innovation">
                                <span></span> 10 crore to 20 crore
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="fundingreq" value="FF"  data-order_button_text="" />
                            <label for="innovation">
                                <span></span> 20 crore to 30 crores
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="fundingreq" value="GG"  data-order_button_text="" />
                            <label for="innovation">
                                <span></span> More than 30 crore
                            </label>
                        </li>
                    </ul>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="12">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="14">Next</a>
                </div>
                <!-- 19 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="investment" class="">Investment by existing investors in this round </label>
                    <ul class="education-value methods">
                        <li class="payment_method_cheque">
                            <input  type="radio" class="input-radio" name="investment" value="0"  checked="checked" data-order_button_text="" />
                            <label for="investment">
                                <span></span> None 
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="investment" value="2"  data-order_button_text="" />
                            <label for="investment">
                                <span></span> Will maintain proportionate shareholding 
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="investment" value="1"  data-order_button_text="" />
                            <label for="investment">
                                <span></span> Will invest some amount but not enough to maintain existing shareholding 
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="investment" value="1"  data-order_button_text="" />
                            <label for="investment">
                                <span></span> Amount of investments in percentage of round size
                            </label>
                        </li>
                        <li>
                            <input  type="radio" class="input-radio" name="investment" value="1"  data-order_button_text="" />
                            <label for="investment">
                                <span></span> Amount of investments by other investors
                                in this round
                            </label>
                        </li>
                    </ul>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="13">Previous</a>
                    <a href="javascript:void();" class="nextQn dt-sc-button" data-next ="15">Next</a>
                </div>
                <!-- 20 div-->
                <div class="col2-set" style="display:none;">
                    <p class="form-row form-row-wide validate-required" >
                        <label for="funding" class="">Use of funding </label>
                    <ul class="education-value methods">
                        <li class="payment_method_cheque">
                            <input  type="checkbox" class="input-radio" name="funding[]" value="1.67"  data-order_button_text="" />
                            <label for="funding">
                                <span></span> Marketing / Customer acquisition 
                            </label>
                        </li>
                        <li>
                            <input  type="checkbox" class="input-radio" name="funding[]" value="0.83"  data-order_button_text="" />
                            <label for="funding">
                                <span></span> Working capital 
                            </label>
                        </li>
                        <li>
                            <input  type="checkbox" class="input-radio" name="funding[]" value="0.42"  data-order_button_text="" />
                            <label for="funding">
                                <span></span> Capital expenditure in equipment 
                            </label>
                        </li>
                        <li>
                            <input  type="checkbox" class="input-radio" name="funding[]" value="0"  data-order_button_text="" />
                            <label for="funding">
                                <span></span> Capital expenditure in infrastructure 
                            </label>
                        </li>
                        <li>
                            <input  type="checkbox" class="input-radio" name="funding[]" value="0"  data-order_button_text="" />
                            <label for="funding">
                                <span></span> Acquisition of another company/ business asset
                            </label>
                        </li>
                        <li>
                            <input  type="checkbox" class="input-radio" name="funding[]" value="1.25"  data-order_button_text="" />
                            <label for="funding">
                                <span></span> Product development
                            </label>
                        </li>
                        <li>
                            <input  type="checkbox" class="input-radio" name="funding[]" value="0.83"  data-order_button_text="" />
                            <label for="funding">
                                <span></span>Team building 
                            </label>
                        </li>
                    </ul>
                    <a href="javascript:void();" class="prevQn dt-sc-button" data-previous ="16">Previous</a>
                    <input type="submit"  name="" id="subbbb" value="Submit" data-value="Submit" />
                </div>
                <div class="clear"></div>
            </form>
        </div>
        <!-- **woocommerce - Ends** -->
        <div class="dt-sc-margin50"></div>
    </section>
    <!-- **Primary - Ends** -->
</div>
<!-- **container - Ends** -->
<?php get_footer(); ?>
<script>    var $ = jQuery;
    $(document).ready(function () {
        $(".nextQn").click(function () {
            $(this).parent().hide();
            $("body").scrollTop(300);
            $(this).parent().next().show();
            var next = $(this).attr('data-next');
            // alert($(this).attr('data-next'));
            $('#ques_no').text(next + ' Of 15')

        });
        $(".prevQn").click(function () {
            $(this).parent().hide();
            $("body").scrollTop(300);
            $(this).parent().prev().show();
            var previous = $(this).attr('data-previous');
            // alert($(this).attr('data-previous'));
            $('#ques_no').text(previous + ' Of 15')
        });
        $("[name='sector_operated_in']").click(function () {
            if ($(this).is(':checked')) {
                $(this).parent().siblings().show();
            } else {
                $(this).parent().siblings().hide();
            }
        });

        $("[name='compt']").click(function () {
            $("[name='compt']").parent().parent().siblings().hide();
            $(this).parent().parent().siblings().show();
        });

        $(".soi label:contains('Others')").siblings().click(function () {
            if ($(this).is(':checked')) {
                $(this).parent().append("<input type='text' name='oth' value='' placeholder='Kindly Elaborate' />");
            } else {
                $(this).parent().children("[name='oth']").remove();
            }
        });


        $("[name='compt']").parent().parent().siblings().find("label:contains('Others')").siblings().click(function () {
            if ($(this).is(':checked')) {
                $(this).parent().append("<input type='text' name='oth' value='' placeholder='Kindly Elaborate' />");
            } else {
                $(this).parent().children("[name='oth']").remove();
            }
        });


        $("[name='funding[]']").click(function () {
            if ($(this).is(':checked')) {
                $(this).parent().append("<select name='percnt[]'><option>0%</option><option>10%</option><option>20%</option><option>30%</option><option>40%</option><option>50%</option><option>60%</option><option>70%</option><option>80%</option><option>90%</option><option>100%</option></select>");
            } else {
                $(this).parent().children("[name='percnt[]']").remove();
            }
        });


        $("#subbbb").click(function (e) {
            e.preventDefault();
            var e = 0;

            $("[name='percnt[]']").each(function () {
                e += parseInt($(this).val());

            });

            if (e <= 100) {
                $("form[name='checkoutt']").submit();
            } else {
                alert("Allocation cannot be more than 100%");
                return false;
            }

        });


    });
</script>
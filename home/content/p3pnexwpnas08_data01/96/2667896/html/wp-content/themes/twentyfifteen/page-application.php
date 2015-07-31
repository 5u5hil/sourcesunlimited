<?php get_header();
?>
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

            <!-- **checkout - Starts** -->
            
            <form name="checkout" method="post" class="checkout" action="/application-save/" >
                <!-- **col2-set - Starts** -->    
                <div class="col2-set" id="customer_details">
                    <!-- **col-1 - Starts** -->   
                    <div class="col-1">
                         
                        <!-- **woocommerce-billing-fields - Starts** -->   
                        <div class="woocommerce-billing-fields"> 
                          <p class="form-row form-row-wide validate-required" >
                                <label for="ifirst_name" class="">Name of applicant *</label>
                                <input type="hidden" class="input-text " name="entity" value="Think Tank" >
                                <input type="text" class="input-text " name="applicant_name" id="applicant_name" placeholder=""  value="" required="" /></p>

                            
                            <p class="form-row form-row-wide validate-required" >
                                <label for="ifirst_name" class="">Mobile number  *</label>
                                <input type="text" class="input-text " name="mobile" id="mobile" placeholder=""  value="" required="" /></p>

                            <div class="clear"></div>

                            
                             <p class="form-row form-row-wide address-field validate-required" >
                                <label for="address" class="">City of location * </label>
                                <select name="address" id="address" required="">
                                    <option value="">-- Select --</option>
                                    <?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>
                                    <?php foreach ($Organizations as $Organizationsval) { ?>
                                        <option value="<?php echo $Organizationsval->term_id ?>" ><?php echo $Organizationsval->name ?></option>
                                    <?php } ?>
                                    <option value="other">Other</option>
                                </select>
                             </p>
                             
                             <div id="address_id" style="display: none">
                                <p class="form-row form-row-wide validate-required" > 
                                <input type="text" class="input-text " name="add_address" id="add_address" placeholder="Add City of location"    /> 
                                </p>
                            </div>

                             
                            <div class="clear"></div>


                        </div> <!-- **woocommerce-billing-fields - Ends** --> 
                    </div> <!-- **col-1 - Ends** -->  
                    <!-- **col-2 - Starts** --> 
                    <div class="col-2">
                        <!-- **woocommerce-shipping-fields - Starts** -->
                        <div class="woocommerce-shipping-fields">


                            <!-- **shipping-address - Starts** -->
                             
                            <div class="shipping_address">

                                 <p class="form-row form-row-wide validate-required" >
                                <label for="Alumni" class="">Institute * </label>
                                <select name="alumni_inst" id="alumni_inst" class="alumni_inst  validate-required" required=""  >
                                    <option value="">-- Select --</option>
                                    <?php $Alumni= get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>
                                           <?php  foreach($Alumni as $Alumnival) {?>
                                            <option value="<?php echo $Alumnival->term_id ?>" ><?php  echo $Alumnival->name ?></option>
                                           <?php }?>
                                            <option value="other">Other</option>
                                </select></p>
                                
                                 <div id="alumni_id" style="display: none">
                                <p class="form-row form-row-wide validate-required" > 
                                <input type="text" class="input-text " name="add_alumni" id="add_alumni" placeholder="Add Institution"    /> 
                                </p>
                            </div>

                                <p class="form-row form-row-wide address-field validate-required" >
                                    <label for="think_tank" class="">Why would you add value by being part of the think tank? Answer in 200 characters or less</label>
                                    <input type="text" class="input-text " name="think_tank" id="think_tank" placeholder=""  maxlength="200"  value=""  required="" />
                                </p>
                                
                                
                                
                                <div class="form-row form-row-wide address-field validate-required">		
                                    <label>Share an idea you have on how  platform like ivycamp can grow and foster innovation/entrepreneurship on your campus (200 char)</label>
                                    <div class="selection-box">
                                        <input type="text" name="campus" id="campus" maxlength="200" class="year_of_invester  validate-required">
                                    
                             
                                    </div>
                                </div>

                                <p class="form-row form-row-wide address-field validate-required" >
                                    <label for="average" class="">How many hours on average can you commit to IvyCamp per month – select from dropdown (less than 2, 2-4, 5-10)</label>
                                    <select class="input-text " name="average" id="average" >
                                        <option value="less than 2">less than 2</option>
                                        <option value="2-4">2-4</option>
                                         <option value="5-10">5-10</option>
                                    </select>
                                        
                                </p>


                                    <div class="clear"></div>

                                </div>
                                <input type="submit"  name="" id="" value="Submit" data-value="Submit" />

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
 $("#address").live('change',function () {

            if ($(this).val() == "other")
            {
                $('#address_id').show()
                $('#add_address').prop('required',true);
               // $("input").$("input").prop('required',true);
            }
            else
            {
                $('#address_id').hide();
                $('#add_address').prop('required',false);
            }
        });
        
       
        
        $("#alumni_inst").live('change',function () {

            if ($(this).val() == "other")
            {
                $('#alumni_id').show()
                $('#add_alumni').prop('required',true);
               // $("input").$("input").prop('required',true);
            }
            else
            {
                $('#alumni_id').hide();
                $('#add_alumni').prop('required',false);
            }
        });
    });
</script>
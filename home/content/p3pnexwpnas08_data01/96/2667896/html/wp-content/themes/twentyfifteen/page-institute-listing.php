<?php
get_header();
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="http://ivycamp.cruxservers.in/wp-content/themes/twentyfifteen/js/jquery.sumoselect.min.js"></script>
<link href="http://ivycamp.cruxservers.in/wp-content/themes/twentyfifteen/css/sumoselect.css" rel="stylesheet" />

<script>
  // $ = jQuery;
    jQuery(document).ready(function () {
        window.asd = jQuery('.SlectBox').SumoSelect({csvDispCount: 3});

    });
</script>
<div class="parallax full-width-bg lr_widget">

    <div class="container">

        <div class="main-title">

            <div class="column dt-sc-three-fifth first">

                <h1>Institute Listing</h1>

            </div>



        </div>

    </div>

</div>

<div class="dt-sc-margin30"></div>

<div class="container">

    <!-- Primary Starts -->

    <section id="primary" class="content-full-width">

        <h3>Institute that you might be interested in</h3>

        <div class="sorting-container dt-sc-hr-invisible-small filter">

            <form>

                <div class="column dt-sc-one-sixth first">

                    <div class="form-row form-row-wide address-field validate-required">		

                        <label>Alumni of</label>

                    

                            <select  multiple="multiple" placeholder="-- Select --"  name="alumni[]" class="country_to_state SlectBox country_select">

                              

                                <?php $Alumni = get_categories(array('parent' => 18, 'hide_empty' => 0)); ?>

                                <?php foreach ($Alumni as $Alumnival) { ?>

                                    <option value="<?php echo $Alumnival->term_id ?>" ><?php echo $Alumnival->name ?></option>

                                <?php } ?>



                            </select>

                     

                    </div>



                </div>



                <div class="column dt-sc-one-sixth">

                    <div class="form-row form-row-wide address-field validate-required">		

                        <label>Position at Institute</label>

                      

                           <select multiple="multiple" placeholder="-- Select --" name="pos[]" id="position" class="position SlectBox validate-required"  >
                               
                                    <option value=""> -- Select -- </option>
                                    
                                    <?php $position = get_categories(array('parent' => 45, 'hide_empty' => 0)); ?>
                                    
                                    <?php foreach ($position as $positionval) { ?>
                                    
                                        <option value="<?php echo $positionval->term_id ?>" ><?php echo $positionval->name ?></option>
                                        
                                    <?php } ?>
                                  
                                </select>

                    

                    </div>



                </div>



                <div class="column dt-sc-one-sixth">

                    <div class="form-row form-row-wide address-field validate-required">		

                        <label>City </label>

                       

                            <select name="city" class="country_to_state country_select">
                                <option value="">select</option>

                                <?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>

                                <?php foreach ($Organizations as $Organizationsval) { ?>

                                    <option value="<?php echo $Organizationsval->term_id ?>" ><?php echo $Organizationsval->name ?></option>

                                <?php } ?>



                            </select>

                       

                    </div>



                </div>


                <div class="column dt-sc-one-sixth">

                    <label style="width:100%">&nbsp;</label>

                    <input type="submit" name="" id="" value="Submit" data-value="Submit" style="width:100%;">

                </div>





            </form>

        </div>

        <div class="dt-sc-margin10"></div>

        <!-- **portfolio-container - Starts** -->

        <div class="portfolio-container">

            <?php
            $cats = array();

            if (isset($_GET['pos'])) {

                 $cats = array_merge($cats, $_GET['pos']);
            }



            if (isset($_GET['alumni'])) {

               $cats = array_merge($cats, $_GET['alumni']);
            }


            if (isset($_GET['city'])) {

                array_push($cats, $_GET['city']);
            }


         





            $args = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => 'institute', 'category__and' => array_filter($cats));


            $the_query = new WP_Query($args);



            if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
                    ?>


                    <div class="portfolio dt-sc-one-fifth column with-space all-sort revenue institute-name industry">

                        <!-- **portfolio-thumb - Starts** -->

                        <div class="portfolio-thumb">

                            <?php
                            if (has_post_thumbnail()) {

                                the_post_thumbnail();
                            } else {

                                $img = wp_get_attachment_image_src(413);

                                echo "<img src='" . $img[0] . "' />";
                            }
                            ?>

                        </div> <!-- **portfolio-thumb - Ends** -->

                        <!-- **portfolio-detail - Starts** -->
 <div class="portfolio-detail" onclick="window.location.href = '<?= the_permalink(); ?>?id=post_details'">

 <div class="views">
                                <h5 class="prname"><a href="<?= the_permalink(); ?>"><?= get_the_category_by_ID(get_post_meta(get_the_ID(), 'Alumni of Institute', true)); ?></a></h5>
                                <span>City of Location: <?= get_the_category_by_ID(get_post_meta(get_the_ID(), 'City Of location', true));?> </span>
                            </div>

<!--                            <div class="portfolio-title">

                              

                                <p><strong>Position at Institute: </strong><br>
                                <?php // get_the_category_by_ID(get_post_meta(get_the_ID(), 'Position', true)); ?></p>

                            </div>-->

                        </div> <!-- **portfolio-detail - Ends** -->

                    </div>

                    <?php
                endwhile;

            endif;

            wp_reset_postdata();
            ?> 

















        </div> <!-- **portfolio-container - Ends** -->

        <div class="dt-sc-margin50"></div>

    </section>



</div>

<div class="dt-sc-hr-invisible"></div>		 <!-- **container - Ends** --> 

<?php get_footer(); ?>


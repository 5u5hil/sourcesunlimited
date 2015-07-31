<?php
//

if($_GET)
{
 $cats = array();

            if (isset($_GET['sector'])) {

                $cats = array_merge($cats, $_GET['sector']);
            }



            if (isset($_GET['years_in'])) {

                array_push($cats, $_GET['years_in']);
            }

            if (isset($_GET['city'])) {

                array_push($cats, $_GET['city']);
            }

}
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

                <h1>Incubators Listing</h1>

            </div>



        </div>

    </div>

</div>

<div class="dt-sc-margin30"></div>

<div class="container">

    <!-- Primary Starts -->

    <section id="primary" class="content-full-width">

        <h3>Incubators that you might be interested in</h3>

        <div class="sorting-container dt-sc-hr-invisible-small filter">

            <form>



                <div class="column dt-sc-one-sixth">

                    <div class="form-row form-row-wide address-field validate-required">		

                        <label>Sectors</label>

                       

                            <select multiple="multiple" placeholder="-- Select --" name="sector[]" id="sector" class="SlectBox ">

                                <option value="">-- Select --</option>

                                <?php $categories = get_categories(array('parent' => 1, 'hide_empty' => 0)); ?>

                                <?php foreach ($categories as $cat) { ?>

                                    <option value="<?php echo $cat->term_id ?>" ><?php echo $cat->name ?></option>

                                <?php } ?>



                            </select>

                       

                    </div>



                </div>



                <div class="column dt-sc-one-sixth">

                    <div class="form-row form-row-wide address-field validate-required">		

                        <label>City </label>

                       

                            <select name="city" class="country_to_state country_select">

                                <option value="">-- Select --</option>

                                <?php $Organizations = get_categories(array('parent' => 34, 'hide_empty' => 0)); ?>

                                <?php foreach ($Organizations as $Organizationsval) { ?>

                                    <option value="<?php echo $Organizationsval->term_id ?>" ><?php echo $Organizationsval->name ?></option>

                                <?php } ?>



                            </select>

                       

                    </div>



                </div>



                <div class="column dt-sc-one-sixth">

                    <div class="form-row form-row-wide address-field validate-required">		

                        <label>Year Started </label>

                       

                            <select name="years_in" class="country_to_state country_select">

                                <option value="">-- Select --</option>

                                <?php $year_of_mentor = get_categories(array('parent' => 57, 'hide_empty' => 0, 'order' => 'DESC')); ?>

                                <?php foreach ($year_of_mentor as $year_of_exp) { ?>

                                    <option value="<?php echo $year_of_exp->term_id ?>" ><?php echo $year_of_exp->name ?></option>

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
           





            $args = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => 'incubator', 'category__and' => array_filter($cats));


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

                                $img = wp_get_attachment_image_src(414);

                                echo "<img src='" . $img[0] . "' />";
                            }
                            ?>

                        </div> <!-- **portfolio-thumb - Ends** -->

                        <!-- **portfolio-detail - Starts** -->

                       <div class="portfolio-detail" onclick="window.location.href = '<?= the_permalink(); ?>?id=post_details'">

                                <div class="views">
                                    <h5 class="prname"><a href="<?= the_permalink(); ?>?id=post_details"><?= the_title(); ?></a></h5>

                                    <?php /* if ((get_post_meta(get_the_ID(), 'Funding Amount', true)) != "") { ?>
                                        <span>Avg. Investment Size: <?= get_post_meta(get_the_ID(), 'Funding Amount', true); ?>  </span>
                                    <?php } else {
                                        
                                    } */?>

            <?php if ((get_post_meta(get_the_ID(), 'Address', true)) != "") { ?>
                                        <span>City of Location: <?= get_the_category_by_ID(get_post_meta(get_the_ID(), 'Address', true)); ?>  </span>
            <?php } else {
                
            } ?> 

                                </div>

                                <div class="portfolio-title">

                                    <strong><?php if(get_post_meta(get_the_ID(), 'Independant or Associated', true) == 'Associated') { echo "Associated With: ";   
                                  
                                    } else { echo "Independent Incubator";}?></strong><br/>
                                    <p><?php if(get_post_meta(get_the_ID(), 'Independant or Associated', true) == 'Associated') {  if(get_post_meta(get_the_ID(), 'Institute Name', true))  { echo 'Institute - ';  foreach (explode(",", get_post_meta(get_the_ID(), 'Institute Name', true)) as $idd) { ?>
                                   <?= get_the_category_by_ID($idd); ?>
            <?php } } elseif(get_post_meta(get_the_ID(), 'Corporate', true)) { echo 'Organization - '; echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Corporate', true)); }
            elseif(get_post_meta(get_the_ID(), 'Investment Network', true)) { echo 'Investment Network - '; echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Investment Network', true)); }
                                    elseif(get_post_meta(get_the_ID(), 'Other associate', true)) { echo 'Other - '; echo (get_post_meta(get_the_ID(), 'Other associate', true)); } else { echo "Not Avail.";} } ?></p>
                                    <strong>Sectors:</strong><br/>
            <?php 
            if(get_post_meta(get_the_ID(), 'Sector', true)){
            foreach (explode(",", get_post_meta(get_the_ID(), 'Sector', true)) as $sector) { ?>
                                        <p><?php echo get_the_category_by_ID($sector); ?></p>
            <?php }} else { echo "Not Avail.";}?>
                                </div>

                            </div><!-- **portfolio-detail - Ends** -->

                        </div><!-- **portfolio-detail - Ends** -->

                    

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
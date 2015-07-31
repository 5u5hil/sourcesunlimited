<?php
chkLogin();
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

                <h1>Startups Listing</h1>

            </div>



        </div>

    </div>

</div>

<div class="dt-sc-margin30"></div>

<div class="container">

    <!-- Primary Starts -->

    <section id="primary" class="content-full-width">

        <h3>Startup that you might be interested in</h3>

        <div class="sorting-container dt-sc-hr-invisible-small filter">

            <form>

                <div class="column dt-sc-one-sixth first">

                    <div class="form-row form-row-wide address-field validate-required">		

                        <label>Sectors</label>

                      

                            <select  multiple="multiple" placeholder="-- Select --"  name="sector_name[]"  id="sector_name" class="sector_name SlectBox validate-required"  >

                               
                                <?php
                                $categories = get_categories(array('parent' => 1, 'hide_empty' => 0));

                                foreach ($categories as $cat) {
                                ?>
                                <option value = "<?php echo $cat->term_id ?>" ><?php echo $cat->name ?></option>

                                <?php } ?>

                            </select>

                       

                    </div>



                </div>




                <div class="column dt-sc-one-sixth">

                    <div class="form-row form-row-wide address-field validate-required">		

                        <label>Startup stage </label>

                      

                            <select name="startup_stage" class="startup_stage"  >

                                <option value="">-- Select --</option>

                                <?php $Idproof = get_categories(array('parent' => 7, 'hide_empty' => 0)); 
                                
                                foreach ($Idproof as $proof) { ?>

                                    <option value="<?php echo $proof->term_id ?>" ><?php echo $proof->name ?></option>

                                
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

            if (isset($_GET['sector_name'])) {

               $cats = array_merge($cats, $_GET['sector_name']);
            }



            if (isset($_GET['startup_stage'])) {

                array_push($cats, $_GET['startup_stage']);
            }


            $args = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => 'startup', 'category__and' => array_filter($cats));


            $the_query = new WP_Query($args);

            // $the_query->last_query; die;

            if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
                    ?>

                    <div class="portfolio dt-sc-one-third column with-space all-sort revenue institute-name industry">

                        <!-- **portfolio-thumb - Starts** -->

                        <div class="portfolio-thumb">

                            <?php
                            if (has_post_thumbnail()) {

                                the_post_thumbnail();
                                
                            } else {

                                $img = wp_get_attachment_image_src(693);

                                echo "<img src='" . $img[0] . "' />";
                            }
                            ?>

                        </div> <!-- **portfolio-thumb - Ends** -->

                        <!-- **portfolio-detail - Starts** -->
  <div class="portfolio-detail newpd" onclick="window.location.href = '<?= the_permalink(); ?>?id=post_details'">

                            <div class="views">
                                <h5 class="prname"><a href="<?= the_permalink(); ?>?id=post_details"><?= the_title(); ?></a></h5>
                                  <span>City of Location: </span><a href="javascript:void(0);"><?php  if(get_post_meta(get_the_ID(), 'Address', true)) { echo  get_the_category_by_ID(get_post_meta(get_the_ID(), 'Address', true)); } else { echo "Not Avail."; } ?></a>
                              </div> 

                             <div class="portfolio-title">

								<p><strong>Sectors: </strong>
                                 <?php if(get_post_meta(get_the_ID(), 'Sector', true)) { foreach (explode(",", get_post_meta(get_the_ID(), 'Sector', true)) as $sec) { ?>
                                    <?php echo get_the_category_by_ID($sec); ?>,
<?php } } else { echo "Not Avail.";} ?>
                               </p>
                                   <p>  <strong>Student/Alum of: </strong>
                                 <?php  if(get_post_meta(get_the_ID(), 'Institute Name', true)) { foreach (explode(",", get_post_meta(get_the_ID(), 'Institute Name', true)) as $inst) { ?>
                                    <?php echo get_the_category_by_ID($inst); ?>,
                                 <?php } } else { echo "Not Avail.";}?>
								</p>

                                <p>  <strong>Stage: </strong> <?php if(get_post_meta(get_the_ID(), 'Startup stage', true))  { echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Startup stage', true)); } else { echo "Not Avail."; } ?>

                                    </p>  
									
									<strong>One Line Pitch: </strong> <?php if(get_post_meta(get_the_ID(), 'One line pitch', true)) { echo (get_post_meta(get_the_ID(), 'One line pitch', true)); } else { echo "Not Avail."; } ?>

                                

                            </div>

                        </div>
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


<?php
//check_startup();

if ( is_user_logged_in() ) { 
    get_header();
?>
<div class="parallax full-width-bg lr_widget">
    <div class="container">
        <div class="main-title">
            <div class="column dt-sc-three-fifth first">
                <h1>Institute Dashboard</h1>
            </div>

        </div>
    </div>
</div>
<div class="dt-sc-margin30"></div>
<div class="container">
    <!-- **secondary - starts** --> 
    <section id="secondary-left" class="secondary-sidebar secondary-has-left-sidebar">
        <aside class="widget widget_product_categories">
            <ul>
                <li> <a href="/institute-dashboard/" class="active_menu">Dashboard</a> </li>
                <li> <a href="/startup-listing/">Startups</a> </li>
                <li> <a href="/innovator-listing/">Innovators</a> </li>
                 <li> <a href="#">Edit Profile</a> </li>
               
            </ul>	
        </aside>	
		 <div class="clear"></div>	
		<div class="dash-instru">
		By default, your dashboard view shows you information from your Alma-Mater institute. Please click on "View All" to see information across the Network.	
		</div>
    </section> <!-- **secondary - Ends** -->  

    <!-- **primary - Starts** --> 
    <section id="primary" class="with-left-sidebar page-with-sidebar">



        <div class="dt-sc-margin30"></div>
      
 <!-- ** Investor ** -->
<?php 
  
   $current_user = wp_get_current_user();
    $args = array( 'offset' => 0 , 'post_type' => 'institute', 'author' => $current_user->ID);


            $the_query = new WP_Query($args);
            $post = $the_query->post;
         $ask_question_id = $post->ID;
            $iinstitute_id = get_post_meta(get_the_ID(), 'Alumni of Institute', true);
                $ids  = explode(',', $iinstitute_id);
           while ($the_query->have_posts()) : $the_query->the_post(); 
       ?>
        <div class="clear"></div>
            <div class="icosection">			
                <div class="dt-sc-one-third column first">				
                    <div class="circleicon"><i class="fa fa-eye"></i></div>
                    <h6 class="sdash"><a href="/user-views/"><?php  echo getPostViews(get_the_ID()); ?></a></h6>
                </div>				
               		
               			
               <div class="dt-sc-one-third column">
      <div class="circleicon"><i class="fa fa-question"></i></div>
     <?php $question = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => 'question','meta_key' => 'To Whom Question Asked','meta_query' => array(  array(
                'key'       => 'To Whom Question Asked',
                'value'     => $ask_question_id,
                'type'      => 'numeric'
         ))
    );

     $question_query = new WP_Query($question);
     $post_question = $question_query->post;

     ?>
      <h6 class="sdash"><a href="/questions-asked/"><?php echo $question_query->post_count;?> Questions Asked</a> </h6> 
   </div>
            </div> 
                <?php  endwhile; ?> 

 <div class="clear"></div>
 <h3> Startups </h3>
  <div class="clear"></div>
 
<div class="portfolio-container products">

            <?php
           
            $startup = array('posts_per_page' => 6, 'offset' => 0, 'post_type' => 'startup');


            $the_query_startup = new WP_Query($startup);



            if ($the_query_startup->have_posts()) : while ($the_query_startup->have_posts()) : $the_query_startup->the_post();
             $sinstitute_id = get_post_meta(get_the_ID(), 'Institute Name', true);
                $startup_id  = explode(',', $sinstitute_id);
              //  print_r($mentor_id);
if(array_intersect($ids,$startup_id)){         
            
            
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

                                 <span>City of Location: </span><a href="#"><?php  if(get_post_meta(get_the_ID(), 'Address', true)) { echo  get_the_category_by_ID(get_post_meta(get_the_ID(), 'Address', true)); } else { echo "Not Avail."; } ?></a>

                              </div> 

                            <div class="portfolio-title">

                               <p><strong>Sectors: </strong>
                                 <?php if(get_post_meta(get_the_ID(), 'Sector', true)) { foreach (explode(",", get_post_meta(get_the_ID(), 'Sector', true)) as $sec) { ?>
                                    <?php echo get_the_category_by_ID($sec); ?>,
<?php } } else { echo "Not Avail.";} ?>
                               </p>
                                   <p> <strong>Student/Alum of: </strong>
                                 <?php  if(get_post_meta(get_the_ID(), 'Institute Name', true)) { foreach (explode(",", get_post_meta(get_the_ID(), 'Institute Name', true)) as $inst) { ?>
                                    <?php echo get_the_category_by_ID($inst); ?>,
                                 <?php } } else { echo "Not Avail.";}?>
									</p>
                                <p>  <strong>Stage: </strong> <?php if(get_post_meta(get_the_ID(), 'Startup stage', true))  { echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Startup stage', true)); } else { echo "Not Avail."; } ?>
								</p>  
								
									<strong>One Line Pitch: </strong> <?php if(get_post_meta(get_the_ID(), 'One line pitch', true)) { echo (get_post_meta(get_the_ID(), 'One line pitch', true)); } else { echo "Not Avail."; } ?>

                                

                            </div>

                        </div><!-- **portfolio-detail - Ends** -->

                    </div>

                    <?php
}
                endwhile;

            endif;

            wp_reset_postdata();
            ?> 

        </div>
   <div class="bview"><a href="/startup-listing/" style="text-align: left;">View All</a></div>
 <!-- **Mentor ** -->
 <div class="clear"></div>
 <h3> Innovators </h3>
  <div class="clear"></div>
<div class="portfolio-container products">

            <?php
           
            $mentor = array('posts_per_page' => 6, 'offset' => 0, 'post_type' => 'innovator');


            $the_query_mentor = new WP_Query($mentor);



            if ($the_query_mentor->have_posts()) : while ($the_query_mentor->have_posts()) : $the_query_mentor->the_post();
                   
           $inninstitute_id = get_post_meta(get_the_ID(), 'Institute Name', true);
                $innovator_id  = explode(',', $inninstitute_id);
              //  print_r($mentor_id);
if(array_intersect($ids,$innovator_id)){    
            
            ?>


                    <div class="portfolio dt-sc-one-third column with-space all-sort revenue institute-name industry">

                        <!-- **portfolio-thumb - Starts** -->

                        <div class="portfolio-thumb">

                            <?php
                            if (has_post_thumbnail()) {

                                the_post_thumbnail();
                            } else {

                                $img = wp_get_attachment_image_src(756);

                                echo "<img src='" . $img[0] . "' />";
                            }
                            ?>

                        </div> <!-- **portfolio-thumb - Ends** -->

                        <!-- **portfolio-detail - Starts** -->

                         <div class="portfolio-detail newpd" onclick="window.location.href = '<?= the_permalink(); ?>?id=post_details'">

                             <div class="views">
                                     <h5 class="prname"><a href="<?= the_permalink(); ?>?id=post_details"><?= the_title(); ?></a></h5>
                                   <span>City of Location: </span><a href="#"><?php if(get_post_meta(get_the_ID(), 'Address', true)) { echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Address', true)); } else { echo "Not Avail."; } ?></a></div> 

                            <div class="portfolio-title">

                               <p> <strong>Sectors: </strong>
                                 <?php if(get_post_meta(get_the_ID(), 'Sector', true)) { foreach (explode(",", get_post_meta(get_the_ID(), 'Sector', true)) as $sec) { ?>
                                    <?php echo get_the_category_by_ID($sec); ?>,
<?php } } else { echo "Not Avail.";} ?>
                               </p>
                                 <p>  <strong>Student/Alum of:</strong>
                                 <?php if(get_post_meta(get_the_ID(), 'Institute Name', true)) { foreach (explode(",", get_post_meta(get_the_ID(), 'Institute Name', true)) as $inst) { ?>
                                    <?php echo get_the_category_by_ID($inst); ?>,
                                <?php }
                                 } else { echo "Not Avail.";}?>
								 </p>  
								 
									<strong>One Line Pitch: </strong> <?php if(get_post_meta(get_the_ID(), 'One line pitch', true)) echo (get_post_meta(get_the_ID(), 'One line pitch', true)); else { echo "Not Avail.";} ?>
                              
                            </div>

                        </div><!-- **portfolio-detail - Ends** -->

                    </div>

                    <?php
}
                endwhile;

            endif;

            wp_reset_postdata();
            ?> 

        </div>
  <div class="bview"><a href="/innovator-listing/" style="text-align: left;">View All</a></div>
        <!-- **product - Ends** -->
        <div class="dt-sc-margin10"></div>
        <!-- **pagination - Starts** -->  
<!--        <div class="pagination">
            <div class="prev-post"> <a href="#"> <span class="fa fa-caret-left"></span> PREV </a> </div>
            <ul>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
            </ul>
            <div class="next-post"> <a href="#">NEXT  <span class="fa fa-caret-right"></span> </a> </div>
        </div>  **pagination - Ends** -->
    </section> <!-- **primary - Ends** --> 
    <div class="dt-sc-margin80"></div>
</div>
<div class="dt-sc-hr-invisible"></div>		 <!-- **container - Ends** --> 
<?php get_footer();
}

else
{
    
     header("location:/login/");
}
?>
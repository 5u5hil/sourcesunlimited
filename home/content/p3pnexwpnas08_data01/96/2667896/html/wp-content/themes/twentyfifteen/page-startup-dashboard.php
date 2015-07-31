<?php
//$args = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => 'investor');
//   $the_query = new WP_Query($args);
//    
//     while ($the_query->have_posts()) : $the_query->the_post();    
//     //  echo get_the_ID(); 
//  update_post_meta(get_the_ID(), 'post_views_count', json_encode(array()));
//  
//  endwhile; 


//$args = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => 'startup');
//   $the_query = new WP_Query($args);
//    
//     while ($the_query->have_posts()) : $the_query->the_post();    
//     //  echo get_the_ID(); 
//  update_post_meta(get_the_ID(), 'Interested in Incubating', json_encode(array()), true);
//  
//  endwhile; 

if (is_user_logged_in()) {
    get_header();
    ?>
    <div class="parallax full-width-bg lr_widget">
        <div class="container">
            <div class="main-title">
                <div class="column dt-sc-three-fifth first">
                    <h1>Startup Dashboard</h1>
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
                    <li> <a href="/startup-dashboard/" class="active_menu">Dashboard</a> </li>
                    <li> <a href="/incubator-listing/">Incubators</a> </li>
                    <li> <a href="/investor-listing/">Investors</a> </li>
                    <li> <a href="/mentor-listing/">Mentors</a> </li>
                    <li> <a href="/corporate-listing/">Corporates</a> </li>
                    <li> <a href="/institute-listing/">Institutes</a> </li>
                    <!--                <li> <a href="/funding-eligiblility-question/">Funding Eligibility Questionnaire</a> </li>-->
                    <li> <a href="/edit-profile/">Edit Profile</a> </li>
                </ul>	
            </aside>	 
            <div class="clear"></div>	
            <div class="dash-instru">
                By default, your dashboard view shows you information from your Alma-Mater institute. Please click on "View All" to see information across the Network.	
            </div>

        </section> <!-- **secondary - Ends** -->  

        <!-- **primary - Starts** --> 
        <section id="primary" class="with-left-sidebar page-with-sidebar">


            <!-- ** Investor ** -->
            <div class="clear"></div>
            <?php
            $current_user = wp_get_current_user();
            $args = array('offset' => 0, 'post_type' => 'startup', 'author' => $current_user->ID);


            $the_query = new WP_Query($args);
            // print_r($the_query);
            $post = $the_query->post;
            $post_id = $post->ID;
            $ask_question_id = $post->ID;
            $sinstitute_id = get_post_meta($post_id, 'Institute Name', true);
            $ids = explode(',', $sinstitute_id);
            //print_r($aa);
            while ($the_query->have_posts()) : $the_query->the_post();
                ?>

                <div class="clear"></div>
                <div class="icosection">			
                    <div class="dt-sc-one-fifth column first">				
                        <div class="circleicon"><i class="fa fa-eye"></i></div>
                       <h6 class="sdash"><a href="/user-views/"><?php  echo getPostViews(get_the_ID()); ?></a></h6>
<!--                        <h6 class="sdash"><a href="/user-views/"><?php // echo getPostViews(get_the_ID()); ?></a></h6>-->
                    </div>				
                    <div class="dt-sc-one-fifth column">
                        <div class="circleicon"><i class="fa fa-check-square-o"></i></div>
                        <h6 class="sdash"><a href="/shown-interest/"><?php echo getPostInterests(get_the_ID()); ?></a></h6>
                    </div>			
                    <div class="dt-sc-one-fifth column">
                        <div class="circleicon"><i class="fa fa-money"></i></div>
                        <h6 class="sdash"><a href="/interested-in-investing/"><?php echo getPostInvests(get_the_ID()); ?></a></h6>
                    </div>
                    <div class="dt-sc-one-fifth column">
                    <div class="circleicon"><i class="fa fa-cloud"></i></div>
                    <h6 class="sdash"><a href="/interested-in-incubating/"><?php echo getPostIncubators(get_the_ID()); ?></a></h6>
                </div> 
                    <div class="dt-sc-one-fifth column">
                        <div class="circleicon"><i class="fa fa-question"></i></div>
                        <?php
                        $question = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => 'question', 'meta_key' => 'To Whom Question Asked', 'meta_query' => array(array(
                                    'key' => 'To Whom Question Asked',
                                    'value' => $ask_question_id,
                                    'type' => 'numeric'
                                ))
                        );

                        $question_query = new WP_Query($question);
                        $post_question = $question_query->post;
                        ?>
                        <h6 class="sdash"><a href="/questions-asked/"><?php echo $question_query->post_count; ?> Questions Asked</a> </h6>
                    </div>

                </div> <?php endwhile; ?>

            <h3 class="dlilstheading"> Incubators </h3>
            <div class="clear"></div>

            <div class="portfolio-container products">


                <?php
                $incubator = array('posts_per_page' => 4, 'offset' => 0, 'post_type' => 'incubator');


                $the_query_incubator = new WP_Query($incubator);

                $post_incubator = $the_query_incubator->post;
                $post_incubator_id = $post_incubator->ID;

                if ($the_query_incubator->have_posts()) : while ($the_query_incubator->have_posts()) : $the_query_incubator->the_post();

                        $iincubator_id = get_post_meta($post_incubator_id, 'Institute Name', true);
                        $incubator_id = explode(',', $iincubator_id);
                        if (array_intersect($ids, $incubator_id)) {
                            ?>


                            <div class="portfolio dt-sc-one-fourth column with-space all-sort revenue institute-name industry">

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

                                          } */ ?>


                                        <span>City of Location- <?php if ((get_post_meta(get_the_ID(), 'Address', true)) != "") {
                            echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Address', true));
                        } else {
                           echo "Not Avail."; 
                        }
                        ?>  </span>


                                    </div>

                                    <div class="portfolio-title">

                                        <strong><?php
                                            if (get_post_meta(get_the_ID(), 'Independant or Associated', true) == 'Associated') {
                                                echo "Associated With: ";
                                            } else {
                                                echo "Independent Incubator";
                                            }
                                            ?></strong><br/>
                                        <p><?php
                                            if (get_post_meta(get_the_ID(), 'Independant or Associated', true) == 'Associated') {
                                                if (get_post_meta(get_the_ID(), 'Institute Name', true)) {
                                                    echo 'Institute - ';
                                                    foreach (explode(",", get_post_meta(get_the_ID(), 'Institute Name', true)) as $idd) {
                                                        ?>
                                                        <?= get_the_category_by_ID($idd); ?>
                                                        <?php
                                                    }
                                                } elseif (get_post_meta(get_the_ID(), 'Corporate', true)) {
                                                    echo 'Organization - ';
                                                    echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Corporate', true));
                                                } elseif (get_post_meta(get_the_ID(), 'Investment Network', true)) {
                                                    echo 'Investment Network - ';
                                                    echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Investment Network', true));
                                                } elseif (get_post_meta(get_the_ID(), 'Other associate', true)) {
                                                    echo 'Other - ';
                                                    echo (get_post_meta(get_the_ID(), 'Other associate', true));
                                                } else {
                                                    echo "Not Avail.";
                                                }
                                            }
                                            ?></p>
                                        <strong>Sectors:</strong><br/>
                                        <?php
                                        if (get_post_meta(get_the_ID(), 'Sector', true)) {
                                            foreach (explode(",", get_post_meta(get_the_ID(), 'Sector', true)) as $sector) {
                                                ?>
                                                <p><?php echo get_the_category_by_ID($sector); ?></p>
                    <?php
                    }
                } else {
                    echo "Not Avail.";
                }
                ?>
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
            <div class="bview"><a href="/incubator-listing/" style="text-align: left;">View All</a></div>
            <!-- **Mentor ** -->		 

            <div class="clear"></div>			

            <hr/>



            <h3 class="dlilstheading"> Investors </h3>
            <div class="clear"></div>

            <div class="portfolio-container products">


                        <?php
                        $investor = array('posts_per_page' => 8, 'offset' => 0, 'post_type' => 'investor');


                        $the_query_investor = new WP_Query($investor);

                        $post_investor = $the_query_investor->post;
                        $post_investor_id = $post_investor->ID;

                        if ($the_query_investor->have_posts()) : while ($the_query_investor->have_posts()) : $the_query_investor->the_post();

                                $iinstitute_id = get_post_meta($post_investor_id, 'Alumni', true);
                                $investor_id = explode(',', $iinstitute_id);
                                if (array_intersect($ids, $investor_id)) {
                                    ?>


                            <div class="portfolio dt-sc-one-fourth column with-space all-sort revenue institute-name industry">

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

                                        <span>Avg. Investment Size- <?php if (get_post_meta(get_the_ID(), 'Funding Amount', true)) {
                                echo get_post_meta(get_the_ID(), 'Funding Amount', true);
                                ?>  
                                                <?php
                                            } else {
                                                echo "Not Avail.";
                                            }
                                            ?></span>


                                        <span>City of Location- <?php
                                            if (get_post_meta(get_the_ID(), 'City Of location', true)) {
                                                echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'City Of location', true));
                                            } else {
                                                echo "Not Avail.";
                                            }
                                            ?>  </span>


                                    </div>

                                    <<div class="portfolio-title">

                                    <strong>Alumni of:</strong><br/>
                                    <?php if (get_post_meta(get_the_ID(), 'Alumni', true)) {
                                        foreach (explode(",", get_post_meta(get_the_ID(), 'Alumni', true)) as $idd) {
                                            ?>
                                            <p><?= get_the_category_by_ID($idd); ?></p>
                                        <?php
                                        }
                                    } else {
                                        echo "Not Avail.";
                                    }
                                    ?>
                                    <strong>Sectors:</strong><br/>
                        <?php if (get_post_meta(get_the_ID(), 'Sector', true)) {
                            foreach (explode(",", get_post_meta(get_the_ID(), 'Sector', true)) as $sector) {
                                ?>
                                            <p><?php echo get_the_category_by_ID($sector); ?></p>
                            <?php
                            }
                        } else {
                            echo "Not Avail.";
                        }
                        ?>
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
            <div class="bview"><a href="/investor-listing/" style="text-align: left;">View All</a></div>
            <!-- **Mentor ** -->		 

            <div class="clear"></div>			

            <hr/>

            <div class="clear"></div>

            <h3 class="dlilstheading"> Mentors</h3>
            <div class="clear"></div>

            <div class="portfolio-container products">

                        <?php
                        $mentor = array('posts_per_page' => 8, 'offset' => 0, 'post_type' => 'mentor');


                        $the_query_mentor = new WP_Query($mentor);

                        $post_mentor = $the_query_mentor->post;
                        $post_mentor_id = $post_mentor->ID;

                        if ($the_query_mentor->have_posts()) : while ($the_query_mentor->have_posts()) : $the_query_mentor->the_post();

                                $minstitute_id = get_post_meta(get_the_ID(), 'Alumni of Institute', true);
                                $mentor_id = explode(',', $minstitute_id);
                                //  print_r($mentor_id);
                                if (array_intersect($ids, $mentor_id)) {
                                    ?>


                            <div class="portfolio dt-sc-one-fourth column with-space all-sort revenue institute-name industry">

                                <!-- **portfolio-thumb - Starts** -->

                                <div class="portfolio-thumb">

                <?php
                if (has_post_thumbnail()) {

                    the_post_thumbnail();
                } else {

                    $img = wp_get_attachment_image_src(415);

                    echo "<img src='" . $img[0] . "' />";
                }
                ?>

                                </div> <!-- **portfolio-thumb - Ends** -->

                                <!-- **portfolio-detail - Starts** -->

                                 <div class="portfolio-detail" onclick="window.location.href = '<?= the_permalink(); ?>?id=post_details'">
                            <div class="views">
                                <h5 class="prname"><a href="<?= the_permalink(); ?>?id=post_details"><?= the_title(); ?></a></h5>
                                <span>Year as Mentor- <?php
                                if (get_post_meta(get_the_ID(), 'Years as a mentor', true)) {
                                    echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Years as a mentor', true));
                                } else {
                                    echo "Not Avail.";
                                }
                                ?> </span>
                                   
                            </div>



                            <div class="portfolio-title">

                                <strong>Sectors:</strong><br/>
                    <?php if (get_post_meta(get_the_ID(), 'interest to mentor', true)) {
                        foreach (explode(",", get_post_meta(get_the_ID(), 'interest to mentor', true)) as $sector) {
                            ?>
                                        <p><?php echo get_the_category_by_ID($sector); ?></p>
                        <?php
                        }
                    } else {
                        echo "Not Avail.";
                    }
                    ?>
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
            <div class="bview"><a href="/mentor-listing/" style="text-align: left;"> View All</a></div>
            <!-- **Corpoartes ** -->
            <div class="clear"></div>			<hr/>		<div class="clear"></div>
            <h3 class="dlilstheading"> Corporates </h3>
            <div class="clear"></div>
            <div class="portfolio-container">

                        <?php
                        $corporate = array('posts_per_page' => 8, 'offset' => 0, 'post_type' => 'corporate');


                        $the_query_corporate = new WP_Query($corporate);



                        if ($the_query_corporate->have_posts()) : while ($the_query_corporate->have_posts()) : $the_query_corporate->the_post();

                                $cinstitute_id = get_post_meta(get_the_ID(), 'Institute name', true);
                                $corporate_id = explode(',', $cinstitute_id);
                                //  print_r($mentor_id);
                                if (array_intersect($ids, $corporate_id)) {
                                    ?>


                            <div class="portfolio dt-sc-one-fourth column with-space all-sort revenue institute-name industry">

                                <!-- **portfolio-thumb - Starts** -->

                                <div class="portfolio-thumb">

                <?php
                if (has_post_thumbnail()) {

                    the_post_thumbnail();
                } else {

                    $img = wp_get_attachment_image_src(412);

                    echo "<img src='" . $img[0] . "' />";
                }
                ?>

                                </div> <!-- **portfolio-thumb - Ends** -->

                                <!-- **portfolio-detail - Starts** -->

                                 <div class="portfolio-detail" onclick="window.location.href = '<?= the_permalink(); ?>?id=post_details'">

                            <div class="views">
                                <h5 class="prname"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h5>
                                <span>City of Location- <?php
                                if (get_post_meta(get_the_ID(), 'City Of location', true)) {
                                    echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'City Of location', true));
                                } else {
                                    echo "Not Avail.";
                                }
                                ?></span>
                            </div>



                            <div class="portfolio-title">




                                <strong>Sectors:</strong><br/> <?php
                                if (get_post_meta(get_the_ID(), 'Sector of interest', true)) {
                                    foreach (explode(",", get_post_meta(get_the_ID(), 'Sector of interest', true)) as $sector) {
                                        ?>
                        <?php echo get_the_category_by_ID($sector); ?>
                        <?php
                    }
                } else {
                    echo "Not Avail.";
                }
                ?> 
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
            <div class="bview"><a href="/corporate-listing/" style="text-align: left;">View All</a></div>
            <!-- **Institute** -->
            <div class="clear"></div>			<hr/>		<div class="clear"></div>
            <h3 class="dlilstheading"> Institutes</h3>
            <div class="clear"></div>
            <div class="portfolio-container">

                        <?php
                        $institute = array('posts_per_page' => 8, 'offset' => 0, 'post_type' => 'institute');


                        $the_query_institute = new WP_Query($institute);



                        if ($the_query_institute->have_posts()) : while ($the_query_institute->have_posts()) : $the_query_institute->the_post();

                                $Alinstitute_id = get_post_meta(get_the_ID(), 'Alumni of Institute', true);
                                $inst_id = explode(',', $Alinstitute_id);
                                //  print_r($mentor_id);
                                if (array_intersect($ids, $inst_id)) {
                                    ?>


                            <div class="portfolio dt-sc-one-fourth column with-space all-sort revenue institute-name industry">

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
                                <h5 class="prname"><a href="<?= the_permalink(); ?>?id=post_details"><?php
                    if (get_post_meta(get_the_ID(), 'Alumni of Institute', true)) {
                        get_the_category_by_ID(get_post_meta(get_the_ID(), 'Alumni of Institute', true));
                    } else {
                        echo "Not Avail.";
                    }
                    ?></a></h5>
                                <span>City of Location - <?php
                    if (get_post_meta(get_the_ID(), 'City Of location', true)) {
                        echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'City Of location', true));
                    } else {
                        echo "Not Avail.";
                    }
                    ?> </span>
                            </div>
                                    <!--                            <div class="portfolio-title">
                                    
                                                                  
                                    
                                                                    <p><strong>Position at Institute: </strong><br>
                <?php // get_the_category_by_ID(get_post_meta(get_the_ID(), 'Position', true));  ?></p>
                                    
                                                                </div>-->

                                </div> <!-- **portfolio-detail - Ends** -->

                            </div>

                <?php
            }
        endwhile;

    endif;

    wp_reset_postdata();
    ?> 

            </div>

            <div class="bview"> <a href="/institute-listing/" style="text-align: right;">View All</a> </div>
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
    <?php
    get_footer();
} else {

    header("location:/login/");
}
?>
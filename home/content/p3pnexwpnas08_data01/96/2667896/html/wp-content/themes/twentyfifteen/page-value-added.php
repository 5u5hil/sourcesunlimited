<?php
chkLogin(); 
$current_user = wp_get_current_user();

$interest = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => get_user_meta($current_user->ID, "entity", true), 'author' => $current_user->ID);

$interest_query = new WP_Query($interest);

while ($interest_query->have_posts()) : $interest_query->the_post();
    $interest = get_post_meta(get_the_ID(), 'User Likes', true);

    $interest_array = json_decode($interest,true);
////print_r($interest_array);
////echo "<br>";
//// echo count($interest_array); 
//// echo "fsdfsdf";
//foreach($interest_array as $value) {
////echo $value;
////
//  //  echo $value['id'];
////echo get_userdata($value['id'])->display_name;
//
////echo "$$$".get_author_name( $value['id'] );
// //echo get_the_category_by_ID(get_post_meta($post_author_id, 'Alumni of Institute', true));
//echo "$$$".get_the_author_meta( "entity", $value['id'] );
//
//
//$interest1 = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => get_the_author_meta( "entity", $value['id'] ), 'author' => $value['id']);
//////
//$interest_query1 = new WP_Query($interest1);
//while ($interest_query1->have_posts()) : $interest_query1->the_post();
//if(get_the_author_meta( "entity", $value['id']) == 'startup'){
//    
//
//if(get_post_meta(get_the_ID(), 'Institute Name', true)){
//            foreach (explode(",", get_post_meta(get_the_ID(), 'Institute Name', true)) as $institute) { 
//       echo get_the_category_by_ID($institute);
//      }} else { echo "Not Avail.";}
////      echo "<br>";
//// echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Alumni of Institute', true));
//      }
//endwhile;
//}
//////
//////
////echo "DFsdfsd";
//die;
    get_header();
    ?>
    <div class="parallax full-width-bg lr_widget">
        <div class="container">
            <div class="main-title">
                <div class="column dt-sc-three-fifth first">
                    <h1>Mentors Showed Interest (<?php echo count($interest_array); ?>)</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Container starts-->
    <div class="full-width-section grey1" id="txtwrap">
        <div class="dt-sc-margin30"></div> 
        <div class="container">
            <div class="hr-title dt-sc-hr-invisible-small">

                <div class="title-sep"> </div>
            </div>



            <section id="primary" class="content-full-width">


                <table class="shop_table shinterest">
                    <thead>
                        <tr>
                            <th><strong>Name</strong></th>
                            <th><strong>Alumni of Organization</strong></th>
                            <th><strong>Category</strong></th>
                            <th><strong>Time</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_reverse($interest_array) as $value) { ?>

                            <tr>
                               <?php  $interest1 = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => get_the_author_meta("entity", $value['id']), 'author' => $value['id']);

                                    $interest_query1 = new WP_Query($interest1);
                                    while ($interest_query1->have_posts()) : $interest_query1->the_post();?>
                                <td><b><a href="javascript:void(0);" onclick="window.location.href = '<?= get_the_permalink(); ?>?id=post_details'"><?php echo get_userdata($value['id'])->display_name; ?></a></b></td>

                                <td><?php
                                   if(get_the_author_meta("entity", $value['id']) == 'mentor') {
                                        if (get_post_meta(get_the_ID(), 'Alumni of Institute', true)) {
                                            foreach (explode(",", get_post_meta(get_the_ID(), 'Alumni of Institute', true)) as $institute) {
                                                ?>
                                                <p><?php echo get_the_category_by_ID($institute); ?></p>
                                            <?php
                                            }
                                        } else {
                                            echo "Not Avail.";
                                        }
                                   }
                                  else if((get_the_author_meta("entity", $value['id']) == 'startup') || (get_the_author_meta("entity", $value['id']) == 'innovator') || (get_the_author_meta("entity", $value['id']) == 'incubator') || (get_the_author_meta("entity", $value['id']) == 'corporate')){
                                        if (get_post_meta(get_the_ID(), 'Institute Name', true)) {
                                            foreach (explode(",", get_post_meta(get_the_ID(), 'Institute Name', true)) as $institute) {
                                                ?>
                                                <p><?php echo get_the_category_by_ID($institute); ?></p>
                                            <?php
                                            }
                                        } else {
                                            echo "Not Avail.";
                                        }
                                   } else if(get_the_author_meta("entity", $value['id']) == 'investor') {
                                        if (get_post_meta(get_the_ID(), 'Alumni', true)) {
                                            foreach (explode(",", get_post_meta(get_the_ID(), 'Alumni', true)) as $institute) {
                                                ?>
                                                <p><?php echo get_the_category_by_ID($institute); ?></p>
                                            <?php
                                            }
                                        } else {
                                            echo "Not Avail.";
                                        }
                                   } else if(get_the_author_meta("entity", $value['id']) == 'institute') {
                                        if (get_post_meta(get_the_ID(), 'Alumni of Institute', true)) {
                                            foreach (explode(",", get_post_meta(get_the_ID(), 'Alumni of Institute', true)) as $institute) {
                                                ?>
                                                <p><?php echo get_the_category_by_ID($institute); ?></p>
                                            <?php
                                            }
                                        } else {
                                            echo "Not Avail.";
                                        }
                                   }else
                                       {
                                       echo "Not Avail.";
                                       }
                              

                                   
                                    ?> </td>

                                <td><?php echo get_the_author_meta("entity", $value['id']); ?></td>
                      

                                                 <td><?php echo $value['time'] ?></td>
                                                   <?php  endwhile; ?>
                            </tr>
    <?php } ?>
                    </tbody>
                </table>      	<div class="dt-sc-margin50"></div>
            </section>

















        </div> <!-- **container - Ends** -->


        <div class="dt-sc-margin50"></div> 
    </div>

<?php endwhile; ?>		
<?php get_footer(); ?>
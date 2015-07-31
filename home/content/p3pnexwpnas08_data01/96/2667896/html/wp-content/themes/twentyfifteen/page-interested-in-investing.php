<?php
chkLogin(); 
$current_user = wp_get_current_user();

$interest = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => get_user_meta($current_user->ID, "entity", true), 'author' => $current_user->ID);

$interest_query = new WP_Query($interest);

while ($interest_query->have_posts()) : $interest_query->the_post();
    $interest = get_post_meta(get_the_ID(), 'Interested in Investing', true);

    $interest_array = json_decode($interest,true);

    get_header();
    ?>
    <div class="parallax full-width-bg lr_widget">
        <div class="container">
            <div class="main-title">
                <div class="column dt-sc-three-fifth first">
                    <h1>Investors Interest In (<?php echo count($interest_array); ?>)</h1>
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
                                   
                                        if (get_post_meta(get_the_ID(), 'Alumni', true)) {
                                            foreach (explode(",", get_post_meta(get_the_ID(), 'Alumni', true)) as $institute) {
                                                ?>
                                                <p><?php echo get_the_category_by_ID($institute); ?></p>
                                            <?php
                                            }
                                        } else {
                                            echo "Not Avail.";
                                        }
// echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Alumni of Institute', true));
                                   
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
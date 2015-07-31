<?php
chkLogin();
$current_user = wp_get_current_user();

$args = array('offset' => 0, 'post_type' => get_user_meta($current_user->ID, "entity", true), 'author' => $current_user->ID);

$the_query = new WP_Query($args);
$post = $the_query->post;
$ask_question_id = $post->ID;


 //print_r($question_query);
//while ($question_query->have_posts()) : $question_query->the_post();
//    $posts = $question_query->post;
//   $post_authur_id = $posts->post_author;
//  // echo $posts->ID;
////
//   $user_post_type = get_the_author_meta('entity', $post_authur_id);
//    $new_arg = array('offset' => 0, 'post_type' => $user_post_type, 'author' => $post_authur_id); //  
//    $the_query_new_arg = new WP_Query($new_arg);
//echo get_the_permalink();
//    if ($the_query_new_arg->have_posts()) :
//        while ($the_query_new_arg->have_posts()) : $the_query_new_arg->the_post();
//            //echo get_the_ID();
//            if (has_post_thumbnail()) {
//
//                the_post_thumbnail();
//            } else {
//
//                $img = wp_get_attachment_image_src(1522);
//
//                echo "<img src='" . $img[0] . "' />";
//            }
//
//        endwhile;
//         wp_reset_postdata();
//    endif;
//
//    echo "<br>";
//$reply = array('offset' => 0, 'post_type' => 'question', 'author' => $current_user->ID, 'post_parent' => $posts->ID);
//    $reply_query = new WP_Query($reply);
//    
//    echo $current_user->ID;
//    echo "----".$posts->ID;
//   echo "<br>";
//   // if (($reply_query->have_posts())) 
//      //  {
//        while ($reply_query->have_posts()) : $reply_query->the_post();
//
//             $post_reply = $reply_query->post;
//          echo  $post_reply_authur_id = $post_reply->post_author;
//          echo "---------".$user_post_type;
//           
//              echo "---------".$user_post_type_reply = get_the_author_meta('entity', $post_reply_authur_id);
//             echo "<br>";
//             $new_arg = array( 'offset' => 0, 'post_type' => $user_post_type_reply, 'author' => $post_reply_authur_id);
//                                $the_query_new_arg = new WP_Query($new_arg);
//
//                                if ($the_query_new_arg->have_posts()) : 
//                                   
//                                    while ($the_query_new_arg->have_posts()) : $the_query_new_arg->the_post();
//
//                                        if (has_post_thumbnail()) {
//
//
//                                            the_post_thumbnail();
//                                        } else {
//
//                                            $img = wp_get_attachment_image_src(1522);
//
//                                            echo "<img src='" . $img[0] . "' />";
//                                        }
//
//                                    endwhile;
//                                     wp_reset_postdata();
//                                endif;
//            
//            
//            
////                       // print_r($reply_query);
////                         if (($reply_query->have_posts())) {
////                           while ($reply_query->have_posts()) : $reply_query->the_post();
//////
////                             echo  $post_reply = $reply_query->post;
////                              echo  $post_reply_authur_id = $post_reply->post_author;
//////    
//endwhile;
////                         }
////                         else {
////                            // echo get_the_ID();
////                            // echo "<br>";
////                         }
//endwhile;
////
////
////
////
////
//die;
get_header();
?>

<style>
    #pr_view ul.dt-sc-tabs-frame{ width:35%; max-height:480px; overflow-y:auto;}
    #pr_view ul .pdetail{width:75%; float:left;}
    #pr_view ul .dt-sc-tabs-frame-content, #pr_view ul .woocommerce-tabs .panel{clear:none !important; width:40% !important;}
    .prinfo{width:64%;float:left; clear:none; border-left:none !important; min-height:400px; border-right: none !important; border-bottom: none !important;}

    #pr_view ul.dt-sc-tabs-frame li{width:100%;}
    #pr_view ul.dt-sc-tabs-frame li a{padding:8px; box-sizing:border-box; width:100%; background:#fff; border-bottom:1px #fff solid;}
    #pr_view ul.dt-sc-tabs-frame li a:hover,#pr_view ul.dt-sc-tabs-frame li a.current{background:#eee;}
    #pr_view ul.dt-sc-tabs-frame li a img{float:left;}
    #pr_view ul.dt-sc-tabs-frame li a span{display:block;float:left; margin-left:0px; padding-left:10px; box-sizing:border-box;
                                           line-height: 22px;
                                           text-align: left;
                                           font-size: 14px;
                                           color: #212121; width: 260px;
    }
    #pr_view ul.dt-sc-tabs-frame li a span small{font-size:12px; color:#212121;   }
    img.pimg{height:50px; width:auto;}
    #pr_view .type2 .dt-sc-tabs-frame-content{padding:15px;}
    .w10p{width:10%;}
    .w90p{width:87%;}
    .thumb_info, .thumbN{float:left; padding-left:15px; box-sizing:border-box;}
    .thumb_info p{margin-top:8px;}
    .qcommet{max-height:260px; min-height:260px; overflow:auto;}
    .dt-sc-tabs-frame-content p:last-child{font-style: normal; text-align:justify;}
    .replytextarea{height:80px; margin-top: 20px;}
    .replyform{margin-left:20px; border-top: 1px #eee solid; padding-top:10px;}
    .msgli li{padding:0 !important;}
	.msgthumb{display:inline-block; width:90px; height:70px;float:left; 
	background-position:center center;
	background-repeat:no-repeat;
	background-size:contain; border:1px #E4E4E4 solid;
	}

</style>


<div class="parallax full-width-bg lr_widget">
    <div class="container">
        <div class="main-title">
 <?php
                $question = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => 'question', 'meta_key' => 'To Whom Question Asked', 'meta_query' => array(array(
                            'key' => 'To Whom Question Asked',
                            'value' => $ask_question_id,
                            'type' => 'numeric'
                        ))
                );

                $question_query = new WP_Query($question);
                ?>

            <div class="column dt-sc-three-fifth first">
                <h1>Questions Asked ( <?php echo $question_query->post_count; ?> )</h1>
            </div>



        </div>
    </div>
</div>
<!-- Container starts-->
<div class="full-width-section grey1" id="txtwrap">
    <div class="dt-sc-margin30"></div> 
    <div class="container">



        <div class="dt-sc-tabs-container type2">
            <!-- **dt-sc-tabs-frame - Starts** -->
            <ul class="dt-sc-tabs-frame">
                <li class="halfwidth"> <a href="#" class="mbtn">Inbox</a> </li>
                <li class="halfwidth"> <a href="#" class="mbtn">Outbox</a> </li>
            </ul>  <!-- **dt-sc-tabs-frame - Ends** -->

            <!-- **dt-sc-tabs-frame-content - Starts** -->
            <div class="dt-sc-tabs-frame-content" style="padding:0;">
               
                <div class="dt-sc-tabs-container type2 woocommerce-tabs" id="pr_view">
                    <!-- **dt-sc-tabs-frame - Starts** -->
                    <ul class="dt-sc-tabs-frame msgli">
                        <?php
                        while ($question_query->have_posts()) : $question_query->the_post();
                            $posts = $question_query->post;
                            $post_authur_id = $posts->post_author;
                            $user_post_type = get_the_author_meta('entity', $post_authur_id);
                            ?> 
                            <li>
                                <a href="#" class='boximg'>
                            <?php
                            $new_arg = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => $user_post_type, 'author' => $post_authur_id);
                            $the_query_new_arg = new WP_Query($new_arg);

                            if ($the_query_new_arg->have_posts()) : while ($the_query_new_arg->have_posts()) : $the_query_new_arg->the_post();

                            
                                    if (has_post_thumbnail()) {
                                       
                                        the_post_thumbnail();
						
										
                                    } else {
                                        $img = wp_get_attachment_image_src(1336);
                                        echo "<img src='" . $img[0] . "'/>";
									  // echo "<div class='msgthumb' style='background-image:url(".$img[0].")'></div>";
                                    }

                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                                    <span><b><?php echo get_userdata($post_authur_id)->display_name; ?></b> ( <?php echo $user_post_type = the_author_meta('entity', $post_authur_id) ?> )<br/><small><?php echo $posts->post_content; ?></small> <br><small class="ltfont">  <?php echo $posts->post_modified_gmt; ?> </small> </span>	

                                </a></li>
<?php endwhile; ?>
                    </ul>  <!-- **dt-sc-tabs-frame - Ends** -->

                    <!-- **dt-sc-tabs-frame-content - Starts** -->


<?php
$question = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => 'question', 'meta_key' => 'To Whom Question Asked', 'meta_query' => array(array(
                            'key' => 'To Whom Question Asked',
                            'value' => $ask_question_id,
                            'type' => 'numeric'
                        ))
                );

                $question_query = new WP_Query($question);

while ($question_query->have_posts()) : $question_query->the_post();
    $posts = $question_query->post;
    $post_authur_id = $posts->post_author;
    $user_post_type = get_the_author_meta('entity', $post_authur_id);
    ?>
                        <div class="dt-sc-tabs-frame-content prinfo">
                            <div class="qcommet">
                                <div class="thumbN w10p">
    <?php
    $new_arg = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => $user_post_type, 'author' => $post_authur_id);
    $the_query_new_arg = new WP_Query($new_arg);

    if ($the_query_new_arg->have_posts()) : while ($the_query_new_arg->have_posts()) : $the_query_new_arg->the_post();

            if (has_post_thumbnail()) {


                the_post_thumbnail();
            } else {

                $img = wp_get_attachment_image_src(1336);

                echo "<img src='" . $img[0] . "' />";
            }

        endwhile;
    // wp_reset_postdata();
    endif;
    ?>
                                </div>
                                <div class="thumb_info w90p"><b><a href="javascript:void(0);" onclick="window.location.href = '<?= get_the_permalink(); ?>?id=post_details'"><?php echo get_userdata($post_authur_id)->display_name; ?></a></b> ( <?php echo $user_post_type = the_author_meta('entity', $post_authur_id) ?> ) <br/><p><?php echo $posts->post_content; ?></p></div>
                            </div>

                            <div class="replyform"> 
    <?php
    $reply = array('offset' => 0, 'post_type' => 'question', 'author' => $current_user->ID, 'post_parent' => $posts->ID);
    $reply_query = new WP_Query($reply);
    if (($reply_query->have_posts())) {
        while ($reply_query->have_posts()) : $reply_query->the_post();

            $post_reply = $reply_query->post;
            $post_reply_authur_id = $post_reply->post_author;
            $user_post_type_reply = get_the_author_meta('entity', $post_reply_authur_id);
            ?>
                                        <div class="thumbN w10p">   <?php
                                        if ($post_reply->post_status == 'publish') {
                                            $new_arg = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => $user_post_type_reply, 'author' => $post_reply_authur_id);
                                            $the_query_new_arg = new WP_Query($new_arg);

                                            if ($the_query_new_arg->have_posts()) : while ($the_query_new_arg->have_posts()) : $the_query_new_arg->the_post();

                                                    if (has_post_thumbnail()) {


                                                        the_post_thumbnail();
                                                    } else {

                                                        $img = wp_get_attachment_image_src(1336);

                                                        echo "<img src='" . $img[0] . "' />";
                                                    }

                                                endwhile;
                                            endif;
                                        }
                                        ?> </div>
                                            <?php if ($post_reply->post_status == 'publish') { ?>
                                            <div class="thumb_info w90p"><b><?php echo get_userdata($post_reply_authur_id)->display_name; ?></b> <p><?php echo $post_reply->post_content; ?> </p></div>

                                            <?php
                                            }
                                        endwhile;
                                    } else {
                                        ?>


                                    <form id="meh">
                                    <?php $current_user = wp_get_current_user(); ?>

                                        <input type="hidden" name="question_id"  value="<?php echo $posts->ID; ?>">
                                        <input  type="hidden" name="authorId" id="authorId" value="<?= $current_user->id ?>" />
                                        <input  type="hidden" name="fromName" id="fromName" value="<?= $current_user->user_firstname ?>" />
                                        <input  type="hidden" name="fromEntity" id="fromEntity" value="<?= get_user_meta($current_user->id, "entity", true); ?>" />
                                        <input type="hidden" name="corporate_id" id="corporate_id" value="<?= $posts->ID; ?>">
                                        <input  type="hidden" name="toName" id="toName" value="<?= get_userdata($post_authur_id)->display_name; ?>" />
                                        <input  type="hidden" name="toEntity" id="toEntity" value="<?= the_author_meta('entity', $post_authur_id); ?>" />
                                        <textarea placeholder="Reply" name="replymessage" class="replytextarea" required=""></textarea>
                                        <input type="button" value="Submit" name="submit" id="reply">
                                    </form>

    <?php } ?></div>
                        </div>
<?php endwhile; ?>






                </div>

            </div> <!-- **dt-sc-tabs-frame-content - Ends** -->

            <!-- **dt-sc-tabs-frame-content - Starts** -->
            <div class="dt-sc-tabs-frame-content" style="padding:0;" >
            <div class="dt-sc-tabs-container type2 woocommerce-tabs" id="pr_view">
            <!-- **dt-sc-tabs-frame - Starts** -->
            <ul class="dt-sc-tabs-frame msgli">
                <?php
                
               $question = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => 'question','author' => $current_user->ID, 'post_parent'=> 0);

$question_query = new WP_Query($question);
    
                
                
                while ($question_query->have_posts()) : $question_query->the_post();
                    $posts = $question_query->post;
                    $post_authur_id = $posts->post_author;
                    $user_post_type = get_the_author_meta('entity', $post_authur_id);
                    $asdf = (get_post_meta(get_the_ID(), 'To Whom Question Asked', true));
                    $post_author_id_new = get_post_field( 'post_author', $asdf );
                    $bb = get_the_author_meta('entity', $post_author_id_new);
                    ?> 
                    <li>
                          <a href="#" class='boximg'>
                            <?php
                             $user_post_type = get_the_author_meta('entity', $post_authur_id);
                        $new_arg = array('offset' => 0, 'post_type' => get_the_author_meta('entity', $post_author_id_new), 'author' => $post_author_id_new ,'post_parent'=> 0);   
                             $the_query_new_arg = new WP_Query($new_arg);

                            if ($the_query_new_arg->have_posts()) : while ($the_query_new_arg->have_posts()) : $the_query_new_arg->the_post();

                                    if (has_post_thumbnail()) {

                                        the_post_thumbnail();
                                    } else {

                                        $img = wp_get_attachment_image_src(1336);

                                        echo "<img src='" . $img[0] . "' />";
                                    }

                                endwhile;
                                 wp_reset_postdata();
                            endif;
                            ?>
                            <span><b><?php echo get_author_name( $post_author_id_new );; ?></b> ( <?php echo get_the_author_meta('entity', $post_author_id_new); ?> )<br/><small><?php echo $posts->post_content; ?><br><?php echo $posts->post_modified_gmt; ?> </small> </span>	

                        </a>
                    </li>
<?php endwhile; ?>
            </ul>  <!-- **dt-sc-tabs-frame - Ends** -->

            <!-- **dt-sc-tabs-frame-content - Starts** -->


<?php
$question = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => 'question','author' => $current_user->ID , 'post_parent'=> 0);

$question_query = new WP_Query($question);
while ($question_query->have_posts()) : $question_query->the_post();
    $posts = $question_query->post;
    $post_authur_id = $posts->post_author;
    $user_post_type = get_the_author_meta('entity', $post_authur_id);
    ?>
                <div class="dt-sc-tabs-frame-content prinfo">
                    <div class="qcommet">
                        <div class="thumbN w10p">
    <?php
    $new_arg = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => $user_post_type, 'author' => $post_authur_id);
    $the_query_new_arg = new WP_Query($new_arg);

    if ($the_query_new_arg->have_posts()) : while ($the_query_new_arg->have_posts()) : $the_query_new_arg->the_post();

            if (has_post_thumbnail()) {


                the_post_thumbnail();
            } else {

                $img = wp_get_attachment_image_src(1336);

                echo "<img src='" . $img[0] . "' />";
            }

        endwhile;
        // wp_reset_postdata();
    endif;
    ?>
                        </div>
                        <div class="thumb_info w90p"><b><a href="javascript:void(0);" onclick="window.location.href = '<?= get_the_permalink(); ?>?id=post_details'"><?php echo get_userdata($post_authur_id)->display_name; ?></a></b> ( <?php echo $user_post_type = the_author_meta('entity', $post_authur_id) ?> ) <br/><p><?php echo $posts->post_content; ?></p></div>
                    </div>

                    <div class="replyform"> 
    <?php
    
    $reply = array('offset' => 0, 'post_type' => 'question',  'post_parent' => $posts->ID );
    $reply_query = new WP_Query($reply);
    if (($reply_query->have_posts())) 
        {
        while ($reply_query->have_posts()) : $reply_query->the_post();

            $post_reply = $reply_query->post;
            $post_reply_authur_id = $post_reply->post_author;
            $user_post_type_reply = get_the_author_meta('entity', $post_reply_authur_id);
           
            ?>
                                <div class="thumbN w10p">   <?php
                                 if($post_reply->post_status=='publish') {
                                $new_arg = array('posts_per_page' => -1, 'offset' => 0, 'post_type' => $user_post_type_reply, 'author' => $post_reply_authur_id);
                                $the_query_new_arg = new WP_Query($new_arg);

                                if ($the_query_new_arg->have_posts()) : while ($the_query_new_arg->have_posts()) : $the_query_new_arg->the_post();

                                        if (has_post_thumbnail()) {


                                            the_post_thumbnail();
                                        } else {

                                            $img = wp_get_attachment_image_src(1336);

                                            echo "<img src='" . $img[0] . "' />";
                                        }

                                    endwhile;
                                 endif;
                                 
                                        }
          
                                ?> </div>
                        <?php if($post_reply->post_status=='publish') { ?>
                                <div class="thumb_info w90p"><b><?php echo get_userdata($post_reply_authur_id)->display_name; ?></b> <p><?php echo $post_reply->post_content; ?> </p></div>

            <?php }
        endwhile;
    } 
        ?>

</div>
                </div>
                    <?php endwhile; ?>






        </div>
                <div class="dt-sc-margin10"></div>
            </div> <!-- **dt-sc-tabs-frame-content - Ends** -->


        </div> <!-- **dt-sc-tabs-container - Ends** -->
















    </div> <!-- **container - Ends** -->






</div>

<!-- **Full-width-section - Starts** -->




<!-- **dt-sc-partner-carousel-wrapper - Starts** -->




</div><!-- **Full-width-section - Ends** -->
<div class="dt-sc-margin65"></div>

<?php get_footer(); ?>

<script>
    $ = jQuery;
    $(document).ready(function () {
        $('#reply').click(function () {


            $.ajax({
                url: "/insert-reply/",
                type: 'POST',
                data: $('#meh').serialize(),
                success: function (msg) {
                    $('#success').html(msg)
                    //alert('success');
                    location.reload();
                }
            });
        });

    });

</script>
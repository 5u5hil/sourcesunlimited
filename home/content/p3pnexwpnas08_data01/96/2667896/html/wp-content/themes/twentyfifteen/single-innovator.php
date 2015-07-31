<?php
chkLogin();
$current_user = wp_get_current_user();
$user_id = $current_user->ID;

$user_like = get_post_meta(get_the_ID(), 'Show Interest', true);
// echo $user_like;
$user = json_decode($user_like, true);

$userId = array();


foreach ($user as $value) {


    array_push($userId, $value['id']);
}

$interested_in_ivesting = get_post_meta(get_the_ID(), 'Interested in Investing', true);
// echo $user_like;
$interested = json_decode($interested_in_ivesting, true);
$investorID = array();

foreach ($interested as $interestedvalue) {


    array_push($investorID, $interestedvalue['id']);
}

$interested_in_incubating = get_post_meta(get_the_ID(), 'Interested in Incubating', true);
// echo $interested_in_incubating;
$incubating = json_decode($interested_in_incubating, true);
// print_r($incubating); // die;
$incubatorID = array();

foreach ($incubating as $incubatingvalue) {


    array_push($incubatorID, $incubatingvalue['id']);
}
get_header();
?>

<div class="parallax full-width-bg lr_widget">

    <div class="container">

        <div class="main-title">

            <div class="column dt-sc-three-fifth first">

                <h1>Innovator Details</h1>

            </div>



        </div>

    </div>

</div>

<div class="dt-sc-margin30"></div>

<div class="container">

    <!-- Primary Starts -->

    <section id="primary" class="content-full-width invt_det">

        <?php
        while (have_posts()) : the_post();
           $timezone = +5.50;
  $date = gmdate("F d, Y H:i:s", time() + 3600*($timezone+date("I")));
            setPostViews(get_the_ID(), $date);
            ?>    

            <div class="column dt-sc-one-fourth first" >
                <div class="id_logo">
                    <div class="portfolio-thumb">

                        <?php
                        if (has_post_thumbnail()) {

                            the_post_thumbnail();
                        } else {

                            $img = wp_get_attachment_image_src(756);

                            echo "<img src='" . $img[0] . "' />";
                        }
                        ?>

                    </div>
                </div>

                <div class="btn-detail"> <a href="#askque" class="dt-sc-button btn">Ask Question </a> </div>


                <?php
                $current_user = wp_get_current_user();

                if (get_user_meta($current_user->ID, "entity", true) == 'mentor') {
                    if (in_array($user_id, $userId)) {
                        ?>  <div class="btn-detail"> <a  href="javascript:void(0);"   class="dt-sc-button btn disablebtn">Show Interest</a> </div><?php
                    } else {
                        ?>
                        <div class="btn-detail"> <a  href="javascript:void(0);"  onclick="setInterests('<?= get_the_ID() ?>');" class="dt-sc-button btn ">Show Interest</a> </div>
                    <?php } ?>

                <?php
                } else if (get_user_meta($current_user->ID, "entity", true) == 'investor') {

                    if (in_array($user_id, $investorID)) {
                        ?> 
                        <div class="btn-detail"> <a  href="javascript:void(0);"   class="dt-sc-button btn disablebtn">Interested in Investing</a> </div>
                    <?php } else {
                        ?>
                        <div class="btn-detail"> <a  href="javascript:void(0);"  onclick="Interestedininvesting('<?= get_the_ID() ?>')" class="dt-sc-button btn ">Interested in Investing</a> </div>
                        <?php
                    }
                    ?>


                <?php } else if (get_user_meta($current_user->ID, "entity", true) == 'corporate') { ?>

                <?php } else if (get_user_meta($current_user->ID, "entity", true) == 'institute') { ?>

                <?php
                } else if (get_user_meta($current_user->ID, "entity", true) == 'incubator') {
                    if (in_array($user_id, $incubatorID)) {
                        ?>
                        <div class="btn-detail">  <a  href="javascript:void(0);" class="dt-sc-button btn disablebtn" >Show Interest</a> </div>
                    <?php } else { ?>
                        <div class="btn-detail">  <a  href="javascript:void(0);" class="dt-sc-button btn" onclick="setincubating('<?= get_the_ID() ?>')"> Show Interest</a> </div>
        <?php }
    }
    ?>
            </div>
            <div class="column dt-sc-three-fourth">


                <h4 class="id_title"><?= the_title(); ?></h4>
                <div class="column dt-sc-one-half first">
                    <p class="detail_info"> <i class="fa fa-envelope"></i> Status of Patent: <?php
                        if (get_post_meta(get_the_ID(), 'Status of patent', true)) {

                            echo (get_post_meta(get_the_ID(), 'Status of patent', true));
                        } else
                            echo "Not Avail."
                            ?> </p>
                    <p class="detail_info bord_bottom1"> <i class="fa fa-calendar"></i> S/A Year: <?php
                        if ((get_post_meta(get_the_ID(), 'sayear', true)))
                            echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'sayear', true));
                        else
                            echo "Not Avail.";
                        ?> </p>
                </div>
                <div class="column dt-sc-one-half ">
                    <p class="detail_info"> <i class="fa fa-envelope"></i> Sectors: <?php
                        if (get_post_meta(get_the_ID(), 'Sector', true)) {
                            foreach (explode(",", get_post_meta(get_the_ID(), 'Sector', true)) as $institute) {
                                ?>
                                <?php echo get_the_category_by_ID($institute); ?>
                            <?php
                            }
                        } else
                            echo "Not Avail."
                            ?> </p>
                    <p class="detail_info bord_bottom1"> <i class="fa fa-calendar"></i> One Line Pitch: <?php
                if ((get_post_meta(get_the_ID(), 'sayear', true)))
                    echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'One line pitch', true));
                else
                    echo "Not Avail.";
                        ?> </p>
                </div>
                    <?php if ($current_user->roles[0] == 'administrator') { ?>
                    <div class="column dt-sc-one-half first">
                        <?php
                        $attachment_docs = get_post_meta(get_the_ID(), 'File Attach', true);

                        // echo get_attached_file($attachment_docs);
                        $business = json_decode($attachment_docs, true);
                        if ($business) {
                            foreach ($business as $business_plan) {
                                ?>
                                <p class="detail_info bord_bottom1"> <i class="fa fa-file-text-o"></i> <a href="<?php echo wp_get_attachment_url($business_plan); ?>" target="_blank">Click here for Business Plan</a>  </p>
                            <?php }
                        } ?>
                    </div>
                    <div class="column dt-sc-one-half ">
        <?php
        $video_link = get_post_meta(get_the_ID(), 'Video Link', true);
        if ($video_link) {
            ?>

                            <p class="detail_info bord_bottom1"> <i class="fa fa-film"></i> <a href="<?php echo $video_link; ?>" target="_blank" >Click here to see Video</a></p>  
        <?php } ?>
                    </div>
    <?php } ?>


                <div class="clearfix clear"></div>

                <div class="dt-sc-margin20 "></div>
                <div class="clearfix clear"></div>



                <div class="full-width">

                    <blockquote class="type2"> 

                        <p><q>Summary of Innovation: <?php if(get_post_meta(get_the_ID(), 'Summary of innovation', true)) { echo get_post_meta(get_the_ID(), 'Summary of innovation', true); } else { echo "Not Avail.";} ?></q> </p>
                        <p><q>Key Differentiator/USP: <?php if(get_post_meta(get_the_ID(), 'Key differentiator/ISP', true)) { echo get_post_meta(get_the_ID(), 'Key differentiator/ISP', true); } else { echo "Not Avail.";}  ?></q> </p>
                        <p> <q>Summary of Problem Addressed: <?php if(get_post_meta(get_the_ID(), 'Summary of market addressed', true)) { echo get_post_meta(get_the_ID(), 'Summary of market addressed', true); } else { echo "Not Avail.";}  ?></q> </p>



                    </blockquote>
                    <div class="dt-sc-margin20"></div>

                    <div class="id_contact " id="askque">

                        <p class="ptb3"><span class="fa fa-map-marker">  </span>  City of Location : <?php if(get_post_meta(get_the_ID(), 'Address', true)) { echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Address', true));  } else { echo "Not Avail.";} ?> </p>
                    </div>

                    <ul class="dt-sc-social-icons">
    <?php if (get_post_meta(get_the_ID(), 'Facebook', true)) { ?>
                            <li><a class="dt-sc-tooltip-top" href="<?php echo get_post_meta(get_the_ID(), 'Facebook', true); ?>" target="_blank"> <i class="fa fa-facebook"></i> </a></li><?php } ?>
    <?php if (get_post_meta(get_the_ID(), 'Twitter', true)) { ?>
                            <li><a class="dt-sc-tooltip-top" href="<?php echo get_post_meta(get_the_ID(), 'Twitter', true); ?>" target="_blank"> <i class="fa fa-twitter"></i> </a></li><?php } ?>

                    </ul>
                </div>

                <div class="dt-sc-margin20"></div>
                <div class="full-width">
                    <h4 class="id_title"> Ask a Question </h4>   
                    <form id="meh">
                        <!--div class="column dt-sc-one-half first">
                        <p> <span> <input type="text" placeholder="Name*" name="your-name" value="" required=""> </span> </p>
                    </div>
                    <div class="column dt-sc-one-half">
                        <p> <span> <input type="email" placeholder="Email*" name="email" value="" required=""> </span> </p>
                    </div-->
    <?php $current_user = wp_get_current_user(); ?>

                        <input  type="hidden" name="authorId" id="authorId" value="<?= $current_user->id ?>" />
                        <input  type="hidden" name="fromName" id="fromName" value="<?= $current_user->user_firstname ?>" />
                        <input  type="hidden" name="fromEntity" id="fromEntity" value="<?= get_user_meta($current_user->id, "entity", true); ?>" />
                        <input type="hidden" name="corporate_id" id="corporate_id" value="<?= get_the_ID() ?>">

                        <input  type="hidden" name="toName" id="toName" value="<?= get_the_author() ?>" />
                        <input  type="hidden" name="toEntity" id="toEntity" value="<?= get_the_author_meta("entity"); ?>" />

                        <p> <textarea placeholder="Message" id="message" name="your_meassage" required=""></textarea> </p>
                        <div class="dt-sc-margin10"></div>
                        <div id="success"></div>
                        <p> <input type="button" value="Submit" name="submit"    id="question" class="button"> </p>
                    </form>
                </div>
    <?php
endwhile;
?>
    </section>


</div>
</div>

<div class="dt-sc-hr-invisible"></div>		 <!-- **container - Ends** --> 

<?php get_footer(); ?>

<script>
                            $ = jQuery;
                            $(document).ready(function () {
                                $('#question').click(function () {


                                    $.ajax({
                                        url: "/insert-question/",
                                        type: 'POST',
                                        data: $('#meh').serialize(),
                                        success: function (msg) {
                                            $('#success').html(msg)

                                        }
                                    });
                                });


                            });
                            function setInterests(id) {
                                // alert(id);
                                $.ajax({
                                    url: "/insert-interest/",
                                    type: 'POST',
                                    data: {id: id},
                                    success: function (msg) {
                                        //   alert("Showed Interest");
                                        location.reload();
                                    }
                                });
                            }


                            function Interestedininvesting(id) {
                                // alert("dgsdgsdg");
                                $.ajax({
                                    url: "/insert-investing/",
                                    type: 'POST',
                                    data: {id: id},
                                    success: function (msg) {
                                        //   alert("Interested in Investing");
                                        location.reload();
                                    }
                                });
                            }
                            function setLikes(id) {
                                $.ajax({
                                    url: "/insert-like/",
                                    type: 'POST',
                                    data: {id: id},
                                    success: function (msg) {
                                        //        alert("Liked");
                                        location.reload();
                                    }
                                });
                            }

                            function setincubating(id) {
                                //  alert(id);
                                $.ajax({
                                    url: "/insert-incubator/",
                                    type: 'POST',
                                    data: {id: id},
                                    success: function (msg) {
                                        //   alert("Liked");
                                        location.reload();
                                    }
                                });
                            }

</script>
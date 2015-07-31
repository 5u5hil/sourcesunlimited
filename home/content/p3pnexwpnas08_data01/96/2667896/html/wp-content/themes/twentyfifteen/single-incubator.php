<?php
chkLogin();
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
 
                      $user_like = get_post_meta(get_the_ID(), 'User Likes', true);
                     // echo $user_like;
                      $user = json_decode($user_like, true);
                      
                      $userId = array();


foreach ($user as $value) {


    array_push($userId, $value['id']);
}

get_header();
?>

<div class="parallax full-width-bg lr_widget">

    <div class="container">

        <div class="main-title">

            <div class="column dt-sc-three-fifth first">

                <h1>Incubator Details</h1>

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
            setPostViews(get_the_ID(),$date);
           // setPostLikes(get_the_ID());
            ?>    

            <div class="column dt-sc-one-fourth first" >
                <div class="id_logo">
                     <div class="portfolio-thumb">

                            <?php
                            if (has_post_thumbnail()) {

                                the_post_thumbnail();
                            } else {

                                $img = wp_get_attachment_image_src(414);

                                echo "<img src='" . $img[0] . "' />";
                            }
                            ?>

                        </div>
                </div>
          <br>   
              
 <div> <a href="#askque" class="dt-sc-button btn">Ask Question</a> 
                </div>
                <br>
               <div> 
                    <?php 
                   
            
                     if(in_array($user_id, $userId)) {
                      
                         ?><div ><a  href="javascript:void(0);" class="dt-sc-button btn" style="background-color:#cccccc !important;">Value Added</a></div>
                     <?php } else {?>
                    <a  href="javascript:void(0);" class="dt-sc-button btn" onclick="setLikes('<?= get_the_ID() ?>')">Value Added</a>
                     <?php } ?></div>
               
            </div>
            <div class="column dt-sc-three-fourth">

<!--               <h3 class="mb10"> <?php //  echo get_post_meta(get_the_ID(), 'incubator name', true); ?>  </h3>-->
               <h4 class="id_title"><?= the_title(); ?></h4>
                <div class="column dt-sc-one-half first">
                    <p class="detail_info"> <i class="fa fa-list-alt"></i> Selection criteria for Incubatees:  <span class="fblock"><?= get_post_meta(get_the_ID(), 'criteria incubatees', true); ?>  </span></p>
                    <p class="detail_info"> <i class="fa fa-check-circle"></i> Facilities Provided:  <span class="fblock"><?= get_post_meta(get_the_ID(), 'facilities provided', true); ?>  </span></p>
                  
                </div>
                <div class="column dt-sc-one-half ">
                    <p class="detail_info"> <i class="fa fa-crosshairs"></i> Objectives of the Incubation Center:  <span class="fblock"><?= get_post_meta(get_the_ID(), 'Incubation Center', true); ?>  </span></p>
                    <p class="detail_info"> <i class="fa fa-envelope"></i> Fees: <?php if((get_post_meta(get_the_ID(), 'fees incubatees', true))) echo (get_post_meta(get_the_ID(), 'fees incubatees', true)); else echo "Not Avail."; ?></q>  </p>
                   
                </div>
               
               <?php if($current_user->roles[0]=='administrator'){ ?>
                <div class="column dt-sc-one-half first">
                    <?php
                   
                    $attachment_docs =  get_post_meta(get_the_ID(), 'File Attach', true);
                        if($attachment_docs){    
                           // echo get_attached_file($attachment_docs);
                          $business = json_decode($attachment_docs, true);
                         if($business){
                          foreach ($business as $business_plan)
                          {
                    ?>
                    <p class="detail_info bord_bottom1"> <i class="fa fa-film"></i> Video: <a href="<?php echo wp_get_attachment_url($business_plan); ?>" target="_blank"><u> Business Plan </u></a> <br> </p>
                        <?php } } } ?>
                </div>
                
                 <?php } ?>

		
            <div class="clearfix clear"></div>

			
            <div class="clearfix clear"></div>
            <div class="full-width dt-sc-margin80">
<!--                <h4>Year Started :   <?php if((get_post_meta(get_the_ID(), 'year started', true))) echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'year started', true)); else echo "Not Avail."; ?></h4>-->
				
                <h4> Sector :<?php if(get_post_meta(get_the_ID(), 'Sector', true)) { foreach (explode(",", get_post_meta(get_the_ID(), 'Sector', true)) as $sector) { ?>
                                   <span class="fblock"> <?= get_the_category_by_ID($sector); ?> , </span>
                <?php } } else { echo "Not Avail.";}?> </span> </h4>
                <blockquote class="type2"> 

                    <q> <strong><?php if(get_post_meta(get_the_ID(), 'Independant or Associated', true) == 'Associated') { echo "Associated With: ";
                                   
                                    } else { echo "Independent Incubator";}?></strong><br/>
                                     <p><?php if(get_post_meta(get_the_ID(), 'Independant or Associated', true) == 'Associated') { if(get_post_meta(get_the_ID(), 'Institute Name', true))  { echo 'Institute - ';  foreach (explode(",", get_post_meta(get_the_ID(), 'Institute Name', true)) as $idd) { ?>
                                   <?= get_the_category_by_ID($idd); ?>
            <?php } } elseif(get_post_meta(get_the_ID(), 'Corporate', true)) { echo 'Organization - '; echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Corporate', true)); }
            elseif(get_post_meta(get_the_ID(), 'Investment Network', true)) { echo 'Investment Network - '; echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Investment Network', true)); }
                                     elseif(get_post_meta(get_the_ID(), 'Other associate', true)) { echo 'Other - '; echo (get_post_meta(get_the_ID(), 'Other associate', true)); } else { echo "Not Avail.";} }?></p></q> 

                </blockquote>
                <div class="dt-sc-margin20"></div>
                
                <div class="id_contact" id="askque">

                    <p class="ptb3"><span class="fa fa-map-marker">  </span>  City of Location: <?php if(get_post_meta(get_the_ID(), 'Address', true)) { echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Address', true));  } else { echo "Not Avail.";} ?> </p>
                </div>
				<br/>
                <ul class="dt-sc-social-icons">
                    <li><a class="dt-sc-tooltip-top" href="#" target="_blank"> <i class="fa fa-facebook"></i> </a></li>
                    <li><a class="dt-sc-tooltip-top" href="#" target="_blank"> <i class="fa fa-twitter"></i> </a></li>

                </ul>
            </div>	
			 <div class="clearfix clear"></div>	
		
                         <div class="full-width" >
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
                    <p> <input type="button" value="Submit" name="submit"  id="question" class="button"> </p>
                </form>
            </div>
            <?php
        endwhile;
        ?>	
				
				
            </div>
  

            
    </section>



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
    
    function setLikes(id) {
                        $.ajax({
                            url: "/insert-like/",
                            type: 'POST',
                            data: {id: id},
                            success: function (msg) {
                           //     alert("Liked");
location.reload();
                            }
                        });
                    }
</script>



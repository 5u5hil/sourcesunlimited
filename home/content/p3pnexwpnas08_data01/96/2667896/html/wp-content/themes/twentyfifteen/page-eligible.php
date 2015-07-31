<?php get_header();
?>

<?php
$total = '0';

$eligible = array("AA" => "Upto 50 Lakhs",
    "BB" => "50 Lakhs to 1 crore",
    "CC" => "1 crore to 5 crores",
    "DD" => "5 crores to 10 crores",
    "EE" => "10 crore to 20 crores",
    "FF" => "20 crores to 30 crores",
    "GG" => "More than 30 crores");



foreach ($_POST as $key => $value) {


    if (is_numeric($value))
        $total += $value;
}
?>

<?php
$user = wp_get_current_user();
$args = array('offset' => 0, 'post_type' => 'startup', 'author' => $user->ID);

$the_query = new WP_Query($args);

$post = $the_query->post;
$post_id = $post->ID;

update_post_meta($post_id, 'Questionnaire Date', date('Y-m-d'), true);
update_post_meta($post_id, 'Questionnaire Score', $total, true);
?>


<div class="parallax full-width-bg">
    <div class="container">
        <div class="main-title">
            <h1>Evaluation Result</h1>

        </div>
    </div>
</div>
<div class="dt-sc-margin50"></div>    
<!-- Container starts-->
<div class="container">
    <!-- **primary - Starts** --> 
    <section id="primary" class="content-full-width">
        <!-- **woocommerce - Starts** --> 
        <div>

            <?php
            $date = strtotime("+21 day");
            $till = date('d M, Y', $date);
            
          $date2 = strtotime("+90 day");
            $till2 = date('d M, Y', $date2);

            $success = "Congratulations! You have qualified for a funding of " . $eligible[$_POST['fundingreq']] . " from IvyCamp. <br /><br />

Our team shall evaluate your Business Plan and revert back soon.<br /><br /> Should you not hear back from by $till, please write to us at ivycamp@ivycapventures.com";
            
            $fail = "Thank you for filling in the required details.<br /><br /> Unfortunately, we shall not be able to process your funding application right now. Please try again after $till2. <br /><br />

If you feel that your details have not been correctly filled, please write to us at ivycamp@ivycapventures.com"
            
            ?>


            <h4><?= $total > 6 ? $success : $fail; ?></h4>
        </div>
        <div class="dt-sc-margin50"></div>

    </section> <!-- **Primary - Ends** -->          

</div> <!-- **container - Ends** --> 
<?php get_footer(); ?>
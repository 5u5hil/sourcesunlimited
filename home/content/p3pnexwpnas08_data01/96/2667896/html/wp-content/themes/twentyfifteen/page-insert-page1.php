<?php

global $current_user;
get_currentuserinfo();


if (!function_exists('wp_handle_upload'))
    require_once( ABSPATH . 'wp-admin/includes/file.php' );

require_once(ABSPATH . 'wp-admin/includes/image.php');

$postCats = array($_POST['startup_stage']);


print_r($postCats);
$mentoring_array = array();

if (isset($_POST['mentoring'])) {

    $mentoring = $_POST['mentoring'];
    //  var_dump($mentoring);
    $mcount = count($_POST['mentoring']);
    // die;
    for ($i = 0; $i < $mcount; $i++) {


        if ($mentoring[$i] == 'other') {
            $arg = array('parent' => 50);
            $my_cat_id = wp_insert_term($_POST['add_mentoring'], "category", $arg);
            $new_mentoring_cat = $my_cat_id['term_id'];
        } else {

            array_push($mentoring_array, $mentoring[$i]);
        }
    }
    if (isset($new_mentoring_cat)) {
        array_push($mentoring_array, $new_mentoring_cat);
    }

    $postCats = array_merge($postCats, $mentoring_array);
}


//    if (!empty($_POST['add_mentoring'])) {
//        $arg = array('parent' => 50);
//        $my_cat_id = wp_insert_term($_POST['add_mentoring'], "category", $arg);
//        $mentoring = $my_cat_id['term_id'];
//        array_push($postCats, $my_cat_id['term_id']);
//        }
//        // } else {
//        $mentoring = $_POST['mentoring'];
//        //$postCats = array_merge($postCats, $mentoring);
//        
//        $count = count($mentoring);
//     
//       for($i=0; $i<$count; $i++)
//       {
//           if($mentoring[$i]!='other')
//           {
//               array_push($postCats, $mentoring[$i]);
//           }
//           
//       }


if (!empty($_POST['add_member'])) {
    $arg = array('parent' => 28);
    $my_cat_id = wp_insert_term($_POST['add_member'], "category", $arg);
    $member = $my_cat_id['term_id'];
    array_push($postCats, $my_cat_id['term_id']);
} else {
    $member = $_POST['key_member'];
    $postCats = array_merge($postCats, $_POST['key_member']);
}

if (isset($_POST['institute_name'])) {
// echo "sus";
    if (!empty($_POST['add_institute'])) {
        // echo "bhava";
        $arg = array('parent' => 18);
        $my_cat_id = wp_insert_term($_POST['add_institute'], "category", $arg);
        $institute = $my_cat_id['term_id'];
        array_push($postCats, $my_cat_id['term_id']);
    }
//} else {
// echo "bhava1";
    $institute = $_POST['institute_name'];
    //$postCats = array_merge($postCats, $ins titute);
    $count = count($institute);

    for ($i = 0; $i < $count; $i++) {
        if ($institute[$i] != 'other') {
            array_push($postCats, $institute[$i]);
        }
    }
}
?>




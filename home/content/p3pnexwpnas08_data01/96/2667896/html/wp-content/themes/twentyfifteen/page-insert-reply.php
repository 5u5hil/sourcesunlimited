<?php
 //print_r($_POST); die;
$authorId = $_POST['authorId'];
$fromName = $_POST['fromName'];
$fromEntity = $_POST['fromEntity'];
$toName = $_POST['toName'];
$toEntity = $_POST['toEntity'];
$message = $_POST['replymessage'];
$_POST['corporate_id'];
$parent_post_id = $_POST['question_id'];
$idObj = get_category_by_slug($_POST['fromEntity'].'-'.$_POST['toEntity']); 
$id = $idObj->term_id;
  //var_dump($idObj); die;
//echo "<br>";

$my_post = array(
                    'post_title' => $_POST['fromName'].' to '.$_POST['toName'],
                    'post_content'=>$message,
                    'post_status' => 'private',
                    'post_category' =>array($id),
                    'post_type' => 'question', 
                    'post_author' => $authorId,
                    'post_parent' => $parent_post_id,);
            $post_id = wp_insert_post($my_post);
           // var_dump($post_id); die;
//$status=  get_post_status( $post_id );
update_post_meta($post_id, 'To Whom Question Asked', $parent_post_id, true);        
            
echo "submitted successfully"; 
// print_r($_POST); die;
?>

<?php
 $authorId = $_POST['authorId'];
$fromName = $_POST['fromName'];
$fromEntity = $_POST['fromEntity'];
$toName = $_POST['toName'];
$toEntity = $_POST['toEntity'];
$message = $_POST['your_meassage'];
$_POST['corporate_id'];
$idObj = get_category_by_slug($_POST['fromEntity'].'-'.$_POST['toEntity']); 
 $id = $idObj->term_id;
 // var_dump($idObj); die;
$my_post = array(
                    'post_title' => $_POST['fromName'].' to '.$_POST['toName'],
                    'post_content'=>$message,
                    'post_status' => 'private',
                    'post_category' =>array($id),
                    'post_type' => 'question', 
                    'post_author' => $authorId);
            $post_id = wp_insert_post($my_post);
//var_dump($post_id); 
//$status=  get_post_status( $post_id );
update_post_meta($post_id, 'To Whom Question Asked', $_POST['corporate_id'], true);        
            
echo "Question submitted successfully"; 

//setPostQuestions($_POST['corporate_id']);

?>
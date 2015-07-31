<?php 
// $user_id = get_current_user_id(); //die;
//$count_like = get_post_meta($_REQUEST['id'], 'Show Interest', true);
//    $user = json_decode($count_like, true);
////print_r($user); die;
//  
////echo "<br>";
   //die;
//  $array = array(
//  'id' => $user_id,
//  'time' => $date,
//);
// 
//function searchForKey($keyy, $value, $array) {
//       foreach ($array as $key => $val) {
//         // echo $val[$keyy];
//           if ($val[$keyy] == $value) {
//               return TRUE;
//           }
//       }
//       return FALSE;
//   }
//  
//  
//  
//  
//  if(!searchForKey('id',$user_id, $user))
//  {
//      array_push($user,$array);
//      update_post_meta($_REQUEST['id'], 'Show Interest', json_encode($user));
//  }
//  
//  
//
//  
//
// foreach($user as $value){
//
//    echo $value['time']."--";
//    echo $value['id'];
//    echo "<br>";
//
// }
//
//die;
$timezone = +5.50;
  $date = gmdate("F d, Y H:i:s", time() + 3600*($timezone+date("I")));
   setPostInterests($_REQUEST['id'],$date);

?>
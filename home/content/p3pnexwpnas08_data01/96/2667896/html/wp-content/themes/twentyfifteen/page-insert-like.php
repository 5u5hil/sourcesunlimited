<?php
$timezone = +5.50;
  $date = gmdate("F d, Y H:i:s", time() + 3600*($timezone+date("I")));
   setPostLikes($_REQUEST['id'],$date);

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ob_start();



 echo "<center><h3>".$Blogger_name."'s Blog feed</h3></center>"; 
    
        
    $i=0;

     foreach($temp_array as $result)
   {
     
       echo "<h4>".$result['blog_topic']."</h4>"; 
       echo br();
      echo ellipsize($result['content'], 32, 1);
      echo br(2);

     $i++;

    }


    

?>




<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>


<!DOCTYPE html>

<html>
<head>
  <title></title>
<style>

#home_link a{
float:left;
}

</style>
</head>
<body>
<div style="height:500px; width:100%; border:2px solid #000; float:left;"  >

<?php



if($this->Home_model->_check_module_task_auth()&&isset($temp_array)&&isset($Blogger_name))
{

  
 
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


//Show pagination links
 

echo "<li>". $links."</li>"; 

?>


<div id="home_link"><a href= <?php echo base_url();?>index.php/HomeController/>Home</a></div>

<?php

     
}

else{

 //redirect('/HomeController');
  $this->load->view('UserHomeView');
   
//die;
}

?>

</div>

</body>
</html>


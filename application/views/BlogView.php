<?php



if($this->Home_model->_check_module_task_auth()&&isset($temp_array)&&isset($Blogger_name))
{

  
 
    echo "<center><h3>".$Blogger_name."'s Blog feed</h3></center>"; 
    
        
    $i=0;

     foreach($temp_array as $result)
   {
     
       echo $result['blog_topic']; 
       echo br(2);
      echo ellipsize($result['content'], 32, 1);
      echo br(3);

     $i++;

    }
     
}

else{

 header('location: http://127.0.0.1/NavRead/index.php/HomeController'
  );
die;
}



?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
//window.alert(5 + 6);
jQuery(document).ready(function($) {

     if (window.history && window.history.pushState) {

       $(window).on('popstate', function() {
         var hashLocation = location.hash;
         var hashSplit = hashLocation.split("#!/");
         var hashName = hashSplit[1];

         if (hashName !== '') {
           var hash = window.location.hash;
           if (hash === '') {
             //alert('Back button was pressed.');
               window.location='userregView';
               return false;
           }
         }
       });

       window.history.pushState('forward', null, './userregView');
     }

   });

</script>
</head>

</html>

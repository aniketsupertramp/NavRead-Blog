<html>

<head>
	<style type="text/css">
		
         #headerId{

          display:inline-block;

         }

         .welcomeClass{


         }

         .logoutClass{
              

              float: right; 
         }



	</style>
</head>

<body>
	

<div style="height:150px; width:100%; border:2px solid #000;">  

<?php 
 echo '<span><center><h2>  NAVREAD  - <i>blog the new in you</i></h2></center></span>';
 echo br(2);
 ?>

<div id="headerId" class="welcomeClass">
 <?php
 if($this->Home_model->_check_module_task_auth())
 {
 	echo '<h4>Welcome '.$this->session->userdata('email').'</h4>';
 ?>

 </div>
<div id="headerId" class="logoutClass">

<?php 	

   echo form_open('/HomeController/logoutAction');
   echo form_submit('submit','Log out');
  echo form_close();
 
 }
else{
	echo '<h4>Login/Signup to blog/subscribe or read.</h4>';
}
?>

</div>

</body>
</html>
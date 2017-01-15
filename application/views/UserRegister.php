<html>
<head>
   <style>
#formid{

display: inline-block;
    
    
   
}

fieldset{
    border-radius:15px;
}

.loginClass{
    width: 360px;
    height: 75px;
   
 margin-left :20px;
 margin-right:20px;
  
    margin-top: 0px;
   
}
.signupClass{
    width: 360px;
    height: 75px;
   
    margin-top: 60px;
     margin-left :20px;
 margin-right:20px;
  
}

.orClas{
  width:30px;
 border-radius: 30px;
 border-color: black;

}


body{
    width: 100%;
}


   </style> 
</head>
<body>

<?php



if($this->Home_model->_check_module_task_auth())
                {
            // redirect('/HomeController/userhomeView');
                    $this->load->view('UserHomeView');

             //die;

           }
else
{


if(isset($name)&&isset($emailid)&&isset($passwd)&&isset($Rpasswd))
{
	 validation_errors();

	echo 'Your name is '.$name.'<br/>';
	echo 'Your email-id is '.$emailid.'<br/>';
}

else{

echo validation_errors();
?>


<div class = "formClass">


<div class="signupClass" id ="formid">
 <fieldset>
    <legend>Sign Up</legend>
<?php
echo form_open('/HomeController/signupAction');

$name = array(
        'type'  => 'text',
        'name'  => 'name',
         'required' => 'required',
        'id'    => 'name',
        'placeholder' => 'Your Full Name Here',
        'class' => 'name'
);

$emailid = array(
        'type'  => 'email',
        'name'  => 'emailid',
        'id'    => 'emailid',
        'placeholder' => 'Your Email-id Here',
        'class' => 'emailid',
        'required' => 'required'
);

$passwd = array(
        'type'  => 'password',
        'name'  => 'passwd',
        'id'    => 'passwd',
        'placeholder' => 'Your Password Here',
        'class' => 'passwd',
        'required' => 'required'
);


$Rpasswd = array(
        'type'  => 'password',
        'name'  => 'Rpasswd',
        'id'    => 'Rpasswd',
        'placeholder' => 'Confirm Password',
        'class' => 'Rpasswd',
        'required' => 'required'
);

echo form_input($name);
echo br(2);
echo form_input($emailid);
echo br(2);
echo form_input($passwd);
echo br(2);
echo form_input($Rpasswd);
echo br(2);
echo form_submit('submit','Sign Up');

echo form_close();


?>
</fieldset>
</div>

<div class="orClass" id="formid">OR </div>

<div class ="loginClass" id ="formid" >

 <fieldset>
    <legend>Log In</legend>

<?php
///////////////////////////////////////////////////////////////


echo form_open('/HomeController/loginAction');



$emailid = array(
        'type'  => 'email',
        'name'  => 'emailid',
        'id'    => 'emailid',
        'placeholder' => 'Your Email-id Here',
        'class' => 'emailid',
        'required' => 'required'
);

$passwd = array(
        'type'  => 'password',
        'name'  => 'passwd',
        'id'    => 'passwd',
        'placeholder' => 'Your Password Here',
        'class' => 'passwd',
        'required' => 'required'
);


echo form_input($emailid);
echo br(2);
echo form_input($passwd);
echo br(2);
echo form_submit('submit','Log in');

echo form_close();

}


}

?>

</div>
</fieldset>
</div>
</body>
</html>

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
               window.location= './index';
               return false;
           }
         }
       });

       window.history.pushState('forward', null, './index');
     }

   });

</script>
</head>
</html>
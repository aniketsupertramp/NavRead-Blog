
<?php



if($this->Home_model->_check_module_task_auth())
                {
             header('location: http://127.0.0.1/NavRead/index.php/HomeController/userhomeView');
             die;

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

<?php
echo form_open('/HomeController/signupAction');

$name = array(
        'type'  => 'text',
        'name'  => 'name',
        'id'    => 'name',
        'placeholder' => 'Your Full Name Here',
        'class' => 'name'
);

$emailid = array(
        'type'  => 'email',
        'name'  => 'emailid',
        'id'    => 'emailid',
        'placeholder' => 'Your Email-id Here',
        'class' => 'emailid'
);

$passwd = array(
        'type'  => 'password',
        'name'  => 'passwd',
        'id'    => 'passwd',
        'placeholder' => 'Your Password Here',
        'class' => 'passwd'
);


$Rpasswd = array(
        'type'  => 'password',
        'name'  => 'Rpasswd',
        'id'    => 'Rpasswd',
        'placeholder' => 'Confirm Password',
        'class' => 'Rpasswd'
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




<?php
///////////////////////////////////////////////////////////////


echo form_open('/HomeController/loginAction');



$emailid = array(
        'type'  => 'email',
        'name'  => 'emailid',
        'id'    => 'emailid',
        'placeholder' => 'Your Email-id Here',
        'class' => 'emailid'
);

$passwd = array(
        'type'  => 'password',
        'name'  => 'passwd',
        'id'    => 'passwd',
        'placeholder' => 'Your Password Here',
        'class' => 'passwd'
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
             alert('Back button was pressed.');
               window.location= 'userregView';
               return false;
           }
         }
       });

       window.history.pushState('forward', null, './index');
     }

   });

</script>
</head>

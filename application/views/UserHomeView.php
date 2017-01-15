<html>
<head>
<style>
#homeId{

    display:inline-block;
    margin-top:60px;
}

.searchClass{
width:360px;
height:100px;
margin:30px;
float: right;
}

.blogpubClass{
width:420px;
height:100px;
margin:60px;

}


</style>
</head>

<body>


<div style="height:500px; width:100%; border:2px solid #000; float:left;">
<?php



if($this->Home_model->_check_module_task_auth())
{
$email = $this->session->userdata('email');

if(isset($blogname)&&isset($blogcontent))
{
	 validation_errors();

	
}

else{

echo validation_errors();


//echo '<h3>Welcome '.$email.'</h3>';
?>


<?php


if(isset($name)&&isset($search_mail))
{

                    echo $name;
                    echo nbs(3);
                    echo anchor('/HomeController/getBlogs/'.$search_mail.'/'.$name,'Read Blogs');
                    echo nbs(3);
                    echo anchor('/HomeController/subscribeAction/'.$search_mail.'/'.$name,'Subscribe Blogger');
                    echo br(2);
}

?>


<div class ="blogpubClass" id="homeId"> 

 <fieldset>
    <legend>Write a Blog!</legend>

<?php
echo form_open('/HomeController/blogAction');

$name = array(
        'type'  => 'text',
        'name'  => 'blogname',
        'id'    => 'blogname',
        'placeholder' => 'Blog Title',
        'class' => 'blogname',
        'required' => 'required'
);

$blogcontent = array(
        'type'  => 'textarea',
        'name'  => 'blogcontent',
        'id'    => 'blogcontent',
        'placeholder' => 'What\'s on your mind!',
        'class' => 'blogcontent',
        'required' => 'required'
);

echo form_input($name);
echo br(2);

echo form_textarea($blogcontent);
echo br(2);
echo form_submit('submit','Publish');

echo form_close();


}
?>
</fieldset>
</div>

<?php

echo validation_errors();

?>


<div clas="searchClass" id="homeId">

 <fieldset>
    <legend>Search bloggers!</legend>
<?php
echo form_open('/HomeController/searchAction');

     $search  = array(
            'type' => 'email',
            'name' => 'search_mail',
            'id' => 'search',
            'placeholder' => 'Search other bloggers',
            'class' => 'search',
        'required' => 'required'
        );

    echo form_input($search);
    echo nbs(6);
    echo form_submit('submit','Search');


echo form_close();

?>
</fieldset>
</div>

<?php


}

else
{

    $this->load->view('UserRegister');
     //$this->middle = 'UserRegister';// passing middle to function. change this for different views.
          //$this->layout_noArg();
   // redirect('/HomeController');
   
}

//Jingle bell jingle bell jingle all the way...Oh what fun to kill someone and end up in the jail...


?>

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
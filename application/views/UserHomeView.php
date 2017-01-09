
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


echo '<h3>Welcome '.$email.'</h3>';

echo form_open('/HomeController/blogAction');

$name = array(
        'type'  => 'text',
        'name'  => 'blogname',
        'id'    => 'blogname',
        'placeholder' => 'Blog Title',
        'class' => 'blogname'
);

$blogcontent = array(
        'type'  => 'textarea',
        'name'  => 'blogcontent',
        'id'    => 'blogcontent',
        'placeholder' => 'What\'s on your mind!',
        'class' => 'blogcontent'
);

echo form_input($name);
echo br(2);

echo form_textarea($blogcontent);
echo br(2);
echo form_submit('submit','Publish');

echo form_close();


}


echo validation_errors();
echo form_open('/HomeController/searchAction',array( 'method' => 'get' ) );

     $search  = array(
            'type' => 'email',
            'name' => 'search_mail',
            'id' => 'search',
            'placeholder' => 'Search other bloggers',
            'class' => 'search'
        );

    echo form_input($search);
    echo nbs(6);
    echo form_submit('submit','Search');


echo form_close();



echo form_open('/HomeController/logoutAction');
  echo form_submit('submit','Log out');
echo form_close();

}

else
{
    header('location: http://127.0.0.1/NavRead/index.php/HomeController');
    die;
}

//Jingle bell jingle bell jingle all the way...Oh what fun to kill someone and end up in the jail...


?>




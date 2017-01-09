<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

   function __construct()
   {
    parent:: __construct();

   // $this->load->library('session');
    
  //  ini_set('session.cache_limiter','public');

   } 


 function email_check_model($val)
    {
           $sql = "select * from usermaster where email = ?";
          $query = $this->db->query($sql,array($val));
         // echo $val;

     

       if($query->num_rows() > 0){
            
            
            return false;
        }else{

            
            return true;

        }

        


    }


 function setData($data)
 {
    
   //$val = array('fullname' => $data['name'], 'email' => $data['emailid'], 'password' => $data['passwd']);
   //$str = $this->db->insert_string('usermaster', $val);

    $sql =  "insert into usermaster values(?,?,?)";

     $query = $this->db->query($sql,array($data['emailid'],$data['name'],$data['passwd']));

   if($this->db->affected_rows()>0)
   {
    return true;
   }
   else
     return false;

   
 }


 function validateUser_model($email,$password)
 {

      
      $sql =  "select * from usermaster where email = ? and password = ?";

    $query = $this->db->query($sql,array($email,$password));

      if($query->num_rows() > 0){
            
            
            return true;
        }else{

            
            return false;

        }

 }

 

function blogname_check_model($blogname)
{
  
 

   $sql =  "select * from userblog where email = ? and blog_topic = ?";

      $query = $this->db->query($sql,array($this->session->userdata('email'),$blogname));
         

       if($query->num_rows() > 0){
            
            
            return false;
        }else{

            
            return true;

        }

 
}


function setBlogData($data)
{
  $sql = "insert into userblog values(?,?,?)";

 $query = $this->db->query($sql,array($data['email'],$data['blogname'],$data['blogcontent']));

   if($this->db->affected_rows()>0)
   {

    return true;
   }
   else
     return false;

}

function sendMailtoSubscribers($data)
{
   
   //$sql = "Select subscribersList from user_subscribers where email = ?";
  // $query = $this->db->query($sql,array($_SESSION['email']));

    $sql = "Select subscriber_email from subscribersmaster where email = ?";
   $query = $this->db->query($sql,array($this->session->userdata('email')));

   
   $sql2 = "Select * from usermaster where email = ?";
   $query2 = $this->db->query($sql2,array($this->session->userdata('email')));

  /////////////////////////



            $config['protocol']    = 'smtp';

            $config['smtp_host']    = 'ssl://smtp.gmail.com';

            $config['smtp_port']    = '465';

            $config['smtp_timeout'] = '7';

            $config['smtp_user']    = 'aniket9304@gmail.com';

            $config['smtp_pass']    = 'alexandersupertramp';

            $config['charset']    = 'utf-8';

            $config['newline']    = "\r\n";

            $config['mailtype'] = 'text'; // or html

            $config['validation'] = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);


           
            //$this->email->to('saurabh134741@gmail.com');

       
            
          


  ///////////////////////////////
    
          //  $config['validation'] = TRUE; // bool whether to validate email or not     

            //return $query->result_array();
      //    $q_result = $query->result_array()[0];

         //$q_result = explode(',',$q_result);
         //return $q_result;
            
           $i = 0;
          
        //  $q = array();
       
          //return $q_result;


          foreach ($query->result() as $row) {
            
            $this->email->from('aniket9304@gmail', 'NAVREAD BLOG');
            //$this->email->to();
            $this->email->to($row->subscriber_email);

            $this->email->subject('NAVREAD BLOG FEED');
            $this->email->message($query2->row()->fullname.' has published a new blog "'.$data['blogname'].'". You may want to read it.'); 
           
           $this->email->send();
           $i++;

           }
      

}


function searchBloggers_model($data)
{
  
 $sql =  "select * from usermaster where email = ?";
 $query_searchUser = $this->db->query($sql,array($data['search_mail']));

 $search_result_row  = $query_searchUser->row(); 

  if(isset($search_result_row)){
            //eturn true;
          return $search_result_row->fullname;
          
         // $query_searchBlogs = $this->db->query("select  from userblog where email = '".$search_result."'");
          
        }

        else{
            
            return false;

        }
  
}



function getBlogs_model($Blogger_mail,$Blogger_name)
{

$blog_results = array();
$i = 0;
 
 $sql = "select * from userblog where email = ?";
 $query = $this->db->query($sql,array($Blogger_mail));
   
/*foreach ($query->result() as $row)
{       return true;
         $blog_results[$row->email]['blog_topic'] = $row->blog_topic;
         $blog_results[$row->email]['blog_content'] = $row->content;

         $i++;
        
}*/
  
  return $query->result_array();

}


function subscribeAction_model($Blogger_mail,$Blogger_name)
{
   
    //$sql = "insert into subscribersmaster values (?,?)";    
    //$query = $this->db->query($sql,array($Blogger_mail,$_SESSION['email'])); 

  // $sql  = "select subscriber_email from subscribersmaster where email = ?";
  // $query = $this->db->query($sql,array($Blogger_mail));

   //return $query->num_rows();

  // if($query->num_rows()==0)
  // {
     $sql1 = "Insert into subscribersmaster values(?,?)";
 
 $query1 = $this->db->query($sql1,array($Blogger_mail,$this->session->userdata('email')));


  // }

  //else
 // {
     
     //return 3;
      //    $sql2 = "update user_subscribers set subscribersList = array_append(subscribersList, ?)
//where email = ?";
 
 //$query2 = $this->db->query($sql2,array($_SESSION['email'],$Blogger_mail));


 // }

     
    if($this->db->affected_rows()>0)
   {
    return true;
   }
   else
     return false;


     
}

function subscribeStatus_check($Blogger_mail)
{
   
  $sql =  "select * from subscribersmaster where email = ? and subscriber_email = ?";
  $query = $this->db->query($sql,array($Blogger_mail,$this->session->userdata('email')));

  if($query->result())
  { 
    return false;
  }

 else
 {
  return true;
 } 
}


//authenticate in model
function _check_module_task_auth()
{
$user=$this->session->userdata("email");
if(!$user)
{

return false;

}

else
{
return true;
}
}



}


?>

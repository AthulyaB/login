<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
 {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		echo"hello";

	}
	/***
	*@function name :View registration form
	*@ author :Athulya
	*@ date:02/03/2021
	***/
	public function reg_form()
	{
       $this->load->view('regform');
	}
	/***
	*@function name :insertion of registration
	*@ author :Athulya
	*@ date:02/03/2021
	***/
	public function reg_insert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("fname","fname",'required');
        $this->form_validation->set_rules("lname","lname",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("mobile","mobile",'required');
        $this->form_validation->set_rules("dob","dob",'required');
        $this->form_validation->set_rules("address","address",'required');
        $this->form_validation->set_rules("district","district",'required');
        $this->form_validation->set_rules("pincode","pincode",'required');
        $this->form_validation->set_rules("username","username",'required');
		$this->form_validation->set_rules("password","password",'required');

        if($this->form_validation->run())
        {
        $this->load->model('mainmodel');
        $pass=$this->input->post("password");
        $encpass=$this->mainmodel->encpaswdz($pass);
        $b=array("fname"=>$this->input->post("fname"),
                 "lname"=>$this->input->post("lname"),
                 
                "dob"=>$this->input->post("dob"),
                "address"=>$this->input->post("address"),
                "district"=>$this->input->post("district"),
                "pincode"=>$this->input->post("pincode"),
                

               );
         $c=array("email"=>$this->input->post("email"),
         	"username"=>$this->input->post("username"),
         	"mobile"=>$this->input->post("mobile"),

                "password"=>$encpass,
                "usertype"=>'1');

        $this->mainmodel->registration($b,$c);    
        redirect(base_url().'Main/reg_form'); 
        }
}
/***
  *@function name :View admin page
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
  public function admin()
  {
    $this->load->view('adminhome');
  }
	
	/***
	*@function name :View Login page
	*@ author :Athulya
	*@ date:02/03/2021
	***/
	public function login()
	{
		$this->load->view('login');
	}
	/***
	*@function name : Login Function
	*@ author :Athulya
	*@ date:02/03/2021
	***/

public function logins()
{
$this->load->library('form_validation');
$this->form_validation->set_rules("email","email",'required');
$this->form_validation->set_rules("password","password",'required');
if($this->form_validation->run())
{
$this->load->model('mainmodel');
$email=$this->input->post("email");
$pass=$this->input->post("password");
$rslt=$this->mainmodel->selectpass($email,$pass);
if ($rslt)
{
$id=$this->mainmodel->getuserid($email);

$user=$this->mainmodel->getuser($id);
$this->load->library(array('session'));
$this->session->set_userdata(array
('id'=>(int)$user->id,
'usertype'=>$user->usertype,'status'=>$user->status,'logged_in'=>(bool)true));
if($_SESSION['usertype']=='1' && $_SESSION['status']=='1' && $_SESSION['logged_in']==true)
{
redirect(base_url().'Main/admin');
}
elseif($_SESSION['usertype']=='0' && $_SESSION['status']=='1' && $_SESSION['logged_in']==true)
{
redirect(base_url().'Main/user_dashboard');
}
else
{
echo "Waiting for approval";
}
}
    else
    {
    echo "invalid user";
    }
}
else
{
redirect('Main/','refresh');
}

}


/***
	*@function name : approve/Reject view page
	*@ author :Athulya
	*@ date:02/03/2021
	***/
	
		
  
	public function approve()
	{
    if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
    {
		$this->load->model('mainmodel');
		$data['n']=$this->mainmodel->approve();
		$this->load->view('approve',$data);
	}

else
{
  redirect(base_url().'Main/login');
}
}
  /***
  *@function name : approve Function 
  *@ author :Athulya
  *@ date:02/03/2021
  ***/

public function approved()
{
	$this->load->model('mainmodel');
	$id=$this->uri->segment(3);
	$this->mainmodel->approved($id);
	redirect('main/approve','refresh');
}
/***
  *@function name : Reject Function
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
public function rejected()
{
	$this->load->model('mainmodel');
	$id=$this->uri->segment(3);
	$this->mainmodel->rejected($id);
	redirect('main/approve','refresh');
}
	 /***
  *@function name : User Home page
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
    public function user_dashboard()
    {
        $this->load->view('udash');
    }
    /***
  *@function name : //update User Details
    //view User Details
  *@ author :Athulya
  *@ date:02/03/2021
  ***/

    
    public function update_user_det()
    {
      if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
    {
        $this->load->model('mainmodel');
        $id=$this->session->id;
        $data['user_data']=$this->mainmodel->update($id);
        $this->load->view('update',$data);
    }
    else
    {
      redirect(base_url().'Main/login');
}
}
    /***
  *@function name :Update Function
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
    
   
    public function updatdetails()
    {
        $a = array("fname"=>$this->input->post("fname"),
            "lname"=>$this->input->post("lname"),
            "dob"=>$this->input->post("dob"),
            "address"=>$this->input->post("address"),
            "district"=>$this->input->post("district"),
            "pincode"=>$this->input->post("pincode"));
         $b= array("email"=>$this->input->post("email"),
         	"mobile"=>$this->input->post("mobile"),
         	"username"=>$this->input->post("username"),
            "password"=>$this->input->post("password"));

        $this->load->model('mainmodel');
        if($this->input->post("update"))
        {
            $id=$this->session->id;
            $this->mainmodel->updatesdetails($a,$b,$id);
            redirect('main/update_user_det','refresh');
        }


 }  

 public function delete()
{
$this->load->model('mainmodel');
$id=$this->uri->segment(3);
$this->mainmodel->deletedetails($id);
redirect('main/approve','refresh');
}

 /***
  *@function name : Checking Email exit or not
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
 public function email_availibility()  
      {  
      if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  

           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
           else  
           {  
                $this->load->model("mainmodel");  
                if($this->mainmodel->is_email_available($_POST["email"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }  
       

      }
      /***
  *@function name : Checking Phoneno exit or not
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
      public function phno_availability()
      {

                $this->load->model("mainmodel");  
                if($this->mainmodel->is_phno_available($_POST["phoneno"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Phone number Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }
           /***
  *@function name : Checking Username exit or not
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
      public function uname_availability()
      {

                $this->load->model("mainmodel");  
                if($this->mainmodel->is_uname_available($_POST["username"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> user name Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }


public function forgot()
    {
        $this->load->view('forgotpassword');
    }
    public function confirm()
    {
        $this->load->view('confirmpassword');
    }


    public function send()
{
    $to =  $this->input->post('from');  // User email pass here
    $subject = 'Welcome To Elevenstech';

    $from = 'team2ojt@gmail.com';              // Pass here your mail id

    $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://elevenstechwebtutorials.com/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    $emailContent .='<tr><td style="height:20px"></td></tr>';


    $emailContent .= $this->input->post('message');  //   Post message available here


    $emailContent .='<tr><td style="height:20px"></td></tr>';
    $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://elevenstechwebtutorials.com/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.elevenstechwebtutorials.com</a></p></td></tr></table></body></html>";
               


    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '60';

    $config['smtp_user']    = 'team2ojt@gmail.com';    //Important
    $config['smtp_pass']    = 'nikhila@123';  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not

     

    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
    $this->email->send();

    $this->session->set_flashdata('msg',"Mail has been sent successfully");
    $this->session->set_flashdata('msg_class','alert-success');
    return redirect('Main/forgot');
}
}
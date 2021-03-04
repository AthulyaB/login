<?php
class mainmodel extends CI_model
{
  /***
  *@function name : Password Encryption
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
public function encpaswdz($pass)
{
	return password_hash($pass, PASSWORD_BCRYPT);
}	
/***
  *@function name :Registration Insertion
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
public function registration($b,$c)
{
	    $this->db->insert("tbl_log",$c);
		$loginid=$this->db->insert_id();
		$b['loginid']=$loginid;
	    $this->db->insert("tbl_reg",$b);
}
/***
  *@function name : Select Password
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
public function selectpass($email,$pass)
{
$this->db->select('password');
$this->db->from("tbl_log");
$this->db->where("email",$email);
$qry=$this->db->get()->row('password');
return $this->verifypass($pass,$qry);
}
/***
  *@function name : Verify Password
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
public function verifypass($pass,$qry)
{
return password_verify($pass,$qry);
}
/***
  *@function name : Getting User Id
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
public function getuserid($email)
{
$this->db->select('id');
$this->db->from("tbl_log");
$this->db->where("email",$email);
return $this->db->get()->row('id');
}
/***
  *@function name : Fetching id
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
public function getuser($id)
{
$this->db->select('*');
$this->db->from("tbl_log");
$this->db->where("id",$id);
return $this->db->get()->row();


  }
  /***
  *@function name : 
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
  public function approve()
{
$this->db->select('*');
$this->db->join('tbl_log','tbl_log.id=tbl_reg.loginid','inner');
$qry=$this->db->get("tbl_reg");
       return $qry;
}
/***
  *@function name : approval by admin
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
 public function approved($id)
{   $this->db->set('status','1');
$qry=$this->db->where("id",$id);
$qry=$this->db->update("tbl_log");
return $qry;
}
/***
  *@function name : Rejection
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
public function rejected($id)
{   $this->db->set('status','2');
    $qry=$this->db->where("id",$id);
    $qry=$this->db->update("tbl_log");
    return $qry;
}


/***
  *@function name : Updation
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
//update user details
public function update($id)
{
$this->db->select("*");
$qry=$this->db->join('tbl_log','tbl_reg.loginid=tbl_log.id','inner');
$qry=$this->db->where("tbl_reg.loginid",$id);
$qry=$this->db->get("tbl_reg");
return $qry;
}
/***
  *@function name : Update details
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
public function updatesdetails($a,$b,$id)
{
$this->db->select('*');
$qry=$this->db->where("loginid",$id);
$qry=$this->db->join('tbl_log','tbl_log.id=tbl_reg.loginid','inner');
$qry=$this->db->update("tbl_reg",$a);
$qry=$this->db->where("id",$id);
$qry=$this->db->update("tbl_log",$b);
return $qry;
}
/***
  *@function name : Deletion
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
//Delete Details

public function deletedetails($id)
{
$this->db->where("id",$id);
$qry=$this->db->join('tbl_reg','tbl_log.id=tbl_reg.loginid','inner');
$this->db->delete("tbl_reg");
$qry=$this->db->where("tbl_log.id",$id);
$this->db->delete("tbl_log");
}



/***
  *@function name : Checking email
  
  ***/

public function is_email_available($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("tbl_log");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }
      /***
  *@function name : Checking Phoneno
  *@ author :Athulya
  *@ date:02/03/2021
  ***/  
      public function is_phno_available($phoneno)  
      {  
           $this->db->where('phoneno', $phoneno);  
           $query = $this->db->get("tbl_log");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }
      /***
  *@function name : Checking Username
  *@ author :Athulya
  *@ date:02/03/2021
  ***/
      public function is_uname_available($username)
       {  
           $this->db->where('username', $username);  
           $query = $this->db->get("tbl_log");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }

 


}
?>
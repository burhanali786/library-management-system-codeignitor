<?php  


class User_model extends CI_model{
 
public function register_user($user)
{
  $this->db->insert('tbl_users', $user);
}
 
public function login_user(){
 //$email,$pass
  $this->db->select('*');
  $this->db->from('tbl_users');
 // $this->db->where('user_email',$email);
 // $this->db->where('user_password',$pass);
 
  if($query=$this->db->get())
  {
      return $query->result_array();
  }
  else{
    return false;
  }
 
 
}
public function email_check($email)
{

    $this->db->select('*');
    $this->db->from('tbl_users');
    $this->db->where('user_email',$email);
    $query=$this->db->get();
    if($query->num_rows()>0)
    {
      return false;
    }
    else
    {
      return true;
    }

}


function validate($email,$password)
{
    $this->db->where('user_email',$email);
    $this->db->where('user_password',$password);
    $result = $this->db->get('tbl_users',1);
    return $result;
  }

 
 
}
 
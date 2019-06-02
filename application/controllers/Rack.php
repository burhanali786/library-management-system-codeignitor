<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rack extends CI_Controller {
   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() 
   {
    //load database in autoload libraries 
      parent::__construct(); 
      $this->load->model('Rack_model');         
   }
   public function index()
   {
      $Rack_model=new Rack_model;
      $data['data']=$Rack_model->get_racks();
      $data['bookstotal']=$Rack_model->get_total_books();
      $this->load->view('elements/header');  
      $this->load->view('racks/list_racks',$data);
      $this->load->view('elements/footer'); 
   }
   public function create()
   {
      $this->load->view('elements/header');  
      $this->load->view('racks/add_rack');
      $this->load->view('elements/footer'); 
   }
   /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function store()
   {
      $Rack_model=new Rack_model;
      $res=$Rack_model->insert_rack();
      if($res==true)
      {
          $this->session->set_flashdata('true', 'rack is added successfully');
      }
      else
      {
          $this->session->set_flashdata('err', "error in adding rack");
      }
      redirect(base_url('index.php/rack'));
    }
   /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function editinfo($id)
   {
      $Rack_model=new Rack_model;
      $data['rackinfo']=$Rack_model->edit_rack_info($id);
       $this->load->view('elements/header');  
      $this->load->view('racks/edit_rack',array('data'=>$data));
      $this->load->view('elements/footer'); 
   }
   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function updaterack($id)
   {
      $Rack_model=new Rack_model;
      $res=$Rack_model->update_rack($id);
      if($res==true)
      {
          $this->session->set_flashdata('true', 'rack is updated successfully');
      }
      else
      {
          $this->session->set_flashdata('err', "error in editing rack");
      }
      redirect(base_url('index.php/rack'));
   }
   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id)
   {
       $this->db->where('id', $id);
       $this->db->delete('products');
       redirect(base_url('products'));
   }

   public function getrackinfo($id)
   {

      $Rack_model=new Rack_model;
      $res=$Rack_model->get_related_rack_books($id);
      $this->load->view('elements/header');  
      $this->load->view('racks/rack_details',array('data'=>$res));
      $this->load->view('elements/footer'); 
   }
}
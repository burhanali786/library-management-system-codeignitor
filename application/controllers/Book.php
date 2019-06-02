<?php

class Book extends CI_Controller {

	public function __construct()
	{
    	parent::__construct();
		$this->load->helper('url');
		$this->load->model('book_model');
		$this->load->model('Rack_model');         
	    $this->load->library('session');
	}
	//listing of books
	public function index()
	{

       $Book_model=new Book_model;
       $data['data']=$Book_model->get_books();	
       $this->load->view('elements/header');  
       $this->load->view('books/list_books',array('data'=>$data['data']));
       $this->load->view('elements/footer'); 
   }
   public function create()
   {
   		$Rack_model=new Rack_model;
     	$data['data']=$Rack_model->get_racks();
     	$this->load->view('elements/header');  
      	$this->load->view('books/add_book',$data);
      	$this->load->view('elements/footer'); 

      // $this->load->view('products/create');
      // $this->load->view('includes/footer');      
   }

	//add books
	public function add_book_view()
	{
		$this->load->view('elements/header');  
		$this->load->view('books/add_book');
		$this->load->view('elements/footer'); 	
	}
	
	public function save_books_data()
	{
		$Book_model=new Book_model;
		$res=$Book_model->addbooks();
		if($res==true)
		{
			$this->session->set_flashdata('true', 'books is added successfully');
		}
		else
		{
			$this->session->set_flashdata('err', "you can not add more books in this rack");
		}
		redirect(base_url('index.php/book'));
	}
	public function edit_books($id)
	{

		$Book_model=new Book_model;
		$data['bookinfo']=$Book_model->get_book_info($id);
		
		$Rack_model=new Rack_model;
     	$data['rackdata']=$Rack_model->get_racks();
     	$this->load->view('elements/header');  
		$this->load->view('books/edit_book',array('data'=>$data));
		$this->load->view('elements/footer'); 	
	}

	public function save_edit_books($id)
	{
		$Book_model=new Book_model;
		$res=$book_info=$Book_model->update_book($id);
		if($res==true)
		{
			$this->session->set_flashdata('true', 'books is updated successfully');
		}
		else
		{
			$this->session->set_flashdata('err', "error in updating books");
		}
		redirect(base_url('index.php/book'));
		// $this->load->view('books/edit_book',$data);
	}
}
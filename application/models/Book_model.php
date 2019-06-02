<?php  
class Book_model extends CI_model
{
    public function get_books()
    {
      if(!empty($this->input->get("book_title")))
      {
        $this->db->like('book_title', $this->input->get("book_title"));
      // $this->db->or_like('description', $this->input->get("search")); 
      }

      if(!empty($this->input->get("book_author")))
      {
        $this->db->like('book_author', $this->input->get("book_author"));
      // $this->db->or_like('description', $this->input->get("search")); 
      }

      if(!empty($this->input->get("book_published_year")))
      {
          $this->db->like('book_published_year', $this->input->get("search"));
        // $this->db->or_like('description', $this->input->get("search")); 
      }

      $this->db->select('books.book_title,books.id,books.book_author,books.book_published_year,racks.rack_name'); 
      $this->db->from('books');
      $this->db->join('books_racks', 'books.id=books_racks.book_id', 'inner');
      $this->db->join('racks', 'books_racks.rack_id=racks.id', 'inner'); 
      $query = $this->db->get();
      return $query->result();
    }

    public function addbooks()
    {
        $countrecords=$this->db->where(['rack_id'=>$this->input->post('rack_id')])->from("books_racks")->count_all_results();
        if($countrecords >=10)
        {
           echo "you can not more books";
        }
        else
        {
         
            $data = array(
            'book_title' => $this->input->post('book_name'),
            'book_author' => $this->input->post('book_author'),
            'book_published_year' => $this->input->post('book_published_year')

            );
            $rack_id=$this->input->post('rack_id');
            $this->db->insert('books', $data);
            $insert_id = $this->db->insert_id();
            $data_rack_book=array('book_id'=>$insert_id,'rack_id'=>$rack_id);
            return $this->db->insert('books_racks', $data_rack_book);
        }
        
    }

    public function get_book_info($id)
    {
        $this->db->select('books.book_title,books.id,books.book_author,books.book_published_year,racks.rack_name,racks.id as rack_id'); 
        $this->db->from('books');
        $this->db->join('books_racks', 'books.id=books_racks.book_id', 'inner');
        $this->db->join('racks', 'books_racks.rack_id=racks.id', 'inner'); 
        $this->db->where('books.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_book($id) 
    {
        $data=array(
            'book_title' => $this->input->post('book_name'),
            'book_author' => $this->input->post('book_author'),
            'book_published_year' => $this->input->post('book_published_year')
        );
        $rack_book_data=array('rack_id'=>$this->input->post('rack_id'));

        $this->db->where('id',$id);   
        $this->db->update('books',$data);

        $this->db->where('book_id',$id);   
        return $this->db->update('books_racks',$rack_book_data);
    }

}
 
<?php  
class Rack_model extends CI_model
{
    public function get_racks()
    {
        if(!empty($this->input->get("search")))
        {
          // $this->db->like('title', $this->input->get("search"));
          // $this->db->or_like('description', $this->input->get("search")); 
        }
        $query = $this->db->get("racks");
        return $query->result();
    }
    public function get_total_books()
    {
      $countrecords=$this->db->query("select count(books_racks.book_id) as totalbooks,books_racks.rack_id from books_racks group by books_racks.rack_id");
      return $countrecords->result();
    }
    
    public function get_related_rack_books($rack_id)
    {
        $countrecords=$this->db->query("select books_racks.book_id,books_racks.rack_id,books.book_title,book_author,book_published_year,racks.rack_name from books_racks inner join books on books.id=books_racks.book_id 
            inner join racks on racks.id=books_racks.rack_id
            where books_racks.rack_id='$rack_id'");
        return $countrecords->result();
    }

    public function insert_rack()
    {    
        $data = array(
            'rack_name' => $this->input->post('rack_name'),
        );
        return $this->db->insert('racks', $data);
    }

    public function edit_rack_info($id)
    {
        $racks = $this->db->get_where('racks', array('id' => $id))->row();
        return $racks;
    }


    public function update_rack($id) 
    {
        $data=array(
            'rack_name' => $this->input->post('rack_name')
        );
        $this->db->where('id',$id);   

        return $this->db->update('racks',$data);      
    }

}
 
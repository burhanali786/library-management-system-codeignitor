
 <?php 
 ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="display: none;">

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rack Management</h3>
				<?php
				if($this->session->userdata['role_id']==1)
				{ 
				?>
               <span class="badge bg-red"><a href="<?php echo base_url();?>index.php/book/create">Add book</a></span>
          <?php }?>



				<?php 
				   if($this->session->flashdata('true'))
				   {
				 ?>
				   <div class="alert alert-success"> 
				     <?php  echo $this->session->flashdata('true'); ?>
				<?php    
				}
				else if($this->session->flashdata('err'))
				{
				?>
				 <div class = "alert alert-success">
				   <?php echo $this->session->flashdata('err'); ?>
				 </div>
				<?php } ?>



            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	<form method="get">
            		<input type="text" name="book_title" placeholder="book title">
            		<input type="text" name="author" placeholder="author">
            		<input type="text" name="book_published_year" placeholder="Published year">
            		<input type="submit" name="search">
            	</form>
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Book Title</th>
                  <th>Book Author</th>
                  <th>Book Published Year</th>
                  <th style="width: 40px">Book Rack</th>
                  <th style="width: 40px"></th>
                  
                </tr>
				<?php 
				$count=0;

				foreach($data as $val)
				{
					$count++;

				?>
                <tr>
                  <td><?php echo $count;?></td>
                  <td><?php echo $val->book_title;?></td>
                  <td><?php echo $val->book_author;?></td>
                  <td><?php echo $val->book_published_year;?></td>
                   <td><?php echo $val->rack_name;?></td>
                  <td>
                    <?php
                    if($this->session->userdata['role_id']==1)
                    { 
                    ?>
		                  <span class="badge bg-red">
		                  	<a href="<?php echo base_url()?>index.php/book/edit_books/<?php echo $val->id;?>">Edit book</a>
		                  </span>
                    <?php }?>
                  
              		</td>
                </tr>
				<?php
					
				}
				?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="display: none;">
     <!--  <h1>
        Simple Tables
        <small>preview of simple tables</small>
      </h1> -->
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
               <span class="badge bg-red"><a href="<?php echo base_url();?>index.php/rack/create">Add Rack</a></span>
          <?php }?>



				<?php 
				   if($this->session->flashdata('true'))
				   {
				 ?>
				   <div class="alert alert-success"> 
				     <?php  echo $this->session->flashdata('true'); ?>
				<?php    
				}else if($this->session->flashdata('err'))
				{
				?>
				 <div class = "alert alert-success">
				   <?php echo $this->session->flashdata('err'); ?>
				 </div>
				<?php } ?>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Rack Name</th>
                  <th>Book Name</th>
                  <th style="width: 40px">Book Author</th>
                  <th style="width: 40px">Published Year</th>
                </tr>
				<?php 
					$count=0;
					foreach($data as $val)
					{
						$count++;
				?>
                <tr>
                  <td><?php echo $count;?></td>
                  <td><?php echo $val->rack_name;?></a></td>
                  <td><?php echo $val->book_title;//echo $val->id;?></td>
                  <td><?php echo $val->book_author;?></td>
                  <td><?php echo $val->book_published_year;?></td>
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
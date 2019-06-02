 <?php 

 ?>
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
                  <th>Total books in Rack</th>
                  <th style="width: 40px"></th>
                </tr>
				<?php 
				$count=0;
				$sql ="select count(books_racks.book_id) as totalbooks,books_racks.rack_id from books_racks group by books_racks.rack_id";
					$query = $this->db->query($sql);
					$res=$query->result();
					$dataval=array();
					foreach($res as $kval)
					{
						$dataval[$kval->rack_id]=$kval->totalbooks;
					}
				foreach($data as $val)
				{
					$count++;

				?>
                <tr>
                  <td><?php echo $count;?></td>
                  <td><a href="<?php echo base_url();?>index.php/rack/getrackinfo/<?php echo $val->id;?>"><?php echo $val->rack_name;?></a></td>
                  <td><?php echo @$dataval[$val->id];//echo $val->id;?></td>
                  <td>
					<?php
                  	if($this->session->userdata['role_id']==1)
                  	{ 
                  	?>
		                  <span class="badge bg-red">
		                  	<a href="<?php echo base_url();?>index.php/rack/editinfo/<?php echo $val->id;?>">Edit Rack</a>
		                  </span>
                   <?php 
                  	}
                  ?>
              </td>
                </tr>
				<?php
					
				}
				?>
<!--         
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue">30%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td>
                </tr> -->
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

<!-- <?php 
//foreach($data as $val)
//{
?>
	<?php //echo $val->rack_name;?><a href="rack/editinfo/<?php //echo $val->id;?>">Edit Rack</a><br/>
<?php 
//}
?>
<a href="rack/create">Add Rack</a> -->

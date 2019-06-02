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
            </div>
                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg)
                  {
                    echo $error_msg;
                  }
                   ?>

                      <form role="form" method="post" action="<?php echo base_url('index.php/rack/store'); ?>">
                          <fieldset>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Rack Name" name="rack_name" type="text" autofocus>
                              </div>
                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Add Rack Data" name="addrackdata" >

                          </fieldset>
                      </form>
               
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
           


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
                      <form role="form" method="post" action="<?php echo base_url('index.php/book/save_edit_books/'.$data['bookinfo'][0]->id); ?>">
                          <fieldset>

                          	  <div class="form-group">
                                  <select class="form-control" id="rack_id" name="rack_id">
                                   <option value="select rack" disabled="disabled" selected="selected"><?php echo "select Rack"; ?></option>  
                                  <?php foreach ( $data['rackdata'] as $val ){?>
                                  <option value="<?php echo $val->id; ?>"<?php if($val->id==$data['bookinfo'][0]->rack_id) echo 'selected="selected"'; ?>><?php echo $val->rack_name; ?></option>
                                  <?php }?>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Book Title" name="book_name" type="text" autofocus value="<?php echo $data['bookinfo'][0]->book_title?>">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter Book Author" name="book_author" type="text" autofocus value="<?php echo $data['bookinfo'][0]->book_author?>">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter publish year" name="book_published_year" type="text" value="<?php echo $data['bookinfo'][0]->book_published_year?>">
                              </div>
     
                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Update Book Data" name="updatebook" >

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
           

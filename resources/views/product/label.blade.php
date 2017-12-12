@extends( 'master' )

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Product Label <small>Add Product</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->




    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Example DataTables Card-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i> Data Table Example <span><a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Add new label</a><span></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="labell" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($data)){ foreach($data as $row){ ?>
      						<tr>
                    <td>
                      <?php echo $row->p_label_id; ?>
                    </td>
                    <td><?php echo $row->p_label_name; ?></td>
                    <td>Edinburgh</td>
                  </tr>
                <?php } } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->


      <!-- Logout Modal-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-lg-12 col-md-12">
                  <div class="product_group_name_form">
      				{!! Form::open(['url' => '/add-product-label','class'=>'form-inline']) !!}
                     <div class="form_title col-lg-6">
      				   <h1>Label Name</h1>
      			   </div>
                     <div class="form_active col-lg-6">
      				   <div class="form-group">
      				   {!! Form::checkbox('isset', '1',true) !!}
      					   {!! Form::label('Active', null, ['class' => 'control-label']) !!}
      					   </div>
      			   </div>
                     <!-- /.form_title -->
      				<div class="col-lg-12">
      					<div class="form-group">
      						{!! Form::text('name',$value = null, $attributes = ['class'=>'form-control']) !!}
      					</div>

      					{!! Form::submit('Submit!', $attributes = ['class'=>'btn btn-default']) !!}
      					{!! Form::close() !!}
      				</div>
      				<!-- /.col-lg-12 -->


                  </div>
                  <!-- /.product_group_name_form -->

              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
          </div>
        </div>
      </div>

@endsection

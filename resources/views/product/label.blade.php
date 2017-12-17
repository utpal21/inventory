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
            <i class="fa fa-table"></i> Data Table Example <span><a class="nav-link" data-toggle="modal" data-target="#addModal">
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
          <div class="card-footer small text-muted"></div>
        </div>
      </div>
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->


      <!-- Logout Modal-->
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Label Name</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-lg-12 col-md-12">
                  <div class="">
      				{!! Form::open(['url' => '/add-product-label','class'=>'form-inline']) !!}
                     <div class="form_active col-lg-12">
            				   <div class="form-group">
              				   {!! Form::checkbox('isset', '1',true) !!}
              					 {!! Form::label('Active', null, ['class' => 'control-label isset']) !!}
            					 </div>
            			   </div>
                     <!-- /.form_title -->
            				<div class="col-lg-12">
            					<div class="form-group">
            						{!! Form::text('name',$value = null, $attributes = ['class'=>'form-control label_name']) !!}
            					</div>

            					{!! Form::Button('Submit!', $attributes = [ 'type'=>'submit','class'=>'btn btn-primary add-label']) !!}
            					{!! Form::close() !!}
            				</div>
            				<!-- /.col-lg-12 -->
                  </div>
                  <!-- /.product_group_name_form -->
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>

@endsection

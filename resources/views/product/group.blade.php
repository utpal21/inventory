@extends( 'master' )

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Product Group <small>Add Product</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

   <!-- <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
            </div>
        </div>
    </div>-->
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="product_group_name_list">
                <h1>Group name list</h1>
				<table class="table">
					<body>
						<tr><td>Group Name</td></tr>
					</body>
				</table>
				<!-- /.table -->
            </div>
            <!-- /.product_group_name -->
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="product_group_name_form">
				{!! Form::open(['url' => '/add-product-group','class'=>'form-inline']) !!}
               <div class="form_title col-lg-6">
				   <h1>Group Name</h1>
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
    <!-- /.row -->

@endsection
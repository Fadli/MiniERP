@extends('adminLTE.index')
@section('title', 'Users')
@section('css')
	<!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/css/skins/_all-skins.min.css') }}">
@endsection
@section('content')        
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Products
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data Products</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Product List</h3>
                  @can('product.create')
				  <a href="{{ url('/product/create/') }}" class="btn btn-primary" style="float:right">+ Add Product</a>
                  @endcan
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="standar" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Printer Epson</td>
                        <td>Printer</td>
                        <td>PRIN001BK16</td>
                        <td>1.200.000</td>
                        <td>1</td>
                        <td>6</td>
                        <td>
                        <div class="col-xs-12 button-wrapper">
										@can('product.read')
                						<a href="{{ url('product/') }}"><button class="btn btn-success pull-left">View</button></a>
										@endcan
										@can('product.edit')
                						<a href="{{ url('product/edit') }}"><button class="btn btn-info pull-left" style="margin-left:2px; margin-right:2px">Edit</button></a>
										@endcan
										@can('product.delete')
                						{!! Form::open(array('class' => '', 'method' => 'DELETE', 'route' => array('product.destroy', 1))) !!}
                						    {!! Form::submit('Delete', array('class' => 'btn btn-danger pull-left')) !!}
                						{!! Form::close() !!}
										@endcan
                         </div>
						        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection
@section('js')
	    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src=".{{ asset('assets/js/demo.js') }}"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#standar").DataTable();
      });
    </script>
@endsection
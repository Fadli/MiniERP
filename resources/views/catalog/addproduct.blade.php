@extends('adminLTE.index')
@section('title', 'Form Product')
@section('css')
	<!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }} ">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{ asset('assets/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">
@endsection
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Product
            <small>Input</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Form</a></li>
            <li class="active">Product</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-pencil"></i> Add Product</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">*Product Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Product Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-10">
                        <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">*Weight (kg)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Berat Barang">
                      </div>
                    </div>
                   <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Brand</label>
                      <div class="col-sm-10">
                        <select class="form-control select2">
                          <option selected="selected">Apple</option>
                          <option>Acer</option>
                          <option>Toshiba</option>
                          <option>Dell</option>
                          <option>LG</option>
                          <option>Intel</option>
                          <option>Logitech</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Category</label>
                      <div class="col-sm-10">
                        <select class="form-control">
                          <option selected="selected">Apple</option>
                          <option>Acer</option>
                          <option>Toshiba</option>
                          <option>Dell</option>
                          <option>LG</option>
                          <option>Intel</option>
                          <option>Logitech</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Quantity</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputPassword3" value="1" placeholder="Quantity">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Stock Type</label>
                      <div class="col-sm-10">
                        <select class="form-control">
                          <option selected="selected">Ready Stock</option>
                          <option>Out Of Stock</option>
                          <option>Need Check</option>
                        </select>
                      </div>
                      </div>
                    </div>

                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div><!-- /.box-footer -->
                </form>
                </div><!-- /.box-body -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
@endsection
@section('js')
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>

    <script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

     <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
@endsection

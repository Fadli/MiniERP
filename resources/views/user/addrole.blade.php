@extends('adminLTE.index')
@section('title', 'Form Role')
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
@endsection
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form User
            <small>Input</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">User</li>
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
                  <h3 class="box-title"><i class="fa fa-pencil"></i> Add Role</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('route' => 'addrole', 'class' => 'form')) !!}
                  <div class="box-body">
					<div class="form-group">
                      <label for="InputName">Role Label</label>
                      <input type="text" class="form-control" id="InputLabel" name="label" placeholder="Enter Label" required>
                    </div>
                    <div class="form-group">
                      <label for="InputEmail">Role Alias</label>
                      <input type="text" class="form-control" id="InputName" name="name" placeholder="Enter Alias" required>
                    </div>
                    <div class="form-group">
                        <label>Roles Permission</label><br>
                        @foreach($group as $groups) 
                          {{ $groups->module_group }}<br>
                          {{ $permissions = DB::table('permissions')->whereIn('module_group',$group->module_group)->get() }}
                          @foreach($permissions as $permission)
                            <input  type="checkbox" name="permission_id[]" value="{{ $permission->id }}"> {{ $permission->label }}<br>
                        @endforeach
                        @endforeach
                        
                    </div>
					
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add Role</button>
                  </div>
                  {!! Form::close() !!}
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
@endsection

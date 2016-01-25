@extends('adminLTE.index')
@section('title', 'Form User')
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
            Form Edit
            <small>Update</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Form</a></li>
            <li class="active">Edit</li>
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
                  <h3 class="box-title"><i class="fa fa-pencil"></i> Edit User :  {{ $user->name }}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT', 'files' => true)) !!}
				  <div class="box-body">
					<div class="form-group">
                      <label for="InputName">Name</label>
                      {!! Form::text('name', null, array('class' => 'form-control')) !!}
					            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group">
                      <label for="InputEmail">Email address</label>
                      {!! Form::email('email', null, array('class' => 'form-control')) !!}
					  					            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group">
                      <label for="InputFile">Upload Foto</label>
                      <input type="file" id="exampleInputFile">
                    </div>
                    <div class="form-group">
                    <label>Roles Group </label><br>
                      <select name="role_id" class="form-control">
                          @foreach($roles as $role)
                          <option value="{{ $role->id }}">{{ $role->label }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
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

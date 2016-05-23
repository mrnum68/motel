@extends('auth.master.page')

@section('section')


{!! Form::open(['route' => 'auth.login-post', 'class' => 'login', 'autocomplete' => 'off']) !!}
@if(Session::has('danger-login'))
	<div class="form-group">
		<div class="animated fadeIn message">
			{{ session('danger-login')}}
		</div>
	</div>
@endif

	<div class="form-group">
		<div class="row">
			<label for="username" style="color:white;font-weight:bold;font-size:16px" class="col-sm-3">Tên đăng nhập</label>
			<div class="col-sm-9">
				<input type="text" name="username" value="{{ old('username') }}" 
							id="username" class="form-control input" autofocus="autofocus">
				{!! $errors->first('username') !!}
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<div class="row">
			<label for="password"  style="color:white;font-weight:bold;font-size:16px" class="col-sm-3">Mật khẩu</label>
			<div class="col-sm-9">
				<input type="password"  name="password" id="password" class="form-control input">
				{!! $errors->first('password') !!}
				<input type="hidden" name="_token" value="<?= csrf_token() ?>">
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<div class="row">
			<div class="col-sm-offset-3 col-sm-9">
				<input type="submit" value="Đăng nhập" class="btn submit">
				<a href="#" class="btn">Quên mật khẩu</a>
			</div>
		</div>
	</div>
{!! Form::close() !!}
@stop
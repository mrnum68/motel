@extends('auth.master.page')

@section('section')

{!! Form::open(['route' => 'auth.password-post', 'class' => 'login', 'autocomplete' => 'off']) !!}

@if(Session::has('message-password'))
	<div class="form-group">
		<div class="animated fadeIn message">
			{{ session('message-password')}}
		</div>
	</div>
@endif

	<div class="form-group">
		<div class="row">
			<label for="username" class="col-sm-12">Tên đăng nhập hoặc email đăng ký</label>
			<div class="col-sm-8">
				<input type="text" name="username" value="{{ old('username') }}" 
							id="username" class="form-control input" autofocus="autofocus">
				{!! $errors->first('username') !!}
			</div>
			<div class="col-sm-4">
				<input type="submit" value="Khôi phục" class="btn submit">
			</div>
		</div>
	</div>
{!! Form::close() !!}
@stop
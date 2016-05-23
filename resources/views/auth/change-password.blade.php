@extends('auth.master.page')

@section('section')

{!! Form::open(['route' => ['auth.password-change', $user->username], 'class' => 'login']) !!}

	
	<div class="form-group">
		<div class="row">
			<label for="password" class="col-sm-3">Mật khẩu mới</label>
			<div class="col-sm-9">
				<input type="password" name="password" id="password" class="form-control input">
				{!! $errors->first('password') !!}
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="row">
			<label for="password_confirm" class="col-sm-3">Nhập lại khẩu</label>
			<div class="col-sm-9">
				<input type="password" name="password_confirm" id="password_confirm" class="form-control input">
				{!! $errors->first('password_confirm') !!}
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<div class="row">
			<div class="col-sm-offset-3 col-sm-9">
				<input type="submit" value="Thay đổi" class="btn submit">
			</div>
		</div>
	</div>

{!! Form::close() !!}
@stop
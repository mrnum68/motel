<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<form action="{{URL::to('change-pass/'.$user->id)}}" method="post">
	<input type="hidden" name="_token" value="<?= csrf_token() ?>">
	<input type="password" name="old_pass">
	<input type="password" name="new_pass">
	<button type="submit">Change pass</button>
</form>
</body>
</html>
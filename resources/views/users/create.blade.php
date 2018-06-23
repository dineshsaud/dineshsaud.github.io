
<form method="POST" action="laravel/users">
	{!! csrf_field()  !!}
	<input type="text" name="name">
	<input type="email" name="email">
	<input type="password" name="password">
	<input type="submit" name="create">
</form>
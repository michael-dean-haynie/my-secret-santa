<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel='stylesheet' type='text/css' href={{ URL::asset('css/master.css') }}>
	@yield('css')
</head>
<body>
	<div class='title-container'>
		<h1>My Secret Santa</h1>
	</div>
	@yield('content')
	@yield('javascript')
</body>
</html>
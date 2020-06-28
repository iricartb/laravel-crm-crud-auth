<!-- Stored in resources/views/layouts/master.blade.php -->

<!DOCTYPE html>
<html>
    <head>
        <title>Laravel CRM - @yield('title')</title>
		
		<link rel="stylesheet" href="../../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../css/app.css">
				
		<script src="../../../js/bootstrap.js"></script>
    </head>
    <body>
	    <div class="header">
		    @yield('header')
		</div>
		
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
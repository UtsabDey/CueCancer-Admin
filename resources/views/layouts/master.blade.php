<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>CueCancer - @yield('title')</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/img/favicon.png')}}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('admin/css/feathericon.min.css')}}">
		
		<link rel="stylesheet" href="{{asset('admin/plugins/morris/morris.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
		<script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"></script>
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<!-- Header -->
            @include('layouts.header')
			<!-- /Header -->
            @yield('content')
            <!-- Sidebar -->
            @include('layouts.sidebar')
            <!-- Sidebar -->
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
      
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('admin/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{asset('admin/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		
        <!-- Datatables JS -->
		<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('admin/plugins/datatables/datatables.min.js')}}"></script>

		<script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>    
		{{-- <script src="{{asset('admin/plugins/morris/morris.min.js')}}"></script>  
		<script src="{{asset('admin/js/chart.morris.js')}}"></script> --}}
		<script src="{{asset('admin/js/bs-custom-file-input.min.js')}}"></script>
		<!-- Custom JS -->
		<script  src="{{asset('admin/js/script.js')}}"></script>
        <script>
            function showPass1() {
			var x = document.getElementById("myInput1");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}
			function showPass2() {
				var x = document.getElementById("myInput2");
				if (x.type === "password") x.type = "text";
				else x.type = "password";
			}
			function showPass3() {
				var x = document.getElementById("myInput3");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}

              $(document).ready(function () {
                    bsCustomFileInput.init()
                })
                $(document).ready(function(){
                setTimeout(function(){
                $('.foo').fadeOut()
            }, 3000);
        });
        </script>
		
    </body>
</html>
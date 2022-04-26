@extends('layouts.master2')
@section('title', 'CueCancer - Login')

@section('content')
			<!-- Main Wrapper -->
			@include('partials.flash')
			<div class="main-wrapper login-body">
				<div class="login-wrapper">
					<div class="container">
						<div class="loginbox">
							<div class="login-left">
								<img class="img-fluid" src="{{asset('admin/img/logo-white.png')}}" alt="Logo">
							</div>
							<div class="login-right">
								<div class="login-right-wrap">
									<h1>Login</h1>
									<p class="account-subtitle">Access to our dashboard</p>
									
									<!-- Form -->
									<form action="{{ url('login/submit') }}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<input class="form-control" name="email" type="text" value="{{ old('email') }}" placeholder="Email" required>@error('email')<small class="text-danger">{{ $message }}</small>@enderror
										</div>
										<div class="form-group">
											<input class="form-control" id="myInput1" name="password" type="password" value="" placeholder="Password" required><input type="checkbox" onclick="showPass1()">Show Password @error('password')<small class="text-danger">{{ $message }}</small>@enderror
										</div>
										<div class="form-group">
											<button class="btn btn-primary btn-block" type="submit">Login</button>
										</div>
									</form>
									<!-- /Form -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Wrapper -->
@endsection
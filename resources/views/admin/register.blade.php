@extends('layouts.master2')
@section('title', 'CueCancer - Register')

@section('content')
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class=" col-md-4 login-left">
                        <img class="img-fluid" src="{{asset('admin/img/logo-white.png')}}" alt="Logo">
                    </div>
                    <div class=" col-md-8 login-right">
                        <div class="login-right-wrap">
                            <h1>Add Admin</h1>
                            
                            <!-- Form -->
                            <form action="{{ url('registration/submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" name="name" type="text" value="{{ old('name') }}" placeholder="Name" required> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="user_id" type="text" value="{{ old('id') }}" placeholder="User ID" required>@error('user_id')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="email" type="text" value="{{ old('email') }}" placeholder="Email" required>@error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="mobile" placeholder="Contact No" pattern="[0]{1}[1]{1}[0-9]{9}" title="Enter 11 digits mobile number" value="{{old('mobile')}}" required>@error('mobile')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    {{-- <label for="image"><b>Image</b></label> --}}
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image" required>
                                        <label class="custom-file-label" for="image" required>Choose Picture</label>@error('image')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{-- <label for="blood_group">Blood Group: </label> --}}
                                    <select class="form-control" name="blood_grp" required>
                                        <option value="">Select Blood Group</option>
                                        <option value="A+VE">A+VE</option>
                                        <option value="A-VE">A-VE</option>
                                        <option value="B+VE">B+VE</option>
                                        <option value="B-VE">B-VE</option>
                                        <option value="O+VE">O+VE</option>
                                        <option value="O-VE">O-VE</option>
                                        <option value="AB+VE">AB+VE</option>
                                        <option value="AB-VE">AB-VE</option>
                                    </select>@error('blood_grp')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="address" type="text" value="{{ old('address') }}" placeholder="Address" required>@error('address')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="myInput1" type="password" placeholder="Password" name="password" value="{{ old('password') }}" required><input type="checkbox" onclick="showPass1()">Show Password @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="cpassword" id="myInput2" type="password" placeholder="Confirm Password" required><input type="checkbox" onclick="showPass2()">Show Password @error('cpassword')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                                </div>
                            </form>
                            <!-- /Form -->
                            
                            <div class="text-center dont-have">Back To <a href="{{ url('/') }}">Dashboard</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection
@extends('layouts.master')
@section('title', 'Doctor List')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">  
    @include('partials.flash')
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of Doctor</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Doctor</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <!-- Data Table -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Doctor ID</th>
                                        <th>Doctor Name</th>
                                        <th>Speciality</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Blood Group</th>
                                        <th>Fee</th>
                                        <th>Schedule</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($doctors->count())
                                    @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->doctor_id }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" 
                                                    src="{{ config('app.front_url').'/photos/'. $doctor->image }}" alt="User Image"></a>
                                                <a href="#">{{ $doctor->name }} 
                                                    </a>
                                            </h2>
                                        </td>
                                        <td>{{ $doctor->speciality }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->address }}</td>
                                        <td>{{ $doctor->mobile }}</td>
                                        <td>{{ $doctor->blood_grp }}</td>
                                        <td>{{ $doctor->fee }}</td>
                                        <td>
                                            @foreach(explode(',', $doctor->day) as $key => $d)
                                                @if($key == 0) 
                                                    @if($d == 0) Sunday to
                                                    @elseif($d == 1) Monday to
                                                    @elseif($d == 2) Tuesday to
                                                    @elseif($d == 3) Wednesday to
                                                    @elseif($d == 4) Thursday to
                                                    @elseif($d == 5) Friday to
                                                    @else Saturday to
                                                    @endif
                                                @else
                                                    @if($d == 0) Sunday
                                                    @elseif($d == 1) Monday
                                                    @elseif($d == 2) Tuesday
                                                    @elseif($d == 3) Wednesday
                                                    @elseif($d == 4) Thursday
                                                    @elseif($d == 5) Friday
                                                    @else Saturday
                                                    @endif
                                                @endif
                                            @endforeach <br>
                                            @foreach(explode(',', $doctor->time) as $key => $t)
                                                @if($key == 0) {{ $t }} to @else {{ $t }} @endif
                                            @endforeach
                                        </td>
                                        <td><a type="button" class="btn btn-sm btn-primary" data-bs-target="#edit" data-bs-toggle="modal" data-id="{{$doctor->id}}" data-name="{{$doctor->name}}" data-speciality="{{$doctor->speciality}}" data-email="{{$doctor->email}}" data-address="{{$doctor->address}}" data-blood_grp="{{$doctor->blood_grp}}" data-fee="{{$doctor->fee}}" data-day="{{$doctor->day}}" data-time="{{$doctor->time}}" data-mobile="{{$doctor->mobile}}" > <i class="fa fa-edit"></i></a>

                                        <a href="{{ url('doctor/delete/'.$doctor->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you want to delete?')"> <i class="fa fa-trash"></i>Delete</a></td>
                                    </tr>
                                    @endforeach
                                    @else   
                                        <tr>
                                            <td colspan="6">
                                                <h5 class="text-center">No posts found.</h5>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>			
        </div>
        <!-- /Data Table -->
                                        <!-- Edit Details Modal -->
                                        <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Personal Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('profile/submit') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row form-row">
                                                                <div class="col-6">
                                                                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                                                                    <div class="form-group">
                                                                        <label> Name</label>
                                                                        <input type="text" name="name" class="form-control" value="{{ $doctor->name }}">@error('name')<small class="text-danger">{{ $message }}</small>@enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>User ID</label>
                                                                            <input type="text" name="user_id" class="form-control" value="{{ $doctor->doctor_id }}" readonly>@error('user_id')<small class="text-danger">{{ $message }}</small>@enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>Email ID</label>
                                                                        <input type="email" name="email" class="form-control" value="{{ $doctor->email }}">
                                                                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>Mobile</label>
                                                                        <input type="text" name="mobile"  value="{{ $doctor->mobile }}" class="form-control">@error('mobile')<small class="text-danger">{{ $message }}</small>@enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                    <label>Address</label>
                                                                        <input class="form-control" name="address" type="text" value="{{ $doctor->address }}" required>@error('address')<small class="text-danger">{{ $message }}</small>@enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                    <label>Blood Group</label>
                                                                    <select class="form-control" name="blood_grp" required>
                                                                        <option value="{{ $doctor->blood_grp  }}">{{ $doctor->blood_grp }}</option>
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
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Image</label>
                                                                        <input type="file" name="image" class="custom-file-input" id="image">                
                                                                        <label class="custom-file-label" for="image">Choose Picture</label>@error('image')<small class="text-danger">{{ $message }}</small>@enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Edit Details Modal -->
    </div>			
</div>
<script>
    $('#edit').on('show.bs.modal', function (event) {
     var button = $(event.relatedTarget);
     var data_id = button.data('id');
     var data_name = button.data('name');
     var data_speciality = button.data('speciality');
     var data_email = button.data('email');
     var data_address = button.data('address');
     var data_mobile = button.data('mobile');
     var data_blood_grp = button.data('blood_grp');
     var data_fee = button.data('fee');
     var data_day = button.data('day');

     var modal = $(this);

     modal.find('.modal-body #data_id').val(data_id);
     modal.find('.modal-body #data_name').val(data_name);
     modal.find('.modal-body #data_speciality').val(data_speciality);
     modal.find('.modal-body #data_email').val(data_email);
     modal.find('.modal-body #data_address').val(data_address);
     modal.find('.modal-body #data_mobile').val(data_mobile);
     modal.find('.modal-body #data_blood_grp').val(data_blood_grp);
     modal.find('.modal-body #data_fee').val(data_fee);
     modal.find('.modal-body #data_day').val(data_day);
    });
</script>
<!-- /Page Wrapper -->
@endsection
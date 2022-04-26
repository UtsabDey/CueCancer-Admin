<!-- Page Wrapper -->
@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Edit Blog</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Blogs</a></li>
                        <li class="breadcrumb-item active">Edit Blog</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            @include('partials.flash')
            <div class="col-sm-12">
                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Edit Post </h3>
                                            <a href="{{ url('blog/list') }}" class="btn btn-primary">Go Back to Post List</a>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                                <div class="card-body">
                                                    <form action="{{ url('blog/update') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf 
                                                        @method('patch')
                                                        <div class="form-group">
                                                            <input type="hidden" name="id" value="{{ $edit->id }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Post title</label>
                                                            <input type="name" name="title" value="{{ $edit->title }}" class="form-control" placeholder="Enter title" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <label for="image">Image</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" name="image" class="custom-file-input" id="image">
                                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4 text-right">
                                                                    <div style="overflow:hidden; margin-left: auto">
                                                                        <img src="{{asset('/photos/'.$edit->image)}}" 
                                            alt="photo" height="80px" width="150px">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Description</label>
                                                            <textarea name="details" id="description" rows="4" class="form-control"
                                                                placeholder="Enter description" required>{{ $edit->details }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary">Update Post</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main content -->
            </div>			
        </div>
        
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection
<!-- Page Wrapper -->
@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Blog List</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Blog List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-sm-12">
                @include('partials.flash')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Post List</h3>
                            <a href="{{ url('blog/add') }}" class="btn btn-primary">Create Post</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="table-responsive">
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Author ID</th>
                                        <th>Details</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($blogs->count())
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->id }}</td>
                                            <td>
                                                <img src="{{asset('/photos/'.$blog->image)}}" 
                                                alt="photo" height="50px" width="80px">
                                            </td>
                                            <td>{{\Illuminate\Support\Str::limit($blog->title, 20, $end='...') }}</td>
                                            <td>{{ Session('loggedUser')->user_id }}</td>
                                            <td>{{\Illuminate\Support\Str::limit($blog->details, 50, $end='...') }}</td>
                                            <td style="width: 130px">{{ $blog->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ url('') }}" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i> </a>
                                                <a href="{{ url('blog/edit/'.$blog->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> </a>
                                                <a href="{{ url('blog/delete/'.$blog->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you want to delete?')"> <i class="fa fa-trash"></i> </a>
                                            </td>
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
                            @include('partials.paginate', ['data' => $blogs])
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>			
        </div>
        
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
    </div>
</div>
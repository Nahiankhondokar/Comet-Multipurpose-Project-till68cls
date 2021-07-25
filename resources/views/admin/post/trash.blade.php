@extends('admin.layouts.app')

@section('main-content')

    <!-- Main Wrapper -->
    <div class="main-wrapper">



        @include('admin.layouts.header')
        @include('admin.layouts.menu')



        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome to {{ Auth::user() -> name }} !</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Tags</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-lg-12">
                        
                        @include('validate')

                        <a href="{{ route('post.create') }}" class="btn btn-info btn-sm">Add New Post</a>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Post (Trash)</h4>
                                <a class="badge badge-primary" href="{{ route('post.index') }}">Published {{ ($published == 0) ? '' : $published }}</a>
                                <a class="badge badge-danger" href="{{ route('post.trash') }}">Trash {{ $trash }}</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Post Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ( $all_data as $data )
                                        
                                                {{-- For showing Single Post Format --}}
                                                @php
                                                    $featured = json_decode($data -> featured);
                                                @endphp

                                            <tr>
                                                <td>{{ $loop -> index + 1 }}</td>
                                                <td>{{ $data -> title }}</td>
                                                <td>{{ $featured -> post_type }}</td>
                                                <td>
                                                    
                                                    <a id="" href="{{ route('post.trash.update', $data -> id) }}" class="btn btn-warning btn-sm">Data Recover
                                                    </a>
                                                    
                                                    {{-- For Data Delete --}}
                                                    <form class="d-inline-block" method="POST" action="{{ route('post.destroy', $data -> id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">Permanently Delete</button>
                                                    </form>

                                                </td>
                                            </tr>


                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->



    {{-- Add Tag Modal --}}

    <div id="add_tag_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
    
                <div class="modal-header">
    
                    <h2>Add New Tag</h2>
                    <hr>
                </div>
    
                <div class="modal-body">

                    <form id="" action="{{ route('tag.store') }}" method="POST">
                        @csrf
                    
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-info btn-sm" value="Submit" type="submit">
                            
                        </div>
                    </form>
    
                </div>
    
                <div></div>
    
            </div>
        </div>
    </div>



    {{-- Edit Category Modal --}}

    <div id="edit_tag_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
    
                <div class="modal-header">
    
                    <h2>Edit Tag</h2>
                    <hr>
                </div>
    
                <div class="modal-body">

                    <form id="" action="{{ route('tag.update', 1) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" class="form-control" type="text">
                            <input name="edit_id" class="form-control" type="hidden">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-info btn-sm" value="Submit" type="submit">
                            
                        </div>
                    </form>
    
                </div>
    
                <div></div>
    
            </div>
        </div>
    </div>

@endsection

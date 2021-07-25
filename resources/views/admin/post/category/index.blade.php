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
                                <li class="breadcrumb-item active">Category</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-lg-12">
                        
                        @include('validate')

                        <a data-toggle="modal" href="#add_category_modal" class="btn btn-info btn-sm">Add New Category</a>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Categories</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Name</th>
                                                <th>Category Slug</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ( $all_data as $data )
                                                
                                            

                                            <tr>
                                                <td>{{ $loop -> index + 1 }}</td>
                                                <td>{{ $data -> name }}</td>
                                                <td>{{ $data -> slug }}</td>
                                                <td>{{ $data -> created_at -> diffForHumans() }}</td>
                                                <td>
                                                    {{-- Switcher --}}
                                                    <div class="status-toggle">
                                                        <input type="checkbox" status_id="{{ $data -> id }}" {{ ($data -> status == true ? 'checked="checked"' : '') }} id="cat_status_{{ $loop -> index + 1 }}" class="check cat_check">
                                                        <label for="cat_status_{{ $loop -> index + 1 }}" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- <a href="" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a> --}}
                                                    <a id="" edit_id="{{ $data -> id }}" href="" class="btn btn-warning btn-sm edit_cat"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>

                                                    {{-- Delete Feature Using Resource Route --}}
                                                    <form class="d-inline" action="{{ route('category.destroy', $data -> id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm delete_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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



    {{-- Add Category Modal --}}

    <div id="add_category_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
    
                <div class="modal-header">
    
                    <h2>Add New Category</h2>
                    <hr>
                </div>
    
                <div class="modal-body">

                    <form id="" action="{{ route('category.store') }}" method="POST">
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

    <div id="edit_category_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
    
                <div class="modal-header">
    
                    <h2>Edit Category</h2>
                    <hr>
                </div>
    
                <div class="modal-body">

                    <form id="" action="{{ route('category.update', 1) }}" method="POST">
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

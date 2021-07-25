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
                                <h4 class="card-title">All Post (Published)</h4>
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
                                                <th>Autor</th>
                                                <th>Post Type</th>
                                                <th>Post Category</th>
                                                <th>Post Tag</th>
                                                <th>Time</th>
                                                <th>Status</th>
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
                                                <td>{{ $data -> user -> name }}</td>
                                                <td>{{ $featured -> post_type }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ( $data -> categroies as $cat )

                                                        <li>{{ $cat -> name }}</li>
                                                        
                                                    @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ( $data -> tags as $tag )

                                                        <li>{{ $tag -> name }}</li>
                                                        
                                                    @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $data -> created_at -> diffForHumans() }}</td>
                                                <td>
                                                    {{-- Status Switcher --}}
                                                    <div class="status-toggle">
                                                        <input type="checkbox" status_id={{ $data -> id }} {{ ($data -> status == true ? 'checked="checked"' : '') }} id="cat_status_{{ $loop -> index + 1 }}" class="check tag_check">
                                                        <label for="cat_status_{{ $loop -> index + 1 }}" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- <a href="" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a> --}}
                                                    <a id="" edit_id="{{ $data -> id }}" href="#" class="btn btn-warning btn-sm edit_tag"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                    <a id="" href="{{ route('post.trash.update', $data -> id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                    

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

    {{-- <div id="" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
    
                <div class="modal-header">
    
                    <h2>Add New Tag</h2>
                    <hr>
                </div>
    
                <div class="modal-body">

                    
    
                </div>
    
                <div></div>
    
            </div>
        </div>
    </div> --}}



    {{-- Edit Category Modal --}}

    {{-- <div id="" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
    
                <div class="modal-header">
    
                    <h2>Edit Tag</h2>
                    <hr>
                </div>
    
                <div class="modal-body">

    
                </div>
    
                <div></div>
    
            </div>
        </div>
    </div> --}}

@endsection

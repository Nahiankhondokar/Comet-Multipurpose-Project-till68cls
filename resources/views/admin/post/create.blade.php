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
                                <li class="breadcrumb-item active">Post</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->


                <div class="row">
                    @include('validate')
                    <div class="col-lg-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">Add New Post</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Post Format</label>
                                        <div class="col-lg-9">
                                            <select name="post_type" class="form-control" id="post_format">
                                                <option value="Image">-Select-</option>
                                                <option value="Image">Image</option>
                                                <option value="Gallery">Gallery</option>
                                                <option value="Video">Video</option>
                                                <option value="Audio">Audio</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Post Title</label>
                                        <div class="col-lg-9">
                                            <input name="title" type="text" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Category</label>
                                        <div class="col-md-9">

                                            @foreach ($all_cat as $cat )
                                            
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="{{ $cat -> id }}" name="cat[]"> {{ $cat -> name }}
                                                </label>
                                            </div>
                                                
                                            @endforeach
                                            
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Tags</label>
                                        <div class="col-lg-9">
                                            <select style="width: 100%;" name="tag[]" id="" class="post_tag_select" multiple="multiple">
                                                @foreach ($all_tag as $tag)
                                                    
                                                <option value="{{ $tag -> id }}">{{ $tag -> name }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="post_image">
                                        <div class="form-group row ">
                                            <label class="col-lg-3 col-form-label">Post Image</label>
                                            <div class="col-lg-9">
                                                <img style="width: 400px;" src="" alt="" class="post_img_load"><br>
                                                <label for="post_img_select"><img style="width: 100px; cursor: pointer;" src="{{ URL::to('admin/assets/img/img.png') }}" alt=""></label>
                                                <input name="image" id="post_img_select" type="file" class="d-none">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post_gallery">
                                        <div class="form-group row ">
                                            <label class="col-lg-3 col-form-label">Post Gallery Image</label>
                                            <div class="col-lg-9">
                                                <div class="post_gallery_img">

                                                </div>
                                                <br>
                                                <label for="post_img_select_g"><img style="width: 100px; cursor: pointer;" src="{{ URL::to('admin/assets/img/img.png') }}" alt=""></label>
                                                <input id="post_img_select_g" name="post_gall[]" type="file" class="d-none" multiple>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post_video">
                                        <div class="form-group row ">
                                            <label class="col-lg-3 col-form-label">Post Video Link</label>
                                            <div class="col-lg-9">
                                                <input name="video" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post_audio">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Post Audio Link</label>
                                            <div class="col-lg-9">
                                                <input name="audio" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Content</label>
                                        <div class="col-lg-9">
                                            <textarea name="content" id="post_editor" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
               

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->



    {{-- Basic Modal --}}

    <div id="" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
    
                <div class="modal-header">
    
                    <h2></h2>
                    <hr>
                </div>
    
                <div class="modal-body">

                    
    
                </div>
    
                <div></div>
    
            </div>
        </div>
    </div>



@endsection

@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Blog Post </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('blog.post.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $blogPost->id }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <!-- start 2nd row  -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Title En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title_en" class="form-control"
                                                            required="" value="{{ $blogPost->post_title_en }}">
                                                        @error('post_title_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Post Title Slo <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title_slo" class="form-control"
                                                            required="" value="{{ $blogPost->post_title_slo }}">
                                                        @error('post_title_slo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 2nd row  -->

                                        <div class="row">
                                            <!-- start 6th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>BlogCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select
                                                                BlogCategory</option>
                                                            @foreach ($blogCategory as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ $category->id == $blogPost->category_id ? 'selected' : '' }}>
                                                                    {{ $category->blog_category_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                            <div class="col-md-6">





                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5>Current Post Image </h5>
                                                        <input type="hidden" name="id" value="{{ $blogPost->id }}">
                                                        <input type="hidden" name="old_img"
                                                            value="{{ $blogPost->post_image }}"><img
                                                            src="/frontend/images/posts/thumbs/{{ $blogPost->post_image }}"
                                                            style="height: 130px; width: 130px;">


                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5>New Post Image </h5>
                                                        <img src="" id="mainThmb">
                                                        <input type="file" name="post_image" class="form-control"
                                                            onChange="mainThamUrl(this)">
                                                        @error('post_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                </div><!--  end col md 3		 -->

                                            </div> <!-- end 6th row  -->


                                            <div class="space60"> </div>

                                            <div class="row">
                                                <!-- start 8th row  -->
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Post Details English <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea id="editor1" name="post_details_en" rows="10" cols="80" required="">
                                                            {{ $blogPost->post_details_en }}
                                                        </textarea>
                                                            @error('post_details_en')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                </div> <!-- end col md 6 -->

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Post Details Slovenian <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea id="editor2" name="post_details_slo" rows="10" cols="80">
                                                            {{ $blogPost->post_details_slo }}
                                                        </textarea>
                                                        </div>
                                                    </div>

                                                </div> <!-- end col md 6 -->

                                            </div> <!-- end 8th row  -->

                                            <hr>

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                    value="Update Post">
                                            </div>
                            </form>




                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>




    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(130).height(130);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: rgb(153, 137, 137)
        }

        .div_center {
            text-align: center;
            padding: 30px;
        }

        label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <!-- Edit post section starts-->
            <h1 class="post_title">Update Post</h1>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div>
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <label>Post Title</label>
                        <input type="text" class="" name="title" value="{{ $post->title }}">
                    </div>
                    <div class="div_center">
                        <label>Post Description</label>
                        <textarea name="description">{{ $post->description }}</textarea>
                    </div>
                    <div class="div_center">
                        <label>Old Image</label>
                        <img src="{{ asset('/') }}postimage/{{ $post->image }}" alt="old_image" height="100px"
                            width="150px" style="margin: auto">
                    </div>
                    <div class="div_center">
                        <label>Update Old Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="div_center">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>

                </form>
            </div>
            <!-- edit post section ends-->
            @include('admin.footer')
</body>

</html>

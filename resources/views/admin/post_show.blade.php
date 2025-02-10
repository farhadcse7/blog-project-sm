<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    <style type="text/css">
        .title_deg {
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .table_deg {
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 70px;
        }

        .th_deg {
            background-color: skyblue;
        }

        .img_deg {
            width: 150px;
            height: 100px;
            padding: 10px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <!-- show post section start-->
        <div class="page-content">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <h1 class="title_deg">All Post</h1>
            <table class="table_deg">
                <tr class="th_deg">
                    <th>Post Title</th>
                    <th>Description</th>
                    <th>Post By</th>
                    <th>Post Status</th>
                    <th>User Type</th>
                    <th>Image</th>
                    <th>Delete</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->post_status }}</td>
                        <td>{{ $post->usertype }}</td>
                        <td>
                            <img src="{{ asset('/') }}postimage/{{ $post->image }}" class="img_deg"
                                alt="image not added" />
                        </td>
                        <td><a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger"
                                onclick="confirmation(event)">Delete</a></td>
                    </tr>
                @endforeach

            </table>

            <!-- show post section end-->
            @include('admin.footer')

            <script>
                function confirmation(event) {
                    event.preventDefault();
                    var urlToRedirect = event.currentTarget.getAttribute('href');
                    swal({
                            title: 'Are you sure to Delete this?',
                            text: 'Once deleted, you will not be able to recover!',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.href = urlToRedirect;
                            } else {
                                swal('Your post is safe!');
                            }
                        });
                }
            </script>
</body>

</html>

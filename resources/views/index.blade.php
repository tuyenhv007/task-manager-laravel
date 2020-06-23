<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Tasks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Tasks List
        </div>

        @if(!isset($tasks))
            <h5 class="text-primary">Dữ liệu không tồn tại</h5>
        @else
            <table class="table table-bordered">
                <thead>
                <th scope="col">STT</th>
                <th scope="col">Task title</th>
                <th scope="col">Content</th>
                <th scope="col">Created</th>
                <th scope="col">Due Date</th>
                <th>Image</th>
                </thead>
                <tbody>
                @if(count($tasks) == 0)
                    <tr>
                        <td colspan="5"><h5 class="text-primary">Hiện tại chưa có task nào được tạo</h5></td>
                    </tr>
                @else
                    @foreach($tasks as $key => $task)
                        <tr>
                            <td scope="row">{{++$key}}</td>
                            <td>{{$task->title }}</td>
                            <td>{{$task->content }}</td>
                            <td>{{$task->created_at}}</td>
                            <td>{{$task->due_date}}</td>
                            <td>
                                <img src="{{asset('storage/images/' . $task->image)}}" alt="" style="width: 150px">
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        @endif
    </div>
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>

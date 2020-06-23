@extends('home')
@section('title', 'Danh sách Task')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Danh sách Task</h1>
        </div>
        <div class="col-12">
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <p class="text-seccess">
                    <i class="fa fa-check"
                       aria-hidden="true"></i>{{ \Illuminate\Support\Facades\Session::get('success') }}
                </p>
            @endif
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên công việc</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Ngày hết hạn</th>
                    <th scope="col">Ảnh</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($tasks) == 0)
                    <tr>
                        <td colspan="5">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($tasks as $key => $task)
                        <tr>
                            <td scope="row">{{ ++$key }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->content }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                                @if($task->image)
                                    <img src="{{ asset('storage/' . $task->image) }}" alt="" style="width: 50px; height: 50px">
                                @else
                                    {{ 'Chưa có ảnh' }}
                                @endif
                            </td>
                            <td><a href="{{ route('tasks.edit', $task->id) }}">Sửa</a></td>
                            <td><a href="{{ route('tasks.destroy', $task->id) }}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Thêm mới</a>
        </div>
    </div>
@endsection

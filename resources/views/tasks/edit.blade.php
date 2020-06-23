@extends('home')
@section('title', 'Cập nhập công việc')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Cập nhập công việc</h2>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tìm công việc</label>
                    <input type="text" class="form-control" name="title" value=" {{ $task->title }}" required>
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea name="content" rows="3" class="form-control" required>{{ $task->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Ảnh</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
                <div class="form-group">
                    <label for="">Ngày hết hạn</label>
                    <input type="date" class="form-control" name="due_date" value="{{ $task->due_date }}" required>
                </div>
                <button class="btn btn=primary" type="submit">Chỉnh sửa</button>
                <button class="btn btn=secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection

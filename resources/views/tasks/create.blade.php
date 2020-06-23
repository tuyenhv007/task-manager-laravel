@extends('home')
@section('title', 'Thêm mới công việc')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Thêm mới công việc</h2>
        </div>
        <div class="col-md-12">
            <form action="{{ route('tasks.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên công việc</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea name="content" rows="3" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Ảnh</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Ngày hết hạn</label>
                    <input type="date" class="form-control" name="due_date" required>
                </div>
                <button class="btn btn-primary" type="submit">Thêm mới</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection

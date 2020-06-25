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

                @if ($errors->all())
                    <div class="alert alert-danger">
                        Có vấn đề khi thêm mới công việc
                    </div>
                @endif
                <div class="form-group">
                    <label class="{{$errors->first('title') ? 'text-danger' : ''}}">
                        <strong>Tên công việc</strong>
                    </label>
                    <input type="text" class="form-control" name="title">
                    @if ($errors->first('title'))
                        <p class="text-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label class="{{$errors->first('content') ? 'text-danger' : ''}}">
                        <strong>Nội dung</strong>
                    </label>
                    <textarea name="content" rows="3" class="form-control"></textarea>
                    @if ($errors->first('content'))
                        <p class="text-danger">{{ $errors->first('content') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1" class="{{$errors->first('image') ? 'text-danger' : ''}}">
                        <strong>Ảnh</strong>
                    </label>
                    <input type="file" class="form-control" name="image">
                    @if ($errors->first('image'))
                        <p class="text-danger">{{ $errors->first('image') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1" class="{{$errors->first('due_date') ? 'text-danger' : ''}}">
                        <strong>Ngày hết hạn</strong>
                    </label>
                    <input type="date" class="form-control" name="due_date">
                    @if ($errors->first('due_date'))
                        <p class="text-danger">{{ $errors->first('due_date') }}</p>
                    @endif
                </div>
                <button class="btn btn-primary" type="submit">Thêm mới</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection

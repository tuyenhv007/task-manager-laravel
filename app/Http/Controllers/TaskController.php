<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormTaskRequest;
use App\Tasks;
use Illuminate\Support\Facades\Session;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        // Lay ra toan bo cac task tu database thong qua truy van bang Eloquent
        $tasks = \App\Tasks::all();

        // Tra ve view index va truyen bien tasks chua danh sach cac task
        return view('tasks.list', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store( FormTaskRequest $request)
    {
//        $task = new Tasks();
//        $task->title = $request->inputTitle;
//        $task->content = $request->inputContent;
//        $task->due_date = $request->inputDueDate;
//
//        $file = $request->inputFile;
//        if (!$request->hasFile('inputFile')) {
//            $task->image = $file;
//        } else {
//            $fileName = $request->inputFileName;
//        }
//        $fileExtension = $file->getClientOriginalExtension();
//        $newFileName = "$fileName.$fileExtension";
//        $task->image = $newFileName;
//        $request->file('inputFile')->storeAs('public/images', $newFileName);
//        $task->save();
//        $message = "Tạo Task $request->inputTitle thành công!";
//        Session::flash('create-success', $message);
//        return redirect()->route('tasks.index', compact('message'));
        $task = new Tasks();
        $task->title = $request->input('title');
        $task->content = $request->input('content');
        $task->due_date = $request->input('due_date');

        //upload file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $task->image = $path;
        }
        $task->save();

        // dung session de dua ra thong bao
        Session::flush('success', 'Tạo mới thành công');
        //
//        tao moi xong qua ve trang danh sach task
        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Tasks::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
    $task = Tasks::findOrFail($id);
    $task->title = $request->input('title');
    $task->content = $request->input('content');

    // cap nhap anh
        if ($request->hasFile('image')) {

            // xoa anh cu neu co
            $currentImg = $task->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }

            // cap nhap anh moi
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $task->image = $path;
        }
        $task->due_date = $request->input('due_date');
        $task->save();

        // dung session de dua ra thong bao
        Session::flush('success', 'Cập nhập thành công');
        // tao moi xong quay ve trang danh sach task
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        $image = $task->image;

        // delete image
        if ($image) {
            Storage::delete('/public/'. $image);
        }
        $task->delete();

        // dung session de dua ra thong bao
        Session::flush('success', 'Xóa thành công');
        // xoa xong quay ve trang danh sach task
        return redirect()->route('tasks.index');
    }
}

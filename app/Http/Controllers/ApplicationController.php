<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $items = DB::select('select * from applications');
        return view('index', ['items' => $items]);
    }
    public function create(Request $request)
    {
            $param= [
            'content' => $request->content,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::insert('insert into applications (content, created_at, updated_at) values (:content, :created_at, :updated_at)', $param);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $items = Application::find($id);
        $items->content=$request->input('content');
        $items->save();
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $param = Application::find($id);
        $param->delete();
        return redirect('/');
    }
}
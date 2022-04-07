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
        $validate_rule = [
            'content' => 'required|max:20',
        ];
        $this->validate($request, $validate_rule);
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
        $param= [
            'id' => $request->id,
            'content' => $request->content,
            'created_at' => now(),
        ];
        DB::update('update applications set content =:content, created_at=:created_at where id=:id', $param);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $param= [
            'id' => $request->id
        ];
        $param = Application::find($param);
        $param->each->delete();
        return redirect('/');
    }
}
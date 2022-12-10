<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }
    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id', 'name', 'email')->get();
            return DataTablesDataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('user.edit',$row['id']).'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
       
        }
    }
    public function editUser($id)
    {
        return $id;
    }

}

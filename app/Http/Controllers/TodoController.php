<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    //get all resource
    public function index(){
        return 'blablablablablablablabla';
    }

    //safe data
    public function store(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'name' => 'required|string|max:10',
        ]);

        if ($validador->fails()) {
            return $validador->errors();
        }


        $id = $request->get('id');
        $name = $request->get('name');
        $description = $request->get('description');
        $status = $request->get('status');

        $data = [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'status' => $status
        ];
        return response()->json($data, 201);
    }

    public function update($id){
        return 'Actualizando id '.$id;
    }

    public function show($id){
        return 'sfgvds '.$id;
    }

    public function destroy($id){
        return 'Eliminando id '.$id;
    }

}

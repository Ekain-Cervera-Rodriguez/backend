<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    //get all resource
    public function index(){
        return Todo::query()->select(DB::raw("CONCAT_WS(' ', name, description) AS registro"), 'id')->get();
    }

    //safe data
    public function store(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ];

        try {
            $todo = Todo::query()->create($data);
        }catch (\Exception $e){
            return response()->unprocessable('Algo salio mal', ['Hubo un problema al crear el registro']);
        }
        return response()->success($todo);
    }

    public function update(Request $request, $id){
        $status = $request->get('status');
        $model = Todo::query()->find($id);
        $model->update(['status' => $status]);
        return $model;
    }


    public function show($id){
        return Todo::query()->select(DB::raw("CONCAT_WS(' ', name, description) AS registro"), 'id')->find($id);
    }

    public function destroy($id){
        $delete = Todo::withTrashed()->find($id);
        if ($delete->deleted_at) {
            $delete->restore();
        } else{
            $delete->delete();
        }
        return response()->success(['data' =>  'OKAY']);
    }

}
//roles: id, nmobre, slu o sobrenombre, permisos
//hacer request

<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use App\Models\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return Roles::all();
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $role = Roles::query()->create($data);
        }catch (\Exception $e){
            return response()->unprocessable('Algo salio mal', ['Hubo un problema al crear el registro']);
        }
        return response()->success($role);
    }

    public function update(Request $request, $id){
        $register = Roles::query()->find($id);
        $register->update($request->all());
        return response()->success($register);
    }


    public function show($id){
        return Roles::query()->find($id);
    }

    public function destroy($id){
        $delete = Roles::withTrashed()->find($id);
        if ($delete->deleted_at) {
            $delete->restore();
        } else{
            $delete->delete();
        }
        return response()->success(['data' =>  'Ya está :)']);
    }


}

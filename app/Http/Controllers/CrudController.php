<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class CrudController extends Controller
// {
//     //

// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Usuario;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $usuario = Usuario::all();
        return view('home')->with(compact('usuario'));
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|max:255',
            'usuario' => 'required'
        ]);
        $usuario = Usuario::create($data);
        return Response::json($usuario);
    }
    public function update(Request $request, Usuario $usuario)
    {
        //
        // $data = $request->validate([
            // 'nombre' => 'required|max:255',
            // 'usuario' => 'required'
        // ]);
        
        request()->validate([
            'nombre' => 'required|max:255',
            'usuario' => 'required'
        ]);
        $success = $usuario->update([
            'nombre' => request('nombre'),
            'usuario' => request('usuario'),
        ]);
    
        return ['success' => $success];
        // $success = $usuario->update($request->all());

        // return response()->json([
        //     'status' => $success,
        //     'message' => "Character Updated successfully!",
        //     'character' => $character
        // ], 200);
    }

    public function destroy($id)
    {

        Usuario::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}

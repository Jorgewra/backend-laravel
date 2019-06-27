<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Client;
use Validator;
class ClientController extends Controller
{
    public function createClient(Request $request)
    {
        return $this->store($request, null);
    }
    public function updateClient(Request $request, $id = null)
    {
        return $this->store($request, $id);
    }
    public function allClient()
    {
        try {
            $cliente = Client::where('status','<>', 'REMOVE')->orderBy('created_at', 'desc')->paginate(10);
            if($cliente == null){
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($cliente, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    public function getClient($id = null)
    {
        try {
            $cliente = Client::find($id);
            if ($cliente == null) {
                return response()->json([
                    'message' => 'field id is incorrect!',
                ], 400);
            }
            return response()->json($cliente, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    public function seachClient($value = null)
    {
        try {
            $cliente = Client::where('phone', $value)->first();
            if ($cliente == null) {
                return response()->json([
                    'message' => 'field phone is incorrect!',
                ], 400);
            }
            return response()->json($cliente, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    private function store(Request $request, $id = null)
    {
        try {
            $cliente = new Client();
            if ($request->phone == null) {
                return response()->json([
                    'message' => 'field obrigatory!',
                ], 400);
            }
            $validator = Validator::make($request->all(), ['phone' => 'required|numeric']);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'field phone is incorrect!',
                ], 400);
            }
            if ($id == null) {
                $cliente = Client::where('phone', $request->phone)->first();
            } else {
                $cliente = Client::find($id);
                if ($cliente == null) {
                    return response()->json([
                        'message' => 'field id is incorrect!',
                    ], 400);
                }
            }

            $file = $request->file('picture');
            $fileUpdate = null;
            if ($file) {
                $rules = array('foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                $validator = Validator::make(['foto' => $file], $rules);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => 'field picture is incorrect!',
                    ], 400);
                }
                $imageName = time() . '-' . $request->phone . '.' . $request->file->getClientOriginalExtension();
                $request->file->move(public_path('perfil'), $imageName);
                $fileUpdate = URL::to('perfil/' . $imageName);
            }
            if ($cliente == null) {
                $cliente = new Client();
            }
            $cliente->fill($request->all());
            if ($fileUpdate) {
                $cliente->picture = $fileUpdate;
            }
            $cliente->save();
            return response()->json($cliente, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
}

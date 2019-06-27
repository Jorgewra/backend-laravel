<?php

namespace App\Http\Controllers;

use App\model\Custumers;
use App\model\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Validator;

class CustumerController extends Controller
{
    public function createCustumer(Request $request)
    {
        return $this->store($request, null);
    }
    public function updateCustumer(Request $request, $id = null)
    {
        return $this->store($request, $id);
    }

    public function getCustumer($id = null){
        try {
            $cuntumer = Custumers::where( "id", $id)->with("getBanners")->first();
            if($cuntumer == null){
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($cuntumer, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    public function shopGeolocalizacao($latitude = null, $longitude = null)
    {
        try {
            $cuntumers = new Paginator(DB::select("SELECT * , (6371 *acos(cos(radians(?)) *cos(radians(latitude)) *cos(radians(?) - radians(longitude)) + sin(radians(?))"
                . "*sin(radians(latitude)))) AS distance FROM custumers where status = 'ACTIVE' order by distance asc", [$latitude, $longitude, $latitude]), 10);
            if ($cuntumers == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($cuntumers, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    public function allCustumer()
    {
        try {
            $cuntumers = Custumers::orderBy('created_at', 'desc')->paginate(10);
            if ($cuntumers == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($cuntumers, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    private function store(Request $request, $id = null)
    {
        try {
            $cuntumer = new Custumers();
            if ($id == null) {
                $validator = Validator::make($request->all(),
                    ['fullname' => 'required',
                        'email' => 'required',
                        'phone' => 'required',
                        'street' => 'required',
                        'city' => 'required',
                        'district' => 'required',
                        'state' => 'required',
                        'zipCode' => 'required',
                        'latitude' => 'required',
                        'longitude' => 'required',
                    ]);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors(),
                    ], 400);
                }
            }

            if ($id != null) {
                $cuntumer = Custumers::find($id);
                if ($cuntumer == null) {
                    return response()->json([
                        'message' => 'cuntumer not found',
                    ], 400);
                }
            } else {
                $user = new User([
                    'name' => $request->fullname,
                    'email' => $request->email,
                    'password' => bcrypt($request->phone),
                ]);
                $user->typeacess = 'client';
                $user->save();
                $cuntumer->users_id = $user->id;
            }
            $file = $request->file('picture');
            $fileUpdate = null;
            if ($file) {
                $rules = array('foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                $validator = Validator::make(['foto' => $file], $rules);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors(),
                    ], 400);
                }
                $imageName = time() . '-' . 'custumer' . '.' . $request->file->getClientOriginalExtension();
                $request->file->move(public_path('perfil'), $imageName);
                $fileUpdate = URL::to('perfil/' . $imageName);
            }
            if ($fileUpdate) {
                $cuntumer->picture = $fileUpdate;
            }
            $cuntumer->fill($request->all());
            $cuntumer->save();
            return response()->json([
                'message' => 'Sucess',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Addresses;
use Validator;

class AddressController extends Controller
{
    public function createAddress(Request $request){
        return $this->store($request,null);
    }
    public function updateAddress(Request $request,$id = null){
        return $this->store($request,$id);
    }
    public function getAddress($id = null){
        try {
            $addres = Addresses::find($id);
            if ($addres == null) {
                return response()->json([
                    'message' => 'Address not found',
                ], 404);
            }
            return response()->json($addres, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    public function allAddress($id = null){
        try {
            $address = Addresses::where('clients_id', $id)->orderBy('created_at', 'desc')->paginate(10);
            if($address == null || count($address) == 0){
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($address, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    private function store(Request $request, $id = null){
        try {
            $address = new Addresses();
            $validator = Validator::make($request->all(),
            ['street' => 'required',
             'city' => 'required',
             'district' => 'required',
             'state' => 'required',
             'country' => 'required',
             'zipCode' => 'required',
             'latitude' => 'required',
             'longitude' => 'required',
             'clients_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'field is incorrect!',
                ], 400);
            }
            if($id != null){
                $address = Addresses::find($id);
                if ($address == null) {
                    return response()->json([
                        'message' => 'Address not found',
                    ], 400);
                }
            }
            $address->fill($request->all());
            $address->save();
            return response()->json($address, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\model\Banners;
use Illuminate\Http\Request;
use Validator;

class BannerController extends Controller
{

    public function createBanner(Request $request)
    {
        return $this->store($request, null);
    }

    public function updateBanner(Request $request, $id = null)
    {
        return $this->store($request, $id);
    }
    private function store(Request $request, $id = null)
    {
        try {
            if($id == null){
                $validator = Validator::make($request->all(),['custumers_id' => 'required']);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors()->first(),
                    ], 400);
                }
            }
            $banner = new Banners();
            if ($id != null) {
                $banner = Banners::find($id);
                if ($banner == null) {
                    return response()->json([
                        'message' => 'Banner not found',
                    ], 400);
                }
            }
            $banner->fill($request->all());
            $banner->save();
            return response()->json([
                'message' => 'Sucess!',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
}

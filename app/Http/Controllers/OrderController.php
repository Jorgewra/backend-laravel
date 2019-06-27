<?php

namespace App\Http\Controllers;

use App\model\OrderItens;
use App\model\Orders;
use App\model\Evaluations;
use App\model\Favorites;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        return $this->store($request);
    }
    public function allAdminOrder(Request $request)
    {
        $validator = Validator::make($request->all(),
            ['dateBegin' => 'required'],
            ['dateEnd' => 'required']

        );
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
            ], 400);
        }
        $array_param = [
            ['created_at', '>=', $request->input('dateBegin')],
            ['created_at', '<=', $request->input('dateEnd')],
        ];

        if ($request->input('status') != null) {
            array_push($array_param, ['status', '=', $request->input('status')]);
        }
        if ($request->input('custume_id') != null) {
            array_push($array_param, ['custumers_id', '=', $request->input('custume_id')]);
        }
        return $this . seach($array_param);

    }
    //update status pedido
    public function updateOrder(Request $request){
        try {
           $rep = DB::update('update orders set status = ? where id = ? and status not in ( "CANCEL", "CLOSE", "SUSPENSE" )', array($request->input('status'),$request->input('id')));
           if($rep){
            return response()->json([
                'message' => 'Sucess!',
            ], 200);
           }else{
            return response()->json([
                'message' => 'Not update order',
            ], 400);
           }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    public function allClientOrder(Request $request)
    {
        $validator = Validator::make($request->all(),
            ['dateBegin' => 'required'],
            ['dateEnd' => 'required'],
            ['client_id' => 'required']

        );
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
            ], 400);
        }
        $array_param = [
            ['created_at', '>=', $request->input('dateBegin')],
            ['created_at', '<=', $request->input('dateEnd')],
            ['clients_id', '<=', $request->input('client_id')],
        ];

        if ($request->input('status') != null) {
            array_push($array_param, ['status', '=', $request->input('status')]);
        }
        return $this->seach($array_param);

    }
    public function getOrderOnly($id = null)
    {
        try {
            $order = Orders::where( "id", $id)
                ->with("getOrdersIetns")
                ->with("getCustumer")
                ->with("getUser")->first();
            if ($order == null) {
                return response()->json([
                    'message' => 'not found',
                ], 404);
            }
            return response()->json($order, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }

    private function seach($arrys_quey)
    {
        try {
            $queryOrders = Orders::where($arrys_quey)
                ->orderBy('status', 'asc')
                ->with("getOrdersIetns")
                ->with("getCustumer")
                ->with("getUser")
                ->paginate(10);
            if ($queryOrders == null) {
                return response()->json([
                    'message' => 'Orders not found!',
                ], 400);
            }
            return response()->json($queryOrders, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    private function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),
                ['phone' => 'required'],
                ['total' => 'required'],
                ['typeShop' => 'required'],
                ['client_id' => 'required'],
                ['custumers_id' => 'required'],
                ['latitude' => 'required'],
                ['longitude' => 'required'],

            );
            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors()->first(),
                ], 400);
            }
            if ($request->getOrdersIetns == null || count($request->getOrdersIetns) <= 0) {
                return response()->json([
                    'message' => "Itens not found",
                ], 400);
            }
            $order = new Orders();
            $order->fill($request->all());
            $order->save();

            $listItens = $request->getOrdersIetns;
            foreach ($listItens as $item) {
                $o_item = new OrderItens();
                $o_item->orders_id = $order->id;
                $o_item->fill($item);
                $o_item->save();
            }
            return response()->json([
                'message' => 'Sucess!',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    public function createEvaluation(Request $request){
        try {
            $avaluation = new Evaluations();
            $avaluation->fill($request->all());
            $avaluation->save();
            return response()->json([
                'message' => 'Sucess!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    public function createFavorite(Request $request){
        try {
            $favoite = new Favorites();
            $favoite->fill($request->all());
            $favoite->save();
            return response()->json([
                'message' => 'Sucess!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    public function getFovorite(){
        try {

         } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
}

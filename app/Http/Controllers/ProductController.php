<?php

namespace App\Http\Controllers;

use App\model\Categorys;
use App\model\PriceDymanic;
use App\model\Product;
use App\model\SubCategory;
use App\model\SubProduct;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
/**
 * Category
 */
    public function createCategory(Request $request)
    {
        return $this->storeCategory($request, null);
    }
    public function updateCategory(Request $request, $id = null)
    {
        return $this->storeCategory($request, $id);
    }
    public function categoryAll($id = null)
    {
        try {
            $categorys = Categorys::where([['custumers_id', '=', $id]])->orderBy('created_at', 'desc')->paginate(10);
            if ($categorys == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($categorys, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    public function categoryShop($id = null)
    {
        try {
            $categorys = Categorys::where([['custumers_id', '=', $id], ['status', '=', 'ACTIVE']])->orderBy('created_at', 'desc')->paginate(10);
            if ($categorys == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($categorys, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    private function storeCategory(Request $request, $id = null)
    {
        try {
            $category = new Categorys();
            if ($id == null) {
                $validator = Validator::make($request->all(), ['description' => 'required', 'picture' => 'required', 'custumers_id' => 'required']);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors(),
                    ], 400);
                }
            }
            if ($id != null) {
                $category = Categorys::find($id);
                if ($category == null) {
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
                        'message' => $validator->errors()->first(),
                    ], 400);
                }
                $imageName = time() . '-category.' . $request->file->getClientOriginalExtension();
                $request->file->move(public_path('product'), $imageName);
                $fileUpdate = URL::to('product/' . $imageName);
            }
            if ($category == null) {
                $category = new Categorys();
            }
            $category->fill($request->all());
            if ($fileUpdate) {
                $category->picture = $fileUpdate;
            }
            $category->save();
            return response()->json([
                'message' => 'Sucess!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
/**
 * Product
 */
    public function createProduct(Request $request)
    {
        return $this->storeProduct($request, null);
    }
    public function updateProduct(Request $request, $id = null)
    {
        return $this->storeProduct($request, $id);
    }
    public function productCategory($id = null)
    {
        try {
            $products = Product::where(
                [
                    ['categorys_id', '=', $id],
                    ['status', '=', 'ACTIVE'],
                ])
                ->orderBy('description', 'asc')
                ->with("getSubProducts")
                ->paginate(10);
            if ($products == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    public function productAll($id = null)
    {
        try {
            $products = Product::where([['categorys_id', '=', $id]])
                ->orderBy('description', 'asc')
                ->with("getSubProducts")
                ->with("getCategory")
                ->paginate(10);
            if ($products == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    public function productShop(Request $request)
    {
        try {
            $products = Product::where(
                [
                    ['custumers_id', '=', $request->input('id')],
                    ['status', '=', 'ACTIVE'],
                    ['description', 'like', '%' . $request->input('value') . "%"],
                ])
                ->orderBy('created_at', 'desc')
                ->with("getSubProducts")
                ->with("getCategory")
                ->paginate(10);
            if ($products == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    public function productAdimin($status = null, $value = null)
    {
        try {
            $products = Product::where(
                [
                    ['status', '=', $status],
                    ['description', 'like', '%' . $value . "%"],
                ])
                ->orderBy('created_at', 'desc')
                ->with("getSubProducts")
                ->with("getCategory")
                ->paginate(10);
            if ($products == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    private function storeProduct(Request $request, $id = null)
    {
        try {
            $product = new Product();
            if ($id == null) {
                $validator = Validator::make($request->all(), ['description' => 'required', 'categorys_id' => 'required', 'custumers_id' => 'required']);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors()->first(),
                    ], 400);
                }
            }
            if ($id != null) {
                $product = Product::find($id);
                if ($product == null) {
                    return response()->json([
                        'message' => 'field id is incorrect!',
                    ], 400);
                }
            }
            if ($product == null) {
                $product = new Product();
            }
            $product->fill($request->all());
            $product->save();
            return response()->json([
                'message' => 'Sucess!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
/**
 * Sub Product
 */
    public function createSubProduct(Request $request)
    {
        return $this->storeSubProduct($request, null);
    }
    public function updateSubProduct(Request $request, $id = null)
    {
        return $this->storeSubProduct($request, $id);
    }
    public function producSubtAll($id = null)
    {
        try {
            $products = SubProduct::where(
                [
                    ['products_id', '=', $id],
                ])
                ->orderBy('price', 'asc')
                ->with("getPriceDymanic")
                ->paginate(10);
            if ($products == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    public function producSubCategorytAll($id = null)
    {
        try {
            $products = SubProduct::where(
                [
                    ['sub_categorys_id', '=', $id],
                    ['status', '=', 'ACTIVE'],
                ])
                ->orderBy('price', 'asc')
                ->with("getPriceDymanic")
                ->paginate(10);
            if ($products == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    private function storeSubProduct(Request $request, $id = null)
    {
        try {
            $product = new SubProduct();
            if ($id == null) {
                $validator = Validator::make($request->all(), ['description' => 'required', 'products_id' => 'required', 'price' => 'required']);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors()->first(),
                    ], 400);
                }
            }
            if ($id != null) {
                $product = SubProduct::find($id);
                if ($product == null) {
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
                $imageName = time() . '-subproduct.' . $request->file->getClientOriginalExtension();
                $request->file->move(public_path('product'), $imageName);
                $fileUpdate = URL::to('product/' . $imageName);
            }
            if ($product == null) {
                $product = new SubProduct();
            }
            if ($fileUpdate) {
                $product->picture = $fileUpdate;
            }
            $product->fill($request->all());
            $product->save();
            return response()->json([
                'message' => 'Sucess!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
/**
 * Price dymanic
 */
    public function createPriceDymanic(Request $request)
    {
        return $this->storePriceDymanic($request, null);
    }
    public function updatePriceDymanic(Request $request, $id = null)
    {
        return $this->storePriceDymanic($request, $id);
    }
    private function storePriceDymanic(Request $request, $id = null)
    {
        try {
            $price = new PriceDymanic();
            if ($id == null) {
                $validator = Validator::make($request->all(), ['description' => 'required', 'price' => 'required', 'sub_products_id' => 'required']);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors()->first(),
                    ], 400);
                }
            }

            if ($id != null) {
                $price = PriceDymanic::find($id);
                if ($price == null) {
                    return response()->json([
                        'message' => 'field id is incorrect!',
                    ], 400);
                }
            }
            if ($price == null) {
                $price = new PriceDymanic();
            }
            $price->fill($request->all());
            $price->save();
            return response()->json([
                'message' => 'Sucess!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
/**
 * SubCategory
 */
    public function createSubCategory(Request $request)
    {
        return $this->storeSubCategory($request, null);
    }
    public function updateSubCategory(Request $request, $id = null)
    {
        return $this->storeSubCategory($request, $id);
    }
    private function storeSubCategory(Request $request, $id = null)
    {
        try {
            $subcategory = new SubCategory();
            if ($id == null) {
                $validator = Validator::make($request->all(), ['description' => 'required', 'picture' => 'required', 'custumers_id' => 'required']);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors(),
                    ], 400);
                }
            }
            if ($id != null) {
                $subcategory = SubCategory::find($id);
                if ($subcategory == null) {
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
                        'message' => $validator->errors()->first(),
                    ], 400);
                }
                $imageName = time() . '-subcategory.' . $request->file->getClientOriginalExtension();
                $request->file->move(public_path('product'), $imageName);
                $fileUpdate = URL::to('product/' . $imageName);
            }
            if ($subcategory == null) {
                $subcategory = new SubCategory();
            }
            $subcategory->fill($request->all());
            if ($fileUpdate) {
                $subcategory->picture = $fileUpdate;
            }
            $subcategory->save();
            return response()->json([
                'message' => 'Sucess!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    public function subCategoryAll($id = null)
    {
        try {
            $categorys = SubCategory::where([['custumers_id', '=', $id]])->orderBy('created_at', 'desc')->paginate(10);
            if ($categorys == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($categorys, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }
    public function subCategoryShop($id = null)
    {
        try {
            $categorys = SubCategory::where([['custumers_id', '=', $id], ['status', '=', 'ACTIVE']])->orderBy('created_at', 'desc')->paginate(10);
            if ($categorys == null) {
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($categorys, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Errors' . $e->getMessage(),
            ], 500);
        }
    }

}

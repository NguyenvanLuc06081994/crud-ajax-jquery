<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('product.list', compact('products'));
    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->desc = $request->desc;
        $product->image = $request->image;
        $product->save();
        return response()->json([
            'data' => $product,
            'message' => 'Tạo san pham thành công'
        ], 200); // 200 là mã lỗi
    }


    public function show($id)
    {
        $product = Product::find($id);
        return response()->json([
            'data' => $product,
            'message' => 'xem thong tin thanh cong'
        ], 200);
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json([
            'data' => $product,
            'message' => 'chuyen thong tin san pham thanh cong'
        ], 200);

    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->desc = $request->desc;
        $product->image = $request->image;
        $product->save();
//        $product = Product::find($id)->update($request->all());
        return response()->json(
            ['data' => $product,
                'product' => $request->all(),
                'productId' => $id,
                'message' => 'Cập nhật thông tin san pham thành công']
            , 200);
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'message' => 'xoa san pham thanh cong'
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $products = DB::table('products')->select('*')->where('name', 'LIKE', '%' . $keyword . '%')->get();
        return response()->json(
            ['data' => $products,
                'message' => 'tim kiem san pham thành công']
            , 200);
    }
}

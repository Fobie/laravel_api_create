<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products,200);
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required',
            'rate' => 'required',
            'count' => 'required',
        ]);

        if($validator->fails()){

            $error = [
                'status' => 422,
                'message' => $validator->messages()
            ];

            return response()->json($error, 422);
        } else {
            $product = new Product();
            $product -> title = $request->title;
            $product -> price = $request->price;
            $product -> description = $request->description;
            $product -> category = $request->category;
            $product -> image = $request->image;
            $product -> rate = $request->rate;
            $product -> count = $request->count;

            $product->save();
            
            $success = [
                'status' => 200,
                'message' => "Uploaded successfully"
            ];

            return response()->json($success,200);

        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required',
            'rate' => 'required',
            'count' => 'required',
        ]);

        if($validator->fails()){

            $error = [
                'status' => 422,
                'message' => $validator->messages()
            ];

            return response()->json($error, 422);
        } else {
            $product = Product::find($id);

            $product -> title = $request->title;
            $product -> price = $request->price;
            $product -> description = $request->description;
            $product -> category = $request->category;
            $product -> image = $request->image;
            $product -> rate = $request->rate;
            $product -> count = $request->count;

            $product->save();
            
            $success = [
                'status' => 200,
                'message' => "Updated successfully"
            ];

            return response()->json($success,200);

        }
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        $success = [
            'status' => 200,
            'message' => "Deleted successfully"
        ];

        return response()->json($success,200);

    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
}

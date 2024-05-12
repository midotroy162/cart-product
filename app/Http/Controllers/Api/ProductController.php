<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductCollection as ProductCollection;
use App\Http\Resources\ProductResource as ProductResource;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=new ProductCollection(Product::all());
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price'=>'required',
        ]);

        $product=new Product([
            "name"=> $request->name,
            "slug"=>Str::slug($request->name),
            "price"=> $request->price,
            "description"=> $request->description,
            "rating"=> $request->rating
        ]);
        if($product->save()){
            return response()->json($product,201 );
        }
        return response()->json(['there is a problem'],404 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::findOrFail($id);
        if (!$product) {
            return response()->json(['cant find that product'],404);
        }
        $product=new ProductResource($product);
        return response()->json($product,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::findOrFail($id);
        if (!$product) {
            return response()->json(['cant find that product'],404);
        }
        $product->update($request->all());
        return response()->json($product,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        if (!$product) {
            return response()->json(['cant find that product'],404);
        }
        return Product::destroy($id);
    }
}

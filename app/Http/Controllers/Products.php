<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Clients;
use App\Models\Product;


class Products extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.products',compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('admin.addproducts') ;    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
    $request->validate([
        'photo' => 'required|image|mimes:png,jpg,|max:2048', 
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
    ]);
    // Process the image
    $image=request("photo");
    $path =$image->store('images', 'public');
        
    $product=Product::create(["name"=>request('name'),"description"=>request('description'),"price"=>request('price'),"photo"=>"storage/".$path ]);

   return redirect()->route("products");

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        return view("addproducts");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // $imageurl=$Product->photo;
        // unlink("storage/".$imageurl);
        // $Product->delete();
        // return redirect("/addproducts");
    }
}

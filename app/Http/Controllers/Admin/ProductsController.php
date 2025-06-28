<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\categories;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class ProductsController extends Controller
{
    

    
    public function viewProducts()
    {
        $products = products::latest()->get();
        $categories = categories::all();
        return view('admin.products.view_products',compact('products','categories'));
 
    }
 
    public function storeProduct(Request $request)
    {
       
        DB::transaction(function() use($request){

            $product = new products();
            $product->category_id = $request->category_id;
            $product->product_name =  $request->product_name;
            $product->selling_price =  $request->selling_price;
            $product->short_descp_en =  $request->short_descp_en;

            $manager = new ImageManager(new Driver());
            $image = $request->file('product_thambnail'); 
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $new_img = $manager->read($request->file('product_thambnail'));
            $new_img = $new_img->resize(1280,1280);
            $new_img->toJpeg(80)->save(base_path('public/upload/product_images/'.$name_gen));
            $save_url = $name_gen;
            $product['product_thambnail'] = $save_url;

    $product->save();


        });
  
        
        return back()->with('info',' New Product Information Added Successfully!');

    }





    public function editProduct($id)
    {

        $product = products::findOrFail($id);
        $categories = categories::all();
        return view('admin.products.edit_product',compact('product','categories'));


    }


    public function updateProduct(Request $request,$id)
    {

        $updateData = products::find($id);
        $updateData->category_id = $request->category_id;
        $updateData->product_name = $request->product_name;
        $updateData->selling_price = $request->selling_price;
        $updateData->short_descp_en = $request->short_descp_en;

  if ($request->file('product_thambnail')) {

    $manager = new ImageManager(new Driver());
    @unlink(public_path('upload/product_images/'.$updateData->product_thambnail));
    $image = $request->file('product_thambnail');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    $new_img = $manager->read($request->file('product_thambnail'));
    $new_img = $new_img->resize(1280,1280);
    $new_img->toJpeg(80)->save(base_path('public/upload/product_images/'.$name_gen));
    $save_url = $name_gen;
    $updateData['product_thambnail'] = $save_url;


  }    
  
        $updateData->save();


        return back()->with('success','Product Information Update Successfully!');



    }

    /*

    public function deleteProduct($id)
    {
        $product = Products::findOrFail($id);
        unlink($product->product_thambnail);
        Products::findOrfail($id)->delete();



        $notification = array(
            'message' => 'Product Info DELETED Successfully...',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }
*/






// Categories Section //



public function viewCategories()
{
    $categories = categories::latest()->get();
    return view('admin.products.categories.view_categories',compact('categories'));

}

public function storeCategory(Request $request)
{
   
    DB::transaction(function() use($request){

        $category = new categories();
        $category->category_name =  $request->category_name;
        $category->category_icon = $request->category_icon;
        $category->save();


    });

    
    return back()->with('info',' New Category Information Added Successfully!');

}





public function editCategory($id)
{


    
    $category = categories::findOrFail($id);

    return response()->json(array(
        'category' => $category,
    ));
 
}


public function updateCategory(Request $request)
{

    $id = $request->input('id');
    $updateData = categories::find($id);
    $updateData->category_name = $request->category_name;
    $updateData->category_icon = $request->category_icon;
    $updateData->save();


    return back()->with('success','Category Information Update Successfully!');



}





}

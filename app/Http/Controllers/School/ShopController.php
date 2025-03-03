<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\categories; 
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    


    
    public function ViewEcommerceDash(){

        return view('school.ecommerce.body.index');
    }
  



    
    ///School Product List
    
    public function viewProductList()
    {

            $products = products::latest()->paginate(12);
            $categories = categories::all();

            return view('school.ecommerce.products.view_products',compact('products','categories'));

    }



    
    public function productDetails($id,$product_name)
    {

        $product = products::findOrFail($id);
        return view('school.ecommerce.products.details_product',compact('product'));

    }




}

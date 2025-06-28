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

        $products = products::orderBy('id','ASC')->paginate(12);
        $cate_products = products::orderBy('id','ASC')->get();
        $categories = categories::all();

        return view('school.ecommerce.body.index',compact('products','categories','cate_products'));
    }
  



    
    ///School Product List
    

    
    public function productDetails($id,$product_name)
    { 

        $product = products::findOrFail($id);
        return view('school.ecommerce.products.details_product',compact('product'));

    }




    
    // Product Seach 
	public function ProductSearch(Request $request){

        $request->validate(["search" => "required"]);

		$item = $request->search; 
        $categories = categories::orderBy('category_name','ASC')->get();
		$products = products::where('product_name','LIKE',"%$item%")->get();
        
        

		return view('school.ecommerce.products.search',compact('products','categories'));

	}


///// Advance Search Options 

public function SearchProduct(Request $request){

    $request->validate(["search" => "required"]);

    $item = $request->search;		  
    
    $products = Products::where('product_name','LIKE',"%$item%")->select('product_name','product_thambnail','selling_price','id')->limit(6)->get();


    
    return view('school.ecommerce.products.search_product',compact('products'));



} // end method 




public function ShopPage(){

    $products = products::query();

   if(!empty($_GET['category'])) {
    $slugs = explode(',',$_GET['category']);
    $catIds = Categories::select('id')->whereIn('category_name',$slugs)->pluck('id')->toArray();
    $products = $products->whereIn('category_id',$catIds)->paginate(12);

  }

  

    else{
               
      $products = products::orderBy('id','ASC')->paginate(12);
    }


    $categoriezz = Categories::orderBy('category_name','ASC')->get();
    
    return view('school.ecommerce.shop.shop_page',compact('products','categoriezz'));

} // end Method 




public function ShopFilter(Request $request){ 
    // dd($request->all());
 
    $data = $request->all();
 
    // Filter Category
        $catUrl = "";
        if (!empty($data['category'])) {
           foreach ($data['category'] as $category) {
              if (empty($catUrl)) {
                 $catUrl .= '&category='.$category;
              }else{
                $catUrl .= ','.$category;
              }
           } // end foreach condition
        } // end if condition 

 
        return redirect()->route('shopping.filter.page',$catUrl);
 
 
 
 
        //Filter Price


        $min_price = $request->min_price;
        $max_price = $request->max_price; 

        
    	$products = products::whereBetween('selling_price',[$min_price,$max_price])->paginate(12);
		


         return redirect()->route('shopping.filter.page',$products);
 

        /*
 
        $products = products::query();
 
         #Get minimum and maximum price to set in price filter range
         $min_price = products::min('selling_price');
         $max_price = products::max('selling_price');
         //dd('Minimum Price value in DB->'.$min_price,'Maximum Price value in DB->'.$max_price);
  
         #Get filter request parameters and set selected value in filter
         $filter_min_price = $request->min_price;
         $filter_max_price = $request->max_price;
          
         #Get products according to filter
         if($filter_min_price && $filter_max_price){
             if($filter_min_price > 0 && $filter_max_price > 0)
             {
 
             $products = $products->whereBetween('selling_price',[$filter_min_price,$filter_max_price])->paginate(3);
 
 
           }
         }  
         #Show default product list in Blade file
         else{
 
               $products = Products::orderBy('id','DESC')->paginate(3);
 
         }
 
 
       //  return view('shop.page',compact('products','min_price','max_price','filter_min_price','filter_max_price'));
 
         return redirect()->route('shopping.filter.page',$products,$min_price,$max_price,$filter_min_price,$filter_max_price);
 
*/ 
 
 } // end Method 
 
 




}

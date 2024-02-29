<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
// use App\Http\Controllers\StoreController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Http\Request;
use PDF;

class StoreController extends Controller
{
    public function index()
    {
        $products =Product::paginate(6);
        $categories =Category::All();
        $category = null;
        
      //  return view('index', compact('products'));
return view('index',['products' => $products , 'categories'=>$categories ,'category'=>$category]);
    }


    public function espaceclient(){



        return view('espaceclient');
    
    }

    // public function getProdByCat(Request $rq){


    //     // $cat=$rq->route('cat');
        
    //     //     $products= Product::where('category_id', '=', $cat)->get();
        
    //     //     return view('index', [
    //     //        'products' => $products,
    //     //        'category' => $cat
    //     //        ]);
        
    //     // }



    public function espaceadmin(){


        $products=Produit::All();
        return view('espaceadmin',compact('products'));
    
    }

    public function getProdByCat(Request $rq) {
    //     $catName = $rq->route('cat');
    
    //     // Assuming you have a 'name' column in the 'categories' table
    //     $category = Category::where('name', $catName)->first();
    
    //     if (!$category) {
    //         // Handle the case where the category doesn't exist
    //         return redirect()->route('/');
    //     }
    
    //     // Use the relationship to get products associated with the category
    //     $products = $category->products;
    
    //     return view('index', [
    //         'products' => $products,
    //         'category' => $catName,
    //     ]);
//////////////////////////////////////////////////
    // $catName = $rq->route('cat');

    // // Assuming you want to display all products if no category is selected
    // $category = $catName ? Category::where('name', $catName)->first() : null;

    // // Fetch products based on the selected category (or all products if no category is selected)
    // $products = $category ? $category->products : Product::all();

    // return view('index', [
    //     'products' => $products,
    //     'category' => $category ? $catName : null, // Pass category name if it exists, otherwise null
    // ]);
     /////////////////////////////
     $catName = $rq->route('cat');

     // Assuming you want to display all products if no category is selected
     $category = $catName ? Category::where('name', $catName)->first() : null;

     // Fetch products based on the selected category (or all products if no category is selected)
     $products = $category ? $category->products()->paginate(3) : Product::paginate(3);

     return view('index', [
         'products' => $products,
         'categories' => Category::all(),
         'category' => $category ? $catName : null,
     ]);
     }




    //  public function cataloguepdf(){

    //     // Récupérer les produits avec un solde égal à 1
    //     $products = Product::where('solde', 1)->get();
        
        
      
        
    //     $data = [
        
    //         'products' => $products,
    //     ];
        
    //     // Générer le PDF
    //     $pdf =Pdf::loadView('catalogue',$data);
        
    //     // Télécharger le PDF
    //     return $pdf->stream();
        
        
        
        
    //     }
   
}


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Shop;
use Illuminate\Http\Request;
use File;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Product $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'product.';
        $this->routeName = 'product.';
        $this->message = 'The Data has been saved';
        $this->errormessage = 'check Your Data ';
        
       
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=Product::orderBy("created_at", "Desc")->get();
      
      
        return view($this->viewName.'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        $categories=Category::whereNotNull('parent_category_id')->get();
        $shops=Shop::all();
        return view($this->viewName.'add',compact('brands','categories','shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values = array_except($request->all(), ['_token','price_after_discount','status']);
      
           $values['price_after_discount'] =  $values['price']- $values['discount'];
           if($request->input('status') == 1){
            $values['status'] = 1;   
           }else{
            $values['status'] = 0;      
           }

     
        $this->object::create($values);
        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Product::where('id', '=', $id)->first();
        $brands=Brand::all();
        $categories=Category::whereNotNull('parent_category_id')->get();
        $shops=Shop::all();
        //slide image
        $slideImages=Product_image::where('product_id','=',$id)->get();

        return view($this->viewName . 'edit', compact('row','brands','categories','shops','slideImages'));
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
        //
    }

     /**
     * uplaud image
     */
    public function UplaodImage($file_request)
	{
		//  This is Image Info..
		$file = $file_request;
		$name = $file->getClientOriginalName();
		$ext  = $file->getClientOriginalExtension();
		$size = $file->getSize();
		$path = $file->getRealPath();
		$mime = $file->getMimeType();


		// Rename The Image ..
		$imageName = $name;
		$uploadPath = public_path('uploads/product');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }


    public function storeProductImage(Request $request){
        $values = array_except($request->all(), ['_token','image']);
      
        if($request->hasFile('image'))
        {
           $product_image=$request->file('image');
  
           $values['image'] = $this->UplaodImage($product_image);

        }
       Product_image::create($values);
        return redirect()->back()->with('flash_success', $this->message);
    }


    public function updateProductImage(Request $request){

        $values = array_except($request->all(), ['_token','image','product_id','product_image_id']);
      
        if($request->hasFile('image'))
        {
           $product_image=$request->file('image');
  
           $values['image'] = $this->UplaodImage($product_image);

        }
        Product_image::findOrFail($request->input('product_image_id'))->update($values);
        return redirect()->back()->with('flash_success', $this->message);
    }


    public function deleteProductImage(Request $request){
\Log::info("message");
       $row=Product_image::where('id','=',$request->input('product_image_id'))->first();

       $file = $row->image;
      
        $file_name = public_path('uploads/product/'.$file);
        try{
            $row->delete();
                File::delete($file_name);
          
            }
            catch(QueryException $q){
             
                return redirect()->back()->with('flash_danger','You cannot delete related with another...');  
    
            }
                return redirect()->back()->with('flash_success', 'Data Has Been Deleted Successfully !');

    }
}

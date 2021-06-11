<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use File;
use Illuminate\Database\QueryException;
class ShopController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Shop $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'shop.';
        $this->routeName = 'shop.';
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
        $rows=Shop::orderBy("created_at", "Desc")->get();
      
      
        return view($this->viewName.'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values = array_except($request->all(), ['_token','image']);
        if($request->hasFile('image'))
        {
           $shop_image=$request->file('image');
  
           $values['image'] = $this->UplaodImage($shop_image);

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
        $row = Shop::where('id', '=', $id)->first();
     
        return view($this->viewName . 'edit', compact('row'));
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
        $values = array_except($request->all(), ['_token','image']);
        if($request->hasFile('image'))
        {
           $shop_image=$request->file('image');
  
           $values['image'] = $this->UplaodImage($shop_image);

        }
        
        $this->object::findOrFail($id)->update($values);
        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Shop::where('id', '=', $id)->first();
        $file = $row->image;
      
        $file_name = public_path('uploads/shop/'.$file);
        try{
            $row->delete();
                File::delete($file_name);
             

            }
            catch(QueryException $q){
             
                return redirect()->back()->with('flash_danger','You cannot delete related with another...');  
    
            }
                return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
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
		$uploadPath = public_path('uploads/shop');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
}

<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Specification;


class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status',1)->get();


        /**Getting Data For Ajax Request */
        if(request()->ajax()){
           /**Getting Activities Plan Data */
           $coupan = Specification::with('product')->orderBy('id', 'DESC')->get();
           /**Getting Response Ready For Databales */
           $data = [];
           foreach($coupan as $key => $item){

               $data[] = [
                   'Row_Index_ID' => ++$key,
                   'id' => $item->id,
                   'product_name' => $item->product->prod_title,
                   'prod_id' => $item->product_id,
                   'body' => $item->body,
               ];
           }
           return response()->json(['data' => $data]);
       }


       return view('admin.specification.index',get_defined_vars());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Specification::create($request->all());
        return response()->json(['success'   => true, 'message'   => 'Specification Created Created Successfully!', 'response' => [] ]);
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
        $data = $request->all();
        // return $data;
        $faq = Specification::where('id', $id)->first();
        $faq->update($data);
        return response()->json(['success' => true, 'message' => 'Specification Updated Successfully!', 'response' => [] ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Specification::destroy($id);
        return response()->json(['success'  => true, 'message'  => 'Specification Deleted Successfully!', 'response' => [] ]);
    }
}

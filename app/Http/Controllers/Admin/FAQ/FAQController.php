<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\Product;
use Illuminate\Http\Request;

class FAQController extends Controller
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
            $coupan = FAQ::with('product')->orderBy('id', 'DESC')->get();
            /**Getting Response Ready For Databales */
            $data = [];
            foreach($coupan as $key => $item){

                $data[] = [
                    'Row_Index_ID' => ++$key,
                    'id' => $item->id,
                    'product_name' => $item->product->prod_title,
                    'prod_id' => $item->product->id,
                    'title' => $item->title,
                    'description' => $item->description,
                ];
            }
            return response()->json(['data' => $data]);
        }


        return view('admin.faq.index',get_defined_vars());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FAQ::create($request->all());
        return response()->json(['success'   => true, 'message'   => 'FAQ Created Created Successfully!', 'response' => [] ]);
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
        $faq = FAQ::where('id', $id)->first();
        $faq->update($data);
        return response()->json(['success' => true, 'message' => 'FAQ Updated Successfully!', 'response' => [] ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FAQ::destroy($id);
        return response()->json(['success'   => true, 'message'   => 'FAQ Deleted Successfully!', 'response' => [] ]);
    }
}

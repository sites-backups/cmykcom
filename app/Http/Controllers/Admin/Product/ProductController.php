<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductMeta;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  return Product::all();

        if (request()->ajax()) {
            /**Getting Activities Plan Data */
            $product = Product::orderBy('id', 'DESC')->get();
            /**Getting Response Ready For Databales */
            $data = [];
            foreach ($product as $key => $item) {
                $data[] = [
                    'Row_Index_ID' => ++$key,
                    'id' => $item->id,
                    'prod_title' => $item->prod_title,
                    'status_html' => $item->status == '0' ? '<button class="badge badge-danger product-publish-status border-none" data-id="' . $item->id . '" >Deactive</button>' : '<button class="badge badge-success product-publish-status border-none" data-id="' . $item->id . '">Active</button>',
                    'status' => $item->status,
                    'is_nav' => $item->is_nav == '0' ? '<button class="badge badge-danger product-status  border-none" data-id="' . $item->id . '" >No</button>' : '<button class="badge badge-success product-status border-none" data-id="' . $item->id . '">Yes</button>',
                    'nav' => $item->is_nav,
                ];
            }
            return response()->json(['data' => $data]);
        }
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $data = $request->all();
        $product = Product::create($data);
        //  storing categories against Product
        $product->categories()->attach(explode(',', $data['category_id']));
        /**  Storing Images against Product ID **/
        if ($request->TotalImages > 0) {
            for ($x = 0; $x < $request->TotalImages; $x++) {
                if ($request->hasFile('images' . $x)) {

                    $file = $request->file('images' . $x);
                    $fileName = $file->getClientOriginalName();
                    $destinationPath = public_path() . '/product';
                    $file->move($destinationPath, $fileName);

                    $insert[$x]['thumbnail'] = 'public/product/' . $fileName;
                    $insert[$x]['product_id'] = $product->id;
                }
            }

            //    return $insert;

            ProductImage::insert($insert);
        }
        /** Storing Product Meta against product id **/
        $meta = new ProductMeta();
        $meta->product_id = $product->id;
        $meta->meta_title = $data['meta_title'];
        $meta->meta_description = $data['meta_description'];
        $meta->save();
        
        return response()->json(['success' => true, 'message' => 'Product Has been Created Successfully!', 'response' => []]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();

        $data = Product::with('images', 'meta')->where('id', $id)->first();
        // return $product;
        // return $data;
        return view('admin.products.edit', get_defined_vars());
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
        $data1 = $request->all();

        // return $data;
        $product = Product::where('id', $id)->first();
        $product->update($data1);

        // if ($request->hasFile('thumbnail')) {
        //     if ($request->TotalImages > 0) {
        //         for ($x = 0; $x < $request->TotalImages; $x++) {
        //             if ($request->hasFile('thumbnail' . $x)) {

        //                 $file = $request->file('thumbnail' . $x);
        //                 $fileName = $file->getClientOriginalName();
        //                 $destinationPath = public_path() . '/product';
        //                 $file->move($destinationPath, $fileName);

        //                 $insert[$x]['thumbnail'] = 'public/product/' . $fileName;
        //                 $insert[$x]['product_id'] = $product->id;
        //             }
        //         }

        //         //    return $insert;

        //         ProductImage::update($insert);
        //     }

        // } else {
        //     unset($data['thumbnail']);
        // }


        if($request->hasFile('thumbnail'))
         {

            foreach ($request->file('thumbnail') as $file) {

                // $name=$file->getClientOriginalName();
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . '/product';
                $file->move($destinationPath, $fileName);


            }

                // $ProjectPhoto = ProductImage::where('product_id', $id)->get();
                $ProjectPhoto = ProductImage::where('product_id', $id)->update([
                    'product_id' => $product->id,
                    'thumbnail' => 'public/product/' . $fileName,
                ]);
                // $ProjectPhoto->product_id = $product->id;
                // $ProjectPhoto->thumbnail   ='public/product/' . $fileName;
                // $ProjectPhoto->save();

         }
         else {
                unset($data['thumbnail']);
            }


        $meta = ProductMeta::where('product_id', $id)->first();
        $meta->meta_title = $data1['meta_title'];
        $meta->meta_description = $data1['meta_description'];
        $meta->update();



        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['success' => true, 'message' => 'Product Deleted Successfully!', 'response' => []]);
    }

    public function displayNav(Request $request)
    {

        $bookPublish = Product::where("id", $request->id)->first();
        if ($bookPublish->is_nav == 0) {
            $bookPublish->is_nav = 1;
        } else {
            $bookPublish->is_nav = 0;
        }
        // return $bookPublish;
        $bookPublish->update();
        return response()->json(['success' => true, 'message' => 'Product Publish Status Changed Successfully!', 'response' => []]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function statusPublish(Request $request)
    {

        $bookStatus = Product::where("id", $request->id)->first();
        if ($bookStatus->status == 0) {
            $bookStatus->status = 1;
        } else {
            $bookStatus->status = 0;
        }
        // return $bookStatus;
        $bookStatus->update();
        return response()->json(['success' => true, 'message' => 'Product Status Changed Successfully!', 'response' => []]);

    }
}

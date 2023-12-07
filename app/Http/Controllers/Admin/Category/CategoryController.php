<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**Getting Data For Ajax Request */
        if (request()->ajax()) {
            /**Getting Activities Plan Data */
            $categories = Category::orderBy('id', 'DESC')->get();
            /**Getting Response Ready For Databales */
            $data = [];
            foreach ($categories as $key => $item) {

                $data[] = [
                    'Row_Index_ID' => ++$key,
                    'id' => $item->id,
                    'name' => $item->name,
                    'slug' => $item->slug,
                    'meta_tags' => $item->meta_tags,
                    'meta_description' => $item->meta_description,
                    'status_html' => $item->status == '0' ? '<button class="badge badge-danger category-status border-none" data-id="' . $item->id . '" >Deactive</button>' : '<button class="badge badge-success category-status border-none" data-id="' . $item->id . '">Active</button>',
                    'status' => $item->status,
                    'is_nav' => $item->is_nav == '0' ? '<button class="badge badge-danger category-nav-status border-none" data-id="' . $item->id . '" >No</button>' : '<button class="badge badge-success category-nav-status border-none" data-id="' . $item->id . '">Yes</button>',
                    'nav' => $item->is_nav,

                ];
            }
            return response()->json(['data' => $data]);
        }

        // return $categories;
        return view('admin.categories.index', get_defined_vars());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // return $request->all();
        $data = $request->all();
        $file = $request->file('thumbnail');
        $fileName = $file->getClientOriginalName();
        $destinationPath = public_path() . '/category';
        $file->move($destinationPath, $fileName);
        $data['image'] = 'public/category/' . $fileName;

        Category::create($data);

        return response()->json(['success'   => true, 'message'   => 'Category Created Successfully!', 'response' => []]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.categories.edit', get_defined_vars());
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
        // return $request->all();
        $category = Category::where('id', $id)->first();
        $category->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/category';
            $file->move($destinationPath, $fileName);
            $category['image'] = 'public/category' . $fileName;
        } else {
            unset($category['image']);
        }
        return redirect('/admin/categories');
        // return response()->json(['success'   => true, 'message'   => 'Category Updated Successfully!', 'response' => []]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(['success'   => true, 'message'   => 'Category Deleted Successfully!', 'response' => []]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function statusUpdate(Request $request)
     {

         $categoryStatus = Category::where("id",$request->id)->first();
         if($categoryStatus->status == 0){
             $categoryStatus->status = 1;
         }
         else{
             $categoryStatus->status = 0;
         }
         // return $categoryStatus;
         $categoryStatus->update();
         return response()->json(['success'   => true, 'message'   => 'Category Status Changed Successfully!', 'response' => [] ]);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function NavBarDisplay(Request $request)
     {

         $category_is_nav = Category::where("id",$request->id)->first();
         if($category_is_nav->is_nav == 0){
             $category_is_nav->is_nav = 1;
         }
         else{
             $category_is_nav->is_nav = 0;
         }
         // return $categoryStatus;
         $category_is_nav->update();
         return response()->json(['success'   => true, 'message'   => 'Category Status Changed Successfully!', 'response' => [] ]);

    }
}

<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         /**Getting Data For Ajax Request */
         if(request()->ajax()){
            /**Getting Activities Plan Data */
            $coupan = Blog::orderBy('id', 'DESC')->get();
            /**Getting Response Ready For Databales */
            $data = [];
            foreach($coupan as $key => $item){

                $data[] = [
                    'Row_Index_ID' => ++$key,
                    'id' => $item->id,
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'thumbnail' => $item->thumbnail,
                    'meta_title' => $item->meta_title,
                    'meta_description' => $item->meta_description,
                    'body' => $item->body,
                ];
            }
            return response()->json(['data' => $data]);
        }
        return view('admin.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $file = $request->file('thumbnail') ;
        $fileName = $file->getClientOriginalName() ;
        $destinationPath = public_path().'/blogImg' ;
        $file->move($destinationPath,$fileName);
        $data['thumbnail'] = 'public/blogImg/'.$fileName;

        Blog::create($data);

        return response()->json(['success'  => true, 'message'   => 'Blog Created Successfully!', 'response' => [] ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $data = Blog::where('id',$id)->first();
        return view('admin.blogs.edit',get_defined_vars());
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
        $book = Blog::where('id', $id)->first();
        $data = $request->all();
        if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail') ;
                    $fileName = $file->getClientOriginalName() ;
                    $destinationPath = public_path().'/blogImg' ;
                    $file->move($destinationPath,$fileName);
        $data['thumbnail'] = 'public/blogImg'.$fileName;

        }else{
            unset($data['thumbnail']);
        }
        $book->update($data);
        return response()->json(['success'  => true, 'message'   => 'Blog Created Successfully!', 'response' => [] ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return response()->json(['success'   => true, 'message'   => 'Category Deleted Successfully!', 'response' => []]);
    }
}

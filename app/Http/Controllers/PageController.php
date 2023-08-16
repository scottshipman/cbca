<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Dotlogics\Grapesjs\App\Traits\EditorTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    use EditorTrait;



    public function editor($id, Request $request)
    {
        $page = Page::find($id);
        if(!$page) {
            abort(404);
        }

        return $this->show_gjs_editor($request, $page);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Page::select('pages.id', 'pages.title', 'pages.slug', 'pages.page_type', DB::raw("IF(pages.published=1 ,'Published', 'Draft') as published"), 'users.name as created_by', 'pages.created_at')
                ->join('users', 'users.id', '=', 'pages.created_by')
                ->orderBy('id', 'DESC')
                ->get();

            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/content/'.$row->slug.'" 
                    class="edit btn btn-primary btn-sm">View</a> <a href="/page/edit/'.$row->id.'" 
                    class="edit btn btn-success btn-sm">Edit</a> <a 
href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('page.index');
    }

    public function view($slug)
    {
        $page = Page::where('slug', '=', $slug)->where('published', '=', 1)->first();
        if(!$page) {
            abort(404);
        }

        return view('page.view', compact('page'));
    }


    public function store(Request $request)
    {

    }

    public function edit($id, Request $request)
    {
        $page = Page::find($id);
        if(!$page)
        {
            abort(404);
        }

        if (request()->isMethod('PUT'))
        {
            $request->validate([
                'title' => 'required',
                'published' => 'required',
                'page_type' => 'required',
//                'slug' => 'required|unique:App\Models\Page,slug',
            ]);

            if ($request->hasFile('image')) {
//                dd($request->image);
                $request->validate([
                    'image' => 'mimes:jpeg,png' // Only allow .jpg, .bmp and .png file types.
                ]);
                // Save the file locally in the storage/public/ folder under a new folder named /product
                $request->image->store('pages', 'public');
                $page->image_path = $request->image->hashName();
            }

            $page->title = $request->title;
            $page->published = $request->published;
            $page->page_type = $request->page_type;
            $page->meta_keywords = $request->meta_keywords;
            $page->meta_description = $request->meta_description;
            $page->slug = $request->slug;

            $page->updated_at = \Illuminate\Support\Facades\Date::now();
            $page->modified_by = Auth::user()->id;

            $page->save();

            return redirect()->route('page.list')->with('success','Page Has Been updated successfully');
        }


        return view('page.edit', compact('page'));
    }

}
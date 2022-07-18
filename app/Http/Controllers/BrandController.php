<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = DB::table('brands')
            ->orderBy('country')
            ->get();
        return view('brands.index', ['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = DB::table('categories')
            ->get();
        
            return view('brands.add', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('brands')->insert([
            'name' => $request->name,
            'country' => $request->country,
            'category' => $request->category,
        ]);

        return redirect()->route('brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        /*
        $id = $request->id;
        
        $brands = DB::table('brands')
        ->where('id', $id)
        ->get();

        $brands = DB::table('brands')
        ->get();

        return view('brands.edit', ['brands' => $brands, 'categories' => $categories]);
        */
        $id=$request->id;

        $brands = DB::table('brands')
            ->where('id', $id)
            ->get();
        $categories = DB::table('categories')
            ->get();
        
            return view('brands.edit', ['brands' => $brands, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'category' => 'required|integer',
        ]);

        $update_query = DB::table('brands')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
               
            ]);

        return redirect()->route('brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
    public function delete(Request $request)
    {
        //
        $id=$request->id;

        Brand::destroy($id);

        return redirect()->route('brands');
    }
}

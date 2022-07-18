<?php

namespace App\Http\Controllers;

use App\Models\Cosmetic;
use Illuminate\Http\Request;
use DB;

class CosmeticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cosmetics = DB::table('cosmetics')
            ->get();
        return view('cosmetics.index', ['cosmetics'=> $cosmetics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = DB::table('brands')
            ->get();

        return view ('cosmetics.add', ['brands' => $brands]);
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
        DB::table('cosmetics')->insert([
            'name'=> $request->name,
            'year'=> $request->year,
            'code'=> $request->code,
            'brand'=> $request->brand,
            'price'=>$request->price,
        ]);

        return redirect()->route('cosmetics');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function show(Cosmetic $cosmetic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $id=$request->id;

        $cosmetics = DB::table('cosmetics')
            ->where('id', $id)
            ->get();
        $brands = DB::table('brands')
            ->get();
        
            return view('cosmetics.edit', ['cosmetics' => $cosmetics, 'brands' => $brands]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|date',
            'code' => 'required|integer',
            'brand' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $update_query = DB::table('cosmetics')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'year' => $request->year,
                'code' => $request->code,
                'brand' => $request->brand,
                'price' => $request->price,
            ]);

        return redirect()->route('cosmetics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cosmetic $cosmetic)
    {
        //
    }
    public function delete(Request $request)
    {
        //
        $id=$request->id;

        Cosmetic::destroy($id);

        return redirect()->route('cosmetics');
    }
}

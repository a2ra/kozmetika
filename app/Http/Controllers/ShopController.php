<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Cosmetic;
use Illuminate\Http\Request;
use DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $najcescekupovano = DB::table('cosmetics')
        ->select('cosmetics.*', DB::raw('count(*) as brojac'),'shops.*')
        ->groupBy('cosmetics.id')
        ->join('shops', 'cosmetics.id', '=', 'shops.cosmetics')
        ->orderByRaw('COUNT(*) DESC')
        ->get();

        // $from='2011-01-01 00:00:00';
        // $to='2022-01-01 00:00:00';
        // $sept2021kupovine=DB::table('shop')
        // ->select('shop.*',DB::raw('count(*) as brojac'))
        // ->groupBy('shop.code')
        // ->whereBetween('year',[$from,$to])
        // ->get();
        $kozmetika_u_21=DB::table('cosmetics')
        ->select('cosmetics.*', DB::raw('count(*) as brojac'))
        ->groupBy('cosmetics.id')
        ->join('shops','cosmetics.id','=','shops.cosmetics')
        ->whereBetween('cosmetics.year',['2021-01-01','2022-01-01'])
        ->get();
        $ispisLoreal=DB::table('cosmetics')
        ->select('cosmetics.*', DB::raw('count(*) as brojac'))
        ->groupBy('cosmetics.id')
        ->join('brands','brands.id','=','cosmetics.brand')
        ->where('brands.name','Loreal')
        ->get();
        $ispisKikoPrice=DB::table('cosmetics')
        ->select('cosmetics.*', DB::raw('count(*) as brojac'))
        ->groupBy('cosmetics.id')
        ->join('brands','brands.id','=','cosmetics.brand')
        ->where('brands.name','Kiko')
        ->whereBetween('cosmetics.price',['100','200'])

        ->get();

        $most_buy_customer=DB::table('customers')
        ->select('customers.*', DB::raw('count(*) as brojac'),'shops.*')
        ->groupBy('customers.id')
        ->join('shops','customers.id','=','shops.customer')
        ->orderByRaw('COUNT(*) DESC')

        ->get();

        $cheap_cosmetic=DB::table('cosmetics')
        ->select('cosmetics.*', DB::raw('count(*) as brojac'))
        ->groupBy('cosmetics.id')
        ->join('shops','cosmetics.id','=','shops.cosmetics')
        ->whereBetween('cosmetics.price',['70','220'])
        ->orderByRaw('COUNT(*) DESC')
        ->get();

        $najcesci_brend= DB::table('brands')
    ->select('brands.*', DB::raw('count(*) as brojac'))
    ->groupBy('brands.id')
    ->join('cosmetics','brands.id','=', 'cosmetics.brand')
    ->orderByRaw('COUNT(*) DESC')
    ->get();
    $brendoviKategorije= DB::table('brands')
    ->select('brands.*')
    ->groupBy('brands.id')
    ->join('categories','categories.id','=', 'brands.category')
    ->where('categories.name','Mascara')
    ->get();

    $koz_22=DB::table('cosmetics')
    ->select('cosmetics.*', DB::raw('count(*) as brojac'))
    ->groupBy('cosmetics.id')
    ->join('shops','cosmetics.id','=','shops.cosmetics')
    ->join('brands','brands.id','=','cosmetics.brand')
    ->where('brands.country','BA')
    ->whereBetween('cosmetics.year',['2020-01-01','2022-01-01'])
    ->get();
    $costumer2022=DB::table('customers')
    ->select('customers.*', DB::raw('count(*) as brojac'))
    ->groupBy('customers.id')
    ->join('shops','customers.id','=','shops.customer')
    ->join('cosmetics','cosmetics.id','=','shops.cosmetics')
    ->join('brands','brands.id','=','cosmetics.brand')

    ->where('brands.name','Revlon')
    ->whereBetween('cosmetics.year',['2022-01-01','2023-01-01'])
    ->get();
        return view('shops.index', [
            'najcescekupovano'=>$najcescekupovano,
            // '$sept2021kupovine'=>$sept2021kupovine,
            'most_buy_customer'=>$most_buy_customer,
            'najcesci_brend'=>$najcesci_brend,
            'kozmetika_u_21'=>$kozmetika_u_21,
            'cheap_cosmetic'=>$cheap_cosmetic,
            'ispisLoreal'=>$ispisLoreal,
            'ispisKikoPrice'=>$ispisKikoPrice,
            'brendoviKategorije'=>$brendoviKategorije,
            'koz_22'=>$koz_22,
            'costumer2022'=>$costumer2022
    ]);





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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}

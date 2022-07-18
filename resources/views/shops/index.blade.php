<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">{{__('Shop')}}
</h2>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
<div class="p-2">

 <div>
        <h1>Ispis najprodavanije kozmetike</h1>
        <hr>
        @foreach($najcescekupovano as $najcescekupovan)
        <p>{{$loop->iteration}} . {{$najcescekupovan->name}}  - {{$najcescekupovan->brojac}} proizvoda </p>
        @endforeach

</div>

<div>
        <h1>Kozmetika prodana u 2021.godini</h1>
        <hr>
        @foreach($kozmetika_u_21 as  $kozmetika_21)
        <p>{{$loop->iteration}} . {{$kozmetika_21->name}}  - {{$kozmetika_21->brojac}} </p>
        @endforeach

</div>

   <div>
        <h1>Kupci sa najviše kupovina</h1>
        <hr>
      @foreach($most_buy_customer as $most_buy_custome)
        <p>{{$loop->iteration}} . {{$most_buy_custome->name}} {{$most_buy_custome->lastname}} - {{$most_buy_custome->brojac}} </p>
        @endforeach
    </div>
    <div>
        <h1>Ispis proizvoda jeftinijih od 220KM</h1>
        <hr>
      @foreach($cheap_cosmetic as $cheap_cosmetics)
        <p>{{$loop->iteration}} . {{$cheap_cosmetics->name}}  - {{$cheap_cosmetics->price}}KM </p>
        @endforeach
</div>

    <div>
        <h1>Ispis brendova koji su maskare</h1>
        <hr>
      @foreach($brendoviKategorije as $brendoviKategorijee)
        <p>{{$loop->iteration}} . {{$brendoviKategorijee->name}}   </p>
        @endforeach
    </div>

    <div>
        <h1>Kiko kozmetika u rasponu cijene od 100KM do 200KM</h1>
        <hr>
      @foreach($ispisKikoPrice as $ispisKikoPricee)
        <p>{{$loop->iteration}} . {{$ispisKikoPricee->name}}  </p>
        @endforeach
    </div>
    <div>
        <h1>Naj prodavaniji brendovi</h1>
        <hr>
      @foreach($najcesci_brend as $najcesci_bren)
        <p>{{$loop->iteration}} . {{$najcesci_bren->name}}   - {{$najcesci_bren->brojac}} </p>
        @endforeach
    </div>
    <div>
        <h1>Ispis LOREAL kozmetike</h1>
        <hr>
      @foreach($ispisLoreal as $ispisLoreall)
        <p>{{$loop->iteration}} . {{$ispisLoreall->name}} </p>
        @endforeach
    </div>
    <div>
        <h1>Prodana BIH kozmetika u 2020. i 2021. godini </h1>
        <hr>
      @foreach($koz_22 as $koz_222)
        <p>{{$loop->iteration}} . {{$koz_222->name}} - {{$koz_222->brojac}}</p>
        @endforeach
    </div>
    <div>
        <h1>Ispis svih kupaca u kupaca u 2022 koji su kupili kozmetiku Revlon </h1>
        <hr>
      @foreach($costumer2022 as $costumer202)
        <p>{{$loop->iteration}} . {{$costumer202->name}} {{$costumer202->lastname}} - {{$costumer202->brojac}}</p>
        @endforeach
    </div>
</div>
</div>
</div>
</div>
</x-app-layout>



<x-app-layout>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-2">
            <form method="POST" action="{{route('store_cosmetic')}}">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{__('Naziv')}}"/>
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus/>
                </div>   

                <div>
                    <x-jet-label for="year" value="{{__('Godina')}}"/>
                    <x-jet-input id="year" class="block mt-1 w-full" type="date" name="year"  required autofocus/>
                </div>  
                <div>
                    <x-jet-label for="code" value="{{__('Kod')}}"/>
                    <x-jet-input id="code" class="block mt-1 w-full" type="number" name="code" required autofocus/>
                </div> 
                
                <div>
                    <x-jet-label for="brand" value="{{__('Brend')}}"/>
                    <select id="brand" name="brand" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300
                    focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option selected="true" disabled="disabled">Odaberi</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                        </select>
                </div> 
                <div>
                    <x-jet-label for="price" value="{{__('Cijena')}}"/>
                    <x-jet-input id="price" class="block mt-1 w-full" type="number" name="price" required autofocus/>
                </div> 

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4"> 
                        {{__('Spremi')}}
                </x-jet-button>
                </div>
             </form>
        </div>
    </div>
</div>
</div>
</x-app-layout>

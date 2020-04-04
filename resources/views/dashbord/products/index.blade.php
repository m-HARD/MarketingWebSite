@extends('layouts.dashbord')

@section('content')
    <div class="mx-20">
        <div class="mb-3 bg-gray-300 grid grid-cols-12 gap-4 flex rounded-md overflow-hidden">
            <div class="py-4 text-center">IMG</div>
            <div class="col-start-2 col-span-2 py-4 text-center">Name</div>
            <div class="col-start-4 col-span-4 py-4 text-center">Description</div>
            <div class="py-4 text-center">Price</div>
            <div class="py-4 text-center">In Stock</div>
            <div class="col-end-13 col-span-3 py-4">
                <span class="ml-24 flex justify-center">Id</span>
            </div>
        </div>
        @foreach($products as $product)
        <div class="mb-1 bg-gray-300 grid grid-cols-12 gap-4 flex rounded-md overflow-hidden">
            <div><img src="{{ asset('css/1.jpg') }}" alt="musab" class="h-auto"></div>
            <div class="col-start-2 col-span-2 py-4 font-bold">{{ $product->name }}</div>
            <div class="col-start-4 col-span-4 py-4 font-hairline text-sm">
                {{ \Illuminate\Support\Str::limit($product->description, 65, $end='...') }}
            </div>
            <div class="py-4 text-center">${{ $product->price }}</div>
            <div class="py-4 text-center">{{ $product->inStock }}</div>
            <div class="col-end-13 col-span-3 py-4">
                <a href="/dashbord/products/{{ $product->id }}" class="px-3 py-1 rounded-md bg-blue-600 hover:bg-blue-800">View | Edit</a>
                <a href="#" class="px-3 py-1 rounded-md bg-red-600 hover:bg-red-800">Del</a>
                <span class="ml-5">{{ $product->id }}</span>
            </div>
        </div>
        @endforeach  
    </div>
@endsection
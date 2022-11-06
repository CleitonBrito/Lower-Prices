@extends('layouts.app')

@section('content-main')

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $market['name'] }}</h1>
        </div>
    </header>
    <main>
        <div class="bg-white">
            <div class="mx-auto max-w-2xl py-0 px-4 sm:py-6 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3">
                    <h2 class="lg:w-1/2 text-2xl tracking-tight text-gray-500">All Products <sup>{{ "(". count($products). ")" }}</sup></h2>
                    <button type="submit" class="lg:w-1/2 group relative flex w-full justify-center rounded-md border border-transparent bg-greenIndigo-200 py-2 px-4 text-sm font-medium text-white hover:bg-greenIndigo-500 focus:outline-none focus:ring-2 focus:greenIndigo-500 focus:ring-offset-2">
                        <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-greenIndigo-100 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-greenIndigo-400"></span>
                        </span>
                        Create Product
                    </button>
                </div>
                <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach($products as $product)
                    <div class="group relative bg-gray-200 p-2 rounded">
                        <div class="h-20 w-20 rounded-md bg-gray-500 group-hover:opacity-75">
                        @php
                            $random = rand(1, 4);
                            $markets = array("Comercial Barbosa", "Lara Super", "Atakarejo", "Supermercado São Jorge");
                        @endphp
                        <img src="<?php echo "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-0". $random .".jpg" ?>" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center h-full w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-lg text-gray-700">
                            <a href="#">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                @php echo $product->name @endphp
                            </a>
                            <p class="mt-1 text-sm text-gray-500">{{ $product->description }}</p>
                            <p class="mt-1 text-md text-green">Price: R$ {{ number_format($product->price, 2, ",", ".") }}</p>
                            </h3>
                        </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            </div>
    </main>
@endsection
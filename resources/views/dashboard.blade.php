@extends('layouts.app')

@section('content-main')

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
            </div>
        </header>
        <main>
            <div class="bg-white">
                <div class="mx-auto max-w-2xl py-0 px-4 sm:py-6 sm:px-6 lg:max-w-7xl lg:px-8">
                    @php
                        $allMarkets = rand(1, 50);
                    @endphp
                    <h2 class="top-30 text-2xl tracking-tight text-gray-500">All Markets <sup>{{ "(". count($data). ")" }}</sup></h2>

                    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        @foreach($data as $market)
                        <div class="group relative">
                            <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                                @php
                                    $random = rand(1, 4);
                                @endphp
                                <img src="<?php echo "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-0". $random .".jpg" ?>" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-lg text-gray-700">
                                    <a href="{{ route('market', $market->id_market) }}">
                                        <span aria-hidden="true" class="absolute inset-0 text-green"></span>
                                        {{ $market->name }}
                                    </a>
                                    <p class="mt-1 text-sm text-gray-500">Centro - Filadélfia-BA</p>
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
@extends('layouts.app')

<style>
    .absolute-icon {
        position: absolute;
        top: 20px;
        left: unset;
        right: 0;
        width: 3em!important;
    }

    .img-product {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .icons {
        cursor: pointer;
        z-index: 10;
        transition: transform 0.2s;
    }

    .icons:hover {
        transform: scale(1.3);
    }

    .bg-gradientGray-100 {
        background: linear-gradient(0deg, #7472721f, #00000008, #0000001a);
    }

    .area-description {
        margin-top: 0;
    }

    @media screen and (max-width: 640px){
        .area-description {
            margin-top: 1.5rem;
        }
    }
</style>

@section('content-main')

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $market['name'] }}</h1>
        </div>
    </header>
    <main class="pb-10">
        <div class="bg-white">
            <div class="mx-auto max-w-2xl py-0 px-4 sm:py-6 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3">
                    <h2 class="lg:w-1/2 text-2xl tracking-tight text-gray-500">All Products <sup>{{ "(". count($products). ")" }}</sup></h2>
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#itemsNotInsertedCollapse" aria-expanded="false" aria-controls="itemsNotInsertedCollapse" class="lg:w-1/2 group relative flex w-full justify-center rounded-md border border-transparent bg-purple py-2 px-4 text-sm font-medium text-white hover:bg-purple-300 focus:outline-none focus:ring-2 focus:greenIndigo-500 focus:ring-offset-2">
                            <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-200 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-purple-300"></span>
                            </span>
                            Add Product
                        </button>
                </div>
                @if($productsNotInserted)
                    @component('../components/productsNotInserted', ['title' => 'Items Not Inserted', 'productsNotInserted' => $productsNotInserted])
                    @endcomponent
                @endif
                <div id="itemsNotInsertedCollapse" class="collapse mt-6 grid grid-cols-1 gap-y-5 gap-x-6 sm:grid-cols-1 lg:grid-cols-2 xl:gap-x-8">
                    @foreach($products as $product)
                    <div class="group relative bg-gradientGray-100 pt-3 px-3 rounded-md shadow-xl sm:flex sm:flex-column">
                        <div class="h-20 w-20 mr-5 rounded-md bg-white group-hover:opacity-75">
                            <img class="img-product rounded-md" src="{{ url('storage/'.$product->image->path) }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center h-full w-full">
                        </div>
                        <div class="w-full gap-x-2 flex justify-between">
                            <div class="area-description">
                                <h3 class="text-lg text-gray-700">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                    <p class="mt-1 text-sm text-gray-500">{{ $product->description }}</p>
                                    <p class="mt-1 text-md text-green">Price: R$ {{ number_format($product->price, 2, ",", ".") }}</p>
                                </h3>
                            </div>
                            <div class="d-flex gap-2 px-3 align-items-center">
                                <svg class="icons" stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><path d="M8 11C7.44772 11 7 11.4477 7 12C7 12.5523 7.44772 13 8 13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H8Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" fill="currentColor"></path></svg>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
    </main>
@endsection
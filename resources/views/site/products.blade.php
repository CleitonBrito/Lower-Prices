@extends('layouts.app')

<style>
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
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Products</h1>
        </div>
    </header>
    <main class="pb-10">
        <div class="bg-white">
            <div class="mx-auto max-w-2xl py-0 px-4 sm:py-6 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3">
                    <h2 class="lg:w-1/2 text-2xl tracking-tight text-gray-500">All Products <sup>{{ "(". count($products) .")" }}</sup></h2>
                    <a href="{{ route('product_form') }}" class="lg:w-1/2 group relative flex w-full justify-center rounded-md border border-transparent bg-greenIndigo-200 py-2 px-4 text-sm font-medium text-white hover:bg-greenIndigo-500 focus:outline-none focus:ring-2 focus:greenIndigo-500 focus:ring-offset-2">
                        <button type="submit">
                            <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-greenIndigo-100 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-greenIndigo-400"></span>
                            </span>
                            Create Product
                        </button>
                    </a>
                </div>
                <div class="mt-6 grid grid-cols-1 gap-y-5 gap-x-6 sm:grid-cols-1 lg:grid-cols-2 xl:gap-x-8">
                    @if(isset($products))
                        @foreach($products as $product)
                        <div class="group relative bg-gradientGray-100 py-3 px-3 rounded-md shadow-xl sm:flex sm:flex-column">
                            <div class="w-5/12 aspect-w-1 aspect-h-1 sm:w-20 mx-auto mx-sm-0 rounded-md bg-gray-200 group-hover:opacity-75">
                                <img class="rounded-md" src="{{ url('storage/'.$product->image->path) }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center h-full w-full">
                            </div>
                            <div class="flex justify-between">
                                <div class="area-description">
                                    <h3 class="pl-0 sm:pl-4 text-lg text-gray-700">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                        <p class="mt-1 text-sm text-gray-500">{{ $product->description }}</p>
                                        {{-- <p class="mt-1 text-md text-green">Price: R$ {{ number_format($product->price, 2, ",", ".") }}</p> --}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            </div>
    </main>
@endsection
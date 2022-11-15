@extends('layouts.app')

<style>
    .icons {
        cursor: pointer;
        z-index: 10;
        transition: transform 0.2s;
    }

    .icons:hover {
        transform: scale(1.3);
    }

    .bg-gradientGray-100 {
        background: linear-gradient(0deg, #00000010, transparent);
    }
</style>

@section('content-main')

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
            </div>
        </header>
        <main class="pb-10">
            <div class="bg-white">
                <div class="mx-auto max-w-2xl py-0 px-4 sm:py-6 sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3">
                        <h2 class="top-30 text-2xl tracking-tight text-gray-500">All Markets <sup>{{ "(". count($data). ")" }}</sup></h2>
                        <a href="{{ route('market_form') }}" class="lg:w-1/2 group relative flex w-full justify-center rounded-md border border-transparent bg-greenIndigo-200 py-2 px-4 text-sm font-medium text-white hover:bg-greenIndigo-500 focus:outline-none focus:ring-2 focus:greenIndigo-500 focus:ring-offset-2">
                            <button type="submit">
                                <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-greenIndigo-100 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-greenIndigo-400"></span>
                                </span>
                                Create Market
                            </button>
                        </a>
                    </div>
                    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                        @foreach($data as $market)
                        <div class="group relative pt-1 px-3 rounded-md shadow-xl bg-gradientGray-100">
                            <div class="min-h-30 max-h-60 flex flex-column aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                                @if(isset($market->image->path))
                                    <img src="{{ url('storage/'.$market->image->path) }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                @else
                                    <h3 class="d-flex justify-content-center align-items-center w-full h-full m-0 text-center text-gray-500">{{ $market->name }}</h3>
                                @endif
                            </div>
                            <div class="mt-4 gap-x-2 flex justify-between">
                                <div class="area-description">
                                    <h3 class="text-lg text-greenIndigo">
                                        <a href="{{ route('market', $market->id_market) }}">
                                            <span aria-hidden="true" class="absolute inset-0 text-green"></span>
                                            {{ $market->name }}
                                        </a>
                                        <p class="mt-1 mb-0 text-sm text-gray-500">{{ $market->city ." - ". $market->UF }}</p>
                                        <p class="text-sm text-gray-400">{{ $market->address }}</p>
                                    </h3>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                    <a class="icons" href="{{ route('market_edit', $market->id_market) }}">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke="#000" stroke-width="2" d="M14,4 L20,10 L14,4 Z M22.2942268,5.29422684 C22.6840146,5.68401459 22.6812861,6.3187139 22.2864907,6.71350932 L9,20 L2,22 L4,15 L17.2864907,1.71350932 C17.680551,1.319449 18.3127724,1.31277239 18.7057732,1.70577316 L22.2942268,5.29422684 Z M3,19 L5,21 M7,17 L15,9"></path></svg>
                                    </a>
                                    <svg class="icons" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"></path></svg>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
@endsection
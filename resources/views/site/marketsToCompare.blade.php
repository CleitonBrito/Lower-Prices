@extends('layouts.app')

@section('content-main')
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Markets List</h1>
        </div>
    </header>
    <main class="container">
        <div class="text-red-500 py-5">Select all the markets you want to compare.</div>

        <form class="col-12 col-sm-6 gap-3 my-2" enctype='multipart/form-data' method="post" action="{{ action('CompareController@index') }}">
            @csrf
            <input class="btn btn-danger mb-3 ml-5" type="submit" value="Comparar">
            @foreach($markets as $key => $market)
                <div class="d-flex gap-2 py-2 ">
                    <input name="markets_input[]" value="{{ $market->id_market }}" id="{{ $key }}" type="checkbox">
                    <label class="d-flex flex-row-reverse gap-2 items-center" for="{{ $market->id_market }}">
                        <div>{{ $market->name }}</div>
                        <div class="w-20 h-20">
                            @if(isset($market->image))
                                <img class="rounded-md" src="{{ url('storage/'.$market->image->path) }}" alt="">
                            @else
                                <h3 style="background-color: #d8d8d8" class="d-flex aspect-w-1 text-sm justify-content-center rounded-md align-items-center w-full h-full m-0 text-center text-gray-500">{{ $market->name }}</h3>
                            @endif
                        </div>
                    </label>
                </div>
            @endforeach
        </form>
    </main>
@endsection
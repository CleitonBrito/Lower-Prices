@extends('layouts.app')

@section('content-main')
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Compare Lower Price</h1>
        </div>
    </header>
    <main class="d-flex justify-center">
        <div class="d-flex flex-col col-8 justify-content-center items-center py-10">
            @foreach($prices as $price)
                <h2 class="mb-4">{{ $price['market_data']['name'] }}</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Picture</th>
                            <th>Product</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($price['products'])
                            @foreach($price['products'] as $key => $product)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img class="w-10 h-10 aspect-w-1 aspect-h-1" src="{{ url('storage/'.$product->path) }}" /> </td>
                                    <td>{{ $product->name }}</td>
                                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            @endforeach
        </div>
    </main>
@endsection
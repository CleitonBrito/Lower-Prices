@extends('layouts.app')

@section('content-main')
    <div class="container py-3 d-flex justify-content-center">
        <div class="card col-12 col-lg-6 d-flex p-lg-5 p-1">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('success'))
                <div class="alert alert-success">
                    <span>{{ session('success') }}</span> Click and view in <a style="text-decoration: underline!important" href="{{ route('home') }}">markets</a>
                </div>
            @endif
            <h1 class="text-center my-2">Edit Market</h1>
            <form action="{{ route('market_update') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                @csrf
                <input type="hidden" name="id_market" value="{{ $market->id_market }}">
                @if(isset($market->image->path))
                    <img class="rounded-lg max-h-45 w-auto p-0 mx-auto" src="{{ url('storage/'.$market->image->path) }}" alt="">
                @endif
                <input type="file" class="form-control" id="img_market" name="img_market" accept="image/png, image/jpeg, image/bmp">
                <div class="col-md-12 col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $market->name }}">
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="row mt-2">
                    <h3 class="mt-3">Address</h3>
                    <div class="col-md-9">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $market->city }}">
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="uf" class="form-label">UF</label>
                        <input type="text" class="form-control" id="uf" name="uf" value="{{ $market->UF }}">
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $market->address }}">
                    <div class="invalid-feedback">
                    Please provide a valid city.
                    </div>
                </div>
                <div class="col-12 text-center mt-4">
                    <button class="lg:w-1/2 group relative w-full rounded-md border border-transparent bg-greenIndigo-200 py-2 px-4 text-sm font-medium text-white hover:bg-greenIndigo-500 focus:outline-none focus:ring-2 focus:greenIndigo-500 focus:ring-offset-2" type="submit">Update Market</button>
                </div>
            </form>
        </div>
    </div>
@endsection
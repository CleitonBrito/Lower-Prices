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
                    <span>{{ session('success') }}</span> Click and view in <a style="text-decoration: underline!important" href="{{ route('home') }}">products</a>
                </div>
            @endif
            <h1 class="text-center mt-2 mb-5">Create Product</h1>
            <form action="{{ route('product_store') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="3" value="{{ old('description') }}" required></textarea>
                    <div class="invalid-feedback">
                    Please provide a valid city.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="img_market" class="form-label mt-2">Image</label>
                    <input type="file" class="form-control" id="img_market" name="img_market" value="{{ old('img_market') }}" accept="image/png, image/jpeg, image/bmp" required>
                    <div class="invalid-feedback">
                    Please provide a valid image file.
                    </div>
                </div>
                <div class="col-12 text-center mt-4">
                    <button class="lg:w-1/2 group relative w-full rounded-md border border-transparent bg-greenIndigo-200 py-2 px-4 text-sm font-medium text-white hover:bg-greenIndigo-500 focus:outline-none focus:ring-2 focus:greenIndigo-500 focus:ring-offset-2" type="submit">Create Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection
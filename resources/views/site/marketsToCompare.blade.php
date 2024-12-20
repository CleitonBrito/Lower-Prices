@extends('layouts.app')

<style>
    .line {
        width: 100%;
        height: 0.25em;
        background-color: #d6d6d6;
        margin-bottom: 1em;
    }

    h3 {
        margin-bottom: 0px!important;
    }
</style>

@section('content-main')
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Markets List</h1>
        </div>
    </header>
    <main class="container">
        <div class="text-red-500 py-5">Select all the markets you want to compare.</div>

        <form class="col-12 col-md-6 gap-3 my-2" enctype='multipart/form-data' method="post" action="{{ action('CompareController@index') }}">
            @csrf
            <input class="btn btn-danger mb-3 ml-5" type="submit" value="Comparar">
            <h3>Markets</h3>
            <div class="line"></div>
            @foreach($markets as $key => $market)
                <div class="d-flex gap-2 py-2 ">
                    <input name="markets_input[]" value="{{ $market->id_market }}" id="{{ 'market'.$key }}" type="checkbox">
                    <label class="d-flex flex-row-reverse gap-2 items-center" for="{{ 'market'.$key }}">
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
            <hr>
            <div class="pb-20">
                <div class="d-flex gap-5">
                    <h3>Products</h3>
                    <input id="searchProducts" placeholder="Search Product by name here..." class="w-full border border-spacing-y-4 px-2 outline rounded-sm text-black mb-1" type="text">
                </div>
                <div class="line"></div>
                @component('components.products', ['products' => $products])
                @endcomponent
            </div>
        </form>
    </main>
@endsection

@push('scripts')
    <script type="application/javascript">
        $(document).ready(function(){
            $("#searchProducts").on('input', function(){
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url : '/product/getAllInMarkets',
                    data : { name: this.value }
                })
                .done(function(el){
                    if($("#searchProducts").val() == ""){
                        $('[data-prod-id]*[style="display: none!important"]').each(function(key, el){
                            $(el).attr('style', 'display: flex!important');
                        });
                    }else{
                        $.each(el, function(key, elem){
                            $.each($('[data-prod-id]'), function(key2, el2){
                                $(el2).attr("style", "display: flex");
                                if($(el2).data('prod-id') != $(elem)[0].id_product)
                                    $(el2).attr("style", "display: none!important");
                            });
                        
                        });
                    }
                });
            });
        });
    </script>
@endpush
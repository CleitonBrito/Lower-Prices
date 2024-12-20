<div id="products" class="col-12 col-md-6 gap-2 py-2">
    @foreach($products as $key => $product)
        <div data-prod-id="{{ $product->id_product }}" class="d-flex gap-2 py-2">
            <input name="products_input[]" value="{{ $product->id_product }}" id="{{ 'product'.$key }}" type="checkbox">
            <label class="d-flex flex-row-reverse gap-2 items-center" for="{{ 'product'.$key }}">
                <div>{{ $product->name }}</div>
                <div class="w-20 h-20">
                    @if(isset($market->image))
                        <img class="rounded-md" src="{{ url('storage/'.$market->image->path) }}" alt="">
                    @else
                        <h3 style="background-color: #d8d8d8" class="d-flex aspect-w-1 text-sm justify-content-center rounded-md align-items-center w-full h-full m-0 text-center text-gray-500">{{ $product->name }}</h3>
                    @endif
                </div>
            </label>
        </div>
    @endforeach
</div>
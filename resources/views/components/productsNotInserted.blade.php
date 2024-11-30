@push('scripts')
    <script src="{{ asset('js/script.js')}}"></script>
@endpush

<div class="collapse my-3 pb-5" id="itemsNotInsertedCollapse">
    <div class="card card-body py-4 px-3">
        <div class="gap-x-5 flex flex-col sm:flex-row">
            <h2 id="count-items-not-inserted" class="my-auto text-greenIndigo-100">{{ $title.": ". count($productsNotInserted) }}</h2>
            <button id="confirm-button" class="max-h-10 sm:mx-auto mt-md-0 mt-2 mx-0 lg:w-1/4 sm:w-1/2 group relative flex w-full justify-center rounded-md border border-transparent bg-greenIndigo-200 py-2 px-4 text-sm font-medium text-white hover:bg-greenIndigo-500 focus:outline-none focus:ring-2 focus:greenIndigo-500 focus:ring-offset-2">Confirm</button>
        </div>
        <span class="mt-2 text-gray-500">To insert a new item just type the value and confirm in the top button "Confirm".</span>
        <div class="mt-6 grid grid-cols-1 gap-y-5 gap-x-6 sm:grid-cols-1 lg:grid-cols-2 xl:gap-x-8">
            @foreach($productsNotInserted as $product)
                <div data-id="{{ $product->id_product }}" class="group relative pt-3 px-3 bg-gradientGray-100 rounded-md shadow-xl sm:flex sm:flex-column">
                        <div class="sm:h-20 sm:w-20 h-36 w-36 mx-auto rounded-md bg-white group-hover:opacity-75">
                            <img class="img-product rounded-md" src="{{ url('storage/'.$product->image->path) }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center h-full w-full">
                        </div>
                        <div class="w-full gap-x-2 flex justify-between">
                            <div class="area-description w-full sm:w-11/12">
                                <h3 class="text-lg text-gray-700 md:ml-5 ml-0">
                                    {{ $product->name }}
                                    <p class="mt-1 text-sm text-gray-500">{{ $product->description }}</p>
                                    <div class="flex flex-column flex-sm-row">
                                        <span class="mr-2">Price:</span>
                                        <input class="w-full border-2 border-green-300 rounded-md" type="number">
                                    </div>
                                </h3>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</div>
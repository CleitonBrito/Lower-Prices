<div class="collapse my-3 pb-5" id="itemsNotInsertedCollapse">
    <div class="card card-body py-4 px-3">
        <div class="gap-x-5 flex flex-col sm:flex-row">
            <h2 class="my-auto text-greenIndigo-100">{{ $title." (". count($productsNotInserted) .")" }}</h2>
            <button class="max-h-10 sm:mx-auto mt-md-0 mt-2 mx-0 lg:w-1/4 sm:w-1/2 group relative flex w-full justify-center rounded-md border border-transparent bg-greenIndigo-200 py-2 px-4 text-sm font-medium text-white hover:bg-greenIndigo-500 focus:outline-none focus:ring-2 focus:greenIndigo-500 focus:ring-offset-2">Confirm</button>
        </div>
        <span class="mt-2 text-gray-500">To insert a new item just type the value and confirm in the top button "Confirm".</span>
        <div class="mt-6 grid grid-cols-1 gap-y-5 gap-x-6 sm:grid-cols-1 lg:grid-cols-2 xl:gap-x-8">
            @foreach($productsNotInserted as $product)
                <div class="group relative bg-gradientGray-100 pt-3 px-3 rounded-md shadow-xl sm:flex sm:flex-column">
                        <div class="h-20 w-20 mr-5 rounded-md bg-gray-200 group-hover:opacity-75">
                        <img class="rounded-md" src="{{ url('storage/'.$product->image->path) }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center h-full w-full">
                        </div>
                        <div class="w-full gap-x-2 flex justify-between">
                            <div class="area-description w-full sm:w-11/12">
                                <h3 class="text-lg text-gray-700">
                                    {{ $product->name }}
                                    <p class="mt-1 text-sm text-gray-500">{{ $product->description }}</p>
                                    <div class="flex flex-column flex-sm-row">
                                        <span class="mr-2">Price:</span>
                                        <input class="w-full border-2 border-green-300 rounded-md" type="number">
                                    </div>
                                </h3>
                            </div>
                            <div class="absolute-icon d-flex gap-2 align-items-center">
                                <svg class="icons" stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><path d="M8 11C7.44772 11 7 11.4477 7 12C7 12.5523 7.44772 13 8 13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H8Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" fill="currentColor"></path></svg>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</div>
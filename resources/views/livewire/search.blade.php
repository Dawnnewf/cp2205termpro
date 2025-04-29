<div class="row mx-auto my-3 p-3" style="height:175px " id="search-filter">
    <div class="srhead col-md-12 d-flex justify-content-center align-items-center">
        <h3 class="tracking-widest font-bold">Search Options</h3>
    </div>

    <div class="search1 col-md-4 d-flex justify-content-center align-items-center flex-wrap">

        <div class="w-100 pb-3">
            <label for="category" class="px-4 font-bold">Select Category</label>
            <select name='category' id='category'
                class="flex-1 bg-gray-100 rounded-xl py-2 pl-3 pr-9 text-sm font-semibold" wire:model.change="category">

                <option value="" disabled selected>Category</option>
                <option value="dvdformat">Format</option>
                <option value="type">Type</option>
                <option value="location">Location</option>
                <option value="genre">Genre</option>
                <option value="rating">DVD Rating</option>

            </select>
        </div>

        {{-- hidden until Category is selected --}}
        <div class="w-100 pb-3" wire:show:="showSubc">

            <label for="subcategory" class="px-4 font-bold">Select Sub-Category</label>

            <select name='subcategory' id='subcategory'
                class="flex-1 bg-gray-100 rounded-xl py-2 pl-3 pr-9 text-sm font-semibold" wire:change="filter"
                wire:model:change="subcategory">

                @foreach ($subcategories as $id => $subcategory)
                    <option value="{{ $id }}">
                        {{ $subcategory }}
                    </option>
                @endforeach

                <option value="subcategory" disabled selected>Sub-Category
                </option>

            </select>
        </div>
    </div>

    <div class="search1 col-md-4 d-flex justify-content-center align-items-center">
        <div>
            <label for="category" class="px-4 font-bold">Sort By:</label>
            <select name='category' id='category'
                class="flex-1 bg-gray-100 rounded-xl py-2 pl-3 pr-9 text-sm font-semibold"
                onchange="filterByCategory('{{ url()->current() }}')">

                <option value="category" disabled selected>Category
                </option>
                <option value="category">Format
                </option>
                <option value="category">Type
                </option>
                <option value="category">Location
                </option>
                <option value="category">DVD Rating
                </option>

            </select>
        </div>
    </div>

    <div class="search1 col-md-4 d-flex justify-content-center align-items-center">
        <div>
            <form method="GET" action="{{ url()->full() }}">
                <label for="search" class="px-4 font-bold">Search for DVD's</label>
                <input type="text" name="search" placeholder="Find something"
                    class="placeholder-black font-semibold text-sm bg-gray-100 rounded-xl px-3 py-2"
                    value="{{ request()->query('search') }}">
            </form>
        </div>
    </div>
</div>

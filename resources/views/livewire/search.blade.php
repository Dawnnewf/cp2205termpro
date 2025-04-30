<div class="row mx-auto my-3 p-3" style="height:175px " id="search-filter">
    <div class="srhead col-md-12 d-flex justify-content-center align-items-center">
        <h3 class="tracking-widest font-bold">Search Options</h3>
    </div>

    <div class="filter1 col-md-4 d-flex justify-content-center align-items-center flex-wrap">

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
                class="flex-1 bg-gray-100 rounded-xl py-2 pl-3 pr-9 text-sm font-semibold" wire:model.live="filterValue"
                wire:change="filter( '{{ url()->previous() }}' )">

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

    <div class="sort col-md-4 d-flex justify-content-center align-items-center">
        <div>
            <label for="category" class="px-4 font-bold">Sort By:</label>
            <select name='category' id='category'
                class="flex-1 bg-gray-100 rounded-xl py-2 pl-3 pr-9 text-sm font-semibold" wire:model.live="sortValue"
                wire:change="orderBy( '{{ url()->previous() }}' )">

                <option value="" selected>Category</option>
                <option value="dvdformat">Format</option>
                <option value="type">Type</option>
                <option value="location">Location</option>

            </select>
        </div>
    </div>

    <div class="search1 col-md-4 d-flex justify-content-center align-items-center">

        <form method="GET" action="{{ url()->full() }}">
            <label for="search" class="px-4 font-bold">Search for DVD's</label>
            <input type="text" name="search" placeholder="Find a DVD"
                class="placeholder-black font-semibold text-sm bg-gray-100 rounded-xl px-3 py-2"
                value="{{ request()->query('search') }}">
        </form>

    </div>

    <script>
        function filterByCategory(url, filter, value) {
            let link = url;

            link += "?" + filter + "=" + value;
            location.href = link;
        }

        function filterBySort(url, orderBy, value) {
            let link = url;

            link += "?sort=" + value;
            location.href = link;
        }
    </script>
</div>

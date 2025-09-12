@extends('web.utils.master')
@section('content')
@section('head')
<title>Custom Pickleball Courts – Portable & Durable | PortaCourts</title>
<meta name="description" content="Explore custom Pickleball courts at PortaCourts. Portable and weather-resistant courts designed for all players. Get your Pickleball court customized today.">
<meta name="keywords" content="pickleball courts, custom pickleball courts, portable pickleball courts, weather-resistant pickleball courts, backyard pickleball, custom sport courts, PortaCourts pickleball">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://www.portacourts.com/products" />
@endsection
<section class="filter-wrapper py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h3 class="font-oswald mb-3">Filters</h3>
                <form method="GET" id="filter-form">
                    <div class="filter-inner">
                        <div>
                            <h4 class="font-oswald py-2">Category</h4>
                        </div>
                        <ul class="ps-0 category-listed" id="category-list">
                            @foreach($category as $singlecat)
                            <li class="text-grey font-Yantramanav fw-400 category-item" data-category-id="{{$singlecat->id}}">
                                <input type="checkbox" name="catID[]" value="{{$singlecat->id}}" id="category-{{$singlecat->id}}" class="category-checkbox" {{ in_array($singlecat->id, $catIDArray) ? 'checked' : '' }}>
                                <label for="category-{{$singlecat->id}}">{{$singlecat->title}}</label>
                            </li>
                            @endforeach
                        </ul>
                        <div>
                            <h4 class="font-oswald py-2">Shop By Price</h4>
                        </div>
                        <div class="price-range-slider pt-4">
                            <div id="slider-range" class="range-bar"></div>
                            <div class="d-flex align-items-center mt-3 justify-content-between">
                                <h6 class="price-filter">Prices Range</h6>
                                <p class="range-value primary-theme">
                                    <input type="text" id="amount" readonly>
                                    <input type="hidden" name="min_price" id="min-price">
                                    <input type="hidden" name="max_price" id="max-price">
                                </p>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-oswald pb-2 pt-3">Sort By</h3>
                        </div>
                        <ul class="ps-0 category-listed" id="sort-list">
                            <li class="text-grey font-Yantramanav fw-400 sort-item" data-sort-by="desc">
                                <input type="radio" name="sort_by" value="desc" id="sort-desc" class="sort-radio" {{$sortBy == 'desc' ? 'checked' : ''}}>
                                <label for="sort-desc">High to Low</label>
                            </li>
                            <li class="text-grey font-Yantramanav fw-400 sort-item" data-sort-by="asc">
                                <input type="radio" name="sort_by" value="asc" id="sort-asc" class="sort-radio" {{$sortBy == 'asc' ? 'checked' : ''}}>
                                <label for="sort-asc">Low to High</label>
                            </li>
                        </ul>

                        <button type="submit" class="green-btn w-100 mt-3">Apply Filter</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-9">
                <h3 class="font-oswald mb-3">Products</h3>
                @if(isset($_GET['max_price']))
                <div class="productfilter d-flex align-items-baseline gap-2">
                    <p class="fw-500 mb-0 lh-1">Filter:</p>
                    <div class="d-flex gap-2 align-items-center flex-wrap" id="applied-filters">
                        <!-- Applied filters will be dynamically added here -->
                        <a class="border-0 clear-filter fw-400 font-Yantramanav d-flex align-items-center gap-2" href="{{route('product')}}">
                            Clear All Filter
                        </a>
                    </div>
                </div>
                @endif
                <div class="row pt-4">
                    @if(count($product) > 0)
                    @foreach($product as $singleproduct)
                    <div class="col-md-6 col-xl-4 mb-3">
                        <a href="{{route('product_detail',$singleproduct->slug)}}">
                            <div class="feature-pro">
                                <div class="product-feature-img product-bg position-relative">
                                    <img src="{{ asset('storage/' . $singleproduct->product_images[0]->image_url) }}" class="img-fluid product-pic">
                                    @php
                                    $in_wishlist = App\Models\Wishlist::where(['user_id'=> Auth::id(),'product_id'=>$singleproduct->id])->first();
                                    $item = App\Models\ProductVariant::where(['product_id'=>$singleproduct->id])->first();
                                    @endphp
                                    <a class="icon-wish-product addwishlist" data-product-id="{{ $singleproduct->id }}" data-in-wishlist="{{ $in_wishlist ?? '' }}">
                                        <img src="{{ $in_wishlist ? url('/') . '/webassets/img/green-wishlist-bg.svg' : url('/') . '/webassets/img/unfillwishlist.svg' }}" class="wishlist-icon">
                                    </a>
                                </div>
                                <div class="px-3 py-4">
                                    <a href="{{route('product_detail',$singleproduct->slug)}}" class="text-black">
                                        <h3 class="text-capitalize mb-2 fw-400 one-line">{{$singleproduct->title}}</h3>
                                    </a>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="mb-0"> <span class="primary-theme price-offer">${{$item->discounted_price ?? ''}}.00</span><span class="price-old ms-2">${{$item->price ?? ''}}.00</span></p>
                                            <div class="d-flex align-items-center gap-1">
                                                @php
                                                $averageRating = $singleproduct->average_rating;
                                                $fullStars = floor($averageRating);
                                                $halfStar = ($averageRating - $fullStars) >= 0.5 ? 1 : 0;
                                                $emptyStars = 5 - $fullStars - $halfStar;
                                                @endphp
                                                @for ($i = 0; $i < $fullStars; $i++) <i class="fa fa-star" aria-hidden="true"></i>
                                                    @endfor

                                                    @if ($halfStar)
                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    @endif

                                                    @for ($i = 0; $i < $emptyStars; $i++) <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        @endfor
                                            </div>
                                        </div>
                                        <a class="" href="{{route('product_detail',$singleproduct->slug)}}"><img src="{{url('/')}}/webassets/img/cart.svg"></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @else
                    <div class="d-flex mx-auto justify-content-center align-items-center my-5 h-100">
                        <img src="{{ asset('webassets/img/wishlist-empty.png') }}" class=" no-data-found">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryCheckboxes = document.querySelectorAll('.category-checkbox');
        const sortRadios = document.querySelectorAll('.sort-radio');

        function updateAppliedFilters() {
            const appliedFilters = document.getElementById('applied-filters');
            appliedFilters.innerHTML = ''; // Clear current filters
            // Add applied categories
            categoryCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const categoryLabel = document.querySelector(`label[for="${checkbox.id}"]`).textContent;
                    const filterButton = document.createElement('button');
                    filterButton.className = 'border-0 filterbtn primary-theme fw-400 font-Yantramanav d-flex align-items-center gap-2';
                    filterButton.innerHTML = `<span>${categoryLabel}</span><img src="{{url('/')}}/webassets/img/crossfilter.svg">`;
                    filterButton.addEventListener('click', () => {
                        checkbox.checked = false;
                        updateAppliedFilters();
                        setTimeout(() => {
                            $("#filter-form").submit();
                        }, 500);
                    });
                    appliedFilters.appendChild(filterButton);
                } else {

                }
            });

            // Add applied sort
            sortRadios.forEach(radio => {
                if (radio.checked) {
                    const sortLabel = document.querySelector(`label[for="${radio.id}"]`).textContent;
                    const filterButton = document.createElement('button');
                    filterButton.className = 'border-0 filterbtn primary-theme fw-400 font-Yantramanav d-flex align-items-center gap-2';
                    filterButton.innerHTML = `<span>${sortLabel}</span><img src="{{url('/')}}/webassets/img/crossfilter.svg">`;
                    filterButton.addEventListener('click', () => {
                        radio.checked = false;
                        updateAppliedFilters();
                        setTimeout(() => {
                            $("#filter-form").submit();
                        }, 500);
                    });
                    appliedFilters.appendChild(filterButton);
                } else {

                }
            });

            // Add Clear All Filters button
            const clearAllButton = document.createElement('a');
            clearAllButton.className = 'border-0 clear-filter fw-400 font-Yantramanav d-flex align-items-center gap-2';
            clearAllButton.href = "{{route('product')}}";
            clearAllButton.textContent = 'Clear All Filter';
            appliedFilters.appendChild(clearAllButton);

            // $("#filter-form").submit();
        }

        function constructFilterURL() {
            const form = document.getElementById('filter-form');
            const url = new URL(form.action);
            const params = new URLSearchParams();

            // Add selected categories as comma-separated values
            const selectedCategories = [];
            categoryCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedCategories.push(checkbox.value);
                }
            });
            if (selectedCategories.length > 0) {
                params.set('catID', selectedCategories.join(','));
            }

            // Add sort option
            sortRadios.forEach(radio => {
                if (radio.checked) {
                    params.set('sort_by', radio.value);
                }
            });

            // Add price range only if min and max values are set
            const minPrice = document.getElementById('min-price').value;
            const maxPrice = document.getElementById('max-price').value;
            if (minPrice && maxPrice) {
                params.set('min_price', minPrice);
                params.set('max_price', maxPrice);
            }

            url.search = params.toString();
            return url.toString();
        }

        document.getElementById('filter-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const url = constructFilterURL();
            window.location.href = url;
        });

        categoryCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateAppliedFilters);
        });

        sortRadios.forEach(radio => {
            radio.addEventListener('change', updateAppliedFilters);
        });


        let startingRange = <?php echo isset($_GET['min_price']) ? $_GET['min_price'] : 0; ?>;
        let endingRange = <?php echo isset($_GET['max_price']) ? $_GET['max_price'] : 1000; ?>

        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 1000,
            values: [startingRange, endingRange],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                $("#min-price").val(ui.values[0]);
                $("#max-price").val(ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
        $("#min-price").val($("#slider-range").slider("values", 0));
        $("#max-price").val($("#slider-range").slider("values", 1));

        updateAppliedFilters(); // Initialize applied filters on page load
    });
</script>
@endsection
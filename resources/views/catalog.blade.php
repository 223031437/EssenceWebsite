<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Essence of the Middle East</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">


    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

@include('partials.header')

<section class="hero-section">

    <div class="overlay"></div>

    <div class="hero-content">

        <h1>PERFUME CATALOG</h1>

        <p>
            Discover luxurious fragrances inspired by
            <span>
                the richness of the Middle East
            </span>
        </p>

    </div>

</section>

<section class="catalog-section">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-2 mb-4">

                <div class="filter-box">
                    <h3>FILTERS</h3><hr>
                    <form method="GET" action="{{ route('catalog') }}">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <div class="filter-group"><h5>Category</h5>
                            @foreach(['All'=>null,'Ladies'=>'Ladies','Men'=>'Men','Unisex'=>'Unisex'] as $label=>$value)
                                <button class="filter-btn {{ request('category') === $value || ($label==='All' && !request('category')) ? 'active-btn' : '' }}" type="submit" name="category" value="{{ $value }}">{{ $label }}</button>
                            @endforeach
                        </div>
                        <div class="filter-group"><h5>Longevity</h5>
                            @foreach(['Moderate','Long','Very Long'] as $value)<label><input type="checkbox" name="longevity[]" value="{{ $value }}" {{ in_array($value,(array)request('longevity',[]),true) ? 'checked' : '' }}> {{ $value }}</label>@endforeach
                        </div>
                        <div class="filter-group"><h5>Top Notes</h5>
                            @foreach(['Citrus','Floral','Woody','Sweet'] as $value)<label><input type="checkbox" name="top_note[]" value="{{ $value }}" {{ in_array($value,(array)request('top_note',[]),true) ? 'checked' : '' }}> {{ $value }}</label>@endforeach
                        </div>
                        <button class="reset-btn" type="button" onclick="window.location='{{ route('catalog') }}'">Reset Filters</button>
                        <button class="reset-btn mt-2" type="submit">Apply Filters</button>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-10">

                <div class="row g-4">

    @foreach($products as $product)

        <div class="col-md-6 col-xl-3">

        <a href="{{ route('products.show', $product) }}"
            class="text-decoration-none text-reset">

            <div class="perfume-card">

                <i class="fa-regular fa-heart heart"></i>

                <img src="{{ asset('images/' . $product->image) }}"
                     alt="{{ $product->name }}">

                <div class="card-content">

                    <h3>{{ $product->name }}</h3>

                    <span class="category">
                        {{ $product->category }}
                    </span>

                    <p>
                        {{ $product->description }}
                    </p>

                    <span class="tag">
                        {{ $product->longevity }}
                    </span>

                </div>

            </div>
        </a>

        </div>

    @endforeach

</div>

            </div>

        </div>

    </div>

</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@include('partials.footer')

</body>
</html>

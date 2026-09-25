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

<nav class="navbar navbar-expand-lg">

    <div class="container-fluid px-5">


        <a class="navbar-brand" href="#">

            <div class="logo-text">

                <span class="main-logo">
                    ESSENCE
                </span>

                <span class="sub-logo">
                    OF THE MIDDLE EAST
                </span>

            </div>

        </a>

        <button class="navbar-toggler bg-light"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-center"
        id="navMenu">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Collection
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="About.html">
                        About Us
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="ContactUs.html">
                        Contact
                    </a>
                </li>

            </ul>

        </div>

      <div class="top-icons">

    <div class="search-bar">

        <input type="text"
        placeholder="Search perfumes...">

        <i class="fa-solid fa-magnifying-glass"></i>

    </div>

    <i class="fa-regular fa-user"></i>

    <i class="fa-solid fa-bag-shopping"></i>

</div>

    </div>

</nav>

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

                    <h3>
                        FILTERS
                    </h3>

                    <hr>

                    <div class="filter-group">

                        <h5>Category</h5>

                        <button class="filter-btn active-btn">
                            All
                        </button>

                        <button class="filter-btn">
                            Ladies
                        </button>

                        <button class="filter-btn">
                            Men
                        </button>

                        <button class="filter-btn">
                            Unisex
                        </button>

                    </div>

                    <div class="filter-group">

                        <h5>Longevity</h5>

                        <label><input type="checkbox"> Moderate</label>

                        <label><input type="checkbox"> Long</label>

                        <label><input type="checkbox"> Very Long</label>

                    </div>

                    <div class="filter-group">

                        <h5>Top Notes</h5>

                        <label><input type="checkbox"> Citrus</label>

                        <label><input type="checkbox"> Floral</label>

                        <label><input type="checkbox"> Woody</label>

                        <label><input type="checkbox"> Sweet</label>

                    </div>

                    <button class="reset-btn">
                        Reset Filters
                    </button>

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
                        {{ $product->scent_profile }}
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

</body>
</html>

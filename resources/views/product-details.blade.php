<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} | Essence of the Middle East</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Poppins:wght@300;400;500&display=swap"
      rel="stylesheet">

    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
      href="{{ asset('CSS/style.css') }}">

    <link rel="stylesheet"
      href="{{ asset('CSS/product-details.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg">

    <div class="container-fluid px-5">

        <a class="navbar-brand" href="{{ url('/') }}">

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
                    <a class="nav-link" href="{{ url('/catalog') }}">
                        Catalog
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        About Us
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Contact
                    </a>
                </li>

            </ul>

        </div>


        <div class="top-icons">

            <div class="search-bar">

                <input
                    type="text"
                    placeholder="Search perfumes..."
                    aria-label="Search perfumes">

                <i class="fa-solid fa-magnifying-glass"></i>

            </div>

            <i class="fa-regular fa-user"></i>

            <i class="fa-solid fa-bag-shopping"></i>

        </div>

    </div>

</nav>

<section class="breadcrumb-section">

    <div class="container py-3">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        Home
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ url('/catalog') }}">
                        Catalog
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    {{ $product->name }}
                </li>

            </ol>

        </nav>

    </div>

</section>


<section class="product-details py-5">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="product-images">

                    <img src="{{ asset('images/' . $product->image) }}"
                         alt="{{ $product->name }} Main Image"
                         class="img-fluid main-product-image">


                    <div class="image-gallery mt-3">

                        <img src="{{ asset('images/' . $product->image) }}"
                             alt="{{ $product->name }} gallery image"
                             class="gallery-image">

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <h1 class="product-title mb-3">
                    {{ $product->name }}
                </h1>


                <p class="rating">

                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>

                    <span>
                        4.8 (126 Reviews)
                    </span>

                </p>


                <h2 class="price mb-4">
                    R{{ number_format($product->price, 2) }}
                </h2>


                <p>
                    <strong>Category:</strong>
                    {{ $product->category }}
                </p>


                <p>
                    <strong>Longevity:</strong>
                    {{ $product->longevity }}
                </p>


                <p>
                    {{ $product->description }}
                </p>


                <div class="mt-4">

                    <form action="{{ route('cart.add', $product->id) }}"
                          method="POST">

                        @csrf

                        <button class="btn gold-outline-btn me-2"
                                type="submit">

                            Add to Cart

                        </button>

                    <button class="btn gold-btn"
                            type="button">

                        Buy Now

                    </button>

                    </form>

                </div>

            </div>


        </div>

    </div>

</section>

<section class="fragrance-notes py-5">

    <div class="container">

        <h2 class="product-section-title text-center mb-5">
            Fragrance Notes
        </h2>

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="note-card mb-4">

                    <i class="fa-solid fa-leaf"></i>

                    <h4>
                        Top Notes
                    </h4>

                    <p>
                        {{ $product->top_notes }}
                    </p>

                </div>


                <div class="note-card mb-4">

                    <i class="fa-solid fa-spa"></i>

                    <h4>
                        Middle Notes
                    </h4>

                    <p>
                        {{ $product->middle_notes }}
                    </p>

                </div>


                <div class="note-card">

                    <i class="fa-solid fa-gem"></i>

                    <h4>
                        Base Notes
                    </h4>

                    <p>
                        {{ $product->base_notes }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="customer-reviews py-5">

    <div class="container">

        <h2 class="product-section-title text-center mb-2">
            Customer Reviews
        </h2>


        <p class="text-center mb-5">

            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>

            <span>
                4.8 (126 Reviews)
            </span>

        </p>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="review-card">

                    <h5>
                        Akhona
                    </h5>

                    <div class="review-stars">

                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>

                    </div>

                    <p>
                        A truly luxurious fragrance with an incredible scent. It lasts all day and always gets compliments.
                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="review-card">

                    <h5>
                        Kendal
                    </h5>


                    <div class="review-stars">

                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>

                    </div>

                    <p>
                        Rich, smooth and perfectly balanced. I love that it is suitable for any occasion.
                    </p>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="review-card">

                    <h5>
                        Mogan
                    </h5>


                    <div class="review-stars">

                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>

                    </div>


                    <p>
                        Strong at first but settles into a warm, elegant fragrance that feels premium.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>


<section class="share-review py-5">

    <div class="container">

        <h2 class="product-section-title text-center mb-5">
            Share Your Experience
        </h2>


        <div class="row justify-content-center">

            <div class="col-lg-8">


                <form>


                    <div class="mb-3">

                        <label class="form-label">
                            Your Name
                        </label>


                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter your name"
                            autocomplete="name">
                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Rating
                        </label>


                        <div class="rating-input">

                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>

                        </div>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Your Review
                        </label>


                        <textarea
                            class="form-control"
                            rows="5"
                            placeholder="How did this fragrance make you feel?"
                            aria-label="Customer review"></textarea>

                    </div>


                    <button type="submit"
                            class="btn gold-btn">

                        Submit Review

                    </button>


                </form>


            </div>

        </div>

    </div>

</section>


<section class="continue-shopping text-center py-5">

    <a href="{{ url('/catalog') }}"
        class="btn gold-outline-btn">

        Continue Shopping

    </a>

</section>


<footer class="footer-section py-4">

    <div class="container text-center">


        <h3 class="footer-logo">
            ESSENCE
        </h3>


        <p class="footer-subtitle">
            OF THE MIDDLE EAST
        </p>


        <p class="footer-text">
            Luxury fragrances inspired by the richness of the Middle East.
        </p>


        <hr>


        <p class="copyright mb-0">
           © {{ date('Y') }} | All Rights Reserved
        </p>


    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>

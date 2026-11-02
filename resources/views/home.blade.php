<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Essence of the Middle East</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#000;
            color:white;
            font-family:'Poppins', sans-serif;
        }

        :root{
            --gold:#c79a5b;
            --soft-gold:#d6ae73;
            --dark:#050505;
        }

        /* NAVBAR */

        .navbar{
            background: #050505;
            padding:25px 0;
        }

        .navbar-brand{
            font-family:'Cormorant Garamond', serif;
            font-size:2rem;
            letter-spacing:3px;
            color:white;
            font-weight:600;
        }

        .navbar-brand:hover{
            color:var(--gold);
        }

        .nav-link{
            color:white;
            margin-left:25px;
            transition:0.3s;
        }

        .nav-link:hover{
            color:var(--gold);
        }

        .cart-icon{
            color:white;
            font-size:1.3rem;
            margin-left:25px;
            transition:0.3s;
            text-decoration:none;
        }

        .cart-icon:hover{
            color:var(--gold);
        }

        /* HERO SECTION */

        .hero{
            min-height:100vh;
            display:flex;
            align-items:center;
            background:linear-gradient(to right, rgba(0,0,0,0.95), rgba(0,0,0,0.7)), url('../images/background2.png');
            background-position:center;
            background-size:cover;
            background-repeat:no-repeat;

            padding-top:100px;
        }

        .hero h1{
            font-size:5rem;
            font-family:'Cormorant Garamond', serif;
            font-weight:700;
            line-height:1;
        }

        .hero span{
            color:var(--gold);
        }

        .hero p{
            margin-top:25px;
            color:#d3d3d3;
            max-width:500px;
            line-height:1.8;
        }

        .hero-btn{
            margin-top:30px;
            background:var(--gold);
            border:none;
            color:black;
            padding:14px 35px;
            font-weight:600;
            letter-spacing:1px;
            transition:0.3s;
        }

        .hero-btn:hover{
            background:var(--soft-gold);
            transform:translateY(-2px);
        }

        /* COLLECTION */

        .section-title{
            text-align:center;
            margin-top:100px;
            margin-bottom:50px;
            font-family:'Cormorant Garamond', serif;
            font-size:3rem;
            color:white;
        }

        .perfume-card{
            background:#0d0d0d;
            border:1px solid #1f1f1f;
            padding:20px;
            transition:0.3s;
        }

        .perfume-card:hover{
            transform:translateY(-5px);
            border-color:var(--gold);
        }

        .perfume-card img{
            width:100%;
            height:320px;
            object-fit:cover;
        }

        .perfume-name{
            text-align:center;
            margin-top:20px;
            font-family:'Cormorant Garamond', serif;
            font-size:2rem;
        }

        .price{
            text-align:center;
            color:var(--gold);
        }

        /* ABOUT SECTION */

        .about{
            padding:120px 0;
        }

        .about h2{
            font-family:'Cormorant Garamond', serif;
            font-size:3.5rem;
        }

        .about p{
            margin-top:20px;
            color:#cfcfcf;
            line-height:1.9;
        }

        .about-box{
            background:#0b0b0b;
            border-left:4px solid var(--gold);
            padding:30px;
        }

        /* FOOTER */

        footer{
            background:#050505;
            padding:30px 0;
            text-align:center;
            border-top:1px solid #1a1a1a;
            color:#9e9e9e;
            margin-top:80px;
        }

        @media(max-width:768px){

            .hero h1{
                font-size:3.2rem;
            }

            .section-title{
                font-size:2.4rem;
            }

            .about h2{
                font-size:2.5rem;
            }

        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <!-- NAVBAR -->

    @include('partials.header')

    <!-- HERO SECTION -->

    <section class="hero">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h1>
                        Middle East <br>
                        <span>Perfume</span>
                    </h1>

                    <p>
                        Discover luxurious fragrances crafted to celebrate elegance, sophistication and the richness of Middle Eastern culture.
                        Experience refined blends of oud, musk, amber and floral notes designed for a luxurious fragrance experience.
                    </p>

                    <!-- <button class="btn hero-btn">
                       <a href="Catalog.html"> SHOP NOW</a> </button>
                    </button> -->
                    <a href="{{ url('/catalog') }}" class="btn hero-btn">SHOP NOW</a>

                </div>

            </div>

        </div>

    </section>

    <!-- COLLECTION -->

    <section class="container">

        <h2 class="section-title">
            Our Collection
        </h2>

        <div class="row g-4">

            @foreach($products as $product)

            <div class="col-md-4">

                <div class="perfume-card">

                    <img src="{{ asset('images/'.$product->image) }}"
                        alt="{{ $product->name }}">

                    <h3 class="perfume-name">
                        {{ $product->name }}
                    </h3>

                    <p class="price">
                        {{ $product->collection }}
                    </p>

                </div>

            </div>

            @endforeach

            </div>



        </div>

    </section>

    <!-- ABOUT -->

    <section class="about">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    <div class="about-box">

                        <h2>
                            The Art of Perfumery
                        </h2>

                        <p>
                            Essence of the Middle East blends traditional Arabian fragrance culture with modern luxury.
                            Every scent is designed to reflect elegance, confidence and timeless beauty.
                        </p>

                    </div>

                </div>

                <div class="col-lg-6">

                    <img 
                        src="../images/collection.png"
                        class="img-fluid rounded"
                        alt="Luxury Perfume"
                    >

                </div>

            </div>

        </div>

    </section>

    <!-- FOOTER -->

    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@include('partials.footer')

</body>
</html>
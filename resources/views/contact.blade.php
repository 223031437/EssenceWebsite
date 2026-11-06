<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Essence of the Middle East</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background:linear-gradient(to right, rgba(0,0,0,0.95), rgba(0,0,0,0.7)), url('../images/background.png');
            color: white;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        :root {
            --gold: #c79a5b;
            --soft-gold: #d6ae73;
            --dark: #050505;
            --input-bg: #121212;
            --border-color: #2a2a2a;
        }

        /* Typography */
        h1, h2, h3, h4, h5, .serif-font {
            font-family: 'Cormorant Garamond', serif;
        }

        .text-gold {
            color: var(--gold);
        }

        .small-uppercase {
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 600;
        }

        /* Navbar Styles */
        .navbar {
            background: transparent;
            padding: 25px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .navbar-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            letter-spacing: 3px;
            color: white;
            font-weight: 600;
        }

        .navbar-brand:hover {
            color: var(--gold);
        }

        .nav-link {
            color: white;
            margin-left: 25px;
            transition: 0.3s;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .nav-link:hover {
            color: var(--gold);
        }

        .icon-link {
            color: white;
            font-size: 1.2rem;
            margin-left: 20px;
            transition: 0.3s;
            text-decoration: none;
        }

        .icon-link:hover {
            color: var(--gold);
        }

        /* Contact Header Section */
        .contact-header {
            padding: 80px 0 40px 0;
            text-align: center;
        }

        .contact-header h1 {
            font-size: 4rem;
            font-weight: 400;
            margin: 15px 0;
        }

        .gold-line {
            width: 60px;
            height: 2px;
            background-color: var(--gold);
            margin: 0 auto;
        }

        /* Reach Out Section */
        .reach-out-section {
            padding: 60px 0;
        }

        .reach-out-title {
            font-size: 3rem;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .reach-out-desc {
            color: #a0a0a0;
            line-height: 1.8;
            margin-bottom: 40px;
            font-size: 0.95rem;
        }

        /* Contact Info Grid */
        .contact-info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .contact-icon-box {
            width: 50px;
            height: 50px;
            border: 1px solid var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 1.1rem;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .contact-details h5 {
            font-family: 'Poppins', sans-serif;
            font-size: 0.8rem;
            letter-spacing: 2px;
            color: #888;
            margin-bottom: 5px;
            font-weight: 400;
        }

        .contact-details p, .contact-details a {
            color: white;
            text-decoration: none;
            margin: 0;
            font-size: 1rem;
            transition: 0.3s;
        }

        .contact-details a:hover {
            color: var(--gold);
        }

        /* Hours Section */
        .hours-section {
            margin-top: 50px;
            margin-bottom: 50px;
            display: flex;
            align-items: center;
            color: #a0a0a0;
            font-size: 0.95rem;
        }

        .hours-section .contact-icon-box {
            margin-right: 20px;
            width: 45px;
            height: 45px;
            font-size: 1rem;
        }

        /* Form Styles */
        .contact-form-wrapper {
            background: #0a0a0a;
            border: 1px solid #1f1f1f;
            padding: 40px;
            margin-bottom: 100px;
        }

        .form-label {
            font-family: 'Poppins', sans-serif;
            font-size: 0.8rem;
            letter-spacing: 2px;
            color: #888;
            margin-bottom: 8px;
            font-weight: 400;
        }

        .form-label span {
            color: var(--gold);
            margin-left: 3px;
        }

        .form-control {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            color: white;
            border-radius: 0;
            padding: 12px 15px;
            font-size: 0.9rem;
        }

        .form-control:focus {
            background-color: #161616;
            border-color: var(--gold);
            color: white;
            box-shadow: none;
        }

        .form-control::placeholder {
            color: #555;
        }

        .form-select {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            color: white;
            border-radius: 0;
            padding: 12px 15px;
        }

        .form-select:focus {
            border-color: var(--gold);
            box-shadow: none;
            color: white;
        }

        /* Custom dropdown arrow color fix */
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23c79a5b' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        }

        .btn-gold {
            background-color: var(--gold);
            color: #000;
            border: none;
            border-radius: 0;
            padding: 15px 30px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.9rem;
            transition: 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .btn-gold:hover {
            background-color: var(--soft-gold);
            transform: translateY(-2px);
            color: #000;
        }

        /* Footer */
        footer {
            background: #050505;
            padding: 30px 0;
            text-align: center;
            border-top: 1px solid #1a1a1a;
            color: #9e9e9e;
            margin-top: 80px;
            font-size: 0.8rem;
        }

        @media(max-width: 768px) {
            .contact-header h1 {
                font-size: 2.8rem;
            }
            .reach-out-title {
                font-size: 2.2rem;
            }
            .contact-form-wrapper {
                padding: 25px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    @include('partials.header')

    <!-- Contact Header -->
    <section class="contact-header">
        <div class="container">
            <span class="small-uppercase">Get In Touch</span>
            <h1>Contact <span class="text-gold">Us</span></h1>
            <div class="gold-line"></div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="reach-out-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <!-- Reach Out Text -->
                    <div class="mb-5">
                        <span class="small-uppercase">Reach Out</span>
                        <h2 class="reach-out-title">We'd Love to <span class="text-gold">Hear From You</span></h2>
                    </div>

                    <p class="reach-out-desc">
                        Whether you have a question about our fragrances, want to inquire about our custom scent service, or simply want to learn more — we're here to help.
                    </p>

                    <!-- Contact Info List -->
                    <div class="contact-info-item">
                        <div class="contact-icon-box">
                            <i class="fa-regular fa-location-dot"></i>
                        </div>
                        <div class="contact-details">
                            <h5>ADDRESS</h5>
                            <p>{{ $business?->address ?? 'Shop G8, Cape Station retail, 1 Alderley st, Central, Cape Town City Centre, Cape Town, 8001, South Africa' }}</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-icon-box">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h5>PHONE</h5>
                            <a href="tel:{{ $business?->phone ?? '+27 67 684 4506' }}">{{ $business?->phone ?? '+27 67 684 4506' }}</a>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-icon-box">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h5>EMAIL</h5>
                            <a href="mailto:{{ $business?->email ?? 'info@essencemiddleeast.co.za' }}">{{ $business?->email ?? 'info@essencemiddleeast.co.za' }}</a>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="hours-section">
                        <div class="contact-icon-box">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <div>
                            <h5 style="font-family: 'Poppins', sans-serif; font-size: 0.8rem; letter-spacing: 2px; color: #888; margin-bottom: 2px;">HOURS</h5>
                            <p style="margin:0; color: #ccc;">{{ $business?->hours ?? 'Mon-Sat 9am–6pm | Sun 9am–3pm' }}</p>
                        </div>
                    </div>

                </div>

                <!-- Form Section -->
                <div class="col-lg-6">
                    <div class="contact-form-wrapper">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #1a2e1a; border-color: #2e7d32; color: #a5d6a7;">
                                <i class="fa-solid fa-check-circle me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger" style="background-color: #2e1a1a; border-color: #7d3232; color: #d6a5a5;">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">NAME <span>*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Your name" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">EMAIL <span>*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="your@email.com" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">PHONE</label>
                                <input type="tel" name="phone" class="form-control" placeholder="+27..." value="{{ old('phone') }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">SUBJECT</label>
                                <select name="subject" class="form-select">
                                    <option value="General Inquiry" selected>General Inquiry</option>
                                    <option value="Custom Scent Service">Custom Scent Service</option>
                                    <option value="Order Support">Order Support</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">MESSAGE <span>*</span></label>
                                <textarea name="message" class="form-control" rows="5" placeholder="Tell us how we can help..." required>{{ old('message') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-gold">
                                <i class="fa-regular fa-paper-plane me-2"></i> SEND MESSAGE
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



@include('partials.footer')

</body>
</html>

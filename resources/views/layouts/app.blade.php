<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Garda Oto')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bs-primary: #007bff; /* Contoh warna primary */
            --bs-primary-rgb: 0,123,255;
            --bs-secondary: #6c757d;
            --bs-success: #28a745;
            --bs-info: #17a2b8;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #343a40;
            --bs-white: #fff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bs-light); /* Background terang */
            color: var(--bs-dark); /* Teks gelap untuk keterbacaan */
        }
        .page-header {
            background: linear-gradient(to right, var(--bs-light), #e9ecef); /* Gradien lembut */
            padding: 4rem 0;
            margin-bottom: 3rem;
            color: var(--bs-dark);
            text-align: center;
        }
        .page-header h1 {
            font-size: 3rem;
            font-weight: 700;
        }
        .page-header p {
            font-size: 1.25rem;
            color: var(--bs-secondary);
        }
        .card {
            border-radius: 0.75rem; /* Sudut lebih membulat */
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05); /* Bayangan lebih lembut */
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px); /* Efek hover mengangkat kartu */
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-outline-primary {
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover, .btn-outline-primary:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        .feature-icon {
            width: 3.5rem;
            height: 3.5rem;
            font-size: 1.75rem; /* Ukuran ikon lebih besar */
            background-color: var(--bs-primary-rgb, 0,123,255); /* Menggunakan warna primary */
            background-color: rgba(var(--bs-primary-rgb), 0.1); /* Transparansi untuk efek subtle */
            color: var(--bs-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Carousel specific styles */
        .carousel-caption {
            background: rgba(0, 0, 0, 0.6); /* Background gelap transparan untuk teks caption */
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 20px; /* Jarak dari bawah */
            max-width: 600px; /* Batasi lebar caption */
            left: 50%; /* Posisikan di tengah */
            transform: translateX(-50%); /* Posisikan di tengah */
            bottom: 0; /* Posisikan di bawah */
            text-align: center !important; /* Rata tengah untuk mobile */
        }
        @media (min-width: 768px) { /* Untuk desktop */
            .carousel-caption {
                text-align: start !important;
                left: 10%; /* Lebih ke kiri di desktop */
                transform: translateX(0);
                margin-bottom: 50px;
            }
        }
        .carousel-caption .shadow-text {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.9); /* Bayangan teks lebih kuat */
        }
        .carousel-img {
            height: 450px; /* Tinggi gambar carousel ditingkatkan */
            object-fit: cover;
        }

        /* Skeleton loading styles */
        .skeleton-card {
            background-color: #e2e6ea;
            border-radius: 0.75rem;
            overflow: hidden;
        }
        .skeleton-image {
            height: 200px;
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite linear;
        }
        .skeleton-text {
            height: 1.2em;
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite linear;
            border-radius: 4px;
        }
        @keyframes loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }
        /* End Skeleton loading styles */

        /* Empty state for search results */
        .empty-state img {
            opacity: 0.6;
        }

        .hover-underline {
        position: relative;
        display: inline-block;
        }
        .hover-underline::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: 0;
            left: 0;
            background-color: var(--bs-primary); /* Warna garis bawah */
            transition: width 0.3s ease-out;
        }
        .hover-underline:hover::after {
            width: 100%;
        }
    </style>
</head>
<body>
    @include('layouts.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, // Durasi animasi AOS
            once: true,    // Hanya animasikan saat scroll pertama kali
        });
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar-enhanced');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>

</body>
</html>
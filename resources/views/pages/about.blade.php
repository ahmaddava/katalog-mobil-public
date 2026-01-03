@extends('layouts.app')
@section('title', 'Tentang Indomobil Prima')

{{-- Pastikan Bootstrap CSS, Bootstrap Icons, Font Inter, dan AOS CSS dimuat --}}
{{-- Idealnya, ini ditempatkan di file layouts.app Anda di dalam tag <head> --}}
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Pastikan Inter font digunakan */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
@endsection

@section('content')
    {{-- Page Header Section --}}
@section('content')

    <div class="page-header">
        <div class="container">
            <div class="text-center" data-aos="fade-up">
                <h1 class="fw-bold">Tentang Kami</h1>
                <p class="lead text-muted">Mengenal lebih dekat visi, misi, dan tim di balik Indomobil Prima.</p>
            </div>
        </div>
    </div>

    {{-- Visi & Misi Section with Liquid Glass Card --}}
    <div class="container py-5">
        <div class="row justify-content-center"> {{-- Centering the column --}}
            <div class="col-lg-8" data-aos="fade-up"> {{-- Adjusted width for better centering of a single block --}}
                <div class="liquid-glass-card card h-100 border-0 shadow-sm p-4"> {{-- Apply liquid glass card to the main content block --}}
                    <div class="card-body">
                        <h2 class="fw-semibold mb-3 text-center">Visi Kami</h2> {{-- Centered Visi heading --}}
                        <p class="text-muted fs-5 lh-base text-center">Menjadi dealer mobil terdepan di Indonesia yang
                            dikenal karena integritas, kualitas, dan kepuasan pelanggan.</p>

                        <h2 class="fw-semibold mt-5 mb-3 text-center">Misi Kami</h2> {{-- Centered Misi heading --}}
                        <ul class="list-unstyled text-muted fs-5 lh-base mx-auto" style="max-width: 500px;">
                            {{-- Added mx-auto and max-width for list centering --}}
                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>Menyediakan kendaraan berkualitas tinggi dengan harga yang adil.</span>
                            </li>
                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>Memberikan pengalaman pelanggan yang luar biasa melalui layanan yang ramah dan
                                    profesional.</span>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>Membangun hubungan jangka panjang yang didasarkan pada kepercayaan dan
                                    transparansi.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom CSS for Liquid Glass Effect and Icon Circles --}}
    <style>
        /* Liquid Glass Card Styling */
        .liquid-glass-card {
            background: rgba(255, 255, 255, 0.15);
            /* Semi-transparent white */
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* Lighter border */
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            /* Soft shadow */
            backdrop-filter: blur(10px);
            /* The magic glass effect */
            -webkit-backdrop-filter: blur(10px);
            /* For Safari support */
            border-radius: 12px;
            /* Rounded corners */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .liquid-glass-card:hover {
            transform: translateY(-5px);
            /* Slight lift on hover */
            box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.25);
            /* Enhanced shadow on hover */
        }

        /* Icon Circle Styling (not directly used in this version but kept for reference if needed elsewhere) */
        .icon-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            /* Adjust icon size */
            margin-bottom: 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>

    {{-- Bootstrap JavaScript Bundle (jika belum ada di layouts.app) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- AOS JavaScript --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection

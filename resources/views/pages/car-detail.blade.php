@extends('layouts.app')
@section('title', $car->name . ' | Detail Mobil')

@section('content')
<style>
    .product-gallery-container {
        position: sticky;
        top: 2rem;
    }
    
    .main-image-frame {
        border-radius: 1rem;
        overflow: hidden;
        background: #f8f9fa;
        aspect-ratio: 16/10;
        position: relative;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        margin-bottom: 1rem;
    }

    .main-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
        cursor: zoom-in;
    }
    
    .thumbnails-track {
        display: flex;
        gap: 0.75rem;
        overflow-x: auto;
        padding-bottom: 0.5rem;
        scrollbar-width: thin;
    }
    
    .thumb-btn {
        width: 80px;
        height: 60px;
        flex-shrink: 0;
        border: 2px solid transparent;
        border-radius: 0.5rem;
        overflow: hidden;
        cursor: pointer;
        opacity: 0.6;
        transition: all 0.2s;
        padding: 0;
        background: none;
    }
    
    .thumb-btn.active, .thumb-btn:hover {
        border-color: var(--bs-primary);
        opacity: 1;
        transform: translateY(-2px);
    }
    
    .thumb-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .spec-box {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 0.75rem;
        padding: 1rem;
        transition: all 0.3s;
        height: 100%;
    }
    
    .spec-box:hover {
        border-color: var(--bs-primary);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transform: translateY(-3px);
    }

    .price-tag {
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .contact-card {
        background: #f8f9fa;
        border-radius: 1rem;
        padding: 1.5rem;
        border: 1px dashed #dee2e6;
    }
</style>

<div class="container py-5">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cars.index') }}" class="text-decoration-none text-muted">Katalog</a></li>
            <li class="breadcrumb-item active fw-semibold" aria-current="page">{{ $car->name }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        {{-- LEFT COLUMN: GALLERY --}}
        <div class="col-lg-7">
            <div class="product-gallery-container">
                @php
                    // Helper function untuk gambar
                    $getImageUrl = function($path) {
                        return (str_starts_with($path, 'http')) ? $path : Storage::url($path);
                    };
                    $mainImage = (!empty($car->image) && is_array($car->image)) ? $getImageUrl($car->image[0]) : 'https://via.placeholder.com/800x500?text=No+Image';
                @endphp

                <!-- Main Image -->
                <div class="main-image-frame mb-3">
                    <img src="{{ $mainImage }}" id="mainImage" class="main-img" alt="{{ $car->name }}">
                </div>

                <!-- Thumbnails -->
                @if (!empty($car->image) && is_array($car->image) && count($car->image) > 1)
                <div class="thumbnails-track">
                    @foreach ($car->image as $index => $img)
                        <button class="thumb-btn {{ $index == 0 ? 'active' : '' }}" 
                                onclick="changeImage(this, '{{ $getImageUrl($img) }}')">
                            <img src="{{ $getImageUrl($img) }}" class="thumb-img" alt="View {{ $index + 1 }}">
                        </button>
                    @endforeach
                </div>
                @endif
            </div>
        </div>

        {{-- RIGHT COLUMN: INFO --}}
        <div class="col-lg-5">
            <div class="ps-lg-3">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3 fw-bold tracking-wider">
                    {{ $car->brand }}
                </span>
                
                <h1 class="display-5 fw-bold mb-2">{{ $car->name }}</h1>
                <p class="text-muted mb-4 fs-5">{{ $car->year }} &bull; {{ $car->transmission }}</p>

                <div class="mb-4">
                    <p class="text-muted mb-0 small text-uppercase fw-bold ls-1">Harga OTR</p>
                    <h2 class="price-tag mb-0">Rp {{ number_format($car->price, 0, ',', '.') }}</h2>
                </div>

                <hr class="my-4 opacity-10">

                {{-- Spesifikasi Highlights --}}
                <div class="row g-3 mb-5">
                    <div class="col-6">
                        <div class="spec-box d-flex align-items-center">
                            <div class="p-2 bg-light rounded-3 me-3 text-primary">
                                <i class="bi bi-gear-wide-connected fs-4"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">Transmisi</small>
                                <span class="fw-bold">{{ $car->transmission }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="spec-box d-flex align-items-center">
                            <div class="p-2 bg-light rounded-3 me-3 text-danger">
                                <i class="bi bi-fuel-pump-fill fs-4"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">Bahan Bakar</small>
                                <span class="fw-bold">{{ $car->fuel_type }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="spec-box d-flex align-items-center">
                            <div class="p-2 bg-light rounded-3 me-3 text-success">
                                <i class="bi bi-speedometer2 fs-4"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">Mesin</small>
                                <span class="fw-bold">{{ $car->engine_capacity }} cc</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="spec-box d-flex align-items-center">
                            <div class="p-2 bg-light rounded-3 me-3 text-warning">
                                <i class="bi bi-calendar-event fs-4"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">Tahun</small>
                                <span class="fw-bold">{{ $car->year }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-5">
                    <h5 class="fw-bold mb-3">Deskripsi</h5>
                    <div class="text-muted" style="line-height: 1.8;">
                        {!! $car->description !!}
                    </div>
                </div>

                {{-- CTA Area --}}
                <div class="contact-card">
                    <h5 class="fw-bold mb-3">Tertarik dengan mobil ini?</h5>
                    <p class="small text-muted mb-3">Hubungi kami segera untuk penawaran spesial.</p>
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20{{ urlencode($car->name) }}" 
                       target="_blank"
                       class="btn btn-success w-100 py-3 rounded-pill fw-bold shadow-sm hover-scale transition-transform">
                        <i class="bi bi-whatsapp me-2"></i> Hubungi via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeImage(element, src) {
        // Update Main Image
        const mainImg = document.getElementById('mainImage');
        mainImg.style.opacity = '0';
        setTimeout(() => {
            mainImg.src = src;
            mainImg.style.opacity = '1';
        }, 200);

        // Update Active Class
        document.querySelectorAll('.thumb-btn').forEach(btn => btn.classList.remove('active'));
        element.classList.add('active');
    }
</script>
@endsection

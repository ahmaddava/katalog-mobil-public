@extends('layouts.app')
@section('title', 'Indomobil Prima | Dealer Mobil Terpercaya')

@section('content')

{{-- Custom CSS untuk animasi dan styling tambahan --}}
<style>
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .feature-icon {
        width: 4rem;
        height: 4rem;
        border-radius: 0.75rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }
    
    .feature-icon i {
        font-size: 1.5rem;
        color: white;
    }
    
    .feature-card {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        height: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .carousel-img {
        height: 500px;
        object-fit: cover;
        filter: brightness(0.7);
    }
    
    .shadow-text {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    }
    
    .stats-section {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    
    .stat-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 1rem;
        padding: 2rem;
        text-align: center;
        color: white;
    }
    
    .testimonial-card {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: none;
        height: 100%;
    }
    
    .cta-section {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        position: relative;
        overflow: hidden;
    }
    
    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.1);
        z-index: 1;
    }
    
    .cta-content {
        position: relative;
        z-index: 2;
    }
    
    .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
    }
    
    .floating-shapes::before,
    .floating-shapes::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        animation: float 6s ease-in-out infinite;
    }
    
    .floating-shapes::before {
        width: 200px;
        height: 200px;
        top: 10%;
        right: 10%;
        animation-delay: -2s;
    }
    
    .floating-shapes::after {
        width: 150px;
        height: 150px;
        bottom: 20%;
        left: 10%;
        animation-delay: -4s;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    .btn-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-gradient:hover {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }
</style>

{{-- Hero Section --}}
<section class="hero-section d-flex align-items-center">
    <div class="floating-shapes"></div>
    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-4 fw-bold text-white mb-4 lh-1">
                    Temukan Mobil <span class="text-warning">Impian Anda</span> Bersama Indomobil Prima
                </h1>
                <p class="lead text-white-50 mb-4">
                    Kami menyediakan koleksi mobil terbaik dengan kualitas terjamin, harga kompetitif, dan layanan profesional untuk pengalaman membeli mobil yang tak terlupakan.
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <a href="{{ route('cars.index') }}" class="btn btn-warning btn-lg px-4 rounded-pill fw-bold">
                        <i class="bi bi-car-front me-2"></i>Lihat Koleksi
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-4 rounded-pill">
                        <i class="bi bi-telephone me-2"></i>Hubungi Kami
                    </a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=2070&auto=format&fit=crop" 
                         class="img-fluid rounded-4 shadow-lg" alt="Mobil Hero" loading="lazy">
                    <div class="position-absolute top-0 start-0 w-100 h-100 rounded-4" 
                         style="background: linear-gradient(45deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Stats Section --}}
<section class="stats-section py-5">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <h3 class="display-6 fw-bold mb-2">500+</h3>
                    <p class="mb-0">Mobil Terjual</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <h3 class="display-6 fw-bold mb-2">98%</h3>
                    <p class="mb-0">Kepuasan Pelanggan</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <h3 class="display-6 fw-bold mb-2">10+</h3>
                    <p class="mb-0">Tahun Pengalaman</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-card">
                    <h3 class="display-6 fw-bold mb-2">24/7</h3>
                    <p class="mb-0">Layanan Support</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Features Section --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">Mengapa Memilih Kami?</h2>
            <p class="lead text-muted">Kepercayaan Anda adalah prioritas utama kami</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card text-center">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Kualitas Terjamin</h4>
                    <p class="text-muted">Setiap unit mobil kami telah melewati proses inspeksi ketat untuk memastikan Anda mendapatkan produk dengan kondisi terbaik.</p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card text-center">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Harga Kompetitif</h4>
                    <p class="text-muted">Kami menawarkan harga terbaik di pasaran dengan skema pembayaran yang transparan dan tanpa biaya tersembunyi.</p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card text-center">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Layanan Profesional</h4>
                    <p class="text-muted">Tim kami yang berpengalaman siap membantu Anda dari proses pemilihan hingga serah terima unit mobil impian Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- News Carousel Section
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">Berita & Fakta Unik Seputar Mobil</h2>
            <p class="lead text-muted">Tetap update dengan informasi dan wawasan menarik dari dunia otomotif</p>
        </div>

        <div id="newsCarousel" class="carousel slide shadow-lg rounded-4 overflow-hidden" data-bs-ride="carousel" data-aos="fade-up" data-aos-delay="100">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1596489376999-4c12658145ee?q=80&w=1932&auto=format&fit=crop" class="d-block w-100 carousel-img" alt="Berita Mobil Listrik">
                    <div class="carousel-caption d-flex flex-column justify-content-end h-100 text-start p-4 p-md-5">
                        <div class="mb-3">
                            <span class="badge bg-primary rounded-pill mb-2">Berita Terkini</span>
                            <h3 class="fw-bold text-white shadow-text mb-3">Perkembangan Terkini Mobil Listrik di Indonesia</h3>
                            <p class="text-white shadow-text mb-4">Lihat bagaimana infrastruktur dan minat konsumen mobil listrik semakin meningkat di tanah air.</p>
                            <a href="#" class="btn btn-warning rounded-pill px-4">
                                <i class="bi bi-arrow-right me-2"></i>Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1627581229067-160a2b8e3a89?q=80&w=2070&auto=format&fit=crop" class="d-block w-100 carousel-img" alt="Fakta Unik Mobil">
                    <div class="carousel-caption d-flex flex-column justify-content-end h-100 text-start p-4 p-md-5">
                        <div class="mb-3">
                            <span class="badge bg-success rounded-pill mb-2">Fakta Menarik</span>
                            <h3 class="fw-bold text-white shadow-text mb-3">5 Fakta Unik tentang Sejarah Mobil yang Jarang Diketahui</h3>
                            <p class="text-white shadow-text mb-4">Dari mobil pertama hingga inovasi tersembunyi, temukan cerita menarik di balik kendaraan favorit Anda.</p>
                            <a href="#" class="btn btn-warning rounded-pill px-4">
                                <i class="bi bi-arrow-right me-2"></i>Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1579294970425-4127c1f85584?q=80&w=2070&auto=format&fit=crop" class="d-block w-100 carousel-img" alt="Tips Merawat Mobil">
                    <div class="carousel-caption d-flex flex-column justify-content-end h-100 text-start p-4 p-md-5">
                        <div class="mb-3">
                            <span class="badge bg-info rounded-pill mb-2">Tips & Trik</span>
                            <h3 class="fw-bold text-white shadow-text mb-3">Tips Merawat Mobil Agar Tetap Prima di Musim Hujan</h3>
                            <p class="text-white shadow-text mb-4">Lindungi investasi Anda dengan panduan perawatan esensial saat cuaca ekstrem.</p>
                            <a href="#" class="btn btn-warning rounded-pill px-4">
                                <i class="bi bi-arrow-right me-2"></i>Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section> --}}

{{-- Cars Collection Section --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">Koleksi Terbaru Kami</h2>
            <p class="lead text-muted">Berikut adalah beberapa unit terbaik yang baru saja kami tambahkan</p>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($cars as $car)
                <div class="col" data-aos="fade-up" data-aos-delay="{{ ($loop->iteration % 3) * 100 }}">
                    <x-car-card :car="$car" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="text-muted">
                        <i class="bi bi-car-front display-1 mb-3"></i>
                        <h4>Belum ada mobil unggulan saat ini</h4>
                        <p>Kami sedang mempersiapkan koleksi terbaik untuk Anda</p>
                    </div>
                </div>
            @endforelse
        </div>
        
        @if($cars->count() > 0)
        <div class="text-center mt-5">
            <a href="{{ route('cars.index') }}" class="btn btn-gradient btn-lg text-white rounded-pill px-5">
                <i class="bi bi-grid me-2"></i>Jelajahi Semua Mobil
            </a>
        </div>
        @endif
    </div>
</section>

{{-- Testimonials Section
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">Apa Kata Pelanggan Kami?</h2>
            <p class="lead text-muted">Kepercayaan pelanggan adalah bukti kualitas layanan kami</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-card">
                    <div class="mb-3">
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="text-muted">"Pelayanan yang sangat memuaskan! Tim Garda Oto sangat profesional dan membantu saya menemukan mobil impian dengan harga yang kompetitif."</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=64&h=64&fit=crop&crop=face" 
                             class="rounded-circle me-3" width="50" height="50" alt="Customer">
                        <div>
                            <h6 class="mb-0 fw-bold">Andi Wijaya</h6>
                            <small class="text-muted">Jakarta</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card">
                    <div class="mb-3">
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="text-muted">"Proses pembelian yang mudah dan transparan. Tidak ada biaya tersembunyi dan semua dokumen lengkap. Highly recommended!"</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=64&h=64&fit=crop&crop=face" 
                             class="rounded-circle me-3" width="50" height="50" alt="Customer">
                        <div>
                            <h6 class="mb-0 fw-bold">Sari Indah</h6>
                            <small class="text-muted">Bandung</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-card">
                    <div class="mb-3">
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="text-muted">"Kualitas mobil sangat baik dan sesuai dengan deskripsi. After sales service juga memuaskan. Terima kasih Garda Oto!"</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=64&h=64&fit=crop&crop=face" 
                             class="rounded-circle me-3" width="50" height="50" alt="Customer">
                        <div>
                            <h6 class="mb-0 fw-bold">Budi Santoso</h6>
                            <small class="text-muted">Surabaya</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

{{-- CTA Section --}}
<section class="cta-section py-5 text-white">
    <div class="floating-shapes"></div>
    <div class="container cta-content text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-4">Siap Menemukan Mobil Impian Anda?</h2>
                <p class="lead mb-4">Jangan tunggu lagi! Hubungi kami sekarang dan dapatkan penawaran terbaik untuk mobil idaman Anda.</p>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                    <a href="{{ route('cars.index') }}" class="btn btn-warning btn-lg px-5 rounded-pill fw-bold">
                        <i class="bi bi-search me-2"></i>Cari Mobil
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-5 rounded-pill">
                        <i class="bi bi-chat-dots me-2"></i>Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
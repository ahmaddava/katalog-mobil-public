@extends('layouts.app')
@section('title', 'Hubungi Kami')

@section('content')
    <div class="page-header bg-light py-5">
        <div class="container">
            <div class="text-center" data-aos="fade-in">
                <h1 class="fw-bold">Hubungi Kami</h1>
                <p class="lead text-muted">Kami siap mendengar dari Anda. Jangan ragu untuk menghubungi kami.</p>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-4 justify-content-center"> {{-- g-4 for more gutter, justify-content-center to center the cards --}}
            <div class="col-md-8 col-lg-6 text-center mb-4" data-aos="fade-up"> {{-- Adjusted column for introductory text --}}
                <h3 class="fw-semibold mb-3">Informasi Kontak Kami</h3>
                <p class="text-muted">Kunjungi showroom kami atau hubungi kami melalui detail di bawah ini. Kami akan dengan
                    senang hati membantu Anda.</p>
            </div>
        </div>

        <div class="row g-4 justify-content-center"> {{-- Row to hold the contact cards --}}
            {{-- Card for Alamat --}}
            <div class="col-sm-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-primary text-white mx-auto mb-3">
                            <i class="bi bi-geo-alt-fill fs-3"></i>
                        </div>
                        <h5 class="card-title fw-semibold mb-2">Alamat</h5>
                        <p class="card-text text-muted">Jl. Letjen M.T. Haryono No.11, RW.6, Bidara Cina, Kecamatan
                            Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13330</p>
                    </div>
                </div>
            </div>

            {{-- Card for Telepon --}}
            <div class="col-sm-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-primary text-white mx-auto mb-3">
                            <i class="bi bi-telephone-fill fs-3"></i>
                        </div>
                        <h5 class="card-title fw-semibold mb-2">Telepon</h5>
                        <p class="card-text text-muted">(021) 123-4567</p>
                    </div>
                </div>
            </div>

            {{-- Card for Email --}}
            <div class="col-sm-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-primary text-white mx-auto mb-3">
                            <i class="bi bi-envelope-fill fs-3"></i>
                        </div>
                        <h5 class="card-title fw-semibold mb-2">Email</h5>
                        <p class="card-text text-muted">info@Indomobil Prima.test</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom CSS for icon circles (add this to your main CSS file or a style block) --}}
    <style>
        .icon-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
    </style>
@endsection

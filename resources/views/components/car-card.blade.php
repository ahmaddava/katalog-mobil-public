<div class="col h-100" data-aos="fade-up" data-aos-delay="100">
    <div class="card h-100 shadow border-0 rounded-4 overflow-hidden card-hover-effect">
        {{-- Image Wrapper with Aspect Ratio --}}
        <div class="position-relative overflow-hidden" style="padding-top: 65%;"> {{-- Aspect Ratio 16:10 roughly --}}
            <a href="{{ route('car.detail', $car) }}" class="text-decoration-none">
                @if (!empty($car->image) && is_array($car->image))
                    @php
                        $imageUrl = $car->image[0];
                        if (!str_starts_with($imageUrl, 'http://') && !str_starts_with($imageUrl, 'https://')) {
                            $imageUrl = Storage::url($imageUrl);
                        }
                    @endphp
                    <img src="{{ $imageUrl }}" 
                         class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover transition-transform"
                         alt="{{ $car->name }}"
                         style="object-fit: cover; object-position: center;">
                @else
                    <img src="https://via.placeholder.com/400x250/e9ecef/6c757d?text={{ urlencode($car->brand) }}" 
                         class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
                         alt="{{ $car->name }}">
                @endif
                
                {{-- Overlay on Hover --}}
                <div class="card-img-overlay d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0 hover-opacity-100 transition-opacity">
                    <span class="btn btn-light rounded-pill fw-bold btn-sm">
                        <i class="bi bi-eye me-1"></i> Lihat Detail
                    </span>
                </div>
            </a>
            
            {{-- Year Badge --}}
            <span class="position-absolute top-0 end-0 m-3 badge bg-white text-dark shadow-sm rounded-pill px-3 py-2">
                <i class="bi bi-calendar3 text-primary me-1"></i> {{ $car->year }}
            </span>
        </div>

        {{-- Card Body --}}
        <div class="card-body p-4 d-flex flex-column">
            {{-- Brand & Name --}}
            <div class="mb-3">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill mb-2 small text-uppercase fw-bold">
                    {{ $car->brand }}
                </span>
                <h5 class="card-title fw-bold text-dark mb-0 text-truncate" title="{{ $car->name }}">
                    <a href="{{ route('car.detail', $car) }}" class="text-decoration-none text-dark stretched-link">
                        {{ $car->name }}
                    </a>
                </h5>
            </div>

            {{-- Price --}}
            <div class="mb-4">
                <p class="text-muted small mb-1">Harga OTR</p>
                <h4 class="fw-bold text-primary mb-0">Rp {{ number_format($car->price, 0, ',', '.') }}</h4>
            </div>

            {{-- Divider --}}
            <hr class="my-0 mb-3 opacity-10">

            {{-- Specs Grid --}}
            <div class="row g-2 mt-auto text-muted small">
                <div class="col-6 d-flex align-items-center" title="Transmisi">
                    <i class="bi bi-gear-wide-connected text-secondary me-2 fs-6"></i>
                    <span class="text-truncate">{{ $car->transmission }}</span>
                </div>
                <div class="col-6 d-flex align-items-center" title="Bahan Bakar">
                    <i class="bi bi-fuel-pump-fill text-secondary me-2 fs-6"></i>
                    <span class="text-truncate">{{ $car->fuel_type }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

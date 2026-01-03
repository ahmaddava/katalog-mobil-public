<div class="container py-5">
    <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold display-5">Jelajahi Koleksi Kami</h2>
        <p class="lead text-muted">Gunakan filter untuk menemukan mobil yang paling sesuai untuk Anda.</p>
    </div>

    <div class="filter-section card p-4 shadow-sm mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4 align-items-center">
            
            <div class="col-12 col-lg-6">
                <label class="form-label fw-semibold text-muted mb-2">Filter berdasarkan Merek:</label>
                <div class="d-flex flex-wrap gap-2" role="group" aria-label="Filter Merek">
                    <button wire:click="filterByBrand('')" type="button" class="btn btn-sm {{ $brand == '' ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill px-3 py-2">Semua</button>
                    @foreach($brands as $brandOption)
                    <button wire:click="filterByBrand('{{ $brandOption }}')" type="button" class="btn btn-sm {{ $brand == $brandOption ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill px-3 py-2">{{ $brandOption }}</button>
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="row g-3">
                    <div class="col-12 col-md-7">
                        <label class="form-label fw-semibold text-muted mb-2">Cari Model:</label>
                        <input wire:model.live.debounce.300ms="search" type="text" class="form-control rounded-pill px-3 py-2" placeholder="cth: Avanza, CR-V...">
                    </div>
                    <div class="col-12 col-md-5">
                        <label class="form-label fw-semibold text-muted mb-2">Urutkan:</label>
                        <select wire:model.live="sort" class="form-select rounded-pill px-3 py-2">
                            <option value="latest">Terbaru</option>
                            <option value="price_asc">Harga Terendah</option>
                            <option value="price_desc">Harga Tertinggi</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
        <div wire:loading.grid wire:target="search,brand,sort" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @for ($i = 0; $i < 6; $i++)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 skeleton-card" aria-hidden="true">
                    <div class="skeleton-image"></div>
                    <div class="card-body">
                        <div class="skeleton-text" style="width: 80%;"></div>
                        <div class="skeleton-text mt-2" style="width: 50%;"></div>
                        <div class="skeleton-text mt-3" style="width: 100%;"></div>
                        <div class="skeleton-text mt-1" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <div wire:loading.remove class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($cars as $car)
                <div class="col" data-aos="fade-up" data-aos-delay="{{ ($loop->iteration % 3) * 100 }}">
                    <x-car-card :car="$car" />
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5 empty-state" data-aos="fade-in">
                        <img src="https://www.svgrepo.com/show/493549/search-car.svg" alt="Mobil tidak ditemukan" width="120" class="mb-3 opacity-75">
                        <h4 class="fw-semibold text-muted">Oops! Mobil Tidak Ditemukan</h4>
                        <p class="text-secondary">Coba ubah kriteria pencarian atau filter merek Anda.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    
    <div class="mt-5 d-flex justify-content-center" wire:loading.remove>
        {{ $cars->links() }}
    </div>
</div>
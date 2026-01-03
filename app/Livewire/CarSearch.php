<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

class CarSearch extends Component
{
    use WithPagination;

    public string $search = '';
    public string $brand = '';
    public string $sort = 'latest';

    public function filterByBrand($brand)
    {
        $this->brand = ($this->brand == $brand) ? '' : $brand;
        $this->resetPage();
    }

    public function render()
    {
        $cars = Car::query()
            ->when($this->search, fn ($q, $s) => $q->where('name', 'like', '%' . $s . '%'))
            ->when($this->brand, fn ($q, $b) => $q->where('brand', $b))
            ->when($this->sort === 'latest', fn ($q) => $q->latest())
            ->when($this->sort === 'price_asc', fn ($q) => $q->orderBy('price', 'asc'))
            ->when($this->sort === 'price_desc', fn ($q) => $q->orderBy('price', 'desc'))
            ->paginate(9); // Tampilkan 9 mobil per halaman

        $brands = Car::select('brand')->distinct()->orderBy('brand')->pluck('brand');

        return view('livewire.car-search', [
            'cars' => $cars,
            'brands' => $brands,
        ]);
    }

    public function updatingSearch() { $this->resetPage(); }
    public function updatingBrand() { $this->resetPage(); }
    public function updatingSort() { $this->resetPage(); }
}
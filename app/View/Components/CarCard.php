<?php

namespace App\View\Components;

use App\Models\Car; // <-- PENTING: Jangan lupa impor model Car
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarCard extends Component
{
    /**
     * Create a new component instance.
     *
     * Di sini kita memberitahu komponen untuk 'menangkap'
     * data $car yang dikirimkan kepadanya.
     */
    public function __construct(
        public Car $car
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.car-card');
    }
}
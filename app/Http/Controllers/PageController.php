<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Halaman utama (hanya menampilkan mobil unggulan)
    public function home()
    {
        $featuredCars = Car::latest()->take(6)->get();
        return view('pages.home', ['cars' => $featuredCars]);
    }

    // Halaman untuk menampilkan semua mobil (akan menggunakan Livewire)
    public function cars()
    {
        return view('pages.cars');
    }

    // Halaman detail mobil
    public function carDetail(Car $car)
    {
        return view('pages.car-detail', compact('car'));
    }

    // Halaman tentang kami
    public function about()
    {
        return view('pages.about');
    }

    // Halaman kontak
    public function contact()
    {
        return view('pages.contact');
    }
}
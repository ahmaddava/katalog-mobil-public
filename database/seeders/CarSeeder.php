<?php
// database/seeders/CarSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run()
    {
        Car::truncate();

        $carsData = [
            [
                'name' => 'Avanza G 1.5',
                'brand' => 'Toyota',
                'year' => 2023,
                'price' => 255000000,
                'transmission' => 'Automatic',
                'fuel_type' => 'Bensin',
                'engine_capacity' => 1500,
                'description' => 'Mobil keluarga andalan dengan efisiensi bahan bakar yang baik dan kabin luas.',
                'image' => [
                    "https://placehold.co/800x500/0d6efd/ffffff?text=Avanza+Front",
                    "https://placehold.co/800x500/6c757d/ffffff?text=Avanza+Side",
                    "https://placehold.co/800x500/343a40/ffffff?text=Avanza+Interior"
                ],
            ],
            [
                'name' => 'Kijang Innova Zenix V',
                'brand' => 'Toyota',
                'year' => 2024,
                'price' => 470000000,
                'transmission' => 'Automatic',
                'fuel_type' => 'Bensin',
                'engine_capacity' => 2000,
                'description' => 'MPV premium dengan kenyamanan superior dan teknologi canggih.',
                'image' => [
                    "https://placehold.co/800x500/0d6efd/ffffff?text=Innova+Zenix+Front",
                    "https://placehold.co/800x500/6c757d/ffffff?text=Innova+Zenix+Side",
                    "https://placehold.co/800x500/343a40/ffffff?text=Innova+Zenix+Interior"
                ],
            ],
            [
                'name' => 'Fortuner GR Sport',
                'brand' => 'Toyota',
                'year' => 2023,
                'price' => 640000000,
                'transmission' => 'Automatic',
                'fuel_type' => 'Diesel',
                'engine_capacity' => 2800,
                'description' => 'SUV tangguh dengan desain sporty dan performa mesin diesel yang bertenaga.',
                'image' => [
                    "https://placehold.co/800x500/0d6efd/ffffff?text=Fortuner+GR+Front",
                    "https://placehold.co/800x500/6c757d/ffffff?text=Fortuner+GR+Side",
                    "https://placehold.co/800x500/343a40/ffffff?text=Fortuner+GR+Interior"
                ],
            ],
            [
                'name' => 'HR-V SE',
                'brand' => 'Honda',
                'year' => 2023,
                'price' => 410000000,
                'transmission' => 'Automatic',
                'fuel_type' => 'Bensin',
                'engine_capacity' => 1500,
                'description' => 'SUV Crossover dengan desain futuristik dan interior premium.',
                'image' => [
                    "https://placehold.co/800x500/0d6efd/ffffff?text=HR-V+Front",
                    "https://placehold.co/800x500/6c757d/ffffff?text=HR-V+Side",
                    "https://placehold.co/800x500/343a40/ffffff?text=HR-V+Interior"
                ],
            ],
            [
                'name' => 'Pajero Sport Dakar Ultimate',
                'brand' => 'Mitsubishi',
                'year' => 2023,
                'price' => 735000000,
                'transmission' => 'Automatic',
                'fuel_type' => 'Diesel',
                'engine_capacity' => 2400,
                'description' => 'SUV premium yang memadukan ketangguhan, kemewahan, dan teknologi.',
                'image' => [
                    "https://placehold.co/800x500/0d6efd/ffffff?text=Pajero+Sport+Front",
                    "https://placehold.co/800x500/6c757d/ffffff?text=Pajero+Sport+Side",
                    "https://placehold.co/800x500/343a40/ffffff?text=Pajero+Sport+Interior"
                ],
            ],
            [
                'name' => 'Xpander Ultimate',
                'brand' => 'Mitsubishi',
                'year' => 2024,
                'price' => 312000000,
                'transmission' => 'Automatic',
                'fuel_type' => 'Bensin',
                'engine_capacity' => 1500,
                'description' => 'Low MPV dengan desain futuristik dan suspensi yang sangat nyaman.',
                'image' => [
                    "https://placehold.co/800x500/0d6efd/ffffff?text=Xpander+Front",
                    "https://placehold.co/800x500/6c757d/ffffff?text=Xpander+Side",
                    "https://placehold.co/800x500/343a40/ffffff?text=Xpander+Interior"
                ],
            ],
            [
                'name' => 'Creta Prime',
                'brand' => 'Hyundai',
                'year' => 2023,
                'price' => 410000000,
                'transmission' => 'Automatic',
                'fuel_type' => 'Bensin',
                'engine_capacity' => 1500,
                'description' => 'SUV dengan desain futuristik, parametric jewel grille, dan fitur canggih Bluelink.',
                'image' => [
                    "https://placehold.co/800x500/0d6efd/ffffff?text=Creta+Front",
                    "https://placehold.co/800x500/6c757d/ffffff?text=Creta+Side",
                    "https://placehold.co/800x500/343a40/ffffff?text=Creta+Interior"
                ],
            ],
            [
                'name' => 'Ioniq 5 Prime',
                'brand' => 'Hyundai',
                'year' => 2023,
                'price' => 780000000,
                'transmission' => 'Automatic',
                'fuel_type' => 'Listrik',
                'engine_capacity' => 0,
                'description' => 'Mobil listrik murni dengan desain revolusioner dan platform E-GMP.',
                'image' => [
                    "https://placehold.co/800x500/0d6efd/ffffff?text=Ioniq+5+Front",
                    "https://placehold.co/800x500/6c757d/ffffff?text=Ioniq+5+Side",
                    "https://placehold.co/800x500/343a40/ffffff?text=Ioniq+5+Interior"
                ],
            ],
        ];

        foreach ($carsData as $car) {
            // Gunakan create agar casting 'image' ke JSON berjalan otomatis
            Car::create($car);
        }
    }
}

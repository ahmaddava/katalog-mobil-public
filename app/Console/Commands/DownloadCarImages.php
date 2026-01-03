<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Models\Car;

class DownloadCarImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-car-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download car images from URLs specified in the seeder and update the database paths.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Memulai proses unduh gambar mobil...');

        $cars = Car::all();
        if ($cars->isEmpty()) {
            $this->warn('Tidak ada data mobil di database. Silakan jalankan seeder terlebih dahulu.');
            return 1; // Keluar jika tidak ada data
        }

        // Buat progress bar untuk visualisasi
        $progressBar = $this->output->createProgressBar($cars->count());

        foreach ($cars as $car) {
            // Memastikan kolom 'image' adalah array dan tidak kosong
            if (is_array($car->image) && !empty($car->image)) {
                $localPaths = [];
                // Membuat nama folder yang aman dari nama mobil (contoh: 'Avanza G 1.5' -> 'avanza-g-1-5')
                $carNameSlug = strtolower(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\s-]/', '', $car->name)));

                foreach ($car->image as $index => $url) {
                    // Memastikan URL valid sebelum mencoba mengunduh
                    if (filter_var($url, FILTER_VALIDATE_URL)) {
                        try {
                            // Mengunduh konten gambar tanpa verifikasi SSL
                            $contents = Http::withoutVerifying()->timeout(30)->get($url)->body();

                            // Mendapatkan ekstensi file dari URL atau default ke 'jpg'
                            $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';

                            // Membuat path penyimpanan: images/cars/nama-mobil-slug/1.jpg
                            $path = "images/cars/{$carNameSlug}/" . ($index + 1) . ".{$extension}";

                            // Simpan file ke storage/app/public/
                            Storage::disk('public')->put($path, $contents);

                            // Kumpulkan path lokal yang berhasil disimpan
                            $localPaths[] = $path;
                        } catch (\Exception $e) {
                            $this->error("\n Gagal mengunduh: {$url} | Error: " . $e->getMessage());
                        }
                    }
                }

                // Update kolom 'image' di database dengan path lokal yang baru jika ada gambar yang berhasil diunduh
                if (!empty($localPaths)) {
                    $car->image = $localPaths;
                    $car->save();
                }
            }
            $progressBar->advance(); // Lanjutkan progress bar
        }

        $progressBar->finish();
        $this->info("\n✅ Proses unduh dan update path gambar selesai!");
        return 0; // Selesai dengan sukses
    }
}

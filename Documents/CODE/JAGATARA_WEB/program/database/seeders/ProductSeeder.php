<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Suku/Susu Jagung Manis',
                'name' => 'Susu Jagung Manis',
                'slug' => 'susu-jagung-manis',
                'category' => 'Pangan Olahan',
                'description' => 'Susu jagung manis segar bernutrisi tinggi, diproses secara steril dari biji jagung manis pilihan Desa Rowokangkung. Tanpa pemanis buatan dan bahan pengawet.',
                'price' => 10000.00,
                'image' => 'susu_jagung.jpg',
                'zero_waste_source' => 'Biji Jagung Utama',
            ],
            [
                'name' => 'Biofoam Jagung',
                'slug' => 'biofoam-jagung',
                'category' => 'Bio-Material',
                'description' => 'Kemasan ramah lingkungan (biodegradable packaging) yang dibuat dari pati jagung dan serat klobot jagung. Mudah terurai di alam dalam waktu singkat sebagai alternatif styrofoam.',
                'price' => 5000.00,
                'image' => 'biofoam_jagung.jpg',
                'zero_waste_source' => 'Kulit & Ampas Tongkol Jagung',
            ],
            [
                'name' => 'Abon Gurami Premium',
                'slug' => 'abon-gurami-premium',
                'category' => 'Pangan Olahan',
                'description' => 'Abon gurami olahan dengan rasa rempah tradisional Lumajang. Tinggi protein, bergizi tinggi, rendah kolesterol, dan bebas pengawet kimiawi.',
                'price' => 35000.00,
                'image' => 'abon_gurami.jpg',
                'zero_waste_source' => 'Daging Utama Gurami',
            ],
            [
                'name' => 'Bakso Gurami Sehat',
                'slug' => 'bakso-gurami-sehat',
                'category' => 'Pangan Olahan',
                'description' => 'Bakso kenyal lezat terbuat dari daging ikan gurami segar pilihan. Diolah higienis dan dicampur dengan bumbu rempah alami tanpa tambahan MSG berlebih.',
                'price' => 20000.00,
                'image' => 'bakso_gurami.jpg',
                'zero_waste_source' => 'Daging Utama Gurami',
            ],
            [
                'name' => 'Pellet Pakan Kelinci Kangkung',
                'slug' => 'pellet-pakan-kelinci-kangkung',
                'category' => 'Pakan Ternak',
                'description' => 'Pakan pelet padat kaya serat kasar dan vitamin untuk kelinci serta hewan pengerat, diproduksi dari batang kangkung yang dikeringkan dan digiling halus.',
                'price' => 15000.00,
                'image' => 'pakan_kangkung.jpg',
                'zero_waste_source' => 'Batang & Serat Kasar Kangkung',
            ],
            [
                'name' => 'Mi Kangkung Kering',
                'slug' => 'mi-kangkung-kering',
                'category' => 'Pangan Olahan',
                'description' => 'Mi instan kering organik berwarna hijau alami yang dibuat dari ekstrak sari daun kangkung segar. Rendah gluten, kaya zat besi, dan serat sayuran.',
                'price' => 12000.00,
                'image' => 'mi_kangkung.jpg',
                'zero_waste_source' => 'Sari Daun Kangkung',
            ],
            [
                'name' => 'Pupuk Organik Cair (POC) Kotoran Gurami',
                'slug' => 'poc-kotoran-gurami',
                'category' => 'Pupuk & Pembenah Tanah',
                'description' => 'Pupuk organik cair konsentrasi tinggi hasil fermentasi anaerobik kotoran ikan gurami dan endapan kolam budidaya. Sangat baik untuk merangsang pertumbuhan vegetatif tanaman hortikultura.',
                'price' => 25000.00,
                'image' => 'poc_kotoran_gurami.jpg',
                'zero_waste_source' => 'Kotoran & Endapan Kolam Gurami',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}

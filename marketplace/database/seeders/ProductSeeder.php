<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Wireless Headphones',
                'image' => 'https://picsum.photos/300/200?random=1',
                'price' => 120.50,
                'stock' => 25,
                'description' => 'Premium wireless headphones with noise cancellation and rich bass.',
            ],
            [
                'name' => 'Smartwatch Pro',
                'image' => 'https://picsum.photos/300/200?random=2',
                'price' => 250.00,
                'stock' => 15,
                'description' => 'Smartwatch with heart rate monitor, GPS, and fitness tracking.',
            ],
            [
                'name' => 'Gaming Mouse RGB',
                'image' => 'https://picsum.photos/300/200?random=3',
                'price' => 49.99,
                'stock' => 40,
                'description' => 'Ergonomic RGB gaming mouse with adjustable DPI settings.',
            ],
            [
                'name' => 'Bluetooth Speaker',
                'image' => 'https://picsum.photos/300/200?random=4',
                'price' => 75.00,
                'stock' => 30,
                'description' => 'Portable Bluetooth speaker with waterproof design.',
            ],
            [
                'name' => '4K Action Camera',
                'image' => 'https://picsum.photos/300/200?random=5',
                'price' => 199.99,
                'stock' => 10,
                'description' => 'Compact 4K action camera with wide-angle lens.',
            ],
            [
                'name' => 'Mechanical Keyboard',
                'image' => 'https://picsum.photos/300/200?random=6',
                'price' => 89.99,
                'stock' => 20,
                'description' => 'RGB backlit mechanical keyboard with blue switches.',
            ],
            [
                'name' => 'Drone X200',
                'image' => 'https://picsum.photos/300/200?random=7',
                'price' => 499.00,
                'stock' => 5,
                'description' => 'High-performance drone with 4K camera and 30 min flight time.',
            ],
        ]);
    }
}


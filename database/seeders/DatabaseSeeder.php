<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::query()->create([
            'name' => 'Роман',
            'surname' => 'Назыров',
            'middle_name' => '',
            'city' => 'Казань',
            'phone_number' => '+79274156060',
            'email' => 'mikeybb@gmail.com',
            'password' => Hash::make('123456'),
            'image_path' => 'images/user-img-default.png',
            'role' => 'admin',
        ]);

        Collection::query()->create([
            'name' => 'Роботы-гуманойды'
        ]);


        Collection::query()->create([
            'name' => 'Запчасти'
        ]);


        Collection::query()->create([
            'name' => 'Манипуляторы'
        ]);


        $id = Product::query()->create([
            'name' => 'RoboThespian Humanoid Robot - Model RT4',
            'text' => 'RoboThespian, the original robot actor and star of the show!

Passersby stop in their tracks. Delegates keep asking for more. Crowds break into rapturous applause. RoboThespian will perform however you wish and capture the attention of anyone, anywhere.

RoboThespian is the product of 15+ years of iteration and innovation by Engineered Arts expert robotics team. Powered by the unique web browser based Tritium operating system, RoboThespian is yours to command remotely from anywhere.

    With a range of expressive movements, speech and songs that can be animated in advance or on the go, RoboThespian will create waves of excitement wherever you place them: at your theatre or trade show, on a live panel or TV show, in a room full of executives or an attraction filled with visitors.

    Academics and developers love working with RoboThespian for HRI research and performance based projects due to the versatility of the programming environment',

            'quantity' => 2,
            'price' => 349000,
            'is_published' => true,
            'collection_id' => 3
        ]);

        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/1.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/2.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/3.webp'
        ]);

        $id = Product::query()->create([
            'name' => 'RoboThespian Humanoid Robot - Model RT4',
            'text' => 'RoboThespian, the original robot actor and star of the show!

Passersby stop in their tracks. Delegates keep asking for more. Crowds break into rapturous applause. RoboThespian will perform however you wish and capture the attention of anyone, anywhere.

RoboThespian is the product of 15+ years of iteration and innovation by Engineered Arts expert robotics team. Powered by the unique web browser based Tritium operating system, RoboThespian is yours to command remotely from anywhere.

    With a range of expressive movements, speech and songs that can be animated in advance or on the go, RoboThespian will create waves of excitement wherever you place them: at your theatre or trade show, on a live panel or TV show, in a room full of executives or an attraction filled with visitors.

    Academics and developers love working with RoboThespian for HRI research and performance based projects due to the versatility of the programming environment',

            'quantity' => 2,
            'price' => 349000,
            'is_published' => true,
            'collection_id' => 1
        ]);

        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/4.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/5.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/6.webp'
        ]);
    }
}

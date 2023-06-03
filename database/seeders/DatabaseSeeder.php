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
        // Сидер пользователей
        User::query()->create([
            'name' => 'Роман',
            'surname' => 'Назыров',
            'middle_name' => '',
            'city' => 'Казань',
            'phone_number' => '+79274156060',
            'email' => 'rossoroma@mail.ru',
            'password' => Hash::make('admin2001'),
            'image_path' => 'public/images/user-img-default.png',
            'role' => 'admin',
        ]);
        User::query()->create([
            'name' => 'Сол',
            'surname' => 'Гудман',
            'middle_name' => '',
            'city' => 'Сисеро',
            'phone_number' => '1-505-842-5662',
            'email' => 'saulgoodman@bcs.com',
            'password' => Hash::make('654321'),
            'image_path' => 'public/images/saul.jpg',
            'role' => 'user',
        ]);
        User::query()->create([
            'name' => 'Уолтер',
            'surname' => 'Уайт',
            'middle_name' => 'Хартвелл',
            'city' => 'Альбукерке',
            'phone_number' => '1-505-842-5662',
            'email' => 'walterhwhite@bb.com',
            'password' => Hash::make('123456'),
            'image_path' => 'public/images/user-img-default.png',
            'role' => 'user',
        ]);


        // Сидер категорий
        Collection::query()->create([
            'name' => 'Роботы-гуманоиды',
            'image_path' => 'public/images/humanoids.jpg'
        ]);
        Collection::query()->create([
            'name' => 'Транспортные платформы',
            'image_path' => 'public/images/transports.jpg'
        ]);
        Collection::query()->create([
            'name' => 'Манипуляторы',
            'image_path' => 'public/images/manipulators.jpg'
        ]);
        Collection::query()->create([
            'name' => 'Роботы для дома',
            'image_path' => 'public/images/domrobots.webp'
        ]);
        Collection::query()->create([
            'name' => 'Запчасти',
            'image_path' => 'public/images/details.jpg'
        ]);


        // Сидер продуктов
        $id = Product::query()->create([
            'name' => 'RoboThespian Humanoid Robot - Model RT4',
            'text' => 'RoboThespian, the original robot actor and star of the show!
                    Passersby stop in their tracks. Delegates keep asking for more.
                    Crowds break into rapturous applause. RoboThespian will perform
                    however you wish and capture the attention of anyone, anywhere.
                    RoboThespian is the product of 15+ years of iteration and innovation
                    by Engineered Arts expert robotics team. Powered by the unique web
                    browser based Tritium operating system, RoboThespian is yours to
                    command remotely from anywhere.
                    With a range of expressive movements, speech and songs that can
                    be animated in advance or on the go, RoboThespian will create waves
                    of excitement wherever you place them: at your theatre or trade show,
                    on a live panel or TV show, in a room full of executives or an
                    attraction filled with visitors.
                    Academics and developers love working with RoboThespian for HRI
                    research and performance based projects due to the versatility of
                    the programming environment',
            'quantity' => 86,
            'price' => 1900000,
            'is_published' => true,
            'collection_id' => 1
        ]);

        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/item1.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/item2.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/item3.webp'
        ]);

        $id = Product::query()->create([
            'name' => 'Dr. Robot Jaguar V6 Tracked Mobile Platform w/ Arm',
            'text' => 'The Dr. Robot Jaguar V6 Tracked Mobile Platform w/
             Arm is designed for indoor and outdoor applications requiring
              robust maneuverability, terrain maneuverability and object
              manipulation. It comes with four articulated arms and is
              fully wirelessly 802.11N connected. It integrates outdoor
              GPS and 9 DOF IMU (Gyro/Accelerometer/ Compass) for
              autonomous navigation. Jaguar V6 with Manipulator Arm
              platform is rugged, compact, weather and water resistant.
              It is designed for extreme terrains and capable of stair or
               vertical climbing up to 300mm with ease. The 4 articulated
                arms could convert the robot into various optimal
                 navigation configurations to overcome different terrain
                  challenges. The integrated high resolution video/audio
                  and optional laser scanner provide remote operator
                  detail information of the surrounding. Besides the
                  ready to use control and navigation software, a full
                  development kit including SDK, data protocol and sample
                   codes, is also available. This rugged 5+1DOF robotic
                   arm (Jaguar Arm Plus) is specially designed for
                   compact and medium mobile robots that demand higher
                    DOF, longer reach and larger payload capacity. It is
                    light on weight, low on power consumption and compact
                    on size. It has 5 DOF + 1 DOF gripper, with maximum
                    reach of over 1070 mm (42 in), max payload capacity
                    of 10Kg at max reach, while weights under 15Kg. Wrist
                     mounted color video camera (Option) provides high
                     resolution (640x480) close-up view. Jaguar Arm is
                     ideal for object inspection and handling.',
            'quantity' => 72,
            'price' => 700000,
            'is_published' => true,
            'collection_id' => 2
        ]);

        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/item4.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/item5.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/item6.webp'
        ]);
    }
}

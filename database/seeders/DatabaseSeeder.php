<?php

namespace Database\Seeders;

 use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'middle_name' => 'z',
            'city' => 'Сисеро',
            'phone_number' => '1-505-842-5662',
            'email' => 'saulgoodman@bcs.com',
            'password' => Hash::make('654321'),
            'image_path' => 'public/images/saul.jpg',
            'role' => 'user',
        ]);


//         Сидер категорий
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
            'price' => 110600,
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
            'price' => 70000,
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


        $id = Product::query()->create([
            'name' => 'Sabertooth Dual 12A 6V-24V R/C Regenerative Motor Driver',
            'text' => 'Sabertooth Dual 12A 6V-24V R/C Regenerative Motor Driver
            is a dual motor driver specifically optimized for use in radio controlled
             vehicles. It is suitable for medium powered robots, cars and boats.
             The Sabertooth 2x12 R/C replaces our 2x10 RC controller.
             Out of the box, it can supply two DC brushed motors with up to 12A each.
             Peak currents of 25A are achievable for a few seconds. Overcurrent and
             thermal protection means youll never have to worry about killing the driver
              with accidental stalls or by hooking up too big a motor. This special R/C
              edition of our motor driver comes with options for exponential control,
              autocalibration and built-in mixing. The operating mode is set with the onboard
              DIP switches so there are no jumpers to lose.
    Sabertooth is the first synchronous regenerative motor driver in its class.
    The regenerative topology means that your batteries get recharged whenever you
    command your robot to slow down or reverse. Sabertooth also allows you to make very
    fast stops and reverses - giving your vehicle a quick and nimble edge. Sabertooth has
    a built in 5V Switching BEC that can provide power to a microcontroller or R/C receiver
    and a servo or two. The lithium cutoff mode allows Sabertooth to operate safely with lithium
    ion and lithium polymer battery packs - the highest energy density batteries available.',
            'quantity' => 10,
            'price' => 5480,
            'is_published' => true,
            'collection_id' => 5
        ]);

        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/sabertooth-detail-1.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/sabertooth-detail-2.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/sabertooth-detail-3.webp'
        ]);

        $id = Product::query()->create([
            'name' => 'Reach Robotics Bravo 7 Standard Underwater Manipulator',
            'text' => 'The Blueprint Bravo 7 Standard Underwater Manipulator is a 7-Function
            manipulator that opens up new compact inspection and intervention opportunities
            for service providers, researchers, and other operators. The Reach Bravo series is a range
            of tough, electric, lightweight manipulators changing the remote operations landscape for
            inspection class vehicles. Designed to conduct tasks usually reserved for human divers,
            the arm’s dexterity and responsiveness pave the way for advanced applications. The form factor
            was specifically designed for industry-leading inspection-class ROVs making it a ready-to-go
            option for existing fleets. Adjustable grab force - pick up a sea urchin or cut a cable.',
            'quantity' => 15,
            'price' => 205480,
            'is_published' => true,
            'collection_id' => 3
        ]);

        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/bravo-manpul-1.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/bravo-manpul-2.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/bravo-manpul-3.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/bravo-manpul-4.webp'
        ]);


        $id = Product::query()->create([
            'name' => 'Clearpath Robotics TurtleBot 4 Lite Mobile Robot',
            'text' => 'The Clearpath Robotics TurtleBot 4 Lite Mobile Robot is the next-generation robotic
            platform for learning the Robot Operating System (ROS). With better sensors, more computing power
            and support for ROS 2, TurtleBot 4 aims to build on the success of previous versions by providing
            a low-cost and fully-extensible reference platform for robotics researchers, developers and educators.
The TurtleBot 4 Lite is equipped with an iRobot® Create3 mobile base, a powerful Raspberry Pi 4 running ROS 2,
2D LiDAR and more. All components have been seamlessly integrated to deliver an out-of-the-box development and
learning platform.
It features an OAK-D-Lite 4K RGB autofocus camera.',
            'quantity' => 200,
            'price' => 100236,
            'is_published' => true,
            'collection_id' => 4
        ]);

        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/turtle-domrobots-1.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/turtle-domrobots-2.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/turtle-domrobots-3.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/turtle-domrobots-4.webp'
        ]);
        ProductImage::query()->create([
            'product_id' => $id->id,
            'image_path' => 'public/images/turtle-domrobots-5.webp'
        ]);
    }
}

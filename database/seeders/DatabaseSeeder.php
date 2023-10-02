<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Dzikry Aji Santoso',
            'email' => 'dzikryaji@test.com',
            'password' => bcrypt('password')
        ]);

        Product::create([
            'name' => 'Carrot',
            'category' => 'Vegetable',
            'stock' => 20,
            'price' => 0.75,
            'description' => "<p>Are you looking for a simple yet incredibly healthy addition to your diet? Look no further than the humble carrot! These vibrant orange wonders offer a plethora of benefits that make them a must-have in your kitchen.
            </p>
            <p>and well-being. Whether you're a health-conscious individual, a busy parent looking for nutritious snacks for your family, or someone who simply enjoys great-tasting food, carrots are a must-have in your daily routine. Make the smart choice for your health and add the vibrant goodness of carrots to your life today!</p>
            <p>This selling argument highlights the numerous health benefits, versatility, accessibility, and eco-friendliness of carrots to make a convincing case for their inclusion in one's diet.</p>",
            'imagesrc' => 'carrot'
        ]);

        Product::create([
            'name' => 'Apple',
            'category' => 'Fruit',
            'stock' => 20,
            'price' => 1.00,
            'description' => "<p>Are you in search of a wholesome and delicious snack that offers a wide range of benefits for your health and well-being? Look no further than the simple yet remarkable apple. These crisp and juicy fruits are not only a delight to your taste buds but also a treasure trove of health advantages.
            </p>
            <p>Whether you're a health enthusiast, a parent looking for nutritious snacks for your family, or someone who simply enjoys the delightful taste of fresh fruit, apples are an ideal choice. They offer a winning combination of health benefits, convenience, and deliciousness that makes them the ultimate snack. Make the healthy choice today - bite into the goodness of apples and savor a healthier, happier you!</p>",
            'imagesrc' => 'apple'
        ]);

        Product::create([
            'name' => 'Chili',
            'category' => 'Fruit',
            'stock' => 20,
            'price' => 2.00,
            'description' => "<p>When it comes to enhancing the flavor of your food, there's one spice that stands above the rest - pepper. This humble yet indispensable seasoning is not only a kitchen essential but also a culinary superstar that can transform your dishes in countless ways.
            </p>
            <p>Pepper is more than just a spice; it's a flavor revolution waiting to happen in your kitchen. Its versatility, health benefits, and ability to elevate the taste and aroma of your dishes are unmatched. Whether you're an aspiring chef or simply someone who appreciates delicious food, make pepper a staple in your culinary repertoire. Elevate your meals with the magic of pepper, and savor the extraordinary in every bite!</p>",
            'imagesrc' => 'pepper'
        ]);

        Product::create([
            'name' => 'Papaya',
            'category' => 'Fruit',
            'stock' => 20,
            'price' => 0.65,
            'description' => "<p>Imagine having a delicious tropical fruit that not only satisfies your taste buds but also supercharges your health. Enter the papaya, nature's gift from the tropics that's packed with goodness.
            </p>
            <p>Incorporating papaya into your daily routine is like taking a journey to the tropics of health and wellness. Whether you're a health-conscious individual, a culinary explorer, or someone looking to revitalize your life, papaya is your ticket to a vibrant, healthier you. Don't miss out on this tropical delight - savor the goodness of papaya and unlock a world of well-being!</p>",
            'imagesrc' => 'papaya'
        ]);

        Product::create([
            'name' => 'Garlic',
            'category' => 'Vegetable',
            'stock' => 20,
            'price' => 1.25,
            'description' => "<p>Are you looking for a kitchen staple that not only enhances the flavor of your dishes but also offers an array of remarkable health benefits? Look no further than garlic, the unsung hero of your pantry.
            </p>
            <p>Make garlic your culinary ally and health partner. Whether you're a home cook, a food enthusiast, or someone on a quest for better health, garlic's incredible flavor and numerous health benefits make it a kitchen essential. Embrace the magic of garlic, and savor the extraordinary in every meal you prepare</p>",
            'imagesrc' => 'garlic'
        ]);

        Product::create([
            'name' => 'Onion',
            'category' => 'Vegetable',
            'stock' => 20,
            'price' => 0.75,
            'description' => "<p>Are you searching for a kitchen superstar that can elevate the taste of your meals while providing a host of health benefits? Look no further than the humble onion, a versatile and indispensable ingredient that deserves a place in every pantry.
            </p>
            <p>Whether you're a seasoned chef, a home cook, or simply someone who appreciates flavorful meals and good health, onions are your trusty companions in the kitchen. Embrace the versatility, nutrition, and culinary magic of onions, and transform every dish you create into a masterpiece of taste and wellness!</p>",
            'imagesrc' => 'onion'
        ]);

        Product::create([
            'name' => 'Pineapple',
            'category' => 'Fruit',
            'stock' => 20,
            'price' => 1.00,
            'description' => "<p>Are you in search of a sweet and nutritious delight that not only satisfies your taste buds but also offers a host of health benefits? Look no further than the tropical wonder known as pineapple. This vibrant and juicy fruit is not just a refreshing treat but also a powerful addition to your daily diet.
            </p>
            <p>Whether you're a health-conscious individual, a culinary explorer, or simply someone who enjoys the pleasures of life, pineapple is a delightful choice. Embrace the tropical goodness of pineapple and savor the perfect blend of flavor, nutrition, and refreshment in every juicy bite. Elevate your health and happiness with this tropical treasure!</p>",
            'imagesrc' => 'pineapple'
        ]);

        Product::create([
            'name' => 'Watermelon',
            'category' => 'Fruit',
            'stock' => 20,
            'price' => 2.00,
            'description' => "<p>Are you in pursuit of a delicious and hydrating treat that also offers a plethora of health benefits? Look no further than the luscious watermelon, a quintessential summer delight that's not only incredibly refreshing but also a powerhouse of nutrition.
            </p>
            <p>Embrace the joy of health and hydration with watermelon. Whether you're a health-conscious individual, an athlete seeking post-workout recovery, or someone looking to beat the heat with a delicious and nutritious snack, watermelon is your go-to choice. Savor the natural refreshment and goodness of watermelon, and make it your go-to oasis of health and hydration!</p>",
            'imagesrc' => 'watermelon'
        ]);

        Product::create([
            'name' => 'Broccoli',
            'category' => 'Vegetable',
            'stock' => 20,
            'price' => 1.50,
            'description' => "<p>Are you in search of a versatile and highly nutritious vegetable that can elevate your well-being? Look no further than broccoli, the vibrant green gem of the produce aisle. Broccoli is not just a vegetable; it's a powerhouse of health benefits that should be a regular part of your diet. 
            </p>
            <p>Make broccoli your dietary ally in the journey to a healthier life. Whether you're a health-conscious individual, a parent seeking nutritious options for your family, or someone who simply enjoys great-tasting food, broccoli is a must-have in your daily menu. Embrace the nourishing power of broccoli and savor a healthier, happier you!</p>",
            'imagesrc' => 'broccoli'
        ]);

        Product::create([
            'name' => 'Cabbage',
            'category' => 'Vegetable',
            'stock' => 20,
            'price' => 0.75,
            'description' => "<p>Are you seeking a powerhouse vegetable that can enhance your well-being and elevate your culinary creations? Look no further than cabbage, the unsung hero of the produce section. Cabbage isn't just a vegetable; it's a versatile, budget-friendly superfood that should be at the center of your culinary journey.
            </p>
            <p>Embrace the nutritional power and culinary versatility of cabbage. Whether you're a health-conscious individual, a parent seeking nutritious options for your family, or someone who simply enjoys great-tasting food, cabbage is a must-have in your daily menu. Elevate your meals and nourish your body with the incredible benefits of cabbage!</p>",
            'imagesrc' => 'cabbage'
        ]);

        Product::create([
            'name' => 'Cucumber',
            'category' => 'Vegetable',
            'stock' => 20,
            'price' => 1.00,
            'description' => "<p>Are you looking for a refreshing and healthy addition to your diet that's both versatile and nutritious? Look no further than the humble cucumber, a natural hydrator and nutritional powerhouse that should have a permanent place in your kitchen.
            </p>
            <p>Embrace the cool and crisp goodness of cucumbers. Whether you're a health-conscious individual, a parent seeking nutritious options for your family, or someone who simply appreciates the delightful taste and refreshing nature of cucumbers, make them a regular part of your diet. Enjoy the health and hydration benefits of this versatile superfood, and keep your body cool and refreshed all year round!</p>",
            'imagesrc' => 'cucumber'
        ]);

        Product::create([
            'name' => 'Banana',
            'category' => 'Fruit',
            'stock' => 20,
            'price' => 0.50,
            'description' => "<p>Are you looking for a delicious and nutritious snack that not only satisfies your taste buds but also provides a multitude of health benefits? Look no further than the humble banana, a natural wonder that should have a permanent place in your daily diet.
            </p>
            <p>Embrace the natural goodness and energy-boosting power of bananas. Whether you're a health-conscious individual, an athlete looking for a natural performance enhancer, or someone who simply enjoys great-tasting food, bananas are a must-have in your daily diet. Elevate your energy, health, and happiness with this nutrient-packed superfruit!</p>",
            'imagesrc' => 'banana'
        ]);

        Product::create([
            'name' => 'Eggplant',
            'category' => 'Vegetable',
            'stock' => 20,
            'price' => 0.50,
            'description' => "<p>Are you searching for a vegetable that not only adds depth and flavor to your dishes but also boasts a range of health benefits? Look no further than eggplant, the unsung hero of the vegetable world. Eggplant is more than just a vegetable; it's a versatile, nutrient-packed culinary gem that should have a prominent place in your kitchen
            </p>
            <p>Make eggplant a culinary star in your kitchen. Whether you're a health-conscious individual, a home cook seeking new and exciting recipes, or someone who appreciates the rich, complex flavors of global cuisine, eggplant is a must-have ingredient. Embrace the versatility, nutrition, and culinary magic of eggplant, and savor the extraordinary in every dish you create!</p>",
            'imagesrc' => 'eggplant'
        ]);

        Product::create([
            'name' => 'Melon',
            'category' => 'Fruit',
            'stock' => 20,
            'price' => 1.75,
            'description' => "<p>Melons are renowned for their mouthwatering sweetness and juiciness. They are a perfect natural treat on a hot summer day, offering a refreshing burst of flavor that can instantly quench your thirst and satisfy your sweet cravings.
            </p>
            <p>For health-conscious individuals, melons are an excellent choice as they are low in calories. This means you can enjoy a satisfying and guilt-free snack or dessert without worrying about excess calories.</p>",
            'imagesrc' => 'melon'
        ]);

        Product::create([
            'name' => 'Coconut',
            'category' => 'Fruit',
            'stock' => 20,
            'price' => 2.00,
            'description' => "<p>Coconuts offer a unique tropical flavor and aroma that can transport your taste buds to a paradise getaway. The sweet, nutty taste and delightful scent make coconuts a delightful culinary addition.
            </p>
            <p>Coconuts are also incredibly versatile. You can use them in various forms such as coconut milk, coconut water, coconut oil, and shredded coconut. These versatile ingredients can be incorporated into both sweet and savory dishes, from curries and smoothies to desserts and baked goods.</p>",
            'imagesrc' => 'coconut'
        ]);
    }
}

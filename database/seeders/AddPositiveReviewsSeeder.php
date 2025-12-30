<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class AddPositiveReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'name' => 'Raj Kumar',
                'email' => 'raj.kumar@example.com',
                'message' => 'La Fortuna made our wedding day an unforgettable memory. The decorations, food, and service were all exceptional. The entire family will cherish this day forever. Thank you La Fortuna for creating such a magical experience!',
                'rating' => 5,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'name' => 'Priya Sharma',
                'email' => 'priya.sharma@example.com',
                'message' => 'My daughter\'s birthday party at La Fortuna was absolutely magical. The staff was very professional and friendly. All the guests were impressed with the venue, ambiance, and hospitality. Thank you for such wonderful service!',
                'rating' => 5,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'name' => 'Vikram Patel',
                'email' => 'vikram.patel@example.com',
                'message' => 'La Fortuna proved to be an excellent choice for our corporate event. Large halls, wonderful amenities, and a friendly staff. Everything was perfectly executed and on time. Highly recommended for all your event needs!',
                'rating' => 5,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'name' => 'Anita Verma',
                'email' => 'anita.verma@example.com',
                'message' => 'Our anniversary celebration at La Fortuna was spectacular. The decoration was beautiful, the food was delicious, and the service was impeccable. Every detail was taken care of perfectly. Thank you for making our day so special!',
                'rating' => 5,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'name' => 'Mahesh Tripathi',
                'email' => 'mahesh.tripathi@example.com',
                'message' => 'La Fortuna is a wonderful banquet hall. Our son\'s wedding was held here and everything was perfect. The team\'s dedication and service were truly commendable. A huge thank you to the entire staff for their excellence!',
                'rating' => 5,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'name' => 'Sujata Gupta',
                'email' => 'sujata.gupta@example.com',
                'message' => 'I celebrated my birthday at La Fortuna and I couldn\'t be happier. The ambiance was lovely, the staff was very helpful, and the food was delicious. It was a wonderful experience. I will definitely come back again!',
                'rating' => 5,
                'is_approved' => true,
                'approved_at' => now(),
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}

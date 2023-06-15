<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

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
        Question::create([
            'question' => '1. Pulau Bakut terletak di provinsi mana di Indonesia?',
            'option_a' => 'A. Kalimantan Timur',
            'option_b' => 'B. Kalimantan Barat',
            'option_c' => 'C. Kalimantan Selatan',
            'option_d' => 'D. Kalimantan Tengah',
            'correct_answer' => 'c'
        ]);

        Question::create([
            'question' => '2. Pulau Bakut terletak di laut mana di sekitar Kalimantan?',
            'option_a' => 'A. Laut Sulawesi',
            'option_b' => 'B. Laut Jawa',
            'option_c' => 'C. Laut Bali',
            'option_d' => 'D. Laut Makassar',
            'correct_answer' => 'd'
        ]);

        Question::create([
            'question' => '3. Pulau Bakut terkenal dengan keindahan apa?',
            'option_a' => 'A. Pantai pasir putih',
            'option_b' => 'B. Hutan Mangrove',
            'option_c' => 'C. Pegunungan Tinggi',
            'option_d' => 'D. Air terjun yang indah',
            'correct_answer' => 'b'
        ]);

        Question::create([
            'question' => '4. Pulau Bakut merupakan habitat alami dari hewan langka yang disebut?',
            'option_a' => 'A. Harimau Sumatera',
            'option_b' => 'B. Orangutan',
            'option_c' => 'C. Bekantan',
            'option_d' => 'D. Orangutan',
            'correct_answer' => 'c'
        ]);

        Question::create([
            'question' => '5. Bekantan adalah hewan yang terkenal dengan ciri khas:',
            'option_a' => 'A. Monyet berhidung panjang',
            'option_b' => 'B. Monyet berbulu putih',
            'option_c' => 'C. Monyet berbulu belang',
            'option_d' => 'D. Monyet berwarna cerah',
            'correct_answer' => 'a'
        ]);

        Question::create([
            'question' => '6. Bekantan termasuk dalam keluarga hewan apa?',
            'option_a' => 'A. Keluarga Felidae',
            'option_b' => 'B. Keluarga Ursidae',
            'option_c' => 'C. Keluarga Cercopithecidae',
            'option_d' => 'D. Keluarga Opsiacide',
            'correct_answer' => 'c'
        ]);

        Question::create([
            'question' => '7. Bekantan banyak ditemukan di daerah-daerah yang memiliki ekosistem:',
            'option_a' => 'A. Hutan hujan tropis',
            'option_b' => 'B. Gurun pasir',
            'option_c' => 'C. Padang rumput',
            'option_d' => 'D. Rawa-rawa',
            'correct_answer' => 'a'
        ]);

        Question::create([
            'question' => '8. Bekantan memiliki ekor yang panjang dan berfungsi sebagai:',
            'option_a' => 'A. Alat untuk berenang',
            'option_b' => 'B. Alat untuk memanjat pohon',
            'option_c' => 'C. Alat untuk berkomunikasi',
            'option_d' => 'D. Alat untuk menangkap mangsa',
            'correct_answer' => 'c'
        ]);

        Question::create([
            'question' => '9. Bekantan merupakan hewan yang bersifat:',
            'option_a' => 'A. Karnivora',
            'option_b' => 'B. Herbivora',
            'option_c' => 'C. Omnivora',
            'option_d' => 'D. Insektivora',
            'correct_answer' => 'c'
        ]);

        Question::create([
            'question' => '10. Bekantan terancam punah karena:',
            'option_a' => 'A. Perburuan liar',
            'option_b' => 'B. Perubahan iklim',
            'option_c' => 'C. Kerusakan habitat',
            'option_d' => 'D. Penebangan hutan ilegal',
            'correct_answer' => 'c'
        ]);
        
    }
    }

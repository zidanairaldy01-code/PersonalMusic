<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MusicCard;

class MusicCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        MusicCard::truncate();
        
        $musicCards = [
            // DATA 1 - Menggunakan file yang sudah ada
            [
                'name' => 'Zen Auladi',
                'instagram_username' => 'zen_auladi',
                'notes' => 'Bukan Orang Bener Tapi Beneran Orang.',
                'quotes' => 'Dream Keep Me Alive',
                'photo_path' => '/storage/photos/zen.png',
                'music_path' => '/storage/music/pulang.mp3',
                'song_title' => 'Pulang - -----',
                'order' => 1,
            ],
            
            // DATA 2-10 - Contoh dengan file yang sama (Anda bisa ganti sesuai file Anda)
            [
                'name' => 'Sarah Johnson',
                'instagram_username' => 'sarahjohnson',
                'notes' => 'Musik adalah bahasa universal yang menghubungkan jiwa-jiwa. Setiap nada membawa cerita yang berbeda.',
                'quotes' => 'Music is life itself',
                'photo_path' => '/storage/photos/image.png',
                'music_path' => '/storage/music/YTDown.com_YouTube_Media_J9A3MgXclN0_Pulang_009_128k.mp3.mpeg',
                'song_title' => 'My Favorite Song',
                'order' => 2,
            ],
            [
                'name' => 'Ahmad Rizki',
                'instagram_username' => 'ahmadrizki',
                'notes' => 'Melalui musik, saya menemukan diriku yang sebenarnya. Melodi adalah teman terbaik di setiap perjalanan.',
                'quotes' => 'Find yourself in the rhythm',
                'photo_path' => '/storage/photos/image.png',
                'music_path' => '/storage/music/YTDown.com_YouTube_Media_J9A3MgXclN0_Pulang_009_128k.mp3.mpeg',
                'song_title' => 'Journey of Life',
                'order' => 3,
            ],
            [
                'name' => 'Maya Kusuma',
                'instagram_username' => 'mayakusuma',
                'notes' => 'Bermusik bukan hanya hobi, tetapi cara hidup. Setiap chord membawa emosi yang mendalam.',
                'quotes' => 'Dance to your own beat',
                'photo_path' => '/storage/photos/image.png',
                'music_path' => '/storage/music/YTDown.com_YouTube_Media_J9A3MgXclN0_Pulang_009_128k.mp3.mpeg',
                'song_title' => 'Dance Forever',
                'order' => 4,
            ],
            [
                'name' => 'David Anderson',
                'instagram_username' => 'davidanderson',
                'notes' => 'Music has been my constant companion through all seasons of life. It speaks when words cannot.',
                'quotes' => 'Let the music guide you',
                'photo_path' => '/storage/photos/image.png',
                'music_path' => '/storage/music/YTDown.com_YouTube_Media_J9A3MgXclN0_Pulang_009_128k.mp3.mpeg',
                'song_title' => 'Seasons of Life',
                'order' => 5,
            ],
            [
                'name' => 'Siti Nurhaliza',
                'instagram_username' => 'sitinurhaliza',
                'notes' => 'Menyanyikan lagu adalah cara saya berkomunikasi dengan dunia. Setiap lirik memiliki makna mendalam.',
                'quotes' => 'Sing from the heart',
                'photo_path' => '/storage/photos/image.png',
                'music_path' => '/storage/music/YTDown.com_YouTube_Media_J9A3MgXclN0_Pulang_009_128k.mp3.mpeg',
                'song_title' => 'Cindai',
                'order' => 6,
            ],
            [
                'name' => 'Kevin Martinez',
                'instagram_username' => 'kevinmartinez',
                'notes' => 'The power of music transcends all boundaries. It brings people together in the most beautiful way.',
                'quotes' => 'Music unites us all',
                'photo_path' => '/storage/photos/image.png',
                'music_path' => '/storage/music/YTDown.com_YouTube_Media_J9A3MgXclN0_Pulang_009_128k.mp3.mpeg',
                'song_title' => 'Unity',
                'order' => 7,
            ],
            [
                'name' => 'Ayu Lestari',
                'instagram_username' => 'ayulestari',
                'notes' => 'Dalam setiap nada, ada cerita yang ingin disampaikan. Musik adalah pelarian sempurna dari hiruk pikuk kehidupan.',
                'quotes' => 'Live for the music',
                'photo_path' => '/storage/photos/image.png',
                'music_path' => '/storage/music/YTDown.com_YouTube_Media_J9A3MgXclN0_Pulang_009_128k.mp3.mpeg',
                'song_title' => 'Cerita Hidup',
                'order' => 8,
            ],
            [
                'name' => 'Ryan Thompson',
                'instagram_username' => 'ryanthompson',
                'notes' => 'Every beat, every note, every melody has shaped who I am today. Music is my therapy.',
                'quotes' => 'Feel the music within',
                'photo_path' => '/storage/photos/image.png',
                'music_path' => '/storage/music/YTDown.com_YouTube_Media_J9A3MgXclN0_Pulang_009_128k.mp3.mpeg',
                'song_title' => 'Therapy Sessions',
                'order' => 9,
            ],
            [
                'name' => 'Dina Mariana',
                'instagram_username' => 'dinamariana',
                'notes' => 'Musik mengajarkan saya tentang kehidupan, cinta, dan harapan. Tanpa musik, hidup terasa hambar.',
                'quotes' => 'Music is my passion',
                'photo_path' => '/storage/photos/image.png',
                'music_path' => '/storage/music/YTDown.com_YouTube_Media_J9A3MgXclN0_Pulang_009_128k.mp3.mpeg',
                'song_title' => 'Kasih Sayang',
                'order' => 10,
            ],
        ];

        foreach ($musicCards as $card) {
            MusicCard::create($card);
        }
    }
}

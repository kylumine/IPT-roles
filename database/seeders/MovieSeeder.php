<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            [
                'title' => 'Soul',
                'genre' => 'Comedy, Fantasy',
                'rate_per_day' => '50.00',
                'imageUrl' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSu5QPgNuQCyV7oSlambfGZYO48gYIsbCVboZ62Wpa4-Pfst2Nc'
            ],
            [
                'title' => 'Kingsman: The Secret Service',
                'genre' => 'Action',
                'rate_per_day' => '50.00',
                'imageUrl' => 'https://images.moviesanywhere.com/a0e732eefc3d7071ac59b3b069620e3a/bccc6601-d468-4b73-9a8e-f407bd0be191.jpg'
            ],
            [
                'title' => 'Inside Out',
                'genre' => 'Comedy',
                'rate_per_day' => '100.00',
                'imageUrl' => 'https://m.media-amazon.com/images/M/MV5BOTgxMDQwMDk0OF5BMl5BanBnXkFtZTgwNjU5OTg2NDE@._V1_.jpg'
            ],
            [
                'title' => 'Barbie',
                'genre' => 'Fantasy, Romance',
                'rate_per_day' => '100.00',
                'imageUrl' => 'https://i.ebayimg.com/images/g/2vwAAOSwT0RkveXI/s-l1600.jpg'
            ],

        ];

        foreach($data as $d){
            Movie::create($d);
        }
    }
}

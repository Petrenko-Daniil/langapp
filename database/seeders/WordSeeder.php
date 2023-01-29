<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Word;
use Storage;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $words = json_decode(Storage::disk('local')->get('fifty.json'));
        foreach($words as $word){
            $model = new Word;
            $model->en = $word->en;
            $model->save();
        }
    }
}

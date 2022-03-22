<?php

use Illuminate\Database\Seeder;

use App\models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');

        foreach ($comics as $comic) {
            $new_comic = new Comic();
            $new_comic->fill($comic);
            $new_comic->save();
        }
    }
}

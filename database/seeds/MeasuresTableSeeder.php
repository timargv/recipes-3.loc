<?php

use Illuminate\Database\Seeder;

class MeasuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $measures = [
            ['title' => 'грамм'],
            ['title' => 'банка'],
            ['title' => 'головка'],
            ['title' => 'грамм'],
            ['title' => 'зубчик'],
            ['title' => 'килограмм'],
            ['title' => 'кусок'],
            ['title' => 'литр'],
            ['title' => 'миллилитр'],
            ['title' => 'на кончике ножа'],
            ['title' => 'по вкусу'],
            ['title' => 'пучок'],
            ['title' => 'стакан'],
            ['title' => 'столовая ложка'],
            ['title' => 'чайная ложка'],
            ['title' => 'штука'],
            ['title' => 'щепотка'],
            ['title' => 'стебель'],
            ['title' => 'дэш'],
            ['title' => 'веточка'],
        ];


        foreach($measures as $measure)
        {
            \App\Measure::create($measure);
        }
//        factory(\App\Measure::class, 50)->create();
    }
}

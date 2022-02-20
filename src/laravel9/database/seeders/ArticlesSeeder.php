<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    public function run()
    {
        Articles::create([
            'title' => 'MySQL Tutorial',
            'body' => 'DBMS stands for DataBase ...'
        ]);
        Articles::create([
            'title' => 'How To Use MySQL Well',
            'body' => 'After you went through a ...'
        ]);
        Articles::create([
            'title' => 'Optimizing database MySQL',
            'body' => 'In this tutorial, we show ...'
        ]);

        Articles::create([
            'title' => 'Optimizing MySQL',
            'body' => '1. Never run mysqld as root. 2. ...'
        ]);
        Articles::create([
            'title' => 'MySQL vs. YourSQL',
            'body' => 'In the following database comparison ...'
        ]);

        Articles::create([
            'title' => 'MySQL Security',
            'body' => 'When configured properly, MySQL ...'
        ]);
    }
}

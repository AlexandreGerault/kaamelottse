<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'title' => 'Une soirée effroyable',
                'subtitle' => 'Vendredi 29 novembre',
                'image' => NULL,
                'content' => 'Une nuit de pleine lune, un quartier désert, un chien qui hurle au loin … Mais qui peut bien frapper à la porte ?',
                'priority' => 2,
                'published' => 1,
                'slug' => 'Participer',
                'link' => NULL,
                'author_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-11-11 09:14:53',
                'updated_at' => '2019-11-11 09:16:42',
            ],
            [
                'title' => 'La Liste Kaamelot\'Tse',
                'subtitle' => NULL,
                'image' => Storage::url('images/affiche.jpg'),
                'content' => 'Avec la congrégation des saints chevaliers, vous aurez accès aux banquets avec potion de toute puissance à volonté, fruit du pécher, tournois chevalresques ou danse de la promise !\r\nPartez à la quête du Sainté Graal et vous avez la certitude de fêtes réussies',
                'priority' => 50,
                'published' => 1,
                'slug' => 'Découvrir La Table ronde',
                'link' => URL::route('round-table'),
                'author_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-11-11 09:18:55',
                'updated_at' => '2019-11-11 09:19:00',
            ],
            [
                'title' => 'Soirée détente',
                'subtitle' => 'Lundi 7 décembre',
                'image' => NULL,
                'content' => 'Les cours se succèdent, les projets avancent... Autant de bonnes raisons de marquer une pause pour prendre le temps d’un moment convivial\r\nNous vous attendons nombreux !',
                'priority' => 0,
                'published' => 1,
                'slug' => 'Je suis intéressé',
                'link' => NULL,
                'author_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-11-11 09:19:33',
                'updated_at' => '2019-11-11 09:19:33'],
            [
                'title' => 'Nouveau canapé à tester',
                'subtitle' => 'jeudi 9 décembre',
                'image' => NULL,
                'content' => 'Lâché seul dans la ville, enfin la belle vie Apéros, soirées, et refaire le monde entre barbares Pour tester le nouveau canapé Portes-ouvertes et pizzas à volonté !',
                'priority' => 0,
                'published' => 1,
                'slug' => 'Je suis intéressé',
                'link' => NULL,
                'author_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-11-11 09:19:57',
                'updated_at' => '2019-11-11 09:19:57'
            ],
            [
                'title' => 'Barathon',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
                'priority' => 0,
                'published' => 1,
                'slug' => NULL,
                'link' => NULL,
                'author_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-11-11 09:20:11',
                'updated_at' => '2019-11-11 09:20:17'
            ],
            [
                'title' => 'Soirée Poker',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
                'priority' => 0,
                'published' => 1,
                'slug' => 'Plus d\'infos',
                'link' => NULL,
                'author_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-11-11 09:20:48',
                'updated_at' => '2019-11-11 09:20:48'
            ]
        ]);
    }
}

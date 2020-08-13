<?php

use Illuminate\Database\Seeder;

class QuotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quotes')->insert([
            [
                'content' => "- Et va falloir vous y faire parce qu'à partir de maintenant, on va s’appeler « Les Chevaliers de la Table Ronde » !\n- Ben heureusement qu'on s'est pas fait construire un buffet à vaisselle !",
                'author' => 'Arthur et Léodagan',
				'creator_id' => 1,
            ],
            [
                'content' => "J'irai me coucher quand vous m'aurez juré qu'il n'y a pas dans cette forêt d'animal plus dangereux que le lapin adulte !",
                'author' => 'Bohort',
				'creator_id' => 1,
            ],
            [
                'content' => "Caius  : Hé les connards ! Vous pouvez faire griller un porcelet s'il vous plaît ? \nArthur  : Les connards ?\nLéodagan  : S'il vous plaît ?",
				'author' => NULL,
				'creator_id' => 1,
            ],
            [
                'content' => "Vous avez été marié comme moi ; vous savez que la monstruosité peut prendre des formes diverses",
                'author' => 'Léodagan à Bohort',
				'creator_id' => 1,
            ],
            [
                'content' => "- Qu'est-ce qui est petit et marron ?\n- Un marron !\n- Putain il est fort, ce con",
                'author' => 'Merlin et Elias de Kelliwic\'h',
				'creator_id' => 1,
            ],
            [
                'content' => "À l'époque quand je levais le doigt, y'avait 15 000 soldats qui gueulaient IMPERATOR ! Maintenant quand j'lève le doigt c'est pour aller pisser...",
				'author' => 'César',
				'creator_id' => 1,
            ],
            [
                'content' => "- Attila !, le fléau de Dieu !\n- Ah c'est sur, c'est pas Joe le Rigolo !",
                'author' => 'Bohort et Léodagan',
				'creator_id' => 1,
            ],
            [
                'content' => "- Nouvelle technique : on passe pour des cons, les autres se marrent, et on frappe. C'est nouveau.\n- Et les autres font ça aussi ?\n- Ah non, ça c'est que nous. Parce qu'il faut être capable de passer pour des cons en un temps record. Ah non, là-dessus on a une avance considérable.",
                'author' => 'Arthur et Guenièvre',
				'creator_id' => 1,
            ],
        ]);
    }
}

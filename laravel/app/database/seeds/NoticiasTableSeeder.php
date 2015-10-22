<?php

class NoticiasTableSeeder extends Seeder {

    protected $content = 'In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?

Est hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!

Sed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.

Sed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.';

    public function run()
    {
        DB::table('noticias')->delete();

        DB::table('noticias')->insert( array(
                array(
                    'titulo'          => 'NOTICIA 1',
                    'contenido'       => $this->content,
                    'created_at'    => new DateTime,
                    'updated_at'    => new DateTime,
                ),
                array(
                    'titulo'          => 'NOTICIA 2',
                    'contenido'       => $this->content,
                    'created_at'    => new DateTime,
                    'updated_at'    => new DateTime,
                ),
                array(
                    'titulo'          => 'NOTICIA 3',
                    'contenido'       => $this->content,
                    'created_at'    => new DateTime,
                    'updated_at'    => new DateTime,
                ))
        );
    }

}

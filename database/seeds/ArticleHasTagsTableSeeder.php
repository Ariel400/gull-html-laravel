<?php

use Illuminate\Database\Seeder;

class ArticleHasTagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('article_has_tags')->delete();
        
        \DB::table('article_has_tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'article_id' => '1',
                'tag_id' => 'padev',
            ),
            1 => 
            array (
                'id' => 5,
                'article_id' => '2',
                'tag_id' => 'padev',
            ),
        ));
        
        
    }
}
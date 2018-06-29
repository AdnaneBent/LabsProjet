<?php

use Illuminate\Database\Seeder;
use App\Projet;
class ProjetsTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projet::create( [
        'name'=>'GET IN THE LAB',
        'contenu'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
        'image'=>'3w3QkZNllSxZmtIQrdtegk99oleTQU4XDQPheRSi.jpeg',
        'created_at'=>'2018-06-28 08:10:55',
        'updated_at'=>'2018-06-28 08:10:55'
        ] );


                    
        Projet::create( [
        'name'=>'GET IN THE LAB',
        'contenu'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
        'image'=>'6iWthOA6bR7n8qzJlAK6GBowr6NnjRkxLSBHBN4M.jpeg',
        'created_at'=>'2018-06-28 08:11:24',
        'updated_at'=>'2018-06-28 08:11:24'
        ] );


                    
        Projet::create( [
        'name'=>'GET IN THE LAB',
        'contenu'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
        'image'=>'8s69lMj7vXFPN3wM1zNj8KFujbE01y0aD0n8yDgP.jpeg',
        'created_at'=>'2018-06-28 08:11:40',
        'updated_at'=>'2018-06-28 08:11:40'
        ] );
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Caroussel;

class CarousselTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caroussel::create( [
        'name'=>'img 1',
        'image'=>'EWyoXoOdzyox813Rhz2LtfjICRTRTN1t1W52SfQa.jpeg',
        'created_at'=>'2018-06-28 07:09:07',
        'updated_at'=>'2018-06-28 07:09:07'
        ] );
                    
        Caroussel::create( [
        'name'=>'img 2',
        'image'=>'OTtJy3jjMWyZSVQRqh5sFwGJDXMQyiuOFGdfRBoC.jpeg',
        'created_at'=>'2018-06-28 07:09:14',
        'updated_at'=>'2018-06-28 07:09:14'
        ] );
    }
}

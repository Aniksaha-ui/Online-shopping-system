<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
   		
   		$faker=Faker::create();
   		$product=Faker::create();
   		foreach(range(1,100) as $index){
   			DB::table('users')->insert([

   				'name'=>$faker->name,
   				'email'=>$faker->unique()->email,
   				'password'=>bcrypt('sahaanik'),
   				'user_role'=>"user"
   			]);
   		}


   		// for ($i=0;$i<500;$i++){
     //        App\catagory::create([
     //            'c_name'=>$faker->word,
     //            'c_type'=>$faker->word
                
     //        ]);
     //    }

   		//  for($i=0;$i<500;$i++){
     //    	App\sub::create([

     //    		'c_id'=>rand(1,500),
     //    		's_name'=>Str::random(5)  
     //    	]);
     //    }

     //    	for($i=0;$i<500;$i++){
     //    	App\product::create([

     //    		'c_id'=>rand(1,500),
     //    		's_id'=>rand(1,5),
     //    		'p_name'=>$faker->word,
     //    		'slug'=>str::random(5),
     //    		'p_price'=>rand(135,65000),
     //    		'p_quan'=>rand(100,50),
     //    		'p_alert'=>rand(10,15),
     //    		'p_image'=>"image/product/1593595496L8c2GXdf1d.png",
     //    		'p_des'=>str::random(500),
     //    		'p_summary'=>$faker->unique()->text()


     //    	]);
     //    }

          for($i=0;$i<100;$i++){
            App\shipping::create([
              'user_id'=>rand(1,100),
              'fname'=>$faker->firstName,
              'lname'=>$faker->lastName,
              'company'=>$faker->company,
              'address'=>$faker->address,
              'house_no'=>$faker->buildingNumber,
              'phone'=>$faker->phoneNumber,
              'email'=>$faker->email,
              'payment_status'=>"paid"    

            ]);
          }


          for($i=0;$i<100;$i++){
            App\sale::create([
                'user_id'=>rand(1,100),
                'shipping_id'=>rand(1,100),
                'total'=>rand(100,10000),
            ]);
          }


          for($i=0;$i<100;$i++){
            App\billings::create([
              'sale_id'=>rand(1,100),
              'user_id'=>rand(1,100),
              'product_id'=>rand(1,5),
              'product_quantity'=>rand(1,4),
              'product_price'=>rand(135,50000),
              'payment_method'=>"visa"

            ]);
          }



















    }
}

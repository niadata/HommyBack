<?php

use Illuminate\Database\Seeder;

class UserTabelSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,12)->create()->each(function($user){
            $comments = factory(App\Comment::class)->make();
            $republic = factory(App\Republic::class)->make();
            $comments->republic_id = $republic->id;
            $comments->save();
            $user->republic()->save($republic);
            $republic->users()->attach($user);
        });

    }
}

<?php

use Illuminate\Database\Seeder;

class RepublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Republic::class,5)->create()->each(function($republic){
            $comments = factory(App\Comment::class, 2)->make();
            $user = factory(App\User::class)->make();
            
            $republic->Comment()->saveMany($comments);
            $republic->users()->save($user);
            $user->republics()->attach($reoublic);
        });
    }
}

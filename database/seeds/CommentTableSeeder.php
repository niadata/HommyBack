<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\Comment::class, 2)->create()->each(function($comment){
            $user = factory(App\User::class)->make();
            $republic = factory(App\Republic::class)->make();
            $user->comments()->attach($comment);
            $republic->comments()->attach($comment);
            $comment->users()->save($user);
            $comment->republics()->save($republic);
    }
}

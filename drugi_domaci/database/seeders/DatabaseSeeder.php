<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::truncate();
        Genre::truncate();
        Author::truncate();
        Book::truncate();

        $user1=User::factory()->create();
        $user2=User::factory()->create();
        $user3=User::factory()->create();

        $genre1=Genre::create(['name'=>'Romance novel','description'=>'A romance novel generally refers to a type of genre fiction novel which places its primary focus on the relationship and romantic love between two people, and usually has an "emotionally satisfying and optimistic ending."']);
        $genre2=Genre::create(['name'=>'Action fiction','description'=>'Action fiction is a literary genre that focuses on stories that involve high-stakes, high-energy, and fast-paced events.']);
        $genre3=Genre::create(['name'=>'Science fiction','description'=>'Science fiction is a genre of speculative fiction, which typically deals with imaginative and futuristic concepts such as advanced science and technology, space exploration, time travel, parallel universes, and extraterrestrial life.']);
        $genre4=Genre::create(['name'=>'Historical fiction','description'=>'Historical fiction is a literary genre in which the plot takes place in a setting related to the past events, but is fictional.']);
        $genre5=Genre::create(['name'=>'Mystery','description'=>'Mystery is a fiction genre where the nature of an event, usually a murder or other crime, remains mysterious until the end of the story.']);
 
        $author1=Author::create(['first_name'=>' André','last_name'=>'Aciman']);
        $author2=Author::create(['first_name'=>'Veronica','last_name'=>'Roth']);
        $author3=Author::create(['first_name'=>'Frank','last_name'=>'Herbert']);

         $book1=Book::create([
            'title'=>'Call me by your name',
            'number_of_pages'=>256,
            'genre_id'=>$genre1->id,
            'author_id'=>$author1->id,
            'user_id'=>$user1->id,
            'year_of_release'=>2007
         ]);
         $book2=Book::create([
            'title'=>'Divergent',
            'number_of_pages'=>487,
            'genre_id'=>$genre2->id,
            'author_id'=>$author2->id,
            'user_id'=>$user2->id,
            'year_of_release'=>2011
         ]);
         $book3=Book::create([
            'title'=>'Dina',
            'number_of_pages'=>704,
            'genre_id'=>$genre3->id,
            'author_id'=>$author3->id,
            'user_id'=>$user3->id,
            'year_of_release'=>1965
         ]);
         $book4=Book::create([
            'title'=>'Insurgent',
            'number_of_pages'=>568,
            'genre_id'=>$genre3->id,
            'author_id'=>$author2->id,
            'user_id'=>$user1->id,
            'year_of_release'=>2012
         ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

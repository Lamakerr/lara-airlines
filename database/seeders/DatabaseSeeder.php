<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Airport;
use App\Models\Comment;
use App\Models\CommentUser;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Gender;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Route;
use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory(6)->create();
        User::factory(50)->create();
        Gender::factory(3)->create();
        DocumentType::factory(3)->create();
        Document::factory(250)->create();
        Contact::factory(150)->create();
        Comment::factory(150)->create();
        CommentUser::factory(150)->create();

        $airports = collect(parseAirports());
        foreach ($airports->chunk(500) as $chunk){
            Airport::query()->insert($chunk->toArray());
        }

        Route::factory(500)->create();
        Product::factory(500)->create();
        Coupon::factory(150)->create();
        Order::factory(250)->create();


//        Test::factory()->count(4)->create([
//            'name' => "testPSQL",
//        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $books = Book::factory()->count(10);
        // User::factory()->has($books)->count(10)->create();
        //! Adminlerin book oluşturabilmesi için değişiklik yapalım.

        // $users = User::where('role', 'admin')->get(); //! Bu satırı da değiştirelim. Fonk oluşturalım.
        // foreach ($users as $user) {
        //     Book::factory()->count(10)->create();
        // }

        $users = User::Admins()->get();
        foreach ($users as $user) {
            Book::factory(['user_id' => $user->id])->count(10)->create();
        }
    }
}

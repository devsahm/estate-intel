<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BooksTest extends TestCase
{
    use RefreshDatabase;


    public function test_book_can_be_created()
    {

        $book = Book::factory()->make();
        $this->postJson(route('book.create'), [
            'name' => $book->name,
            'isbn' => $book->isbn,
            'authors' => $book->authors,
            'number_of_pages' => $book->number_of_pages,
            'publisher' => $book->publisher,
            'country' => $book->country,
            'release_date' => $book->release_date
        ])->assertCreated()
        ->json();
    }

    public function test_book_can_be_edited()
    {
        $book = Book::factory()->create();
        
        $response = $this->patchJson(route('book.update', $book->id), [
            'publisher' => 'Johnson Adams'
        ])->assertStatus(200)->json();

        $this->assertEquals('Johnson Adams', $response['data']['publisher']);
    }


    public function test_all_books_can_be_shown()
    {
       Book::factory()->create();
       $this->getJson(route('book.all'))->assertOk()->json();
      
    }


    public function test_book_can_be_deleted()
    {
        $book = Book::factory()->create();
        $this->deleteJson(route('book.delete', $book->id))->assertStatus(204);

        $this->assertDatabaseMissing('books', [
            'name' => $book->name,
            'isbn' => $book->isbn,
            'authors' => $book->authors,
            'number_of_pages' => $book->number_of_pages,
            'publisher' => $book->publisher,
            'country' => $book->country,
            'release_date' => $book->release_date 
        ]);
    }


    public function test_single_book_can_be_shown()
    {
        $book = Book::factory()->create();
        $this->getJson(route('book.show', $book->id))->assertOk();
        
    }


}

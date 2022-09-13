<?php 

namespace App\Services;

use App\Models\Book;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookService
{

    public function create(array $params)
    {
        try {
            return Book::create($params);
        } catch (\Throwable) {
            throw new Exception('Books cannot be created');
        }
    }

    
    public function update(array $params, int $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->update($params);
            return $book;
        } catch (\Throwable) {
            throw new Exception('Books cannot be updated');
        }
    }


    public function all()
    {
        try {
            return Book::all();
        } catch (\Throwable) {
            throw new Exception('Books cannot be updated');
        }
    }


    public function show(int $id)
    {
        try {
            return Book::findOrFail($id);
        } catch (ModelNotFoundException ) {
            throw new Exception('Model not found');
        }
    }
    

    public function delete(int $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return true;
        } catch (\Throwable $th ) {
            throw new Exception($th);
        }
    }


    

}
<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct(protected BookService $bookService)
    {
    }


    public function create(BookRequest $request)
    {
       try {
            $books = $this->bookService->create($request->validated());
            return ResponseHelper::success(['book' => BookResource::make($books)], 201);
       } catch (\Throwable $th) {
            return ResponseHelper::fail($th->getMessage());
       }

    }


    public function update(Request $request, int $id)
    {
        try {
            $book = $this->bookService->update($request->all(), $id);
            return ResponseHelper::successWithMessage(BookResource::make($book), 200, "The book {$book->name} was updated successfully");
        } catch (\Throwable $th) {
            return ResponseHelper::fail($th->getMessage());
        }
    }



    public function show(int $id)
    {
        try {
            $books = $this->bookService->show($id);
            return ResponseHelper::success(BookResource::make($books));
        } catch (\Throwable $th) {
            return ResponseHelper::fail($th->getMessage());
        }
    }


    public function allBooks()
    {
        try {
            $books = $this->bookService->all();
            return ResponseHelper::success(BookResource::collection($books));
        } catch (\Throwable $th) {
            return ResponseHelper::fail($th->getMessage());
        }
    }


    public function destroy(int $id)
    {
        try {
             $this->bookService->delete($id);
            return ResponseHelper::successWithMessage([],  204, 'The book was deleted successfully');
        } catch (\Throwable $th) {
            return ResponseHelper::fail($th->getMessage());
        }
    }





}

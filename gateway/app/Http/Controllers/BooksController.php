<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\BooksService;


class BooksController extends Controller
{
    use ApiResponser;

    public $BooksService;

    public function __construct(BooksService $BooksService)
    {
        $this->BooksService = $BooksService;
    }

    public function getBooks()
    {
        return $this->successResponse($this->BooksService->obtainBooks());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->BooksService->createBooks($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->BooksService->showBooks($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->BooksService->updateBooks($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->BooksService->deleteBooks($id));
    }


}

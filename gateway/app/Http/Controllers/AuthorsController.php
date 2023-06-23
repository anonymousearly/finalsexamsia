<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\AuthorsService;


class AuthorsController extends Controller
{
    use ApiResponser;

    public $AuthorsService;

    public function __construct(AuthorsService $AuthorsService)
    {
        $this->AuthorsService = $AuthorsService;
    }

    public function getAuthors()
    {
        return $this->successResponse($this->AuthorsService->obtainAuthors());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->AuthorsService->createAuthors($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->AuthorsService->showAuthors($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->AuthorsService->updateAuthors($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->AuthorsService->deleteAuthors($id));
    }


}

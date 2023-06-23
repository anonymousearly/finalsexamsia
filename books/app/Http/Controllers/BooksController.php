<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Models\Books; //Books Model
use App\Traits\ApiResponser; //Standard API response
use DB; // can be use if not using eloquent, you can use DB component in lumen
use Illuminate\Http\Response;


Class BooksController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getBooks(){
        $books = Books::all();
        return $this -> successResponse($books);
    }

    public function show($id){

        $books = Books::findOrFail($id);
        return $this -> successResponse($books);
    }

    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [
            'book_name' => 'required|max:50',
            'yearpublish' => 'required|max:50',
            'authorid' => 'required|numeric|min:1|not_in:0',
        ];

        $this->validate($request,$rules);
        $books = Books::create($request->all());
        return $this -> successResponse($books, Response::HTTP_CREATED);
    }

    

     // UPDATE FUNCTION
     public function update(Request $request, $id)
     {
        $rules = [
            'book_name' => 'required|max:50',
            'yearpublish' => 'required|max:50',
            'authorid' => 'required|numeric|min:1|not_in:0',
        ];

         $this->validate($request,$rules);
         $books = Books::where('book_id', $id)->firstOrFail();
         $books->fill($request->all());
         
        //  IF NO CHANGE HAPPENED
         if ($books->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $books->save();
         return $this -> successResponse($books);
     } 
    //  DELETE FUNCTION
     public function delete($id) {
        $books = Books::findOrFail($id);
        $books->delete();
        return $this -> successResponse($books);

    }
    
}



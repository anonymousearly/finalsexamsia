<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Models\Authors; //Authors Model
use App\Traits\ApiResponser; //Standard API response
use DB; // can be use if not using eloquent, you can use DB component in lumen
use Illuminate\Http\Response;


Class AuthorsController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getAuthors(){
        $authors = Authors::all();
        return $this -> successResponse($authors);
    }

    public function show($id){

        $authors = Authors::findOrFail($id);
        return $this -> successResponse($authors);
    }

    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [
            'fullname' => 'required|max:150',
            'gender' => 'required|max:10',
            'birhday' => 'required',
        ];

        $this->validate($request,$rules);
        $authors = Authors::create($request->all());
        return $this -> successResponse($authors, Response::HTTP_CREATED);
    }

    

     // UPDATE FUNCTION
     public function update(Request $request, $id)
     {
        $rules = [
            'fullname' => 'required|max:150',
            'gender' => 'required|max:10',
            'birhday' => 'required',
        ];

         $this->validate($request,$rules);
         $authors = Authors::where('author_id', $id)->firstOrFail();
         $authors->fill($request->all());
         
        //  IF NO CHANGE HAPPENED
         if ($authors->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $authors->save();
         return $this -> successResponse($authors);
     } 
    //  DELETE FUNCTION
     public function delete($id) {
        $authors = Authors::findOrFail($id);
        $authors->delete();
        return $this -> successResponse($authors);

    }
    
}



<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
//use Illuminate\Http\Request;

class BookController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
                $Book= \App\Book::all();
                
                 return response()->json([
                      'msg'	=>	'success',
                      'Book'	=> $Book->toArray()
                 ],200);
    
	}

	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateBookRequest $request)
	{
            
               $input= $request->all();
               
               
		if(\App\Book::create($input)){
                   
                       return response()->json([
                            'msg'	=>	'success'
                        ],201);
                    
                    
                }
                
                else{
                       return response()->json([
                             'msg'	=>  'error',
                             'error'	=>  'cannot create record'
                       ],400);
                }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$Book= \App\Book::find($id);
                
                if(is_null($Book)){
                     
                     return response()->json([
                            'msg'	=>	'success',
                            'Book'	=> 'Book not found'
                      ],404);
                     
                 }
                 
                 return response()->json([
                      'msg'	=>	'success',
                      'Book'	=> $Book->toArray()
                 ],200);

        
	}

	

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Requests\CreateBookRequest $request) {

                 $Book = \App\Book::findOrFail($id);
                 $input=$request->all();
                 
                
                 if(is_null($Book)){
                     
                     return response()->json([
                            'msg'	=>	'success',
                            'Book'	=> 'Book not found'
                      ],404);
                     
                 }
                 
                 if($Book->update($input)){
                     
                       return response()->json([
                             'msg'	=>	'success'
                       ],200);
                       
                 }
                 else{
                      
                      
                      return response()->json([
                               'msg'	=>	'error',
                               'error'	=>	'cannot update record'
                        ],400);
                      
                      
                      
                  }
                 
                 
                 
        
        }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            
              
		 $Book=\App\Book::find($id);
                 
                 if(is_null($Book)){
                     
                     return response()->json([
                            'msg'	=>	'success',
                            'Book'	=> 'Book not found'
                      ],404);
                     
                 }
                 
                  if($Book->delete()){
                      
                      	return response()->json([
                               'msg'	=>	'success'
                        ],200);
                      
                      
                      
                  }
                  
                  
                  else{
                      
                      
                      return response()->json([
                               'msg'	=>	'error',
                               'error'	=>	'cannot update record'
                        ],400);
                      
                      
                      
                  }
             
	}

}

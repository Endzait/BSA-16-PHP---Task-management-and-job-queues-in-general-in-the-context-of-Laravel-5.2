<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RestBookController extends Controller
{
    public function store(Request $request){
        $rules=array(
            'title'=>'required|alpha',
            'author'=>'required|alpha',
            'year'=>'required|digits:4',
            'genre'=>'required|alpha'
        );
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return Response::json("{}", 404)
                ->withErrors($validator);
        }else {


            $books = new Book();

            $books->title = $request->title;
            $books->author = $request->author;
            $books->year = $request->year;
            $books->genre = $request->genre;

            $books->save();
            return Response::json("{}", 200);

        }
    }

    public function index(){
        $response = [
            'books'  => []
        ];
        try{
            $statusCode = 200;


            $books = Book::all();

            foreach($books as $book){

                $response['book'][] = [
                    'id' => $book->id,
                    'title' => $book->title,
                    'year' => $book->year,
                    'genre' => $book->genre,
                    'user_id' => $book->user_id,
                ];
            }

        }catch (\Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }
    public function show($id){
        $response = [
            'books'  => []
        ];
        try{
            $statusCode = 200;


            $books = Book::find($id);

            foreach($books as $book){

                $response['book'][] = [
                    'id' => $book->id,
                    'title' => $book->title,
                    'year' => $book->year,
                    'genre' => $book->genre,
                ];
            }

        }catch (\Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }


    public  function destroy($id){

        try{
            $book=Book::find($id);
            $book->delete();
            return Response::json("{}", 200);
        }catch (\Exception $e){
            return Response::json("{}", 404);
        }

    }


}

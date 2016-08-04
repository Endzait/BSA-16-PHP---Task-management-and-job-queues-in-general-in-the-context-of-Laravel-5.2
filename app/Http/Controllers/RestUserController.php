<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class RestUserController extends Controller
{
    //
    public function showBooks($id){

        $response = [
            'books'  => []
        ];
        try{
            $statusCode = 200;


            $books=User::find($id)->books();

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


        try{
            $statusCode = 200;

            $response = [
                'user'  => []
            ];
            $users=User::find($id);

            foreach($users as $user){

                $response['user'][] = [
                    'id' => $user->id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                ];
            }

        }catch (\Exception $e){
            $statusCode = 400;
            $response="{}";
        }finally{
            return Response::json($response, $statusCode);
        }
    }

    public function getBook ($id, $uid){
        try{
            $book=\App\Book::find($id);
            $users=\App\User::find($uid);
            $users->books()->attach($book);
            return Response::json("{}", 200);
        }catch (\Exception $e){
            return Response::json("{}", 404);
        }
    }

    public function passBook($id,$uid){

        try{
            $book=\App\Book::find($id);
            $users=\App\User::find($uid);
            $users->books()->detach($book);
            return Response::json("{}", 200);
        }catch (\Exception $e){
            return Response::json("{}", 404);
        }
    }
}

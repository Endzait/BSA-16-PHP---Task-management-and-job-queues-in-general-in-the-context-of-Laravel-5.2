<?php

namespace App\Http\Controllers;

use App\Book;
use App\Jobs\SendEmail;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    //
    public function index(){
        $users=User::paginate(10);
        return view('user/index', array('users'=>$users));
    }

    public function store(Request $request){

        $rules=array(
            'first_name'=>'required|alpha',
            'last_name'=>'required|alpha',
            'email'=>'required|email|unique:users',
        );
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return Redirect::to('user/create')
                ->withErrors($validator)
                ->withInput();
        }else {


            $users = new User();

            $users->first_name = $request->first_name;
            $users->last_name = $request->last_name;
            $users->email = $request->email;

            $users->save();
            Session::flash('message', 'Successfully added book');
            return Redirect::to('user');
        }
    }

    public function create(){
        $users=User::All();
        return view('user/create', array('users'=>$users));
    }

    public function edit($id){
        try{
            $user=User::find($id);
            $this->authorize('edit',$user);
        }catch (AuthenticationException $e){
            return redirect('/home');
        }
        $users=User::find($id);
        return view('user/edit',array('user'=>$users));
    }
    public function update(Request $request, $id){

        $rules=array(
            'first_name'=>'required|alpha',
            'last_name'=>'required|alpha',
            'email'=>'required|email|unique:users',
        );
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return Redirect::to('user/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }else {


            $users =User::find($id);

            $users->first_name = $request->first_name;
            $users->last_name = $request->last_name;
            $users->email = $request->email;

            $users->save();
            Session::flash('message', 'Successfully added user');
            return Redirect::to('user');
        }
    }
    public function show($id){
        $users=User::find($id)->books()->paginate(10);
        return view('book/index', array('books'=>$users));
    }
    public  function destroy($id){



        $user=User::find($id);
        $books=$user->books();
        foreach ($books as $book){
            Book::find($book->id)->users();
        }
        $user->delete();
        Session::flash('message', 'Successfully added book');
        //return Redirect::to('user/');
    }



    /**
     * @param $id - user id
     *
     *
     * @return view
     */
    public function showBooks($id){
        $users=User::find($id)->books()->paginate(10);
        return view('user/book', array('books'=>$users));
    }

    public function sendEmail($id,$message,$delay=0,$send=1){
        $user=User::findOrFail($id);
        $job = (new SendEmail($user, $message))->onQueue('emails')
            ->delay($delay);
        if($send) {
            $this->dispatch($job);
        }else{
            $job->delete();
        }
    }

}

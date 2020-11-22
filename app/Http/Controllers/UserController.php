<?php

namespace App\Http\Controllers;

use App\Model\User;
//use App\Traits\ApiResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use DB;

Class UserController extends Controller {
    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }
    
    //************************************************************/

    public function successResponse($data, $code = Response::HTTP_OK){
        return response()->json(['data' => $data, 'site' => 2], $code);
    }

    public function errorResponse($message, $code){
        return response()->json(['error' => $message, 'site' => 2, 'code' => $code], $code);
    }

    //************************************************************/


    //GET the data from the database
    public function getUsers(){
        $users = DB::connection('mysql')
        ->select("Select * from tbluser");

        return response()->json($users,200);
    }

    //SHOW ALL the data from the database
    public function index(){
        $users = User::all();

        return $this->successResponse($users);
    }

    //ADD new record in the database
    public function add(Request $request){
        $rules = [
            'username' => 'required | max: 20',
            'password' => 'required | max: 20',
        ]; //these 2 are the requirement fields

        $this->validate($request,$rules); // validate which is under your request
        
        $user = User::create($request->all()); //eloquent create, all meaning all the fields in your model

        return  $this->successResponse($user, Response::HTTP_CREATED);
    }

    //SHOW record by using ID
    public function show($id){

        $user = User::where('ID',$id)->first();

        if ($user){
            return $this->successResponse($user);
        }
        else{
            return $this->errorResponse("User not found", Response::HTTP_NOT_FOUND);
        }
    }

    //UPDATE the record
    public function update(Request $request, $id){
        //you will find use the ID to find what record you want to update
        $user = User::where('ID',$id)->first(); 

        $rules = [
            'username' => 'max: 20',
            'password' => 'max: 20',
        ]; //these 2 are the requirement fields
        

        if($user){
            $user->fill($request->all());
            
            if($user->isClean()){
                return "No changes where made.";
            }

        }
        else{
            return $this->errorResponse("User NOT FOUND.",  Response::HTTP_NOT_FOUND);
        }

        $user->save();
        return $this->successResponse($user);
    }

    //DELETE the record
    public function delete($id){
        //you will find use the ID to find what record you want to update
        $user = User::where('ID',$id)->first(); 

        if($user){ 
            $user->delete();
            return "Successfully Deleted!";
        }
        else{
            return $this->errorResponse("user not found",  Response::HTTP_NOT_FOUND); 
        }
    }
}
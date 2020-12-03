<?php

namespace App\Http\Controllers;
use App\Model\UserJob;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request; 
use DB; 

Class UserJobController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }
   
    /**
    * Return the list of usersjob
    * @return Illuminate\Http\Response
    */

    //***********************API RESPONSER***************************/

    // public function successResponse($data, $code = Response::HTTP_OK){
    //     return response()->json(['data' => $data, 'site' => 2], $code);
    // }

    // public function errorResponse($message, $code){
    //     return response()->json(['error' => $message, 'site' => 2, 'code' => $code], $code);
    // }

    //************************************************************/

    public function index(){
        $usersjob = UserJob::all();
        return $this->successResponse($usersjob);
    }

    /**
    * Obtains and show one userjob
    * @return Illuminate\Http\Response
    */

    public function show($id){
        $userjob = UserJob::findOrFail($id);
        return $this->successResponse($userjob);
    }

}

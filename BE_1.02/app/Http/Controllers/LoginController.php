<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\webClient;

class LoginController extends Controller
{
    function webLogin(Request $request){

        try {

            $webClient = new webClient();

            $username = $request->input('id.date1');
            $password = $request->input('id.date2');

            $val = sizeof($webClient->webLogin($username,$password));

            if($val>0){
                foreach ($webClient->webLogin($username,$password) as $crow) {
                    $this_row = array(
                        'Id' => $crow->uid,
                        'Name' => $crow->name
                    );       
                    $response[] = $this_row;
                }
            }

        } catch (\Exception $th) {
            error_log($th);
        }
        if($val>0){
            return response()->json([
                'name' => $response,
                'state' => 'ACTIVE'
            ]);
        }

    }
}

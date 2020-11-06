<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\webClient;

class EmployeeController extends Controller
{
    function addNewEmployee(Request $request){

        try {

            $ClientNo = $request->input('id.logedid');
            $Id = $request->input('id.id');
            $Name = $request->input('id.name');
            $DOB = $request->input('id.dob');
            $Gender = $request->input('id.gender');
            $Mobile = $request->input('id.mobile');
            $Email = $request->input('id.email');
            $Address = $request->input('id.address');
            $PaymentBy = $request->input('id.paymentby');
            $ABN = $request->input('id.abn');
            $TaxPur = $request->input('id.taxpur');
            $TaxFree = $request->input('id.taxfree');
            $PaymentCircle = $request->input('id.paymentcircle');
            $WeekdayRate = $request->input('id.weekdayrate');
            $HolidayRate = $request->input('id.holidayrate');
            $SundayRate = $request->input('id.sundayrate');
            $SaturdayRate = $request->input('id.saturdayrate');
            $Bank = $request->input('id.bank');
            $AccountName = $request->input('id.accountname');
            $BSB = $request->input('id.bsb');
            $AccountNo = $request->input('id.accountno');
            $States = $request->input('id.states');
            
            $webClient = new webClient();

    
            return response()->json([
            'name' => $webClient->addNewEmployee($ClientNo,$Id,$Name,$DOB,$Gender,
            $Mobile,$Email,$Address,$PaymentBy,$ABN,$TaxPur,$TaxFree,$PaymentCircle,$WeekdayRate,$HolidayRate,
            $SundayRate,$SaturdayRate,$Bank,$AccountName,$BSB,$AccountNo,$States),
            'state' => 'ACTIVE'
            ]);

        }  catch (\Exception $th) {
            error_log($th);
        }

    }

    public function searchexsistingemployee(Request $request){
        try {
    
            $text = $request->input('id');
    
            $webClient = new webClient();
    
            return response()->json([
            'name' => $webClient->searchexsistingemployee($text),
            'state' => 'ACTIVE'
            ]);
    
        }  catch (\Exception $th) {
            error_log($th);
        }
    }
}

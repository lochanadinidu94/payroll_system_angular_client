<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\webClient;

class CompanyProfileController extends Controller
{

    function updateCurrentCompany(Request $request){

        try {

            $ClientNo = $request->input('id.clientNo');
            $TFN = $request->input('id.tfn');
            $WorkCoverNo = $request->input('id.wcno');
            $PublicLNo = $request->input('id.plno');
            $LaboureCNo = $request->input('id.lcno');
            $Web = $request->input('id.web');

            $webClient = new webClient();

            return response()->json([
            'name' => $webClient->updateCompany($ClientNo,$TFN,$WorkCoverNo,$PublicLNo,$LaboureCNo,$Web),
            'state' => 'ACTIVE'
            ]);
           
        }  catch (\Exception $th) {
            error_log($th);
        }

    }


    function getCurrentCompanyDetails(Request $request){

        try {

            $webClient = new webClient();
            $ClientNo = $request->input('id');
            $val = sizeof($webClient->getCurrentCompanyDetails($ClientNo));

            if($val>0){
                foreach ($webClient->getCurrentCompanyDetails($ClientNo) as $crow) {
                    $this_row = array(
                        'ClientNo' => $crow->ClientNo,
                        'ClientName' => $crow->ClientName,
                        'Email' => $crow->Email,
                        'Mobile' => $crow->Mobile,
                        'Country' => $crow->Country,
                        'States' => $crow->States,
                        'UpdatecDate' => $crow->UpdatecDate,
                        'CreatedDate' => $crow->CreatedDate,
                        'ActiveStatus' => $crow->ActiveStatus,
                        'ExpDate' => $crow->ExpDate,
                        'ABN' => $crow->ABN,
                        'MarketingOfficer' => $crow->ACN,
                        'TFN' => $crow->TFN,
                        'WCNo' => $crow->WCNo,
                        'PLNo' => $crow->PLNo,
                        'LCNo' => $crow->LCNo,
                        'Web' => $crow->Web
                        
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

public function saveNewSystemUser(Request $request){
        
    try {
    
        $ClientNo = $request->input('id.clientNo');
        $Name = $request->input('id.name');
        $Mobile = $request->input('id.mobile');
        $Email = $request->input('id.email');
        $UserType = $request->input('id.usertype');
        $Company = $request->input('id.company');
        $Workers = $request->input('id.workers');
        $Sites = $request->input('id.sites');
        $Payment = $request->input('id.payment');


        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->saveNewSystemUser($ClientNo,$Name,$Mobile,$Email,$UserType,$Company,$Workers,$Sites,$Payment),
        'state' => 'ACTIVE'
        ]);
       
    }  catch (\Exception $th) {
        error_log($th);
    }

    }
public function loardSystmeUsers(Request $request){
    try {

        $ClientNo = $request->input('id');

        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->loardSystmeUsers($ClientNo),
        'state' => 'ACTIVE'
        ]);
       
    }  catch (\Exception $th) {
        error_log($th);
    }
}

public function loardSystmeUsersbyName(Request $request){
    try {

        $ClientNo = $request->input('id');
        $txt = $request->input('txt');


        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->loardSystmeUsersbyName($ClientNo,$txt),
        'state' => 'ACTIVE'
        ]);
       
    }  catch (\Exception $th) {
        error_log($th);
    }
}
 
public function UpdateSystmeUsers(Request $request){
    try {

        $SystemUserNo = $request->input('LogUserNo');
        $Email = $request->input('Email');
        $Mobile = $request->input('Mobile');

        $Company = $request->input('Company');
        $Payment = $request->input('Payment');
        $Workers = $request->input('Workers');
        $Sites = $request->input('Sites');

        $Status = $request->input('Status');

        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->UpdateSystemUser($SystemUserNo,$Email,$Mobile,$Company,$Payment,$Workers,$Sites,$Status),
        'state' => 'ACTIVE'
        ]);

    }  catch (\Exception $th) {
        error_log($th);
    }
}

public function loradBankByCountry(Request $request){
    try {

        $LogedClientNo = $request->input('id');

        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->loradBankByCountry($LogedClientNo),
        'state' => 'ACTIVE'
        ]);

    }  catch (\Exception $th) {
        error_log($th);
    }
}

public function SaveNewBankCard(Request $request){
    try {

        $ClientNo = $request->input('id.clientNo');
        $BankName = $request->input('id.BankName');
        $BankCardName = $request->input('id.BankCardName');
        $BankCardNo = $request->input('id.BankCardNo');
        $BankExpDate = $request->input('id.BankExpDate');
        $CVVNo = $request->input('id.CVVNo');

        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->SaveNewBankCard($ClientNo,$BankName,$BankCardName,$BankCardNo,$BankExpDate,$CVVNo),
        'state' => 'ACTIVE'
        ]);

    }  catch (\Exception $th) {
        error_log($th);
    }
}

public function loardBankCardsDetailsByClientNo(Request $request){
    try {

        $LogedClientNo = $request->input('id');

        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->loardBankCardsDetailsByClientNo($LogedClientNo),
        'state' => 'ACTIVE'
        ]);

    }  catch (\Exception $th) {
        error_log($th);
    }
}
    

public function removeBankCard(Request $request){
    try {

        $CardNo = $request->input('id');

        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->removeBankCard($CardNo),
        'state' => 'ACTIVE'
        ]);

    }  catch (\Exception $th) {
        error_log($th);
    }
}

public function AddNewPayPeriod(Request $request){
    try {

        $ClientNo = $request->input('id.clientNo');
        $startDate = $request->input('id.startDate');
        $endDate = $request->input('id.endDate');
        $payName = $request->input('id.payName');
        $status = $request->input('id.status');
        $totDate = $request->input('id.totDate');

        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->AddNewPayPeriod($ClientNo,$startDate,$endDate,$payName,$status,$totDate),
        'state' => 'ACTIVE'
        ]);

    }  catch (\Exception $th) {
        error_log($th);
    }
}

public function loardPayPeriodsDetails(Request $request){
    try {

        $LogedClientNo = $request->input('id');

        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->loardPayPeriodsDetails($LogedClientNo),
        'state' => 'ACTIVE'
        ]);

    }  catch (\Exception $th) {
        error_log($th);
    }
}

public function changepayperiodststus(Request $request){
    try {

        $Id = $request->input('id');
        $States = $request->input('states');

        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->changepayperiodststus($Id,$States),
        'state' => 'ACTIVE'
        ]);

    }  catch (\Exception $th) {
        error_log($th);
    }
}

public function loardPayPeriodsDetailsByName(Request $request){
    try {

        $LogedClientNo = $request->input('id');
        $TextSerch = $request->input('text');

        $webClient = new webClient();


        return response()->json([
        'name' => $webClient->loardPayPeriodsDetailsByName($LogedClientNo,$TextSerch),
        'state' => 'ACTIVE'
        ]);

    }  catch (\Exception $th) {
        error_log($th);
    }
}

public function loardEventsByClientCountry(Request $request){
    try {

        $LogedClientNo = $request->input('id');

        $webClient = new webClient();

        return response()->json([
        'name' => $webClient->loardEventsByClientCountry($LogedClientNo),
        'state' => 'ACTIVE'
        ]);

    }  catch (\Exception $th) {
        error_log($th);
    }
}



}

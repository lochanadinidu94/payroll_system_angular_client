<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\EmployerModel;


class EmployerController extends Controller
{


    function webLogin(Request $request){

        try {
            error_log('sasasaaasa');
            $username = $request->input('date1');
            $password = $request->input('date2');

            error_log($username);
        } catch (\Exception $th) {
            error_log($th);
        }

    }

    function deleteEvtDate(Request $request){
        try {
            $Employer = new EmployerModel();

            $evtId = $request->input('id');

            $Employer->deleteEvtDate($evtId);

            return response()->json([
                'name' => 'Successfully Deleted',
                'state' => 'ACTIVE'
            ]);

        } catch (\Exception $th) {
            error_log($e);
        }

    }


    function sortEventDate(Request $request){


        try {
            $Employer = new EmployerModel();

            $date1 = $request->input('date1');
            $date2 = $request->input('date2');

            $val = sizeof($Employer->sortEventDate($date1,$date2));

            if($val>0){
                foreach ($Employer->sortEventDate($date1,$date2) as $crow) {
                    $this_row = array(
                        'Id' => $crow->id,
                        'Name' => $crow->name,
                        'EDate' => $crow->date,
                        'Country' => $crow->country,
                        'State' => $crow->states
                    );       
                    $response[] = $this_row;
                }
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        if($val>0){
            return response()->json([
                'name' => $response,
                'state' => 'ACTIVE'
            ]);
        }


    }

    function loardEventDate(Request $request){


        try {
            $Employer = new EmployerModel();

            foreach ($Employer->loardEventDate() as $crow) {
                $this_row = array(
                    'Id' => $crow->id,
                    'Name' => $crow->name,
                    'EDate' => $crow->date,
                    'Country' => $crow->country,
                    'State' => $crow->states
                );       
                $response[] = $this_row;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);


    }

    function addEventDate(Request $request){


        try {

            $evntName = $request->input('evtName');
            $evntDate = $request->input('evtDate');
            $evntState = $request->input('evtState');

            $Employer = new EmployerModel();
            $Employer->addEventDate($evntName,$evntDate,$evntState);


        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => 'Successfully Saved',
            'state' => 'ACTIVE'
        ]);

    }

    function loardCompanyEmplAll(Request $request){
        try {

            $CName = $request->input('id');
            $Employer = new EmployerModel();

            foreach ($Employer->loardCompanyEmplAll($CName) as $crow) {
                $this_row = array(
                    'Id' => $crow->id,
                    'Name' => $crow->name,
                    'Mobile' => $crow->mobile,
                    'Email' => $crow->email,
                    'UserName' => $crow->username,
                    'Password' => $crow->password,
                    'Status' => $crow->status
                );       
                $response[] = $this_row;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);
    }

    function sortByExpDate(Request $request){
        try {

            $date1 = $request->input('date1');
            $date2 = $request->input('date2');
            $Employer = new EmployerModel();

            $val = sizeof($Employer->sortByExpDate($date1, $date2));

                if($val>0){
                    error_log('oky');
                    foreach ($Employer->sortByExpDate($date1, $date2) as $crow ) {

                        $this_row = array(
                            'Id' => $crow->ID,
                            'Name' => $crow->Name,
                            'Mobile' => $crow->Mobile,
                            'Email' => $crow->Email,
                            'Country' => $crow->Country,
                            'States' => $crow->States,
                            'ABN' => $crow->ABN,
                            'Market' => $crow->Market,
                            'EXPDate' => $crow->EXPDate,
                            'Status' => $crow->Status
                        );       
                        $response[] = $this_row;

                    }

                }  

        } catch (\Exception $e) {
            error_log($e);
        }
       
       if($val>0){
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);
       }
       
    }

    function sortByloardCompanyID(Request $request){
        try {

            $CName = $request->input('id');
            $Employer = new EmployerModel();

            foreach ($Employer->sortByloardCompanyID($CName) as $crow) {
                $this_row = array(
                    'Id' => $crow->ID,
                    'Name' => $crow->Name,
                    'Mobile' => $crow->Mobile,
                    'Email' => $crow->Email,
                    'Country' => $crow->Country,
                    'States' => $crow->States,
                    'ABN' => $crow->ABN,
                    'Market' => $crow->Market,
                    'EXPDate' => $crow->EXPDate,
                    'Status' => $crow->Status
                );       
                $response[] = $this_row;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);
    }

    function sortByloardCompanyName(Request $request){
        try {

            $CName = $request->input('id');
            $Employer = new EmployerModel();

            error_log($CName);

            foreach ($Employer->sortByloardCompanyName($CName) as $crow) {
                $this_row = array(
                    'Id' => $crow->ID,
                    'Name' => $crow->Name,
                    'Mobile' => $crow->Mobile,
                    'Email' => $crow->Email,
                    'Country' => $crow->Country,
                    'States' => $crow->States,
                    'ABN' => $crow->ABN,
                    'Market' => $crow->Market,
                    'EXPDate' => $crow->EXPDate,
                    'Status' => $crow->Status
                );       
                $response[] = $this_row;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);
    }
    
    function sortByloardCountryNames(Request $request){
        try {

            $CName = $request->input('id');
            $Employer = new EmployerModel();

            error_log($CName);

            foreach ($Employer->sortByloardCountryNames($CName) as $crow) {
                $this_row = array(
                    'Id' => $crow->ID,
                    'Name' => $crow->Name,
                    'Mobile' => $crow->Mobile,
                    'Email' => $crow->Email,
                    'Country' => $crow->Country,
                    'States' => $crow->States,
                    'ABN' => $crow->ABN,
                    'Market' => $crow->Market,
                    'EXPDate' => $crow->EXPDate,
                    'Status' => $crow->Status
                );       
                $response[] = $this_row;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);
    }

    function sortByMarketingNames(Request $request){
        try {

            $MName = $request->input('id');
            $Employer = new EmployerModel();

            foreach ($Employer->sortByMarketingNames($MName) as $crow) {
                $this_row = array(
                    'Id' => $crow->ID,
                    'Name' => $crow->Name,
                    'Mobile' => $crow->Mobile,
                    'Email' => $crow->Email,
                    'Country' => $crow->Country,
                    'States' => $crow->States,
                    'ABN' => $crow->ABN,
                    'Market' => $crow->Market,
                    'EXPDate' => $crow->EXPDate,
                    'Status' => $crow->Status
                );       
                $response[] = $this_row;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);
    }

    function loardMarketingNames(Request $request){
        try {
            $Employer = new EmployerModel();
            foreach ($Employer->loardMarketingNames() as $crow) {
                $this_row = array(
                    'name' => $crow->name
                );       
                $response[] = $this_row;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);
    }

    function loardCountryNames(Request $request){
        try {
            $Employer = new EmployerModel();
            foreach ($Employer->loardCountryNames() as $crow) {
                $this_row = array(
                    'name' => $crow->name
                );       
                $response[] = $this_row;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);
    }

    function loardCompanyName(Request $request){
        try {
            $Employer = new EmployerModel();
            foreach ($Employer->getCompanyName() as $crow) {
                $this_row = array(
                    'id' => $crow->id,
                    'name' => $crow->name
                );       
                $response[] = $this_row;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);
    }

    function sortWithStatus(Request $request){
        try {

            $Status = $request->input('id');
           
            $Employer = new EmployerModel();

            foreach ($Employer->loardDataAllbyStatus($Status) as $crow) {

                $this_row = array(
                    'Id' => $crow->ID,
                    'Name' => $crow->Name,
                    'Mobile' => $crow->Mobile,
                    'Email' => $crow->Email,
                    'Country' => $crow->Country,
                    'States' => $crow->States,
                    'ABN' => $crow->ABN,
                    'Market' => $crow->Market,
                    'EXPDate' => $crow->EXPDate,
                    'Status' => $crow->Status
                );       

                $response[] = $this_row;
            }

            return response()->json([
                'name' => $response,
                'state' => 'ACTIVE'
            ]);

        } catch (\Exception $e) {
            error_log($e);
        }

    } 

    function updateCompany(Request $request){

        $Id = $request->input('id.Id');
        $Mobile = $request->input('id.Mobile');
        $Email = $request->input('id.Email');
        $ExpDate = $request->input('id.ExpDate');
        $Status = $request->input('id.Status');

        $Employer = new EmployerModel();
        return response()->json([
            'name' => $Employer->updateCompany($Id,$Mobile,$Email,$ExpDate,$Status),
            'state' => 'ACTIVE'
        ]);
    }

    function loardCompanyDataAll(Request $request){

        try {
           
            $Employer = new EmployerModel();

            foreach ($Employer->loardDataAll() as $crow) {

                $this_row = array(
                    'Id' => $crow->ID,
                    'Name' => $crow->Name,
                    'Mobile' => $crow->Mobile,
                    'Email' => $crow->Email,
                    'Country' => $crow->Country,
                    'States' => $crow->States,
                    'ABN' => $crow->ABN,
                    'Market' => $crow->Market,
                    'EXPDate' => $crow->EXPDate,
                    'Status' => $crow->Status
                );       

                $response[] = $this_row;
            }

            return response()->json([
                'name' => $response,
                'state' => 'ACTIVE'
            ]);

        } catch (\Exception $e) {
            error_log($e);
        }

    }

    function addCountry(Request $request){

        try {

            $CName = $request->input('CName');

            $Employer = new EmployerModel();
            $Employer->addCountry($CName);

        } catch (\Exception $e) {
            error_log($e);
        }

    }

    function addStates(Request $request){

        try {
            
            $CName = $request->input('CName');
            $SName = $request->input('SName');

            $Employer = new EmployerModel();
            $Employer->addStates($CName,$SName);

        } catch (\Exception $e) {
            error_log($e);
        }

    }

    function addEmployer(Request $request)
    {

        try {
            $No = $request->input('company.No');
            $Name = $request->input('company.Name');
            $Email = $request->input('company.Email');
            $Mobile = $request->input('company.Mobile');
            $Country = $request->input('company.Country');
            $States = $request->input('company.States');
            $Status = $request->input('company.Status');
            $EXPDate = $request->input('company.EXPDate');
            $Web = $request->input('company.Web');
            $TFN = $request->input('company.TFN');
            $ABN = $request->input('company.ABN');
            $ACN = $request->input('company.ACN');
            $WorkCov = $request->input('company.WorkCov');
            $PublicCov = $request->input('company.PublicCov');
            $LabourCov = $request->input('company.LabourCov');

            $Password = $request->input('login.Password');

            $Attandance = $request->input('privilage.attendance');
            $TimeSheet = $request->input('privilage.timesheet');
            $Payment = $request->input('privilage.payment');


            $Employer = new EmployerModel();
            $Employer->saveCompany($No,$Name,$ABN,$ACN,$TFN,$Email,$Mobile,$Web,$WorkCov,$PublicCov,$LabourCov,$States,$Status,$Password,$Attandance,$TimeSheet,$Payment);
        } catch (\Exception $e) {
            error_log($e);
        }
        
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);
    }

    function nextCompanyNo(Request $request)
    {
        try {

            $Employer = new EmployerModel();
            foreach ($Employer->getCompanyNo() as $crow) {
                $nxtNo = $crow->id;
            }
            error_log($nxtNo);
            if ($nxtNo == null) {
                $nxtNo = 16778;
            }else{
                $nxtNo = $nxtNo +1;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $nxtNo,
            'state' => 'ACTIVE'
        ]);

    }

    function loardCountry(Request $request){

        try {
            $Employer = new EmployerModel();
            foreach ($Employer->getCountry() as $crow) {
                $this_row = array(
                    'id' => $crow->id,
                    'name' => $crow->name
                );       
                $response[] = $this_row;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);

    }

    function loardState(Request $request){

        try {
            $id = $request->input('id');

            $Employer = new EmployerModel();
            
            foreach ($Employer->getCountry2($id) as $crow) {
                $this_row = array(
                    'id' => $crow->id,
                    'name' => $crow->name
                );       
                $response[] = $this_row;
            }

        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json([
            'name' => $response,
            'state' => 'ACTIVE'
        ]);

    }

}

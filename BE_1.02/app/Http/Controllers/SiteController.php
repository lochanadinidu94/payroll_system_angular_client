<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\webClient;

class SiteController extends Controller
{
    public function saveNewSite(Request $request){
        try {
    
            $ClientNo = $request->input('id.LogedUserId');
            $Name = $request->input('id.Name');
            $Address = $request->input('id.Address');
            $Lati = $request->input('id.Lati');
            $Long = $request->input('id.Long');
            $Status = $request->input('id.States');
    
            $webClient = new webClient();
    
            return response()->json([
            'name' => $webClient->saveNewSite($ClientNo,$Name,$Address,$Lati,$Long,$Status),
            'state' => 'ACTIVE'
            ]);
    
        }  catch (\Exception $th) {
            error_log($th);
        }
    }
    
    public function loardAllSites(Request $request){
        try {
    
            $ClientNo = $request->input('id');
    
            $webClient = new webClient();
    
            return response()->json([
            'name' => $webClient->loardAllSites($ClientNo),
            'state' => 'ACTIVE'
            ]);
    
        }  catch (\Exception $th) {
            error_log($th);
        }
    }

    public function loardAllSitesforShift(Request $request){
        try {
    
            $ClientNo = $request->input('id');
    
            $webClient = new webClient();
    
            return response()->json([
            'name' => $webClient->loardAllSitesforShift($ClientNo),
            'state' => 'ACTIVE'
            ]);
    
        }  catch (\Exception $th) {
            error_log($th);
        }
    }

    public function loardSiteById(Request $request){
        try {
    
            $SiteID = $request->input('id');
    
            $webClient = new webClient();
    
            return response()->json([
            'name' => $webClient->loardSiteById($SiteID),
            'state' => 'ACTIVE'
            ]);
    
        }  catch (\Exception $th) {
            error_log($th);
        }
    }

    public function updatedata(Request $request){
        try {
    
            $SiteID = $request->input('id.id');
            $Name = $request->input('id.name');
            $Status = $request->input('id.ststus');
    
            $webClient = new webClient();

            error_log($Status);
    
            return response()->json([
            'name' => $webClient->updatedata($SiteID,$Name,$Status),
            'state' => 'ACTIVE'
            ]);
    
        }  catch (\Exception $th) {
            error_log($th);
        }
    }

    public function addnewShift(Request $request){
        try {
    
            $SiteID = $request->input('id.id');
            $ShiftName = $request->input('id.sName');
            $ShiftHourType = $request->input('id.sHType');
            $ShiftHours = $request->input('id.sH');
    
            $webClient = new webClient();
    
            return response()->json([
            'name' => $webClient->addnewShift($SiteID,$ShiftName,$ShiftHourType,$ShiftHours),
            'state' => 'ACTIVE'
            ]);
    
        }  catch (\Exception $th) {
            error_log($th);
        }
    }
    public function loardShiftData(Request $request){
        try {
    
            $ClientID = $request->input('id');
    
            error_log($ClientID);

            $webClient = new webClient();
    
            return response()->json([
            'name' => $webClient->loardShiftData($ClientID),
            'state' => 'ACTIVE'
            ]);
    
        }  catch (\Exception $th) {
            error_log($th);
        }
    }

    public function updateShiftbyId(Request $request){
        try {
    

            $SiteID = $request->input('id.id');
            $Name = $request->input('id.name');
            $Status = $request->input('id.states');
    
            $webClient = new webClient();

            error_log($Status);
    
            return response()->json([
            'name' => $webClient->updateShiftbyId($SiteID,$Name,$Status),
            'state' => 'ACTIVE'
            ]);
    
        }  catch (\Exception $th) {
            error_log($th);
        }
    }

    public function serachShift(Request $request){
        try {
    
            $ClientID = $request->input('id.id');
            $Text = $request->input('id.text');

            error_log('aaaaaaaaaaa');

            $webClient = new webClient();
    
            return response()->json([
            'name' => $webClient->serachShift($ClientID,$Text),
            'state' => 'ACTIVE'
            ]);
    
        }  catch (\Exception $th) {
            error_log($th);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Tables\Employer_ProfileModel;
use Tymon\JWTAuth\Facades\JWTAuth;


class EmployerModel extends Model 
{
    

    public function updateCompany($Id,$Mobile,$Email,$ExpDate,$Status){

        try {

            $EPT = new \App\Models\Tables\employer_profilesModel();
            
            $EPT::where('idEmployer_Profile',$Id)->update(['Email'=>$Email, 'Mobile'=> $Mobile, 'EXPDate'=> $ExpDate, 'Status' => $Status]);

            return 'Successfully Updated';

        } catch (\Exception $th) {
            error_log($th);
            return $th;
        }

    }

    public function loardDataAll(){

        return DB::select('SELECT
                        EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile as ID,
                        EmployeeManagementSystem.Employer_Profiles.EName as Name,
                        EmployeeManagementSystem.Employer_Profiles.Mobile as Mobile,
                        EmployeeManagementSystem.Employer_Profiles.Email as Email,
                        EmployeeManagementSystem.Country.CName as Country,
                        EmployeeManagementSystem.States.SName as States,
                        EmployeeManagementSystem.Employer_Profiles.ABN as ABN,
                        EmployeeManagementSystem.Employer_Profiles.ACN as Market,
                        EmployeeManagementSystem.Employer_Profiles.EXPDate as EXPDate,
                        EmployeeManagementSystem.Employer_Profiles.`Status` as Status
                        FROM
                        EmployeeManagementSystem.States
                        JOIN EmployeeManagementSystem.Employer_Profiles
                        ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.Employer_Profiles.States_idStates 
                        JOIN EmployeeManagementSystem.Country
                        ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry', [1]);

    //                     // error_log($aa);
    }

    public function loardDataAllbyStatus($status){

        error_log($status);

        return DB::select('SELECT
                    EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile AS ID,
                    EmployeeManagementSystem.Employer_Profiles.EName AS `Name`,
                    EmployeeManagementSystem.Employer_Profiles.Mobile AS Mobile,
                    EmployeeManagementSystem.Employer_Profiles.Email AS Email,
                    EmployeeManagementSystem.Country.CName AS Country,
                    EmployeeManagementSystem.States.SName AS States,
                    EmployeeManagementSystem.Employer_Profiles.ABN AS ABN,
                    EmployeeManagementSystem.Employer_Profiles.ACN AS Market,
                    EmployeeManagementSystem.Employer_Profiles.EXPDate AS EXPDate,
                    EmployeeManagementSystem.Employer_Profiles.`Status` AS `Status`
                    FROM
                    EmployeeManagementSystem.States
                    JOIN EmployeeManagementSystem.Employer_Profiles
                    ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.Employer_Profiles.States_idStates 
                    JOIN EmployeeManagementSystem.Country
                    ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry
                    WHERE
                    `Status` = "'.$status.'" ', [1]);

    //                     // error_log($aa);
    }


    public function addStates($CName,$SName){

        $ST = new \App\Models\Tables\statesModel();

        $ST->Country_idCountry = $CName;
        $ST->SName = $SName;
        $ST->save();


    }

    public function addCountry($CName){

        $CT = new \App\Models\Tables\countryModel();

        $CT->CName = $CName;
        $CT->save();


    }

    public function getCompanyNo()
    {
        return DB::select('SELECT
                            Max(EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile) as id
                            FROM
                            EmployeeManagementSystem.Employer_Profiles', [1]);

    }

    public function getCompanyName(){
        return DB::select('SELECT
                            EmployeeManagementSystem.Employer_Profiles.EName as name,
                            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile as id
                            FROM
                            EmployeeManagementSystem.Employer_Profiles', [1]);
    }

    public function loardCountryNames(){
        return DB::select('SELECT
                            DISTINCT EmployeeManagementSystem.Country.CName as name
                            FROM
                            EmployeeManagementSystem.Country
                            JOIN EmployeeManagementSystem.States
                            ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry 
                            JOIN EmployeeManagementSystem.Employer_Profiles
                            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.Employer_Profiles.States_idStates', [1]);
    }
    

    public function loardMarketingNames(){
        return DB::select('SELECT
                            DISTINCT EmployeeManagementSystem.Employer_Profiles.ACN as name
                            FROM
                            EmployeeManagementSystem.Employer_Profiles', [1]);
    }

    public function sortByMarketingNames($MName){
        return DB::select('SELECT
                            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile AS ID,
                            EmployeeManagementSystem.Employer_Profiles.EName AS `Name`,
                            EmployeeManagementSystem.Employer_Profiles.Mobile AS Mobile,
                            EmployeeManagementSystem.Employer_Profiles.Email AS Email,
                            EmployeeManagementSystem.Country.CName AS Country,
                            EmployeeManagementSystem.States.SName AS States,
                            EmployeeManagementSystem.Employer_Profiles.ABN AS ABN,
                            EmployeeManagementSystem.Employer_Profiles.ACN AS Market,
                            EmployeeManagementSystem.Employer_Profiles.EXPDate AS EXPDate,
                            EmployeeManagementSystem.Employer_Profiles.`Status` AS `Status`
                            FROM
                            EmployeeManagementSystem.States
                            JOIN EmployeeManagementSystem.Employer_Profiles
                            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.Employer_Profiles.States_idStates 
                            JOIN EmployeeManagementSystem.Country
                            ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry
                            WHERE
                            EmployeeManagementSystem.Employer_Profiles.ACN = "'.$MName.'"', [1]);
    }

    public function sortByloardCountryNames($CName){

        return DB::select('SELECT
                            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile AS ID,
                            EmployeeManagementSystem.Employer_Profiles.EName AS `Name`,
                            EmployeeManagementSystem.Employer_Profiles.Mobile AS Mobile,
                            EmployeeManagementSystem.Employer_Profiles.Email AS Email,
                            EmployeeManagementSystem.Country.CName AS Country,
                            EmployeeManagementSystem.States.SName AS States,
                            EmployeeManagementSystem.Employer_Profiles.ABN AS ABN,
                            EmployeeManagementSystem.Employer_Profiles.ACN AS Market,
                            EmployeeManagementSystem.Employer_Profiles.EXPDate AS EXPDate,
                            EmployeeManagementSystem.Employer_Profiles.`Status` AS `Status`
                            FROM
                            EmployeeManagementSystem.States
                            JOIN EmployeeManagementSystem.Employer_Profiles
                            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.Employer_Profiles.States_idStates 
                            JOIN EmployeeManagementSystem.Country
                            ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry
                            WHERE
                            EmployeeManagementSystem.Country.CName = "'.$CName.'"', [1]);
    }

    public function sortByloardCompanyName($CName){

        return DB::select('SELECT
                            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile AS ID,
                            EmployeeManagementSystem.Employer_Profiles.EName AS `Name`,
                            EmployeeManagementSystem.Employer_Profiles.Mobile AS Mobile,
                            EmployeeManagementSystem.Employer_Profiles.Email AS Email,
                            EmployeeManagementSystem.Country.CName AS Country,
                            EmployeeManagementSystem.States.SName AS States,
                            EmployeeManagementSystem.Employer_Profiles.ABN AS ABN,
                            EmployeeManagementSystem.Employer_Profiles.ACN AS Market,
                            EmployeeManagementSystem.Employer_Profiles.EXPDate AS EXPDate,
                            EmployeeManagementSystem.Employer_Profiles.`Status` AS `Status`
                            FROM
                            EmployeeManagementSystem.States
                            JOIN EmployeeManagementSystem.Employer_Profiles
                            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.Employer_Profiles.States_idStates 
                            JOIN EmployeeManagementSystem.Country
                            ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry
                            WHERE
                            EmployeeManagementSystem.Employer_Profiles.EName  = "'.$CName.'"', [1]);
    }

    public function sortByloardCompanyID($CName){

        return DB::select('SELECT
                            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile AS ID,
                            EmployeeManagementSystem.Employer_Profiles.EName AS `Name`,
                            EmployeeManagementSystem.Employer_Profiles.Mobile AS Mobile,
                            EmployeeManagementSystem.Employer_Profiles.Email AS Email,
                            EmployeeManagementSystem.Country.CName AS Country,
                            EmployeeManagementSystem.States.SName AS States,
                            EmployeeManagementSystem.Employer_Profiles.ABN AS ABN,
                            EmployeeManagementSystem.Employer_Profiles.ACN AS Market,
                            EmployeeManagementSystem.Employer_Profiles.EXPDate AS EXPDate,
                            EmployeeManagementSystem.Employer_Profiles.`Status` AS `Status`
                            FROM
                            EmployeeManagementSystem.States
                            JOIN EmployeeManagementSystem.Employer_Profiles
                            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.Employer_Profiles.States_idStates 
                            JOIN EmployeeManagementSystem.Country
                            ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry
                            WHERE
                            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile  = "'.$CName.'"', [1]);
    }

    public function sortByExpDate($date1, $date2){

        return DB::select('SELECT
                            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile AS ID,
                            EmployeeManagementSystem.Employer_Profiles.EName AS `Name`,
                            EmployeeManagementSystem.Employer_Profiles.Mobile AS Mobile,
                            EmployeeManagementSystem.Employer_Profiles.Email AS Email,
                            EmployeeManagementSystem.Country.CName AS Country,
                            EmployeeManagementSystem.States.SName AS States,
                            EmployeeManagementSystem.Employer_Profiles.ABN AS ABN,
                            EmployeeManagementSystem.Employer_Profiles.ACN AS Market,
                            EmployeeManagementSystem.Employer_Profiles.EXPDate AS EXPDate,
                            EmployeeManagementSystem.Employer_Profiles.`Status` AS `Status`
                            FROM
                            EmployeeManagementSystem.States
                            JOIN EmployeeManagementSystem.Employer_Profiles
                            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.Employer_Profiles.States_idStates 
                            JOIN EmployeeManagementSystem.Country
                            ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry
                            WHERE
                            EmployeeManagementSystem.Employer_Profiles.EXPDate BETWEEN "'.$date1.'" AND "'.$date2.'"', [1]);
    }

    public function loardCompanyEmplAll($CName){


        return DB::select('SELECT
                            EmployeeManagementSystem.Employer_Users.idEmployer_Users as id,
                            EmployeeManagementSystem.Employer_Users.`Name` as name,
                            EmployeeManagementSystem.Employer_Users.Mobile as mobile,
                            EmployeeManagementSystem.Employer_Users.Email as email,
                            EmployeeManagementSystem.Employer_Users_Logins.User_Name as username,
                            EmployeeManagementSystem.Employer_Users_Logins.`Password` as password,
                            EmployeeManagementSystem.Employer_Users_Status.`Status` as status
                            FROM
                            EmployeeManagementSystem.Employer_Users
                            JOIN EmployeeManagementSystem.Employer_Users_Logins
                            ON EmployeeManagementSystem.Employer_Users.idEmployer_Users = EmployeeManagementSystem.Employer_Users_Logins.Employer_Users_idEmployer_Users 
                            JOIN EmployeeManagementSystem.Employer_Users_Status
                            ON EmployeeManagementSystem.Employer_Users_Status.idEmployer_Users_Status = EmployeeManagementSystem.Employer_Users.Employer_Users_Status_idEmployer_Users_Status
                            WHERE
                            EmployeeManagementSystem.Employer_Users.Employer_Profiles_idEmployer_Profile = "'.$CName.'" ', [1]);
    }

    public function addEventDate($evntName,$evntDate,$evntState){

        $EPT = new \App\Models\Tables\EvtCalander();
        $EPT->EvtName = $evntName;
        $EPT->date = $evntDate;
        $EPT->States_idStates = $evntState;
        $EPT->save();

    }

    public function loardEventDate(){
        return DB::select('SELECT
                            EmployeeManagementSystem.EvtCalander.idCal as id,
                            EmployeeManagementSystem.EvtCalander.EvtName as name,
                            EmployeeManagementSystem.EvtCalander.date as date,
                            EmployeeManagementSystem.Country.CName as country,
                            EmployeeManagementSystem.States.SName as states
                            FROM
                            EmployeeManagementSystem.Country
                            JOIN EmployeeManagementSystem.States
                            ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry 
                            JOIN EmployeeManagementSystem.EvtCalander
                            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.EvtCalander.States_idStates', [1]);
    }

    public function sortEventDate($date1,$date2){
        return DB::select('SELECT
                            EmployeeManagementSystem.EvtCalander.idCal as id,
                            EmployeeManagementSystem.EvtCalander.EvtName as name,
                            EmployeeManagementSystem.EvtCalander.date as date,
                            EmployeeManagementSystem.Country.CName as country,
                            EmployeeManagementSystem.States.SName as states
                            FROM
                            EmployeeManagementSystem.Country
                            JOIN EmployeeManagementSystem.States
                            ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry 
                            JOIN EmployeeManagementSystem.EvtCalander
                            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.EvtCalander.States_idStates
                            Where EmployeeManagementSystem.EvtCalander.date BETWEEN "'.$date1.'" AND "'.$date2.'"', [1]);
    }

    public function deleteEvtDate($evtId){
        $EPT = new \App\Models\Tables\EvtCalander();
        $EPT ::where('idCal',$evtId)->delete();
    }

    public function saveCompany($No,$Name,$ABN,$ACN,$TFN,$Email,$Mobile,$Web,$WorkCov,$PublicCov,$LabourCov,$States,$Status,$Password,$Attandance,$TimeSheet,$Payment)
    {
        // error_log($No);

        try {
            
                $EPT = new \App\Models\Tables\employer_profilesModel();

                $EPT->idEmployer_Profile = $No;
                $EPT->EName = $Name;
                $EPT->ABN = $ABN;
                $EPT->ACN = $ACN;
                $EPT->TFN = $TFN;
                $EPT->Email = $Email;
                $EPT->Mobile = $Mobile;
                $EPT->Web = $Web;
                $EPT->WorkCoverNumber = $WorkCov;
                $EPT->PublicLibilityNumber = $PublicCov;
                $EPT->LaboureCoverNumber = $LabourCov;
                $EPT->Status = $Status;
                $EPT->States_idStates = $States;

                $EPT->save();

                $EUT = new \App\Models\Tables\employer_usersModel();

                $EUT->Name = $Name;
                $EUT->Mobile = $Mobile;
                $EUT->Email = $Email;
                $EUT->Employer_Profiles_idEmployer_Profile = $No;
                $EUT->Employer_Users_Type_idEmployer_Users_Type = 1;
                $EUT->Employer_Users_Status_idEmployer_Users_Status = 1;

                $EUT->save();

                $EmpUsrNo;

                $EmpUsrNoData = DB::select('SELECT
                EmployeeManagementSystem.Employer_Users.idEmployer_Users as id
                FROM
                EmployeeManagementSystem.Employer_Users
                WHERE
                EmployeeManagementSystem.Employer_Users.Employer_Profiles_idEmployer_Profile = '.$No, [1]);

                foreach($EmpUsrNoData as $crow){
                    $EmpUsrNo = $crow->id;
                }


                $ELT = new \App\Models\Tables\employer_users_loginsModel();

                $ELT->User_Name = $No;
                $ELT->Password = $Password;
                $ELT->Employer_Users_idEmployer_Users = $EmpUsrNo;

                $ELT->save();
                  

                $EUPT = new \App\Models\Tables\employer_users_pivilegesModel();

                $EUPT->Employer_Profile = 1;
                $EUPT->Employee_Profile = 1;
                $EUPT->Attandences_Profile = 1;
                $EUPT->Payment_Profile = 1;
                $EUPT->employer_users_idEmployer_Users = $EmpUsrNo;

                $EUPT->save();

                
                

        } catch (\Exception $th) {
            $EPT::rollback();
            $EUT::rollback();
            $ELT::rollback();
            $EUPT::rollback();
            error_log($th);
        }
    }

    public function getCountry(){
        return DB::select('SELECT
                            EmployeeManagementSystem.Country.idCountry as id,
                            EmployeeManagementSystem.Country.CName as name
                            FROM
                            EmployeeManagementSystem.Country', [1]);
    }

    public function getCountry2($id){
        return DB::select('SELECT
                            EmployeeManagementSystem.States.SName as name,
                            EmployeeManagementSystem.States.idStates as id
                            FROM
                            EmployeeManagementSystem.States where Country_idCountry = '.$id, [1]);   
    }
    

}

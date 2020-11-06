<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Tables\Employer_ProfileModel;
use Tymon\JWTAuth\Facades\JWTAuth;

class webClient extends Model
{

    public function loardSystmeUsersbyName($ClientNo, $txt){
        error_log($txt);
        return DB::select('SELECT
            EmployeeManagementSystem.Employer_Users.idEmployer_Users AS Id,
            EmployeeManagementSystem.employer_users_types.Type AS Roll,
            EmployeeManagementSystem.Employer_Users.`Name` AS `Name`,
            EmployeeManagementSystem.Employer_Users.Mobile AS Mobile,
            EmployeeManagementSystem.Employer_Users.Email AS Email,
            EmployeeManagementSystem.Employer_Users_Pivileges.Employer_Profile AS Company,
            EmployeeManagementSystem.Employer_Users_Pivileges.Employee_Profile AS Workers,
            EmployeeManagementSystem.Employer_Users_Pivileges.Attandences_Profile AS Sites,
            EmployeeManagementSystem.Employer_Users_Pivileges.Payment_Profile AS Payments,
            EmployeeManagementSystem.Employer_Users_Status.`Status`
            FROM
            EmployeeManagementSystem.employer_users_types
            JOIN EmployeeManagementSystem.Employer_Users
            ON EmployeeManagementSystem.employer_users_types.idEmployer_Users_Type = EmployeeManagementSystem.Employer_Users.Employer_Users_Type_idEmployer_Users_Type 
            JOIN EmployeeManagementSystem.Employer_Users_Status
            ON EmployeeManagementSystem.Employer_Users_Status.idEmployer_Users_Status = EmployeeManagementSystem.Employer_Users.Employer_Users_Status_idEmployer_Users_Status 
            JOIN EmployeeManagementSystem.Employer_Users_Pivileges
            ON EmployeeManagementSystem.Employer_Users.idEmployer_Users = EmployeeManagementSystem.Employer_Users_Pivileges.employer_users_idEmployer_Users
            WHERE
            EmployeeManagementSystem.Employer_Users.Employer_Profiles_idEmployer_Profile = "'.$ClientNo.'"
            And EmployeeManagementSystem.Employer_Users.`Name` like  "%'.$txt.'%"', [1]);
    }

    public function loardSystmeUsers($ClientNo){
        error_log($ClientNo);
        return DB::select('SELECT
            EmployeeManagementSystem.Employer_Users.idEmployer_Users AS Id,
            EmployeeManagementSystem.employer_users_types.Type AS Roll,
            EmployeeManagementSystem.Employer_Users.`Name` AS `Name`,
            EmployeeManagementSystem.Employer_Users.Mobile AS Mobile,
            EmployeeManagementSystem.Employer_Users.Email AS Email,
            EmployeeManagementSystem.Employer_Users_Pivileges.Employer_Profile AS Company,
            EmployeeManagementSystem.Employer_Users_Pivileges.Employee_Profile AS Workers,
            EmployeeManagementSystem.Employer_Users_Pivileges.Attandences_Profile AS Sites,
            EmployeeManagementSystem.Employer_Users_Pivileges.Payment_Profile AS Payments,
            EmployeeManagementSystem.Employer_Users_Status.`Status`
            FROM
            EmployeeManagementSystem.employer_users_types
            JOIN EmployeeManagementSystem.Employer_Users
            ON EmployeeManagementSystem.employer_users_types.idEmployer_Users_Type = EmployeeManagementSystem.Employer_Users.Employer_Users_Type_idEmployer_Users_Type 
            JOIN EmployeeManagementSystem.Employer_Users_Status
            ON EmployeeManagementSystem.Employer_Users_Status.idEmployer_Users_Status = EmployeeManagementSystem.Employer_Users.Employer_Users_Status_idEmployer_Users_Status 
            JOIN EmployeeManagementSystem.Employer_Users_Pivileges
            ON EmployeeManagementSystem.Employer_Users.idEmployer_Users = EmployeeManagementSystem.Employer_Users_Pivileges.employer_users_idEmployer_Users
            WHERE
            EmployeeManagementSystem.Employer_Users.Employer_Profiles_idEmployer_Profile = "'.$ClientNo.'"', [1]);
    }

    public function saveNewSystemUser($ClientNo,$Name,$Mobile,$Email,$UserType,$Company,$Workers,$Sites,$Payment){

    try{

        $EUT = new \App\Models\Tables\employer_usersModel();

        $EUT->Name = $Name;
        $EUT->Mobile = $Mobile;
        $EUT->Email = $Email;
        $EUT->Employer_Profiles_idEmployer_Profile = $ClientNo;
        $EUT->Employer_Users_Type_idEmployer_Users_Type = $UserType;
        $EUT->Employer_Users_Status_idEmployer_Users_Status = 1;

        $EUT->save();

        $EmpUsrNo;

        $EmpUsrNoData = DB::select('SELECT
            Max(EmployeeManagementSystem.Employer_Users.idEmployer_Users) as id
            FROM
            EmployeeManagementSystem.Employer_Users', [1]);

        foreach($EmpUsrNoData as $crow){
            $EmpUsrNo = $crow->id;
        }

        $EUPT = new \App\Models\Tables\employer_users_pivilegesModel();

        $EUPT->Employer_Profile = $Company;
        $EUPT->Employee_Profile = $Workers;
        $EUPT->Attandences_Profile = $Sites;
        $EUPT->Payment_Profile = $Payment;
        $EUPT->employer_users_idEmployer_Users = $EmpUsrNo;

        $EUPT->save();

        return 'Successfully Saved New User for the System';

    }  catch (\Exception $th) {
        error_log($th);
    }


    }

    public function webLogin($username,$password){

        return DB::select('SELECT DISTINCT
            EmployeeManagementSystem.Employer_Users_Logins.Employer_Users_idEmployer_Users as uid,
            EmployeeManagementSystem.Employer_Users.`Name` as name
            FROM
            EmployeeManagementSystem.Employer_Users
            JOIN EmployeeManagementSystem.Employer_Users_Logins
            ON EmployeeManagementSystem.Employer_Users.idEmployer_Users = EmployeeManagementSystem.Employer_Users_Logins.Employer_Users_idEmployer_Users
            WHERE
            EmployeeManagementSystem.Employer_Users_Logins.User_Name = "'.$username.'"
            and EmployeeManagementSystem.Employer_Users_Logins.`Password` = "'.$password.'" ', [1]);


    }

    public function getCurrentCompanyDetails($ClientNo){


        return DB::select('SELECT
            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile as ClientNo,
            EmployeeManagementSystem.Employer_Profiles.EName as ClientName,
            EmployeeManagementSystem.Employer_Profiles.Email as Email,
            EmployeeManagementSystem.Employer_Profiles.Mobile as Mobile,
            EmployeeManagementSystem.Country.CName as Country,
            EmployeeManagementSystem.States.SName as States,
            EmployeeManagementSystem.Employer_Profiles.updated_at as UpdatecDate,
            EmployeeManagementSystem.Employer_Profiles.created_at as CreatedDate,
            EmployeeManagementSystem.Employer_Profiles.`Status` as ActiveStatus,
            EmployeeManagementSystem.Employer_Profiles.EXPDate as ExpDate,
            EmployeeManagementSystem.Employer_Profiles.ABN as ABN,
            EmployeeManagementSystem.Employer_Profiles.ACN as ACN,
            EmployeeManagementSystem.Employer_Profiles.TFN As TFN,
            EmployeeManagementSystem.Employer_Profiles.WorkCoverNumber as WCNo,
            EmployeeManagementSystem.Employer_Profiles.PublicLibilityNumber as PLNo,
            EmployeeManagementSystem.Employer_Profiles.LaboureCoverNumber as LCNo,
            EmployeeManagementSystem.Employer_Profiles.Web as Web
            FROM
            EmployeeManagementSystem.Country
            JOIN EmployeeManagementSystem.States
            ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry 
            JOIN EmployeeManagementSystem.Employer_Profiles
            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.Employer_Profiles.States_idStates
            WHERE
            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile ="'.$ClientNo.'"', [1]);
    }

    public function updateCompany($ClientNo,$TFN,$WorkCoverNo,$PublicLNo,$LaboureCNo,$Web){

        try {

            $EPT = new \App\Models\Tables\employer_profilesModel();
            
            $EPT::where('idEmployer_Profile',$ClientNo)->update(['TFN'=>$TFN,
                'WorkCoverNumber'=> $WorkCoverNo,
                'PublicLibilityNumber'=> $PublicLNo, 'LaboureCoverNumber' => $LaboureCNo, 'Web' => $Web]);

            return 'Successfully Updated';

        } catch (\Exception $th) {
            error_log($th);
            return $th;
        }

    }


    public function UpdateSystemUser($SystemUserNo,$Email,$Mobile,$Company,$Payment,$Workers,$Sites,$Status){


        $EUT = new \App\Models\Tables\employer_usersModel();
            
        $EUT::where('idEmployer_Users',$SystemUserNo)->update(['Email'=>$Email, 'Mobile'=> $Mobile
        ,'Employer_Users_Status_idEmployer_Users_Status'=> $Status]);

        $EUPT = new \App\Models\Tables\employer_users_pivilegesModel();

        $EUPT::where('employer_users_idEmployer_Users',$SystemUserNo)->update(['Employer_Profile'=>$Company,
         'Employee_Profile'=> $Workers,'Attandences_Profile'=> $Sites,'Payment_Profile'=> $Payment]);

        return 'Successfully Updated';


    }

    public function loradBankByCountry($LogedClientNo){


        return DB::select('SELECT
            EmployeeManagementSystem.Banks.`Name` as Name,
            EmployeeManagementSystem.Banks.idBanks as Id
            FROM
            EmployeeManagementSystem.States
            JOIN EmployeeManagementSystem.Employer_Profiles
            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.Employer_Profiles.States_idStates 
            JOIN EmployeeManagementSystem.Country
            ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.States.Country_idCountry 
            JOIN EmployeeManagementSystem.Banks
            ON EmployeeManagementSystem.Country.idCountry = EmployeeManagementSystem.Banks.country_idCountry
            WHERE
            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile = "'.$LogedClientNo.'"', [1]);
    }
    
    public function SaveNewBankCard($ClientNo,$BankName,$BankCardName,$BankCardNo,$BankExpDate,$CVVNo){
        try {
            
            $EUT = new \App\Models\Tables\employeer_BankCardModel();

            $EUT->Bank = $BankName;
            $EUT->Card_Name = $BankCardName;
            $EUT->Card_Number = $BankCardNo;
            $EUT->Card_Exp_Date = $BankExpDate;
            $EUT->Card_CVV_Number = $CVVNo;
            $EUT->employer_profiles_idEmployer_Profile = $ClientNo;

            $EUT->save();

            return 'Successfully Updated';

        } catch (\Exception $th) {
            error_log($th);
        }
    }

    public function loardBankCardsDetailsByClientNo($LogedClientNo){


        return DB::select('SELECT
            EmployeeManagementSystem.Employeer_BankCards.idEmployeer_BankCards as Id,
            EmployeeManagementSystem.Employeer_BankCards.Bank as Bank,
            EmployeeManagementSystem.Employeer_BankCards.Card_Name as CardName,
            EmployeeManagementSystem.Employeer_BankCards.Card_Number as CardNumber,
            EmployeeManagementSystem.Employeer_BankCards.Card_Exp_Date as ExpDate,
            EmployeeManagementSystem.Employeer_BankCards.Card_CVV_Number as CVV
            FROM
            EmployeeManagementSystem.Employeer_BankCards
            WHERE
            EmployeeManagementSystem.Employeer_BankCards.employer_profiles_idEmployer_Profile = "'.$LogedClientNo.'"', [1]);
    }

    public function removeBankCard($CardNo){

        $EPT = new \App\Models\Tables\employeer_BankCardModel();
        $EPT ::where('idEmployeer_BankCards',$CardNo)->delete();

        return 'Successfully Deleted';
    }

    public function AddNewPayPeriod($ClientNo,$startDate,$endDate,$payName,$status,$totDate){

        try {

            
            $EUT = new \App\Models\Tables\Pay_PeriodModel();

            $EUT->Start_date = $startDate;
            $EUT->End_Date = $endDate;
            $EUT->Name = $payName;
            $EUT->Status = $status;
            $EUT->TotDates = $totDate;
            $EUT->Employer_Profiles_idEmployer_Profile = $ClientNo;

            $EUT->save();

            return 'Successfully Updated';

        } catch (\Exception $th) {
            error_log($th);
        }
        
    }

    public function loardPayPeriodsDetails($LogedClientNo){


        return DB::select('SELECT
            EmployeeManagementSystem.pay_periods.idPay_Period as Id,
            EmployeeManagementSystem.pay_periods.`Name` as Name,
            EmployeeManagementSystem.pay_periods.Start_date as SDate,
            EmployeeManagementSystem.pay_periods.End_Date as EDate,
            EmployeeManagementSystem.pay_periods.TotDates as TDate,
            EmployeeManagementSystem.pay_periods.updated_at as UDate,
            EmployeeManagementSystem.pay_periods.`Status` as Status
            FROM
            EmployeeManagementSystem.Employer_Profiles 
            JOIN EmployeeManagementSystem.pay_periods
            ON EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile = EmployeeManagementSystem.pay_periods.Employer_Profiles_idEmployer_Profile
            WHERE
            EmployeeManagementSystem.pay_periods.Employer_Profiles_idEmployer_Profile = "'.$LogedClientNo.'"
            ORDER BY
            EmployeeManagementSystem.pay_periods.idPay_Period DESC', [1]);
    }

    public function changepayperiodststus($Id,$States){

        $x;

        if($States == 1){
            $x = 0;
        }else{
            $x = 1;
        }

        $EUT = new \App\Models\Tables\Pay_PeriodModel();
            
        $EUT::where('idPay_Period',$Id)->update(['Status'=>$x]);

        return 'Successfully Updated';


    }

    public function loardPayPeriodsDetailsByName($LogedClientNo,$TextSerch){


        return DB::select('SELECT
            EmployeeManagementSystem.pay_periods.idPay_Period as Id,
            EmployeeManagementSystem.pay_periods.`Name` as Name,
            EmployeeManagementSystem.pay_periods.Start_date as SDate,
            EmployeeManagementSystem.pay_periods.End_Date as EDate,
            EmployeeManagementSystem.pay_periods.TotDates as TDate,
            EmployeeManagementSystem.pay_periods.updated_at as UDate,
            EmployeeManagementSystem.pay_periods.`Status` as Status
            FROM
            EmployeeManagementSystem.Employer_Profiles 
            JOIN EmployeeManagementSystem.pay_periods
            ON EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile = EmployeeManagementSystem.pay_periods.Employer_Profiles_idEmployer_Profile
            WHERE
            EmployeeManagementSystem.pay_periods.Employer_Profiles_idEmployer_Profile = "'.$LogedClientNo.'" AND
            EmployeeManagementSystem.pay_periods.`Name` like "%'.$TextSerch.'%"
            ORDER BY
            EmployeeManagementSystem.pay_periods.idPay_Period DESC', [1]);
    }

    public function loardEventsByClientCountry($LogedClientNo){


        return DB::select('SELECT
            EmployeeManagementSystem.EvtCalander.date as Date,
            EmployeeManagementSystem.EvtCalander.EvtName as Name
            FROM
            EmployeeManagementSystem.States
            JOIN EmployeeManagementSystem.EvtCalander
            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.EvtCalander.States_idStates 
            JOIN EmployeeManagementSystem.Employer_Profiles
            ON EmployeeManagementSystem.States.idStates = EmployeeManagementSystem.Employer_Profiles.States_idStates
            WHERE
            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile = "'.$LogedClientNo.'" ', [1]);
    }

    public function saveNewSite($ClientNo,$Name,$Address,$Lati,$Long,$Status){

        try {

            $EUT = new \App\Models\Tables\SitesModel();

            $EUT->Name = $Name;
            $EUT->SiteDis = 'add description';
            $EUT->Location = $Address;
            $EUT->GeoTag = $Lati;
            $EUT->GeoTag2 = $Long;
            $EUT->Range = 1200;
            $EUT->States = $Status;
            $EUT->Employer_Profiles_idEmployer_Profile = $ClientNo;

            $EUT->save();

            return 'Successfully Updated';

        } catch (\Exception $th) {
            error_log($th);
        }
        
    }

    public function loardAllSites($LogedClientNo){

        return DB::select('SELECT
            EmployeeManagementSystem.Sites.idSites as Id,
            EmployeeManagementSystem.Sites.`Name` as Name,
            EmployeeManagementSystem.Sites.Location as Address,
            EmployeeManagementSystem.Sites.GeoTag as Lati,
            EmployeeManagementSystem.Sites.GeoTag2 as Lg,
            EmployeeManagementSystem.Sites.States as States
            FROM
            EmployeeManagementSystem.Employer_Profiles
            JOIN EmployeeManagementSystem.Sites
            ON EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile = EmployeeManagementSystem.Sites.Employer_Profiles_idEmployer_Profile
            WHERE
            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile = "'.$LogedClientNo.'" ', [1]);
    }

    public function loardAllSitesforShift($LogedClientNo){

        return DB::select('SELECT
            EmployeeManagementSystem.Sites.idSites as Id,
            EmployeeManagementSystem.Sites.`Name` as Name,
            EmployeeManagementSystem.Sites.Location as Address,
            EmployeeManagementSystem.Sites.GeoTag as Lati,
            EmployeeManagementSystem.Sites.GeoTag2 as Lg,
            EmployeeManagementSystem.Sites.States as States
            FROM
            EmployeeManagementSystem.Employer_Profiles
            JOIN EmployeeManagementSystem.Sites
            ON EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile = EmployeeManagementSystem.Sites.Employer_Profiles_idEmployer_Profile
            WHERE
            EmployeeManagementSystem.Employer_Profiles.idEmployer_Profile = "'.$LogedClientNo.'" and EmployeeManagementSystem.Sites.States = 1', [1]);
    }

    public function loardSiteById($SiteID){

        return DB::select('SELECT DISTINCT
            EmployeeManagementSystem.Sites.idSites as Id,
            EmployeeManagementSystem.Sites.`Name` as Name,
            EmployeeManagementSystem.Sites.Location as Address,
            EmployeeManagementSystem.Sites.GeoTag as Lati,
            EmployeeManagementSystem.Sites.GeoTag2 as Lg,
            EmployeeManagementSystem.Sites.States as States
            FROM
            EmployeeManagementSystem.Sites
            WHERE
            EmployeeManagementSystem.Sites.idSites  = "'.$SiteID.'" ', [1]);
    }

    public function updatedata($SiteID,$Name,$Status){

        $EUT = new \App\Models\Tables\SitesModel();

        if($Name == ''){
            $EUT::where('idSites',$SiteID)->update(['States'=>$Status]);
        }else{
            $EUT::where('idSites',$SiteID)->update(['States'=>$Status,'Name'=>$Name]);
        }   

        return 'Successfully Updated';


    }

    public function addnewShift($SiteID,$ShiftName,$ShiftHourType,$ShiftHours){

        try {

            $EUT = new \App\Models\Tables\Sites_ShiftsModel();

            $EUT->Name = $ShiftName;
            $EUT->Sites_Hours_Type_idSites_Hours_Type = $ShiftHourType;
            $EUT->Sites_idSites = $SiteID;
            $EUT->States = 1;

            $EUT->save();

            $SiteNumber;

            $SiteNoData = DB::select('SELECT
                Max(EmployeeManagementSystem.Sites_Shifts.idSites_Shifts) as Id
                FROM
                EmployeeManagementSystem.Sites_Shifts', [1]);
    
            foreach($SiteNoData as $crow){
                $SiteNumber = $crow->Id;
            }
    
            $EUPT = new \App\Models\Tables\Sites_Ftat_HoursModel();
    
            $EUPT->hours = $ShiftHours;
            $EUPT->Sites_Shifts_idSites_Shifts = $SiteNumber;
    
            $EUPT->save();
    
            return 'Successfully Saved New Shift for the System';

        } catch (\Exception $th) {
            error_log($th);
        }
        
    }

    public function loardShiftData($ClientID){

        error_log($ClientID);

        return DB::select('SELECT
            EmployeeManagementSystem.Sites.idSites as SitId,
            EmployeeManagementSystem.Sites.`Name` as SitName,
            EmployeeManagementSystem.Sites_Shifts.idSites_Shifts as ShId,
            EmployeeManagementSystem.Sites_Shifts.`Name`  as ShName,
            EmployeeManagementSystem.Sites_Hours_Type.Type as Tp,
            EmployeeManagementSystem.Sites_Ftat_Hours.hours as Hours,
            EmployeeManagementSystem.Sites_Shifts.States as States
            FROM
            EmployeeManagementSystem.Sites
            JOIN EmployeeManagementSystem.Sites_Shifts
            ON EmployeeManagementSystem.Sites.idSites = EmployeeManagementSystem.Sites_Shifts.Sites_idSites 
            JOIN EmployeeManagementSystem.Sites_Ftat_Hours
            ON EmployeeManagementSystem.Sites_Shifts.idSites_Shifts = EmployeeManagementSystem.Sites_Ftat_Hours.Sites_Shifts_idSites_Shifts 
            JOIN EmployeeManagementSystem.Sites_Hours_Type
            ON EmployeeManagementSystem.Sites_Hours_Type.idSites_Hours_Type = EmployeeManagementSystem.Sites_Shifts.Sites_Hours_Type_idSites_Hours_Type
            WHERE
            EmployeeManagementSystem.Sites.Employer_Profiles_idEmployer_Profile = "'.$ClientID.'" 
            ORDER BY
            EmployeeManagementSystem.Sites_Shifts.idSites_Shifts ASC', [1]);

    

    }

public function updateShiftbyId($SiteID,$Name,$Status){


    $EUT = new \App\Models\Tables\Sites_ShiftsModel();

    if($Name == ''){
        $EUT::where('idSites_Shifts',$SiteID)->update(['States'=>$Status]);
    }else{
        $EUT::where('idSites_Shifts',$SiteID)->update(['States'=>$Status,'Name'=>$Name]);
    }   

    return 'Successfully Updated';


}

public function serachShift($ClientID,$Text){

    error_log($Text);

    return DB::select('SELECT
        EmployeeManagementSystem.Sites.idSites as SitId,
        EmployeeManagementSystem.Sites.`Name` as SitName,
        EmployeeManagementSystem.Sites_Shifts.idSites_Shifts as ShId,
        EmployeeManagementSystem.Sites_Shifts.`Name`  as ShName,
        EmployeeManagementSystem.Sites_Hours_Type.Type as Tp,
        EmployeeManagementSystem.Sites_Ftat_Hours.hours as Hours,
        EmployeeManagementSystem.Sites_Shifts.States as States
        FROM
        EmployeeManagementSystem.Sites
        JOIN EmployeeManagementSystem.Sites_Shifts
        ON EmployeeManagementSystem.Sites.idSites = EmployeeManagementSystem.Sites_Shifts.Sites_idSites 
        JOIN EmployeeManagementSystem.Sites_Ftat_Hours
        ON EmployeeManagementSystem.Sites_Shifts.idSites_Shifts = EmployeeManagementSystem.Sites_Ftat_Hours.Sites_Shifts_idSites_Shifts 
        JOIN EmployeeManagementSystem.Sites_Hours_Type
        ON EmployeeManagementSystem.Sites_Hours_Type.idSites_Hours_Type = EmployeeManagementSystem.Sites_Shifts.Sites_Hours_Type_idSites_Hours_Type
        WHERE
        EmployeeManagementSystem.Sites.Employer_Profiles_idEmployer_Profile = "'.$ClientID.'" 
        And
        EmployeeManagementSystem.Sites.`Name` like "%'.$Text.'%"
        Or
        EmployeeManagementSystem.Sites_Shifts.`Name` like "%'.$Text.'%"
        ORDER BY
        EmployeeManagementSystem.Sites_Shifts.idSites_Shifts ASC', [1]);


}

public function addNewEmployee($ClientNo,$Id,$Name,$DOB,$Gender,
        $Mobile,$Email,$Address,$PaymentBy,$ABN,$TaxPur,$TaxFree,$PaymentCircle,
        $WeekdayRate,$HolidayRate,
        $SundayRate,$SaturdayRate,$Bank,$AccountName,$BSB,$AccountNo,$States){

        $EPT = new \App\Models\Tables\Employee_ProfilesModel();
        $ELT = new \App\Models\Tables\Employee_LoginsModel();
        $ETT = new \App\Models\Tables\EmployeeTaxModel();
        $EET = new \App\Models\Tables\employer_has_employeesModel();


    if($Id == ''){
        error_log('New Employee for New Client');

        $EPT->EName = $Name;
        $EPT->DOB = $DOB;
        $EPT->Gender = $Gender;
        $EPT->Mobile = $Mobile;
        $EPT->Email = $Email;
        $EPT->Address = $Address;
        $EPT->Profile_Pic = '';

        $EPT->save();

        $EmpNo;

        $EmpNoData = DB::select('SELECT
        Max(EmployeeManagementSystem.Employee_Profiles.idEmployee_Profiles) as Id
        FROM
        EmployeeManagementSystem.Employee_Profiles', [1]);
    
        foreach($EmpNoData as $crow){
                $EmpNo = $crow->Id;
        }

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%&!$%^&');
        $password = substr($random, 0, 5);
        error_log($password);

        $ELT->User_Name = $Email;
        $ELT->Password = $password;
        $ELT->Employee_Profiles_idEmployee_Profiles = $EmpNo;

        $ELT->save();

        $ETT->PayType = $PaymentBy;
        $ETT->ABN = $ABN;
        $ETT->TaxPurposes = $TaxPur;
        $ETT->TaxFreeThreshold = $TaxFree;
        $ETT->Taxbypayperiod = $PaymentCircle;

        $ETT->save();
        

        $ETNo;

        $ETNoData = DB::select('SELECT
            Max(EmployeeManagementSystem.EmployeeTax.idEmployeeTax) as Id
            FROM
            EmployeeManagementSystem.EmployeeTax', [1]);
    
        foreach($ETNoData as $crow){
                $ETNo = $crow->Id;
        }

        $EET->employer_profiles_idEmployer_Profile = $ClientNo;
        $EET->employee_profiles_idEmployee_Profiles = $EmpNo;
        $EET->Banks_idBanks = $Bank;
        $EET->AccountName = $AccountName;
        $EET->BSB = $BSB;
        $EET->AccountNumber = $AccountNo;
        $EET->Rate_WeekDay = $WeekdayRate;
        $EET->Rate_Holiday = $HolidayRate;
        $EET->Rate_Sunday = $SundayRate;
        $EET->Rate_Saturday = $SaturdayRate;
        $EET->EmployeeTax_idEmployeeTax = $ETNo;
        $EET->States = $States;

        $EET->save();

        return 'New Employee for Your System';

    }else{
        error_log('Exsisting Employee for New Client');

        $ETT->PayType = $PaymentBy;
        $ETT->ABN = $ABN;
        $ETT->TaxPurposes = $TaxPur;
        $ETT->TaxFreeThreshold = $TaxFree;
        $ETT->Taxbypayperiod = $PaymentCircle;

        $ETT->save();
        

        $ETNo;

        $ETNoData = DB::select('SELECT
            Max(EmployeeManagementSystem.EmployeeTax.idEmployeeTax) as Id
            FROM
            EmployeeManagementSystem.EmployeeTax', [1]);
    
        foreach($ETNoData as $crow){
                $ETNo = $crow->Id;
        }

        $EET->employer_profiles_idEmployer_Profile = $ClientNo;
        $EET->employee_profiles_idEmployee_Profiles = $Id;
        $EET->Banks_idBanks = $Bank;
        $EET->AccountName = $AccountName;
        $EET->BSB = $BSB;
        $EET->AccountNumber = $AccountNo;
        $EET->Rate_WeekDay = $WeekdayRate;
        $EET->Rate_Holiday = $HolidayRate;
        $EET->Rate_Sunday = $SundayRate;
        $EET->Rate_Saturday = $SaturdayRate;
        $EET->EmployeeTax_idEmployeeTax = $ETNo;
        $EET->States = $States;

        $EET->save();

        return 'Exsisting Employee for Your System';
    }

}

public function searchexsistingemployee($text){


    return DB::select('SELECT DISTINCT
    EmployeeManagementSystem.Employee_Profiles.idEmployee_Profiles as ID,
    EmployeeManagementSystem.Employee_Profiles.EName as Name,
    EmployeeManagementSystem.Employee_Profiles.DOB as DOB,
    EmployeeManagementSystem.Employee_Profiles.Gender as Gender,
    EmployeeManagementSystem.Employee_Profiles.Mobile as Mobile,
    EmployeeManagementSystem.Employee_Profiles.Email as Email,
    EmployeeManagementSystem.Employee_Profiles.Address as Address
    FROM
    EmployeeManagementSystem.Employee_Profiles
    WHERE
    EmployeeManagementSystem.Employee_Profiles.Mobile = "'.$text.'" 
    or EmployeeManagementSystem.Employee_Profiles.Email = "'.$text.'" ', [1]);


}

}

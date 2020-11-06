<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Super Admin

Route::post('employer/add', 'EmployerController@addEmployer');

Route::post('county/addCountry', 'EmployerController@addCountry');

Route::post('county/addStates', 'EmployerController@addStates');

Route::post('employer/nextCompanyNo', 'EmployerController@nextCompanyNo');

Route::post('employer/loardCountry', 'EmployerController@loardCountry');

Route::post('employer/loardState', 'EmployerController@loardState');

Route::post('employer/abc', 'EmployerController@loardCompanyDataAll');

Route::post('employer/updateRec', 'EmployerController@updateCompany');

Route::post('employer/sortWithStatus', 'EmployerController@sortWithStatus');

Route::post('employer/loardCompanyName', 'EmployerController@loardCompanyName');

Route::post('employer/loardCountryNames', 'EmployerController@loardCountryNames');

Route::post('employer/loardMarketingNames', 'EmployerController@loardMarketingNames');

Route::post('employer/sortByMarketingNames', 'EmployerController@sortByMarketingNames');

Route::post('employer/sortByloardCountryNames', 'EmployerController@sortByloardCountryNames');

Route::post('employer/sortByloardCompanyName', 'EmployerController@sortByloardCompanyName');

Route::post('employer/sortByloardCompanyID', 'EmployerController@sortByloardCompanyID');

Route::post('employer/sortByExpDate', 'EmployerController@sortByExpDate');

Route::post('employer/loardEmployerUserDetails', 'EmployerController@loardCompanyEmplAll');

Route::post('employer/addEventDate', 'EmployerController@addEventDate');

Route::post('employer/loardEventDate', 'EmployerController@loardEventDate');

Route::post('employer/sortEventDate', 'EmployerController@sortEventDate');

Route::post('employer/deleteEvtDate', 'EmployerController@deleteEvtDate');

// web client routes

Route::post('webClient/webLogin', 'LoginController@webLogin');

Route::post('webClient/getCurrentCompanyDetails', 'CompanyProfileController@getCurrentCompanyDetails');

Route::post('webClient/updateCurrentCompany', 'CompanyProfileController@updateCurrentCompany');

Route::post('webClient/saveNewSystemUser', 'CompanyProfileController@saveNewSystemUser');

Route::post('webClient/loardSystmeUsers', 'CompanyProfileController@loardSystmeUsers');

Route::post('webClient/loardSystmeUsersbyName', 'CompanyProfileController@loardSystmeUsersbyName');

Route::post('webClient/UpdateSystmeUsers', 'CompanyProfileController@UpdateSystmeUsers');

Route::post('webClient/loradBankByCountry', 'CompanyProfileController@loradBankByCountry');

Route::post('webClient/SaveNewBankCard', 'CompanyProfileController@SaveNewBankCard');

Route::post('webClient/loardBankCardsDetailsByClientNo', 'CompanyProfileController@loardBankCardsDetailsByClientNo');

Route::post('webClient/removeBankCard', 'CompanyProfileController@removeBankCard');

Route::post('webClient/AddNewPayPeriod', 'CompanyProfileController@AddNewPayPeriod');

Route::post('webClient/loardPayPeriodsDetails', 'CompanyProfileController@loardPayPeriodsDetails');

Route::post('webClient/changepayperiodststus', 'CompanyProfileController@changepayperiodststus');

Route::post('webClient/loardPayPeriodsDetailsByName', 'CompanyProfileController@loardPayPeriodsDetailsByName');

Route::post('webClient/loardEventsByClientCountry', 'CompanyProfileController@loardEventsByClientCountry');


Route::post('webClient/saveNewSite', 'SiteController@saveNewSite');

Route::post('webClient/loardAllSites', 'SiteController@loardAllSites');

Route::post('webClient/loardAllSitesforShift', 'SiteController@loardAllSitesforShift');

Route::post('webClient/loardSiteById', 'SiteController@loardSiteById');

Route::post('webClient/updatedata', 'SiteController@updatedata');

Route::post('webClient/addnewShift', 'SiteController@addnewShift');

Route::post('webClient/loardShiftData', 'SiteController@loardShiftData');

Route::post('webClient/updateShiftbyId', 'SiteController@updateShiftbyId');

Route::post('webClient/serachShift', 'SiteController@serachShift');


Route::post('webClient/addNewEmployee', 'EmployeeController@addNewEmployee');

Route::post('webClient/searchexsistingemployee', 'EmployeeController@searchexsistingemployee');

Route::get('/', function () {
    return view('welcome');
});

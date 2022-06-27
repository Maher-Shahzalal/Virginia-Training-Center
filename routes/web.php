<?php

use App\Business_english;
use App\English_architecture;
use App\English_Diplomatic;
use App\English_Media;
use App\English_medicine;
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

Route::get('/', function () {
    return view('index');
});

Route::post('index','NewsletterController@store');


Route::get('/IELTS_OET','IeltsController@indexx');
//Route::get('/IELTS_OET','OetController@indexx');

Route::get('/Business_ethics','TrainingCourses\BusinessEthicsController@indexx');
Route::get('/Business_strategy','TrainingCourses\BusinessStrategyController@indexx');
Route::get('/Entrepreneurship','TrainingCourses\EntrepreneurshipController@indexx');
Route::get('/HR','TrainingCourses\HRController@indexx');
Route::get('/Innovation','TrainingCourses\InnovationController@indexx');
Route::get('/Logistics','TrainingCourses\LogisticsController@indexx');
Route::get('/Management_Leadership','TrainingCourses\ManagementLeadershipController@indexx');
Route::get('/Marketing','TrainingCourses\MarketingController@indexx');
Route::get('/Social_Media','TrainingCourses\SocialMediaController@indexx');
Route::get('/Digital_Marketing','TrainingCourses\DigitalMarketingController@indexx');
Route::get('/Professional_Development','TrainingCourses\ProfessionalDevelopmentController@indexx');
Route::get('/Project_Management','TrainingCourses\ProjectManagementController@indexx');
Route::get('/Teacher_Training','TrainingCourses\TeacherTrainingController@indexx');
Route::get('/NGO','TrainingCourses\NGOController@indexx');


Route::get('/General_English','GeneralEnglishController@indexx');


Route::get('/Professional_English','ProfessionalEnglishController@indexx');
Route::get('/Business_English','ProfessionalEnglish\BusinessEnglishController@indexx');
Route::get('/English_Banking','ProfessionalEnglish\EnglishBankingController@indexx');
Route::get('/English_Diplomatic','ProfessionalEnglish\EnglishDiplomaticController@indexx');
Route::get('/English_Media','ProfessionalEnglish\EnglishMediaController@indexx');
Route::get('/English_Legal','ProfessionalEnglish\EnglishLegalController@indexx');
Route::get('/English_Insurance','ProfessionalEnglish\EnglishInsuranceController@indexx');
Route::get('/English_Tourism','ProfessionalEnglish\EnglishTourismController@indexx');
Route::get('/English_Army','ProfessionalEnglish\EnglishArmyController@indexx');
Route::get('/English_IT','ProfessionalEnglish\EnglishITController@indexx');
Route::get('/English_Architecture','ProfessionalEnglish\EnglishArchitectureController@indexx');
Route::get('/English_Medicine','ProfessionalEnglish\EnglishMedicineController@indexx');







/**
 * Route::get('/TOFEL','TofelController@indexx');

  Route::get('/PTE','PteController@indexx');
 */



Route::get('/gallery','GalleryController@indexx');

Route::get('/about','ContactController@indexx');

Route::get('/event','EventController@indexx');

Route::post('/contact','ContactController@store');

Route::get('/about', function () {
    return view('about');
});


Route::get('/event-details', function () {
    return view('event-details');
});

Route::get('/elements', function () {
    return view('elements');
});

Route::get('/courses', function () {
    return view('courses');
});

// -------[ IELTS details ]-----------

Route::get('/ielts_listening', function () {
    return view('ielts_listening');
});

Route::get('/ielts_writing', function () {
    return view('ielts_writing');
});

Route::get('/ielts_reading', function () {
    return view('ielts_reading');
});

Route::get('/ielts_speaking', function () {
    return view('ielts_speaking');
});

Route::get('/ielts_vocabulary', function () {
    return view('ielts_vocabulary');
});

Route::get('/ielts_grammar', function () {
    return view('ielts_grammar');
});

Route::get('/ielts_band7', function () {
    return view('ielts_band7');
});

//-------------------------------------------------------

Route::get('/tofel-details', function () {
    return view('tofel-details');
});

Route::get('/pte-details', function () {
    return view('pte-details');
});

Route::get('/oet-details', function () {
    return view('oet-details');
});

Route::get('/blog-single', function () {
    return view('blog-single');
});

Route::get('/blog-home', function () {
    return view('blog-home');
});

// ------------------------------[ User panil ]--------------------------------

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/admin_home', 'UserController@index');

//-----------------------------------------------------------------------------

// ------------------------------[ Admin panil ]--------------------------------

Auth::routes(['verify'=>true]);
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::prefix('admin_home')-> group(function() {

        Route::get('showusers', 'ShowusersController@index');
        Route::get('showusers/{User}/delete', 'UserController@destroy');

        Route::get('/profile', 'ProfileController@index');
        Route::post('profile', 'ProfileController@update');

        Route::get('add_ielts_course','IeltsController@create');
        Route::post('add_ielts_course','IeltsController@store');
        Route::get('index_ielts/{Ielts}/edit_ielts_course','IeltsController@edit');  // IELTS
        Route::post('index_ielts/{Ielts}','IeltsController@update');
        Route::get('index_ielts','IeltsController@index');
        Route::get('index_ielts/{Ielts}/delete','IeltsController@destroy');


        Route::get('add_oet_course','OetController@create');
        Route::post('add_oet_course','OetController@store');
        Route::get('index_oet/{Oet}/edit_oet_course','OetController@edit');  // OET
        Route::post('index_oet/{Oet}','OetController@update');
        Route::get('index_oet','OetController@index');
        Route::get('index_oet/{Oet}/delete','OetController@destroy');

        Route::get('add_general_english_course','GeneralEnglishController@create');
        Route::post('add_general_english_course','GeneralEnglishController@store');
        Route::get('index_general_english/{General_English}/edit_general_english_course','GeneralEnglishController@edit');  // General English
        Route::post('index_general_english/{General_English}','GeneralEnglishController@update');
        Route::get('index_general_english','GeneralEnglishController@index');
        Route::get('index_general_english/{General_English}/delete','GeneralEnglishController@destroy');

        Route::get('add_professional_english_course','ProfessionalEnglishController@create');
        Route::post('add_professional_english_course','ProfessionalEnglishController@store');
        Route::get('index_professional_english/{Professional_English}/edit_professional_english_course','ProfessionalEnglishController@edit');  // Professional English
        Route::post('index_professional_english/{Professional_English}','ProfessionalEnglishController@update');
        Route::get('index_professional_english','ProfessionalEnglishController@index');
        Route::get('index_professional_english/{Professional_English}/delete','ProfessionalEnglishController@destroy');

        //  -----------------------[ Tranining Courses ]--------------------------------------------

        Route::get('add_business_ethics_course','TrainingCourses\BusinessEthicsController@create');
        Route::post('add_business_ethics_course','TrainingCourses\BusinessEthicsController@store');
        Route::get('index_business_ethics/{Business_ethics}/edit_business_ethics_course','TrainingCourses\BusinessEthicsController@edit');  // Business ethics
        Route::post('index_business_ethics/{Business_ethics}','TrainingCourses\BusinessEthicsController@update');
        Route::get('index_business_ethics','TrainingCourses\BusinessEthicsController@index');
        Route::get('index_business_ethics/{Business_ethics}/delete','TrainingCourses\BusinessEthicsController@destroy');

        Route::get('add_business_strategy_course','TrainingCourses\BusinessStrategyController@create');
        Route::post('add_business_strategy_course','TrainingCourses\BusinessStrategyController@store');
        Route::get('index_business_strategy/{Business_strategy}/edit_business_strategy_course','TrainingCourses\BusinessStrategyController@edit');  // Businesss strategy
        Route::post('index_business_strategy/{Business_strategy}','TrainingCourses\BusinessStrategyController@update');
        Route::get('index_business_strategy','TrainingCourses\BusinessStrategyController@index');
        Route::get('index_business_strategy/{Business_strategy}/delete','TrainingCourses\BusinessStrategyController@destroy');

        Route::get('add_entrepreneurship_course','TrainingCourses\EntrepreneurshipController@create');
        Route::post('add_entrepreneurship_course','TrainingCourses\EntrepreneurshipController@store');
        Route::get('index_entrepreneurship/{Entrepreneurship}/edit_entrepreneurship_course','TrainingCourses\EntrepreneurshipController@edit');  // Entrepreneurships
        Route::post('index_entrepreneurship/{Entrepreneurship}','TrainingCourses\EntrepreneurshipController@update');
        Route::get('index_entrepreneurship','TrainingCourses\EntrepreneurshipController@index');
        Route::get('index_entrepreneurship/{Entrepreneurship}/delete','TrainingCourses\EntrepreneurshipController@destroy');

        Route::get('add_hr_course','TrainingCourses\HRController@create');
        Route::post('add_hr_course','TrainingCourses\HRController@store');
        Route::get('index_hr/{HR}/edit_hr_course','TrainingCourses\HRController@edit');  // HR
        Route::post('index_hr/{HR}','TrainingCourses\HRController@update');
        Route::get('index_hr','TrainingCourses\HRController@index');
        Route::get('index_hr/{HR}/delete','TrainingCourses\HRController@destroy');

        Route::get('add_innovation_course','TrainingCourses\InnovationController@create');
        Route::post('add_innovation_course','TrainingCourses\InnovationController@store');
        Route::get('index_innovation/{Innovation}/edit_innovation_course','TrainingCourses\InnovationController@edit');  // Innovation
        Route::post('index_innovation/{Innovation}','TrainingCourses\InnovationController@update');
        Route::get('index_innovation','TrainingCourses\InnovationController@index');
        Route::get('index_innovation/{Innovation}/delete','TrainingCourses\InnovationController@destroy');

        Route::get('add_logistics_course','TrainingCourses\LogisticsController@create');
        Route::post('add_logistics_course','TrainingCourses\LogisticsController@store');
        Route::get('index_logistics/{Logistics}/edit_logistics_course','TrainingCourses\LogisticsController@edit');  // Logistics
        Route::post('index_logistics/{Logistics}','TrainingCourses\LogisticsController@update');
        Route::get('index_logistics','TrainingCourses\LogisticsController@index');
        Route::get('index_logistics/{Logistics}/delete','TrainingCourses\LogisticsController@destroy');

        Route::get('add_management_leadership_course','TrainingCourses\ManagementLeadershipController@create');
        Route::post('add_management_leadership_course','TrainingCourses\ManagementLeadershipController@store');
        Route::get('index_management_leadership/{Management_Leadership}/edit_management_leadership_course','TrainingCourses\ManagementLeadershipController@edit');  // Management and Leadership
        Route::post('index_management_leadership/{Management_Leadership}','TrainingCourses\ManagementLeadershipController@update');
        Route::get('index_management_leadership','TrainingCourses\ManagementLeadershipController@index');
        Route::get('index_management_leadership/{Management_Leadership}/delete','TrainingCourses\ManagementLeadershipController@destroy');

        Route::get('add_marketing_course','TrainingCourses\MarketingController@create');
        Route::post('add_marketing_course','TrainingCourses\MarketingController@store');
        Route::get('index_marketing/{Marketing}/edit_marketing_course','TrainingCourses\MarketingController@edit');  // Marketing
        Route::post('index_marketing/{Marketing}','TrainingCourses\MarketingController@update');
        Route::get('index_marketing','TrainingCourses\MarketingController@index');
        Route::get('index_marketing/{Marketing}/delete','TrainingCourses\MarketingController@destroy');

        Route::get('add_social_media_course','TrainingCourses\SocialMediaController@create');
        Route::post('add_social_media_course','TrainingCourses\SocialMediaController@store');
        Route::get('index_social_media/{Social_Media}/edit_social_media_course','TrainingCourses\SocialMediaController@edit');  // Social Media
        Route::post('index_social_media/{Social_Media}','TrainingCourses\SocialMediaController@update');
        Route::get('index_social_media','TrainingCourses\SocialMediaController@index');
        Route::get('index_social_media/{Social_Media}/delete','TrainingCourses\SocialMediaController@destroy');

        Route::get('add_digital_marketing_course','TrainingCourses\DigitalMarketingController@create');
        Route::post('add_digital_marketing_course','TrainingCourses\DigitalMarketingController@store');
        Route::get('index_digital_marketing/{Digital_Marketing}/edit_digital_marketing_course','TrainingCourses\DigitalMarketingController@edit');  // Digital Marketing
        Route::post('index_digital_marketing/{Digital_Marketing}','TrainingCourses\DigitalMarketingController@update');
        Route::get('index_digital_marketing','TrainingCourses\DigitalMarketingController@index');
        Route::get('index_digital_marketing/{Digital_Marketing}/delete','TrainingCourses\DigitalMarketingController@destroy');

        Route::get('add_professional_development_course','TrainingCourses\ProfessionalDevelopmentController@create');
        Route::post('add_professional_development_course','TrainingCourses\ProfessionalDevelopmentController@store');
        Route::get('index_professional_development/{Professional_Development}/edit_professional_development_course','TrainingCourses\ProfessionalDevelopmentController@edit');  // Professional Development
        Route::post('index_professional_development/{Professional_Development}','TrainingCourses\ProfessionalDevelopmentController@update');
        Route::get('index_professional_development','TrainingCourses\ProfessionalDevelopmentController@index');
        Route::get('index_professional_development/{Professional_Development}/delete','TrainingCourses\ProfessionalDevelopmentController@destroy');

        Route::get('add_project_management_course','TrainingCourses\ProjectManagementController@create');
        Route::post('add_project_management_course','TrainingCourses\ProjectManagementController@store');
        Route::get('index_project_management/{Project_Management}/edit_project_management_course','TrainingCourses\ProjectManagementController@edit');  // Project Management
        Route::post('index_project_management/{Project_Management}','TrainingCourses\ProjectManagementController@update');
        Route::get('index_project_management','TrainingCourses\ProjectManagementController@index');
        Route::get('index_project_management/{Project_Management}/delete','TrainingCourses\ProjectManagementController@destroy');

        Route::get('add_teacher_training_course','TrainingCourses\TeacherTrainingController@create');
        Route::post('add_teacher_training_course','TrainingCourses\TeacherTrainingController@store');
        Route::get('index_teacher_training/{Teacher_Training}/edit_teacher_training_course','TrainingCourses\TeacherTrainingController@edit');  // Teacher Training
        Route::post('index_teacher_training/{Teacher_Training}','TrainingCourses\TeacherTrainingController@update');
        Route::get('index_teacher_training','TrainingCourses\TeacherTrainingController@index');
        Route::get('index_teacher_training/{Teacher_Training}/delete','TrainingCourses\TeacherTrainingController@destroy');

        Route::get('add_ngo_course','TrainingCourses\NGOController@create');
        Route::post('add_ngo_course','TrainingCourses\NGOController@store');
        Route::get('index_ngo/{NGO}/edit_ngo_course','TrainingCourses\NGOController@edit');  // NGO
        Route::post('index_ngo/{NGO}','TrainingCourses\NGOController@update');
        Route::get('index_ngo','TrainingCourses\NGOController@index');
        Route::get('index_ngo/{NGO}/delete','TrainingCourses\NGOController@destroy');

        Route::get('index_newsletter','NewsletterController@index');
        Route::get('index_newsletter/{Newsletter}/delete','NewsletterController@destroy');

      //  ---------------------------------------------------------------------------------------------


        //  -----------------------[ Professional English Courses ]--------------------------------------------


        Route::get('add_business_english_course','ProfessionalEnglish\BusinessEnglishController@create');
        Route::post('add_business_english_course','ProfessionalEnglish\BusinessEnglishController@store');
        Route::get('index_business_english/{Business_english}/edit_business_english_course','ProfessionalEnglish\BusinessEnglishController@edit');  // Business_english
        Route::post('index_business_english/{Business_english}','ProfessionalEnglish\BusinessEnglishController@update');
        Route::get('index_business_english','ProfessionalEnglish\BusinessEnglishController@index');
        Route::get('index_business_english/{Business_english}/delete','ProfessionalEnglish\BusinessEnglishController@destroy');

        Route::get('add_english_banking_course','ProfessionalEnglish\EnglishBankingController@create');
        Route::post('add_english_banking_course','ProfessionalEnglish\EnglishBankingController@store');
        Route::get('index_english_banking/{English_banking}/edit_english_banking_course','ProfessionalEnglish\EnglishBankingController@edit');  // English Banking
        Route::post('index_english_banking/{English_banking}','ProfessionalEnglish\EnglishBankingController@update');
        Route::get('index_english_banking','ProfessionalEnglish\EnglishBankingController@index');
        Route::get('index_english_banking/{English_banking}/delete','ProfessionalEnglish\EnglishBankingController@destroy');

        Route::get('add_english_diplomatic_course','ProfessionalEnglish\EnglishDiplomaticController@create');
        Route::post('add_english_diplomatic_course','ProfessionalEnglish\EnglishDiplomaticController@store');
        Route::get('index_english_diplomatic/{English_Diplomatic}/edit_english_diplomatic_course','ProfessionalEnglish\EnglishDiplomaticController@edit');  // English for Diplomatic
        Route::post('index_english_diplomatic/{English_Diplomatic}','ProfessionalEnglish\EnglishDiplomaticController@update');
        Route::get('index_english_diplomatic','ProfessionalEnglish\EnglishDiplomaticController@index');
        Route::get('index_english_diplomatic/{English_Diplomatic}/delete','ProfessionalEnglish\EnglishDiplomaticController@destroy');

        Route::get('add_english_media_course','ProfessionalEnglish\EnglishMediaController@create');
        Route::post('add_english_media_course','ProfessionalEnglish\EnglishMediaController@store');
        Route::get('index_english_media/{English_Media}/edit_english_media_course','ProfessionalEnglish\EnglishMediaController@edit');  // English for Media
        Route::post('index_english_media/{English_Media}','ProfessionalEnglish\EnglishMediaController@update');
        Route::get('index_english_media','ProfessionalEnglish\EnglishMediaController@index');
        Route::get('index_english_media/{English_Media}/delete','ProfessionalEnglish\EnglishMediaController@destroy');

        Route::get('add_english_legal_course','ProfessionalEnglish\EnglishLegalController@create');
        Route::post('add_english_legal_course','ProfessionalEnglish\EnglishLegalController@store');
        Route::get('index_english_legal/{English_legal}/edit_english_legal_course','ProfessionalEnglish\EnglishLegalController@edit');  // English for Legal
        Route::post('index_english_legal/{English_legal}','ProfessionalEnglish\EnglishLegalController@update');
        Route::get('index_english_legal','ProfessionalEnglish\EnglishLegalController@index');
        Route::get('index_english_legal/{English_legal}/delete','ProfessionalEnglish\EnglishLegalController@destroy');

        Route::get('add_english_insurance_course','ProfessionalEnglish\EnglishInsuranceController@create');
        Route::post('add_english_insurance_course','ProfessionalEnglish\EnglishInsuranceController@store');
        Route::get('index_english_insurance/{English_Insurance}/edit_english_insurance_course','ProfessionalEnglish\EnglishInsuranceController@edit');  // English for Insurance
        Route::post('index_english_insurance/{English_Insurance}','ProfessionalEnglish\EnglishInsuranceController@update');
        Route::get('index_english_insurance','ProfessionalEnglish\EnglishInsuranceController@index');
        Route::get('index_english_insurance/{English_Insurance}/delete','ProfessionalEnglish\EnglishInsuranceController@destroy');

        Route::get('add_english_tourism_course','ProfessionalEnglish\EnglishTourismController@create');
        Route::post('add_english_tourism_course','ProfessionalEnglish\EnglishTourismController@store');
        Route::get('index_english_tourism/{English_Tourism}/edit_english_tourism_course','ProfessionalEnglish\EnglishTourismController@edit');  // English for Tourism
        Route::post('index_english_tourism/{English_Tourism}','ProfessionalEnglish\EnglishTourismController@update');
        Route::get('index_english_tourism','ProfessionalEnglish\EnglishTourismController@index');
        Route::get('index_english_tourism/{English_Tourism}/delete','ProfessionalEnglish\EnglishTourismController@destroy');

        Route::get('add_english_army_course','ProfessionalEnglish\EnglishArmyController@create');
        Route::post('add_english_army_course','ProfessionalEnglish\EnglishArmyController@store');
        Route::get('index_english_army/{English_army}/edit_english_army_course','ProfessionalEnglish\EnglishArmyController@edit');  // English for Army
        Route::post('index_english_army/{English_army}','ProfessionalEnglish\EnglishArmyController@update');
        Route::get('index_english_army','ProfessionalEnglish\EnglishArmyController@index');
        Route::get('index_english_army/{English_army}/delete','ProfessionalEnglish\EnglishArmyController@destroy');

        Route::get('add_english_it_course','ProfessionalEnglish\EnglishItController@create');
        Route::post('add_english_it_course','ProfessionalEnglish\EnglishItController@store');
        Route::get('index_english_it/{English_it}/edit_english_it_course','ProfessionalEnglish\EnglishItController@edit');  // English for IT
        Route::post('index_english_it/{English_it}','ProfessionalEnglish\EnglishItController@update');
        Route::get('index_english_it','ProfessionalEnglish\EnglishItController@index');
        Route::get('index_english_it/{English_it}/delete','ProfessionalEnglish\EnglishItController@destroy');

        Route::get('add_english_architecture_course','ProfessionalEnglish\EnglishArchitectureController@create');
        Route::post('add_english_architecture_course','ProfessionalEnglish\EnglishArchitectureController@store');
        Route::get('index_english_architecture/{English_architecture}/edit_english_architecture_course','ProfessionalEnglish\EnglishArchitectureController@edit');  // English for Architecture
        Route::post('index_english_architecture/{English_architecture}','ProfessionalEnglish\EnglishArchitectureController@update');
        Route::get('index_english_architecture','ProfessionalEnglish\EnglishArchitectureController@index');
        Route::get('index_english_architecture/{English_architecture}/delete','ProfessionalEnglish\EnglishArchitectureController@destroy');

        Route::get('add_english_medicine_course','ProfessionalEnglish\EnglishMedicineController@create');
        Route::post('add_english_medicine_course','ProfessionalEnglish\EnglishMedicineController@store');
        Route::get('index_english_medicine/{English_medicine}/edit_english_medicine_course','ProfessionalEnglish\EnglishMedicineController@edit');  // English for Medicine
        Route::post('index_english_medicine/{English_medicine}','ProfessionalEnglish\EnglishMedicineController@update');
        Route::get('index_english_medicine','ProfessionalEnglish\EnglishMedicineController@index');
        Route::get('index_english_medicine/{English_medicine}/delete','ProfessionalEnglish\EnglishMedicineController@destroy');


        //  ---------------------------------------------------------------------------------------------

        Route::get('add_gallery_image','GalleryController@create');
        Route::post('add_gallery_image','GalleryController@store');
        Route::get('index_gallery/{Gallery}/edit_gallery_image','GalleryController@edit');  // Gallery
        Route::post('index_gallery/{Gallery}','GalleryController@update');
        Route::get('index_gallery','GalleryController@index');
        Route::get('index_gallery/{Gallery}/delete','GalleryController@destroy');

        Route::get('add_event','EventController@create');
        Route::post('add_event','EventController@store');
        Route::get('index_event/{Event}/edit_event','EventController@edit');  // Events
        Route::post('index_event/{Event}','EventController@update');
        Route::get('index_event','EventController@index');
        Route::get('index_event/{Event}/delete','EventController@destroy');


        Route::get('index_contact','ContactController@index');                           // About or Contact
        Route::get('index_contact/{Contact}/delete','ContactController@destroy');
   });
});
//-----------------------------------------------------------------------------

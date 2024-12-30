<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminPostNewsController;
use App\Http\Controllers\AdminPostEventsController;
use App\Http\Controllers\AdminProcurementController;
use App\Http\Controllers\AdminCareersController;
use App\Http\Controllers\AdminWidgetsController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminBusRoutesController;
use App\Http\Controllers\AdminProjectsController;

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


/*
 * Front End Area
 ****************************************/

Route::get('/', [HomeController::class, 'index']);
Route::get('/admin/login', [SigninController::class, 'signin'])->name('admin.login');
Route::get('/signup', [SigninController::class, 'register_account']);
Route::get('/forget-password', [SigninController::class, 'forget_password']);
Route::get('/create-user', [SigninController::class, 'create_user']);

/*
 * Historical
 *******************************************/
Route::get('/historical', [HomeController::class, 'historical']);
Route::get('/smta-act', [HomeController::class, 'smtaAct']);
Route::get('/who-we-are', [HomeController::class, 'WhoWeAre']);
Route::get('/frequently-asked-questions', [HomeController::class, 'faq']);
Route::get('/our-team/{category?}', [HomeController::class, 'teamMembers']);
Route::get('/board-members', [HomeController::class, 'boardMembers']);
Route::get('/messages/{slug?}', [HomeController::class, 'messages']);
Route::get('/automated-fare-collection', [HomeController::class, 'AutomatedFareCollection']);
Route::get('/help-and-complaints', [HomeController::class, 'helpComplaints']);
Route::get('/contact-us', [HomeController::class, 'contactUs']);
Route::get('/gallery/{slug?}', [HomeController::class, 'gallery']);
Route::get('/organogram', [HomeController::class, 'organogram']);
Route::get('/fare', [HomeController::class, 'fare']);
Route::get('/impact-values', [HomeController::class, 'impactValues']);
Route::get('/mission-and-vision', [HomeController::class, 'missionVission']);
Route::get('/what-is-brt', [HomeController::class, 'whatIsBrt']);

//Routes For Careers
Route::get('/careers/{method?}/{slug?}/{steps?}', [CareersController::class, 'careers']);
Route::post('/process-application', [CareersController::class, 'processForm']);
Route::post('/process-careeer-files', [CareersController::class, 'processFormFiles']);
Route::post('/post-comment', [PostController::class, 'postComment']);

Route::get('/routes/{routeSlug?}', [HomeController::class, 'routes']);
Route::get('/get-cities-data/{cityID?}', [HomeController::class, 'routesCityData']);
Route::get('/get-routes/{routeID?}', [HomeController::class, 'getRoutesData']);

//Projects
Route::get('/projects/{project?}', [HomeController::class, 'projects']);

Route::post('/process-afc-card-request', [HomeController::class, 'processAfcCard']);
Route::post('/process-contact', [HomeController::class, 'processContact']);
Route::post('/process-complains', [HomeController::class, 'processComplains']);

Route::get('/procurement/{category?}/{slug?}', [ProcurementController::class, 'procurement']);
Route::get('/procurement/preview/{id}', [ProcurementController::class, 'preview'])->name('procurement.preview');
Route::get('/procurement/download/{id}', [ProcurementController::class, 'download'])->name('procurement.download');

Route::post('/get-procurement-data', [ProcurementController::class, 'getProcurementData']);

Route::post('/calculate-fare', [HomeController::class, 'calculateFare']);

Auth::routes();

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Route cache cleared</h1>';
});

/*
 * Admin panel
 ******************************************/

Route::middleware(['auth', 'userRole:admin'])->group(function() {
    //ADMIN hOME
    Route::get('/admin', [AdminDashboardController::class, 'dashboard']);
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard']);

    /*
     * Buses & Routes Module
     */ 

    //Get Requests
    Route::get('/admin/manage-buses/{method?}/{id?}/{reffID?}', [AdminBusRoutesController::class, 'manageBuses']);

    //Post Requests
    Route::post('/admin/create-route-stop',[AdminBusRoutesController::class, 'createRouteStop']);

    /*
     * Widgets Module 
     */ 

    //Get Requests
    Route::get('/admin/gallery/{postType?}/{method?}/{id?}', [AdminWidgetsController::class, 'gallery']);
    Route::get('/admin/manage-faq/{method?}/{id?}', [AdminDashboardController::class, 'faq']);
    Route::get('/admin/messages/{method?}/{id?}', [AdminWidgetsController::class, 'messages']);
    Route::get('/admin/team/{method?}/{id?}', [AdminWidgetsController::class, 'team']);
    Route::get('/admin/board-members/{method?}/{id?}', [AdminWidgetsController::class, 'boardMembers']);
    Route::get('/admin/manage-fares/{method?}/{id?}', [AdminWidgetsController::class, 'fares']);

    //Post Requests
    Route::post('/admin/create-gallery',[AdminWidgetsController::class, 'createGallery']);
    Route::post('/admin/create-faq',[AdminDashboardController::class, 'createFaq']);
    Route::post('/admin/create-message',[AdminWidgetsController::class, 'createMessage']);
    Route::post('/admin/create-team-category',[AdminWidgetsController::class, 'createTeamCategory']);
    Route::post('/admin/process-widget',[AdminWidgetsController::class, 'processWidget']);
    
    /*
     * Manage Posts
     */ 

    //Get Request
    Route::get('/admin/posts/{postType?}/{method?}/{id?}', [AdminPostController::class, 'posts']);

    //Post Requests
    Route::post('/admin/create-post',[AdminPostController::class, 'createPost']);
    Route::post('/admin/create-category',[AdminPostController::class, 'createCategory']);

    /*
     * Manage News
     */ 

    //Get Request
    Route::get('/admin/news/{postType?}/{method?}/{id?}', [AdminPostNewsController::class, 'posts']);

    /*
     * Manage Events
     */ 

    //Get Request
    Route::get('/admin/events/{postType?}/{method?}/{id?}', [AdminPostEventsController::class, 'posts']);
    Route::post('/admin/create-event',[AdminPostController::class, 'createEvent']);

    /*
     * Careers Module
     */ 

    //Get Request
    Route::get('/admin/careers/{method?}/{id?}', [AdminCareersController::class, 'careers']);

    //Post Requests
    Route::post('/admin/create-job',[AdminCareersController::class, 'createJob']); 

    /*
     * Procurement Module
     */ 

    //Get Request
    Route::get('/admin/procurement/{method?}/{id?}', [AdminProcurementController::class, 'procurement']);

    //Post Request
    Route::post('/admin/process-procurement',[AdminProcurementController::class, 'createProcurement']);
    Route::post('/admin/create-procurement-category',[AdminProcurementController::class, 'createCategory']);
    
    /*
     * Projects Module
     */ 

    //Get Request
    Route::get('/admin/projects/{method?}/{id?}', [AdminProjectsController::class, 'projects']);

    //Post Request
    Route::post('/admin/process-project',[AdminProjectsController::class, 'createProject']);

    /*
     * Settings Module
     */ 
    Route::get('/admin/settings', [AdminSettingsController::class, 'settings']);
    Route::get('/admin/website/{page?}/{method?}/{id?}', [AdminSettingsController::class, 'website']);
    Route::post('/admin/update_header_settings',[AdminSettingsController::class, 'update_header_settings']);
    Route::post('/admin/update_footer_settings',[AdminSettingsController::class, 'update_footer_settings']);
    Route::post('/admin/create-page',[AdminSettingsController::class, 'create_page']);

    //Global Settings
    Route::post('/admin/process-main-form',[AdminSettingsController::class, 'formProcessor']);

    Route::get('/admin/fc-card/{method?}/{id?}', [AdminDashboardController::class, 'afcCard']);
    
});

//Routes for Posts
Route::get('/news/{category?}/{slug?}', [PostController::class, 'news']);
Route::get('/events/{category?}/{slug?}', [PostController::class, 'events']);
Route::get('/{category?}/{slug?}', [PostController::class, 'posts']);
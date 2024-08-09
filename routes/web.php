<?php

use App\Http\Controllers\AssistantSalesManegerController;
use App\Http\Controllers\ClientLoginController;
use App\Http\Controllers\CompanyInfoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\HeroContentController;
use App\Http\Controllers\JointDirectorController;
use App\Http\Controllers\PlotCategoryController;
use App\Http\Controllers\PlotTypeController;
use App\Http\Controllers\PlotUnitPriceController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\PlotOrderController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SeniorManegerController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitRequestController;
use App\Models\RoleRoute;

function getRoleName($routeName)
{
    $routesData = RoleRoute::where('route_name', $routeName)->get();
    $result = [];
    foreach ($routesData as $routeData) {
        array_push($result, $routeData->role_name);
    }
    return $result;
}

Route::get('/post/add', [PostController::class, 'index'])->name('post.add')->middleware('roles');
Route::post('/post/new', [PostController::class, 'create'])->name('post.new');
Route::get('/post/manage', [PostController::class, 'manage'])->name('post.manage');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{id}', [PostController::class, 'edit'])->name('post.update');
Route::post('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');

// ================= SLIDER SECTION ==================
Route::get('/slider', [SliderController::class, 'slider'])->name('slider');
Route::post('/slider-add', [SliderController::class, 'sliderCreate'])->name('slider.create');
Route::get('/slider-manage', [SliderController::class, 'sliderManage'])->name('slider.manage');
Route::get('/slider-edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
Route::post('/slider-update/{id}', [SliderController::class, 'sliderUpdate'])->name('slider.update');
Route::post('/slider-delete', [SliderController::class, 'sliderDelete'])->name('slider.delete');

// ================= Team SECTION ================
Route::get('/team', [TeamMemberController::class, 'team'])->name('team');
Route::post('/team-add', [TeamMemberController::class, 'teamCreate'])->name('team.create');
Route::get('/team-manage', [TeamMemberController::class, 'teamManage'])->name('team.manage');
Route::get('/team-edit/{id}', [TeamMemberController::class, 'teamEdit'])->name('team.edit');
Route::post('/team-update/{id}', [TeamMemberController::class, 'teamUpdate'])->name('team.update');
Route::post('/team-delete', [TeamMemberController::class, 'teamDelete'])->name('team.delete');

// ================= Testimonial SECTION ================
Route::get('/testimonial', [TestimonialController::class, 'testimonial'])->name('testimonial');
Route::post('/testimonial-add', [TestimonialController::class, 'testimonialCreate'])->name('testimonial.create');
Route::get('/testimonial-manage', [TestimonialController::class, 'testimonialManage'])->name('testimonial.manage');
Route::get('/testimonial-edit/{id}', [TestimonialController::class, 'testimonialEdit'])->name('testimonial.edit');
Route::post('/testimonial-update/{id}', [TestimonialController::class, 'testimonialUpdate'])->name('testimonial.update');
Route::post('/testimonial-delete', [TestimonialController::class, 'testimonialDelete'])->name('testimonial.delete');

// ================= Gallery SECTION ================

Route::post('/gallery-add', [GalleryImageController::class, 'galleryCreate'])->name('gallery.create');
Route::get('/gallery-manage', [GalleryImageController::class, 'galleryManage'])->name('gallery.manage');
Route::get('/gallery-edit/{id}', [GalleryImageController::class, 'galleryEdit'])->name('gallery.edit');
Route::post('/gallery-update/{id}', [GalleryImageController::class, 'galleryUpdate'])->name('gallery.update');
Route::post('/gallery-delete', [GalleryImageController::class, 'galleryDelete'])->name('gallery.delete');

// ================= FAQ SECTION ================
Route::get('/faq', [FaqController::class, 'faq'])->name('faq');
Route::post('/faq-add', [FaqController::class, 'faqCreate'])->name('faq.create');
Route::get('/faq-manage', [FaqController::class, 'faqManage'])->name('faq.manage');
Route::get('/faq-edit/{id}', [FaqController::class, 'faqEdit'])->name('faq.edit');
Route::post('/faq-update/{id}', [FaqController::class, 'faqUpdate'])->name('faq.update');
Route::post('/faq-delete', [FaqController::class, 'faqDelete'])->name('faq.delete');

// ================= Hero SECTION ==================
Route::get('/hero-edit', [HeroContentController::class, 'heroEdit'])->name('hero.edit');
Route::post('/hero-update', [HeroContentController::class, 'heroUpdate'])->name('hero.update');

//================== Project SECTION ===================
Route::get('/project', [ProjectController::class, 'project'])->name('project');
Route::post('/project-create', [ProjectController::class, 'projectCreate'])->name('project.create');
Route::get('/project-manage', [ProjectController::class, 'projectManage'])->name('project.manage');
Route::get('/project-edit/{id}', [ProjectController::class, 'projectEdit'])->name('project.edit');
Route::post('/project-update/{id}', [ProjectController::class, 'projectUpdate'])->name('project.update');
Route::post('/project-delete', [ProjectController::class, 'projectDelete'])->name('project.delete');

//================== Plot Category SECTION ===================

Route::get('admin/plot-category/create', [PlotCategoryController::class, 'create'])->name('admin.plotCategory.create');
Route::get('admin/plot-category/manage', [PlotCategoryController::class, 'manage'])->name('admin.plotCategory.manage');
Route::post('admin/plot-category/store', [PlotCategoryController::class, 'store'])->name('admin.plotCategory.store');
Route::get('admin/plot-category/edit/{id}', [PlotCategoryController::class, 'edit'])->name('admin.plotCategory.edit');
Route::post('admin/plot-category/update/{id}', [PlotCategoryController::class, 'update'])->name('admin.plotCategory.update');
Route::post('admin/plot-category/-delete', [PlotCategoryController::class, 'delete'])->name('admin.plotCategory.delete');

//================== Plot Type SECTION ===================

Route::get('/plot-type', [PlotTypeController::class, 'plot_type'])->name('plotType');
Route::post('/plot-type-create', [PlotTypeController::class, 'plotTypeCreate'])->name('plotType.create');
Route::get('/plot-type-manage', [PlotTypeController::class, 'plotTypeManage'])->name('plotType.manage');
Route::get('/plot-type-edit/{id}', [PlotTypeController::class, 'plotTypeEdit'])->name('plotType.edit');
Route::post('/plot-type-update/{id}', [PlotTypeController::class, 'plotTypeUpdate'])->name('plotType.update');
Route::post('/plot-type-delete', [PlotTypeController::class, 'plotTypeDelete'])->name('plotType.delete');


//================== Plot Unit Price SECTION ===================


Route::get('/plot-unit-price', [PlotUnitPriceController::class, 'index'])->name('plotUnitPrice.index');
Route::get('/plot-unit-price/manage', [PlotUnitPriceController::class, 'manage'])->name('plotUnitPrice.manage');
Route::post('/plot-unit-price/store', [PlotUnitPriceController::class, 'store'])->name('plotUnitPrice.store');
Route::get('/plot-unit-price/edit/{id}', [PlotUnitPriceController::class, 'plotUnitPriceEdit'])->name('plotUnitPrice.edit');
Route::post('/plot-unit-price/update', [PlotUnitPriceController::class, 'plotUnitPriceUpdate'])->name('plotUnitPrice.update');


//================== Plot SECTION ===================

Route::get('/plot', [PlotController::class, 'index'])->name('plot.index');
Route::post('/plot-store', [PlotController::class, 'plotStore'])->name('plot.store');
Route::get('/plot-manage', [PlotController::class, 'plotManage'])->name('plot.manage');
Route::get('/plot-edit/{id}', [PlotController::class, 'plotEdit'])->name('plot.edit');
Route::post('/plot-update', [PlotController::class, 'plotUpdate'])->name('plot.update');
Route::post('/plot-delete', [PlotController::class, 'plotDelete'])->name('plot.delete');
Route::get('/plotCategoryTypeData/{id}', [PlotController::class, 'plotCategoryTypeData']);


//================== Company Info SECTION ===================


Route::get('/company', [CompanyInfoController::class, 'index'])->name('company.index');
Route::post('/company/store', [CompanyInfoController::class, 'store'])->name('company.store');
Route::get('/companyInfo-edit', [CompanyInfoController::class, 'companyInfoEdit'])->name('companyInfo.edit');
Route::post('/companyInfo-update/{id}', [CompanyInfoController::class, 'companyInfoUpdate'])->name('companyInfo.update');


Route::middleware(['auth:sanctum',  config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Client Register (Importent for Admins) 

    Route::prefix('client')->controller(ClientLoginController::class)->name('client.')->group(function () {

        Route::get('/signup/{username?}/{email?}', 'clientSignUpView')->name('signup.view');
        Route::post('/signup', 'clientSignUp')->name('signup');
    });

    // Client Register 



    Route::get('/role/add', [RoleController::class, 'index'])->name('role.add');
    Route::post('/role/new', [RoleController::class, 'create'])->name('role.new');
    Route::get('/role/manage', [RoleController::class, 'manage'])->name('role.manage');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::get('/role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');

    Route::get('/user/add', [UserController::class, 'index',])->name('user.add');
    Route::get('/user/get-team-by-code', [UserController::class, 'getTeamByCode',])->name('getTeamByCode');
    Route::post('/user/new', [UserController::class, 'create'])->name('user.new');
    Route::get('/user/manage', [UserController::class, 'manage'])->name('user.manage');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');



    Route::controller(DirectorController::class)->group(function () {
        Route::get('/director/manage', 'index')->name('director.manage');
        Route::post('/director/store', 'store')->name('director.store');
        Route::post('/director/update/{id}', 'update')->name('director.update');
        Route::post('/director/delete', 'delete')->name('director.delete');
    });
    Route::controller(JointDirectorController::class)->group(function () {
        Route::get('/joint-director/manage', 'index')->name('jointDirector.manage');
        Route::post('/jointdirector/store', 'store')->name('jointDirector.store');
        Route::post('/jointDirector/update/{id}', 'update')->name('jointDirector.update');
        Route::post('/joint-director/delete', 'delete')->name('jointDirector.delete');
        Route::get('/joint-directors-by-director', 'jointDirectorsByDirector')->name('jointDirectorsByDirector');
    });
    Route::controller(SeniorManegerController::class)->group(function () {
        Route::get('/seniorManeger/manage', 'index')->name('seniorManeger.manage');
        Route::post('/seniorManeger/store', 'store')->name('seniorManeger.store');
        Route::post('/seniorManeger/update/{id}', 'update')->name('seniorManeger.update');
        Route::get('/sm-by-joint-director', 'smByjointDirector')->name('smByjointDirector');
        Route::post('/seniorManeger/delete', 'delete')->name('seniorManeger.delete');
    });
    Route::controller(AssistantSalesManegerController::class)->group(function () {
        Route::get('/assistantSalesManeger/manage', 'index')->name('assistantSalesManeger.manage');
        Route::post('/assistantSalesManeger/store', 'store')->name('assistantSalesManeger.store');
        Route::post('/assistantSalesManeger/update/{id}', 'update')->name('assistantSalesManeger.update');
        Route::post('/assistantSalesManeger/delete', 'delete')->name('assistantSalesManeger.delete');
    });


    // Revive DownPaynment 

    Route::get('/visit-requests', [VisitRequestController::class, 'index'])->name('visitRequests');
    Route::get('/visit-requests/edit/{id}', [VisitRequestController::class, 'edit'])->name('visitRequests.edit');
    Route::post('/visit-requests/update/{id}', [VisitRequestController::class, 'update'])->name('visitRequests.update');
    Route::post('/visit-request/delete', [VisitRequestController::class, 'delete'])->name('visitRequest.delete');

    Route::get('/client/visits', [VisitRequestController::class, 'clientVisits'])->name('client.visits');

    Route::post('/client/visit/feedback/{id}', [VisitRequestController::class, 'clientVisitFeedback'])->name('client.visit.feedback');
    Route::get('/client/visit/update/{id}', [VisitRequestController::class, 'clientVisitUpdate'])->name('client.visit.update');
    Route::get('/client/visit/confirm/{id}', [VisitRequestController::class,'confirm'])->name('client.visit.confirm');


    Route::controller(PlotOrderController::class)
        ->group(function () {
            Route::get('/commissions', 'commissions')->name('admin.commissions');
            Route::get('/recive-installment', 'reciveInstallmentView')->name('admin.reciveInstallmentView');
            Route::post('/recive-installment', 'reciveInstallment')->name('admin.reciveInstallment');
            Route::post('/search-installment', 'searchInstallment')->name('admin.searchInstallment');
            Route::get('/receive-down-payment/{id}', 'receiveDpView')->name('receiveDpView');
            Route::post('/receive-down-payment/{id}', 'receiveDp')->name('receiveDp');
            Route::get('/plot-orders', 'index')->name('plotOrders');
            Route::get('/plot-orders-invoice/{id}', 'invoice')->name('plotOrderInvoice');
            Route::get('/plot-order/create/{id}', 'create')->name('plotOrder.create');
            Route::get('/plot-order/menual', 'manualOrder')->name('plotOrder.manual');
            Route::post('/plot-order/store', 'store')->name('plotOrder.store');
        });
});

<?php

//=================Admin===============
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\MileStoneController; 
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\BlogsController; 
use App\Http\Controllers\Admin\HowItWorkController; 
use App\Http\Controllers\Admin\AboutUsSliderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\ResearchDevelopmentController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\OurFacilityController;
use App\Http\Controllers\Admin\IndustriesController;
use App\Http\Controllers\Admin\ProductFeatureController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GalleryTypesController;
use App\Http\Controllers\Admin\LifeArmstrongsController;
use App\Http\Controllers\Admin\JobsCategoryController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\InfrastructureSliderController;
use App\Http\Controllers\Admin\VideoModuleController;
use App\Http\Controllers\Admin\APKProductInquiryController;
use App\Http\Controllers\Admin\{ProductDescriptionController, ProductFaqsController};

//=================WEB=================
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\GalleryImageController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\ProductsController;
use App\Http\Controllers\Web\VideoController;
use App\Http\Controllers\Web\QuoteController;
use App\Http\Controllers\Web\CareerController;
use App\Http\Controllers\Web\LandingController;
    
    
    
    Route::get('/clear-cache', function () {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('config:cache');
    
        return 'All caches cleared and config re-cached.';
    });


Route::post('/whatsaapinquiry', [HomeController::class, 'whatsaapinquiry'])->name('whatsaapinquiry');
    route::get('/', [HomeController::class, 'index'])->name('front.home');
    route::get('/privacy-policy', [HomeController::class, 'privacypolicy'])->name('privacy-policy');
    route::get('/product-list', [HomeController::class, 'productlist'])->name('productlist');
    route::get('/thank-you', [HomeController::class, 'thankyou'])->name('thankyou');
    route::get('/terms-and-condition', [HomeController::class, 'termsandcondition'])->name('terms-condition');
    route::get('certificates', [HomeController::class, 'certificate'])->name('certificates');
    route::get('about', [HomeController::class, 'about'])->name('about');
    route::get('life-armstrong', [HomeController::class, 'lifearmstrong'])->name('front.lifearmstrong');
    route::get('videos', [VideoController::class, 'video'])->name('front.video');
    route::get('contact-us', [ContactController::class, 'contact'])->name('contact');
    route::post('/submit-contact', [ContactController::class, 'store'])->name('contact.store');
    route::post('/submit-quote', [QuoteController::class, 'store'])->name('quote.store');
    route::post('/submit-product-enquiry', [HomeController::class, 'productenquirystore'])->name('product.enquiry.store');
    route::get('blogs', [BlogController::class, 'blog'])->name('blog');
    route::get('blogs/{url}', [BlogController::class, 'BlogsDetail'])->name('blogs.detail');
    route::get('our-infrastructure', [HomeController::class, 'ourInfrasturcture'])->name('our.infrastructure');
    route::get('research-development', [HomeController::class, 'rDevelopment'])->name('research.development');
    route::get('events', [HomeController::class, 'events'])->name('front.event');
    route::get('gallery', [GalleryImageController::class, 'gallery'])->name('front.gallery');
    Route::get('/category/{url}', [ProductsController::class, 'productsByCategory'])->name('products.listing');
    Route::get('/machinery-woven-sacks-fibc', function () {
        return redirect('/category/woven-sack', 301);
    });
     route::get('application', [HomeController::class, 'application'])->name('application');
     route::get('agriculture', [HomeController::class, 'agriculture'])->name('agriculture');

    
    Route::get('/product/circular-loom-spare-parts', [ProductsController::class, 'circularLoomStatic'])->name('product.circular-loom-spare-parts.static');
    
    Route::get('/product/{url}', [ProductsController::class, 'detail'])->name('products.detail');
    Route::get('/wide-width-printing-machine', function () {
        return redirect('/product/wide-width-flexo-printing-machine', 301);
    });
    
    Route::get('no-vacancy', [CareerController::class, 'noVacancy'])->name('novacancy');
    Route::post('no-vacancy-store', [CareerController::class, 'noVacancystore'])->name('novacancy.store');
    Route::get('career', [CareerController::class, 'careerlisting'])->name('career');
    Route::post('career-store', [CareerController::class, 'careerstore'])->name('career.store');
    Route::get('career-details/{url}', [CareerController::class, 'careerdetail'])->name('career.detail');
    Route::post('career/jobs', [CareerController::class, 'jobsByDepartment'])->name('career.jobs');
    route::get('/category-products/{id}', [ProductController::class, 'getProductsByCategory'])
    ->name('category.products');
    route::get('/wide-width-flexo-printing-machine', [LandingController::class, 'landing'])->name('landing');
    route::post('/landing/store' , [LandingController::class , 'LandingStoreQuate'])->name('landing.store.form');
    Route::get('/captcha-image', [LandingController::class, 'showCaptcha'])->name('captcha.image');
    Route::post('/verify-captcha', [LandingController::class, 'verifyCaptcha'])->name('captcha.verify');
    route::get('/thankyou' , [LandingController::class , 'ThankyouFromLandingPage'])->name('thankyoufromlandingpage');
    route::get('/thankyou-wide-width-flexo-printing-machine' , [HomeController::class , 'thankyouwidewidth'])->name('thankyouwidewidth');
     route::get('products/fibc-fabric-cutting-machine', [HomeController::class, 'fibcmachine'])->name('products.fibc-fabric-cutting-machine');
     route::get('woven-bag-lamination-machine', [HomeController::class, 'wovenmachine'])->name('woven-bag-lamination-machine');
    
     
     route::get('channel-partner', [HomeController::class, 'channelpartner'])->name('channelpartner');
     route::post('channel-partner-store', [HomeController::class, 'channelpartnerstore'])->name('channelpartnerstore');
     //route::get('armstrong-in-city', [HomeController::class, 'armstrongincity'])->name('armstrongincity');
    
    Route::get('/search-products', [ProductsController::class, 'search'])->name('products.search');
    Route::get('/sewing-machines/{special}', [ProductsController::class, 'specialCategory'])->name('products.special');
    

    Route::get('/spare-parts/{spare}', [ProductsController::class, 'spareparts'])->name('products.spareparts');
   
 
    // video list by category
    Route::get('/filter-videos', [VideoController::class, 'filterVideos'])->name('filter-videos');
    
    route::middleware('guest')->group(function(){
        route::get('/register' , [LoginController::class , 'register_page'])->name('register');
        route::post('/register' , [LoginController::class , 'register'])->name('register');
        route::get('/login',[LoginController::class , 'login_page'])->name('login');
        route::Post('/login',[LoginController::class , 'login'])->name('login');
    }); 
    
    // that is access for admin and super admin;
    route::middleware(['auth' , 'role:admin,super_admin'])->prefix('admin')->group(function(){
        route::get('/' , [DashboardController::class , 'index'])->name('dashboard');
        route::post('/logout' , [LoginController::class , 'logout'])->name('logout');
        
        Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('image.upload');
        // for application crud 
        route::get('/application', [ApplicationController::class , 'index'])->name('application');
        Route::post('/application_store', [ApplicationController::class, 'store'])->name('application.store');
        Route::post('/application/update/{id}', [ApplicationController::class, 'update'])->name('application.update');
        // route::Post('/applicationStoreAndUpdate' , [ApplicationController::class , 'storeAndUpdate'])->name('applicationStoreAndUpdate');
        Route::get('/application_get_data', [ApplicationController::class, 'getData'])->name('application_get_data');
        Route::get('/application/edit/{id}', [ApplicationController::class, 'edit'])->name('application.edit');
        Route::delete('/application/delete/{id}', [ApplicationController::class, 'destroy'])->name('application.delete');

        // Industries
        route::get('/industries' , [IndustriesController::class , 'index'])->name('industries');
        route::Post('/industriesStoreAndUpdate' , [IndustriesController::class , 'IndustriesstoreAndUpdate'])->name('industriesStoreAndUpdate');
        Route::get('/industries_get_data', [IndustriesController::class, 'IndustriesGetData'])->name('industries_get_data');
        Route::get('/industries/edit/{id}', [IndustriesController::class, 'edit'])->name('industries.edit');
        Route::delete('/industries/delete/{id}', [IndustriesController::class, 'destroy'])->name('industries.delete');

        // for category crud 
        route::get('/category', [ProductCategoryController::class , 'index'])->name('category');
        Route::post('/category_store', [ProductCategoryController::class, 'store'])->name('category.store');
        Route::post('/category/update/{id}', [ProductCategoryController::class, 'update'])->name('category.update');
        Route::get('/category_get_data', [ProductCategoryController::class, 'getData'])->name('category_get_data');
        Route::get('/category/edit/{id}', [ProductCategoryController::class, 'edit'])->name('category.edit');
        Route::delete('/category/delete/{id}', [ProductCategoryController::class, 'destroy'])->name('category.delete');
        
        //product Crud 
        route::get('/product' , [ProductController::class , 'index'])->name('product');
        route::get('/add/product' , [ProductController::class , 'createProduct'])->name('product.addProduct');
        route::post('/product/store' , [ProductController::class , "ProductStore"])->name('product.store');
        route::get("/getProductData" , [ProductController::class , "getProductData"])->name('getProductData');
        route::get('/edit/product/{id}' , [ProductController::class , 'EditProduct'])->name('product.edit');
        route::delete("/delete/product/{id}" , [ProductController::class , 'DestroyProduct'])->name('product.delete');
        route::put('/update/product/{id}' , [ProductController::class , 'UpdateProduct'])->name('product.update');
        Route::post('/upload-product-video-chunk' , [ProductController::class , 'ProductchunkUpload'])->name('admin.Productvideo.chunkUpload');

        //Product Description Crud 
        Route::resource('product-description', ProductDescriptionController::class);
        route::get('/fetch-product-description' , [ProductDescriptionController::class , 'getProductDescriptions'])->name('fetch.product-description');
           
        //Product FAQs Crud
        Route::prefix('product-faqs')->name('product-faqs.')->group(function () {
            Route::get('/', [ProductFaqsController::class, 'index'])->name('index');
            Route::get('/create', [ProductFaqsController::class, 'create'])->name('create');
            Route::post('/', [ProductFaqsController::class, 'store'])->name('store');
            Route::get('/fetch', [ProductFaqsController::class, 'getProductFaqs'])->name('fetch');
            Route::get('/{product_id}/edit', [ProductFaqsController::class, 'editProductFaqs'])->name('edit');
            Route::put('/{product_id}', [ProductFaqsController::class, 'updateProductFaqs'])->name('update'); 
            Route::delete('/{product_id}', [ProductFaqsController::class, 'destroyByProduct'])->name('delete');
        });
        
        //Gallery
        route::get('/gallery', [GalleryController::class , 'index'])->name('gallery');
        Route::post('/gallery_store', [GalleryController::class, 'store'])->name('gallery.store');
        Route::post('/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
        Route::get('/gallery_get_data', [GalleryController::class, 'getData'])->name('gallery_get_data');
        Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
        Route::delete('/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('gallery.delete');
        
        //HomeSlider
        route::get('/homeslider', [HomeSliderController::class , 'index'])->name('homeslider');
        Route::post('/homeslider_store', [HomeSliderController::class, 'store'])->name('homeslider.store');
        Route::post('/homeslider/update/{id}', [HomeSliderController::class, 'update'])->name('homeslider.update');
        Route::get('/homeslider_get_data', [HomeSliderController::class, 'getData'])->name('homeslider_get_data');
        Route::get('/homeslider/edit/{id}', [HomeSliderController::class, 'edit'])->name('homeslider.edit');
        Route::delete('/homeslider/delete/{id}', [HomeSliderController::class, 'destroy'])->name('homeslider.delete');
        
        //AboutSlider
        route::get('/aboutslider', [AboutUsSliderController::class , 'index'])->name('aboutslider');
        Route::post('/aboutslider_store', [AboutUsSliderController::class, 'store'])->name('aboutslider.store');
        Route::post('/aboutslider/update/{id}', [AboutUsSliderController::class, 'update'])->name('aboutslider.update');
        Route::get('/aboutslider_get_data', [AboutUsSliderController::class, 'getData'])->name('aboutslider_get_data');
        Route::get('/aboutslider/edit/{id}', [AboutUsSliderController::class, 'edit'])->name('aboutslider.edit');
        Route::delete('/aboutslider/delete/{id}', [AboutUsSliderController::class, 'destroy'])->name('aboutslider.delete');


        //research and development slider
        route::get('/research-development-slider', [ResearchDevelopmentController::class , 'index'])->name('researchdevelopmentslider');
        Route::post('/research-development-slider_store', [ResearchDevelopmentController::class, 'store'])->name('researchdevelopmentslider.store');
        Route::post('/research-development-slider/update/{id}', [ResearchDevelopmentController::class, 'update'])->name('researchdevelopmentslider.update');
        Route::get('/research-development-slider_get_data', [ResearchDevelopmentController::class, 'getData'])->name('researchdevelopmentslider_get_data');
        Route::get('/research-development-slider/edit/{id}', [ResearchDevelopmentController::class, 'edit'])->name('researchdevelopmentslider.edit');
        Route::delete('/research-development-slider/delete/{id}', [ResearchDevelopmentController::class, 'destroy'])->name('researchdevelopmentslider.delete');


        //InfrastructureSlider
        route::get('/infrastructureslider', [InfrastructureSliderController::class , 'index'])->name('infrastructureslider');
        Route::post('/infrastructureslider_store', [InfrastructureSliderController::class, 'store'])->name('infrastructureslider.store');
        Route::post('/infrastructureslider/update/{id}', [InfrastructureSliderController::class, 'update'])->name('infrastructureslider.update');
        Route::get('/infrastructureslider_get_data', [InfrastructureSliderController::class, 'getData'])->name('infrastructureslider_get_data');
        Route::get('/infrastructureslider/edit/{id}', [InfrastructureSliderController::class, 'edit'])->name('infrastructureslider.edit');
        Route::delete('/infrastructureslider/delete/{id}', [InfrastructureSliderController::class, 'destroy'])->name('infrastructureslider.delete');


        // Gallery Types
        route::get('/gallery-types' , [GalleryTypesController::class , 'index'])->name('gallerytypes');
        route::Post('/gallerytypesStoreAndUpdate' , [GalleryTypesController::class , 'GallerytypesstoreAndUpdate'])->name('gallerytypesStoreAndUpdate');
        Route::get('/gallery_types_get_data', [GalleryTypesController::class, 'GallerytypesGetData'])->name('gallerytypes_get_data');
        Route::get('/gallery-types/edit/{id}', [GalleryTypesController::class, 'edit'])->name('gallerytypes.edit');
        Route::delete('/gallery-types/delete/{id}', [GalleryTypesController::class, 'destroy'])->name('gallerytypes.delete');

        //MileStones 
        route::get('/milestone' , [MileStoneController::class , 'index'])->name('milestone');
        route::get('/add/milestone' , [MileStoneController::class , 'createMilestone'])->name('milestone.addMilestone');
        route::post('/milestone/store' , [MileStoneController::class , "MilestoneStore"])->name('milestone.store');
        route::get("/getMilestoneData" , [MileStoneController::class , "getMilestoneData"])->name('getMilestoneData');
        route::get('/edit/milestone/{id}' , [MileStoneController::class , 'EditMilestone'])->name('milestone.edit');
        route::delete("/delete/milestone/{id}" , [MileStoneController::class , 'DestoryMilestone'])->name('milestone.delete');
        route::put('/update/milestone/{id}' , [MileStoneController::class , 'UpdateMilestone'])->name('milestone.update');

        //How it works
        route::get('/how-it-work' , [HowItWorkController::class , 'index'])->name('howitwork');
        route::get('/add/how-it-work' , [HowItWorkController::class , 'create'])->name('howitwork.addHowitwork');
        route::post('/how-it-work/store' , [HowItWorkController::class , "Store"])->name('howitwork.store');
        route::get("/get-how-it-work-Data" , [HowItWorkController::class , "getData"])->name('getHowitworkData');
        route::get('/edit/how-it-work/{id}' , [HowItWorkController::class , 'Edit'])->name('howitwork.edit');
        route::delete("/delete/how-it-work/{id}" , [HowItWorkController::class , 'Destory'])->name('howitwork.delete');
        route::put('/update/how-it-work/{id}' , [HowItWorkController::class , 'Update'])->name('howitwork.update');
        
         //LifeArmstrong 
        route::get('/life-armstrong' , [LifeArmstrongsController::class , 'index'])->name('lifearmstrong');
        route::get('/add/life-armstrong' , [LifeArmstrongsController::class , 'create'])->name('lifearmstrong.addLifearmstrong');
        route::post('/life-armstrong/store' , [LifeArmstrongsController::class , "Store"])->name('lifearmstrong.store');
        route::get("/get-life-armstrong-Data" , [LifeArmstrongsController::class , "getData"])->name('getLifearmstrongData');
        route::get('/edit/life-armstrong/{id}' , [LifeArmstrongsController::class , 'Edit'])->name('lifearmstrong.edit');
        route::delete("/delete/life-armstrong/{id}" , [LifeArmstrongsController::class , 'Destory'])->name('lifearmstrong.delete');
        route::put('/update/life-armstrong/{id}' , [LifeArmstrongsController::class , 'Update'])->name('lifearmstrong.update');

        //Jobs category
        route::get('/jobs-category', [JobsCategoryController::class , 'index'])->name('jobscategory');
        route::get('/add/jobs-category' , [JobsCategoryController::class , 'createJobscategory'])->name('jobscategory.addJobscategory');
        route::post('/jobscategory/store' , [JobsCategoryController::class , "JobscategoryStore"])->name('jobscategory.store');
        route::get("/getJobscategoryData" , [JobsCategoryController::class , "getJobscategoryData"])->name('getJobscategoryData');
        route::get('/edit/jobscategory/{id}' , [JobsCategoryController::class , 'EditJobscategory'])->name('jobscategory.edit');
        route::delete("/delete/jobscategory/{id}" , [JobsCategoryController::class , 'DestoryJobscategory'])->name('jobscategory.delete');
        route::put('/update/jobscategory/{id}' , [JobsCategoryController::class , 'UpdateJobscategory'])->name('jobscategory.update');
        //Jobs
        route::get('/jobs', [JobsController::class , 'index'])->name('jobs');
        route::get('/add/jobs' , [JobsController::class , 'createJobs'])->name('jobs.addJobs');
        route::post('/jobs/store' , [JobsController::class , "JobsStore"])->name('jobs.store');
        route::get("/getjobsData" , [JobsController::class , "getJobsData"])->name('getJobsData');
        route::get('/edit/jobs/{id}' , [JobsController::class , 'EditJobs'])->name('jobs.edit');
        route::delete("/delete/jobs/{id}" , [JobsController::class , 'DestoryJobs'])->name('jobs.delete');
        route::put('/update/jobs/{id}' , [JobsController::class , 'UpdateJobs'])->name('jobs.update');
        //Why choose us 
        route::get('/why-choose-us' , [WhyChooseUsController::class , 'index'])->name('whychooseus');
        route::get('/add/why-choose-us' , [WhyChooseUsController::class , 'create'])->name('whychooseus.addWhychooseus');
        route::post('/why-choose-us/store' , [WhyChooseUsController::class , "Store"])->name('whychooseus.store');
        route::get("/get-why-choose-us-Data" , [WhyChooseUsController::class , "getData"])->name('getWhychooseusData');
        route::get('/edit/why-choose-us/{id}' , [WhyChooseUsController::class , 'Edit'])->name('whychooseus.edit');
        route::delete("/delete/why-choose-us/{id}" , [WhyChooseUsController::class , 'Destory'])->name('whychooseus.delete');
        route::put('/update/why-choose-us/{id}' , [WhyChooseUsController::class , 'Update'])->name('whychooseus.update');

        //Events
        route::get('/event' , [EventsController::class , 'index'])->name('event');
        route::get('/add/event' , [EventsController::class , 'createEvent'])->name('event.addEvent');
        route::post('/event/store' , [EventsController::class , "EventStore"])->name('event.store');
        route::get("/getEventData" , [EventsController::class , "getEventData"])->name('getEventData');
        route::get('/edit/event/{id}' , [EventsController::class , 'EditEvent'])->name('event.edit');
        route::delete("/delete/event/{id}" , [EventsController::class , 'DestoryEvent'])->name('event.delete');
        route::put('/update/event/{id}' , [EventsController::class , 'UpdateEvent'])->name('event.update');
        
        //News 
        route::get('/news' , [NewsController::class , 'index'])->name('news');
        route::get('/add/news' , [NewsController::class , 'createNews'])->name('news.addNews');
        route::post('/news/store' , [NewsController::class , "NewsStore"])->name('news.store');
        route::get("/getNewsData" , [NewsController::class , "getNewsData"])->name('getNewsData');
        route::get('/edit/news/{id}' , [NewsController::class , 'EditNews'])->name('news.edit');
        route::delete("/delete/news/{id}" , [NewsController::class , 'DestoryNews'])->name('news.delete');
        route::put('/update/news/{id}' , [NewsController::class , 'UpdateNews'])->name('news.update');
        //Why choose us 
        route::get('/why-choose-us' , [WhyChooseUsController::class , 'index'])->name('whychooseus');
        route::get('/add/why-choose-us' , [WhyChooseUsController::class , 'create'])->name('whychooseus.addWhychooseus');
        route::post('/why-choose-us/store' , [WhyChooseUsController::class , "Store"])->name('whychooseus.store');
        route::get("/get-why-choose-us-Data" , [WhyChooseUsController::class , "getData"])->name('getWhychooseusData');
        route::get('/edit/why-choose-us/{id}' , [WhyChooseUsController::class , 'Edit'])->name('whychooseus.edit');
        route::delete("/delete/why-choose-us/{id}" , [WhyChooseUsController::class , 'Destory'])->name('whychooseus.delete');
        route::put('/update/why-choose-us/{id}' , [WhyChooseUsController::class , 'Update'])->name('whychooseus.update');

        //Our Facility
        route::get('/our-facility' , [OurFacilityController::class , 'index'])->name('ourfacility');
        route::get('/add/our-facility' , [OurFacilityController::class , 'create'])->name('ourfacility.addOurfacility');
        route::post('/our-facility/store' , [OurFacilityController::class , "Store"])->name('ourfacility.store');
        route::get("/get-our-facility-Data" , [OurFacilityController::class , "getData"])->name('getOurfacilityData');
        route::get('/edit/our-facility/{id}' , [OurFacilityController::class , 'Edit'])->name('ourfacility.edit');
        route::delete("/delete/our-facility/{id}" , [OurFacilityController::class , 'Destory'])->name('ourfacility.delete');
        route::put('/update/our-facility/{id}' , [OurFacilityController::class , 'Update'])->name('ourfacility.update');
        
        //News 
        route::get('/news' , [NewsController::class , 'index'])->name('news');
        route::get('/add/news' , [NewsController::class , 'createNews'])->name('news.addNews');
        route::post('/news/store' , [NewsController::class , "NewsStore"])->name('news.store');
        route::get("/getNewsData" , [NewsController::class , "getNewsData"])->name('getNewsData');
        route::get('/edit/news/{id}' , [NewsController::class , 'EditNews'])->name('news.edit');
        route::delete("/delete/news/{id}" , [NewsController::class , 'DestoryNews'])->name('news.delete');
        route::put('/update/news/{id}' , [NewsController::class , 'UpdateNews'])->name('news.update');


        //Blogs 
        route::get('/blogs' , [BlogsController::class , 'index'])->name('blogs');
        route::get('/add/blogs' , [BlogsController::class , 'createBlogs'])->name('blogs.addBlogs');
        route::post('/blogs/store' , [BlogsController::class , "BlogsStore"])->name('blogs.store');
        route::get("/getBlogsData" , [BlogsController::class , "getBlogsData"])->name('getBlogsData');
        route::get('/edit/blogs/{id}' , [BlogsController::class , 'EditBlogs'])->name('blogs.edit');
        route::delete("/delete/blogs/{id}" , [BlogsController::class , 'DestoryBlogs'])->name('blogs.delete');
        route::put('/update/blogs/{id}' , [BlogsController::class , 'UpdateBlogs'])->name('blogs.update');

        //Product Features
        route::get('/product-feature', [ProductFeatureController::class , 'index'])->name('productfeature');
        Route::post('/productfeature_store', [ProductFeatureController::class, 'store'])->name('productfeature.store');
        Route::post('/productfeature/update/{id}', [ProductFeatureController::class, 'update'])->name('productfeature.update');
        Route::get('/product_feature_get_data', [ProductFeatureController::class, 'getData'])->name('product_feature_get_data');
        Route::get('/productfeature/edit/{id}', [ProductFeatureController::class, 'edit'])->name('productfeature.edit');
        Route::delete('/productfeature/delete/{id}', [ProductFeatureController::class, 'destroy'])->name('productfeature.delete');
        
        //Client
        route::get('/client' , [ClientController::class , 'index'])->name('client');
        route::get('/add/client' , [ClientController::class , 'createClient'])->name('client.addClient');
        route::post('/client/store' , [ClientController::class , "ClientStore"])->name('client.store');
        route::get("/getClientData" , [ClientController::class , "getClientData"])->name('getClientData');
        route::get('/edit/client/{id}' , [ClientController::class , 'EditClient'])->name('client.edit');
        route::delete("/delete/client/{id}" , [ClientController::class , 'DestoryClient'])->name('client.delete');
        route::put('/update/client/{id}' , [ClientController::class , 'UpdateClient'])->name('client.update');

        //Certificate
        route::get('/certificate', [CertificateController::class , 'index'])->name('certificate');
        Route::post('/certificate_store', [CertificateController::class, 'store'])->name('certificate.store');
        Route::post('/certificate/update/{id}', [CertificateController::class, 'update'])->name('certificate.update');
        Route::get('/certificate_get_data', [CertificateController::class, 'getData'])->name('certificate_get_data');
        Route::get('/certificate/edit/{id}', [CertificateController::class, 'edit'])->name('certificate.edit');
        Route::delete('/certificate/delete/{id}', [CertificateController::class, 'destroy'])->name('certificate.delete');
        
        // video module 
        Route::get('/video' , [VideoModuleController::class , 'index'])->name('admin.video');
        Route::get('/add-video' , [VideoModuleController::class , 'create'])->name('admin.createVideo');
        Route::POST('/add-video' , [VideoModuleController::class , 'Store'])->name('admin.video.store');
        Route::post('/upload-video-chunk' , [VideoModuleController::class , 'chunkUpload'])->name('admin.video.chunkUpload');
        route::get('/getVideoeData' , [VideoModuleController::class , 'getVideoeData'])->name('admin.getVideoeData');
        route::get('/video-edit/{id}' , [VideoModuleController::class , 'Edit'])->name('admin.video.edit');
        route::post('/video-update/{id}' , [VideoModuleController::class , 'Update'])->name('admin.video.update');
        route::delete('/video-delete/{id}' , [VideoModuleController::class , 'Destory'])->name('admin.video.delete');
        
        // application Product inquiry
        route::get('/appliication-product-inquiry' , [APKProductInquiryController::class , 'index'])->name('admin.apk.product.inquiry');
        route::get('/appliication-product-inquirys' , [APKProductInquiryController::class , 'GetData'])->name('admin.apk.get.product.inquiry');
    
    });

    


    // that is only for front-user  
    route::middleware(['auth' , 'role:sales'])->group(function(){
        route::get('/front-dashboard' , function() {
            return 'Front-user'; 
        });
        // route::post('/logout' , [LoginController::class , 'logout'])->name('logout');

    }); 
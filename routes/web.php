<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumVideoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryAlbumController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactContrroller;
use App\Http\Controllers\ContactFooterController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImageSliderController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\InfovalueController;
use App\Http\Controllers\JenismateriController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SocialTeamController;
use App\Http\Controllers\SubmateriController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArticleController::class, 'home'])->name('article.home');
Route::get('/article/detail/{id}', [ArticleController::class, 'detail'])->name('article.detaill');

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

Route::get('/backend', function () {
    if (Auth::check() && Auth::user()->role == 'user') {
        return redirect('/');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::middleware('auth')->group(function () {

    // Route::resource('article', ArticleController::class);
    //user
    Route::group(['middleware' => 'checkRole:admin'], function () {
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/edit', [ProfileController::class, 'useredit'])->name('profile.user-edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile', [ProfileController::class, 'uploadImage'])->name('profile.image');
    Route::get('/user', [UserController::class, 'user'])->name('profile.user');
    Route::get('/users{id}', [UserController::class, 'show'])->name('showuser');
    Route::get('/activity-log', [UserController::class, 'activitylog']);
    Route::delete('/hapus/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::resource('user', UserController::class)->middleware('role:superadmin');
    Route::resource('pelanggan', PelangganController::class);

    //article
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::put('/article/{id}/update', [ArticleController::class, 'update'])->name('article.update');
    Route::get('/article/{id}/', [ArticleController::class, 'edit'])->name('article.edit');
    Route::delete('/article/{id}/destroy', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('/admin', [ArticleController::class, 'crud'])->name('article.crud');
    Route::post('/article/{article}/new', [ArticleController::class, 'moveLast'])->name('article.new');
    Route::post('/article/{article}/old', [ArticleController::class, 'moveLatest'])->name('article.old');

    //materi
    Route::get('/materi/create{id}', [MateriController::class, 'create'])->name('materi.create');
    Route::get('/materi/index{id}', [MateriController::class, 'index'])->name('materi.index');
    Route::post('/materi/store', [MateriController::class, 'store'])->name('materi.store');
    Route::put('/materi/{id}/update', [MateriController::class, 'update'])->name('materi.update');
    Route::get('/materi/{id}/edit', [MateriController::class, 'edit'])->name('materi.edit');
    Route::delete('/materi/{id}/destroy', [MateriController::class, 'destroy'])->name('materi.destroy');
    Route::get('/materi/crud', [MateriController::class, 'crud'])->name('materi.crud');
    Route::post('/materi/{materi}/new', [MateriController::class, 'moveLast'])->name('materi.new');
    Route::post('/materi/{materi}/old', [MateriController::class, 'moveLatest'])->name('materi.old');

    //module
    Route::get('/module/create', [JenismateriController::class, 'create'])->name('modul.create');
    Route::get('/module/index', [JenismateriController::class, 'index'])->name('modul.index');
    Route::get('/module/detail{id}', [JenismateriController::class, 'detail'])->name('modul.detail');
    Route::post('/module/store', [JenismateriController::class, 'store'])->name('modul.store');
    Route::put('/module/{id}/update', [JenismateriController::class, 'update'])->name('modul.update');
    Route::get('/module/{id}/edit', [JenismateriController::class, 'edit'])->name('modul.edit');
    Route::delete('/module/{id}/destroy', [JenismateriController::class, 'destroy'])->name('modul.destroy');
    Route::get('/module/crud', [JenismateriController::class, 'crud'])->name('modul.crud');
    Route::post('/module/{modul}/new', [JenismateriController::class, 'moveLast'])->name('modul.new');
    Route::post('/module/{modul}/old', [JenismateriController::class, 'moveLatest'])->name('modul.old');

    //Submateri
    Route::get('/sub-materi/{id}/create', [SubmateriController::class, 'create'])->name('sub-materi.create');
    Route::post('/sub-materi/store', [SubmateriController::class, 'store'])->name('sub-materi.store');
    Route::put('/sub-materi/{id}/update', [SubmateriController::class, 'update'])->name('sub-materi.update');
    Route::get('/sub-materi/{id}/edit', [SubmateriController::class, 'edit'])->name('sub-materi.edit');
    Route::delete('/sub-materi/{id}/destroy', [SubmateriController::class, 'destroy'])->name('sub-materi.destroy');
    Route::get('/sub-materi/crud', [SubmateriController::class, 'crud'])->name('sub-materi.crud');
    Route::get('/sub-materi/index', [SubmateriController::class, 'index'])->name('sub-materi.index');
    Route::post('/sub-materi/{materi}/new', [SubmateriController::class, 'moveLast'])->name('sub-materi.new');
    Route::post('/sub-materi/{materi}/old', [SubmateriController::class, 'moveLatest'])->name('sub-materi.old');

    //galery

    Route::get('/galery/create/{id}', [GaleryController::class, 'create'])->name('galery.create');
    Route::get('/galery/{id}/detail', [GaleryController::class, 'details'])->name('galery.details');
    Route::get('/crud', [GaleryController::class, 'crud'])->name('galery.crud');
    Route::get('/galery/{id}/edit', [GaleryController::class, 'edit'])->name('edit.galery');

    //category
    Route::get('/category/create/', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/{id}/detail', [CategoryController::class, 'details'])->name('category.details');
    Route::get('/category/crud', [CategoryController::class, 'crud'])->name('category.crud');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::delete('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

    //category
    Route::get('/categoryalbum/create/', [CategoryAlbumController::class, 'create'])->name('categoryalbum.create');
    Route::get('/categoryalbum/{id}/detail', [CategoryAlbumController::class, 'details'])->name('categoryalbum.details');
    Route::get('/categoryalbum/crud', [CategoryAlbumController::class, 'crud'])->name('categoryalbum.crud');
    Route::post('/categoryalbum/store', [CategoryAlbumController::class, 'store'])->name('categoryalbum.store');
    Route::put('/categoryalbum/{id}/update', [CategoryAlbumController::class, 'update'])->name('categoryalbum.update');
    Route::get('/categoryalbum/{id}/edit', [CategoryAlbumController::class, 'edit'])->name('categoryalbum.edit');
    Route::delete('/categoryalbum/{id}/destroy', [CategoryAlbumController::class, 'destroy'])->name('categoryalbum.destroy');

    //video
    Route::get('/video/crud', [VideoController::class, 'crud'])->name('video.crud');
    Route::resource('video', VideoController::class);
    Route::get('/video/create/{id}', [VideoController::class, 'create'])->name('video.create');
    Route::get('/video/{id}/details', [VideoController::class, 'details'])->name('video.details');
    Route::get('/video/{id}/edit', [VideoController::class, 'edit'])->name('edit.video');

    //album photo
    Route::post('/albums/store', [AlbumController::class, 'store']);
    Route::get('/albums/{album}/edit', [AlbumController::class, 'edit']);
    Route::put('/albums/{id}/update', [AlbumController::class, 'update'])->name('album.update');
    Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('album.destroy');
    Route::get('/albums/admin', [AlbumController::class, 'crud'])->name('album.crud');
    Route::get('/albums/create', [AlbumController::class, 'create'])->name('album.create');
    Route::get('/albums/{id}/edit/', [AlbumController::class, 'edit'])->name('album.edit');
    Route::get('/albums/detail', [AlbumController::class, 'detail'])->name('album.detail');
    Route::post('/albums/{album}/move-up', [AlbumController::class, 'moveUp'])->name('albums.moveUp');
    Route::post('/albums/{album}/move-down', [AlbumController::class, 'moveDown'])->name('albums.moveDown');

    //album video
    Route::post('/Albums/store', [AlbumVideoController::class, 'store']);
    Route::get('/Albums/{album}/edit', [AlbumVideoController::class, 'edit']);
    Route::put('/Albums/{id}/update', [AlbumVideoController::class, 'update'])->name('album.video.update');
    Route::delete('/Albums/{album}', [AlbumVideoController::class, 'destroy'])->name('album.video.destroy');
    Route::get('/Albums/admin', [AlbumVideoController::class, 'crud'])->name('album.video.crud');
    Route::get('/Albums/{id}/edit/', [AlbumVideoController::class, 'edit'])->name('album.video.edit');
    Route::get('/Albums/create', [AlbumVideoController::class, 'create'])->name('album.video.create');
    Route::get('/Albums/detail', [AlbumVideoController::class, 'detail'])->name('album.video.detail');
    Route::post('/Albums/{album}/move-up', [AlbumVideoController::class, 'moveUp'])->name('Albums.moveUp');
    Route::post('/Albums/{album}/move-down', [AlbumVideoController::class, 'moveDown'])->name('Albums.moveDown');

    //contact
    Route::get('/About-us/create', [ContactContrroller::class, 'create'])->name('contact.create');
    Route::put('/About-us/{id}/update', [ContactContrroller::class, 'update'])->name('contact.update');
    Route::get('/About-us/{id}/edit', [ContactContrroller::class, 'edit'])->name('contact.edit');
    Route::get('/About-us/crud', [ContactContrroller::class, 'crud'])->name('contact.crud');
    Route::delete('/About-us/{id}/delete', [ContactContrroller::class, 'destroy'])->name('contact.destroy');
    Route::post('/About-us/{contact}/move-up', [ContactContrroller::class, 'moveUp'])->name('contact.moveUp');
    Route::post('/About-us/{contact}/move-down', [ContactContrroller::class, 'moveDown'])->name('contact.moveDown');
    Route::post('/About-us/store', [ContactContrroller::class, 'store'])->name('contact.store');
    Route::middleware(['checkRowCount'])->group(function () {
        // buat batasin create
        Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');
    });

    //info
    Route::put('/info/{id}/update', [InformationController::class, 'update'])->name('info.update');
    Route::get('/info/{id}/edit', [InformationController::class, 'edit'])->name('info.edit');
    Route::get('/info/crud', [InformationController::class, 'crud'])->name('info.crud');
    Route::get('/info/create', [InformationController::class, 'create'])->name('info.create');
    Route::post('/info/store', [InformationController::class, 'store'])->name('info.store');

    //message
    Route::get('/message/crud', [MessageController::class, 'crud'])->name('message.crud');
    Route::get('/message/create', [MessageController::class, 'create'])->name('message.create');
    Route::post('/message/store', [MessageController::class, 'store'])->name('message.store');
    Route::get('/messages/inbox/{id}', [MessageController::class, 'openinbox'])->name('messages.open-inbox');
    Route::post('/messages/{id}/MarkAsRead', [MessageController::class, 'MarkAsRead'])->name('messages.mark-read');
    Route::post('/messages/{id}/Unread', [MessageController::class, 'UnreadMark'])->name('messages.Unread-Mark');
    Route::post('/message/{id}/delete', [MessageController::class, 'destroy'])->name('message.destroy');
    // Route::post('/message/delete/', [MessageController::class, 'delete'])->name('message.delete');

    //socialteams
    Route::put('/socialteams/{id}/update', [SocialTeamController::class, 'update'])->name('socialteams.update');
    Route::get('/socialteams/{id}/edit', [SocialTeamController::class, 'edit'])->name('socialteams.edit');
    Route::get('/socialteams/crud', [SocialTeamController::class, 'crud'])->name('socialteams.crud');
    Route::get('/socialteams/create/{id}', [SocialTeamController::class, 'create'])->name('socialteams.create');
    Route::post('/socialteams/store', [SocialTeamController::class, 'store'])->name('socialteams.store');
    Route::delete('/socialteams/{id}/delete', [SocialTeamController::class, 'destroy'])->name('socialteams.destroy');

    //info value
    Route::put('/infovalue/{id}/update', [InfovalueController::class, 'update'])->name('infovalue.update');
    Route::get('/infovalue/{id}/edit', [InfovalueController::class, 'edit'])->name('infovalue.edit');
    Route::get('/infovalue/crud', [InfovalueController::class, 'crud'])->name('infovalue.crud');
    Route::get('/infovalue/create', [InfovalueController::class, 'create'])->name('infovalue.create');
    Route::post('/infovalue/store', [InfovalueController::class, 'store'])->name('infovalue.store');
    Route::post('/infovalue/{info}/move-up', [InfovalueController::class, 'moveUp'])->name('infovalue.moveUp');
    Route::post('/infovalue/{info}/move-down', [InfovalueController::class, 'moveDown'])->name('infovalue.moveDown');

    //image header
    Route::put('/image/{id}/update', [ImageController::class, 'update'])->name('image.update');
    Route::get('/image/{id}/edit', [ImageController::class, 'edit'])->name('image.edit');
    Route::get('/image/crud', [ImageController::class, 'crud'])->name('image.crud');
    Route::get('/image/create', [ImageController::class, 'create'])->name('image.create');
    Route::post('/image/store', [ImageController::class, 'store'])->name('image.store');

    //teams
    Route::get('/team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('/team/{id}/update', [TeamController::class, 'update'])->name('team.update');
    Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
    Route::get('/team/crud', [TeamController::class, 'crud'])->name('team.crud');
    Route::delete('/team/{id}/delete', [TeamController::class, 'destroy'])->name('team.destroy');
    Route::post('/team/{team}/move-up', [TeamController::class, 'moveUp'])->name('team.moveUp');
    Route::post('/team/{team}/move-down', [TeamController::class, 'moveDown'])->name('team.moveDown');

    //edit backend
    //Logo
    Route::get('/Logo/{id}/edit', [LogoController::class, 'edit'])->name('logo.edit');
    Route::put('/Logo/{id}/update', [LogoController::class, 'update'])->name('logo.update');
    Route::get('/Logo/crud', [LogoController::class, 'crud'])->name('logo.crud');

    //Logo
    Route::get('/map/{id}/edit', [MapController::class, 'edit'])->name('map.edit');
    Route::put('/map/{id}/update', [MapController::class, 'update'])->name('map.update');
    Route::get('/map/crud', [MapController::class, 'crud'])->name('map.crud');

    //social
    Route::get('/social/{id}/edit', [SocialController::class, 'edit'])->name('social.edit');
    Route::put('/social/{id}/update', [SocialController::class, 'update'])->name('social.update');
    Route::get('/social/crud', [SocialController::class, 'crud'])->name('social.crud');

    //social
    Route::get('/contactfooter/{id}/edit', [ContactFooterController::class, 'edit'])->name('contactfooter.edit');
    Route::put('/contactfooter/{id}/update', [ContactFooterController::class, 'update'])->name('contactfooter.update');
    Route::get('/contactfooter/crud', [ContactFooterController::class, 'crud'])->name('contactfooter.crud');

    //imageslider
    Route::get('/sliderimage/{id}/edit', [ImageSliderController::class, 'edit'])->name('sliderimage.edit');
    Route::put('/sliderimage/{id}/update', [ImageSliderController::class, 'update'])->name('sliderimage.update');
    Route::get('/sliderimage/create', [ImageSliderController::class, 'create'])->name('sliderimage.create');
    Route::post('/sliderimage/store', [ImageSliderController::class, 'store'])->name('sliderimage.store');
    Route::get('/sliderimage/crud', [ImageSliderController::class, 'crud'])->name('sliderimage.crud');
    Route::delete('/sliderimage/{id}/delete', [ImageSliderController::class, 'destroy'])->name('sliderimage.destroy');
    Route::post('/sliderimage/{slider}/move-up', [ImageSliderController::class, 'moveUp'])->name('sliderimage.moveUp');
    Route::post('/sliderimage/{slider}/move-down', [ImageSliderController::class, 'moveDown'])->name('sliderimage.moveDown');
});

//tampilan depan
Route::resource('galery', GaleryController::class);
Route::get('/galery/{id}/index', [GaleryController::class, 'index'])->name('index.galery');
Route::get('/Video/{id}/index', [VideoController::class, 'index'])->name('index.video');
Route::get('/albums', [AlbumController::class, 'index'])->name('album.index');
Route::get('/Albums', [AlbumVideoController::class, 'index'])->name('album.video.index');
Route::get('/About-us/index', [ContactContrroller::class, 'index'])->name('contact.index');
Route::get('/info/index', [InformationController::class, 'index'])->name('info.index');


require __DIR__ . '/auth.php';

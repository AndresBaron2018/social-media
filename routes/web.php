<?php

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

use App\Brand;
use App\Product;
use App\User;

use App\Album;
use App\Comment;
use App\Location;
use App\Photo;
use App\TagPhoto;
use App\Tag;



use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


Route::get('/test', function () {
    // Ejecute para crear un role admin
    // $role = Role::create(['name' => 'admin']);


    // ejecute para crear un usuario con role admin
    // $user = User::create([

    //     'name' => 'admin',
    //     'email' => 'admin@example.com',
    //     'password' => Hash::make('12345678'),
    //     'phone_number' => '5345654345',
    //     'address' => 'pereira',
    // ]);
    // $user->assignRole('admin');

    //entrar con el id del primer usuario
    \Auth::login(User::find(1));
    return redirect('/');

    // $products = Product::with('brand)->get();
    // $brands = Brand::with('product')->get();
    // $album = Album::with('photo')->get();
    // $comment = Comment::with('photo')->get();
    // $location = Location::with('album')->get();
    // $photo = Photo::with('tag')->get();
    // $tag = Tag::with('photo')->get();

    // dd($photo);
});


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'Admin', 'middleware' => ['role:admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::post('/store', 'AdminController@store');
    Route::post('/update/{user}', 'AdminController@update');
});

Route::group(['prefix' => 'Seller', 'middleware' => ['role:seller|admin']], function () {
    Route::get('/', 'SellerController@index');
    Route::post('/Seller/store', 'SellerController@store');
    Route::post('/Seller/update/{user}', 'SellerController@update');
    Route::get('/options', 'SellerController@options');
    Route::resource('brand', 'BrandController');
    Route::resource('product', 'ProductController');
});

Route::group(['middleware' => ['role:client|admin|seller']], function () {
    Route::get('/Client', 'SellerController@showClient')->name('client');
});

// user
Route::group(['middleware' => ['role:client|admin|seller']], function () {
    Route::get('/PersonalInformation', 'UserController@index')->name('PersonalInformation');
});

Route::get('/posts', 'UserController@posts');
Route::get('/blog/{post}', 'PostController@post')->name('post');
Route::get('/postCreate', 'UserController@postCreate');


Route::resource('album', 'AlbumController');

Route::resource('location', 'LocationController');

Route::resource('photo', 'PhotoController');

Route::resource('comment', 'CommentController');

Route::resource('tag', 'TagController');

Route::resource('user', 'UserController');
Route::get('/show', 'UserController@show');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ShowProducts', 'SellerController@showProducts')->name('products');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController; 
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomAuthController;
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







    
//Vina HP
Route::get('/home', function () {
    return view('home',['active'=>'home']);
}) ->name('home');


Route::get('/info', function () {
    return view('info', ['active'=>'info']);
}) ->name('info');


Route::get('/contact', function () {
    return view('contact',['active'=>'contact']);
}) ->name('contact');



Route::get('/tnf', function () {
    return view('tnf',['active'=>'tnf']);
}) ->name('tnf');

Route::get('/quality_management', function () {
    return view('quality_management',['active'=>'quality_management']);
}) ->name('quality_management');


Route::get('recruitment', function () {
    return view('recruitment',['active'=>'recruitment']);
}) ->name('recruitment');

Route::get('/tbags', function () {
    return view('tbags',['active'=>'tbags']);
}) ->name('tbags');






















/***
 * Practise Eloquent model
 */

Route::get('/project', function () {
    //DB::enableQueryLog();
    
    //Using Query Builder
    //$project = DB::table('du_ans')->get();

    //Using Eloquent Model
    $project = App\Models\Project::all();

    //dd(DB::getQueryLog());
    return view('project.index', compact('project'));
});
Route::get('/project/{pj}', function ($id) {
    //DB::enableQueryLog();

    $project = App\Models\Project::find($id);

    //dd(DB::getQueryLog());
    return view('project.show', compact('project'));
});









/***
 * Practise Cookies
 */

//Khi truy cập link lần đầu: show content form
//Những lần sau:tự động điền name và email theo data trong cookies (trong vòng 30p)
//Route::get('/contact', [ContactController::class, 'showContactForm']);
//khi submit form sẽ gửi nội dung hai field name và email vào Controller để tạo cookies, load lại trang và thông báo submit thành công
//Route::post('/contact', [ContactController::class, 'insertMessage']);






//Route sẽ đưa request chạy qua RoleMiddleware, sau đó tiếp tục tới MainController một cách riêng biệt
//Làm sao nó biết đó là RoleMiddleware? ==> do đã đăng ký trong Kernel.php là 'role'
// Route::get('/role',[MainController::class, 'checkRole'])->middleware('role:superadmin'); 








/*
//per request
//Singleton



HelloController -> HiService
HelloController -> XinChaoService


HiService -> HelloRepository //khoi tao
XinChaoService -> HelloRepository //reference

//DOI
new HiService(new HelloRepository)

/non singleton

HiService -> HelloRepository //khoi tao
XinChaoService -> HelloRepository //khoi tao

*/
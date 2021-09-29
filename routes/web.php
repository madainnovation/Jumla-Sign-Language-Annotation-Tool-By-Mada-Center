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



Auth::routes();

Route::get('/', function (){
    return redirect(\route("login"));
});
Route::get("/register",function (){
    return redirect(\route("login"));
})->name("register");
Route::prefix("cp")->middleware("auth")->group(function (){
    Route::get('/', function () {
        return view('ControlPanel.dashboard');
    })->name("cp");
    Route::get('/sentence/list', \App\Http\Livewire\Sentence\SentenceList::class)->name('sentence.list');
    Route::get('/sentence/addFromFile', \App\Http\Livewire\Sentence\AddFromFile::class)->name('sentence.addFromFile');
    Route::get('/sentence/{id?}', \App\Http\Livewire\Sentence\SentenceForm::class)->name('sentence.form');
    Route::get('/form/list', \App\Http\Livewire\Forms\FormsList::class)->name('form.list');
    Route::get('/form/{id?}', \App\Http\Livewire\Forms\FormsForm::class)->name('form.form');

    Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});



Route::post('file-upload', [\App\Http\Controllers\FileController::class,"fileUploadPost"])->name('fileUploadPost');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/annotation', \App\Http\Livewire\Front\AnnottionList::class)->name('front.annotation.list');
Route::get('/annotation/{id}', \App\Http\Livewire\Front\AnnotationPage::class)->name('front.annotation');

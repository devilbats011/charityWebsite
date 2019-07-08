<?php
//use \App\Http\Controllers\SandboxAjaxController as test1
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
	return redirect(route('homepage'));
	 
   //return view('/welcome');
	/* $b = new App\berita;
	 $b->tajuk = "TESTSHTOUt";
	 $c = $b->save();
	 dd($c);*/
	echo route("eg")."?"."YO";
	$value = session()->flash('key', "hello key");
	echo session()->get('key');
	echo "<br>";
	print_r( ['englishGreetings'=>'Hello Mate!']);
	echo "<br>";
	$valuejson = json_encode(['englishGreetings'=>'Hello Mate!']) ;
	print_r( $valuejson );
	echo '<br>';
	print_r( json_decode($valuejson)  ); //this is a stdclass
	echo '<br>';
	print_r(json_decode($valuejson) ->englishGreetings); //access thru stdclass
	echo '<br>';
	$castArray = (array) json_decode($valuejson); 
	print_r($castArray['englishGreetings']); //access thru array       //$castArray[0] <-- caught error : undefined offset 0
	echo '<br>';
	
});



Route::get('/eg','SandboxAjaxController@example')->name('eg');
Route::get('/eg2','TrashCodeHomeController@boley')->name('eg2');

//->middleware('auth');




Route::prefix('sandbox')->group(function(){

	Route::get('/ajaxtest', 'SandboxAjaxController@index');

	Route::get('/dummypost','SandboxAjaxController@dummypost');

	Route::get('/pkasberita','SandboxAjaxController@PkasBerita');

	Route::get('/paypaltest', function () {
		  return view('sandbox/paypal');
	});

});

Auth::routes();

Route::get('/payment/process', 'PaymentsController@process')->name('payment.process');
Route::get('/pay_complete','PaymentsController@payComplete')->name('pay_complete');
Route::post('/payment/infaq', 'PaymentsController@infaq')->name('infaq');
/*
Route::get('/infaq',function(){
	return view('/welcome');
})->name('infaq');
*/

Route::get('/email_register','HomeController@emailRegister')->name('emailRegister');
Route::get('/send_email_register','HomeController@send')->name('send.email.register');


Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard')->middleware('auth');

Route::get('/homepage','HomeController@homepage')->name('homepage');
Route::get('/new_berita','HomeController@newBerita')->name('new.berita');
Route::get('/delete_berita','HomeController@deleteBerita')->name('delete.berita');
Route::post('/post_new_berita','HomeController@postNewBerita')->name('post.new.berita');
Route::get('/pkas_berita','HomeController@PkasBerita')->name('pkasberita');

Route::get('/header','HomeController@Header')->name('header');

Route::get('/getContentArray','HomeController@getContentArray')->name('getContentArray');
Route::get('/getBeritaErrors','HomeController@getBeritaErrors')->name('getBeritaErrors');

Route::get('/editberita','HomeController@EditBerita')->name('editberita');
Route::post('/testpost','HomeController@editpost')->name('testpost');

Route::post('/contactedit','HomeController@contactedit')->name('contactedit');

Route::post('/StoreHeader','HomeController@StoreHeader')->name('StoreHeader');
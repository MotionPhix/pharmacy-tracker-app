<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::middleware('splade')->group(function () {
  // Registers routes to support Table Bulk Actions and Exports...
  Route::spladeTable();

  // Registers routes to support async File Uploads with Filepond...
  Route::spladeUploads();

  /*Route::get('/', function (Request $request) {
    // $details = GeoLocation::lookup('102.70.0.122');
    $geo = \Geo::get('102.70.0.122');

    $lat = $geo->latitude;
    $lng = $geo->longitude;

    //   $data = DB::table("pharmacies")
    //     ->select(
    //       "pharmacies.id",
    //       "pharmacies.name",
    //       DB::raw("6371 * acos(cos(radians(" . $lat . "))
    //               * cos(radians(pharmacies.lat))
    //               * cos(radians(pharmacies.lng) - radians(" . $lng . "))
    //               + sin(radians(" . $lat . "))
    //               * sin(radians(pharmacies.lat))) AS distance")
    //     )
    //     ->groupBy("id")
    //     ->orderBy('distance')
    //     ->paginate(4);

    $data = DB::table("pharmacies")
      ->select("id", "name", DB::raw("convert((6371 * acos( cos(radians(lat)) * cos (radians($lat)) * cos ( radians($lng) - radians (lon) ) + sin (radians(lat)) * sin (radians($lat)) ) ), decimal(12,2)) as distance"))
      ->groupBy("id")
      ->orderBy('distance')
      ->paginate(4);

    return view('index', [
      'data' => $data,
    ]);
  });*/

  Route::get('/', [
    \App\Http\Controllers\PharmacyController::class, 'index'
  ]);

  Route::get('/welcome', function () {
    return view('welcome');
  })->name('viva');

  Route::resource(
    'pharmacies',
    \App\Http\Controllers\PharmacyController::class
  )->except([
    'create', 'store', 'update', 'destroy', 'edit'
]);;

  Route::get('/search-pharmacy', function () {
    return view('pharmacies.search', [
      'pharmacies' => \App\Models\Pharmacy::orderBy('name')->get(['id', 'name', 'address'])
    ]);
  })->name('pharmacies.search');

  Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
      return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  });

  require __DIR__ . '/auth.php';
});

<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $data = \Geo::get('41.190.94.108'); // $request->ip

    $lat = $data->latitude;
    $lng = $data->longitude;

    // dd(Pharmacy::ClosestTo($data->latitude, $data->longitude)->get());

    /*$data = DB::table('pharmacies')
      ->select('name', DB::raw("MIN(address) as address"), DB::raw("SUBSTR(NAME, 1, 1) as name_initial"), DB::raw("(3959 * ACOS(COS(RADIANS(MIN(lat))) * COS(RADIANS(33.3564)) * COS(RADIANS(-122.3265) - RADIANS(MIN(lng))) + SIN(RADIANS(MIN(lat))) * SIN(RADIANS(33.3564)))) as distance"))
      // ->where('name', '!=', 'a')
      ->groupBy('name', 'name_initial')
      ->orderBy('distance', 'asc')
      ->limit(6)
      ->get();*/

    $data = DB::table('pharmacies')
    ->select(
      'name',
      DB::raw("SUBSTR(NAME, 1, 1) as name_initial"), DB::raw("
      (ACOS(COS(RADIANS(90-$lat))
       * COS(RADIANS(90-lat))
       + SIN(RADIANS(90-$lat))
       * SIN(RADIANS(90-lat))
       * COS(RADIANS($lng-lng)))
       * 6371) AS distance
    "))
    ->orderBy('DISTANCE','asc')
    ->limit(6)
    ->get();

    return view('index', [
      'data' => $data
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pharmacies.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pharmacy  $pharmacy
   * @return \Illuminate\Http\Response
   */
  public function show(Pharmacy $pharmacy)
  {
    return view('pharmacies.show', [
      'pharmacy' => $pharmacy
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pharmacy  $pharmacy
   * @return \Illuminate\Http\Response
   */
  public function edit(Pharmacy $pharmacy)
  {
    return view('pharmacies.create');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pharmacy  $pharmacy
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pharmacy $pharmacy)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pharmacy  $pharmacy
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pharmacy $pharmacy)
  {
    //
  }
}

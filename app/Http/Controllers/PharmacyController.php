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
    $data = \Geo::get($request->ip);

    $lat = $data->latitude;
    $lng = $data->longitude;

    // dd(Pharmacy::ClosestTo($data->latitude, $data->longitude)->get());

    // $data = DB::table("pharmacies")
    //   ->select(
    //     "id",
    //     "name",
    //     DB::raw("SUBSTR(name  ) as alpha, 6371 * acos(cos(radians(" . $lat . "))
    //             * cos(radians(lat))
    //             * cos(radians(lng) - radians(" . $lng . "))
    //             + sin(radians(" . $lat . "))
    //             * sin(radians(lat))) AS distance")

    //   )

    $data = DB::table('pharmacies')
      ->select('name', DB::raw("MIN(address) as address"), DB::raw("MIN(lat) as lat"), DB::raw("MIN(lng) as lng"), DB::raw("SUBSTR(NAME, 1, 1) as name_initial"), DB::raw("(3959 * ACOS(COS(RADIANS(MIN(lat))) * COS(RADIANS(33.3564)) * COS(RADIANS(-122.3265) - RADIANS(MIN(lng))) + SIN(RADIANS(MIN(lat))) * SIN(RADIANS(33.3564)))) as distance"))
      ->where('name', '!=', 'a')
      ->groupBy('name', 'name_initial')
      ->orderBy('distance', 'asc')
      ->get();

    dd($data);

    return view('index', [
      'data' => $data
    ]);

    // $lat = YOUR_CURRENT_LATTITUDE;
    // $lng = YOUR_CURRENT_LONGITUDE;

    // $data = DB::table("users")
    //   ->select(
    //     "users.id",
    //     DB::raw("6371 * acos(cos(radians(" . $lat . "))
    //             * cos(radians(users.lat))
    //             * cos(radians(users.lng) - radians(" . $lng . "))
    //             + sin(radians(" . $lat . "))
    //             * sin(radians(users.lat))) AS distance")
    //   )
    //   ->groupBy("users.id")
    //   ->get();
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

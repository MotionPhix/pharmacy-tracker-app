<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'address',
    'lat',
    'lng'
  ];

  public function scopeClosestTo($query, $lat, $lng)
  {
    return $query->orderByRaw(
      '(6371 * acos(cos(radians(' . floatval($lat) . ')) * cos(radians(lat)) * cos(radians(lng) - radians(' . floatval($lng) . ')) + sin(radians(' . intval($lat) . ')) * sin(radians(lat)))) ASC'
    );
  }
}

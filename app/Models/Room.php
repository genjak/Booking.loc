<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
  use HasFactory;

  public static function getFilterBooking($dataCheckIn, $dataCheckOut)
  {
    /* // example query
      SELECT * FROM rooms WHERE id NOT IN(
      SELECT idRoom
      from bookings b
      WHERE
      ('2022-06-16' BETWEEN b.dateCheckIn AND b.dateCheckOut) or
      ('2022-06-17' BETWEEN b.dateCheckIn AND b.dateCheckOut) OR
      (b.dateCheckIn between '2022-06-16' and '2022-06-17') OR
      (b.dateCheckOut between '2022-06-16' and '2022-06-17') or
      (b.dateCheckIn > '2022-06-16' AND b.dateCheckOut < '2022-06-17')
      )/**/

    $selectSql = "select * from rooms where id NOT IN( SELECT idRoom from bookings b WHERE ('" . $dataCheckIn . "' BETWEEN b.dateCheckIn AND b.dateCheckOut) or ('" . $dataCheckOut . "' BETWEEN b.dateCheckIn AND b.dateCheckOut) OR (b.dateCheckIn between '" . $dataCheckIn . "' and '" . $dataCheckOut . "') OR (b.dateCheckOut between '" . $dataCheckIn . "' and '" . $dataCheckOut . "') or      (b.dateCheckIn > '" . $dataCheckIn . "' AND b.dateCheckOut < '" . $dataCheckOut . "') ) order by number";

    $results = \DB::select($selectSql);

    return $results;
  }
}

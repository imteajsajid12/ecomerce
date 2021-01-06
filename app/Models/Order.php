<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    static function total1(){

        $allcard= Order:: all();
        foreach ($allcard as  $pro) {
         $name=$pro->User->name;
        return $name;

      }


    }
    static function total(){

        $allcard= Order:: all();
         $total21=0;
      foreach($allcard as $pro){
          $total21 += $pro->quantity;
      }
      return $total21;

        }
}

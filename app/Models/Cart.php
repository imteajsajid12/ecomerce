<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Cart extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class);
    }
    static function total(){


        $userid= auth::id();
        $allcard= Cart:: where ('user_id',$userid)->get();

         $total21=0;
      foreach($allcard as $pro){
          $total21 += $pro->quantity;
      }
      return $total21;

        }
}

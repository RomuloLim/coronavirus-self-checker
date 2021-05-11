<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    use HasFactory;

    protected $table = 'diagnostics';
    protected $guarded = ['id'];

    public static function calcDiag($pacientStatus){
        // if($pacientStatus <= 10){
        //     return "SINTOMAS INSUFICIENTES";
        // }elseif($pacientStatus >= 40 && $pacientStatus < 60 ){
        //    return "POTENCIAL INFECTADO";
        // }else{
        //     return "POSSÍVEL INFECTADO";
        // }
        if($pacientStatus >= 60){
            return "POSSÍVEL INFECTADO";
        }elseif($pacientStatus >= 40){
            return "POTENCIAL INFECTADO";
        }else{
            return "SINTOMAS INSUFICIENTES";
        }
    }
}

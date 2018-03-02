<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $FILLABLE = ['nome','valor'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'produtos';
    
    public static function getAll(){
        return 'Get All Produtos';
    }
    
}
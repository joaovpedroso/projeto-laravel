<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;
    
    protected $FILLABLE = ['nome','valor'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $dates = ['deleted_at'];
    protected $table = 'produtos';
    
    public static function getAll(){
        return 'Get All Produtos';
    }
    
}
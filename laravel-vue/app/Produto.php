<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Produto extends Model
{
    use SoftDeletes;
    
    protected $FILLABLE = ['nome','valor'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $dates = ['deleted_at'];
    public function user()
    {
        //Relacionamento da Model Produto com a User
        return $this->belongsTo('App\User');
    }
    public static function listaProdutos($paginate){
        /*
        $listaProdutos = Produto::select('id','nome','valor','user_id')->paginate($paginate);
        
        //Selecionar nome do usuario que cadastrou
        foreach($listaProdutos as $key => $value){
            $value->user_id = User::find($value->user_id)->name;
            //$value->user_id = $value->user->name;
            //unset($value->user);
         }
         */
        
        $listaProdutos = DB::table('produtos')
                            ->join('users', 'users.id','=', 'produtos.user_id')
                            ->select('produtos.id','produtos.nome','produtos.valor','users.name')
                            ->whereNull('produtos.deleted_at')
                            ->paginate(5);
        return $listaProdutos;
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $table = 'cliente';

    protected $fillable = array(
        'nome', 'email'
    );

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function chamados()
    {
        return $this->hasMany(Chamado::class , 'clienteid', 'id');
    }
}

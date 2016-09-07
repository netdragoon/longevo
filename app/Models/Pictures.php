<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
    protected $table = 'pictures';

    protected $fillable = array(
        'id', 'description', 'file', 'content_type'
    );

    protected $primaryKey = 'id';

    public $timestamps = false;
}

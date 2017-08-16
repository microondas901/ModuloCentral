<?php

namespace App\Container\Calisoft\Src;

use Illuminate\Database\Eloquent\Model;

class TipoNomenclatura extends Model
{
    protected $primaryKey = "PK_id";
    protected $table = "TBL_TipoNomenclatura";
    protected $fillable = ['nombre','estandar','valor'];
}

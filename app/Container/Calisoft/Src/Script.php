<?php

namespace App\Container\Calisoft\Src;
use Illuminate\Database\Eloquent\Model;


class Script extends Model
{
    protected $table = "TBL_Scripts";
    protected $primaryKey = "PK_id";
    protected $fillable = ['url','estado','FK_ProyectoId'];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'FK_ProyectoId', 'PK_id');
    }
}

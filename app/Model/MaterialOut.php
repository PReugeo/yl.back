<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MaterialOut extends Model
{
    protected $table = 'material_out';

    public $timestamps = true;

    protected $fillable = [
        'warehouse_name',       //仓库名称
        'out_number',           //出库单号
        'whereabouts',          //去向
        'user',                 //领用人
        'out_time',             //出库时间
        'operator',             //操作人
        'remarks',              //备注
        'out_material',         //出库清单
    ];

    public function setOutMaterialAttribute($value) {
        $this->attributes['out_material'] = json_encode($value);
    }
}

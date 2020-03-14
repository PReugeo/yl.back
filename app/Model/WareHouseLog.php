<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WareHouseLog extends Model
{
    protected $table='warehouse_log';

    public $timestamps = true;

    protected $fillable = [
        'odd_number',               //单号
        'type',                     //操作类型
        'warehouse_name',           //仓库名称
        'material_name',            //物资名称
        'brand',                    //品牌规格
        'supplier',                 //供应商
        'unit',                     //单位
        'price',                    //单价
        'number',                   //操作数量
        'total',                    //金额
        'operator',                 //操作人
        'operator_time',            //变动时间
    ];
}
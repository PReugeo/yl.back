<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = "accounts";

    public $timestamps = true;

    protected $fillable = [
      'account_number',
      'member_number',
      'member_name',
      'beds',
      'account_balance',
      'beds_cost',
      'meal_cost',
      'nursing_cost',
      'other_cost'
    ];
}
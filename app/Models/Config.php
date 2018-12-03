<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['name','data'];

    //得到的数据是以json形式 通过$casts转化为数组形式存储
	protected $casts = [
		'data' => 'array',
	];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phaky extends Model
{
    use HasFactory;
    protected $table = 'phaky';

    protected $fillable=[
    'loai',
    'anhdaidien',
    'hoten',
    'gioitinh',
    'ngaysinh',
    'ngaymat',
    'tinhtrang',
    'doithu',
    'idcha',
    'idme', 
    'vochong',
    'thu',
    'noidung'
];
     public $timestamps = false;
}
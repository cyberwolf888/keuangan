<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dana extends Model
{
    protected $table = 'dana';

    public function getStatus()
    {
        $status = ['1'=>'Proses', '2'=>'Selesai'];
        return $status[$this->status];
    }
}

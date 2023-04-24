<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyNew extends Model
{
    use HasFactory;
    protected $fillable = ['show'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}

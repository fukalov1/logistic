<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected function getDate1Attribute()
    {
        return (new Carbon($this->date))->formatLocalized('%d-%m-%Y');
    }
}

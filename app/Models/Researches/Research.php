<?php

namespace App\Models\Researches;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'researches';

    protected $fillable = [
        "title",
        "researcher",
        "number_of_pages",
        "date",
        "file",
        "views",
    ];
}

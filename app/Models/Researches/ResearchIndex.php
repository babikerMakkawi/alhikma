<?php

namespace App\Models\Researches;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchIndex extends Model
{
    use HasFactory;

    protected $fillable = [
        "subject",
        "title",
        "researcher",
        "number",
    ];
}

<?php

namespace App\Models\Sievphow;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlideImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = "sievphow_slide_images";
}

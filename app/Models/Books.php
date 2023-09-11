<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "sievphow_books";

    public function category()
    {
        return $this->belongsTo(BookCategory::class,'book_categories_id'); 
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_user','book_id','user_id');
    }

}

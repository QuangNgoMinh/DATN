<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected  $fillable = ['book_name', 'author_id', 'publisher_id', 'category_id','unique_id' , 'book_status', 'total_book', 'remaining_book'];

    public function authors()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function publishers()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function issues()
    {
        return $this->hasMany(IssueBook::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class RatingComment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rating_comments';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded =[];

    /**
     * Get the user that owns the rating comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product that the rating comment is about.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

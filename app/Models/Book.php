<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['is_deleted', 'user_id'];

    public function scopeNotDeleted($query)
    {
        //! Burada bir method oluşturduk ve başka bir yerde sadece NotDeleted() kullanarak (scope olmadan) alttaki filtrelemeyi otomatik olarak yapabileceğiz.
        return $query->where('is_deleted', 0);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

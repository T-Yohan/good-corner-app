<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\User;
class Annonce extends Model
{
    use HasFactory;

        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }
}

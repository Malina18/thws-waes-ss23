<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CheckListItem extends Model
{
    use HasFactory;
    public $guarded = [];
    public function CheckLists(): BelongsTo {
        return $this->belongsTo(CheckLists::class);
    }
}

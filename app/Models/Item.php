<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_checklist',
        'itemName',
    ];

    public function checklists()
    {
        return $this->belongsTo(Checklist::class);
    }
}

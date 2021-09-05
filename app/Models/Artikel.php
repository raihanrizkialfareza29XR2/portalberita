<?php

namespace App\Models;
use App\Models\Kategori;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table= 'artikel';

    protected $guarded = ['id'];
    
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}

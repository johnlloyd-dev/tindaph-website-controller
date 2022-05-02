<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Store extends Model
{
    use HasFactory;
    protected $appends = ['full_url'];
    protected $table = 'store';
    protected $fillable = [
        'filename', 'url'
    ];

    public function getFullUrlAttribute(){
        return Storage::disk('minio')->url($this->url);
    }
}

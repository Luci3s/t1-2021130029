<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops'; // Nama tabel di database

    // Disable auto-increment karena id menggunakan CHAR(12)
    public $incrementing = false;

    // Set key type to string (karena id adalah CHAR, bukan integer)
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'product_name',
        'description',
        'retail_price',
        'wholesale_price',
        'origin',
        'quantity',
        'product_img',
    ];

    protected $append = [
        'image_url'
    ];

    public function getImageUrlAttribute()
    {
        //Cek apakah image merupakan URL, jika ya maka gunakan URL tersebut
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }
        //Jika bukan URL, maka gunakan Storage::url untuk mengambil URL dari path gambar
        return $this->image ? Storage::url($this->image) : null;
    }
}

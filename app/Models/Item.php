<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['stock_quantity'];

    const STATUS = [
        1 => [ 'label' => '公開' ],
        2 => [ 'label' => '非公開' ],
    ];

    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}

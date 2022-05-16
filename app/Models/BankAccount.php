<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
      /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'bank_accounts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

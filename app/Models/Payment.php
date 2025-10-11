<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'method',
        'txnid',
        'status',
        'amount'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function items()
    {
        return $this->hasMany(PaymentItem::class);
    }

    // Calculate total amount from payment items
    public function getTotalAmountAttribute()
    {
        return $this->items()->sum('price');
    }
}

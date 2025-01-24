<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The UserPayment model represents payment records associated with users.
 * It stores details of transactions such as the amount, currency, and payment type.
 */
class UserPayment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * This table contains payment records for users.
     *
     * @var string
     */
    protected $table = 'user_payments';

    /**
     * The attributes that are mass assignable.
     * These fields can be filled during model creation or updates.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'transaction_id',
        'amount',
        'currency',
        'payment_type'
    ];

    /**
     * The attributes that should be cast to native types.
     * These fields are automatically converted to the specified type when accessed.
     *
     * @var array
     */
    protected $casts = [
        'amount' => 'float',
    ];

    /**
     * Define an inverse one-to-many relationship with the User model.
     * This links the payment record to the user who made the payment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

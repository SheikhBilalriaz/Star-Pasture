<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The PaymentTries model represents the number of failed payment attempts for a user.
 */
class PaymentTries extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * This table stores information about monthly payment tries.
     *
     * @var string
     */
    protected $table = 'monthly_payment_tries';

    /**
     * The attributes that are mass assignable.
     * These fields can be filled during model creation or updates.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'failed_tries'
    ];

    /**
     * Define an inverse one-to-one or many relationship with the User model.
     * This links the payment tries record to its associated user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

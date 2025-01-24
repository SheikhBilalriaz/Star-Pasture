<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The EmailCount model represents the count of activation emails sent to a user.
 */
class EmailCount extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activation_email_count';

    /**
     * The attributes that are mass assignable.
     * These fields can be filled during model creation or updates.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'email_count'
    ];

    /**
     * Define an inverse one-to-one or many relationship with the User model.
     * This links the email count record to its associated user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

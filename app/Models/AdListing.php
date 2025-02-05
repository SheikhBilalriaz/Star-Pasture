<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdListing extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ad_listing';

    protected $fillable = [
        'user_id',
        'listing_type',
        'contact_name',
        'phone',
        'desc',
        'is_approved',
    ];

    /**
     * Get the user that owns the ad listing.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the images for the ad listing.
     */
    public function images()
    {
        return $this->hasMany(AdImages::class);
    }

    /**
     * Get the social links for the ad listing.
     */
    public function socialLinks()
    {
        return $this->hasMany(AdSocialLinks::class);
    }
}

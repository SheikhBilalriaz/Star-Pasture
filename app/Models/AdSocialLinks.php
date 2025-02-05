<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdSocialLinks extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ad_social_links';

    protected $fillable = [
        'ad_listing_id',
        'media_type',
        'link',
    ];

    /**
     * Get the ad listing that owns the social link.
     */
    public function adListing()
    {
        return $this->belongsTo(AdListing::class);
    }
}

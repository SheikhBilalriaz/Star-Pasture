<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdImages extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ad_images';

    protected $fillable = [
        'ad_listing_id',
        'img_path',
    ];

    /**
     * Get the ad listing that owns the image.
     */
    public function adListing()
    {
        return $this->belongsTo(AdListing::class);
    }
}

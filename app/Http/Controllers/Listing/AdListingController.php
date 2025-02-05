<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\AdListing;
use Illuminate\Http\Request;

class AdListingController extends Controller
{
    public function ad_listing_form()
    {
        return view('frontend.ad_listing_form', ['title' => 'Star Pasture - Ad Listing']);
    }

    public function ad_listing_form_submit(Request $request)
    {
        $validated = $request->validate([
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_name' => 'required|string|max:255',
            'phone' => 'required|string',
            'desc' => 'nullable|string',
            'listing_type' => 'required|in:talent_roster,services,products,host_bnb',
        ]);

        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/ads', 'public');
                $uploadedImages[] = $path;
            }
        }

        $adListing = AdListing::create([
            'user_id' => auth()->user()->id,
            'contact_name' => $request->contact_name,
            'phone' => $request->phone,
            'desc' => $request->desc,
            'listing_type' => $request->listing_type,
            'is_approved' => false,
        ]);

        foreach ($uploadedImages as $imagePath) {
            $adListing->images()->create([
                'img_path' => $imagePath,
            ]);
        }

        if ($request->has('social_media_links')) {
            foreach ($request->social_media_links as $link) {
                $adListing->socialLinks()->create([
                    'media_type' => $link['type'],
                    'link' => $link['link'],
                ]);
            }
        }

        return redirect()->route('ad_listing.show', $adListing->id)
            ->with('success', 'Your ad listing has been created successfully wait for approval.');
    }

    public function show($id)
    {
        $adListing = AdListing::with('images', 'socialLinks')->findOrFail($id);

        return view('frontend.ad_listing_show', ['title' => 'Star Pasture - Ad Listing'], compact('adListing'));
    }
}

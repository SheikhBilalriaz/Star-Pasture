@extends('frontend.partials.master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        ul.list-unstyled li {
            margin-bottom: 10px;
            font-size: 16px;
        }

        ul.list-unstyled li i {
            color: #007bff;
        }

        .badge {
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 8px;
        }
    </style>
    <div class="container mb-5 mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>{{ $adListing->contact_name }}'s Ad Listing</h4>
                <span class="badge {{ $adListing->is_approved ? 'bg-success' : 'bg-danger' }}">
                    {{ $adListing->is_approved ? 'Approved' : 'Not Approved' }}
                </span>
            </div>
            <div class="card-body">
                <p><strong>Phone:</strong> {{ $adListing->phone }}</p>
                <p><strong>Description:</strong> {{ $adListing->desc }}</p>
                <p><strong>Listing Type:</strong> {{ ucfirst($adListing->listing_type) }}</p>

                <h5>Uploaded Images:</h5>
                <div class="row">
                    @foreach ($adListing->images as $image)
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $image->img_path) }}" class="img-fluid" alt="Ad Image">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5>Social Links</h5>
            </div>
            <div class="card-body">
                @php
                    $socialMediaIcons = [
                        'facebook' => 'fab fa-facebook-f',
                        'twitter' => 'fab fa-twitter',
                        'linkedin' => 'fab fa-linkedin-in',
                        'instagram' => 'fab fa-instagram',
                        'youtube' => 'fab fa-youtube',
                        'tiktok' => 'fab fa-tiktok',
                        'website' => 'fas fa-globe',
                        'default' => 'fas fa-link',
                    ];
                @endphp
                @if ($adListing->socialLinks->isNotEmpty())
                    <ul class="list-unstyled">
                        @foreach ($adListing->socialLinks as $link)
                            @php
                                $mediaType = strtolower($link->media_type);
                                $iconClass = $socialMediaIcons[$mediaType] ?? $socialMediaIcons['default'];
                            @endphp
                            <li>
                                <i class="{{ $iconClass }} me-2"></i>
                                <a href="{{ $link->link }}" target="_blank">{{ $link->link }}</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No social links available for this listing.</p>
                @endif
            </div>
        </div>
        <a href="{{ route('front.index') }}" class="btn btn-secondary mt-3">Go Back</a>
    </div>
@endsection

@extends('frontend.partials.master')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/style.css') }}">
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    {{-- <script src="{{ asset('frontend_assets/js/stripe_payment.js') }}"></script> --}}
    <style>
        .d-none {
            display: none;
        }

        .link-menu {
            border: 2px solid #ccc;
            border-radius: 7px;
            padding: 7px;
            margin: 7px 0px;
        }

        .link-item {
            padding: 5px;
            margin: 5px 0;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .link-item a {
            color: #007bff;
            text-decoration: none;
        }

        .link-item a:hover {
            text-decoration: underline;
        }
    </style>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div class="login-main">
                            <form id="register-user" class="theme-form" method="POST"
                                action="{{ route('ad_listing.submit') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="stripe_pub_key" name="stripe_pub_key"
                                    value="{{ config('services.stripe.key') }}">
                                <div>
                                    <h4>Ad Listing</h4>
                                    <p>Enter listing details to post</p>
                                    <div class="form-group">
                                        <label class="col-form-label">{{ __('Upload Images') }}</label>
                                        <input id="images" type="file"
                                            class="form-control @error('images.*') is-invalid @enderror" name="images[]"
                                            multiple>
                                        @error('images.*')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div id="image-previews" class="mt-2 d-flex flex-wrap"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">{{ __('Contact Name') }}</label>
                                        <input id="contact_name" type="text"
                                            class="form-control @error('contact_name') is-invalid @enderror"
                                            name="contact_name" value="{{ old('contact_name') }}" required
                                            autocomplete="contact_name" autofocus>
                                        @error('contact_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">{{ __('Phone') }}</label>
                                        <input id="phone" type="tel"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="tel">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">{{ __('Description') }}</label>
                                        <textarea id="desc" class="form-control @error('desc') is-invalid @enderror" name="desc" required
                                            autocomplete="desc">{{ old('desc') }}</textarea>
                                        @error('desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">{{ __('Listing Type') }}</label>
                                        <select name="listing_type"
                                            class="form-control @error('listing_type') is-invalid @enderror" required>
                                            <option value="talent_roster"
                                                {{ old('listing_type') == 'talent_roster' ? 'selected' : '' }}>Talent
                                                Roster</option>
                                            <option value="services"
                                                {{ old('listing_type') == 'services' ? 'selected' : '' }}>Services</option>
                                            <option value="products"
                                                {{ old('listing_type') == 'products' ? 'selected' : '' }}>Products</option>
                                            <option value="host_bnb"
                                                {{ old('listing_type') == 'host_bnb' ? 'selected' : '' }}>Host BnB</option>
                                        </select>
                                        @error('listing_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="social-links mt-4">
                                        <h5>Social Media Links</h5>
                                        <div id="social-items"></div>
                                        <div class="form-group">
                                            <button type="button" id="show-links-btn" class="btn btn-secondary">
                                                Add Social Media Link
                                            </button>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="card-element"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Payment Details') }}</label>
                                        <div id="card-element"
                                            class="form-control @error('stripeToken') is-invalid @enderror @if ($errors->has('stripe')) is-invalid @endif require">
                                        </div>
                                        @error('stripeToken')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if ($errors->has('stripe'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('stripe') }}</strong>
                                            </span>
                                        @endif
                                    </div> --}}
                                    <div class="form-group">
                                        <button type="submit" id="next-step" class="btn btn-primary btn-block w-100">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.remove-link-btn', function(e) {
            $(this).closest('.link-menu').remove();
        });
        $(document).ready(function() {
            let linkIndex = 0;
            $('#images').on('change', function(e) {
                let files = e.target.files;
                let previewsContainer = $('#image-previews');
                previewsContainer.empty();
                $.each(files, function(index, file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        let imagePreview = $(
                                '<div class="image-preview d-inline-block mr-2 position-relative">'
                            )
                            .append('<img src="' + event.target.result +
                                '" alt="Image preview" class="img-thumbnail" width="100">')
                            .append(
                                '<button type="button" class="remove-image btn btn-danger btn-sm position-absolute" style="top: 0; right: 0;">&times;</button>'
                            );
                        previewsContainer.append(imagePreview);
                        imagePreview.find('.remove-image').on('click', function() {
                            $(this).parent().remove();
                        });
                    };
                    reader.readAsDataURL(file);
                });
            });
            $('#show-links-btn').click(function() {
                $('#social-items').append(`
                    <div class="link-menu position-relative">
                        <button type="button" class="remove-link-btn btn btn-danger position-absolute top-0 end-0 m-2">x</button>
                        <div class="form-group">
                            <label for="social-media-type" class="col-form-label">Select Social Media</label>
                            <select class="form-control" name="social_media_links[${linkIndex}][type]">
                                <option value="">Select Social Media</option>
                                <option value="instagram">Instagram</option>
                                <option value="facebook">Facebook</option>
                                <option value="snapchat">Snapchat</option>
                                <option value="twitter">Twitter</option>
                                <option value="website">Website</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="social-media-link" class="col-form-label">Link</label>
                            <input type="url" class="form-control" name="social_media_links[${linkIndex}][link]" placeholder="Enter Link">
                        </div>
                    </div>
                `);
                linkIndex++;
            });
        });
    </script>
@endsection

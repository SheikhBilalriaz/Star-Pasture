@extends('frontend.partials.master')
@section('content')
    <section class="secBanner" style="background-image: url({{ asset('frontend_assets/images/banner_bg.jpg') }})">
        <div class="container">
            <div class="banner_vc">
                <div class="vector">
                    <img src="{{ asset('frontend_assets/images/banner_vector.png') }}" alt="">
                </div>
                <p>We are StarPasture the world's leading company. We are the home for music's greatest artists, innovators,
                    and entrepreneurs.</p>
                <div class="bn_form">
                    <form action="">
                        <div class="field">
                            <input type="text" id="search" name="search" class="form-control"
                                placeholder="Search For">
                            <select class="form-control" name="category" id="category">
                                <option value="">Select Category</option>
                                <option value="">Category 1</option>
                                <option value="">Category 2</option>
                                <option value="">Category 3</option>
                                <option value="">Category 4</option>
                            </select>
                            <input type="submit" name="submit" class="btn_submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="secCat">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="catBox">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/cat_1.png') }}" alt="">
                        </div>
                        <h4>Host Bnb</h4>
                        <p>6 Ads Posted</p>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="catBox">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/cat_2.png') }}" alt="">
                        </div>
                        <h4>Products</h4>
                        <p>7 Ads Posted</p>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="catBox">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/cat_3.png') }}" alt="">
                        </div>
                        <h4>Services</h4>
                        <p>8 Ads Posted</p>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="catBox">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/cat_4.png') }}" alt="">
                        </div>
                        <h4>Talent Roster</h4>
                        <p>5 Ads Posted</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="secListing">
        <div class="container">
            <div class="top_head">
                <h2>FEATURED LISTINGS</h2>
            </div>
            <div id="slider_listing" class="owl-theme owl-carousel">
                <div class="item">
                    <div class="list_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/list_1.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <h3>Haunt The Beetlejuice</h3>
                            <p>Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit.</p>
                            <div class="loct_price">
                                <span class="price">$2,000</span>
                                <span class="loct"><span class="icon"><img
                                            src="{{ asset('frontend_assets/images/loct.png') }}"
                                            alt=""></span>Gelsenkirchen</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="list_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/list_2.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <h3>Haunt The Beetlejuice</h3>
                            <p>Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit.</p>
                            <div class="loct_price">
                                <span class="price">$2,000</span>
                                <span class="loct"><span class="icon"><img
                                            src="{{ asset('frontend_assets/images/loct.png') }}"
                                            alt=""></span>Gelsenkirchen</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="list_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/list_3.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <h3>Haunt The Beetlejuice</h3>
                            <p>Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit.</p>
                            <div class="loct_price">
                                <span class="price">$2,000</span>
                                <span class="loct"><span class="icon"><img
                                            src="{{ asset('frontend_assets/images/loct.png') }}"
                                            alt=""></span>Gelsenkirchen</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="list_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/list_4.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <h3>Haunt The Beetlejuice</h3>
                            <p>Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit.</p>
                            <div class="loct_price">
                                <span class="price">$2,000</span>
                                <span class="loct"><span class="icon"><img
                                            src="{{ asset('frontend_assets/images/loct.png') }}"
                                            alt=""></span>Gelsenkirchen</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="list_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/list_1.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <h3>Haunt The Beetlejuice</h3>
                            <p>Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit.</p>
                            <div class="loct_price">
                                <span class="price">$2,000</span>
                                <span class="loct"><span class="icon"><img
                                            src="{{ asset('frontend_assets/images/loct.png') }}"
                                            alt=""></span>Gelsenkirchen</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="list_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/list_2.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <h3>Haunt The Beetlejuice</h3>
                            <p>Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit.</p>
                            <div class="loct_price">
                                <span class="price">$2,000</span>
                                <span class="loct"><span class="icon"><img
                                            src="{{ asset('frontend_assets/images/loct.png') }}"
                                            alt=""></span>Gelsenkirchen</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="list_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/list_3.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <h3>Haunt The Beetlejuice</h3>
                            <p>Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit.</p>
                            <div class="loct_price">
                                <span class="price">$2,000</span>
                                <span class="loct"><span class="icon"><img
                                            src="{{ asset('frontend_assets/images/loct.png') }}"
                                            alt=""></span>Gelsenkirchen</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="list_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/list_4.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <h3>Haunt The Beetlejuice</h3>
                            <p>Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit.</p>
                            <div class="loct_price">
                                <span class="price">$2,000</span>
                                <span class="loct"><span class="icon"><img
                                            src="{{ asset('frontend_assets/images/loct.png') }}"
                                            alt=""></span>Gelsenkirchen</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="secBrowse">
        <div class="container">
            <div class="top_head row">
                <div class="col-12 col-md-6">
                    <h2>browse</h2>
                </div>
                <div class="col-12 col-md-6">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem <br>accusantium doloremque laudantium,
                    </p>
                </div>
            </div>
            <div class="row bw_grids">
                <div class="col-12 col-md-6">
                    <div class="bw_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/bw_1.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <div class="hd_ctn">
                                <h4>Host Bnb</h4>
                                <h5>
                                    <span class="icon">
                                        <img src="{{ asset('frontend_assets/images/comments.png') }}" alt="">
                                    </span>
                                    5 Comments
                                </h5>
                            </div>
                            <p>List Your Bnb, Hotel Resort, Apartment,Private Condo, Homestay Rental, And More Now To Make
                                Sales.</p>
                            <div class="btns">
                                <a href="javascript:;" class="btn_follow">
                                    Follow
                                    <span class="bn_icon">+</span>
                                </a>
                                <a href="javascript:;" class="btn_crc">
                                    <img src="{{ asset('frontend_assets/images/heart.png') }}" alt="">
                                </a>
                                <a href="javascript:;" class="btn_crc">
                                    <img src="{{ asset('frontend_assets/images/share.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="bw_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/bw_2.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <div class="hd_ctn">
                                <h4>Host Bnb</h4>
                                <h5>
                                    <span class="icon">
                                        <img src="{{ asset('frontend_assets/images/comments.png') }}" alt="">
                                    </span>
                                    5 Comments
                                </h5>
                            </div>
                            <p>List Your Bnb, Hotel Resort, Apartment,Private Condo, Homestay Rental, And More Now To Make
                                Sales.</p>
                            <div class="btns">
                                <a href="javascript:;" class="btn_follow">
                                    Follow
                                    <span class="bn_icon">+</span>
                                </a>
                                <a href="javascript:;" class="btn_crc">
                                    <img src="{{ asset('frontend_assets/images/heart.png') }}" alt="">
                                </a>
                                <a href="javascript:;" class="btn_crc">
                                    <img src="{{ asset('frontend_assets/images/share.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="bw_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/bw_3.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <div class="hd_ctn">
                                <h4>Host Bnb</h4>
                                <h5>
                                    <span class="icon">
                                        <img src="{{ asset('frontend_assets/images/comments.png') }}" alt="">
                                    </span>
                                    5 Comments
                                </h5>
                            </div>
                            <p>List Your Bnb, Hotel Resort, Apartment,Private Condo, Homestay Rental, And More Now To Make
                                Sales.</p>
                            <div class="btns">
                                <a href="javascript:;" class="btn_follow">
                                    Follow
                                    <span class="bn_icon">+</span>
                                </a>
                                <a href="javascript:;" class="btn_crc">
                                    <img src="{{ asset('frontend_assets/images/heart.png') }}" alt="">
                                </a>
                                <a href="javascript:;" class="btn_crc">
                                    <img src="{{ asset('frontend_assets/images/share.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="bw_box">
                        <div class="thumb">
                            <img src="{{ asset('frontend_assets/images/bw_4.png') }}" alt="">
                            <span class="ft_tag">Featured</span>
                        </div>
                        <div class="ctn">
                            <div class="hd_ctn">
                                <h4>Host Bnb</h4>
                                <h5>
                                    <span class="icon">
                                        <img src="{{ asset('frontend_assets/images/comments.png') }}" alt="">
                                    </span>
                                    5 Comments
                                </h5>
                            </div>
                            <p>List Your Bnb, Hotel Resort, Apartment,Private Condo, Homestay Rental, And More Now To Make
                                Sales.</p>
                            <div class="btns">
                                <a href="javascript:;" class="btn_follow">
                                    Follow
                                    <span class="bn_icon">+</span>
                                </a>
                                <a href="javascript:;" class="btn_crc">
                                    <img src={{ asset('frontend_assets/images/heart.png') }}" alt="">
                                </a>
                                <a href="javascript:;" class="btn_crc">
                                    <img src="{{ asset('frontend_assets/images/share.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="secInfo">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_1.svg') }}" alt="">
                            </div>
                            <h4>Baby & Kids</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Baby & Kids Clothes</span>
                                    <span class="count">0</span>
                                </li>
                                <li>
                                    <span class="txt">Baby Stuff</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Buggies & Strollers</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Car Seats</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Carriers & Child Seats</span>
                                    <span class="count">4</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_2.svg') }}" alt="">
                            </div>
                            <h4>Cars</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">BMW</span>
                                    <span class="count">0</span>
                                </li>
                                <li>
                                    <span class="txt">Citroen</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Honda</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Kia</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Lexus</span>
                                    <span class="count">4</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_3.svg') }}" alt="">
                            </div>
                            <h4>Classes</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Art/Music/Dance Classes</span>
                                    <span class="count">0</span>
                                </li>
                                <li>
                                    <span class="txt">Computer Classes</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Continuing Education</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Language Classes</span>
                                    <span class="count">2</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_4.svg') }}" alt="">
                            </div>
                            <h4>Community</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Activity Partners</span>
                                    <span class="count">0</span>
                                </li>
                                <li>
                                    <span class="txt">Artists</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Babysitter</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Carpool</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Free Stuff</span>
                                    <span class="count">5</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_5.svg') }}" alt="">
                            </div>
                            <h4>Events</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Classic & Cultural</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Concerts</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Other Events</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Sports</span>
                                    <span class="count">4</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_6.svg') }}" alt="">
                            </div>
                            <h4>Fashion & Beauty</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Accessories & Jewelry</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Glasses & Contacts</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Hair Accessories</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Hair Dryers</span>
                                    <span class="count">4</span>
                                </li>
                                <li>
                                    <span class="txt">Health & Beauty Products</span>
                                    <span class="count">5</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_7.svg') }}" alt="">
                            </div>
                            <h4>Exposure</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Arts & Antiques</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Arts & Crafts</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Collectibles</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Food & Beverages</span>
                                    <span class="count">4</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_8.svg') }}" alt="">
                            </div>
                            <h4>Housing</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Bathroom</span>
                                    <span class="count">0</span>
                                </li>
                                <li>
                                    <span class="txt">Bedroom</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">DIY</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Garden</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Heating & Cooling</span>
                                    <span class="count">5</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_9.svg') }}" alt="">
                            </div>
                            <h4>Jobs</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Administrative/Support</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Art/Culture</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Bankers/Brokers</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Construction/Labor</span>
                                    <span class="count">4</span>
                                </li>
                                <li>
                                    <span class="txt">Creative Jobs</span>
                                    <span class="count">6</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_10.svg') }}" alt="">
                            </div>
                            <h4>Multimedia & Electronics</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Accessories & Jewelry</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Glasses & Contacts</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Hair Accessories</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Hair Dryers</span>
                                    <span class="count">4</span>
                                </li>
                                <li>
                                    <span class="txt">Health & Beauty Products</span>
                                    <span class="count">5</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_11.svg') }}" alt="">
                            </div>
                            <h4>Music, Movies & Books</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Arts & Antiques</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Arts & Crafts</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Collectibles</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Food & Beverages</span>
                                    <span class="count">4</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_12.svg') }}" alt="">
                            </div>
                            <h4>People</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Bathroom</span>
                                    <span class="count">0</span>
                                </li>
                                <li>
                                    <span class="txt">Bedroom</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">DIY</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Garden</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Heating & Cooling</span>
                                    <span class="count">5</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_13.svg') }}" alt="">
                            </div>
                            <h4>Pets</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Birds</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Cats/Kittens</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Dogs/Puppies</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Fish</span>
                                    <span class="count">4</span>
                                </li>
                                <li>
                                    <span class="txt">Horses</span>
                                    <span class="count">6</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_14.svg') }}" alt="">
                            </div>
                            <h4>Real Estate</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Accessories & Jewelry</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Glasses & Contacts</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Hair Accessories</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Hair Dryers</span>
                                    <span class="count">4</span>
                                </li>
                                <li>
                                    <span class="txt">Health & Beauty Products</span>
                                    <span class="count">3</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="info_box">
                        <div class="hd_thumb">
                            <div class="thumb">
                                <img src="{{ asset('frontend_assets/images/info_15.svg') }}" alt="">
                            </div>
                            <h4>Services</h4>
                        </div>
                        <div class="info_list">
                            <ul>
                                <li>
                                    <span class="txt">Automotive Services</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Career/HR Services</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Cleaning Services</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Computer/Tech Help</span>
                                    <span class="count">4</span>
                                </li>
                                <li>
                                    <span class="txt">Financial Services</span>
                                    <span class="count">5</span>
                                </li>
                                <li>
                                    <span class="txt">Automotive Services</span>
                                    <span class="count">1</span>
                                </li>
                                <li>
                                    <span class="txt">Career/HR Services</span>
                                    <span class="count">2</span>
                                </li>
                                <li>
                                    <span class="txt">Cleaning Services</span>
                                    <span class="count">3</span>
                                </li>
                                <li>
                                    <span class="txt">Computer/Tech Help</span>
                                    <span class="count">4</span>
                                </li>
                                <li>
                                    <span class="txt">Financial Services</span>
                                    <span class="count">5</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="secPromote" style="background-image: url({{ asset('frontend_assets/images/promote_bg.jpg') }});">
        <div class="container">
            <div class="top_head">
                <h2>Promote What You Love Best.</h2>
            </div>
        </div>
    </section>
@endsection

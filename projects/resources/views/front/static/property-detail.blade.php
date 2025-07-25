@extends("front.layouts.master")
@section("title",$data->meta_title)
@section("keywords",$data->meta_keywords)
@section("description",$data->meta_description)
@section("logo",$data->image)
@section("header-section")
    {!! $data->header_section !!}
@stop
@section("footer-section")
    {!! $data->footer_section !!}
@stop
@section("container")


    @php
        $name=$data->name;
        $bannerImage=asset('front/images/breadcrumb.webp');
        if($data->bannerImage){
            $bannerImage=asset($data->bannerImage);
        }
    @endphp
    @include("front.layouts.banner")
    
<section class="property-detail">
    <section class="main">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-8">
                    <div class="row header-name">
                        <div class="col-10">
                            <h4>35%off July - Fiji Villa - Walk to EVERYTHING!</h4>
                            <h6><i class="bi bi-geo-alt-fill"></i> Atlanta, Georgia, United States</h6>
                            <ul class="ammenity-home">
                                <li>
                                    <i class="fa fa-users"></i> Sleeps 6
                                </li>
                                <li>
                                    <i class="fa fa-bed"></i> 2 bedrooms
                                </li>
                                <li>
                                    <i class="fa fa-bath"></i> 2 bathrooms
                                </li>
                            </ul>
                        </div>
                        <div class="col-2 prop-price">
                            <h5>$165</h5>
                        </div>
                    </div>
                    <section class="gallery1">
                        <div class="row gallery">
                            <div class="col-3 sidebar" >
                                <div class="img-active"><a href="https://webdesignvr.in/under-construction/robert/front/images/l1.png" data-fancybox="gallery"> <img src="https://webdesignvr.in/under-construction/robert/front/images/l1.png" class="img-fluid" alt=""></a></div>
                                <div class="img-active"><a href="https://webdesignvr.in/under-construction/robert/front/images/l2.png" data-fancybox="gallery"><img src="https://webdesignvr.in/under-construction/robert/front/images/l2.png" class="img-fluid" alt=""></a></div>
                                <div class="img-active"><a href="https://webdesignvr.in/under-construction/robert/front/images/l3.png" data-fancybox="gallery"><img src="https://webdesignvr.in/under-construction/robert/front/images/l3.png" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <div class="col-9 big-img">
                                <div class="img-main"><a href="https://webdesignvr.in/under-construction/robert/front/images/18.jpg" data-fancybox="gallery"><img src="https://webdesignvr.in/under-construction/robert/front/images/18.jpg" class="img-fluid" alt=""></a></div>
                            </div>
                            <div class="hidden-gallery">
                                <div class="img-active"><a href="https://webdesignvr.in/under-construction/robert/front/images/l1.png" data-fancybox="gallery"> <img src="https://webdesignvr.in/under-construction/robert/front/images/l1.png" class="img-fluid" alt=""></a></div>
                                <div class="img-active"><a href="https://webdesignvr.in/under-construction/robert/front/images/l2.png" data-fancybox="gallery"><img src="https://webdesignvr.in/under-construction/robert/front/images/l2.png" class="img-fluid" alt=""></a></div>
                                <div class="img-active"><a href="https://webdesignvr.in/under-construction/robert/front/images/l3.png" data-fancybox="gallery"><img src="https://webdesignvr.in/under-construction/robert/front/images/l3.png" class="img-fluid" alt=""></a></div>
                            </div>
                    </section>
                    <section class="description">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Description</h2>
                                </div>
                                <div class="col-9">
                                    <p>
                                    Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque.Vivamus eget nibh. Etiam cursus leo vel metus.
                                    Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae, dapibus ac.
                                    </p>
                                    <a href="#" class="read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="ammenities">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Amenities</h2>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <h6>Essential</h6>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Beds</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Bathrooms</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Showers</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Beds</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i>Bathrooms</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Showers</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Cable TV</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Internet</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Air conditioning</div>
                                    </div>
                                    <div class="row">
                                        <h6>Room Feature </h6>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Cable TV</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Internet</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Air conditioning</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Beds</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Bathrooms</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Showers</div>
                                    </div>
                                    <div class="row">
                                        <h6>Ocean View </h6>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Cable TV</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Internet</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Air conditioning</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Beds</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Bathrooms</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Showers</div>
                                    </div>
                                    <div class="row">
                                        <h6>Outdoor </h6>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Cable TV</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Internet</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Air conditioning</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Beds</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Bathrooms</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Showers</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Beds</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Bathrooms</div>
                                        <div class="col-4"><i class="fa-solid fa-check"></i> Showers</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="policies">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Policies</h2>
                                </div>
                                <div class="col-9">
                                    <div class="policy-ctg">
                                        <h6>Cancellation Policies</h6>
                                        <p>
                                        Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae, dapibus ac.
                                        </p>
                                    </div>
                                    <div class="policy-ctg">
                                        <h6>Booking Policies</h6>
                                        <p>
                                        Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque.Vivamus eget nibh. Etiam cursus leo vel metus.
                                        Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae, dapibus ac.
                                        </p>
                                    </div>
                                    <div class="policy-ctg">
                                        <h6>Damage And Incidentals</h6>
                                        <p>
                                        Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque.Vivamus eget nibh. Etiam cursus leo vel metus.
                                        Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae, dapibus ac.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="reviews">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <h2>Reviews</h2>
                                </div>
                                <div class="col-9">
                                    <div class="user">
                                        <div class="row">
                                            <div class="review-img">
                                                <img src="https://www.transparentpng.com/thumb/user/gray-user-profile-icon-png-fP8Q1P.png">
                                            </div>
                                            <div class="col-review">
                                                <h6>Camala Haddon</h6>
                                                <p>July 4, 2021</p>
                                                <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user">
                                        <div class="row">
                                            <div class="review-img">
                                                <img src="https://www.transparentpng.com/thumb/user/gray-user-profile-icon-png-fP8Q1P.png">
                                            </div>
                                            <div class="col-review">
                                                <h6>Kathy</h6>
                                                <p>NOVEMBER 4, 2018</p>
                                                <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user">
                                        <div class="row">
                                            <div class="review-img">
                                                <img src="https://www.transparentpng.com/thumb/user/gray-user-profile-icon-png-fP8Q1P.png">
                                            </div>
                                            <div class="col-review">
                                                <h6>Marriane</h6>
                                                <p>DECEMBER 12, 2018</p>
                                                <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>          
                    <section class="contact-form">
                        <h2>Leave a Review</h2>
                        <div class="main-form">
                            <div class ="row">
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Name *</label>
                                    <input type="text" class="form-control"  placeholder="Email">
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Email *</label>
                                    <input type="email" class="form-control"  placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Caption *</label>
                                    <input type="Text" class="form-control"  placeholder="Caption">
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Stay Date *</label>
                                    <input type="date" class="form-control"  placeholder="Email">
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Rating *</label>
                                    <fieldset class="score">
                                        <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>  <i class="fa-solid fa-star"></i>  <i class="fa-solid fa-star"></i>
                                    </fieldset>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="exampleFormControlTextarea1" class="form-label">Review *</label>
                                        <textarea class="form-control textarea" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        <div class="col-12 submit">
                                            <button type="submit" class="submit-btn" name="reviewsubmit"><span class="txt">Submit Review</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4" id="book">
                    <div class="get-quote">
                        <div class="forms-booking-tab">
                            <ul class="tabs">
                                <li class="item booking active" data-form="ovabrw_booking_form">Request A Quote</li>
                            </ul>
                            <div class="ovabrw_booking_form" id="ovabrw_booking_form" style="">
                                <form class="form booking_form" id="booking_form" action="https://webdesignvr.in/live/elton/get-quote" method="get">
                                    <input type="hidden" name="property_id" value="9">
                                    <div class="ovabrw_datetime_wrapper">
                                        <input required="" autocomplete="off" inputmode="none" id="txtFrom" placeholder="Check in" name="start_date" type="text" class="hasDatepicker">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="ovabrw_datetime_wrapper">
                                        <input required="" autocomplete="off" inputmode="none" id="txtTo" placeholder="Check Out" name="end_date" type="text" class="hasDatepicker">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="row" style="display: none; ">
                                        <!--<div class="col-md-12" style="text-align: left;padding-top: 15px;color: #02c3ff;">-->
                                        <!--<label>No. of Pet</label>-->
                                        <!--</div>-->
                                        <div class="col-md-12 pets" style="">
                                            <select class="form-control" style="border: 1px solid #cacaca;margin-top: 0px;" id="pet_fee_data_guarav" name="no_of_pets">
                                                <option selected="selected" value="">Pets</option>
                                                <option value="1">1</option>
                                                <option value="0">0</option>
                                            </select>
                                            <i class="fa-solid fa-paw"></i>
                                        </div>
                                    </div>
                                    <div class="ovabrw_service_select rental_item">
                                        <input type="text" name="Guests" required="" value="1 Guests" readonly="" class="form-control gst" id="show-target-data" placeholder="Guests">
                                        <input type="hidden" value="1" name="adults" id="adults-data">
                                        <input type="hidden" value="0" name="child" id="child-data">
                                        <div class="adult-popup">
                                            <div class="modal-bodyss" id="guestsss">
                                                <p class="close1" onclick=""><i class="fa fa-times"></i></p>
                                                <div class="ac-box">
                                                    <div class="adult">
                                                        <span id="adults-data-show">
                                                        1 Adult
                                                        </span>
                                                        <p>(18+)</p>
                                                    </div>
                                                    <div class="btnssss">
                                                        <div class="button button1 btnnn" onclick="functiondec('#adults-data','#show-target-data','#child-data')" value="Increment Value">-</div>
                                                        <div class="button11 button1" onclick="functioninc('#adults-data','#show-target-data','#child-data')" value="Increment Value">+</div>
                                                    </div>
                                                </div>
                                                <div class="ac-box">
                                                    <div class="adult">
                                                        <span id="child-data-show">
                                                        Child
                                                        </span>
                                                        <p>(0-17)</p>
                                                    </div>
                                                    <div class="btnssss btnsss">
                                                        <div class="button button1" onclick="functiondec('#child-data','#show-target-data','#adults-data')" value="Increment Value">-</div>
                                                        <div class="button11 button1" onclick="functioninc('#child-data','#show-target-data','#adults-data')" value="Increment Value">+</div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn main-btn close1" data-dismiss="modal" onclick=""><span>Apply</span></button>
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-users users-icn"></i>
                                    </div>
                                    <div id="gaurav-new-data-area">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="ovabrw-book-now">
                                                <button type="button" class="main-btn" id="reset-button-gaurav-data">
                                                <span>Reset</span></button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="ovabrw-book-now" id="submit-button-gaurav-data1">
                                                <button type="submit" class="main-btn">
                                                <span> Reserve</span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Or<br>Contact Owner</p>
                                    <p><a href="mailto:home@floridaprimevacations.com"><i class="fa-solid fa-envelope"></i> home@floridaprimevacations.com</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
</section>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56739.175128176335!2d-82.59216400044798!3d27.275657706127078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c341e625af63c9%3A0x2fb47a66f2e7518!2sSiesta%20Key%2C%20FL%2034242%2C%20USA!5e0!3m2!1sen!2sin!4v1690317399118!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
    @stop

@section("css")
    @parent
    <link rel="stylesheet" href="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/property-detail.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/property-detail-responsive.css" />
@stop 
@section("js")
    @parent
    <script src="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.js" ></script>
    <script src="{{ asset('front')}}/js/properties-detail.js" ></script>
    
@stop 
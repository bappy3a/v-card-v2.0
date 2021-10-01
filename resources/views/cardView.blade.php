<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8" />
    <title>{{ $card->first_name }}  {{ $card->last_name }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    <link rel="manifest" href="site.webmanifest" />
    <link rel="apple-touch-icon" href="icon.png" />
    <link rel="shortcut icon" href="{{ asset('logo/favicon.ico') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- -----cdn------ -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">

    <!-- -----cdn------ -->

    <link rel="stylesheet" href="{{ asset('website/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/css/main.css') }}" />

    <meta name="theme-color" content="#fafafa" />

</head>

<body>

    <section>
        <div class="wrapper">
            <div class="profile-card">
                <div class="profile-header">
                    @if ($card->cover_photo)
                        <img src="{{ asset('logo/'.$card->cover_photo.'.png') }}" alt="heder">   
                    @else
                        <img src="{{ asset('assets/images/profile.jpeg') }}" alt="heder">
                    @endif
                    <div class="top-left">
                        <span class="cover_head">A LIVELONG CARD</span><br>
                        <span class="cover_mid">FOR A LIFELONG</span><br>
                        <span class="cover_last">RELATIONSHIP</span>
                    </div>
                </div>
                {{-- <div class="qr">
                    <a href="">{!! QrCode::size(34)->generate(route('card.username',$card->user_name)) !!}</a>
                </div> --}}
                <style type="text/css">
                    .author-image{
                        width: 115px;
                        height: 115px;
                        border-radius: 50%;
                        padding: 5px;
                        background-color: var(--white);
                        box-shadow: 0px 0px 18px #848181;
                        background-size: cover !important;
                        border: 5px #fff solid;
                    }
                </style>
                <?php 
<<<<<<< HEAD
                $default_image=asset('logo/profile.jpeg');
=======
                $default_image=asset('website/img/heder.png');
>>>>>>> f213cac3e25d2842ac3f774b137b711c184ed8b4
                ?>
                <div class="profile-body">
                    <div class="author-img">
                        <div class="author-image" style="background:#fff url('{{!empty($card->photo)?asset($card->photo):$default_image}}');"></div>

                        {{-- 
                        @if ($card->photo)
                            <img src="{{ asset($card->photo) }}" alt="heder">
                        @else
                            <img src="{{ asset('website/img/heder.png') }}" alt="heder">
                        @endif --}}

                    </div>
                    {{-- <div class="heder_description">
                        <span>A LIVELONG CARD</span>
                        <span>FOR A LIFELONG</span>
                        <span>RELATIONSHIP</span>
                    </div> --}}


                    <!-- Trigger/Open The Modal -->
                    

                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                      <!-- Modal content -->
                      <div class="modal-content">
                        <div class="modal-header">
                          <span class="close">&times;</span>
                         
                        </div>
                        <div class="modal-body">
                           <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate(route('card.username',$card->user_name))) !!} ">
                          <p class="user_name">{{ $card->first_name }}  {{ $card->last_name }}</p>
                          <p class="user_phone">{{ $card->link_3.$card->phone }}</p>
                        </div>
                        <div class="modal-footer">
                          
                        </div>
                      </div>

                    </div>



                    <div class="m_qr">
                        <a id="myBtn" href="javascript:void(0)"><img src="{{ asset('website/img/Group.png') }}" alt=""></a>
                    </div>
                    <div class="social_list">
                    <div class="name">{{ $card->first_name }}  {{ $card->last_name }} <span><i class="fas fa-check-circle"></i></span></div>
                    <div class="designation">
                        <p>{{ $card->designation }}</p>
                        <hr class="he_card">
                    </div>
                    <div class="company">{{ $card->conpany_name }}</div>
                    <div class="intro">
                        <p>{{ $card->link_3.$card->phone }}</p>
                    </div>
                    <div class="card_mail">
                        <p>{{ $card->email }}</p>
                    </div>
                    <div class="description">{{ $card->description }}</div>
                        <ul>
                            @if($card->link_1)
                            @php
                            $key1 = json_decode($card->link_1) ? json_decode($card->link_1)->key : Null;
                            $key2 = json_decode($card->link_4) ? json_decode($card->link_4)->key : Null;
                            $key3 = json_decode($card->link_5) ? json_decode($card->link_5)->key : Null;
                            $key4 = json_decode($card->link_6) ? json_decode($card->link_6)->key : Null;

                            $link1 = json_decode($card->link_1) ? json_decode($card->link_1)->link : Null;
                            $link2 = json_decode($card->link_4) ? json_decode($card->link_4)->link : Null;
                            $link3 = json_decode($card->link_5) ? json_decode($card->link_5)->link : Null;
                            $link4 = json_decode($card->link_6) ? json_decode($card->link_6)->link : Null;
                            @endphp
                            <li>
                                @if ($key1 == 'linkedin')
                                <i class="fab fa-linkedin-in custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link1 }}">linkedin</a></span>
                                @elseif($key1 == 'Vimeo')
                                <i class="fab fa-vimeo-v custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link1 }}">vimeo</a></span>
                                @elseif($key1 == 'facebook')
                                <i class="fab fa-facebook-f custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link1 }}">facebook</a></span>
                                @elseif($key1 == 'Twiter')
                                <i class="fab fa-twitter custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link1 }}">twitter</a></span>
                                @elseif($key1 == 'Instagram')
                                <i class="fab fa-instagram custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link1 }}">instagram</a></span>
                                @elseif($key1 == 'Behance')
                                <i class="fab fa-behance custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link1 }}">behance</a></span>
                                @elseif($key1 == 'Youtube')
                                <i class="fab fa-youtube custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link1 }}">Youtube</a></span>
                                @elseif($key1 == 'Skype')
                                <i class="fab fa-skype custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link1 }}">skype</a></span>
                                @elseif($key1 == 'WhatsApp')
                                <i class="fab fa-whatsapp custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link1 }}">whatsapp</a></span>
                                @endif
                            </li>
                            <br>
                            <li>
                                @if ($key2 == 'linkedin')
                                <i class="fab fa-linkedin-in custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link2 }}">linkedin</a></span>
                                @elseif($key2 == 'Vimeo')
                                <i class="fab fa-vimeo-v custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link2 }}">vimeo</a></span>
                                @elseif($key2 == 'facebook')
                                <i class="fab fa-facebook custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link2 }}">facebook</a></span>
                                @elseif($key2 == 'Twiter')
                                <i class="fab fa-twitter custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link2 }}">twitter</a></span>
                                @elseif($key2 == 'Instagram')
                                <i class="fab fa-instagram custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link2 }}">instagram</a></span>
                                @elseif($key2 == 'Behance')
                                <i class="fab fa-behance custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link2 }}">behance</a></span>
                                @elseif($key2 == 'Youtube')
                                <i class="fab fa-youtube custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link2 }}">Youtube</a></span>
                                @elseif($key2 == 'Skype')
                                <i class="fab fa-skype custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link2 }}">skype</a></span>
                                @elseif($key2 == 'WhatsApp')
                                <i class="fab fa-whatsapp custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link2 }}">whatsapp</a></span>
                                @endif
                            </li>
                            <br>
                            <li>
                                @if ($key3 == 'linkedin')
                                <i class="fab fa-linkedin-in custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link3 }}">linkedin</a></span>
                                @elseif($key3 == 'Vimeo')
                                <i class="fab fa-vimeo-v custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link3 }}">vimeo</a></span>
                                @elseif($key3 == 'facebook')
                                <i class="fab fa-facebook custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link3 }}">facebook</a></span>
                                @elseif($key3 == 'Twiter')
                                <i class="fab fa-twitter custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link3 }}">twitter</a></span>
                                @elseif($key3 == 'Instagram')
                                <i class="fab fa-instagram custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link3 }}">instagram</a></span>
                                @elseif($key3 == 'Behance')
                                <i class="fab fa-behance custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link3 }}">behance</a></span>
                                @elseif($key3 == 'Youtube')
                                <i class="fab fa-youtube custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link3 }}">Youtube</a></span>
                                @elseif($key3 == 'Skype')
                                <i class="fab fa-skype custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link3 }}">skype</a></span>
                                @elseif($key3 == 'WhatsApp')
                                <i class="fab fa-whatsapp custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link3 }}">whatsapp</a></span>
                                @endif
                            </li>
                            <br>
                            <li>
                                @if ($key4 == 'linkedin')
                                <i class="fab fa-linkedin-in custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link4 }}">linkedin</a></span>
                                @elseif($key4 == 'Vimeo')
                                <i class="fab fa-vimeo-v custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link4 }}">vimeo</a></span>
                                @elseif($key4 == 'facebook')
                                <i class="fab fa-facebook custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link4 }}">facebook</a></span>
                                @elseif($key4 == 'Twiter')
                                <i class="fab fa-twitter custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link4 }}">twitter</a></span>
                                @elseif($key4 == 'Instagram')
                                <i class="fab fa-instagram custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link4 }}">instagram</a></span>
                                @elseif($key4 == 'Behance')
                                <i class="fab fa-behance custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link4 }}">behance</a></span>
                                @elseif($key4 == 'Youtube')
                                <i class="fab fa-youtube custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link4 }}">Youtube</a></span>
                                @elseif($key4 == 'Skype')
                                <i class="fab fa-skype custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link4 }}">skype</a></span>
                                @elseif($key4 == 'WhatsApp')
                                <i class="fab fa-whatsapp custom_i"></i>
                                <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link4 }}">whatsapp</a></span>
                                @endif
                            </li>
                            <br>
                            @endif
                               

                            </ul>

                        </div>
                        {{-- <div class="social-icon footer">
                            <ul>
                                <li>
                                    <a href="tel:{{ $card->link_3.$card->phone }}">
                                        <i class="fas fa-phone-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:{{ $card->email }}">
                                        <i class="fas fa-envelope-open-text"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-share-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                <!-- <div class="profile-body">
                    <span></span>
                </div> -->
                <div class="footer">
                    <div class="social-icon" style="background-color: var(--white);">
                        <ul>
                                <li>
                                    <a href="tel:{{ $card->link_3.$card->phone }}">
                                        <i class="fas fa-phone-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:{{ $card->email }}">
                                        <i class="fas fa-envelope-open"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-share-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('download.qrcode',$card->id) }}">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </li>
                        </ul>
                    </div>
                    <div class="brand">
                     <span class="web_address">www.thelakhanigroup.com</span>
                     <span class="pby">Powered By <a href="https://thelakhanigroup.com/"><img src="{{ asset('website/img/logo.svg') }}" alt=""></a></span>
                    </div>
                </div>
            </div>
        </div>  
    </section>




    <!-- Add your site or application content here -->

    <script src="{{ asset('website/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('website/js/plugins.js') }}"></script>
    <script src="{{ asset('website/js/main.js') }}"></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function () {
            ga.q.push(arguments);
        };
        ga.q = [];
        ga.l = +new Date();
        ga("create", "UA-XXXXX-Y", "auto");
        ga("set", "anonymizeIp", true);
        ga("set", "transport", "beacon");
        ga("send", "pageview");
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>
</html>

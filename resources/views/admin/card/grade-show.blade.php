@extends('layouts.admin')

@section('title','Smart Card')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="m-t-0 header-title mb-4">Smart Card Info</h4>

                <div class="row">
                    <div class="col-12">
                        <div class="p-20">

                            @if (\Session::has('message'))
                                <div class="alert alert-success">
                                    {!! \Session::get('message') !!}
                                </div>
                            @endif

                            <form class="form-horizontal" role="form" method="POST" action="{{ route('card.update',$card->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('Put')
                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Your photo</label> <br>
                                            <img class="thumb-lg rounded-circle" src="{{ $card->photo ? asset($card->photo) : asset('assets/images/profile.jpeg') }}" style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc;" id="profileImageShow"/><br />
                                            <div class="mt-2">
                                                <input  type="file" name="photo" id="profileImage" class="@error('photo') is-invalid @enderror" />
                                                @error('photo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input value="{{ $card->first_name }}" type="text" parsley-trigger="change" class="form-control @error('first_name') is-invalid @enderror" placeholder="First name" name="first_name" required autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input value="{{ $card->last_name }}" type="text"  name="last_name" required parsley-trigger="change" class="form-control" placeholder="Last name">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input value="{{ $card->email }}" type="email" name="email" parsley-trigger="change" class="form-control" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <select class="form-control select2" name="country_code" required>
                                                        <option value="" selected> Select Country Code</option>
                                                        @foreach(json_decode(file_get_contents(asset('js/countrycodes.json')), true) as $code)
                                                            <option @if($card->link_3 == $code['dial_code']) selected @endif value="{{ $code['dial_code'] }}">{{ $code['flag'] }}  &nbsp; {{ $code['name'] }} &nbsp; ({{ $code['dial_code'] }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <input value="{{ $card->phone }}"  type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input value="{{ $card->designation }}" type="text" name="designation" parsley-trigger="change" class="form-control" placeholder="Designation">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input value="{{ $card->link_2 }}" type="text" name="link_2" parsley-trigger="change" class="form-control" placeholder="Address">
                                        </div>
                                    </div>

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

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Social Links</label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <select class="form-control" name="type1" required>
                                                        <option value="">select one</option>
                                                        <option @if($key1=='linkedin') selected @endif value="linkedin">linkedin</option>
                                                        <option @if($key1=='Vimeo') selected @endif value="Vimeo">Vimeo</option>
                                                        <option @if($key1=='facebook') selected @endif value="facebook">Favebook</option>
                                                        <option @if($key1=='Twiter') selected @endif value="Twiter">Twiter</option>
                                                        <option @if($key1=='Instagram') selected @endif value="Instagram">Instagram</option>
                                                        <option @if($key1=='Behance') selected @endif value="Behance">Behance</option>
                                                        <option @if($key1=='Youtube') selected @endif value="Youtube">Youtube</option>
                                                        <option @if($key1=='Skype') selected @endif value="Skype">Skype</option>
                                                        <option @if($key1=='WhatsApp') selected @endif value="WhatsApp">WhatsApp</option>
                                                    </select>
                                                </div>
                                                <div class="col-9">
                                                    <input value="{{ $link1 }}" type="text" class="form-control" placeholder="Website Address" name="link1" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Social Links</label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <select class="form-control" name="type2">
                                                        <option value="">select one</option>
                                                        <option @if($key2=='linkedin') selected @endif value="linkedin">linkedin</option>
                                                        <option @if($key2=='Vimeo') selected @endif value="Vimeo">Vimeo</option>
                                                        <option @if($key2=='facebook') selected @endif value="facebook">Favebook</option>
                                                        <option @if($key2=='Twiter') selected @endif value="Twiter">Twiter</option>
                                                        <option @if($key2=='Instagram') selected @endif value="Instagram">Instagram</option>
                                                        <option @if($key2=='Behance') selected @endif value="Behance">Behance</option>
                                                        <option @if($key2=='Youtube') selected @endif value="Youtube">Youtube</option>
                                                        <option @if($key2=='Skype') selected @endif value="Skype">Skype</option>
                                                        <option @if($key2=='WhatsApp') selected @endif value="WhatsApp">WhatsApp</option>
                                                    </select>
                                                </div>
                                                <div class="col-9">
                                                    <input value="{{ $link2 }}" type="text" class="form-control" placeholder="Website Address" name="link2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Social Links</label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <select class="form-control" name="type3" >
                                                        <option value="">select one</option>
                                                        <option @if($key3=='linkedin') selected @endif value="linkedin">linkedin</option>
                                                        <option @if($key3=='Vimeo') selected @endif value="Vimeo">Vimeo</option>
                                                        <option @if($key3=='facebook') selected @endif value="facebook">Favebook</option>
                                                        <option @if($key3=='Twiter') selected @endif value="Twiter">Twiter</option>
                                                        <option @if($key3=='Instagram') selected @endif value="Instagram">Instagram</option>
                                                        <option @if($key3=='Behance') selected @endif value="Behance">Behance</option>
                                                        <option @if($key3=='Youtube') selected @endif value="Youtube">Youtube</option>
                                                        <option @if($key3=='Skype') selected @endif value="Skype">Skype</option>
                                                        <option @if($key3=='WhatsApp') selected @endif value="WhatsApp">WhatsApp</option>
                                                    </select>
                                                </div>
                                                <div class="col-9">
                                                    <input value="{{ $link3 }}" type="text" class="form-control" placeholder="Website Address" name="link3" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Social Links</label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <select class="form-control" name="type4" >
                                                        <option value="">select one</option>
                                                        <option @if($key4=='linkedin') selected @endif value="linkedin">linkedin</option>
                                                        <option @if($key4=='Vimeo') selected @endif value="Vimeo">Vimeo</option>
                                                        <option @if($key4=='facebook') selected @endif value="facebook">Favebook</option>
                                                        <option @if($key4=='Twiter') selected @endif value="Twiter">Twiter</option>
                                                        <option @if($key4=='Instagram') selected @endif value="Instagram">Instagram</option>
                                                        <option @if($key4=='Behance') selected @endif value="Behance">Behance</option>
                                                        <option @if($key4=='Youtube') selected @endif value="Youtube">Youtube</option>
                                                        <option @if($key4=='Skype') selected @endif value="Skype">Skype</option>
                                                        <option @if($key4=='WhatsApp') selected @endif value="WhatsApp">WhatsApp</option>
                                                    </select>
                                                </div>
                                                <div class="col-9">
                                                    <input value="{{ $link4 }}" type="text" class="form-control" placeholder="Website Address" name="link4" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

<div class="col-12">
    <div class="form-group">
        <label>Select Background Image</label>
        <div class="row">
            <div class="col-md-3">
                <div class="custom-control custom-radio image-checkbox">
                    <input value="1" type="radio" class="custom-control-input" id="ck2a" name="cover_photo">
                    <label class="custom-control-label" for="ck2a">
                        <img src="{{ asset('website/img/heder.png') }}" alt="#" class="img-fluid">
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="custom-control custom-radio image-checkbox">
                    <input value="2" type="radio" class="custom-control-input" id="ck2b" name="cover_photo">
                    <label class="custom-control-label" for="ck2b">
                        <img src="{{ asset('website/img/heder.png') }}" alt="#" class="img-fluid">
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="custom-control custom-radio image-checkbox">
                    <input value="2" type="radio" class="custom-control-input" id="ck2c" name="cover_photo">
                    <label class="custom-control-label" for="ck2c">
                        <img src="{{ asset('website/img/heder.png') }}" alt="#" class="img-fluid">
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="custom-control custom-radio image-checkbox">
                    <input value="2" type="radio" class="custom-control-input" id="ck2d" name="cover_photo">
                    <label class="custom-control-label" for="ck2d">
                        <img src="{{ asset('website/img/heder.png') }}" alt="#" class="img-fluid">
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>



                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success float-right">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> 
        </div><!-- end card -->
    </div><!-- end col -->

@endsection

@section('js')
    <script type="text/javascript">
        function appendNewLink(){
            var l= $('.socialLink').length;
            if (l > 4 ) {
                alert('Opps !! you can add 4 links');
            }else{
                $('#linkList').append($('.more').html());
            }
            
        }
        $('body').delegate('#remove','click', function(){
            var l= $('.socialLink').length;
            if (l == 1) {
                alert('you can not remove Last Row');
            }else{
                $(this).parent().parent().remove();
            }
        });
        $(document).ready(function() {
            $('.select2').select2();
        });

        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#profileImageShow').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
          }
        }

        $("#profileImage").change(function() {
          readURL(this);
        });

        function readURLCover(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#coverprofileImageShow').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
          }
        }

        $("#coverprofileImage").change(function() {
          readURLCover(this);
        });

    </script>
@endsection

@section('css')
<style type="text/css">

    .custom-control.image-checkbox {
      position: relative;
      padding-left: 0;
    }

    .custom-control.image-checkbox .custom-control-input:checked ~ .custom-control-label:after, .custom-control.image-checkbox .custom-control-input:checked ~ .custom-control-label:before {
      opacity: 1;
    }

    .custom-control.image-checkbox label {
      cursor: pointer;
    }

    .custom-control.image-checkbox label:before {
      border-color: #007bff;
      background-color: #007bff;
    }

    .custom-control.image-checkbox label:after, .custom-control.image-checkbox label:before {
      transition: opacity .3s ease;
      opacity: 0;
      left: .25rem;
      padding: 16px;
    }

    .custom-control.image-checkbox label:focus, .custom-control.image-checkbox label:hover {
      opacity: .8;
    }

    .custom-control.image-checkbox label img {
      border-radius: 2.5px;
    }

    .form-group-image-checkbox.is-invalid label {
      color: #dc3545;
    }

    .form-group-image-checkbox.is-invalid .invalid-feedback {
      display: block;
    }

</style>
@endsection
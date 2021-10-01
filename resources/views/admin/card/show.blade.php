@extends('layouts.admin')

@section('title','Smart Card')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="m-t-0 header-title mb-4">Smart Card Info </h4>
                    </div>
                    <div class="col-md-6">
                        <button id="copyLinkButton" onclick="setClipboard('{{ route('card.username',auth()->user()->card->user_name) }}')" type="btn" class="btn btn-primary float-right" style="margin-top:-10px;margin-left: 10px;">Copy Link</button>
                        <a class="btn btn-success float-right" style="margin-top:-10px" href="{{ route('download.qrcode',$card->id) }}">Download QrCode</a>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-md-12">
                        <div class="p-20">

                            @if (\Session::has('message'))
                                <div class="alert alert-success">
                                    {!! \Session::get('message') !!}
                                </div>
                            @endif
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('card.update',$card->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('Put')


                                <div class="form-group row mb-4">
                                    <label class="col-md-2 col-form-label">Your photo</label>
                                    <div class="col-md-10">
                                        <img class="thumb-lg rounded-circle" src="{{ $card->photo ? asset($card->photo) : asset('logo/profile.jpeg') }}" style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc;" id="profileImageShow"/><br />
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

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label"></label>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input value="{{ $card->first_name }}" type="text" parsley-trigger="change" class="form-control @error('first_name') is-invalid @enderror" placeholder="First name" name="first_name" required autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input value="{{ $card->last_name }}" type="text"  name="last_name" required parsley-trigger="change" class="form-control" required placeholder="Last name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input value="{{ $card->email }}"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" required  autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Designation</label>
                                    <div class="col-md-10">
                                        <input value="{{ $card->designation }}" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation"  autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Company Name</label>
                                    <div class="col-md-10">
                                        <input value="{{ $card->conpany_name }}" type="text" class="form-control @error('conpany_name') is-invalid @enderror" name="conpany_name"  autocomplete="off" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Description</label>
                                    <div class="col-md-10">
                                        <input value="{{ $card->description }}" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="off" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Address</label>
                                    <div class="col-md-10">
                                        <input value="{{ $card->link_2 }}" type="text" class="form-control @error('link_2') is-invalid @enderror" name="link_2" autocomplete="off">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Phone Number</label>
                                    <div class="col-md-3">
                                        <select class="form-control select2" name="country_code" required>
                                            <option value="" selected> Select Country Code</option>
                                            @foreach(json_decode(file_get_contents(asset('js/countrycodes.json')), true) as $code)
                                                <option @if($card->link_3 == $code['dial_code']) selected @endif value="{{ $code['dial_code'] }}">{{ $code['flag'] }}  &nbsp; {{ $code['name'] }} &nbsp; ({{ $code['dial_code'] }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-7">
                                        <input required value="{{ $card->phone }}"  type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" autocomplete="off">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Social Links</label>
                                    <div class="col-md-10">
                                       
                                        <div class="row mt-2">
                                            <div class="col-3">
                                                <select class="form-control type_link" name="type1">
                                                    <option value="">select one</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-9">
                                                <input value="" type="text" class="form-control" placeholder="Website Address" name="link1" >
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-3">
                                                <select class="form-control" name="type2">
                                                    <option value="">select one</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-9">
                                                <input value="" type="text" class="form-control" placeholder="Website Address" name="link2">
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-3">
                                                <select class="form-control" name="type3">
                                                    <option value="">select one</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-9">
                                                <input value="" type="text" class="form-control" placeholder="Website Address" name="link3" >
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-3">
                                                <select class="form-control" name="type4">
                                                    <option value="">select one</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-9">
                                                <input value="" type="text" class="form-control" placeholder="Website Address" name="link4" >
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Background Image</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            @for ($cover = 1; $cover <= 12 ; $cover++)
                                                <div class="col-md-2">
                                                    <div class="custom-control custom-radio image-checkbox">
                                                        <input @if($card->cover_photo == $cover or null ) checked @endif value="{{ $cover }}" type="radio" class="custom-control-input" id="ck2a{{ $cover }}" name="cover_photo">
                                                        <label class="custom-control-label" for="ck2a{{ $cover }}">
                                                            <img src="{{ asset('logo/'.$cover.'.png') }}" alt="#" class="img-fluid">
                                                        </label>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-2 "></div>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-success">Update</button>
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
        var socialLink=<?=json_encode($socialLink)?>;
        var pre_opt_one={"key":"","link":""};
        var pre_opt_two={"key":"","link":""};
        var pre_opt_three={"key":"","link":""};
        var pre_opt_four={"key":"","link":""};

        @isset ($card)

            @if(!empty($card->link_1))
                pre_opt_one = <?=$card->link_1?>;
            @endif

            @if(!empty($card->link_4))
                pre_opt_two = <?=$card->link_4?>;
            @endif

            @if(!empty($card->link_5))
                pre_opt_three = <?=$card->link_5?>;
            @endif

            @if(!empty($card->link_6))
                pre_opt_four = <?=$card->link_6?>;
            @endif

        @endisset

        function loadSocialUrl(optionName, fid){
            //alert(optionName);
            $.each(socialLink,function(key,row){
                if(optionName==row.name)
                {
                    $("input[name='"+fid+"']").val(row.link);
                }
            });
        }

        $(document).ready(function(){
            $('body').on('change',"select[name='type1']",function(){
                var optionName=$(this).val();
                loadSocialUrl(optionName,"link1");
                
            });

            $('body').on('change',"select[name='type2']",function(){
                var optionName=$(this).val();
                loadSocialUrl(optionName,"link2");
            });

            $('body').on('change',"select[name='type3']",function(){
                var optionName=$(this).val();
                loadSocialUrl(optionName,"link3");
            });

            $('body').on('change',"select[name='type4']",function(){
                var optionName=$(this).val();
                loadSocialUrl(optionName,"link4");
            });
        });

        
        var htmlOpt_one='<option value="">Social Link</option>';
        var htmlOpt_two='<option value="">Social Link</option>';
        var htmlOpt_three='<option value="">Social Link</option>';
        var htmlOpt_four='<option value="">Social Link</option>';
        $.each(socialLink,function(key,row){
            htmlOpt_one+='<option ';
            if(pre_opt_one.key==row.name)
            {
                htmlOpt_one+=' selected="selected" ';
            }
            htmlOpt_one+='value="'+row.name+'">'+row.name+'</option>';


            htmlOpt_two+='<option ';
            if(pre_opt_two.key==row.name)
            {
                htmlOpt_two+=' selected="selected" ';
            }
            htmlOpt_two+=' value="'+row.name+'">'+row.name+'</option>';

            htmlOpt_three+='<option ';
            if(pre_opt_three.key==row.name)
            {
                htmlOpt_three+=' selected="selected" ';
            }
            htmlOpt_three+=' value="'+row.name+'">'+row.name+'</option>';

            htmlOpt_four+='<option ';
            if(pre_opt_four.key==row.name)
            {
                htmlOpt_four+=' selected="selected" ';
            }
            htmlOpt_four+=' value="'+row.name+'">'+row.name+'</option>';
        });

        $("select[name=type1]").html(htmlOpt_one);
        $("select[name=type2]").html(htmlOpt_two);
        $("select[name=type3]").html(htmlOpt_three);
        $("select[name=type4]").html(htmlOpt_four);

        $("input[name=link1]").val(pre_opt_one.link);
        $("input[name=link2]").val(pre_opt_two.link);
        $("input[name=link3]").val(pre_opt_three.link);
        $("input[name=link4]").val(pre_opt_four.link);

    </script>
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
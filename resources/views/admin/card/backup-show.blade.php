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
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">First name</label>
                                    <div class="col-10">
                                        <input value="{{ $card->first_name }}" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Last name</label>
                                    <div class="col-10">
                                        <input value="{{ $card->last_name }}"  type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Email</label>
                                    <div class="col-10">
                                        <input value="{{ $card->email }}"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Designation</label>
                                    <div class="col-10">
                                        <input value="{{ $card->designation }}" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Address</label>
                                    <div class="col-10">
                                        <input value="{{ $card->link_2 }}" type="text" class="form-control @error('link_2') is-invalid @enderror" name="link_2" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Phone Number</label>
                                    <div class="col-md-3">
                                        <select class="form-control select2" name="country_code" required>
                                            <option value="" selected> Select Country Code</option>
                                            @foreach(json_decode(file_get_contents(asset('js/countrycodes.json')), true) as $code)
                                                <option @if($card->link_3 == $code['dial_code']) selected @endif value="{{ $code['dial_code'] }}">{{ $code['flag'] }}  &nbsp; {{ $code['name'] }} &nbsp; ({{ $code['dial_code'] }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-7">
                                        <input value="{{ $card->phone }}"  type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Your photo</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Cover Photo</label>
                                    <div class="col-10">
                                        <input type="file" class="form-control @error('cover_photo') is-invalid @enderror" name="cover_photo" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Social Links</label>
                                    <div class="col-10" id="linkList">
                                        @if ($card->link_1)
                                            @foreach (json_decode($card->link_1) as $key=>$link)
                                                <div class="row socialLink">
                                                    <div class="col-9">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <select class="form-control" name="type[]" required>
                                                                    <option value="linkedin">linkedin</option>
                                                                    <option @if($key=='Vimeo') selected @endif value="Vimeo">Vimeo</option>
                                                                    <option @if($key=='facebook') selected @endif value="facebook">Favebook</option>
                                                                    <option @if($key=='Twiter') selected @endif value="Twiter">Twiter</option>
                                                                    <option @if($key=='Instagram') selected @endif value="Instagram">Instagram</option>
                                                                    <option @if($key=='Behance') selected @endif value="Behance">Behance</option>
                                                                    <option @if($key=='Youtube') selected @endif value="Youtube">Youtube</option>
                                                                    <option @if($key=='Skype') selected @endif value="Skype">Skype</option>
                                                                    <option @if($key=='WhatsApp') selected @endif value="WhatsApp">WhatsApp</option>
                                                                </select>
                                                            </div>
                                                            <input value="{{ $link }}" type="text" class="form-control" placeholder="Website Address" name="link[]" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <button onclick="appendNewLink()" type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                                                        <button id="remove" type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row socialLink">
                                                <div class="col-9">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <select class="form-control" name="type[]" required>
                                                                <option value="">select one</option>
                                                                <option value="linkedin">linkedin</option>
                                                                <option value="Vimeo">Vimeo</option>
                                                                <option value="facebook">Favebook</option>
                                                                <option value="Twiter">Twiter</option>
                                                                <option value="Instagram">Instagram</option>
                                                                <option value="Behance">Behance</option>
                                                                <option value="Youtube">Youtube</option>
                                                                <option value="Skype">Skype</option>
                                                                <option value="Whats App">Whats App</option>
                                                            </select>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Website Address" name="link[]" required>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <button onclick="appendNewLink()" type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                                                    <button id="remove" type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-2 "></div>
                                    <div class="col-10">
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

<div class="more" style="display: none;">
    <div class="row socialLink">
        <div class="col-9">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <select class="form-control" name="type[]" required>
                        <option value="">select one</option>
                        <option value="linkedin">linkedin</option>
                        <option value="Vimeo">Vimeo</option>
                        <option value="facebook">Favebook</option>
                        <option value="Twiter">Twiter</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Behance">Behance</option>
                        <option value="Youtube">Youtube</option>
                        <option value="Skype">Skype</option>
                        <option value="Whats App">Whats App</option>
                    </select>
                </div>
                <input type="text" class="form-control" placeholder="Website Address" name="link[]" required>
            </div>
        </div>
        <div class="col-3">
            <button onclick="appendNewLink()" type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button>
            <button id="remove" type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
        </div>
    </div>
</div>

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
    </script>
@endsection
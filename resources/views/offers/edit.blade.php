@extends('layouts.app')
@section('content')
    <div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
    @endif
    <form method="POST" action="{{route('offres.update',$offer->id)}}">
        @csrf

        <div class="form-group">
            <label for="name">{{__('messages.OfferName_en')}}</label>
            <input type="text" name="name_en" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$offer->name_en}}" placeholder="{{__('messages.OfferName_en')}}">
            @error('name_en')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">{{__('messages.OfferName_ar')}}</label>
            <input type="text" name="name_ar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$offer->name_ar}}" placeholder="{{__('messages.OfferName_ar')}}">
            @error('name_ar')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="details">{{__('messages.Details_en')}}</label>
            <input type="text" name="details_en" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$offer->details_en}}" placeholder="{{__('messages.Details_en')}}">
            @error('details_en')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror()
        </div>
        <div class="form-group">
            <label for="details">{{__('messages.Details_ar')}}</label>
            <input type="text" name="details_ar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$offer->details_ar}}" placeholder="{{__('messages.Details_ar')}}">
            @error('details_ar')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror()
        </div>
        <button type="submit" class="btn btn-primary">{{__('messages.update')}}</button>

        </div>
    </form>



@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
    @endif
    <form method="POST" action="{{route('offres.store')}}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
            @error('name')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="details">details</label>
            <input type="text" name="details" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="details">
            @error('details')
            <small class="form-text text-muted">{{$message}}</small>
            @enderror()
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

        </div>
    </form>



@endsection

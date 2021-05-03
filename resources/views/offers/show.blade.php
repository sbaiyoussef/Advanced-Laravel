@extends('layouts.app')
@section('content')
    <table class="table">
        <thead>
        <tr>

            <th scope="col">ID</th>
            <th scope="col">{{__('messages.offer name')}}</th>
            <th scope="col">{{__('messages.Details')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
        <tr>

            <td>{{$offer->id}}</td>
            <td>{{$offer->name}}</td>
            <td>{{$offer->details}}</td>
            <td><a href="{{Route('offers.edit',$offer->id)}}" class="btn btn-success">{{__('messages.edit')}}</a></td>
        </tr>
        </tr>
        @endforeach
        </tbody>
    </table>







@endsection

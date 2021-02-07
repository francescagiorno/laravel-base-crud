@extends('layouts.main')
@section("name","Elenco Contatti")

@section('content')
    <div class ="container">
        <div class="row">
            <div class="col-10 offset-1 d-flex flex-wrap mt-5 justify-content-around ">
                @foreach ($booking_list as $book )
                <div class="card mb-5" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">{{ $book["guest_full_name"] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Stanza n° {{ $book["room"] }}</h6>
                <p class="card-text">{{ $book["more_details"] }}</p>
                <a href="{{ route("booking.show",$book["id"]) }}" class="card-link">Reservation Details</a>
                <a href="{{ route("booking.edit",$book["id"]) }}" class="card-link">Modifica</a>
                
                </div>
                </div>
                @endforeach
                
  

            
        </div>
    </div>

@endsection
@extends("layouts.main")

@section("name", "Dettagli Prenotazione")


@section("content")
<div class="container">
    <div class="row">
        <div class="col-6 offset-3 d-flex align-items-center justify-content-center ">
            <div class="card mt-5" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">{{ $detail["guest_full_name"] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Stanza n° {{ $detail["room"] }}</h6>
                <ul class="card-text">
                    <li>Da: {{ $detail["from_date"] }}</li>
                    <li>Fino: {{ $detail["to_date"] }}</li>
                    <li>Numero Carta: {{ $detail["guest_credit_card"] }}</li>
                    </ul>
                
                
                </div>
                </div>
        </div>
    </div>
</div>
@endsection
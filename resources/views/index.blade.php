@extends('frontend.layout.app')
@section('content')

<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('assets/img/card-img1.png') }}" class="card-img-top" alt="...">
                <div class="card-body card_footer">
                    <h5 class="card-title">Bread Fruit Cheese Sandwich</h5>
                    <p class="card-text dish-price">$80</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('assets/img/card-img2.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a short card.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('assets/img/card-img3.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content.</p>
                </div>
            </div>
        </div>

    </div>
</div>
  {{-- end secial section --}}
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
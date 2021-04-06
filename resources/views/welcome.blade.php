@extends('main')

  @section('styles')        

    <style type="text/css">
        body {
            background-color: #efd3d3
        }

        .wrapper {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .card {
            height: 420px;
            width: 320px;
            background-color: #C62828;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            text-align: center !important
        }

        .card::before {
            position: absolute;
            width: 100%;
            height: 100%;
            content: "";
            top: -50%;
            background-color: #EF5350;
            transform: skewY(345deg);
            transition: 2s ease-in
        }

        .card:hover::before {
            top: -70%;
            transform: skewY(390deg)
        }

        .card .image {
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .card .image img {
            max-width: 100%;
            transition: 2s ease-in
        }

        .card:hover .image img {
            width: 80%
        }

        .about-product {
            position: absolute;
            color: #fff;
            bottom: -50px !important;
            text-align: center;
            left: 20%;
            transition: 2s ease-in
        }

        .card:hover .about-product {
            bottom: 20px !important
        }

        .buy-now {
            color: #fff;
            background-color: #ef5350 !important;
            border-color: #ef5350 !important;
            width: 160px;
            margin-top: 20px
        }

        .buy-now:focus {
            box-shadow: none
        }

        .buy-now:hover {
            color: #fff;
            background-color: #e84040 !important;
            border-color: #e84040 !important
        }
    </style>

  @endsection
       
  @section('body-content') 
      <div class="row row-cols-3">
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(count($products) > 0)
            @foreach($products as $v)
                <div class="col">
                  <div class="wrapper">
                        <div class="card text-center">
                            <div class="image"> </div>
                            <div class="about-product text-center">
                                <h3>{{ $v->name }}</h3>
                                <h4>&#8377; {{ $v->price }}</h4> <a href="{{ route('paynow',$v->slug) }}" class="btn btn-success buy-now">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
             <div class="text-center">No Data Found</div>
        @endif
      </div>
  @endsection

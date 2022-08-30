@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('change leverage') }}</div>

                    <div class="card-body">
                        <br>
                        <div>
                            <form action="/change-lev" method="POST">
                                {{ csrf_field() }}
                                <input class="form-control" type="number" name="leverage" id="#leverage" placeholder="Enter the number">
                                <br>
                                <input class="btn btn-success" type="submit" value="change">
                            </form>
                             <br>
    
                             @foreach ($result as $item)
                             <span>{{ $item }}</span>
                                 
                             @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>

    <div class="row justify-content-center">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('buy coins') }}</div>

                    <div class="card-body">
                        <br>
                        <div>
                            <form action="/trade-buy" method="post">
                                {{ csrf_field() }}
                                <input class="form-control" type="number" name="price" id="#price" placeholder="enter the price limit">
                                <br>
                                <input class="form-control" type="text" name="ammount" id="#qty" placeholder="enter the quantitiy">
                                <br>
                                <input class="btn btn-success" type="submit" value="place order">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('sell coins') }}</div>

                    <div class="card-body">
                        <br>
                        <div>
                            <form action="/trade-sall" method="post">
                                {{ csrf_field() }}
                                <input class="form-control" type="number" name="price" id="#price" placeholder="enter the price limit">
                                <br>
                                <input class="form-control" type="text" name="ammount" id="#qty" placeholder="enter the quantitiy">
                                <br>
                                <input class="btn btn-success" type="submit" value="sell coins">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            @method('post')
            <a href="/close-orders">close all orders</a>
        </div>
    </div>
</div>
@endsection
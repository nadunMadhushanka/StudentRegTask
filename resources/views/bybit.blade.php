@extends('layouts.app')

@section('content')
<div class="container">

        <br>
        <br>

    <div class="row justify-content-center">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('buy coins') }}</div>

                    <div class="card-body">
                        <br>
                        <div>
                            <form action="/trade-buy-bybit" method="post">
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
                            <form action="/trade-sell-bybit" method="post">
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
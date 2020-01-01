@extends('layouts.master')
@section('title','Form')
@section('page-header')
<i class="fa fa-plus-circle"></i> Product
@stop
@section('css')
<style>

    .flex {
        display:flex;
        flex-direction: column;
        flex-wrap: wrap;

    }

    .flex-item-main {
        background:white;
        margin:10px 0 0 2%;
        flex-grow: 1;
        width: 90%;
    }
    .client-info {
        width: 39%;
        font-size: 1.2em;
        background:whitesmoke;
        padding: 5px;
        display: flex;
        flex-direction: column;
    }

    .product-info {
        width: 39%;
        background:whitesmoke;
    }

    .cost-info {
        padding: 5px;
        width: 20%;
        background: whitesmoke;
    }
    
    .order-info{
        height: 400px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .order-action{
    height: 100px;
    }
    .billing{
        height: 200px;
    }
    .shipping{
        height: 200px;
    }

</style>

@stop


@section('content')

<h1>New Order</h1>
<div class="container">
    <div class="flex" >
        <div class="order-info flex-item-main">
            <div class="client-info">
                <div class="billing">
                    <h3>Billing Info</h3>
                    <p>
                    Name: Hasan mahmud <br/>
                    Email: something@gamail.com <br/>
                    Phone: +8801717 56 56 56 <br/>
                    <Address>
                        Something asdnasdkasnd abdasbdkas <br/>
                        adsdasd
                    </Address>
                    </p>
                    
                </div>
                <div class="shipping">
                    <h3>Shipping Info</h3>
                    <p>
                    Name: Hasan mahmud <br/>
                    Email: something@gamail.com <br/>
                    Phone: +8801717 56 56 56 <br/>
                    <Address>
                        Something asdnasdkasnd abdasbdkas <br/>
                        adsdasd
                    </Address>
                    </p>
                </div>
            </div>
            
            <div class="product-info">
                        <h2>Product Info</h2>
            </div>

            <div class="cost-info">
                <dl style="margin-top:2em;">
                    <dd> <h6>Sub Total:</h6> <input class="form-control" disabled type="text" value="$ {{$orders->unit_price*$orders->qty}}"></dd>
                    <dd> <h6>Vat Total:</h6> <input class="form-control" disabled type="text" value="$ {{$orders->vat}}"></dd>
                    <dd><h6>
                        Discount Total:
                    </h6><input class="form-control" disabled type="text" value="$ {{$orders->discount}}"></dd>
                    <dd><h6>
                        Shipping Cost:
                    </h6><input class="form-control" disabled type="text" value="$ {{$orders->shipping_cost}}"></dd>
                    <dd><h6>
                        Total Payable:
                    </h6>
                    <input class="form-control" disabled type="text"
                     value="$ {{ ($orders->unit_price * $orders->qty) - $orders->discount + $orders->vat + $orders->shipping_cost }}">
                </dd>
                </dl>

            </div>
        </div>
        <div class="order-action flex-item-main">
                <h5>Actions</h5>
        </div>
    </div>
</div>

@stop
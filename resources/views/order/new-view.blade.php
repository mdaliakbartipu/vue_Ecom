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
        padding: 5px;
        display: flex;
        flex-direction: column;
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

    .info{
        font-size: 1.1em;
        height: 200px;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .note{
        height: 200px;
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

    .text{
        width: 60%;
    }

    .image{
        width: 40%;
    }
    .image img{
        height: 70%;
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
                    @php($billing = $newOrder->billingAddress)
                    Name: <?=$billing->first_name.' '.$billing->last_name?> <br/>
                    Email: <?=$billing->email?> <br/>
                    Phone: <?=$billing->phone?> <br/>
                    <Address>
                    <?=$billing->address?><br/>
                    <?=$billing->street?><br/>
                    <?=$billing->city?>,
                    <?=$billing->country?><br/>
                    </Address>
                    </p>
                    
                </div>
                <div class="shipping">
                    <h3>Shipping Info</h3>
                    <p>
                    @php($shipping = $newOrder->shippingAddress??$newOrder->billingAddress)
                    Name: <?=$shipping->first_name.' '.$shipping->last_name?> <br/>
                    Email: <?=$shipping->email?> <br/>
                    Phone: <?=$shipping->phone?> <br/>
                    <Address>
                    <?=$shipping->address?><br/>
                    <?=$shipping->street?><br/>
                    <?=$shipping->city?>,
                    <?=$shipping->country?><br/>
                    </Address>
                    </p>
                </div>
            </div>
            
            <div class="product-info">
                <div class="info">
                    <div class="text">
                        @php($variant = $newOrder->variant)
                        @php($product = $newOrder->variant->product??null)
                        @if($product)
                        <h2>Product Info</h2>
                        <p>
                        Name: <?=$product->name?> <br/>
                        Web ID: <?=$product->code?> <br/>
                        Color: <?=$variant->color->name?> <br/>
                        Size: <?=$variant->size->name?> <br/>
                        Quantity: <?=$newOrder->qty?> <br/>
                        Unit Price: <?=$product->price?> <br/>
                        </p>
                        @endif
                    </div>
                    <div class="image">
                        <img src="/front/assets/.uploads/products/thumbs/<?=$product->thumb1??null?>" alt="">
                    </div>
                </div>
                <div class="note">
                <h2>Client Additional note:</h2>
                <p>
                    not yet
                </p>
                </div>
            
            </div>

            <div class="cost-info">
                <dl style="margin-top:2em;">
                @php($order = $newOrder)
                    <dd> <h6>Sub Total:</h6> <input class="form-control" disabled type="text" value="$ {{$order->unit_price * $order->qty}}"></dd>
                    <dd> <h6>Vat Total:</h6> <input class="form-control" disabled type="text" value="$ {{$order->vat}}"></dd>
                    <dd><h6>
                        Discount Total({{$order->discount}}%):
                        <?php $discount = $order->unit_price * $order->qty * $order->discount/100 ?>
                    </h6><input class="form-control" disabled type="text" value="$ {{$discount}}"></dd>
                    <dd><h6>
                        Shipping Cost:
                    </h6><input class="form-control" disabled type="text" value="$ {{$order->shipping_cost}}"></dd>
                    <dd><h6>
                        Total Payable:
                    </h6>
                    <input class="form-control" disabled type="text"
                     value="$ {{ ($order->unit_price * $order->qty) - $discount + $order->vat + $order->shipping_cost }}">
                </dd>
                </dl>

            </div>
        </div>
        <div class="order-action flex-item-main" style="margin-top:2em">
                <div>
                <button class="btn btn-sm btn-success">Accept Order</button>
                <button class="btn btn-sm btn-warning">Cancel Order</button>
                <button class="btn btn-sm btn-info">Back</button>
                </div>
        </div>
    </div>
</div>

@stop
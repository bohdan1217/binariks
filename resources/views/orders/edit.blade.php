@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Change
            Order № {{$item->id}}
            <a class="btn btn-xs" href="">
                <form id="delform" method="post" action="{{route('orders.destroy', $item->id)}}"
                      style="float: none">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-xs delete">Delete</button>
                </form>
            </a>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{route('orders.update',$item->id)}}" method="post">
                                @method('PATCH')
                                @csrf
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Order number</td>
                                        <td>{{$order->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Order date</td>
                                        <td>{{$order->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of change</td>
                                        <td>{{$order->updated_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Number of items in the order</td>
                                        <td>{{count($order_products)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Sum</td>
                                        <td>{{$order->sum}}</td>
                                    </tr>
                                    <tr>
                                        <td>The name of the customer</td>
                                        <td>{{$order->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            <select name="status_id" id="status_id" class="form-control" required>
                                                @foreach ($status as $item)
                                                    <option
                                                        @if ($order->status == $item->id)
                                                            selected
                                                        @endif
                                                        value="{{$item->id}}"
                                                    >{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="submit" name="submit" class="btn btn-warning" value="Save">
                            </form>
                        </div>
                    </div>
                </div>
                <h3>Order detail</h3>
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Count</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $qty = 0 @endphp
                                @foreach($order_products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->qty, $qty+=$product->qty}}</td>
                                        <td>{{$product->price}}</td>
                                    </tr>
                                @endforeach
                                <tr class="active">
                                    <td colspan="2"><b>Total:</b></td>
                                    <td><b>{{$qty}}</b></td>
                                    <td><b>{{$order->sum}} {{$order->curreny}}</b></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

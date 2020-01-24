@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Buyer</th>
                                    <th>Sum</th>
                                    <th>Status</th>
                                    <th>Creation date</th>
                                    <th>Change date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($paginator as $order)
                                    @php $class = '' @endphp
                                    @if ($order->statusID == 2)
                                        @php $class = 'success' @endphp
                                    @endif
                                    <tr class="{{$class}}">
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->sum}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->updated_at}}</td>
                                        <td>
                                            <a href="{{route('orders.edit',$order->id)}}" title="change order"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="{{route('orders.destroy', $order->id)}}" title="delete"><i class="fa fa-fw fa-close text-danger delete"></i></a>&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center"><h2>No orders</h2></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>{{count($paginator)}} order(s) from {{$countOrders}} </p>
                            @if ($paginator->total() > $paginator->count())
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                {{$paginator->links()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

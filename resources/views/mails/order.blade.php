Hello <i>{{ $order->receiver }}</i>,
<div>
    <p><b>Order number:</b>&nbsp;{{ $order->number }}</p>
    <p><b>Old status:</b>&nbsp;{{ $order->status_old}}</p>
    <p><b>New status:</b>&nbsp;{{ $order->status_new }}</p>
</div>
Thank You,
<br/>
<i>{{ $order->sender }}</i>

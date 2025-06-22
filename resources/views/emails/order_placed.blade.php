@component('mail::message')
# Order Confirmation

Thank you for your order, {{ $order->customer_name }}.

@component('mail::table')
| Product | Quantity | Price | Size |
|---------|---------:|------:|------|
@foreach($order->items as $item)
| {{ $item->product->name }} | {{ $item->quantity }} | PKR {{ $item->price }} | {{ $item->size ?? '-' }} |
@endforeach
@endcomponent

**Total:** PKR {{ $order->total_price }}

@component('mail::button', ['url' => route('orders.confirmation', $order)])
View Order
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent

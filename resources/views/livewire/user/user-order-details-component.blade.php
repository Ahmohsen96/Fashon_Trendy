<div>
    <div class="container" style="padding 30 px 0;">
        <div class="row">
            @if(Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('order_message')}}</div>
                    @endif
            <div class="col-md-12">
                <div class="panel panel-defult">
                    <div class ="panel-heading">
                        <div class="row">
                         <div class="col-md-6">
                           <h4 style="padding-top:10px;">Order Details  </h4>
                         </div>

                         <div class="col-md-6">
                            <a href="{{route('user.orders')}}" class="btn btn-success float-end">my orders</a>
                            @if($order->status=='ordered')
                            <a href="#" wire:click.prevent="cancelOrder" style="margin-right:20px;" class="btn btn-warning float-end"> Cancel Order</a>
                            @endif
                         </div>
                        </div>
                   </div>
                   <div class="pannel-body">
                    <table class="table">
                        <tr>
                            <th> Order id</th>
                            <td>{{ $order->id}}</td>
                            <th> Order Date</th>
                            <td>{{ $order->created_at}}</td>
                            <th> Status</th>
                            <td>{{ $order->status}}</td>
                            @if($order->status=="delivered")
                            <th> Delivered Date</th>
                            <td>{{ $order->delivered_date}}</td>
                            @elseif($order->status=="canceled")
                            <th> Cancelation Date</th>
                            <td>{{ $order->canceled_date}}</td>
                            @endif
                        </tr>
                    </table>
                   </div>
                </div>
            </div>
        </div>
    <div class="row">
    <div class="col-md-12">

     <div class="col-lg-6 col-md-12">
         <div class="border p-md-4 p-30 border-radius cart-totals">
       <div class ="panel-heading">
         <div class="row">
          <div class="col-md-6">
            <h4>Order Item</h4>
          </div>

          <div class="col-md-6">
          </div>
         </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
         <table class="table shopping-summery text-center clean">

             <thead>
                 <tr class="main-heading">
                     <th scope="col">Image</th>
                     <th scope="col">Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Quantity</th>
                     <th scope="col">Subtotal</th>
                 </tr>
             </thead>
             <tbody>

                @foreach($order->orderItems as $item)
                 <tr>
                     <td class="image product-thumbnail"><img src="{{asset('assets/imgs/products')}}/{{$item->product->image}}" alt="#"></td>
                     <td class="product-des product-name">
                         <h5 class="product-name"><a href="product-details.html">{{$item->product->name}}</a></h5>
                         {{--  <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy magndapibus.  --}}
                         </p>
                     </td>
                     <td class="price" data-title="Price"><span>${{$item->price}} </span></td>
                     <td>{{$item->quantity}}</td>

                     <td class="text-right" data-title="Cart">
                         <span>$ {{$item->price * $item->quantity}} </span>
                     </td>
                 </tr>
               @endforeach
             </tbody>



                     <div class="table-responsive">
                         <table class="table">
                             <tbody>
                                 <tr>
                                     <td class="cart_total_label">Cart Subtotal</td>
                                     <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{ $order->subtotal }}</span></td>
                                 </tr>
                                 <tr>
                                     <td class="cart_total_label">Tax</td>
                                     <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{ $order->tax }}</span></td>
                                 </tr>

                                 <tr>
                                     <td class="cart_total_label">shipping</td>
                                     <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free shipping</td>
                                 </tr>
                                 <tr>
                                     <td class="cart_total_label">Total</td>
                                     <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">${{ $order->total}}</span></strong></td>
                                 </tr>
                             </tbody>
                         </table>

             </div>
         </table>

     </div>
     </div>
         </div>
         </div>
         </div>


    <div class="row">
    <div class="col-md-12">

    <div class="panel panel-default">
    <div class ="panel-heading">
        <h4 style="padding-top:10px;">Billing Item</h4>

    </div>
    <div class="panel-body">
     <table class="table">
         <tr>
             <th>First Name</th>
             <td>{{  $order->firstname  }}</td>
             <th>last Name</th>
             <td>{{  $order->lastname  }}</td>
         </tr>
         <tr>
             <th>Phone</th>
             <td>{{  $order->mobile  }}</td>
             <th>Email</th>
             <td>{{  $order->email  }}</td>
         </tr>
         <tr>
             <th>Line1</th>
             <td>{{  $order->line1  }}</td>
             <th>Line2</th>
             <td>{{  $order->line2  }}</td>
         </tr>
         <tr>
             <th>city</th>
             <td>{{  $order->city }}</td>
             <th>province</th>
             <td>{{  $order->province  }}</td>
         </tr>
         <tr>
             <th>Country</th>
             <td>{{  $order->country  }}</td>
             <th>Zipcode</th>
             <td>{{  $order->zipcode }}</td>
         </tr>
        </table>

     </div>
         </div>
         </div>
         </div>

 @if($order->is_shipping_different)
         <div class="row">
    <div class="col-md-12">

    <div class="panel panel-default">
    <div class ="panel-heading">
        <h4 style="padding-top:10px;">Shipping Item</h4>
    </div>
    <div class="panel-body">

     <table class="table">
         <tr>
             <th>First Name</th>
             <td>{{  $order->shipping->firstname  }}</td>
             <th>last Name</th>
             <td>{{  $order->shipping->lastname  }}</td>
         </tr>
         <tr>
             <th>Phone</th>
             <td>{{  $order->shipping->mobile  }}</td>
             <th>Email</th>
             <td>{{  $order->shipping->email  }}</td>
         </tr>
         <tr>
             <th>Line1</th>
             <td>{{  $order->shipping->line1  }}</td>
             <th>Line2</th>
             <td>{{  $order->shipping->line2  }}</td>
         </tr>
         <tr>
             <th>city</th>
             <td>{{  $order->shipping->city  }}</td>
             <th>province</th>
             <td>{{  $order->shipping->province  }}</td>
         </tr>
         <tr>
             <th>Country</th>
             <td>{{  $order->shipping->country  }}</td>
             <th>Zipcode</th>
             <td>{{  $order->shipping->zipcode }}</td>
         </tr>
        </table>


     </div>
         </div>
         </div>
         </div>
         @endif


         <div class="row">
    <div class="col-md-12">

    <div class="panel panel-default">
    <div class ="panel-heading">
        <h4 style="padding-top:10px;">Transaction </h4>
    </div>
    <div class="panel-body">

     <table class="table">
         <tr>

             <th>Transaction Mode</th>
             <td>{{  $order->transaction->mode  }}</td>
         </tr>
         <tr>
             <th>Status</th>
             <td>{{  $order->transaction->status  }}</td>
         </tr>
         <tr>
             <th>Transaction Date</th>
             <td>{{  $order->transaction->created_at }}</td>
         </tr>

        </table>
     </div>
         </div>
         </div>
         </div>

         </div>
         </div>





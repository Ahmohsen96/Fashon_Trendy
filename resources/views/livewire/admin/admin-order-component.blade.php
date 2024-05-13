<div>
    <style>
       nav svg{
        height:20px;
       }

       nav .hidden{
        display: block !important;
       }
    </style>
    <div class="container" style="padding:30px 0 ;">
      <div class="row">
         <div class="col-md-12">
             <div class="panel panel-default">
               <div class="panel panel-heading">
                           All Orders
                  </div>

                  <div class="panel-body">
                    @if(Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('order_message')}}</div>
                    @endif
                  <table class="table table-striped">
                  <thead>
                  <tr>
                            <th>OrderID</th>
                            <th>Sub Total</th>
                            <th>Discount</th>
                            <th>Tax</th>
                            <th>Total</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Zipcode</th>
                            <th>status</th>
                            <th>Order Date</th>
                            {{--  <th>Action</th>  --}}
                            <th colspan="2" class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $order)
                       <tr>
                            <td>{{$order->id}}</td>
                            <td>${{$order->subtotal}}</td>
                            <td>${{$order->discount}}</td>
                            <td>${{$order->tax}}</td>
                            <td>${{$order->total}}</td>
                            <td>{{$order->firstname}}</td>
                            <td>{{$order->lastname}}</td>
                            <td>{{$order->mobile}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->zipcode}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->created_at}}</td>
                            <td><a href="{{route ('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Details</td>
                                <td>
                                {{--  <div class="dropdown">  --}}
                                    {{--  <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">status
                                        <span class="caret"></span></button>  --}}
                                        {{--  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown button
                                          </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Delivered</a></li>
                                            <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Canceled</a></li>
                                        </ul>
                                </div>  --}}
                                <ul>
                                    <li>
                                        <a class="language-dropdown-active" href="#">Status</a>
                                        <ul class="language-dropdown">
                                            <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">delivered</a></li>
                                            <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">canceled</a></li>
                                            {{--  <li><a href="#"><img src="assets/imgs/theme/flag-ru.png" alt="">Pусский</a></li>  --}}
                                        </ul>
                                    </li>
                                </ul>
                     </td>
                  </tr>
                  @endforeach
                  </tbody>
                  </table>
                  {{$orders->links()}}
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>


</div>

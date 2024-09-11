<main>
    <div class="container">
        <div class="menu-info">
            <a href="{{ route('home') }}">Home</a><span class="color-custom2"> / </span><a href="{{ route('user.orders') }}">My Order's</a>
        </div>
    </div>
    <div class="container">
        <div class="display-section">
            <h2>My <b>order's</b></h2>
        </div>
        <div class="table-responsive order-table">
        <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th scope="col" class="nowrap">OrderID</th>
                <th scope="col" class="nowrap">Full Name</th>
                <th scope="col" class="nowrap">Mobile</th>
                <th scope="col" class="nowrap">Email</th>
                <th scope="col" class="nowrap">Total</th>
                <th scope="col" class="nowrap">Status</th>
                <th scope="col" class="nowrap">Order Date</th>
                <th scope="col" class="nowrap">Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td class="nowrap">{{$order->id}}</td>
                    <td class="nowrap">{{$order->fullname}}</td>
                    <td class="nowrap">{{$order->mobile}}</td>
                    <td class="nowrap">{{$order->email}}</td>
                    <td class="nowrap">$ {{$order->total}}</td>
                    @if ($order->status == 'delivered')
                    <td class="nowrap text-success"><b>{{$order->status}}</b></td>
                    @elseif($order->status == 'canceled')
                    <td class="nowrap text-danger"><b>{{$order->status}}</b></td>
                    @else
                    <td class="nowrap text-warning"><b>{{$order->status}}</b></td>
                        
                    @endif
                    <td class="nowrap">{{$order->created_at}}</td>
                    <td class="nowrap"><a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn btn-success">View Details</a>
                    </td>
                </tr>  
                @endforeach
              
              
            </tbody>
          </table>
          <span class="d-flex justify-content-end">{{$orders->links()}}</span>
        </div>
    </div>    
</main>

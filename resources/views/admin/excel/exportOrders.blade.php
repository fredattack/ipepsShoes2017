@php(      $newOrderList=\App\Order::with(array('user'))->get())
<table  class="table table-bordered table-hover text-center">
    <thead>
    <tr>
        <th>N°</th>
        <th>User Id</th>
        <th>Préparée</th>
        <th>Livrée</th>
        <th>Total</th>
        <th>Date</th>
        <th></th>
        <th></th>
    </tr>
    </thead>

    <tbody>
    @foreach($newOrderList as $newOrder)
        <tr>
            <td>{{$newOrder->id}}</td>
            <td>{{$newOrder->idUser}}</td>
            <td>
                @if($newOrder->orderReady== 0)
                    <p>non</p>
                @else
                    <p>oui</p>
                @endif
            </td>
            <td>
                @if($newOrder->delivered == 0)
                    <p>non</p>
                @else
                    <p>oui</p>
                @endif
            </td>
            <td>{{$newOrder->totalProducts}}</td>
            <td>
                {{$newOrder->created_at}}
            </td>
            <td>
                {!! Form::open(['method' => 'GET', 'route' => ['order.edit', $newOrder->id]]) !!}
                {!! Form::submit('Préparé', [ 'class' => 'btn btn-success  btnProductAdmin', 'onclick' => '']) !!}
                {!! Form::close() !!}
            </td>
            <td>
                {!! Form::open(['method' => 'GET', 'route' => ['order.show', $newOrder->id]]) !!}
                {!! Form::submit('Details', ['class' => 'btn btn-warning  btnProductAdmin', 'onclick' => ''])  !!}
                {!! Form::close() !!}
            </td>

        </tr>
    @endforeach

    </tbody>

</table>
</div>{{-- Box Body + table responsive--}}

@php(            $newShipmentList=\App\Order::with(array('user'))->get())
    <table id="example2" class="table table-bordered table-hover text-center">
        <thead>
        <tr>
            <th>N°</th>
            <th>User Id</th>
            <th>Livrée</th>
            <th>id Envoie</th>
            <th>Numéro Tracking</th>
            <th>Date de commande</th>
            <th>Date d'Envoie</th>
            <th></th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($newShipmentList as  $newShipment)
            <tr>
                <td>{{ $newShipment->id}}</td>
                <td>{{ $newShipment->idUser}}</td>

                <td>
                    @if( $newShipment->delivered == 0)
                        <p></p>
                    @else
                        {{$newShipment->shipment->id}}
                    @endif
                </td>
                <td>
                    @if( $newShipment->delivered == 0)
                        <p>non</p>
                    @else
                        <p>oui</p>
                    @endif
                </td>
                <td>
                    @if( $newShipment->delivered == 0)
                    <p></p>
                    @else
                        {{$newShipment->shipment->trackingNr}}
                    @endif
                </td>
                <td>
                    {{ $newShipment->created_at}}
                </td>
                <td> {{ $newShipment->updated_at}}</td>

            </tr>
        @endforeach

        </tbody>

    </table>

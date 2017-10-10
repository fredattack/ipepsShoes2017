{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('idUser', 'IdUser:') !!}
			{!! Form::text('idUser') !!}
		</li>
		<li>
			{!! Form::label('delivered', 'Delivered:') !!}
			{!! Form::text('delivered') !!}
		</li>
		<li>
			{!! Form::label('totalProducts', 'TotalProducts:') !!}
			{!! Form::text('totalProducts') !!}
		</li>
		<li>
			{!! Form::label('idShipment', 'IdShipment:') !!}
			{!! Form::text('idShipment') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
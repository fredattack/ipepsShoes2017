{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('idUser', 'IdUser:') !!}
			{!! Form::text('idUser') !!}
		</li>
		<li>
			{!! Form::label('type', 'Type:') !!}
			{!! Form::text('type') !!}
		</li>
		<li>
			{!! Form::label('street', 'Street:') !!}
			{!! Form::text('street') !!}
		</li>
		<li>
			{!! Form::label('number', 'Number:') !!}
			{!! Form::text('number') !!}
		</li>
		<li>
			{!! Form::label('postCode', 'PostCode:') !!}
			{!! Form::text('postCode') !!}
		</li>
		<li>
			{!! Form::label('city', 'City:') !!}
			{!! Form::text('city') !!}
		</li>
		<li>
			{!! Form::label('country', 'Country:') !!}
			{!! Form::text('country') !!}
		</li>
		<li>
			{!! Form::label('deliveryCost', 'DeliveryCost:') !!}
			{!! Form::text('deliveryCost') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
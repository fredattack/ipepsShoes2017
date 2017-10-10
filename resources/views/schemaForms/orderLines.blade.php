{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('IdShoe', 'IdShoe:') !!}
			{!! Form::text('IdShoe') !!}
		</li>
		<li>
			{!! Form::label('quantity', 'Quantity:') !!}
			{!! Form::text('quantity') !!}
		</li>
		<li>
			{!! Form::label('IdOrder', 'IdOrder:') !!}
			{!! Form::text('IdOrder') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
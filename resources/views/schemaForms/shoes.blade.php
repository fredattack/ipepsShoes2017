{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('reduction', 'Reduction:') !!}
			{!! Form::text('reduction') !!}
		</li>
		<li>
			{!! Form::label('IdModel', 'IdModel:') !!}
			{!! Form::text('IdModel') !!}
		</li>
		<li>
			{!! Form::label('idReduction', 'IdReduction:') !!}
			{!! Form::text('idReduction') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
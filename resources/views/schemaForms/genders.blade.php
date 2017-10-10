{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('maxSize', 'MaxSize:') !!}
			{!! Form::text('maxSize') !!}
		</li>
		<li>
			{!! Form::label('minSize', 'MinSize:') !!}
			{!! Form::text('minSize') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
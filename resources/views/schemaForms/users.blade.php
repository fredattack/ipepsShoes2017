{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('firstName', 'FirstName:') !!}
			{!! Form::text('firstName') !!}
		</li>
		<li>
			{!! Form::label('surname', 'Surname:') !!}
			{!! Form::text('surname') !!}
		</li>
		<li>
			{!! Form::label('login', 'Login:') !!}
			{!! Form::text('login') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('role', 'Role:') !!}
			{!! Form::text('role') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
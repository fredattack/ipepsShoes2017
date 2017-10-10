{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('color', 'Color:') !!}
			{!! Form::text('color') !!}
		</li>
		<li>
			{!! Form::label('idGender', 'IdGender:') !!}
			{!! Form::text('idGender') !!}
		</li>
		<li>
			{!! Form::label('idBrand', 'IdBrand:') !!}
			{!! Form::text('idBrand') !!}
		</li>
		<li>
			{!! Form::label('idReduction', 'IdReduction:') !!}
			{!! Form::text('idReduction') !!}
		</li>
		<li>
			{!! Form::label('idType', 'IdType:') !!}
			{!! Form::text('idType') !!}
		</li>
		<li>
			{!! Form::label('price', 'Price:') !!}
			{!! Form::text('price') !!}
		</li>
		<li>
			{!! Form::label('image', 'Image:') !!}
			{!! Form::text('image') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
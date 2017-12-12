@php($userList=\App\User::with(array('adress','order'))->orderBy('role','asc')->get())
<table id="myTable" class="table table-striped table-bordered table-responsive">
    <thead>
    <tr>
        <th>Id</th>
        <th style="min-width: 5em">Role</th>

        <th>Nom</th>
        <th>Prénom</th>
        <th>email</th>
        <th>date de création</th>
        <th>date de modification</th>
    </tr>
    </thead>
    <tbody>

    @foreach($userList as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>
                @if($user->role=='admin')
                   <p>admin</p>
                @elseif($user->role=='client')
                    <p>client</p>
                @elseif($user->role=='seller')
                    <p>vendeur</p>
                @endif
                {!! Form::close() !!}
            </td>
            <td>{{$user->firstName}}</td>
            <td>{{$user->lastName}}</td>
            <td>{{$user->email}}</td>

            <td >
               {{$user->created_at}}
            </td>
            <td >
                {{$user->updated_at}}

            </td>


        </tr>
    @endforeach


    </tbody>



</table>
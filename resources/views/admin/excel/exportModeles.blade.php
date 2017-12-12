@php(      $modeleList= \App\Modele::with(array('type','brand','gender'))->orderBy('idGender')->get())
<table id="myTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Couleur</th>
        <th>Genre</th>
        <th>Type</th>
        <th>Marque</th>
        <th>Promo</th>
        <th>prix</th>
    </tr>
    </thead>

    <tbody>
    @foreach($modeleList as $modele)
        <tr>
            <td>{{$modele->name}}</td>
            <td>{{$modele->color}}</td>
            <td>{{$modele->gender->name}}</td>
            <td>{{$modele->type->name}}</td>
            <td>{{$modele->brand->name}}</td>
            <td>{{$modele->reduction->value}}%</td>
            <td>{{$modele->price}}</td>
        </tr>
    @endforeach

    </tbody>
    
</table>
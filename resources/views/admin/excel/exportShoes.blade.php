@php(      $shoesList= \App\Shoe::with('modele')->orderBy('idModele')->get())
<table id="myTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Modéle</th>
        <th>Couleur</th>
        <th>Taille</th>
        <th>Quantité</th>
        <th>Genre</th>
        <th>Type</th>
        <th>Marque</th>
        <th>Promo</th>
        <th>prix</th>
    </tr>
    </thead>

    <tbody>
    @foreach($shoesList as $shoe)
        <tr>
            <td>{{$shoe->modele->name}}</td>
            <td>{{$shoe->modele->color}}</td>
            <td>{{$shoe->size}}</td>
            <td>{{$shoe->quantity}}</td>
            <td>{{$shoe->modele->gender->name}}</td>
            <td>{{$shoe->modele->type->name}}</td>
            <td>{{$shoe->modele->brand->name}}</td>
            <td>{{$shoe->modele->reduction->value}}%</td>
            <td>{{$shoe->modele->price}}</td>
        </tr>
    @endforeach

    </tbody>

</table>
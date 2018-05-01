
<!-- Modal -->
<div id="createAdress" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter une adresse</h4>
      </div>
      <div class="modal-body">
          {{Form::open(array('route' => 'adress.store'))}}

          <input type="text" name="name" class="boxInput"  placeholder="Nom" autofocus>
          {!! $errors->first('name', '<small class="help-block ">:message</small>') !!}

          <input type="text" name="street" class="boxInput" placeholder="Rue" >
          {!! $errors->first('street', '<small class="help-block">:message</small>') !!}

          <input type="text" name="number" class="boxInput" placeholder="Numéro" >
          {!! $errors->first('number', '<small class="help-block">:message</small>') !!}

          <input type="text" name="postCode" class="boxInput" placeholder="Code Postal" >
          {!! $errors->first('postCode', '<small class="help-block">:message</small>') !!}

          <input type="text" name="city" class="boxInput" placeholder="Localité" >
          {!! $errors->first('city', '<small class="help-block">:message</small>') !!}

          <input type="text" name="country" class="boxInput" placeholder="Pays" >
          {!! $errors->first('country', '<small class="help-block">:message</small>') !!}



      </div>
      <div class="modal-footer">
          {!! Form::submit('Valider', ['class' => 'btn btn-default get pull-right','onclick'=>"javascript:window.location.reload()"]) !!}
          {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>
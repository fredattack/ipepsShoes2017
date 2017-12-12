
<!-- Modal -->
<div id="editAdress" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modifier une adresse</h4>
      </div>
      <div class="modal-body">
          {{ Form::open(['route' => ['adress.update',18],
                                'method'=> 'put',
                                'class' => 'form-horizontal panel',
                                'id'=>'modalForm']) }}

          <input type="text" id="name" name="name" class="boxInput"  placeholder="Nom" autofocus>
          {!! $errors->first('name', '<small class="help-block ">:message</small>') !!}

          <input type="text" id="street" name="street" class="boxInput" placeholder="Rue" >
          {!! $errors->first('street', '<small class="help-block">:message</small>') !!}

          <input type="text" id="number" name="number" class="boxInput" placeholder="Numéro" >
          {!! $errors->first('number', '<small class="help-block">:message</small>') !!}

          <input type="text" id="postCode" name="postCode" class="boxInput" placeholder="Code Postal" >
          {!! $errors->first('postCode', '<small class="help-block">:message</small>') !!}

          <input type="text" id="city" name="city" class="boxInput" placeholder="Localité" >
          {!! $errors->first('city', '<small class="help-block">:message</small>') !!}

          <input type="text" id="country" name="country" class="boxInput" placeholder="Pays" >
          {!! $errors->first('country', '<small class="help-block">:message</small>') !!}



      </div>
      <div class="modal-footer">
          {!! Form::submit('Valider', ['class' => 'btn btn-default get pull-right','onclick'=>"javascript:window.location.reload()"]) !!}
          {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>
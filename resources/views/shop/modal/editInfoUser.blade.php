
<!-- Modal -->
<div id="editInfoUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modifier vos informations personnelles</h4>
      </div>
      <div class="modal-body">
          {{ Form::open(['route' => ['user.update',18],
                                'method'=> 'post',
                                'class' => 'form-horizontal panel',
                                'id'=>'modalForm']) }}


          <input type="text" id="lastName" name="lastName" class="boxInput" placeholder="Nom" >
          {!! $errors->first('lastName', '<small class="help-block">:message</small>') !!}

          <input type="text" id="firstName" name="firstName" class="boxInput"  placeholder="Prénom" autofocus>
          {!! $errors->first('firstName', '<small class="help-block ">:message</small>') !!}

          <input type="text" id="email" name="email" class="boxInput" placeholder="Email" >
          {!! $errors->first('email', '<small class="help-block">:message</small>') !!}




      </div>
      <div class="modal-footer">
          {!! Form::submit('Valider', ['class' => 'btn btn-default get pull-right','onclick'=>"javascript:window.location.reload()"]) !!}
          {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>
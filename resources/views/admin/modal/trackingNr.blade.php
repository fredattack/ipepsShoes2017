
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 18-10-17
 * Time: 09:34
 */

<div id="TrackingNrModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ajouter un Numéro de Tracking</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'GET', 'route' => ['shipment.edit',18],'id'=>'modalForm']) !!}
                <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                    {!! Form::text('trackingNr', null, ['class' => 'form-control', 'placeholder' => 'Tracking Nr.']) !!}
                    {!! $errors->first('trackingNr', '<small class="help-block">:message</small>') !!}
                {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary pull-right ','id'=>'btnModal','onclick'=>"javascript:window.location.reload()"/*,'data-dismiss'=>'modal'*/]) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
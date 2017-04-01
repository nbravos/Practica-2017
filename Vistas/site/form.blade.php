@extends ('layout3')

@section ('content')
<script src="http://192.241.187.240/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script src="http://192.241.187.240/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.es.min.js"></script>
    <script type="text/javascript">
$(document).ready(function () {
       
  $( "#fecha_emision" ).datepicker({
        format: 'dd/mm/yyyy',
        language: 'es',
        autoclose: true

  });

  $( "#fecha_entrefa" ).datepicker({
        format: 'dd/mm/yyyy',
        language: 'es',
        autoclose: true

  });
 

});
</script>
  @if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{!! $error !!}</li>
      @endforeach
      </ul>
    </div>
  @endif
@if(isset($oc))
    {!! Form::model($oc, ['route' => ['oc.update', $oc->id], 'method' => 'patch']) !!}
	<h1>Editar Orden de Compra</h1>
@else
    {!! Form::open(array('route' => 'oc.store', 'method' => 'POST', 'files'=> true), array('role' => 'form')) !!}
	 <h1>Agregar Orden de Compra</h1>
@endif
  <div class="row">
 <div class="form-group">
           {!! Form::label('id_partida', 'Partida Asociada') !!}
           {!! Form::select('id_partida', $partida, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
           {!! Form::label('id_empresa', 'Empresa Asociada') !!}
           {!! Form::select('id_empresa', $empresa, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('cargo', 'Cargo') !!}
      {!! Form::text('cargo', null, array('placeholder' => 'Indica Cargo de la OC ', 'class' => 'form-control')) !!}
    </div>
    <div class="form-group">
      {!! Form::label('numero', 'Número') !!}
      {!! Form::text('numero', null, array('placeholder' => 'Ingresa número de la OC', 'class' => 'form-control')) !!}
    </div>
    <div class="form-group">
      {!! Form::label('uf', 'Valor en UF') !!}
      {!! Form::text('uf', null, array('placeholder' => 'Indica el valor en UF', 'class' => 'form-control')) !!}
    </div>
    <div class="form-group">
    <label class="control-label" for="fecha_emision">Fecha Emisión</label>
    <input class="form-control" id="fecha_emision" name="fecha_emision" placeholder="DD/MM/AA" type="text">
  </div>  
    <div class="form-group">
    <label class="control-label" for="fecha_entrefa">Fecha Entrega</label>
    <input class="form-control" id="fecha_entrefa" name="fecha_entrefa" placeholder="DD/MM/AA" type="text">
  </div>
      <div class="form-group">
      {!!Form::label('condicion_pago', 'Condición de Pago')!!}
      {!!Form::select('condicion_pago', array(
          'Plazo' => 'Plazo', 
          'Cheque' => 'Cheque', 
          'Contado' => 'Contado'), null, ['id' =>'condicion_pago', 'class' => 'form-control']) !!}
  </div>

  <div class="form-group">
      {!!Form::label('tipo_plazo', 'Tipo de Plazo')!!}
      {!!Form::select('tipo_plazo', array(
          '15' => '15', 
          '30' => '30', 
          '45' => '45'), null, ['id' =>'tipo_plazo', 'class' => 'form-control']) !!}
  </div>
  </div> 

  <script type="text/javascript">
    $(document).ready(function() {
      $('#SelectOption').change(function(){
        var opt = $(this).find("option:selected").attr('value');
        if(opt != 'Plazo'){
          $('#tipo_plazo').hide();
        }
        else{
          $('#tipo_plazo').show();
        }
      });
    });
    </script>

  {!! Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}    
  
{!! Form::close() !!}

@stop

@extends ('layout3')

@section ('title') {!! $oc->id_empresa !!}  @stop

@section ('content')


        <h1> <strong> {!! $oc->numero!!} </strong> </h1> 
<!-- </div>-->
<table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td> <strong>Número </strong></td>
                        <td>{!!$oc->numero!!}</td>
                      </tr>
                      <tr>
                        <td><strong>Empresa Asociada</strong> </td>
                        <td>{!!$oc->empresa!!}</td>
                      </tr>
                      <tr>
                        <td><strong>Cargo</strong></td>
                        <td>{!!$oc->empresa_cargo!!}</td>
                      </tr>
                        <tr>
                        <td><strong>Teléfono</strong></td>
                        <td>{!!$oc->telefono!!}</td>
                      </tr>
                        <tr>
                        <td><strong>Monto en UF</strong></td>
                        <td>{!!$oc->uf!!}</td>
                      </tr>
                      <tr>
                        <td><strong>Condición de Pago</strong></td>
                        <td>{!!$oc->condicion_pago!!}</td>
                      </tr>
                      <tr>
                        <td><strong>Fecha Emisión</strong></td>
                        <td>{!!$oc->fecha_emision!!}</td>   
                      </tr>
                       <tr>
                        <td><strong>Fecha Entrega</strong></td>
                        <td>{!!$oc->fecha_entrefa!!}</td>   
                      </tr>
                       
                    </tbody>
                  </table>
                  <p>
<a href="{!!route('oc.index')!!}" class="btn btn-primary">Volver</a>
<a href="{!!route('oc.edit', $oc->id)!!}" class="btn btn-primary">Editar</a>
{!! Form::model($oc, array('route' => array('oc.destroy', $oc->id), 'method' => 'DELETE'), array('role' => 'form')) !!}
  {!! Form::submit('Eliminar Orden de Compra', array('class' => 'btn btn-danger')) !!}

{!! Form::close() !!}
</p>
@stop


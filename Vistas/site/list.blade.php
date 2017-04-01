 
@extends ('layout3')

@section ('title') Listado de OC @stop

@section ('content')
 <h1>Lista de OC </h1>
<p>
  <a href="{!! route('oc.create') !!}" class="btn btn-primary">Agregar nueva </a>
  </p>
<table class="table table-striped">
    <tr>
        
        <th>Partida</th>
	     <th>Número</th>
    </tr>
    @foreach ($ocs as $oc)
    <tr>
        <td>{!! $oc->id_partida !!}</td>
        <td>{!! $oc->numero !!}</td>

      
	<td>
          <a href="{!! route('oc.show', $oc->id) !!}" class="btn btn-info">
              Ver
          </a>
          <a href="{!! route('oc.edit', $oc->id) !!}" class="btn btn-primary">
            Editar
          </a>
	</td>

    </tr> 
    @endforeach
  </table>

@stop

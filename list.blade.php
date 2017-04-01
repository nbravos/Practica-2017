 
@extends ('admin/users/layout')

@section ('title') Lista de Usuarios @stop

@section ('content')
 <h1>Lista de Usuarios </h1>
<p>
  <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Crear un nuevo usuario</a>
  </p>
<table class="table table-striped">
    <tr>
        <th>Nombre</th>
        <th>Dirección de Correo</th>
	<th>Acciones</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
	<td>
          <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
            Editar
          </a>
	</td>

    </tr> 
    @endforeach
  </table>
{{ $users->links() }}
@stop

<?php

class Admin_UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//protected $perPage = 2;

	public function index()
	{
	      
	      $users = User::paginate();  //Users::all() trae todos los usuarios, paginate() crea páginas con 15 registros cada una
	     // dd($users);
	      return View::make('users/list')->with('users', $users);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	      return View::make('users/form');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;

		//Se obtiene la data del usuario
		$data = Input::all();
		

		//Comprueba que sea válido
		if($user->validAndSafe($data))
		{
	            
		    return Redirect::route('users.index')->with('message', 'Usuario Guardado'); 

		}
		else
		{
			//Si no se valida redirige a create con los errores qeu se encontraron
			return Redirect::route('users.create')->withInput()->withErrors($user->errors);
		}		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		 if (is_null ($user))
                {
                        App::abort(404)->with('message', 'Usuario no encontrado');
                }
                return View::make('users/show', array('user' => $user));
		

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		/*if (is_null ($user))
		{
			App::abort(404);
		}*/

		return View::make('users/form')->with('user', $user);

	
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	// Creamos un nuevo objeto para nuestro nuevo usuario
        $user = User::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
     /*  if (is_null ($user))
        {
            App::abort(404);
        }*/
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
	Log::info('email - '.Input::get('email'));
        Log::info('name - '.Input::get('name'));

        
        // Revisamos si la data es válido
        if ($user->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $user->fill($data);
            // Guardamos el usuario
            $user->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('users.index');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('users.form')->withUser($user->$id)->withErrors($user->errors);
        }
}
                




	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
       		$user = User::find($id);
        
	        if (is_null ($user))
        	{
        	    App::abort(404);
        	}
        	$user->delete();

	        if (Request::ajax())
        	{
	                return Response::json(array (
			'success' => true,
			'msg'     => 'Usuario ' . $user->name . ' eliminado',
                        'id'      => $user->id
            	));
        	}
        	else
       		{
	            return Redirect::route('users.index');
        	}
	}


}

<?php
use \App\Models\Afp;

class TrabajadorController extends Controller {


	/**
	 * Display a listing of the resource.
	 * GET /trabajador
	 *
	 * @return Response
	 */
	public function index()
	{
		$trabajadores = Trabajador::paginate();  
        return View::make('site/workers/list')->with('trabajadores', $trabajadores);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /trabajador/create
	 *
	 * @return Response
	 */
	public function create()
	{
			$afp = Afp::pluck('nombre', 'id');
			$salud = Salud::pluck('nombre', 'id');

			return View::make('site/workers/form')
					->with('afp', $afp)
					->with('salud', $salud);

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /trabajador
	 *
	 * @return Response
	 */
	public function store()
	{
		$trabajador = new Trabajador;
		
		$data = Input::all();
        	

		if($trabajador->isValid($data))
		{
		    
 		    $trabajador->fill($data);
		    $trabajador->save();	           
		    return Redirect::route('workers'); 

		}
		else
		{
			return Redirect::route('workers.create')->withInput()->withErrors($trabajador->errors);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /trabajador/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$trabajador = Trabajador::find($id);
		 if (is_null ($worker))
                {
                        App::abort(404)->with('message', 'Trabajador no encontrado');
                }
                return View::make('site/workers/show', array('trabajador' => $trabajador));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /trabajador/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$trabajador = Trabajador::find($id);
		if (is_null ($trabajador))
		{
			App::abort(404);
		}

        return View::make('site/workers/form')->with('trabajador', $trabajador);
	
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /trabajador/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$trabajador = Trabajador::find($id);
        
     	if (is_null ($empresa))
        {
            App::abort(404);
        }
        
        $data = Input::all();


        
        if ($trabajador->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $trabajador->fill($data);
           
            $trabajador->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('workers.index');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('workers.edit')->withUser($trabajador->$id)->withErrors($trabajador->errors);
        }

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /trabajador/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$trabajador = Trabajador::find($id);
        
	        if (is_null ($trabajador))
        	{
        	    App::abort(404);
        	}
        	$trabajador->delete();

	        if (Request::ajax())
        	{
	                return Response::json(array (
			'success' => true,
			'msg'     => 'Trabajador ' . $trabajador->nombre . ' eliminado',
                        'id'      => $trabajador->id
            	));
        	}
        	else
       		{
	            return Redirect::route('trabajador.index');
        	}
	}

}

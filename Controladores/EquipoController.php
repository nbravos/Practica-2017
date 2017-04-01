<?php

class EquipoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /equipo
	 *
	 * @return Response
	 */
	public function index()
	{
		$equipo = Equipo::paginate();  
	    return View::make('site/equipment/list')->with('equipos', $equipos);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /equipo/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('site/enterprise/form');	
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /equipo
	 *
	 * @return Response
	 */
	public function store()
	{
		$equipo = new Equipo;

		//Se obtiene la data del usuario
		$data = Input::all();
		

		//Comprueba que sea válido
		if($equipo->isValid($data))
		{
	            
		    return Redirect::route('equipment'); 

		}
		else
		{
			//Si no se valida redirige a create con los errores qeu se encontraron
			return Redirect::route('equipment.create'); 
		}		
	}

	/**
	 * Display the specified resource.
	 * GET /equipo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 $equipo = Equipo::find($id);
		 if (is_null ($equipo))
          {
            App::abort(404)->with('message', 'Equipo no encontrada');
          }
            return View::make('site/equipment/show', array('equipo' => $equipo));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /equipo/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$equipo = Equipo::find($id);
		

        return View::make('site/equipment/form')->with('equipo', $equipo);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /equipo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$equipo = Equipo::find($id);
        
     	if (is_null ($equipo))
        {
            App::abort(404);
        }
        
        $data = Input::all();


        if ($equipo->isValid($data))
        {
            $equipo->fill($data);
           
            $equipo->save();
            return Redirect::route('equipment.index');
        }
        else
        {
            return Redirect::route('equipment.edit')->withUser($equipo->$id)->withErrors($equipo->errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /equipo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
			$equipo = Equipo::find($id);
        
	        if (is_null ($equipo))
        	{
        	    App::abort(404);
        	}
        	$equipo->delete();

	        if (Request::ajax())
        	{
	                return Response::json(array (
			'success' => true,
			'msg'     => 'Equipo ' . $equipo->nombre . ' eliminado',
                        'id'      => $equipo->id
            	));
        	}
        	else
       		{
	            return Redirect::route('equipment.index');
        	}
	}

}
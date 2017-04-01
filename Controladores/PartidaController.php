<?php

use App\Models\Proyecto; 

class PartidaController extends \Controller {

	/**
	 * Display a listing of the resource.
	 * GET /partida
	 *
	 * @return Response
	 */
	public function index()
	{
		$partida = Partida::paginate();  
	    return View::make('site/part/list')->with('partida', $partidas);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /partida/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$proyecto = Proyecto::pluck('nombre','id');
		return View::make('site/enterprise/form')->with('proyecto', '$proyecto');	
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /partida
	 *
	 * @return Response
	 */
	public function store()
	{
		$partida = new Partida;
		
		$data = Input::all();
        	

		if($partida->isValid($data))
		{
		    
 		    $partida->fill($data);
		    $partida->save();	           
		    return Redirect::route('part'); 

		}
		else
		{
			return Redirect::route('part.create')->withInput()->withErrors($partida->errors);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /partida/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$partida = Partida::find($id);
		 if (is_null ($partida))
                {
                        App::abort(404)->with('message', 'Partida no encontrada');
                }
                return View::make('site/part/show', array('partida' => $partida));
	
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /partida/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$partida = Partida::find($id);
		if (is_null ($partida))
		{
			App::abort(404);
		}

        return View::make('site/part/form')->with('partida', $partida);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /partida/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$partida = Partida::find($id);
        
     	if (is_null ($partida))
        {
            App::abort(404);
        }
        
        $data = Input::all();

        if ($partida->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $partida->fill($data);
           
            $partida->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('part.index');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('part.edit')->withUser($partida->$id)->withErrors($partida->errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /partida/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$partida = Partida::find($id);
        
	        if (is_null ($partida))
        	{
        	    App::abort(404);
        	}
        	$partida->delete();

	        if (Request::ajax())
        	{
	                return Response::json(array (
			'success' => true,
			'msg'     => 'Partida ' . $partida->nombre . ' eliminada',
                        'id'      => $partida->id
            	));
        	}
        	else
       		{
	            return Redirect::route('part.index');
        	}
	}

}
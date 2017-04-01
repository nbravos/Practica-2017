<?php

use \App\Models\Empresa;
use \App\Models\Partida;
use \App\Models\Documento;


class OrdenCompraController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ordencompra
	 *
	 * @return Response
	 */
	public function index()
	{
		$oc = Orden_compra::paginate();  
	    return View::make('site/oc/list')->with('ocs', $ocs);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ordencompra/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('site/oc/form');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ordencompra
	 *
	 * @return Response
	 */
	public function store()
	{
		$oc = new Orden_compra;

		//Se obtiene la data del usuario
		$data = Input::all();
		

		//Comprueba que sea válido
		if($oc->isValid($data))
		{
		    $oc->fill($data);
		    $oc->save();	            
		    return Redirect::route('oc'); 

		}
		else
		{
			//Si no se valida redirige a create con los errores qeu se encontraron
			return Redirect::route('oc.create'); 
		}		
	}

	/**
	 * Display the specified resource.
	 * GET /ordencompra/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 $oc = Orden_compra::find($id);
		 if (is_null ($oc))
          {
            App::abort(404)->with('message', 'Orden de Compra no encontrada');
          }
            return View::make('site/oc/show', array('oc' => $oc));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /ordencompra/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$oc= Orden_compra::find($id);
        return View::make('site/oc/form')->with('oc', $oc);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /ordencompra/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$oc = Orden_compra::find($id);
        
     	if (is_null ($oc))
        {
            App::abort(404);
        }
        
        $data = Input::all();


        if ($oc->isValid($data))
        {
            $oc->fill($data);
           
            $oc->save();
            return Redirect::route('oc.index');
        }
        else
        {
            return Redirect::route('oc.edit')->withUser($oc->$id)->withErrors($oc->errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /ordencompra/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$oc = Orden_compra::find($id);
        
	        if (is_null ($oc))
        	{
        	    App::abort(404);
        	}
        	$oc->delete();

	        if (Request::ajax())
        	{
	                return Response::json(array (
			'success' => true,
			'msg'     => 'Orden de Compra de' . $oc->partida . ' eliminado',
                        'id'      => $oc->id
            	));
        	}
        	else
       		{
	            return Redirect::route('oc.index');
        	}
	}

}

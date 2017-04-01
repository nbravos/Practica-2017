<?php

class EmpresaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /empresa
	 *
	 * @return Response
	 */
	public function index()
	{
		 $empresas = Empresa::paginate();  
	      return View::make('site/enterprise/list')->with('empresas', $empresas);

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /empresa/create
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('site/enterprise/form');/*, array('options' => $options));*/
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /empresa
	 *
	 * @return Response
	 */
	public function store()
	{
		$empresa = new Empresa;

		//Se obtiene la data del usuario
		$data = Input::all();
		

		//Comprueba que sea válido
		if($empresa->isValid($data))
		{
	            
		    return Redirect::route('enterprise'); 

		}
		else
		{
			//Si no se valida redirige a create con los errores qeu se encontraron
			return Redirect::route('enterprise.create'); //->withInput()->withErrors($empresa->errors); - Errores tienen que ser con ajax
		}		
	}

	/**
	 * Display the specified resource.
	 * GET /empresa/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$empresa = Empresa::find($id);
		 if (is_null ($empresa))
                {
                        App::abort(404)->with('message', 'Empresa no encontrada');
                }
                return View::make('site/enterprise/show', array('empresa' => $empresa));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /empresa/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$empresa = Empresa::find($id);
		/* $options = [
                'Mandante' => 'Mandante',
                'Proveedor' => 'Proveedor',
                'Contratista' => 'Contratista',
                 ];*/

		/*if (is_null ($user))
		{
			App::abort(404);
		}*/

		/*return View::make('site/enterprise/form', array('options' => $options))->with('empresa', $empresa);*/
                return View::make('site/enterprise/form')->with('empresa', $empresa);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /empresa/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		 $empresa = Empresa::find($id);
        
     	if (is_null ($empresa))
        {
            App::abort(404);
        }
        
        $data = Input::all();


        if ($empresa->isValid($data))
        {
            $empresa->fill($data);
           
            $empresa->save();
            return Redirect::route('enterprise.index');
        }
        else
        {
            return Redirect::route('enterprise.edit')->withUser($empresa->$id)->withErrors($empresa->errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /empresa/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$empresa = Empresa::find($id);
        
	        if (is_null ($empresa))
        	{
        	    App::abort(404);
        	}
        	$empresa->delete();

	        if (Request::ajax())
        	{
	                return Response::json(array (
			'success' => true,
			'msg'     => 'Empresa ' . $empresa->nombre . ' eliminado',
                        'id'      => $empresa->id
            	));
        	}
        	else
       		{
	            return Redirect::route('enterprise.index');
        	}
	}

}

<?php

class DocumentoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /documento
	 *
	 * @return Response
	 */
	public function index()
	{
		$documents = Document::paginate();  
        return View::make('site/documents/list')->with('documents', $documents);

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /documento/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('site/documents/form');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /documento
	 *
	 * @return Response
	 */
	public function store()
	{
		$documento = new Documento;

		$data = Input::all();
		
		if($user->validAndSafe($data))
		{
	            
		    return Redirect::route('site.documents.index'); 

		}
		else
		{
			return Redirect::route('site.documents.create')->withInput()->withErrors($user->errors);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /documento/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$documento = Documento::find($id);
		 if (is_null ($documento))
                {
                        App::abort(404)->with('message', 'Documento no encontrado');
                }
                return View::make('site/documents/show', array('documento' => $documento));
		
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /documento/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		$documento = Documento::find($id);
		if (is_null ($documento))
		{
			App::abort(404);
		}

		return View::make('site/documents/edit')->with('documento', $documento);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /documento/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /documento/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$documento = Documento::find($id);
        
	        if (is_null ($documento))
        	{
        	    App::abort(404);
        	}
        	$documento->delete();

	        if (Request::ajax())
        	{
	                return Response::json(array (
			'success' => true,
			'msg'     => 'Documento ' . $documento->nombre . ' eliminado',
                        'id'      => $documento->id
            	));
        	}
        	else
       		{
	            return Redirect::route('site.documents.index');
        	}
	}
	}

}

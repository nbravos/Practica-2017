<?php

class Equipo extends \Eloquent {

	protected $fillable = ['nombre', 'codigo', 'costo', 'descripcion'];

	protected $table = 'equipo';
	/*Para eliminar el error updated at*/
	public $timestamps = false;

	public function isValid($data)
    	{
	$rules = array(
		'nombre' => 'required|min:4|max:40',
		'codigo' => 'required|min:2|max:40',
		'costo'  => 'required|min:4|max:40',
		'descripcion' => 'required|min:5|max:100',
		);
	
	 $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
	}
}




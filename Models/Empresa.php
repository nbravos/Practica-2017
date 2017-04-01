<?php

namespace App\Models;
use \Validator;
class Empresa extends \Eloquent {
	protected $fillable = ['nombre', 'razon_social', 'giro', 'nombre_contacto', 'email', 'telefono', 'direccion', 'web', 'rut', 'tipo_empresa', 'tipo_proveedor'];

	protected $table = 'empresa';

	public $errors;


	public function isValid($data)
    	{
	$rules = array(
			
			'nombre' => 'required|min:4|max:40',
			'razon_social' => 'required|min:4|max:40',
			'giro' =>'required|min:4|max:40',
			'nombre_contacto' =>'required|min:4|max:40',
			'email' =>  'required|email|unique:empresa',
			'telefono' => 'required|min:8|max:11',
			'direccion' => 'required|min:5|max:40',
			'web' => 'required|min:5',
			'rut' => 'required|min:10',
			'tipo_empresa' => 'required',
			'tipo_proveedor' => 'sometimes|required',
			);

	if ($this->exists)
        {
               //Evitamos que la regla “unique” tome en cuenta el email del usuario actual
		$rules['email'] .= ',email,' . $this->id;
        }
	
	else 
        {
            
        }        

        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
	}

/* public function rutValidation($value='')
	{
	# code...
	}
	public function validAndSafe($data)
	{
		
	}*/

	public function ordencompra(){

		return $this->hasMany('App\Models\Ordencompra');

	}

	public function proyecto(){

		return $this->bhasMany('App\Models\Proyecto', 'id_empresa', 'id');

	}
}

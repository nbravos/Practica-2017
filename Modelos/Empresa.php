<?php

class Empresa extends \Eloquent {
	protected $fillable = ['nombre', 'razon_social', 'giro', 'nombre_contacto', 'email', 'telefono', 'direccion', 'tipo_empresa', 'tipo_proveedor', 'web', 'rut'];

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
			'web' => '',
			'rut' => '',
			'tipo_empresa' => '', //checkbox
			'tipo_proveedor' =>'required|min:5|max:40',
			);

        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            
            $this->fill($data);
            return true;

        }
        
        $this->errors = $validator->errors();
        
        return false;
	}

public public function rutValidation($value='')
{
	# code...
}
	public function validAndSafe($data)
	{
		
	}
}

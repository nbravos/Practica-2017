<?php

class Trabajador extends \Eloquent {
	protected $fillable = ['nombre', 'rut', 'email', 'telefono', 'direccion', 'id_afp', 'id_salud', 'fecha_nac', 'fecha', 'foto'];

	protected $table = 'trabajador';

	public $errors;


public function isValid($data)
    	{
	$rules = array(
			
			'nombre' => 'required|min:4|max:40',
			'rut' => '',
			'email' =>  'required|email|unique:empresa',
			'telefono' => 'required|min:8|max:11',
			'direccion' => 'required|min:5|max:40',
			'fecha_nac' => 'required|date|date_format:d/m/Y', 
			'fecha' =>'required|date|date_format:d/m/Y',
			'id_afp' =>'required',
                        'id_salud' =>'required',
                        'foto' => 'required|image|max:3000|mimes:jpeg,jpg,bmp,png',			
			);

        
        $validator = Validator::make($data, $rules);
       

        if ($validator->passes())
        {	
	     	    
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
	}
	public $timestamps = false;



}

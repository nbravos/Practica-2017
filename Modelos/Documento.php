<?php

class Documento extends \Eloquent {
	protected $fillable = ['id_orden', 'tipo', 'monto', 'fecha'];

	/**
         * The database table used by the model.
         *
         * @var string
         */
        protected $table = 'documento';

public function isValid($data)
    	{
	$rules = array(
			
			'id_orden' => 'required',
			'tipo' => 'required',
			'monto' =>'required|min:3|max:7',
			'fecha' =>'required|date|date_format:d-m-Y',
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

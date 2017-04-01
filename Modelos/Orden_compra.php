<?php

namespace App\Models;


class Orden_compra extends  \Eloquent {

	protected $fillable = ['id_partida','id_empresa','condicion_pago', 'fecha_emision', 'fecha_entrefa','uf'];

		protected $table = 'orden_compra';
		public $errors;
		public function isValid($data)
	    	{
			$rules = array(
			
			'id_partida' => 'required|numeric|min:1|max:6',
			'id_empresa' => 'required|numeric|min:1|max:6',
			'fecha_emision' =>'required|date|date_format:d-m-Y',
			'fecha_entrefa' =>'required|date|date_format:d-m-Y',
			'uf' =>'required|numeric|min:1|max:6',
			'condicion_pago' => 'required|min:4|max:40',
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


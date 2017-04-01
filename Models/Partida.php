<?php 

namespace App\Models;

class Partida extends \Eloquent {
	protected $fillable = ['id', 'nombre', 'id_proyecto', 'item', 'detalle', 'unidad', 'cantidad', 'unitario', 'total', 'inicio_teorico', 'inicio_real', 'fin_teorico', 'fin_real'];
	
	protected $table = 'partida'; 

	public $errors;

	public $timestamps = false;


	public function isValid($data)
                {
                        $rules = array(

                        'nombre' => 'required|min:1',                       
                        'id_proyecto' => 'required',
                        'item' =>'required|numeric|min:1',
                        'detalle' => 'required|min:1',
                        'unidad' =>'required|numeric|min:1',
                        'cantidad' =>'required|numeric|min:1',
                        'unitario' => 'required|numeric|min:1'
                        'total' => 'sometimes|numeric|min:1',
			            'inicio_teorico' => 'required|date_format:d-m-Y',
			            'inicio_real' => 'required|date_format:d-m-Y',
                        'fin_teorico' => 'required|date_format:d-m-Y',
                        'fin_real' => 'required|date_format:d-m-Y',
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


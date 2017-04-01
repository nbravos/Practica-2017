<?php  namespace App\Models;

use \Validator;

class Proyecto extends \Eloquent {
	protected $fillable = ['id', 'id_empresa', 'id_comuna', 'tipo_licitacion', 'nombre', 'financiamiento', 'monto_disponible', 'monto_minimo_oferta', 'monto', 'monto_ofertado', 'presupuesto_oficial', 'costos_directos', 'costos_generales', 'fecha_licitacion', 'estado'];
	protected $table = 'proyecto';
	public $errors;

	public $timestamps = false;

	public function isValid($data)
                {
                        $rules = array(

                        'id_comuna' => 'required|',                       
                        'id_empresa' => 'required|',
			            'tipo_licitacion' => 'sometimes', 
                        'nombre' =>'required|max:60',
                        'financiamiento' => 'required',
                        'monto_disponible' =>'sometimes|numeric',
                        'monto_minimo_oferta' =>'sometimes|numeric',
                        'monto_ofertado' => 'sometimes|numeric',
			            'presupuesto_oficial' => 'sometimes|numeric',
			            'costos_directos' => 'numeric',
                        'costos_generales' => 'numeric',
                        'fecha_licitacion' => 'required|date_format:d-m-Y',
			            'estado' => 'required', 
                        );


        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {

            return true;
        }

        $this->errors = $validator->errors();
	return false;
        }
	

	public function empresa(){

		return $this->belongsTo('App\Models\Empresa', 'id_empresa', 'id');
	}

	public function comuna(){

		return $this->belongsTo('App\Models\Comuna', 'id_comuna', 'id');	
	}


}

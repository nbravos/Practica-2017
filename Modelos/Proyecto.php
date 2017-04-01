<?php  namespace App\Models;

class Proyecto extends \Eloquent {
	protected $fillable = ['id', 'id_empresa', 'id_comuna', 'tipo_licitacion', 'nombre', 'financiamiento', 'monto_disponible', 'monto_minimo_oferta', 'monto', 'monto_ofertado', 'presupuesto_oficial', 'costos_directos', 'costos_generales', 'fecha_licitacion' ];
	protected $table = 'proyecto';
	public $errors;

	public $timestamps = false;

	public function isValid($data)
                {
                        $rules = array(

                        'id_comuna' => 'required|numeric|min:1|max:6',                       
                        'id_empresa' => 'required|numeric|min:1|max:6',
			            'tipo_licitacion' => 'required', 
                        'nombre' =>'required|numeric|min:1|max:6',
                        'financiamiento' => 'required',
                        'monto_disponible' =>'sometimes|required|numeric|max:10',
                        'monto_minimo_oferta' =>'sometimes|required|numeric|max:10',
                        'monto_ofertado' => 'sometimes|required|numeric|max:10',
			            'presupuesto_oficial' => 'sometimes|required|numeric|max:10',
			            'costos_directos' => 'sometimes|required|numeric|max:10',
                        'costos_generales' => 'sometimes|required|numeric|max:10',
                        'fecha_licitacion' => 'required|date',
                        );


        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            return true;
        }

     $this->errors = $validator->errors();
    
	return false;
        }


       

/*	public function empresa(){

		return $this->belongsTo('App\Models\Empresa');
	}

	public function comuna(){

		return $this->belongsTo('App\Models\Comuna');	
	}
*/

}

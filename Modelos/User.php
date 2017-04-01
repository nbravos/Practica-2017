<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuario';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function setPasswordAttribute($value)
    	{
        	if ( ! empty ($value))
        	{
            		$this->attributes['password'] = Hash::make($value);
        	}
    	}	

	 public $errors;
    
	 public function isValid($data)
    	{
	$rules = array(
            'email'     => 'required|email|unique:usuario',
            'name' => 'required|min:4|max:40',
            'password'  => 'min:6|confirmed',
            'roles' => 'required|min:1'
        );
        
        // Si el usuario existe:
        if ($this->exists)
        {
               //Evitamos que la regla “unique” tome en cuenta el email del usuario actual
		$rules['email'] .= ',email,' . $this->id;
        }
        else // Si no existe...
        {
            // La clave es obligatoria:
            $rules['password'] .= '|required';
        }
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
	}
	protected $fillable = array('email', 'name', 'password', 'roles');

	 public function validAndSafe($data)
	{
        // Revisamos si la data es válida
        	if ($this->isValid($data))
        	{
            		// Si la data es valida se la asignamos al usuario
		        $this->fill($data);
            		// Guardamos el usuario
		        $this->save();
            
		        return true;
        	}
        
	        return false;
    	}
	public $timestamps = false;
}

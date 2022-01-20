<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Commune;
use App\Models\Region;

class ComunneRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $id_com, $id_reg;
    public function __construct($id_com, $id_reg)
    {
        $this->id_com = $id_com;
        $this->id_reg = $id_reg;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $commune = Commune::find( $this->id_com );
        
        return $commune->id_reg == $this->id_reg ? true : false;
    } 

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'the commune and the region are not related.';
    }
}

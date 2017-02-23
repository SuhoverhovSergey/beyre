<?php

namespace Modules\Api\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'species' => 'required',
            'breed' => 'required',
            'gender' => 'required',
            'weight' => 'integer',
            'color' => 'required',
            'birthdate' => 'required',
            'neutered' => 'boolean',
            'microchipped' => 'boolean',
            'clinicname' => 'max:255',
            'specialnotes' => 'max:255',
            'description' => 'max:255',
        ];
    }

    /**
     * Validate the class instance.
     *
     * @return void
     */
    public function validate()
    {
        parent::validate();

        $this->afterValidation();
    }

    /**
     * This method is invoked after successful validation.
     *
     * @return void
     */
    public function afterValidation()
    {
        // prepare the data to fill the model
        $parameters = array_key_map($this->all(), [
            'birthdate' => 'birth_date', 'clinicname' => 'clinic_name', 'specialnotes' => 'special_notes',
        ]);

        $this->getInputSource()->replace($parameters);
    }
}

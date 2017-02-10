<?php

namespace Modules\Api\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRegisterRequest extends FormRequest
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
            'AccountDetails.firstname' => 'required|max:255',
            'AccountDetails.lastname' => 'required|max:255',
            'AccountDetails.email' => 'required|max:255|email|unique:users,email',
            'AccountDetails.password' => 'required|max:255',
            'AccountDetails.phone' => 'required|max:255',

            'PersonalInfo.address1' => 'required|max:255',
            'PersonalInfo.address2' => 'max:255',
            'PersonalInfo.state' => 'max:255',
            'PersonalInfo.city' => 'required|max:255',
            'PersonalInfo.zipcode' => 'required|max:255',

            'CreditCard.number' => 'required|max:255',
            'CreditCard.cardholder' => 'required|max:255',
            'CreditCard.expiration' => 'required|max:255',
            'CreditCard.csecuritycode' => 'required|max:255',

            'Pets.*.name' => 'required|max:255',
            'Pets.*.species' => 'required',
            'Pets.*.breed' => 'required',
            'Pets.*.gender' => 'required',
            'Pets.*.weight' => 'integer',
            'Pets.*.birthdate' => 'required',
            'Pets.*.neutered' => 'boolean',
            'Pets.*.microchipped' => 'boolean',
            'Pets.*.clinicname' => 'max:255',
            'Pets.*.specialnotes' => 'max:255',
            'Pets.*.description' => 'max:255',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $request = $this->request;

        $parameters = array_map(function ($parameter) {
            return is_string($parameter) ? json_decode($parameter, true) : $parameter;
        }, $request->all());

        $request->replace($parameters);
    }

    /**
     * Determine if the current request probably expects a JSON response.
     *
     * @return bool
     */
    public function expectsJson()
    {
        return true;
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
        $request = $this->request;
        $parameters = $request->all();

        // prepare the data to fill the model
        $parameters['AccountDetails'] = array_key_map($parameters['AccountDetails'], [
            'firstname' => 'name', 'lastname' => 'last_name',
        ]);
        $parameters['PersonalInfo'] = array_key_map($parameters['PersonalInfo'], [
            'zipcode' => 'zip_code',
        ]);
        $parameters['CreditCard'] = array_key_map($parameters['CreditCard'], [
            'cardholder' => 'card_holder', 'csecuritycode' => 'c_security_code',
        ]);
        $parameters['Pets'] = array_map(function ($pet) {
            return array_key_map($pet, [
                'birthdate' => 'birth_date', 'clinicname' => 'clinic_name', 'specialnotes' => 'special_notes',
            ]);
        }, $parameters['Pets']);

        $request->replace($parameters);
    }
}

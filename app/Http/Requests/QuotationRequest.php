<?php
namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class QuotationRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    private function getContractorRules($product = null) : array
    {
       $rules = [
            "name"=> [
                'string',
                'required',
            ],
            "surname"=>[
                'string',
                'required',
            ],
            "gender"=>[
                'string',
                'required',
                Rule::in(['M', 'F','G'])
            ],
            "fiscal_code"=>[
                'string',
                'size:16',
                'required'
            ],
            "phone"=>[
                'string',
                'required',
            ],
            "email"=>[
                'email:rfc',
                'required',
            ],
            "date_of_birth"=>[
                'string',
                'size:10',
                'regex:/^(0?[1-9]|[12][0-9]|3[01])[-](0?[1-9]|1[012])[-]\d{4}$/',
                'required'
            ],
            "country_of_birth_code"=>[

            ],
            "province_of_birth_code"=>[
                'required',
                'exists:communal_territories,car_plate_symbol'
            ],
            "commune_of_birth_code"=>[
                'required',
                'exists:communes,cadastral_code'
            ],
            "born_abroad"=>[
                'boolean'
            ],
            "residence_province_code"=>[
                'required',
                'exists:communal_territories,car_plate_symbol'
            ],
            "residence_commune_code"=>[
                'required',
                'exists:communes,cadastral_code'
            ],
            "postal_code"=>[
                'required',
                'string',
                'size:5',
            ],
            "address"=>[
                'required',
                'string',
            ],
            "house_number"=>[
                'required',
                'numeric'
            ],
            "civil_status_id"=>[

            ],
            "education_level_id"=>[

            ],
            "profession_id"=>[

            ],

        ];
        $extraRules = [];
        if($product !== 'profession'){
            $extraRules = [
                "driving_license_year"=>[
                    'required',
                    'string',
                    'size:4',
                ]
            ];
        }

        return array_merge( $rules, $extraRules );
    }
    private function getOwnerRules() : array
    {
        return [
            "owner_name"=> [
                'string',
                'required',
            ],
            "owner_surname"=>[
                'string',
                'required',
            ],
            "owner_gender"=>[
                'string',
                'required',
                Rule::in(['M', 'F','G'])
            ],
            "owner_fiscal_code"=>[
                'string',
                'size:16',
                'required'
            ],
            "owner_phone"=>[
                'string',
                'required',
            ],
            "owner_email"=>[
                'email:rfc',
                'required',
            ],
            "owner_date_of_birth"=>[
                'string',
                'size:10',
                'regex:/^(0?[1-9]|[12][0-9]|3[01])[-](0?[1-9]|1[012])[-]\d{4}$/',
                'required'
            ],
            "owner_country_of_birth_code"=>[

            ],
            "owner_province_of_birth_code"=>[
                'required',
                'exists:communal_territories,car_plate_symbol'
            ],
            "owner_commune_of_birth_code"=>[
                'required',
                'exists:communes,cadastral_code'
            ],
            "owner_born_abroad"=>[
                'boolean'
            ],
            "owner_residence_province_code"=>[
                'required',
                'exists:communal_territories,car_plate_symbol'
            ],
            "owner_residence_commune_code"=>[
                'required',
                'exists:communes,cadastral_code'
            ],
            "owner_postal_code"=>[
                'required',
                'string',
                'size:5',
            ],
            "owner_address"=>[
                'required',
                'string',
            ],
            "owner_house_number"=>[
                'required',
                'numeric'
            ],
            "owner_civil_status_id"=>[

            ],
            "owner_education_level_id"=>[

            ],
            "owner_profession_id"=>[

            ],
            "owner_driving_license_year"=>[
                'required',
                'string',
                'size:4',
            ]
        ];
    }
    private function getVehicleRules() : array
    {
        return [
            "vehicle_plate"=>[
                'string',
                'required',
                $this->input('product') === "auto" ? 'regex:/^[ABCDEFGHJKLMNPRSTVWXYZ]{2}[0-9]{3}[ABCDEFGHJKLMNPRSTVWXYZ]{2}$/' : "",
            ],
            "vehicle_brand_code"=>[
                'required',
                'exists:vehicle_makes,id'
            ],
            "vehicle_model_code"=>[
                'string',
                'exists:vehicle_models,id'
            ],
            "vehicle_version_code"=>[
                'required',
            /*  'exists:vehicle_versions,id'*/
            ],
            "vehicle_year"=>[
                'string',
                'required',
            ],
            "vehicle_month"=>[
                'string',
                'size:2',
                'required',
            ],
            "vehicle_purchased_year"=>[
                'string',
                'required',
                'size:4',
            ],
            "theft_protection_code"=>[
                'string',
                'required',
            ],
            "tow_hook"=> [
                'required',
                'boolean'
            ],
            "vehicle_usage" => [
                'required',
            ],
            "other_power_supply" => [
                'required',
            ],
        ];
    }
    private function getProfessionRules() : array
    {
        return [
            "profession"=>[
                'string',
                'required'
            ],
            "profession_code"=>[
                'string',
                'required'
            ],
            "profession_desc"=>[
                'string',
                'required'
            ],
            "billed"=>[
                'string',
                'required'
            ],
            "billed_maximum"=>[
                'string',
                'required'
            ],
            "retroactivity"=>[
                'integer',
                'required'
            ],
            "high_risk"=>[
                'string',
            ],
            "ext_reviewer"=>[
                'string',
            ],
            "extensions"=>[
                'array',
            ]
        ];
    }
    public function authorize() : bool
    {
        return true;
        // WE CAN IMPLEMENT A LOGIC TO GIVE AUTHORIZATION TO CERTAIN APPS OR USERS ROLES
    }

    public function rules() : array
    {

        $rules = [
            'product' => [
                'string',
                'required',
                Rule::in(['auto', 'moto','autocarro', 'profession'])
            ],
            'source'=>[
                'string',
                'required',
                Rule::in(['localhost', 'develop','meglioquestio.it'])
            ],
            'contractor_is_owner'=> [
                'required',
                'boolean'
            ],
            // 'data_privacy'=>['present'] temporarly remove 
        ];

        $contractorRules = [];
        $ownerRules = [];
        $vehicleRules = [];
        $professionRules = [];

        $vehiclesArray = ['auto', 'moto', 'autocarro'];

        if(in_array($this->input('product'),  $vehiclesArray)){
            //IF CANTRACTOR AND PRODUCT AUTO, MOTO, AUTOCARRO
            $contractorRules = $this->getContractorRules();
            //IF OWNER IF THE CONTRACTOR IS NOT THE OWNER
            if(!$this->input('contractor_is_owner')) {
                $ownerRules= $this->getOwnerRules();
            }
            // VEHICLE
            $vehicleRules = $this->getVehicleRules();
        }

        if($this->input('product') === 'profession') {
            $contractorRules = $this->getContractorRules('profession');
            $professionRules = $this->getProfessionRules();
        }

        $rules = array_merge( $rules, $contractorRules, $ownerRules, $vehicleRules, $professionRules );
        return $rules;
    }

    public function messages() : array
    {
        return [
            'required' => ':attribute is required',
            'integer' => ':attribute must be a integer',
            'string' => ':attribute must be an string',
            'boolean' => ':attribute must be a boolean true/false or 1, 0',
            'product.in' => 'Product is one of: auto, moto, autocarro, insurance',
            'exists' => ":input isn't valid for :attribute",
            'min' => "The :attribute ( :input ) it's too short",
            'date_of_birth.regex'=>"Birthday should be written in italian format. Ex: 28-01-1994",
            'source.in' => "The source of the request is invalid. Check your soruce or contqact sytem admin."
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator) : void
    {
      if($validator->fails()){
        //must be moved in a method inside a logger class
        $errors = $validator->messages()->toJson();
        $currentDate = new Carbon();
        $date = $currentDate->format("d-m-Y | H:i:s");
        $errorMessage = "$date - ERROR REQUEST IS MALFORMED -> app/Http/Requests/QuotationRequest: ( $errors )";
        // dd($errorMessage);
        // to do : Write a log with the $errorMessage
        // report to any error service that will be implementend int he future
      }
    }
}

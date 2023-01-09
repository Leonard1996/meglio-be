<?php

namespace App\Services;

use App\Models\InsuranceRequestProfession;
use App\Models\InsuranceRequest;
use App\Models\InsuranceRequestVehicle;
use App\Models\InsuranceContractor;
use App\Models\User;
use App\Models\Customer;

use App\Helpers\Helpers;
use App\Notifications\NewQoutationNotification;
use App\Notifications\GeneralQuotationNotification;
use App\Notifications\SavedQoutationNotification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Notification;

class RequestService
{

    private function storeProfessionData(int $request_id, array $data): int
    {
        // dd($data);
        try {
            $requestProfession = new InsuranceRequestProfession();
            $requestProfession->request_id = $request_id;
            $requestProfession->profession = $data['profession'];
            $requestProfession->profession_code = $data['profession_code'];
            $requestProfession->profession_desc = $data['profession_desc'];
            $requestProfession->billed = $data['billed'];
            $requestProfession->billed_maximum = $data['billed_maximum'];
            $requestProfession->retroactivity = $data['retroactivity'];
            $requestProfession->high_risk = $data['high_risk'];
            $requestProfession->ext_reviewer = $data['ext_reviewer'];
            $requestProfession->extensions = json_encode($data['extensions']);
            $requestProfession->save();
            return $requestProfession->id;
        } catch (\Exception $e) {
            // dd($e);
            Helpers::writeErrorLogs($e);
            return 0;
        }
    }

    private function storeVehicleOwner(int $request_id, array $data)
    {
        try {
            $contractor = new InsuranceContractor();
            $contractor->request_id = $request_id;
            $contractor->name = $data['owner_name'];
            $contractor->surname = $data['owner_surname'];
            $contractor->gender = $data['owner_gender'];
            $contractor->fiscal_code = $data['owner_fiscal_code'];
            $contractor->phone = $data['owner_phone'];
            $contractor->email = $data['owner_email'];
            $contractor->date_of_birth = $data['owner_date_of_birth'];
            $contractor->country_of_birth_code = $data['owner_country_of_birth_code'];
            $contractor->province_of_birth_code = $data['owner_province_of_birth_code'];
            $contractor->commune_of_birth_code = $data['owner_commune_of_birth_code'];
            $contractor->born_abroad = $data['owner_born_abroad'];
            $contractor->residence_province_code = $data['owner_residence_province_code'];
            $contractor->residence_commune_code = $data['owner_residence_commune_code'];
            $contractor->postal_code = $data['owner_postal_code'];
            $contractor->address = $data['owner_address'];
            $contractor->house_number = $data['owner_house_number'];
            $contractor->civil_status_id = $data['owner_civil_status_id'];
            $contractor->education_level_id = $data['owner_education_level_id'];
            $contractor->profession_id = $data['owner_profession_id'];
            $contractor->driving_license_year = $data['owner_driving_license_year'];
            $contractor->is_owner = true;
            $contractor->save();
            return $contractor->id;
        } catch (\Exception $e) {
            Helpers::writeErrorLogs($e);
            return 0;
        }
    }

    private function storeCustomer(array $data)
    {
        try {
            $old_customer = Customer::where('email',$data['email'])->where('phone',$data['phone'])->where('name',$data['name'])->where('surname',$data['surname'])->where('fiscal_code',$data['fiscal_code'])->first();
            if($old_customer === null){

                $customer = new Customer();
                $customer->name = $data['name'];
                $customer->surname = $data['surname'];
                $customer->gender = $data['gender'];
                $customer->fiscal_code = $data['fiscal_code'];
                $customer->phone = $data['phone'];
                $customer->email = $data['email'];
                $customer->date_of_birth = $data['date_of_birth'];
                $customer->country_of_birth_code = $data['country_of_birth_code'];
                $customer->province_of_birth_code = $data['province_of_birth_code'];
                $customer->commune_of_birth_code = $data['commune_of_birth_code'];
                $customer->born_abroad = $data['born_abroad'];
                $customer->residence_province_code = $data['residence_province_code'];
                $customer->residence_commune_code = $data['residence_commune_code'];
                $customer->postal_code = $data['postal_code'];
                $customer->address = $data['address'];
                $customer->house_number = $data['house_number'];
                $customer->education_level_id = $data['education_level_id'];
                $customer->civil_status_id = $data['civil_status_id'];
                $customer->profession_id = isset($data['profession_id']) ? $data['profession_id'] : null;
                $customer->driving_license_year = isset($data['driving_license_year']) ? $data['driving_license_year'] : null;
                $customer->is_owner = $data['contractor_is_owner'];
                $customer->save();
                return $customer;
            }
            return $old_customer;
        } catch (\Exception $e) {
            Helpers::writeErrorLogs($e);
            return 0;
        }
    }

    private function storeVehicleData(int $request_id, array $data): int
    {
        try {
            $vehicle = new InsuranceRequestVehicle();
            $vehicle->request_id = $request_id;
            $vehicle->vehicle_plate = $data["vehicle_plate"];
            $vehicle->vehicle_brand_code = $data["vehicle_brand_code"];
            $vehicle->vehicle_model_code = $data["vehicle_model_code"];
            $vehicle->vehicle_version_code = $data["vehicle_version_code"];
            $vehicle->vehicle_year = $data["vehicle_year"];
            $vehicle->vehicle_month = $data["vehicle_month"];
            $vehicle->vehicle_purchased_year = $data["vehicle_purchased_year"];
            $vehicle->theft_protection_code = $data["theft_protection_code"];
            $vehicle->tow_hook = $data["tow_hook"];
            $vehicle->usage = $data["vehicle_usage"] ?? '';
            $vehicle->parking = $data["parking"] ?? '';
            $vehicle->other_power_supply = $data["other_power_supply"] ?? '';
            $vehicle->save();
            return $vehicle->id;
        } catch (\Exception $e) {
            // dd($e);
            Helpers::writeErrorLogs($e);
            return 0;
        }
    }

    private function storeRequest(array $data,int $customer_id): InsuranceRequest
    {
        try {
            $insuranceRequest = new InsuranceRequest();
            $insuranceRequest->source = $data['source'];
            $insuranceRequest->user_id = auth()->id();
            $insuranceRequest->customer_id = $customer_id;
            $insuranceRequest->km_in_one_year = isset($data['km_in_one_year']) ? $data['km_in_one_year'] : null;
            $insuranceRequest->broker_company_id = auth()->id(); //to do recheck
            $insuranceRequest->broker_agent_id = auth()->id(); //to do recheck
            $insuranceRequest->request_token = Helpers::createNewRequestTooken();
            $insuranceRequest->ip = Helpers::getIp();
            $insuranceRequest->product_id = Helpers::getProductIdByProductName($data['product']);
            $efDate = false;
            if(isset($data['policy_effective_date'])){
                $date = explode("-", $data['policy_effective_date']);
                $y = $date[2];
                $m = $date[1];
                $d = $date[0];
                $efDate = $y.'-'.$m.'-'.$d;
            }
            $insuranceRequest->policy_effective_date = $efDate ? $efDate : null;
                // other_drivers
                // family_youngest_driver_age
            $insuranceRequest->save();
            return $insuranceRequest;
        } catch (\Exception $e) {
            // log errors or report to a new service.
            // dd($e);
            Helpers::writeErrorLogs($e);
            return new InsuranceRequest();
        }
    }

    public function getRequestByToken(string $token): Collection
    {
        return InsuranceRequest::with([
            'product',
            'customer',
            'vehicle.version',
            'user',
            'agent',
            'borker_company',
            'data_privacies',
            'quotation_saves',
            'quotations.quotation_data_prima.quotation_data_prima_guarantees.quotation_data_prima_guarantee_prices',
            'quotations.quotation_data_adriatic',
            'quotations.company',
            'professional',
            'documents',
            'failed_quotations.company'
        ])->where('request_token', $token)->get();
    }

    public function saveRequest(array $data = null): string
    {
        $vehiclesArray = ['auto', 'moto', 'autocarro'];

        $contractor = $this->storeCustomer($data);

        if ($contractor->id) {
            $request = $this->storeRequest($data,$contractor->id);

            if(!$request->id){
                return "failed";
            }

            if ($data['product'] == 'profession') {
                // here
                //    dd("HERE");
                $professionData = $this->storeProfessionData($request->id, $data);

                if ($professionData) {
                    return $request->request_token;
                }

            }
            if (in_array($data['product'], $vehiclesArray)) {
                $vehicle = $this->storeVehicleData($request->id, $data);

                $owner = false;
                if (!$data['contractor_is_owner']) {
                    $owner = $this->storeVehicleOwner($request->id, $data);
                }
                if ($vehicle && $contractor) {
                    if ($data['contractor_is_owner']) {
                        return $request->request_token;
                    }
                    if ($owner) {
                        return $request->request_token;
                    }
                }
            }
        }

        return "failed";

    }

    public function getRequestDataProfession($requestToken): array
    {
        $request = InsuranceRequest::where('request_token', $requestToken)->first()->toArray();

        $requestContractor = InsuranceContractor::where('request_id', $request['id'])->first()->toArray();
        $requestData = InsuranceRequestProfession::where('request_id', $request['id'])->first()->toArray();
        return array_merge($request, $requestContractor, $requestData);
    }

    /**
     * Function send email for new qoutation
     * @return \Illuminate\Http\JsonResponse|int
     * @author Zoi Murati
     */
    public function newQoutationNotificaion()
    {
        try {
            $area_managers = User::areamanager()->get();
            // $broker_agent = User::brokeragent()->get();
            //$broker_company = User::brokercompany()->get();

            $text = 'New quotiation request';
            $subject = 'New quotiation request';

            //merge all users with this types
            //$users = collect($area_managers)->merge($broker_agent)->merge($broker_company);

            $users = $area_managers;

            foreach ($users as $user) {
                // $user->notify(new NewQoutationNotification($quotation, $user, $text, $subject));
                $user->notify(new NewQoutationNotification($user, $text, $subject));
            }
            return response()->json([
                'message' => 'Mail has sent.'
            ], 200);

        } catch (\Exception $e) {
            Helpers::writeErrorLogs($e);
            return 0;
        }
    }

    /**
     * Function send email for new qoutation
     * @return \Illuminate\Http\JsonResponse|int
     * @author Zoi Murati
     */

    public function savedQoutationNotificaion()
    {
        try {

            $area_managers = User::areamanager()->get();
            $broker_agent = User::brokeragent()->get();
            $broker_company = User::brokercompany()->get();

            //$quotation = new Quotation();
            $text = 'Test';
            $subject = 'Subject saved qoutation';

            //merge all users with this types
            $users = collect($area_managers)->merge($broker_agent)->merge($broker_company);

            foreach ($users as $user) {
                // $user->notify(new SavedQoutationNotification($quotation, $user, $text, $subject));
                $user->notify(new SavedQoutationNotification($user, $text, $subject));
            }
            return response()->json([
                'message' => 'Mail has sent.'
            ], 200);

        } catch (\Exception $e) {
            Helpers::writeErrorLogs($e);
            return 0;
        }
    }

    /**
     * Function send email for new qoutation
     * @return \Illuminate\Http\JsonResponse|int
     * @author Zoi Murati
     */
    public function soldQoutationNotificaion()
    {
        try {

            $area_managers = User::areamanager()->get();
            $broker_agent = User::brokeragent()->get();
            $broker_company = User::brokercompany()->get();

            //$quotation = new Quotation();
            $text = 'Test';
            $subject = 'Subject sold qoutation';

            //merge all users with this types
            $users = collect($area_managers)->merge($broker_agent)->merge($broker_company);

            foreach ($users as $user) {
                // $user->notify(new GeneralQuotationNotification($quotation, $user, $text, $subject));
                $user->notify(new GeneralQuotationNotification($user, $text, $subject));
            }
            return response()->json([
                'message' => 'Mail has sent.'
            ], 200);

        } catch (\Exception $e) {
            Helpers::writeErrorLogs($e);
            return 0;
        }
    }

}

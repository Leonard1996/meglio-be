<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Services\InsuranceCompanyService;
use App\Services\MaritalStatusService;
use App\Services\ParkingTypeService;
use App\Services\ProfessionService;
use App\Services\QualificationService;
use App\Services\TheftProtectionService;
use App\Services\VehicleFuelService;
use App\Services\VehicleUsageService;
use App\Traits\APITrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ServiceModelController extends Controller
{
    use APITrait;

    protected MaritalStatusService $maritalStatusService;
    protected TheftProtectionService $theftProtectionService;
    protected QualificationService $qualificationService;
    protected ProfessionService $professionService;
    protected ParkingTypeService $parkingTypeService;
    protected InsuranceCompanyService $insuranceCompanyService;
    protected VehicleUsageService $vehicleUsageService;
    protected VehicleFuelService $vehicleFuelService;

    public function __construct(
        MaritalStatusService $maritalStatusService,
        TheftProtectionService $theftProtectionService,
        QualificationService $qualificationService,
        ProfessionService $professionService,
        ParkingTypeService $parkingTypeService,
        InsuranceCompanyService $insuranceCompanyService,
        VehicleUsageService $vehicleUsageService,
        VehicleFuelService $vehicleFuelService
    )
    {
        $this->maritalStatusService = $maritalStatusService;
        $this->theftProtectionService = $theftProtectionService;
        $this->qualificationService = $qualificationService;
        $this->professionService = $professionService;
        $this->parkingTypeService = $parkingTypeService;
        $this->insuranceCompanyService = $insuranceCompanyService;
        $this->vehicleUsageService = $vehicleUsageService;
        $this->vehicleFuelService = $vehicleFuelService;
    }

    public function index() : JsonResponse
    {
        try {
            $data = [
                'marital_statuses' => $this->maritalStatusService->all(),
                'theft_protections' => $this->theftProtectionService->all(),
                'qualifications' => $this->qualificationService->all(),
                'professions' => $this->professionService->all(),
                'parking_types' => $this->parkingTypeService->all(),
                'insurance_companies' => $this->insuranceCompanyService->all(),
                'vehicle_usage_types' => $this->vehicleUsageService->all(),
                'vehicle_fuels' => $this->vehicleFuelService->all(),
            ];
            return $this->apiResponse($data);
        } catch (Exception $e) {
            Helpers::writeErrorLogs($e);
            return $this->apiResponse([], Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }
}

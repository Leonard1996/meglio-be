<?php
namespace App\Services;

use App\Models\VehicleModel;
use Illuminate\Database\Eloquent\Collection;


class VehicleModelService {

    public function get(array $filters = []) : Collection
    {
        $model = VehicleModel::query();
        if (isset($filters['make_id'])) {
            $model->where('vehicle_make_id', $filters['make_id']);
        }
        return $model->get();
    }

    public function getVehicleModel(VehicleModel $vehicleModel)
    {
        return $vehicleModel;
    }

}

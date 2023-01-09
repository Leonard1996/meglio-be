<?php
namespace App\Services;

use App\Models\VehicleVersion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class VehicleVersionService {

    public function get(array $filters = []) : Collection
    {
        // DB::enableQueryLog();
        $model = VehicleVersion::query();
        $model->with(['fuel','category','bodyType']);
        if (isset($filters['model_id'])) {
            $model->where('vehicle_model_id',(int)$filters['model_id']);
        }
        if (isset($filters['year'])) {
            $model->where('year', "=", (int)$filters['year']);
        }
        if (isset($filters['month'])) {
            $model->where('month', "=", (int)$filters['month']);
        }
        $model->get();
        // dd(DB::getQueryLog());
        return $model->get();
    }


    public function getVehicleVersion(VehicleVersion $vehicleVersion)
    {
        return $vehicleVersion;
    }

}

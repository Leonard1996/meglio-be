<?php

namespace App\Services;

use App\Models\DataPrivacy;

class DataPrivacyService
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataPrivacy()
    {
        return DataPrivacy::all();
    }

    /**
     * Create DataService
     *
     * @param $data
     * @return mixed
     */
    public function createDataPrivacy(array $data)
    {
        return DataPrivacy::create($data);
    }

    /**
     * @param $dataPrivacy
     * @param $data
     * @return mixed
     */
    public function updateDataPrivacy(DataPrivacy $dataPrivacy, array $data)
    {

        $dataPrivacy->update($data);

        return $dataPrivacy;
    }

    /**
     * @param $data_privacy
     * @return mixed
     */
    public function destroyDataPrivacy(DataPrivacy $data_privacy)
    {
        $data_privacy->delete();

        return $data_privacy;
    }

}

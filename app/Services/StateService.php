<?php
namespace App\Services;

use App\Models\State;


class StateService {

    public function getStates()
    {
        return State::all();
    }

    public function getState(State $state)
    {
        return $state;
    }

}

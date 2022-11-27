<?php

namespace App\Observers;

use App\Models\Patient;
use App\Models\PatientDetail;

class PatientDetailObserver
{
    /**
     * Handle the PatientDetail "created" event.
     *
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return void
     */
    public function creating(PatientDetail $patientDetail)
    {
        $last = Patient::last()->get()->first()->id;
        $patientDetail->patient_id = $last;
        $patientDetail->patient_status_id = 2;
    }

    /**
     * Handle the PatientDetail "updated" event.
     *
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return void
     */
    public function updated(PatientDetail $patientDetail)
    {
        //
    }

    /**
     * Handle the PatientDetail "deleted" event.
     *
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return void
     */
    public function deleted(PatientDetail $patientDetail)
    {
        //
    }

    /**
     * Handle the PatientDetail "restored" event.
     *
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return void
     */
    public function restored(PatientDetail $patientDetail)
    {
        //
    }

    /**
     * Handle the PatientDetail "force deleted" event.
     *
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return void
     */
    public function forceDeleted(PatientDetail $patientDetail)
    {
        //
    }
}

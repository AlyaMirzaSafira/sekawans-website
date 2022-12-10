<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->uuid = null;
        $logs = Activity::all()->reverse()->filter(function ($value) {
            // if (!($value->log_name == 'article' && ($value->event == 'restored' || $value->event == 'deleted'))) {
            if ($value->batch_uuid) {
                if ($this->uuid !== $value->batch_uuid) {
                    $this->uuid = $value->batch_uuid;
                    return $value;
                }
            } else return $value;
            // }
        });
        // dd($logs->first());
        return view('admin.activitylog.index', compact('logs'));
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Activity  $activity
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Activity $log)
    // {
    //     if ($log->batch_uuid) {
    //         $logs = $log->forBatch($log->batch_uuid)->get();
    //         foreach ($logs as $log) {
    //             if ($log->log_name === "patient") $patient = $log;
    //             if ($log->log_name === "patient detail") $patientDetail = $log;
    //             if ($log->log_name === "emergency contact") $emergencyContact = $log;
    //         }
    //         // dd($patient->changes(), $patientDetail->changes(), $emergencyContact->changes());
    //         // if (request()->ajax()) {
    //         //     return true;
    //         // }
    //         return json_encode([
    //             "patient" => $patient->changes(),
    //             "patientDetail" => $patientDetail->changes(),
    //             "emergencyContact" => $emergencyContact->changes()
    //         ]);
    //     } else {
    //         $log_name = $log->log_name;
    //         $subject = $log->subject;
    //         $model = $log->subject_type;
    //         $user = $log->causer;
    //         $properties = $log->changes();
    //         dd($subject, $model, $user, $properties);
    //         return view('admin.activitylog.show', compact('log_name', 'subject', 'model', 'user', 'properties'));
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function restore(Activity $activity)
    {
        if ($activity->batch_uuid) {
            $activities = $activity->forBatch($activity->batch_uuid)->get()->reverse();
            $restored = collect();
            foreach ($activities as $activity) {
                $restored->add($this->restoring($activity));
            }
            $this->connect($activities, $restored);
        } else {
            $this->restoring($activity);
        }
    }

    private function restoring($activity)
    {
        $model = $activity->subject_type;
        $properties = $activity->changes();
        $model::unguard();
        activity()->disableLogging();
        $status = match ($activity->event) {
            'deleted', 'updated' => $model::updateOrCreate(['id' => $properties['old']['id']], $properties['old']),
            'created' => $model->delete()
        };
        match ($activity->log_name) {
            'about'     => $properties['old']['id'] == 3 ? $this->deleteContentImg($properties['attributes']['contents']) : '',
            'article'   => [
                $properties['old']['img'] !== $properties['attributes']['img'] ? $this->deleteContentImg($properties['attributes']['img']) : '',
                $properties['old']['contents'] !== $properties['attributes']['contents'] ? $this->deleteContentImg($properties['attributes']['contents'], $properties['old']['contents']) : '',
            ],
            default     => ''
        };
        $activity->delete();
        activity()->enableLogging();
        $model::reguard();
        return $status;
    }

    private function connect($activities, $restored)
    {
        $i = 0;
        activity()->disableLogging();
        foreach ($activities as $activity) {
            $restored[$i]->update($activity->changes()['old']);
            $i++;
        }
        activity()->enableLogging();
    }

    private function isContainImg($contents)
    {
        return str($contents)->contains('img/about/') || str($contents)->contains('img/articles/');
    }

    private function getImgSrc($contents)
    {
        return str($contents)->matchAll('/((storage\/|^)?img\/(articles|about)\/([^"]+))/')->map(fn ($src) => str($src)->start('img/'));
    }

    private function deleteContentImg($contents, $exclude = null)
    {
        if ($exclude) if ($this->isContainImg($exclude))
            $exclude = $this->getImgSrc($exclude);
        // dd($this->getImgSrc($contents), $contents, $exclude);
        if ($this->isContainImg($contents))
            $this->getImgSrc($contents)->each(fn ($src) => str($src)->contains($exclude) ? '' : Storage::delete($src));
    }
}

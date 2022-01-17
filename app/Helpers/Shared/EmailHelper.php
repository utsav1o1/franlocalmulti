<?php

namespace App\Helpers\Shared;

use App\Jobs\EmailAutoResponderJob;
use App\Jobs\PropertyEvaluationJob;
use Carbon\Carbon;

class EmailHelper
{
    public static function autoresponder($email)
    {
            $validated['mail_to'] = $email;
            $jobToDispatch = (new EmailAutoResponderJob($validated))->delay(Carbon::now()->addSeconds(10));
            dispatch($jobToDispatch);

    }
}
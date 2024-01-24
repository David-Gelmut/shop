<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Feedback\FeedbackRequest;
use App\Jobs\SendMailToManagerJob;
use App\Mail\FeedbackMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function __invoke(FeedbackRequest $request)
    {
        $data = $request->validated();
        dispatch(new SendMailToManagerJob($data));
    }
}

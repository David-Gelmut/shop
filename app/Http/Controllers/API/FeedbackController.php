<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Feedback\FeedbackRequest;
use App\Mail\FeedbackMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function __invoke(FeedbackRequest $request)
    {
        $data = $request->validated();
        Mail::to(env('MAIL_MANAGER'))->send(new FeedbackMailer($data));
      //  return redirect()->route('main.index')->with('success', 'Ваше сообщение успешно отправлено');
    }
}

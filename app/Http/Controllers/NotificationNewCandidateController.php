<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationNewCandidateController extends Controller
{
    // Tiene unicamente este método
    public function __invoke(Request $request)
    {

        //$notificationes = auth()->user()->unreadNotifications;

        $notificationes = auth()->user()->notifications()->where('created_at', '>=', now()->subDays(7))->latest()->get();

        auth()->user()->unreadNotifications->markAsRead();

        return view('notifications.index',[
            'notifications' => $notificationes
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Exibe a lista de notificações
    public function index()
    {
        $notifications = Notification::all();
        return view('notifications.index', compact('notifications'));
    }

    // Exibe uma notificação específica
    public function show(Notification $notification)
    {
        return view('notifications.show', compact('notification'));
    }

    // Exclui uma notificação
    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('notifications.index');
    }
}

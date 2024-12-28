<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Listar todas as notificações
    public function index()
    {
        $notifications = Notification::all();
        return response()->json($notifications);
    }

    // Exibir uma notificação específica
    public function show($id)
    {
        $notification = Notification::find($id);

        if (!$notification) {
            return response()->json(['message' => 'Notificação não encontrada'], 404);
        }

        return response()->json($notification);
    }

    // Deletar uma notificação
    public function destroy($id)
    {
        $notification = Notification::find($id);

        if (!$notification) {
            return response()->json(['message' => 'Notificação não encontrada'], 404);
        }

        $notification->delete();

        return response()->json(['message' => 'Notificação deletada com sucesso']);
    }
}

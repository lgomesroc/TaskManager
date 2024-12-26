<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'status',
        'prioridade',
        'prazo',
        'usuario_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'tarefa_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'tarefa_id');
    }
}

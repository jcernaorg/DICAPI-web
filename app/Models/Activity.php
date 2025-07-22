<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'action',
        'model_type',
        'model_id',
        'title',
        'description'
    ];

    /**
     * Get the time ago for this activity
     */
    public function getTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Get the formatted description
     */
    public function getFormattedDescriptionAttribute()
    {
        $actionText = [
            'create' => 'creó',
            'update' => 'actualizó',
            'delete' => 'eliminó'
        ];

        $modelText = [
            'Publicacion' => 'publicación',
            'Plantilla' => 'plantilla'
        ];

        $action = $actionText[$this->action] ?? $this->action;
        $model = $modelText[$this->model_type] ?? $this->model_type;

        return "{$action} la {$model} \"{$this->title}\"";
    }
}

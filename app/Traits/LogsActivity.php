<?php

namespace App\Traits;

use App\Models\Activity;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        static::created(function ($model) {
            $model->logActivity('create');
        });

        static::updated(function ($model) {
            $model->logActivity('update');
        });

        static::deleted(function ($model) {
            $model->logActivity('delete');
        });
    }

    protected function logActivity($action)
    {
        Activity::create([
            'action' => $action,
            'model_type' => class_basename($this),
            'model_id' => $this->id,
            'title' => $this->titulo ?? $this->title ?? 'Sin título',
            'description' => $this->getActivityDescription($action)
        ]);
    }

    protected function getActivityDescription($action)
    {
        $modelName = class_basename($this);
        $title = $this->titulo ?? $this->title ?? 'Sin título';
        
        $descriptions = [
            'create' => "Nueva {$modelName} creada: {$title}",
            'update' => "{$modelName} actualizada: {$title}",
            'delete' => "{$modelName} eliminada: {$title}"
        ];

        return $descriptions[$action] ?? "Acción {$action} en {$modelName}";
    }
} 
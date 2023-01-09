<?php

namespace App\Traits;

use App\Logging\RotatingFileHandler;
use Illuminate\Database\Eloquent\Model;
use Monolog\Logger;

trait LogsTrait
{

    public static function bootLogsTrait()
    {
        static::created(function (Model $model) {
            (new self)->createdModel($model);
        });
        static::updated(function (Model $model) {
            (new self)->updatedModel($model);
        });

        static::saved(function (Model $model) {
            (new self)->savedModel($model);
        });

        static::deleted(function (Model $model) {
            (new self)->deletedModel($model);
        });
    }

    /**
     * Handle the Model "created" event.
     *
     * @param \App\Models\ $model
     * @return void
     */
    public function createdModel($model)
    {
        $model_name = class_basename($model);

        $logger = new Logger(strtoupper($model_name));
        $handler = new RotatingFileHandler(storage_path("/logs/".strtolower($model_name).".log"), 0, Logger::INFO, true, 0664);
        $handler->setFilenameFormat('{filename}-{date}', 'Y-m');
        $logger->pushHandler($handler);

        $array = [$model];
        $logger->info('NEW_' . strtoupper($model_name) . '_EVENT', $array);

    }

    /**
     * Handle the Model "updated" event.
     *
     * @param \App\Models\ $model
     * @return void
     */
    public function updatedModel($model)
    {
        $model_name = class_basename($model);

        $logger = new Logger(strtoupper($model_name));
        $handler = new RotatingFileHandler(storage_path("/logs/".strtolower($model_name).".log"), 0, Logger::INFO, true, 0664);
        $handler->setFilenameFormat('{filename}-{date}', 'Y-m');
        $logger->pushHandler($handler);

        $array = [$model];
        $logger->info('UPDATE_' . strtoupper($model_name) . '_EVENT', $array);
    }

    /**
     * Handle the Model "saving" event.
     *
     * @param \App\Models\ $model
     * @return void
     */
    public function savedModel($model)
    {

    }

    /**
     * Handle the Model "deleted" event.
     *
     * @param \App\Models $model
     * @return void
     */
    public function deletedModel($model)
    {
        $model_name = class_basename($model);

        $logger = new Logger(strtoupper($model_name));
        $handler = new RotatingFileHandler(storage_path("/logs/".strtolower($model_name).".log"), 0, Logger::INFO, true, 0664);
        $handler->setFilenameFormat('{filename}-{date}', 'Y-m');
        $logger->pushHandler($handler);

        $array = [$model];
        $logger->info('DELETE_' . strtoupper($model_name) . '_EVENT', $array);
    }
}

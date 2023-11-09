<?php

namespace ThinKit\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;
use ThinKit\Models\Expiration\HasExpiration;

class DeleteExpiredCommand extends Command
{

    protected $signature = 'thinkit:delete-expired {model} {--force} {--timeout=0}';

    protected $description = '';

    public function handle()
    {
        $modelName        = $this->argument('model');
        $timeoutInMinutes = (int)$this->option('timeout');
        $isForceDelete    = (bool)$this->option('force');

        if (!is_subclass_of($modelName, Model::class, true)) {
            $modelName = Relation::getMorphedModel($modelName) ?: $modelName;
        }

        if (!is_subclass_of($modelName, Model::class, true)) {
            $this->error("Model [{$modelName}] name should extends model class");

            return static::FAILURE;
        }

        if (!in_array(HasExpiration::class, class_uses_recursive($modelName))) {
            $this->error("Model [{$modelName}] should use trait 'HasExpiration'");

            return static::FAILURE;
        }

        $query = $modelName::query()->willBeExpiredAt(Carbon::now()->addMinutes($timeoutInMinutes));

        if ($isForceDelete && in_array(SoftDeletes::class, class_uses_recursive($modelName))) {
            do {
                $deleted = $query->limit(100)->forceDelete();
            } while ($deleted > 0);
        } else {
            do {
                $deleted = $query->limit(100)->delete();
            } while ($deleted > 0);
        }


        return static::SUCCESS;
    }
}

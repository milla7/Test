<?php

namespace App\Traits;

use App\Models\Log;

trait LogTrait {
    public function saveLog($data) {
        Log::create($data);
    }
}
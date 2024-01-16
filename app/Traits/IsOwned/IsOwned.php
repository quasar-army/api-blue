<?php

namespace App\Traits\IsOwned;

use App\Traits\IsOwned\HasCreator;
use App\Traits\IsOwned\HasDeleter;
use App\Traits\IsOwned\HasUpdater;

trait IsOwned
{
    use HasCreator, HasDeleter, HasUpdater;
}

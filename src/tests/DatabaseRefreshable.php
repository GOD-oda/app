<?php

declare(strict_types=1);

namespace Tests;

trait DatabaseRefreshable
{
    public function refreshDatabase()
    {
        $this->artisan('migrate:refresh');
    }
}

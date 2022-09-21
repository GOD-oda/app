<?php

declare(strict_types=1);

namespace Tests;

trait DatabaseRefreshable
{
    public function refreshDatabase(): void
    {
        $this->artisan('migrate:refresh');
    }
}

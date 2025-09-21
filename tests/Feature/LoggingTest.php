<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        Log::debug('Hallo Debug');
        Log::info('Hallo Info');
        Log::warning('Hallo Warning');
        Log::critical('Hallo Critical');
        Log::error('Hallo Error');
        Log::emergency('Hallo Emergency');

        self::assertTrue(true);
    }

    public function testContext()
    {
        Log::info('Hallo Info', ['username' => 'Dony']);
        Log::info('Hallo Info', ['username' => 'Dony']);
        Log::info('Hallo Info', ['username' => 'Dony']);

        self::assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(['username' => 'Dony Yuli Handoko']);
        Log::info("Hallo Info");
        Log::info("Hallo Info");
        Log::info("Hallo Info");
        Log::info("Hallo Info");
        self::assertTrue(true);
    }

    public function testChanel()
    {
        $logChannel = Log::channel('daily');
        $logChannel->info('hallo daily');
        self::assertTrue(true);
    }

    public function testHandler()
    {
        $logChannel = Log::channel('file');
        $logChannel->info('Test Handler');
        self::assertTrue(true);
    }
}

<?php

use PHPUnit\Framework\TestCase;

class FirebaseDatabaseUrlTest extends TestCase
{
    private const EXPECTED_URL_FORMAT = '@^https://(?P<namespace>[^.]+)\.(?P<host>.+)$@';

    public function test_url()
    {
        $databaseUrl = "https://127.0.0.1:15000/?ns=ab-perudo-game";

        $databaseUrl = rtrim($databaseUrl, '/');

        $this->assertEquals(preg_match(self::EXPECTED_URL_FORMAT, $databaseUrl, $matches), 1);
    }
}

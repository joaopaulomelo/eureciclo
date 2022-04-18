<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    const BASE_URL = '/api/v1';
    const PURCHASE_URL = '/purchase';
}

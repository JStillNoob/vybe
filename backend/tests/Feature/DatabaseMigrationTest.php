<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('database migrations execute successfully', function () {
    $this->assertDatabaseEmpty('users');
    $this->assertDatabaseEmpty('profiles');
});

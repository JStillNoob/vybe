<?php

test('health check returns ok status', function () {
    $response = $this->getJson('/api/health');

    $response->assertOk()
        ->assertExactJson([
            'status' => 'ok',
        ]);
});

test('v1 health check alias returns ok status', function () {
    $response = $this->getJson('/api/v1/health');

    $response->assertOk()
        ->assertExactJson([
            'status' => 'ok',
        ]);
});

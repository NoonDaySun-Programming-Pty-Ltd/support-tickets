<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Response;

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(status: Response::HTTP_FOUND);
});

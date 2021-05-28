<?php

declare(strict_types=1);

namespace JustSteveKing\Transporter\Tests\Stubs;

use JustSteveKing\Transporter\Concerns\HandlesUri;
use JustSteveKing\Transporter\Concerns\HasHeaders;
use JustSteveKing\Transporter\Concerns\HasPayload;
use JustSteveKing\Transporter\Concerns\ForwardsRequests;
use JustSteveKing\Transporter\Contracts\RequestContract;
use JustSteveKing\Transporter\Concerns\HandlesClientSetup;

class TokenRequest implements RequestContract
{
    use HandlesUri;
    use HasPayload;
    use HasHeaders;
    use ForwardsRequests;
    use HandlesClientSetup;
    
    public string $path = 'posts';

    public array $payload = [];

    public array $parameters = [];

    public array $headers = [
        'Accept' => 'application/json'
    ];

    public string $baseUri = 'https://jsonplaceholder.typicode.com';

    public function requiresAuth(): bool
    {
        return true;
    }

    public function authStrategy(): string|null
    {
        return 'token';
    }

    public function authCredentials(): array|null
    {
        return [
            'abcdefg', // API token.
            'Bearer' // Type of token. -> Authorization Bearer abcdefg
        ];
    }

    public function method(): string
    {
        return 'GET';
    }
}

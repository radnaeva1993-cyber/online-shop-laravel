<?php

declare(strict_types=1);

namespace App\Dto\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use Spatie\LaravelData\Data;

class RegisterDto extends Data
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $email,
        public ?string $phone,
        public string $password,
    ) {
    }

    public static function fromRequest(RegisterRequest $request): self
    {
        return new self(
            $request->validated('first_name'),
            $request->validated('last_name'),
            $request->validated('email'),
            $request->validated('phone'),
            $request->validated('password'),
        );
    }
}

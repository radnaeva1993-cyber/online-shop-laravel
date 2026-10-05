<?php

declare(strict_types=1);

namespace App\Dto\Auth;

use App\Http\Requests\Auth\UpdateProfileRequest;

class UpdateProfileDto
{
    public function __construct(
        public readonly ?string $firstName,
        public readonly ?string $lastName,
        public readonly ?string $email,
        public readonly ?string $phone,
    ) {
    }

    /**
     * Создать DTO из валидированного запроса
     */
    public static function fromRequest(UpdateProfileRequest $request): self
    {
        return new self(
            firstName: $request->input('first_name'),
            lastName: $request->input('last_name'),
            email: $request->input('email'),
            phone: $request->input('phone'),
        );
    }

    /**
     * Преобразовать DTO в массив для заполнения модели User
     */
    public function toArray(): array
    {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}

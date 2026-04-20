<?php

namespace App\DTOs;

class PlaceDetailsDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $url,
        public readonly ?string $photoUrl = null
    ) {}

    public static function fromArray(array $data, ?string $photoUrl = null): self
    {
        return new self(
            id: $data['id'],
            name: $data['displayName']['text'] ?? '',
            url: $data['googleMapsUri'] ?? '',
            photoUrl: $photoUrl
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'photo_url' => $this->photoUrl,
        ];
    }
}

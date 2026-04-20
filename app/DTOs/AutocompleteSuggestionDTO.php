<?php

namespace App\DTOs;

class AutocompleteSuggestionDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $text
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['placePrediction']['placeId'],
            text: $data['placePrediction']['text']['text']
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
        ];
    }
}

<?php

namespace App\Services;

use MoeMizrak\LaravelOpenrouter\Facades\LaravelOpenRouter;
use MoeMizrak\LaravelOpenrouter\DTO\ChatData;
use MoeMizrak\LaravelOpenrouter\DTO\MessageData;
use MoeMizrak\LaravelOpenrouter\Types\RoleType;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class AIService
{
    /**
     * Generate a professional AI response for a review using OpenRouter.
     */
    public function generateResponse(string $authorName, int $rating, string $content): string
    {
        try {
            $systemMessage = new MessageData(
                role: RoleType::SYSTEM,
                content: "Vous êtes un responsable de la réputation professionnelle pour une entreprise locale. Votre objectif est de générer des réponses polies, professionnelles et concises (max 3 phrases) aux avis des clients. Remerciez toujours le client, personnalisez la réponse en fonction de ses commentaires spécifiques et gardez un ton serviable. Si l'avis est négatif, soyez empathique et professionnel."
            );

            $userMessage = new MessageData(
                role: RoleType::USER,
                content: "Détails de l'avis :\nAuteur : {$authorName}\nNote : {$rating}/5\nContenu : \"{$content}\"\n\nGénérez une réponse parfaite à cet avis en français."
            );

            $chatData = new ChatData(
                messages: [$systemMessage, $userMessage],
                model: 'openai/gpt-oss-120b:free',
                max_tokens: 200,
                temperature: 0.7
            );

            $response = LaravelOpenRouter::chatRequest($chatData);

            // Accessing the content from the response choices DTO
            $generatedText = $response->choices[0]['message']['content'] ?? '';

            return trim($generatedText) ?: $this->getFallbackResponse($authorName, $rating);

        } catch (\Exception $e) {
            Log::error('OpenRouter Error: ' . $e->getMessage());
            return $this->getFallbackResponse($authorName, $rating);
        }
    }

    /**
     * Fallback response in case the AI fails (in French).
     */
    private function getFallbackResponse(string $authorName, int $rating): string
    {
        if ($rating >= 4) {
            return "Bonjour {$authorName}, merci beaucoup pour vos gentils mots ! Nous sommes ravis d'apprendre que vous avez passé un excellent moment chez nous. Au plaisir de vous revoir bientôt !";
        } elseif ($rating == 3) {
            return "Bonjour {$authorName}, merci pour votre retour. Nous apprécions votre note et utiliserons vos commentaires pour améliorer notre service.";
        } else {
            return "Bonjour {$authorName}, nous sommes sincèrement désolés d'apprendre votre expérience. Merci de nous avoir fait part de ce problème. Nous apprécions votre retour et nous engageons à corriger la situation.";
        }
    }
}

<?php
// app/Services/ImageGenerator.php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ImageGenerator
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/images/edits',
        ]);
    }

    public function generateFromSelfie(string $absolutePath, string $theme): ?string
    {
        $prompt = "Transform this selfie into a friendly, fun {$theme} party photo with vibrant lighting. Keep the person's identity recognizable and natural.";

        ini_set('max_execution_time', 600);

        $response = Http::withToken(config('services.openai.key'))
            ->asMultipart()
            ->timeout(600)
            ->post('https://api.openai.com/v1/images/edits', [
                [
                    'name'     => 'model',
                    'contents' => 'gpt-image-1',
                ],
                [
                    'name'     => 'image',
                    'contents' => fopen($absolutePath, 'r'),
                    'filename' => basename($absolutePath),
                ],
                [
                    'name'     => 'prompt',
                    'contents' => $prompt,
                ],
                [
                    'name'     => 'size',
                    'contents' => '1024x1024',
                ],
                [
                    'name'     => 'quality',
                    'contents' => 'medium',
                ],
            ]);

        // JSON dekódolása
        $data = $response->json();

        if (!isset($data['data'][0]['b64_json'])) {
            \Log::error('OpenAI image generation failed', ['response' => $data]);
            return null;
        }

        // Base64 dekódolás
        $imageData = base64_decode($data['data'][0]['b64_json']);

        // Fájlnév és mentés
        $filename = 'generated_' . time() . '.png';
        Storage::disk('public')->put("generated/$filename", $imageData);

        return asset("storage/generated/$filename");
    }

}

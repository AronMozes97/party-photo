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
        $prompt =
        <<<TXT
            Transform this selfie into a friendly, fun {$theme} event photo with vibrant, realistic lighting and natural skin rendering.

            Identity preservation (critical):
            - Keep the exact facial identity and geometry unchanged.
            - Preserve skin tone, eye color, hair color, hairline, facial hair, moles, freckles, and face shape.
            - Do not alter age, gender, ethnicity, or expression beyond a subtle smile if needed.
            - No face reshaping, no smoothing/beauty filters.

            Styling:
            - Add {$theme} event elements (props, decor, ambient lights) around the subject, not on the face.
            - Maintain the original pose and camera angle.
            - Photorealistic finish, no painterly or cartoon artifacts.

            Lighting & color:
            - Enhance lighting to feel like a lively event (neon/LED accents), but keep the face neutrally lit and true-to-life.
            - Avoid color cast on the skin.

            Composition:
            - Keep the head and shoulders fully visible and sharp.
            - Add background depth (bokeh / crowd / confetti) while keeping the face crisp.

            Negative constraints:
            - No face deformation, no plastic skin, no makeup changes, no eye enlargement, no jawline edits.
            - No blur on the face, no excessive smoothing, no AI-art textures.

            Output: a single photorealistic event photo at high quality.
        TXT;


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

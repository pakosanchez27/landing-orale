<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class OpenAiBlogGenerator
{
    public function generate(string $title, string $idea): array
    {
        $apiKey = (string) config('services.openai.api_key');
        $model = (string) config('services.openai.model', 'gpt-4.1');

        if ($apiKey === '') {
            throw new RuntimeException('No se ha configurado OPENAI_API_KEY.');
        }

        $prompt = <<<PROMPT
Genera el contenido completo de un articulo de blog profesional en espanol para una agencia digital.

Titulo base: {$title}
Idea base: {$idea}

Devuelve exclusivamente JSON valido con esta estructura exacta:
{
  "title": "string",
  "slug": "string-en-minusculas-y-guiones",
  "category": "string",
  "excerpt": "string de maximo 260 caracteres",
  "reading_time": "string, ejemplo: 6 minutos",
  "content_html": "html completo con varios parrafos, al menos 3 subtitulos h2, listas ul/ol cuando tenga sentido y cierre fuerte"
}

Reglas:
- El contenido debe ser amplio, util, bien estructurado y listo para publicarse.
- Usa solo HTML permitido para un articulo: p, h2, h3, ul, ol, li, strong, em, a.
- No uses markdown.
- El excerpt debe sonar editorial y claro.
- El slug debe ser corto y limpio.
- No incluyas texto fuera del JSON.
PROMPT;

        try {
            $response = Http::timeout(90)
                ->withToken($apiKey)
                ->post('https://api.openai.com/v1/responses', [
                    'model' => $model,
                    'input' => $prompt,
                ])
                ->throw();
        } catch (RequestException $exception) {
            $message = $exception->response?->json('error.message')
                ?: 'No fue posible comunicarse con OpenAI.';

            throw new RuntimeException($message, previous: $exception);
        }

        $responseJson = $response->json();
        $outputText = $this->extractOutputText($responseJson);

        if ($outputText === '') {
            Log::warning('OpenAI blog generator returned no parseable text.', [
                'response' => $responseJson,
            ]);

            throw new RuntimeException('OpenAI no devolvio contenido util para generar el blog.');
        }

        $cleanJson = trim($outputText);
        $cleanJson = preg_replace('/^```json\s*/', '', $cleanJson) ?? $cleanJson;
        $cleanJson = preg_replace('/^```\s*/', '', $cleanJson) ?? $cleanJson;
        $cleanJson = preg_replace('/\s*```$/', '', $cleanJson) ?? $cleanJson;

        $decoded = json_decode($cleanJson, true);

        if (!is_array($decoded)) {
            throw new RuntimeException('No se pudo interpretar la respuesta de OpenAI como JSON.');
        }

        return [
            'title' => (string) ($decoded['title'] ?? $title),
            'slug' => (string) ($decoded['slug'] ?? ''),
            'category' => (string) ($decoded['category'] ?? ''),
            'excerpt' => (string) ($decoded['excerpt'] ?? ''),
            'reading_time' => (string) ($decoded['reading_time'] ?? '5 minutos'),
            'content_html' => (string) ($decoded['content_html'] ?? ''),
        ];
    }

    private function extractOutputText(array $responseJson): string
    {
        $outputText = trim((string) data_get($responseJson, 'output_text', ''));

        if ($outputText !== '') {
            return $outputText;
        }

        $chunks = [];

        foreach ((array) data_get($responseJson, 'output', []) as $outputItem) {
            foreach ((array) data_get($outputItem, 'content', []) as $contentItem) {
                $text = trim((string) ($contentItem['text'] ?? ''));

                if ($text !== '') {
                    $chunks[] = $text;
                }
            }
        }

        if ($chunks !== []) {
            return trim(implode("\n", $chunks));
        }

        return '';
    }
}

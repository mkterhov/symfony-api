<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;

class TranslationsController
{
    protected array $translations = ["data" => ["wordElvish1" => "englishTranslation1", "wordElvish2" => "englishTranslation2", "wordElvish3" => "englishTranslation3", "wordElvish4" => "englishTranslation4", "wordElvish5" => "englishTranslation5", "wordElvish6" => "englishTranslation6", "wordElvish7" => "englishTranslation7", "wordElvish8" => "englishTranslation8", "wordElvish9" => "englishTranslation9", "wordElvish10" => "englishTranslation10"]];

    public function getTranslationAction(string $word): JsonResponse
    {
        return new JsonResponse(['success' => true, "data" => $this->translations['data'][$word]], 200);
    }

}
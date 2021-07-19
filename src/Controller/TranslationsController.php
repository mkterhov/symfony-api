<?php


namespace App\Controller;


use App\Model\Translation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TranslationsController extends AbstractController
{

    /**
     * @return \App\Model\Translation[]
     */
    public static function entries(): array
    {
        return [
            new Translation(1, "wordElvish1", "englishTranslation1"),
            new Translation(2, "wordElvish2", "englishTranslation2"),
            new Translation(3, "wordElvish3", "englishTranslation3"),
            new Translation(4, "wordElvish4", "englishTranslation4"),
            new Translation(5, "wordElvish5", "englishTranslation5"),
            new Translation(6, "wordElvish6", "englishTranslation6"),
            new Translation(7, "wordElvish7", "englishTranslation7"),
            new Translation(8, "wordElvish8", "englishTranslation8"),
            new Translation(9, "wordElvish9", "englishTranslation9"),
            new Translation(10, "wordElvish10", "englishTranslation10")
        ];
    }

    public
    function getTranslationAction(string $word): JsonResponse
    {
        $result = array_filter(self::entries(), static function (Translation $translation) use ($word) {
            return $translation->elvish === $word;
        });
        if (!$result) {
            throw new HttpException(422, "Can't find the requested translation!");
        }
        $match = $result[0];
        return new JsonResponse(['success' => true, "data" => ["id" => $match->id, $match->elvish => $match->english]], 200);
    }

}
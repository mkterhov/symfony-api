<?php


namespace App\Controller;


use App\Entity\Translation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

class TranslationsController extends AbstractController
{
    protected array $translations;

    public function __construct()
    {
        $this->populateTranslation();
    }

    public function populateTranslation(): void
    {
        $this->translations = [
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

    /**
     * @param string $word
     * @return JsonResponse
     * @Route("api/translations/{word}",methods={"GET"},name="get_translations")
     */
    public function getTranslationAction(string $word): JsonResponse
    {
        //
        $result = \array_filter($this->translations, static function (Translation $translation) use ($word) {
            return $translation->getElvish() === $word;
        });
        //more expressive conditions
        if (empty($result)) {
            throw new HttpException(Response::HTTP_NOT_FOUND, "Can't find the requested translation!");
        }
        $match = $result[0];
        return new JsonResponse(
            [
                'success' => true,
                "data" => ["id" => $match->getId(), 'elvish' => $match->getElvish(), 'english' => $match->getEnglish()]
            ],
            Response::HTTP_OK
        );
    }
}
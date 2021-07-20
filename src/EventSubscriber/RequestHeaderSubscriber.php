<?php


namespace App\EventSubscriber;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Serializer\Encoder\XmlEncoder;


class RequestHeaderSubscriber implements EventSubscriberInterface
{
    public function kernelRequest(ViewEvent $event)
    {
        $value = $event->getControllerResult();
        $requestAcceptType = $event->getRequest()->headers->get('accept');
        $response = new Response();

        if ($requestAcceptType === 'application/xml') {
            $encoder = new XmlEncoder();
            $xml = $encoder->encode($value,'xml');
            $response->headers->set('Content-Type', 'application/xml');
            $response = new  Response($xml);
            $event->setResponse($response);
            return;
        }

        $response->headers->set('Content-Type', 'application/json');
        $response = new  JsonResponse($value);
        $event->setResponse($response);
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => [
                ['kernelRequest', 5],
            ],
        ];
    }
}
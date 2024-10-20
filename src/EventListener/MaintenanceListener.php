<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Twig\Environment;

class MaintenanceListener
{
    private $maintenance;
    private $twig;

    public function __construct($maintenance, Environment $twig)
    {
        $this->maintenance = $maintenance;
        $this->twig = $twig;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        // Si le fichier .maintenance n'existe pas, on sort
        if (!file_exists($this->maintenance)) {
            return;
        }

        // Vérifier la présence du paramètre dans l'URL
        $request = $event->getRequest();
        if ($request->query->get('bypass') === '1') {
            return;
        }

        // Si le paramètre n'est pas présent, afficher la page de maintenance
        $event->setResponse(
            new Response(
                $this->twig->render('maintenance/maintenance.html.twig'),
                Response::HTTP_SERVICE_UNAVAILABLE
            )
        );
        
        // Stoppe le traitement des événements
        $event->stopPropagation();
    }
}
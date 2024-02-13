<?php

// src/Controller/RedirectController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class RedirectController extends AbstractController
{
    /**
     * @Route("/redirect", name="redirect_home")
     */
    public function redirectHome(): RedirectResponse
    {
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/external", name="redirect_external")
     */
    public function redirectExternal(): RedirectResponse
    {
        // Aquí puedes especificar la URL externa a la que deseas redirigir
        $externalUrl = 'https://www.ejemplo.com';
        return $this->redirect($externalUrl);
    }
}


<?php

// src/Controller/GreetingController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GreetingController extends AbstractController
{
    /**
     * @Route("/greet/{nombre?}", name="greet")
     */
    public function greet($nombre = null): Response
    {
        // Verificar si se proporcionó un nombre
        if ($nombre) {
            // Validar el nombre para asegurarse de que solo contenga caracteres alfabéticos
            if (!preg_match('/^[A-Za-z]+$/', $nombre)) {
                throw $this->createNotFoundException('El nombre solo puede contener caracteres alfabéticos.');
            }

            // Saludo personalizado con el nombre proporcionado
            $message = '¡Hola, ' . $nombre . '!';
        } else {
            // Saludo genérico si no se proporciona un nombre
            $message = '¡Hola a todos!';
        }

        return $this->render('greeting/greet.html.twig', [
            'message' => $message,
        ]);
    }
}


<?php

// src/Controller/ProductoController.php
use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductoController extends AbstractController
{
    /**
     * @Route("/producto/nuevo", name="producto_nuevo")
     */
    public function nuevo(EntityManagerInterface $entityManager): Response
    {
        // Creamos una instancia de Producto
        $producto = new Producto();
        $producto->setName('Nombre del producto');
        $producto->setDescription('Descripción del producto');
        $producto->setPrice(9.99);

        // Obtenemos el EntityManager y guardamos el producto
        $entityManager->persist($producto);
        $entityManager->flush();

        return new Response('Producto guardado con ID: '.$producto->getId());
    }

    /**
     * @Route("/productos", name="productos")
     */
    public function mostrarProductos(): Response
    {
        $productos = $this->getDoctrine()->getRepository(Producto::class)->findAll();

        return $this->render('producto/listado.html.twig', [
            'productos' => $productos,
        ]);
    }

    /**
     * @Route("/producto/{id}", name="producto_mostrar")
     */
    public function mostrarProducto($id): Response
    {
        $producto = $this->getDoctrine()->getRepository(Producto::class)->find($id);

        if (!$producto) {
            throw $this->createNotFoundException('Producto no encontrado');
        }

        return $this->render('producto/detalle.html.twig', [
            'producto' => $producto,
        ]);
    }
}

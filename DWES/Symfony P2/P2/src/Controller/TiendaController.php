<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;


class TiendaController extends AbstractController
{
    #[Route('/tienda', name: 'app_tienda')]

    public function tienda (ProductRepository $productRepository): Response
    {
        $productos = $productRepository->findAll();

        return $this->render('tienda/tienda.html.twig', [
            'productos' => $productos,
        ]);
    }

    #[Route('/producto/{id}', name:'app_detalles_producto')]
    public function detallesProducto($id, ProductRepository $productRepository): Response
    {
        $producto = $productRepository->find($id);

        if (!$producto) {
            throw $this->createNotFoundException('Producto no encontrado con el ID: '.$id);
        }

        return $this->render('tienda/detalles_producto.html.twig', [
            'producto' => $producto,
        ]);
    }

    #[Route('/carrito', name: 'app_carrito_compra')]

    public function carritoCompras(): Response
    {
        return $this->render('tienda/carrito_compra.html.twig');

    }




}









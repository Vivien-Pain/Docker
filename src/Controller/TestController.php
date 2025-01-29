<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

/* indique l'utilisation du bon bundle pour gérer nos routes */
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/* le nom de la classe doit être cohérent avec le nom du fichier */
class TestController
{
    #[Route('')]
    public function home(): Response
    {
        $htmlContent = '<!DOCTYPE html>
        <html>
        <head>
            <title>Welcome</title>
            <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 800px;
                margin: 50px auto;
                background: #fff;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #333;
            }
            p {
                color: #666;
            }
            </style>
        </head>
        <body>
            <div class="container">
            <h1>Welcome to our site!</h1>
            <p>This is a minimalistic but well-formed HTML page.</p>
            </div>
        </body>
        </html>';

        $response = new Response($htmlContent);
        return $response;
    }
}
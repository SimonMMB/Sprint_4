<?php

namespace App\Exceptions;


use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;




class Handler extends ExceptionHandler
{

    

    

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            // Conservar todos los datos de sesión
            $session = $request->session();
            $sessionData = $session->all();
            
            $response = response()->view('errors.404', [
                'isAuth' => auth()->check()
            ], 404);
            
            // Restaurar la sesión completa en la respuesta
            foreach ($sessionData as $key => $value) {
                $response->withSession([$key => $value]);
            }
            
            return $response;
        }
    
        return parent::render($request, $exception);
    }

}
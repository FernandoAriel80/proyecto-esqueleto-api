<?php
namespace App\Core;

class Request
{
    private $data = [];
    private $headers = [];

    public function __construct()
    {
        // Capturar datos de la solicitud
        $this->captureJson();
        $this->captureHeaders();
    }

    /**
     * Captura datos JSON del cuerpo de la solicitud
     */
    private function captureJson()
    {
        // Solo decodifica JSON si el Content-Type es application/json
        if ($this->getContentType() === 'application/json') {
            $input = file_get_contents('php://input');
            $decoded = json_decode($input, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $this->data = $decoded; // Almacena los datos decodificados
            }
        }
    }

    /**
     * Captura los encabezados de la solicitud
     */
    private function captureHeaders()
    {
        $this->headers = getallheaders();
    }

    /**
     * Devuelve un dato específico de la solicitud
     */
    public function input($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    /**
     * Devuelve todos los datos de la solicitud
     */
    public function all()
    {
        return $this->data;
    }

    /**
     * Verifica si un campo está presente
     */
    public function has($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * Obtiene el tipo de contenido de la solicitud
     */
    public function getContentType()
    {
        return $_SERVER['CONTENT_TYPE'] ?? '';
    }

    /**
     * Obtiene un encabezado específico
     */
    public function header($key)
    {
        return $this->headers[$key] ?? null;
    }

    /**
     * Verifica el método HTTP
     */
    public function isMethod($method)
    {
        return strtoupper($_SERVER['REQUEST_METHOD']) === strtoupper($method);
    }
}

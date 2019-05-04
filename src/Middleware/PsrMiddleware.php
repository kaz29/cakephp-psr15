<?php
namespace kaz29\CakePsr15\Middleware;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;

class PsrMiddleware implements RequestHandlerInterface
{
    /**
     * @var callable
     */
    private $next;

    /**
     * @var ResponseInterface
     */
    private $response;

    public function __construct(MiddlewareInterface $middleware)
    {
        $this->middleware = $middleware;
    }

    public function __invoke($request, $response, $next)
    {
        $this->response = $response;
        $this->next = $next;

        return $this->middleware->process($request, $this);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return ($this->next)($request, $this->response);
    }
}

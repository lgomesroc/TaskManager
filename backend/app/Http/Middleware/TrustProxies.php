<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Middleware\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string|null
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_AWS_ELB;

    /**
     * Constructor for the middleware.
     *
     * @param  array|string|null  $proxies
     * @return void
     */
    public function __construct($proxies = null)
    {
        // Atribui os proxies de acordo com o parâmetro passado ou mantém o valor padrão
        $this->proxies = $proxies;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        // Define os proxies confiáveis, se necessário
        if ($this->proxies !== null) {
            $this->proxies = $this->proxies;
        }

        return parent::handle($request, $next);
    }
}

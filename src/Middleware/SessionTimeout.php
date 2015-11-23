<?php

namespace Unicodeveloper\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class SessionTimeout {

    /**
     * [$session description]
     * @var [type]
     */
    protected $session;

    /**
     * Time for user to remain active, set to 900secs( 15minutes )
     * @var timeout
     */
    protected $timeout = 900;

    public function __construct(Store $session){
        $this->sessiontimeout = $session;
        $this->setConfigOptions();
    }

    private function setConfigOptions()
    {
        $this->lifetime    = Config::get('session.lifetime');
        $this->labelInfo   = Config::get('timeout.labelInfo');
        $this->redirectUrl = Config::get('timeout.redirectUrl');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(! $this->session->has('lastActivityTime'))
        {
            $this->session->put('lastActivityTime', time());
        }
        else if( time() - $this->session->get('lastActivityTime') > $this->getTimeOut())
        {
            $this->session->forget('lastActivityTime');
            Auth::logout();

            return redirect($this->redirectUrl)->with([ $this->labelInfo => 'You have been inactive for '. $this->timeout/60 .' minutes ago.']);
        }

        $this->session->put('lastActivityTime',time());
        return $next($request);
    }

    /**
     *  Get timeout from laravel default's, if it's not set/empty, set timeout to 15 minutes
     * @return int
     */
    private function getTimeOut()
    {
        return  ($this->lifetime) ?: $this->timeout;
    }

}
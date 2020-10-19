<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Token\AccessTokenInterface;

class GoogleOAuth2Middleware
{
    const GOOGLE_ACCESS_TOKEN = 'google.access-token';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $accessToken = static::token();

        if ($request->has('url'))
            session()->put('data.url', $request->input('url'));

        if (empty($accessToken) || $accessToken->hasExpired()) {
            $code = $request->input('code');

            $provider = new Google([
                'clientId' => env('GOOGLE_CLIENT_ID'),
                'clientSecret' => env('GOOGLE_CLIENT_SECRET'),
                'redirectUri' => route('sheets.open'),
            ]);

            if (empty($code)) {
                return redirect()->to($provider->getAuthorizationUrl(['prompt' => 'consent']));
            } else {
                $accessToken = $provider->getAccessToken('authorization_code', compact('code'));
            }
        }

        session()->put(static::GOOGLE_ACCESS_TOKEN, $accessToken);

        return $next($request);
    }

    /**
     * @return AccessTokenInterface
     */
    public static function token()
    {
        return session(static::GOOGLE_ACCESS_TOKEN);
    }
}

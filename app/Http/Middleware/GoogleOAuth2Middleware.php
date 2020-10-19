<?php

namespace App\Http\Middleware;

use Closure;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Token\AccessTokenInterface;

class GoogleOAuth2Middleware
{
    const GOOGLE_ACCESS_TOKEN = 'google.access-token';
    const GOOGLE_STATE = 'google.state';

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
            session()->put(static::GOOGLE_ACCESS_TOKEN, null);

            $provider = new Google([
                'clientId' => env('GOOGLE_CLIENT_ID'),
                'clientSecret' => env('GOOGLE_CLIENT_SECRET'),
                'redirectUri' => route('google.callback'),
            ]);

            $error = $request->input('error');
            $code = $request->input('code');
            $state = $request->input('state');

            if (filled($error)) {

                abort(400, $error);

            }

            else if (blank($code)) {

                session()->put(static::GOOGLE_STATE, $state);
                return redirect()->to($provider->getAuthorizationUrl(['prompt' => 'consent']));

            }

            else if (filled($state) || ($state !== session(static::GOOGLE_STATE))) {

                session()->remove(static::GOOGLE_STATE);
                abort(400, "Invalid OAuth2 state");

            }

            else {

                $accessToken = $provider->getAccessToken('authorization_code', compact('code'));
                session()->put(static::GOOGLE_ACCESS_TOKEN, $accessToken);

            }
        }

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

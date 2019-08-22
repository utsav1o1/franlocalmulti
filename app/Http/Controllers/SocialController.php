<?php

namespace App\Http\Controllers;

use Auth;
use Socialite;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class SocialController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    private $socialProviders = ['google', 'facebook'];

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * The User repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        if (!in_array($provider, $this->socialProviders)) {
            abort(404);
        }

        return Socialite::driver($provider)->redirect();
    }


    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        if (!in_array($provider, $this->socialProviders)) {
            abort(404);
        }

        // API CALL - GET USER FROM PROVIDER
        try {

            $user = Socialite::driver($provider)->user();

            if (!$user) {
                return redirect()->back()
                    ->withWarningMessage('Unknown error. Please try again in a few minutes.');
            }

            // check whether user have given the permission to email or not
            if (empty($user->getEmail())) {
                return Socialite::driver($provider)->with(['auth_type' => 'rerequest'])->redirect();
            }

            // check user exists
            $userExists = $this->users->checkExistByProvider($provider, $user->getId());

            if (empty($userExists)) {
                $userData = [];
                $userData['full_name'] = $user->getName();
                $userData['email_address'] = $user->getEmail();
                $userData['provider'] = $provider;
                $userData['provider_id'] = $user->getId();
                $userData['avatar'] = $user->getAvatar();

                $createUser = $this->users->create($userData);
                if ($createUser) {
                    Auth::guard('user')->loginUsingId($createUser->id, true);
                    return redirect()->route('home')
                        ->withSuccessMessage('Login Success ,Welcome ' . $createUser->full_name);

                } else {
                    return redirect()->back()
                        ->withWarningMessage('Unknown error. The social network API doesn\'t work.');
                }

            } else {
                if (Auth::guard('user')->loginUsingId($userExists->id, true)) {
                    return redirect()->route('home')
                        ->withSuccessMessage('Login Success ,Welcome ' . $userExists->full_name);
                } else {

                    return redirect()->back()
                        ->withWarningMessage('Error on user\'s login. Please try again in a few minutes.');
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->withWarningMessage('Unknown error. The social network API doesn\'t work.');
        }
    }
}

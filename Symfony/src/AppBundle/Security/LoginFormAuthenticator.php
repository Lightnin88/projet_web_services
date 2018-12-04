<?php
namespace AppBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
//use AppBundle\Repository\UserRepository;

class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
	//private $userRepository;

	/*public function __construct(UserRepository $userRepository)
    {
		$this->userRepository = $userRepository;
    }*/
    public function supports(Request $request)
    {
          /*  return $request->attributes->get('_route') === 'app_login'
            && $request->isMethod('POST'); */
			
			
    }
    public function getCredentials(Request $request)
    {
         /*      return [
            'username' => $request->request->get('username'),
            'password' => $request->request->get('password'),
        ]; */
    }
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
      // return $this->userRepository->findOneBy(['username' => $credentials['username']]);
	   
    }
    public function checkCredentials($credentials, UserInterface $user)
    {
        //  die($user);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        //TODO
    }

	protected function getLoginUrl()
    {
        // TODO
    }
 
}

?>

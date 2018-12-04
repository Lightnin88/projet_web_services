<?php
namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $apiKey;

	 /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

	public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

	public function getPassword()
    {
        return $this->password;
    }

	public function getApiKey()
    {
        return $this->apiKey;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getSalt()
    {
    }
    public function eraseCredentials()
    {
    }

    public function setUsername($_username)
    {
        $this->username = $_username;
    }

	public function setPassword($_password)
    {
        $this->password = $_password;
    }


	public function setId($_id)
    {
        return $this->id = $_id;
    }

	public function setApiKey($_apiKey)
    {
        return $this->apiKey = $_apiKey;
    }
}
?>
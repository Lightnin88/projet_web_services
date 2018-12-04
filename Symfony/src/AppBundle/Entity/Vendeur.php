<?php


namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;


/**

 * @ORM\Entity

 * @ORM\Table()

 *

 */

class Vendeur

{

    /**

     * @ORM\Column(type="integer")

     * @ORM\Id

     * @ORM\GeneratedValue(strategy="AUTO")

     */

    private $id;


    /**

     * @ORM\Column

     */

    private $name;


    /**

     * @ORM\Column

     */

    private $adresse;


    /**

     * @ORM\OneToMany(targetEntity="Article", mappedBy="vendeur", cascade={"persist"})

     */

    private $articles;


    public function __construct()

    {

        $this->articles = new ArrayCollection();

    }


    public function getName()

    {

        return $this->name;

    }


    public function setName($name)

    {

        $this->name = $name;

    }


    public function getAdresse()

    {

        return $this->adresse;

    }


    public function setAdresse($adresse)

    {

        $this->adresse = $adresse;

    }


    public function getArticles()

    {

        return $this->articles;

    }

}
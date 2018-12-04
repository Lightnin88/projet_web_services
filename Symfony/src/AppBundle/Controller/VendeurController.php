<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Vendeur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;


class VendeurController extends Controller

{

    /**

     * @Route("/vendeurs/{id}", name="vendeur_show")

     */

    public function showAction(Vendeur $vendeur)

    {

        $data =  $this->get('serializer')->serialize($vendeur, 'json');


        $response = new Response($data);

        $response->headers->set('Content-Type', 'application/json');


        return $response;

    }

        /**

     * @Route("/vendeurs", name="vendeur_create")

     * @Method({"POST"})

     */

    public function createAction(Request $request)

    {

        $data = $request->getContent();

        $vendeur = $this->get('serializer')->deserialize($data, 'AppBundle\Entity\Vendeur', 'json');

        $em = $this->getDoctrine()->getManager();

        $em->persist($vendeur);

        $em->flush();


        return new Response('', Response::HTTP_CREATED);

    }

}
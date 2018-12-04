<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class ArticleController extends Controller

{


	  /**

     * @Route("/articles/create", name="article_create")

     * @Method({"POST"})

     */

	    public function createAction()

    {
		
		$article = new Article();
		$article->setTitle("Titre 2");
		$article->setContent("Blabla");
		$article->setVendeur(1);
		$data =  $this->get('serializer')->serialize($article, 'json');
		$request = new Request($data);
		$request->headers->set('Content-Type', 'application/json');
		$this->createActionRequest($request);



    }

    /**

     * @Route("/articles", name="api_article_create")

     * @Method({"POST"})

     */
    
    public function createActionRequest(Request $request)

    {
		
        $data = $request->getContent();

        $article = $this->get('serializer')->deserialize($data, 'AppBundle\Entity\Article', 'json');

        $em = $this->getDoctrine()->getManager();

        $em->persist($article);

        $em->flush();


        return new Response('', Response::HTTP_CREATED);

    }

    /**

     * @Route("/articles/{id}", name="article_show")

     */

    public function showAction(Article $article)

    {

        $data =  $this->get('serializer')->serialize($article, 'json');


        $response = new Response($data);

        $response->headers->set('Content-Type', 'application/json');


        return $response;

    }

    



    /**
     * @Route("/api_articles_list", name="api_articles_list")
     * @Method({"GET"})
     */

    public function showActionListSerialize()

    {
		
        $articles = $this->getDoctrine()->getRepository('AppBundle:Article')->findAll();
		        
        $data =  $this->get('serializer')->serialize($articles, 'json');

        $response = new Response($data);

        $response->headers->set('Content-Type', 'application/json');


        return $response;

	

    }

    /**
     * @Route("/api_articles_list/articles_list", name="articles_list")
     * @Method({"GET"})
     */
    public function showActionList()

    {

       
        $articles = json_decode($this->showActionListSerialize()->getContent(), true, 512,JSON_OBJECT_AS_ARRAY);
		return $this->render('listeArticles.html.twig', array('articles' => $articles));

    }
        /**

     * @Route("/article_delete/{id}", name="article_delete")
     * @Method({"POST"})
     */

    public function deleteAction(Request $request)

    {

        $article = $this->getDoctrine()->getRepository('AppBundle:Article')->find($request->get('id'));

        $em = $this->getDoctrine()->getManager();
        
        if ($article) {
            $em->remove($article);
            $em->flush();
        }

   

    }


}
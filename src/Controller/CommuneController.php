<?php
/**
 * Created by IntelliJ IDEA.
 * User: sebastien.berruer
 * Date: 26/07/2018
 * Time: 11:58
 */

namespace App\Controller;


use App\Entity\Commune;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Class CommuneController
 * @package App\Controller
 */
class CommuneController extends FOSRestController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Get(path = "/communes")
     */
    public function getCommunes()
    {
        $communes = $this->entityManager->getRepository(Commune::class)->findAll();

        return $this->view($communes, Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return \FOS\RestBundle\View\View
     *
     * @Post(path = "communes")
     * @ParamConverter("commune", converter="fos_rest.request_body")
     */
    public function postCommune(Commune $commune) {

        //dump($request);

//        $commune = new Commune();
//        $commune->setNom($request->get('nom'));
//        $commune->setCodePostal($request->get('codePostal'));

        $this->entityManager->persist($commune);
        $this->entityManager->flush();

        return $this->view(null,Response::HTTP_CREATED);
    }

}
<?php
namespace App\Controller\Entities;

use App\Entity\Arrosage;
use App\Entity\Tondeuse;
use App\Repository\TondeuseRepository;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class TondeuseController extends AbstractController
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    private $context;
    private $em;


    /**
     * constructor
     */
    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->context = __CLASS__ . " ";

        $this->logger->debug("" . $this->context);

        $this->em = $entityManager;

        $this->tondeuseRepository = $this->em->getRepository(Tondeuse::class);
    }


    /**
     * Retrieves one tondeuse
     */
    public function getOneTondeuse(int $id)
    {
        /** @var Tondeuse $tondeuse */
        $tondeuse = $this->tondeuseRepository->findOneByTondeuseId($id);

        if($tondeuse) {

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($tondeuse, 'json', [
                'attributes' => ['tondeuseId','nom','capteurBatterie','statut'],

                'circular_reference_handler' => function ($object) {
                    return $object->getJardinId();
                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de tondeuse trouvée !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de tondeuse trouvée');
        }

    }

    /**
     * Retrieves all tondeuses
     */
    public function getAllTondeuses()
    {
        /** @var Tondeuse $tondeuses */
        $tondeuses = $this->tondeuseRepository->findAll();

        if($tondeuses) {
            $this->logger->debug("Il y a " . count($tondeuses) . "tondeuse(s)." );

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($tondeuses, 'json', [
                'attributes' => ['tondeuseId','nom','capteurBatterie','statut'],

                'circular_reference_handler' => function ($object) {
                    return $object->getJardinId();
                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de tondeuse trouvée !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de tondeuse trouvée');
        }

    }

    /**
     * Delete one tondeuse
     */
    public function getDeleteTondeuse(int $id)
    {
        /** @var Tondeuse $tondeuse */
        $tondeuse = $this->tondeuseRepository->findOneByTondeuseId($id);
        $this->em->remove($tondeuse);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(200);
        return $response;        
    }

}

<?php
namespace App\Controller\Entities;

use App\Entity\Arrosage;
use App\Repository\ArrosageRepository;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ArrosageController extends AbstractController
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

        $this->arrosageRepository = $this->em->getRepository(Arrosage::class);
    }


    /**
     * Retrieves one arrosage
     * @Route("/onearrosage/{id}", methods={"GET", "POST"})
     */
    public function getOneArrosage(int $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Arrosage $arrosage */
        $arrosage = $entityManager->getRepository(Arrosage::class)->findOneByArrosageId($id);

        if($arrosage) {

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($arrosage, 'json', [
                'circular_reference_handler' => function ($object) {
                    return $object->getJardinId();
                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de système d'arrosage trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de système d\'arrosage trouvé');
        }

    }

    /**
     * Retrieves all arrosages
     * @Route("/allarrosages", methods={"GET", "POST"})
     */
    public function getAllArrosage()
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Arrosage $arrosages */
        $arrosages = $entityManager->getRepository(Arrosage::class)->findAll();

        if($arrosages) {
            $this->logger->debug("Il y a " . count($arrosages) . "réseaux d'arrosages." );

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($arrosages, 'json', [
                'circular_reference_handler' => function ($object) {
                    return $object->getJardinId();
                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de système d'arrosage trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de système d\'arrosage trouvé');
        }

    }

}

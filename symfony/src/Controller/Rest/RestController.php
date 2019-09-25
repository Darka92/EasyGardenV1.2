<?php
namespace App\Controller\Rest;

use App\Entity\Jardin;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\JardinRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Psr\Log\LoggerInterface;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Controller\Entities\UserController;
use App\Controller\Entities\JardinController;
use App\Controller\Entities\ArrosageController;
use App\Controller\Entities\EclairageController;
use App\Controller\Entities\BassinController;
use App\Controller\Entities\EquipementController;
use App\Controller\Entities\PortailController;
use App\Controller\Entities\TondeuseController;
use Doctrine\ORM\EntityManagerInterface;


/**
 * Class RestController
 * @package App\Controller\Rest
 * @Route("/user")
 */
class RestController extends AbstractFOSRestController
{

    private $em;
    private $logger;
    private $context;

    private $uc;
    private $jc;
    private $ac;
    private $ec;
    private $bc;
    private $eqc;
    private $tc;
    private $pc;


    /**
     * constructor
     */
    public function __construct(LoggerInterface $logger, EntityManagerInterface $entityManager) {

        $this->logger = $logger;
        $this->context = __CLASS__ . " ";

        $this->logger->debug("" . $this->context);

        $this->em = $entityManager;

        $this->uc = new UserController($this->em, $this->logger);
        $this->jc = new JardinController($this->em, $this->logger);
        $this->ac = new ArrosageController($this->em, $this->logger);
        $this->ec = new EclairageController($this->em, $this->logger);
        $this->bc = new BassinController($this->em, $this->logger);
        $this->eqc = new EquipementController($this->em, $this->logger);
        $this->tc = new TondeuseController($this->em, $this->logger);
        $this->pc = new PortailController($this->em, $this->logger);
    }


    /**
     * Retrieves oneUserController
     * @Route("/oneusercontroller/{id}", methods={"GET", "POST"})
     */
    public function oneUserController(int $id) {

        return $this->uc->getOneUser($id);
    }

    /**
     * Retrieves allUsersController
     * @Route("/alluserscontroller/", methods={"GET", "POST"})
     */
    public function allUsersController() {

        return $this->uc->getAllUsers();
    }



    /**
     * Retrieves oneJardinController
     * @Route("/onejardincontroller/{id}", methods={"GET", "POST"})
     */
    public function oneJardinController(int $id) {

        return $this->jc->getOneJardin($id);
    }

    /**
     * Retrieves allJardinsController
     * @Route("/alljardinscontroller/", methods={"GET", "POST"})
     */
    public function allJardinsController() {

        return $this->jc->getAllJardins();
    }



    /**
     * Retrieves oneArrosageController
     * @Route("/onearrosagecontroller/{id}", methods={"GET", "POST"})
     */
    public function oneArrosageController(int $id) {

        return $this->ac->getOneArrosage($id);
    }

    /**
     * Retrieves allArrosagesController
     * @Route("/allarrosagescontroller/", methods={"GET", "POST"})
     */
    public function allArrosagesController() {

        return $this->ac->getAllArrosages();
    }



    /**
     * Retrieves oneEclairageController
     * @Route("/oneeclairagecontroller/{id}", methods={"GET", "POST"})
     */
    public function oneEclairageController(int $id) {

        return $this->ec->getOneEclairage($id);
    }

    /**
     * Retrieves allEclairagesController
     * @Route("/alleclairagescontroller/", methods={"GET", "POST"})
     */
    public function allEclairagesController() {

        return $this->ec->getAllEclairages();
    }



    /**
     * Retrieves oneBassinController
     * @Route("/onebassincontroller/{id}", methods={"GET", "POST"})
     */
    public function oneBassinController(int $id) {

        return $this->bc->getOneBassin($id);
    }

    /**
     * Retrieves allBassinsController
     * @Route("/allbassinscontroller/", methods={"GET", "POST"})
     */
    public function allBassinsController() {

        return $this->bc->getAllBassins();
    }


    /**
     * Retrieves oneEquipementController
     * @Route("/oneequipementcontroller/{id}", methods={"GET", "POST"})
     */
    public function oneEquipementController(int $id) {

        return $this->eqc->getOneEquipement($id);
    }

    /**
     * Retrieves allEquipementsController
     * @Route("/allequipementscontroller/", methods={"GET", "POST"})
     */
    public function allEquipementsController() {

        return $this->eqc->getAllEquipements();
    }



    /**
     * Retrieves oneTondeuseController
     * @Route("/onetondeusecontroller/{id}", methods={"GET", "POST"})
     */
    public function oneTondeuseController(int $id) {

        return $this->tc->getOneTondeuse($id);
    }

    /**
     * Retrieves allTondeusesController
     * @Route("/alltondeusescontroller/", methods={"GET", "POST"})
     */
    public function allTondeusesController() {

        return $this->tc->getAllTondeuses();
    }



    /**
     * Retrieves onePortailController
     * @Route("/oneportailcontroller/{id}", methods={"GET", "POST"})
     */
    public function onePortailController(int $id) {

        return $this->pc->getOnePortail($id);
    }

    /**
     * Retrieves allPortailsController
     * @Route("/allportailscontroller/", methods={"GET", "POST"})
     */
    public function allPortailsController() {

        return $this->pc->getAllPortails();
    }

}

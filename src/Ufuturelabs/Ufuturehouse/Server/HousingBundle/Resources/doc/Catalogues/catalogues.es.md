Catálogos
=========
Los catálogos son unas entidades que definen unos valores por defecto, por ejemplo, el tipo de construcción.

Catálogos actuales
----------------------

 - Tipo aire acondicionado
 - Tipo de construcción
 - Tipo de tendedero
 - Estado de conservación
 - Estado del portal
 - Clase de emisiones
 - Clase energética
 - Amueblado
 - Tipo de jardín
 - Distribución de la calefacción
 - Tipo de caliefacción
 - Altura
 - Tipo de agua caliente
 - Calificación de la vivienda
 - Tipo de cocina
 - Estado nueva construcción
 - Orientación
 - Tipo plazas de aparacamiento

Creación
----------
Para crear un catálogo nuevo hay que seguir los siguientes pasos:

 1. Crear una entidad nueva que descienda de `Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\Catalogue` con las siguientes características:

  ```php
  <?php

  namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue;

  use Doctrine\ORM\Mapping as ORM;

  /**
   * @ORM\Entity()
   */
  class NewBuildingStatusCatalogue extends Catalogue
  {
      /** @param string|null $value */
      public function __construct($value = null)
      {
          parent::__construct($value);
      }
  }
  ```
  
 2. Añadir el catálogo al `DiscriminatorMap` de la clase `Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\Catalogue` para que el catálogo aparezca en la base de datos:
 
 ```php
 <?php

 namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue;
 
 use Doctrine\ORM\Mapping as ORM;
 
 /**
  * @ORM\Entity()
  * @ORM\Table(name="housings_catalogues")
  * @ORM\InheritanceType("SINGLE_TABLE")
  * @ORM\DiscriminatorColumn(name="type", type="string")
  * @ORM\DiscriminatorMap({
  *      "air_conditioning_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\AirConditioningTypeCatalogue",
  *      "building_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\BuildingTypeCatalogue",
  *      "clothes_line"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ClothesLineCatalogue",
  *      "conservation_status"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ConservationStatusCatalogue",
  *      "doorway_status"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\DoorwayStatusCatalogue",
  *      "emissions_class"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\EmissionsClassCatalogue",
  *      "energy_class"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\EnergyClassCatalogue",
  *      "furnished"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\FurnishedCatalogue",
  *      "garden_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\GardenTypeCatalogue",
  *      "heating_distribution"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeatingDistributionCatalogue",
  *      "heating_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeatingTypeCatalogue",
  *      "hot_water_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HotWaterTypeCatalogue",
  *      "housing_category"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HousingCategoryCatalogue",
  *      "height"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\HeightCatalogue",
  *      "kitchen_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\KitchenTypeCatalogue",
  *      "new_building_status"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\NewBuildingStatusCatalogue",
  *      "orientation"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\OrientationCatalogue",
  *      "parking_space_type"="Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\ParkingSpaceTypeCatalogue"
  * })
  */
 class Catalogue
 {
   	...
 }
 ```
 
 3. Crear los FixturesData del catálogo con etiquetas para traducir si es necesaria la traducción:
 
 ```php
 <?php
 
 namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM;

 use Doctrine\Common\DataFixtures\FixtureInterface;
 use Doctrine\Common\Persistence\ObjectManager;
 use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Entity\Catalogue\BuildingTypeCatalogue;
 use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Util\CatalogueUtil;
 
 class LoadNewBuildingStatusCatalogueData implements FixtureInterface
 {
     /** {@inheritDoc} */
     public function load(ObjectManager $manager)
     {
         $catalogues = array(
             new NewBuildingStatusCatalogue('catalogue.new_building_status.in_short'),
             new NewBuildingStatusCatalogue('catalogue.new_building_status.on_building'),
             new NewBuildingStatusCatalogue('catalogue.new_building_status.on_project'),
         );
         
         CatalogueUtil::createCatalogues($catalogues, $manager);
         
         $manager->flush();
     }
 }
 ```
 
 4. Ejecutar el comando `php app/console doctrine:fixtures:load --fixtures=src\Ufuturelabs\Ufuturehouse\Server\HousingBundle\DataFixtures\ORM` esto purgará la base de datos, es decir, la borrará enterá. NO SE DEBE EJECUTAR EN UN ENTORNO DE PRODUCCIÓN.
 
 5. Crear los tipos de datos para los formularios similar al siguiente:
 
 ```php
 <?php
 
 namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Catalogue;

 use Doctrine\ORM\EntityManager;
 use Symfony\Component\OptionsResolver\OptionsResolverInterface;
 
 class NewBuildingStatusCatalogueType extends AbstractCatalogueType
 {
     /**
      * @param EntityManager $em
      */
     public function __construct(EntityManager $em)
     {
         parent::__construct($em);
     }
 
     /** {@inheritdoc} */
     public function setDefaultOptions(OptionsResolverInterface $resolver)
     {
         $choices = $this->em->getRepository('HousingBundle:Catalogue\NewBuildingStatusCatalogue')->findAll();
         
         $resolver->setDefaults(array(
             'choices' => $choices,
         ));
     }
     
     /** {@inheritdoc} */
     public function getParent()
     {
         return parent::getParent();
     }
     
     /** {@inheritdoc} */
     public function getName()
     {
         return parent::getName().'_new_building_status';
     }
 }
 ```
 
 8. Añadir el tipo de dato como servicio:
 
 ```yaml
 # src/Ufuturelabs/Ufuturehouse/Server/HousingBundle/Resources/config/services.yml
 services:
     ...
     ufuturehouse.form.type.catalogue.new_building_status:
         class: Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Catalogue\NewBuildingStatusCatalogueType
             arguments: [@doctrine.orm.entity_manager]
             tags:
                 - { name: form.type, alias: catalogue_new_building_status }
 ```
 
 7. Añadir al fichero `src/Ufuturelabs/Ufuturehouse/Server/HousingBundle/Resources/views/Form/fields.html.twig` las siguientes líneas cambiando el nombre del catálogo:
 
 ```twig
 {% block catalogue_new_building_status_widget %}
     {{ block('catalogue_widget') }}
 {% endblock %}
 ```
 
 8. Paso opcional. Crear test:
 
 ```php
 <?php
 namespace Ufuturelabs\Ufuturehouse\Server\HousingBundle\Tests\Form\Type\Catalogue;
 
 use Doctrine\ORM\EntityManager;
 use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
 use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Catalogue\AirConditioningTypeCatalogueType;
 use Ufuturelabs\Ufuturehouse\Server\HousingBundle\Form\Type\Catalogue\NewBuildingStatusCatalogueType;
 
 class NewBuildingStatusCatalogueTypeTest extends KernelTestCase
 {
     /** @var EntityManager $em */
     private $em;
     
     public function setUp()
     {
         self::bootKernel();
         $this->em = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');
     }
     
     public function testCreateType()
     {
         $catalogueType = new NewBuildingStatusCatalogueType($this->em);
         $catalogues = $this->em->getRepository('HousingBundle:Catalogue\NewBuildingStatusCatalogue')->findAll();
         
         $this->assertNotCount(0, $catalogues);
         $this->assertEquals('choice', $catalogueType->getParent());
         $this->assertEquals('catalogue_new_building_status', $catalogueType->getName());
     }
 }
 ```
 
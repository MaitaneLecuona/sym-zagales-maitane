<?php

namespace App\DataFixtures;

use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actividades;
use App\Entity\Usuario;
use App\Entity\Categoria;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0;$i<3;$i++){
            $actividadFaker = Faker\Factory::create();
            
            //Categoria
            $categoria = new Categoria;
            $categoria->setDescripcion("Campamento de un día");
                   
            $manager->persist($categoria);
            
            //Usuario
            $user = new Usuario();
            $user->setNombre("Usuario_$i: Maitane");
            $user->setApellido("Lecuona");
            $user->setTelefono("632541025");
            $user->setCorreo("maitanel@gmail.com");
            
            $manager->persist($user);
            
            //Actividades
            $actividad = new Actividades();
            $actividad->setNombre("Actividad_$i");
            $actividad->setFecha(new \DateTime("2021-04-04"));
            $actividad->setImagen("http://***");
            $actividad->setDestino("Destino_$i: Zaragoza");
            $actividad->setIdCateg($categoria);
            $actividad->setIdProp($user);

            $manager->persist($actividad);
        }
        $manager->flush();
    }
}

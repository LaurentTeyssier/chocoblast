<?php
namespace App\Controller;
use App\Model\Roles;
use App\Utils\Utilitaire;
class RolesController extends Roles{
    public function addRoles(){
        $error = "";
        //Tester si le form est submit
        if(isset($_POST['submit'])){
            //Tester si les champs sont remplis
           if(!empty($_POST['nom_roles'])) {
            //Setter les valeurs de l'objet RolesController
            $this->setNom(Utilitaire::cleanInput($_POST['nom_roles']));
            
            
            
           
            //tester si le rôle existe
            if(!$this->findOneBy()){
                
                
                $this->add();
                $error = "Le rôle a été ajouté en BDD";
            } else {
                
                $error = "Le rôle existe déjà";
            }
        
            
           }else {
            $error = "Veuillez renseigner le champ du formulaire.";
           }
        }
        include './App/Vue/vueAddRoles.php';
    }
}
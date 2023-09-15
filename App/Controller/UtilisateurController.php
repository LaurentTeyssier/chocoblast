<?php
namespace App\Controller;
use App\Model\Utilisateur;
use App\Utils\Utilitaire;
class UtilisateurController extends Utilisateur{
    public function addUser(){
        $error = "";
        //Tester si le form est submit
        if(isset($_POST['submit'])){
            //Tester si les champs sont remplis
           if(!empty($_POST['nom_utilisateur']) && !empty($_POST['prenom_utilisateur'])&& !empty($_POST['mail_utilisateur'])&& !empty($_POST['password_utilisateur'])&& !empty($_POST['repeat_password_utilisateur'])) {
            //Tester si les mdp correspondent
            if($_POST['password_utilisateur']==$_POST['repeat_password_utilisateur']){
            //Setter les valeurs de l'objet UtilisateurController
            $this->setNom(Utilitaire::cleanInput($_POST['nom_utilisateur']));
            $this->setPrenom(Utilitaire::cleanInput($_POST['prenom_utilisateur']));
            $this->setMail(Utilitaire::cleanInput($_POST['mail_utilisateur']));
            
            
           
            //tester si le compte existe
            if(!$this->findOneBy()){
                //hasher le password
                $this->setPassword(Utilitaire::cleanInput(password_hash($_POST['password_utilisateur'], PASSWORD_DEFAULT)));
                $this->add();
                $error = "Le compte a été ajouté en BDD";
            } else {
                
                $error = "Le compte existe déjà";
            }
        }else {
            $error = "Les mots de passe ne correspondent pas.";
        }
            
           }else {
            $error = "Veuillez renseigner tous les champs du formulaire.";
           }
        }
        include './App/Vue/vueAddUser.php';
    }
}
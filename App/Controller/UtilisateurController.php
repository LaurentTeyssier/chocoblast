<?php
namespace App\Controller;
use App\Model\Utilisateur;
use App\Vue\Template;
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
                if(!empty($_FILES['image_utilisateur']['tmp_name'])){
                    $this->setImage($_FILES['image_utilisateur']['name']);
                    move_uploaded_file($_FILES['image_utilisateur']['tmp_name'], './Public/asset/images/'.$_FILES['image_utilisateur']['name']);
                }else {
                    $this->setImage('test.png');
                }
                $this->setStatut(false);
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

    public function connection(){
        $error="";
        if(isset($_POST['submit'])){
            if(!empty($_POST['mail_utilisateur'])&&!empty($_POST['password_utilisateur'])){
                $this->setMail($_POST['mail_utilisateur']);
                $user = $this->findOneBy();
                $hash = $user->getPassword();
                // dd($hash);
                
                if($user){
                    if(password_verify($_POST['password_utilisateur'], $hash)){
                        
                        $error = 'Password valide';
                        $_SESSION['id']= $user->getId();
                        $_SESSION['nom']= $user->getNom();
                        $_SESSION['prenom']= $user->getPrenom();
                        $_SESSION['image']= $user->getImage();

                    } else {
                        $error = 'Password erroné';
                        
                    }
                }
            }
        }
        include './App/Vue/vueConnexion.php';
    }
    public function exemple(){
        Template::render('navbar.php', 'home', 'content.php', 'footer.php');
        
    }
} 
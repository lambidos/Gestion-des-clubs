<?php
define("PROJ_DIR", dirname(__FILE__));

    session_start();
    /* unset($_SESSION['login']); */
   

include './models/ClubModel.php';
/* include './models/DemandesModel.php'; */
include './models/TodoModel.php';
include './models/DemandesModel.php';
include './models/CheckLogin.class.php';
include './controlers/ClubsContr.class.php';
include './controlers/DemandesContr.class.php';
include './controlers/MembresContr.php';


$clubMdl = new ClubModel();
$todoModel = new todoModel();
$loginModel = new signupModel();
$clubCtl = new ClubsContr();
$demandesCtl = new DemandesContr();
$membresCtl = new MembresContr();


/* unset($_SESSION["admin"]); */
if(isset($_SESSION["login"])){
if($_SESSION["login"] === 'admin') {
/* if(false){
if(false) { */
    /* require_once PROJ_DIR . "/views/pages/admin.php"; */
    if(isset($_GET['c'])){
 
        if($_GET['c'] === "clubs"){
        
            if(isset($_GET['a'])){
                $action=$_GET['a'];
                $clubCtl->$action();
            }
            
        }else if($_GET['c'] === "todo"){
            if(isset($_GET['a'])){
                $action = $_GET['a'];
                $todoModel -> $action(); 
            }
        }else if($_GET['c'] === "membres"){
            if(isset($_GET['a'])){
                
                $action=$_GET['a'];
                $membresCtl -> $action();
                $allmembers = $clubMdl->getAllMembersRows();
                require_once PROJ_DIR . "/views/pages/membres.php";
                
                

            }else{
                $allmembers = $clubMdl->getAllMembersRows();
                
                require_once PROJ_DIR . "/views/pages/membres.php";
            }
            
        }else if($_GET['c'] === "demandes"){

            if(isset($_GET['a'])){
                $action=$_GET['a'];
                $demandesCtl -> $action(); 
            }else{
                $demandesCtl -> listDemandes();
            }
        }
    }  
    else{
        
        require_once PROJ_DIR . "/views/pages/admin.php";
    }
    
}}
// no login
else{
    if(isset($_GET['u'])){
        if($_GET['u'] === "log"){
            if($_GET['a'] === "login"){
                require_once PROJ_DIR . "/views/pages/loginform.php";
            }else if ($_GET['a'] === "session") {
                require_once PROJ_DIR . "/views/pages/login.php";
            }else if($_GET['a'] === "logout"){
                
                require_once PROJ_DIR . "/views/pages/logout.php";

            }
        }else if ($_GET['u'] === "club"){
            if($_GET['a'] === "showclub"){
                $club_id=$_GET['id'];
                
                $repname = $clubMdl->getClubRepName($_GET['id']);
                $club = $clubMdl->getClub($_GET['id']);
                $clubMembres = $clubMdl->getClubMembersRows($_GET['id']);

                require_once PROJ_DIR . "/views/pages/club.php";

            }else if($_GET['a'] === "demande"){
                
                $club_id=$_GET['id'];
                $club = $clubMdl->getClub($club_id);
                /* $repname = $clubMdl->getClubRepName($_GET['id']);
                $club = $clubMdl->getClub($_GET['id']);
                $clubMembres = $clubMdl->getClubMembersRows($_GET['id']); */
                require_once PROJ_DIR . "/views/pages/demande.php";
           
            }else if($_GET['a'] === "handleDemande"){
                $club_id=$_GET['id'];
                $demandesCtl->handleDemande($club_id);
                
            }
        }
    }else{
        $listclubs = $clubMdl -> listClubs();
        require_once PROJ_DIR . "/views/pages/home.php";
    }
    
}

/* header('Location: ./index.php'); */
if(isset($_SESSION['login'])){
    if (isset($_GET['c'])) {
    if(($_GET['c'] === "log") && ($_GET['a'] === "logout")){
        require_once PROJ_DIR . "/views/pages/logout.php";
}
}
}
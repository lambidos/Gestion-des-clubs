<?php

require_once PROJ_DIR . "/includes/header.php";
$listtodos = $todoModel -> listTodo();
$listclubs = $clubMdl -> listClubs();
?>
<link rel="stylesheet" href="views/css/styles.css">
<div class="main-container">
        
        <div class="clubs">
      
            <div class="title">
              <h3>Clubs</h3>
              <a href="?c=clubs&a=newClubForm">
                <!-- <svg class="add-button" width="512px" height="512px" viewBox="-32 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg> -->
                <div class="add-button">
                <img src="views/icons/addbold.svg" class="svg" alt="" srcset="">
                </div>
              </a>            
            </div>
            <div class="footer">
                <button class="ajouter">ajouter</button>
                <button class="supprimer">supprimer</button>
                <button class="modifier">modifier</button>
            </div>

            <div class="club_info">
            <?php foreach($listclubs as $key=>$value){ ?>
                    <a href="?c=clubs&a=clubForm&id=<?php echo $value["id"]; ?>">
                    <div class="club" role="button">
                        <div class="infos">
                            <h4 class="club_name"> <?php echo $value["nom"]; ?></h4>
                            <p class="members">
                                members: <?php 
                                echo($clubMdl ->getClubMembersCount($value["id"]));
                                ?>
                               
                            </p>
                        </div>
                        <div class="logo">
                        <img class="logoimg" src="<?php echo $value["logo"]; ?>" alt="no logo yet">
                        </div>
                        
                    </div>
                    </a>
                <?php } ?>
            </div>
            
        </div>
        <div class="right">
        
        <?php
      require_once PROJ_DIR . "/views/pages/calendar.php";
?>

        <div class="todo">
        <div class="header">
                <div class="add-todo">
                    <form method="POST" action="?c=todo&a=add">
                    <input type="text" name="task" placeholder="To Do">
                    <!-- <a action="?c=todo&a=add" method="POST"> -->
                    
                    
                    
                    <button class="add-button" type="submit">
                    <img src="views/icons/addbold.svg" class="svg" alt="" srcset="">
                    </button>
                    
                    
                    
                    </form>
                </div>
            </div>
            <ul>
            
                <?php  foreach($listtodos as $key=>$value){ ?>
                                <li class="task">
                                        <p class="task-test"> <?php echo $value["task"]; ?></p>

                                        <a href="?c=todo&a=delete&id=<?php echo $value["id"];?>"> <i class="fa-solid fa-xmark"></i></a>
                                </li>
                <?php  }
                ?>
            </ul>
        </div>
    </div>
    </div>
<?php
require_once PROJ_DIR . "/includes/footer.php";
?>
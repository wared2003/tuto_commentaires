<?php require_once 'bdd_conexion.php'; ?>


<?php 
// ajout commentaire en bdd
if (isset($_POST['submit_new_com'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $content = htmlspecialchars($_POST['content']);

    if(! empty($pseudo) && ! empty($content)){
        $req = "INSERT INTO commentaires (pseudo, content) Values(?,?)";
        $stmt = ($bdd->prepare($req));
        $stmt->execute([$pseudo, $content]);
    }
}

// suppression commentaire
    if(isset($_GET['dell_com_id'])){
        // $req = "DELETE FROM `commentaires` WHERE `commentaires`.`id` = ?";
        // $stmt = ($bdd->prepare($req));
        // $stmt->execute([$_GET['dell_com_id']]);
        $dell_com_id = $_GET['dell_com_id'];
        $bdd->query("DELETE FROM `commentaires` WHERE `commentaires`.`id` = $dell_com_id");


    }
?>


<!-- formulaire ajout commentaire -->
<form action="index.php" method="POST">
    <input type="text" name="pseudo" placeholder="pseudo">
    <textarea name="content"  cols="30" rows="10" placeholder="commentaire"></textarea>
    <input type="submit" name="submit_new_com">
</form>

<!-- affichage des commentaires -->
<?php 
    $response = $bdd->query('SELECT * FROM commentaires');
    while($commentaire = $response->fetch()){
        echo ('pseudo : '.$commentaire['pseudo'].'<br> content: '.$commentaire['content'].'<br><a href="index.php?dell_com_id='.$commentaire['id'].'">supprimer</a><br> <br>');
    }
?>  

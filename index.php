<?php require_once 'bdd_conexion.php'; ?>

<!-- ajout commentaire en bdd -->
<?php 
if (isset($_POST['submit_new_com'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $content = htmlspecialchars($_POST['content']);

    if(! empty($pseudo) && ! empty($content)){
        $req = "INSERT INTO commentaires (pseudo, content) Values(?,?)";
        $stmt = ($bdd->prepare($req));
        $stmt->execute([$pseudo, $content]);
    }
  
}

?>


<!-- formulaire ajout commentaire -->
<form action="index.php" method="POST">
    <input type="text" name="pseudo" placeholder="pseudo">
    <textarea name="content"  cols="30" rows="10" placeholder="commentaire"></textarea>
    <input type="submit" name="submit_new_com">
</form>

<?php 
    
?>  
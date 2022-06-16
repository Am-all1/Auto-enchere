
<?php 

//Affichage du footer
function affichage_footer($copyright, $mentions_legales) { ?>
    <footer>
        <p>&copy; <?php echo $copyright; ?></p>
        <a href="<?php echo $mentions_legales; ?>">Mentions légales</a>
    </footer>
<?php }


?>


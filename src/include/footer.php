
<?php 

//Affichage du footer
function affichage_footer($copyright, $mentions_legales) { ?>
    <footer id="footer">
        <p>&copy; <?php echo $copyright; ?></p>
        <a href="<?php echo $mentions_legales; ?>">Mentions légales</a>
    </footer>
<?php }




?>

<style scoped>
    
#footer{

background-color: #000000e8;
color: white;
    bottom: 0;
    width: 100%;
    padding-bottom: 17px;
    height: 50px;
}

</style >


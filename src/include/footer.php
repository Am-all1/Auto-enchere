
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
display: flex;
justify-content: space-between;
background-color: grey;
color: white;
    bottom: 0;
    width: 100%;
    padding-bottom: 30px;
    height: 5em;
}

</style >


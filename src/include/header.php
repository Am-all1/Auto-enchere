<?php 

    function affichage_header($titre, $liens) { ?>
    <nav id="barNav">
        <p><?php echo $titre; ?></p>
        <ul >
            <?php foreach($liens as $nom => $lien) { ?>
                <li >
                    <a href="<?php echo $lien; ?>"id="li">
                        <?php echo $nom; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
    <img src="/background.jpg">

<?php }


?>


<style scoped>
    
#barNav{

background-color: #000000e8;
color: white;
height: 130px;
}

#li{
    color: white;
}


</style >

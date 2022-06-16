<?php 

    function affichage_header($titre, $liens) { ?>
    <nav>
        <p><?php echo $titre; ?></p>
        <ul>
            <?php foreach($liens as $nom => $lien) { ?>
                <li>
                    <a href="<?php echo $lien; ?>">
                        <?php echo $nom; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
<?php }


    

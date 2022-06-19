<?php 

    function affichage_header($titre, $liens) { ?>

     <section class="section"> 
           
           <div >
                <img src="../image/s1.jpeg" id="imgEntete">
             </div>
            
            <nav id="barNav">
    
        <p><?php echo $titre; ?></p>

        <ul class= "nomAccueil" >
            <?php foreach($liens as $nom => $lien) { ?>
                <li >
                    <a href="<?php echo $lien; ?>"id="li">
                        <?php echo $nom; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
            </nav>
    </section>

<?php }


?>


<style scoped>
    
#barNav{
display: flex;
flex-direction: row;
background-color: #000000e8;
color: white;
height: 110px;
position: relative;
}

#li{
    color: white;
}
#imgEntete{

    width: 100%;
}

</style >

<?php 

    function affichage_header($titre, $liens) { ?>

     <section class="section"> 
         
            
            <nav id="barNav">
        <div class="titrePTB">
            <p><?php echo $titre; ?></p>
        </div>

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

            <div >
                <img src="../image/s1.jpeg" id="imgEntete">
             </div>
    </section>

<?php }


?>


<style scoped>
    
#barNav{
display: flex;
flex-direction: row;
background-color: #000000e8;
color: black;
height: 110px;
position: absolute;
width: 100%;
}

#li{
    color: white;
    display: flex;
}
#imgEntete{

    width: 100%;
}

</style >

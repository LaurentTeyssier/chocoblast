<?php ob_start()?>
    <?php dump($tab);?>
            <?php foreach($tab as $chocoblast):?>
                <?php dump($chocoblast);?>
                <div class="chocoblast">
                    
                    <p><?=$chocoblast->getSlogan()?></p>
                    <p><?php 
                    $date = new DateTimeImmutable($chocoblast->getDate());
                    echo $date->format('d m Y');?></p>
                    <p>Nom cible :<?= $chocoblast->cible_nom?></p>
                    <p>Prenom cible :<?= $chocoblast->cible_prenom?></p>
                    <img src="./Public/asset/images/<?=$chocoblast->cible_image?>">
                    
                    
                </div>
            <?php endforeach?>     
        <div><?=$error?></div>
    </form>
<?php $content = ob_get_clean()?>
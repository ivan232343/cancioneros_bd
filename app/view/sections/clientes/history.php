<?php
$clients = $record->sp_get_clientes_today();
?>

<div class="_flex _direction-col">

    <?php if(count($clients)!=0):  echo(count($clients)."  clientes atendidos hoy");foreach ($clients as $key) : ?>

        <div class="cards-content">
            <div class="card-head">
                <div class="icons _status _flex _content-s-between">
                    <div class="sect_is_titular">
                        <?php if ($key["is_titular"]== 1 )  :?>
                            <span class="mdi mdi-account-check mdi-24px _green"></span>
                            <span class="mdi mdi-card-account-details-star mdi-24px _green"></span>
                        <?php ;else:?>
                            <span class="mdi mdi-account-question mdi-24px _red"></span>
                            <span class="mdi mdi-card-account-details-outline mdi-24px _red">
                        <?php endif;?>
                    </div>
                      <div class="sect_tel">
                    <?php if ($key["tel_referencia"]!= "null" )  :?>
                        <span class="mdi  mdi-cellphone-check mdi-24px _green"></span>
                    <?php ;else:?>
                        <span class="mdi mdi-cellphone-remove mdi-24px _red"></span>
                    <?php endif;?>
                    <?php if ($key["tel_consulta"]!= "null" )  :?>
                        <span class="mdi mdi-phone  mdi-24px _green"></span>
                    <?php ;else:?>
                        <span class="mdi mdi-phone-remove mdi-24px _red"> </span>
                    <?php endif;?>
                    </div>
                    <div class="sect_forstats">
                        <?php if ($key["is_tificado"]== 1 )  :?>
                            <span class="mdi  mdi-message-star mdi-24px _green"></span>
                        <?php ;else:?>
                            <span class="mdi mdi-message-text-clock mdi-24px _red"></span>
                        <?php endif;?>
                        <?php if ($key["is_cross"]== 1 )  :?>
                            <span class="mdi mdi-share mdi-24px _green"></span>
                        <?php ;else:?>
                            <span class="mdi mdi-share-off mdi-24px _red"></span>
                        <?php endif;?>
                    </div>
                </div>
            </div>

        <!-- <div class="cards-content">
            <div class="card-head _flex _content-s-between">
                <div class="name-sec-card">
                    <?php if ($key["is_titular"]== 1 )  :?><span class="mdi mdi-account-check mdi-24px _green"></span>
                        <?php ;else:?><span class="mdi mdi-account-question mdi-24px _red"></span><?php endif;?>
                            <?= $key["nombre"]?>
                        </div>
                <div class="dni-sec-card">
                    <?php if ($key["is_titular"]== 1 )  :?><span class="mdi mdi-card-account-details-star mdi-24px _green"></span>
                        <?php ;else:?><span class="mdi mdi-card-account-details-outline mdi-24px _red"></span><?php endif;?>
                            <?= $key["dni"]?>
                        </div>
                <div class="icons-sec-card">
                    <?php if ($key["is_tificado"]== 1 )  :?><span class="mdi  mdi-message-star mdi-24px _green"></span>
                    <?php ;else:?><span class="mdi mdi-message-text-clock mdi-24px _red"></span><?php endif;?>

                    <?php if ($key["is_tificado"]== 1 )  :?><span class="mdi mdi-share mdi-24px _green"></span>
                    <?php ;else:?><span class="mdi mdi-share-off mdi-24px _red"></span><?php endif;?>
                </div>
            </div> -->
            <div class="card-body">
                <div class="title">
                    <?= ($key["is_titular"]==1) ? "Titular" : "Usuario" ;  ?> <?= $key["nombre"]?>
                    <?= $key["motivo"]?></div>
                <div class="description"><?= ($key["observaciones"]!="null")?$key["observaciones"]:"<center>---//No hay notas adicionales//---</center>"  ?></div>
                <div class="masinfo">
                    <p>conid: <?php $t =explode("@", $key["conmid"]); echo $t[0];?></p>
                    <p>ani:<?= $key["ani"]?></p>
                    <p>dni:<?= $key["dni"]?></p>
                </div>

            </div>
            <!-- <div class="card-footer _flex _content-s-between">
  
            </div> -->
        </div>
        <?php endforeach; else:?>
    <p>No hay clientes registrados</p>
    <?php endif; ?>

    </div>
<?php  $data = $record->sp_get_all_apps()?>

<textarea name="temp" id="temp" cols="0" rows="0" class="_hidden"></textarea>
<span class="status _pass _hidden"></span>
<div class="_flex _direction-col">
    <?php  if (count($data) != 0) : foreach ($data as $key):    ?>
            <div class="cards-content notext">
                <div class="card-head _flex _content-s-between">
                    <div class="content-link">
                        <?php if ($key["link_app"] != "desk") : ?>
                            <a href="<?= $key["link_app"] ?>" target="_blank" rel="noopener noreferrer"> <?= $key["name_app"] ?></a>
                        <?php else : ?>
                            <a href="#"><?= $key["name_app"] ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="content-chg">
                        <div class="btn-chg-pass"  data-datasent="<?= $key["id"] ?>"><span class="mdi mdi-shield-refresh"></span> cambiar contraseña</div>
                        
                    </div>
                </div>
                <?php $users = (is_array($record->sp_get_pass($key["id"]))) ? $record->sp_get_pass($key["id"]) :["name"=>"sin usuario","pass"=>"sin password"] ; ?>

                <div class="card-body _flex _nowarp _content-s-evenly ">
                    <div class="text-copy" >
                        <p data-tocopy="<?= $users["name"] ?>"><?= $users["name"] ?></p>
                    </div>
                    <p>-></p>
                    <div class="text-copy _pass _flex _content-s-between _aling-center" >
                        <div class="pass-censore" >
                            <p class="_active" data-tocopy="<?= $users["pass"] ?>"> ********** </p>
                            <p class="_no_active"  data-tocopy="<?= $users["pass"] ?>"> <?= $users["pass"] ?> </p>
                        </div>
                        <div class="pass-show">
                            <span class="mdi mdi-eye mdi-24px"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer _flex _content-s-between">
                    <div class="edit"></div>

                </div>
            </div>
        <?php  endforeach; else:     ?>
        <p>No hay contraseñas  registradas</p>
    <?php endif; ?>
</div>
<?php foreach($entradas as $entrada) {?>

    <div>
        <h1><?php echo $entrada->titulo; ?></h1>
        <h5><?php echo $entrada->fecha; ?></h5>
        <p><?php echo $entrada->texto; ?></p>
    </div>

<?php } ?>
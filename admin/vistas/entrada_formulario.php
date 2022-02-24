    <div>
        <form action="entrada.php<?php if($accion == 'editar'){echo "?id={$entrada->id}";}?>" method="post">
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <div>
                <label>Título</label>
                <input type="text" name="titulo" <?php if($accion == 'editar'){echo "value=\"{$entrada->titulo}\"";}?>>
            </div>
            <div>
                <label>Texto</label>
                <textarea name="texto"><?php if($accion == 'editar'){echo "{$entrada->texto}";}?></textarea>
            </div>
            <div>
                <label>Imagen</label>
                <input type="file" name="imagen">
            </div>
            <div>
                <button type="submit">Enviar Formulario</button>
            </div>
        </form>
    </div>
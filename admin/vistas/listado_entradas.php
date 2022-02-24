<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Extracto</th>
                <th>Imagen</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($entradas as $entrada) { ?>
            <tr>
                <td><?php echo $entrada->id; ?></td>
                <td><?php echo $entrada->titulo; ?></td>
                <td><?php echo $entrada->extracto(); ?></td>
                <td><?php echo $entrada->imagen; ?></td>
                <td><?php echo $entrada->fecha; ?></td>
                <td>
                    <a href="entrada.php?id=<?php echo $entrada->id; ?>">Editar</a>
                    <a href="borrar.php?id=<?php echo $entrada->id; ?>">Borrar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
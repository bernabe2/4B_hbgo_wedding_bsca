<?php
// view/items.php
// Vista para mostrar la lista de elementos
foreach ($items as $item) {
    echo "<p>{$item->getNombre()} <a href='edit.php?id={$item->getId()}'>Editar</a> <a href='delete.php?id={$item->getId()}'>Eliminar</a></p>";
}

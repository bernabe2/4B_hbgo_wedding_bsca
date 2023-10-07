<?php
// view/item_form.php
// Vista para el formulario de creación/edición de elementos
if (isset($item)) {
    $action = "update.php?id=" . $item->getId();
} else {
    $action = "store.php";
}
?>
<form action="<?php echo $action; ?>" method="POST">
    <input type="text" name="nombre" value="<?php if (isset($item)) { echo $item->getNombre(); } ?>">
    <input type="submit" value="Guardar">
</form>

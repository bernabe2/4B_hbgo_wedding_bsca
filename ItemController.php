<?php
// controller/ItemController.php
class ItemController {
    public function index() {
        // Lógica para mostrar la lista de elementos
        $items = Item::all();
        include("../view/items.php");
    }
    
    public function create() {
        // Lógica para mostrar el formulario de creación de elementos
        include("../view/item_form.php");
    }
    
    public function store() {
        // Lógica para guardar un nuevo elemento en la base de datos
        $item = new Item();
        $item->setNombre($_POST["nombre"]);
        $item->save();
        header("Location: index.php");
    }
    
    public function edit($id) {
        // Lógica para mostrar el formulario de edición de un elemento
        $item = Item::find($id);
        include("../view/item_form.php");
    }
    
    public function update($id) {
        // Lógica para actualizar un elemento en la base de datos
        $item = Item::find($id);
        $item->setNombre($_POST["nombre"]);
        $item->update();
        header("Location: index.php");
    }
    
    public function delete($id) {
        // Lógica para eliminar un elemento de la base de datos
        $item = Item::find ($id);
        $item->delete();
        header("Location: index.php");
    }
}

<?php

class Animal
{
    public $animals;

    public function __construct($ar_animal)

{
    $this->animals = $ar_animal;
}

public function index()
{
    foreach ($this->animals as $animal) {
        echo "- $animal <br/>";
    }
}

public function store($animal) {
    $this->animals[] = $animal;
}

public function update($index, $animals) {
    $this->animals[$index] = $animals;
}

public function destroy($index) {
    unset($this->animals[$index]);
}

}

#membuat object
#KIRIMKAN DATA ARRAY  KEDALAM COUNSTRACTOR
$animal = new Animal(["Ayam","Ikan"]);

echo "index - menampilkan seluruh hewan <br/>";
$animal->index();
echo "<br/>";

echo "store - menambahkan hewan baru (burung) <br/>";
$animal->store ("burung");
$animal->index();
echo "<br/>";

echo "update - mengupdate hewan <br/>";
$animal->update (0, "Kucing Anggora");
$animal->index();
echo "<br/>";

echo "destroy - mengupdate hewan <br/>";
$animal->destroy (1);
$animal->index();
echo "<br/>";
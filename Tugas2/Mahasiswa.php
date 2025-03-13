<?php
class Mahasiswa {
    private $nim;
    private $nama;

    // Method untuk menyetujui data
    public function setData($nim, $nama) {
        $this->nim = $nim;
        $this->nama = $nama;
    }

    // Method untuk mendapatkan data
    public function getData() {
        return ["NIM" => $this->nim, "Nama" => $this->nama];
    }
}
?>


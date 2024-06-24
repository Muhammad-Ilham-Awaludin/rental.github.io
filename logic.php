<?php 
class Data {
    public $member;
    public $jenis;
    public $waktu;
    public $diskon;
    protected $pajak;
    private $Scooter, $Matic, $Sport, $Cross;
    private $listMember = ['ana', 'sam', 'alex', 'ara'];

    function __construct() {
        $this->pajak = 10000;
    }

    public function getMember() {
        if (in_array($this->member, $this->listMember)) {
            return "member";
        } else {
            return "non member";
        }
    }

    public function setHarga($jenis1, $jenis2, $jenis3, $jenis4) {
        $this->Scooter = $jenis1;
        $this->Matic = $jenis2;
        $this->Sport = $jenis3;
        $this->Cross = $jenis4;
    }

    public function getHarga() {
        $data["Scooter"] = $this->Scooter;
        $data["Matic"] = $this->Matic;
        $data["Sport"] = $this->Sport;
        $data["Cross"] = $this->Cross;
        return $data;
    }
}

class Rental extends Data {
    public function hargaRental() {
        $dataHarga = $this->getHarga()[$this->jenis];
        $diskon = $this->getMember() == "member" ? 5 : 0;

        if ($this->waktu == 1) {
            $bayar = ($dataHarga - ($dataHarga * $diskon / 100)) + $this->pajak;
        } else {
            $bayar = (($dataHarga * $this->waktu) - ($dataHarga * $diskon / 100)) + $this->pajak;
        }

        return [$bayar, $diskon];
    }

    public function Pembayaran() {
        echo "<center>";
        echo $this->member . " Berstatus Sebagai " . $this->getMember(). " Mendapatkan diskon Sebesar " . $this->hargaRental()[1] . "%";
        echo "<br />";
        echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari ";
        echo "<br />";
        echo "Harga rental per harinya : RP. " . number_format($this->getHarga()[$this->jenis], 0, '', '.');
        echo "<br />";
        echo "<br />";
        echo "Besar yang harus dibayarkan adalah RP. " . number_format($this->hargaRental()[0], 0, '', '.');
        echo "</center>";
    }
}
?>

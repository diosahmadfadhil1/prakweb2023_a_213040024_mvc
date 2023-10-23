<?php  

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllMahasiswa() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data) {
        $query = "INSERT INTO mahasiswa 
                    (nama, nrp, email, jurusan)
                    VALUES
                    (:nama, :nrp, :email, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function hapusDataMahasiswa($id) {
        $query = "DELETE FROM mahasiswa WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMahasiswa($data) {
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    nrp = :nrp,
                    email = :email,
                    jurusan = :jurusan
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMahasiswa() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}


    // private $mhs = [
    //     [
    //             "nama" =>"Wildan Nasrullah",
    //             "nrp" => "213040040",
    //             "email" => "WildanNasrullah@unpas.ac.id",
    //             "jurusan" => "Teknik Informatika"
    //     ],
    //     [;
    //             "nama" =>"Daffa Gimnastiar",
    //             "nrp" => "213040135",
    //             "email" => "DaffaGimnastiar@unpas.ac.id",
    //             "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //             "nama" =>"Moch Derral Pramudya",
    //             "nrp" => "213040023",
    //             "email" => "MochDerralPramudya@unpas.ac.id",
    //             "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //             "nama" =>"M bakti Firdaus",
    //             "nrp" => "213040006",
    //             "email" => "baktiFirdaus@unpas.ac.id",
    //             "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //             "nama" =>"Ridho Fauzan",
    //             "nrp" => "213040009",
    //             "email" => "RidhoFauzan@unpas.ac.id",
    //             "jurusan" => "Teknik Informatika"
    //     ],

    //     ];
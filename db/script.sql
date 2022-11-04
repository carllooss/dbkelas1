DROP database pweb_2022_kelas_1;

CREATE database pweb_2022_kelas_1;

USE pweb_2022_kelas_1;

CREATE TABLE mahasiswa(
    nim VARCHAR(10) NOT NULL primary key,
    nama VARCHAR(100) NOT NULL,
    tgl_lahir DATE NOT NULL,
    alamat text NOT NULL,
    jenis_kelamin enum('L', 'P') DEFAULT 'L'
);

INSERT INTO mahasiswa
VALUES ('2142101545', 'Adi', '2003-01-01', 'Jogja', 'L'),
    ('2142101546', 'Ida', '2003-02-02', 'Jogja', 'P'),
    ('2142101547', 'Edi', '2003-03-03', 'Jogja', 'L'),
    ('2142101548', 'Susi', '2003-04-04', 'Jogja', 'P'),
    ('2142101549', 'Joko', '2003-05-05', 'Jogja', 'L');

CREATE TABLE motor(
    id INT NOT NULL primary key auto_increment,
    plat_no VARCHAR(10) NOT NULL,
    merek VARCHAR(100),
    tipe VARCHAR(100),
    mahasiswa_nim VARCHAR(10) NOT NULL,
    foreign key(mahasiswa_nim) references mahasiswa(nim),
    CONSTRAINT plat_no_unique UNIQUE (plat_no)
);

INSERT INTO motor
VALUES (1, "AB 20", "Honda", "Matic", "2142101545");

ALTER TABLE motor add
gambar VARCHAR(100) DEFAULT NULL;
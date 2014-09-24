<?php

//1.koneksi database
$konek = mysql_connect("localhost","root","") or die(mysql_error());
$db = mysql_select_db("mahasiswa");

if ($konek) {
  echo "Berhasil Koneksi ke database. <br/>";
}else{
  echo "Gagal Koneksi ke database. <br/>";
}

if ($db) {
  echo "Database ditemukan. <br/>";
}else{
  echo "Database tidak ditemukan. <br/>";
}

//2.query database
$query = "SELECT * FROM mahasiswa";
$hasil = mysql_query($query);
$datamahasiswa = array();
while ($data = mysql_fetch_array($hasil)) {
  $datamahasiswa[] = array(
    'nim'     => $data['nim'],
    'nama'    => $data['nama'],
    'alamat'  => $data['alamat'],
    'prodi'   => $data['prodi'],
  );
}

//3.parsing adata xml
$document = new DOMDocument();
$document->formatOutput = true;
$root = $document->createElement("data");
$document->appendChild($root);
foreach ($datamahasiswa as $mahasiswa) {
  $block = $document->createElement("mahasiswa");
  // create element nim
  $nim = $document->createElement("nim");
  // craeteElement untuk membuat elemen baru
  $nim->appendChild($document->createTextNode($mahasiswa['nim']));
  // createTextNode untuk menampilkan isi / value
  $block->appendChild($nim);
  // appendClid untuk mempersiapkan nilai dari element diatasnya

  //create element nama
  $nama = $document->createElement("nama");
  $nama->appendChild($document->createTextNode($mahasiswa['nama']));
  $block->appendChild($nama);

  //create element alamat
  $alamat = $document->createElement("alamat");
  $alamat->appendChild($document->createTextNode($mahasiswa['alamat']));
  $block->appendChild($alamat);

  // create element prodi
  $prodi = $document->createElement("prodi");
  $prodi->appendChild($document->createTextNode($mahasiswa['prodi']));
  $block->appendChild($prodi);

  $root->appendChild($block);
}


// 4. Menyimpan data dalam bentuk file xml
$generateXML = $document->save("mahasiswa.xml");
if ($generateXML) {
  echo "Berhasil menggenerate mahasiswa.xml dari database. <br/>";
}else{
  echo "Gagal menggenerate mahasiswa.xml dari database. <br/>";
}


// 5. membaca file XML
// membuka file
$url    = "localhost/ws/xml/bab-4/mahasiswa.xml";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
curl_close($client);
// membaca file

// 6. Ditampilkan dalam bentuk HTML
$datamahasiswaxml = simplexml_load_string($response);

echo "
<table border='1'>
  <tr>
    <td>NIM</td>
    <td>Nama</td>
    <td>Mahasiswa</td>
    <td>Prodi</td>
  </tr>";

foreach ($datamahasiswaxml->mahasiswa as $mahasiswa) {
  echo "<tr>
    <td>".$mahasiswa->nim."</td>
    <td>".$mahasiswa->nama."</td>
    <td>".$mahasiswa->alamat."</td>
    <td>".$mahasiswa->prodi."</td>
  </tr>";
}
echo "</table>";

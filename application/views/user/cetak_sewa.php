<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>

<body>
  <style type="text/css">
    .table-data {
      width: 100%;
      border-collapse: collapse;
    }

    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 12pt;
    }
  </style>

  <center>
    <h1>Bukti Pemesanan Lapangan Futsalin-Kuy</h1>
  </center>
  <br><br><br><br>

  <?php
  $no = 1;
  foreach ($penyewaan as $p) {
  ?>
    <table>
      <tr>
        <td><b>No. Booking</b></td>
        <td>:</td>
        <td><?= $p->id_sewa ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Pesan</b></td>
        <td>:</td>
        <td><?= $p->tgl_pesan ?></td>
      </tr>
      <tr>
        <td><b>Lapangan</b></td>
        <td>:</td>
        <td><?= $p->nama_lap ?></td>
      </tr>
    </table>
    <br>
    <br>
    <b>Biodata Member</b>
    <table class="table-data">
      <thead>
        <tr>
          <th>Nama</th>
          <th>No. HP</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $p->nama_member; ?></td>
          <td><?php echo $p->no_hp; ?></td>
          <td><?php echo $p->email; ?></td>
        </tr>
      </tbody>
    </table>
    <br>
    <br>
    <b>Info Booking</b>
    <table class="table-data">
      <thead>
        <tr>
          <th>Tanggal Main</th>
          <th>Jam Main</th>
          <th>Lama Pertandingan</th>
          <th>Total Bayar</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $p->tgl_sewa; ?></td>
          <td><?php echo $p->jam_mulai; ?></td>
          <td><?php echo $p->durasi; ?> Jam</td>
          <td><?php echo number_format($p->totalbayar);; ?></td>
          <td><?php echo $p->status_sewa; ?></td>
        </tr>
      </tbody>
    </table>
  <?php
  }
  ?>
</body>

</html>
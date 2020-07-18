<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<tr>
                    <th>No</th>
                    <th>Kecamatan</th>
                    <th>PP</th>
                    <th>OPD</th>
                    <th>PDP</th>
                    <th>Positif</th>
                    <th>Tanggal Pengambilan</th>
                  </tr>
                  <?php 
                  $no = 1;
                  foreach ($tb_covid as $c): ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $c ->kecamatan ?></td>
                      <td><?php echo $c ->pp?></td>
                      <td><?php echo $c ->odp?></td>
                      <td><?php echo $c ->pdp?></td>
                      <td><?php echo $c ->positif?></td>
                      <td><?php echo $c ->tanggal_pengambilan?></td>
                  </tr>
                  <?php endforeach; ?>
	</table>
</body>
</html>
<?php
include "koneksi.php"; 

$start = $_GET['start'] ?? date("Y-m-01");
$end   = $_GET['end']   ?? date("Y-m-t");

$sql = "SELECT DATE(waktu_transaksi) as tgl, SUM(total) as total, COUNT(id) as jumlah
        FROM transaksi WHERE DATE(waktu_transaksi) BETWEEN ? AND ?
        GROUP BY tgl ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $start, $end); $stmt->execute();
$result = $stmt->get_result(); 

$data = []; $max = 0; $g_total_rp = 0; $g_total_user = 0;
while ($r = $result->fetch_assoc()) {
    $data[] = $r;
    if ($r['total'] > $max) $max = $r['total'];
    $g_total_rp += $r['total'];
    $g_total_user += $r['jumlah'];
}

$scale = ($max > 0) ? (ceil($max / 10000) * 10000) : 50000; 

if (isset($_GET['excel'])) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Laporan_Penjualan.xls");
    
    ?>
    <table border="0">
        <tr><td colspan="3" style="font-size: 14pt; font-weight: bold;">Rekap Laporan Penjualan <?= $start ?> sampai <?= $end ?></td></tr>
        <tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr>
        
        <tr><th style="font-weight: bold; text-align: center;">No</th><th style="font-weight: bold; text-align: center;">Total</th><th style="font-weight: bold; text-align: center;">Tanggal</th></tr>

        <?php $no = 1; foreach($data as $d): ?>
        <tr>
            <td style="text-align: center;"><?= $no++ ?></td>
            <td>RP. <?= number_format($d['total'], 0, ',', '.') ?></td>
            <td style="text-align: center;"><?= date('d-M-y', strtotime($d['tgl'])) ?></td>
        </tr>
        <?php endforeach; ?>

        <tr><td colspan="3"></td></tr><tr><td colspan="3"></td></tr>
        <tr><td style="font-weight: bold;">Jumlah Pelanggan</td><td style="font-weight: bold;">Jumlah Pendapatan</td><td></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr><td style="font-weight: bold;"><?= $g_total_user ?> Orang</td><td style="font-weight: bold;">RP. <?= number_format($g_total_rp, 0, ',', '.') ?></td><td></td></tr>
    </table>
    <?php
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Laporan Penjualan</title>
<style>
    body { font-family: sans-serif; margin: 20px; color: #333; }
    h2, p { text-align: center; margin: 5px; }

    .toolbar { background: #f4f4f4; padding: 15px; display: flex; justify-content: space-between; margin-bottom: 20px; border-radius: 5px;}
    input, button { padding: 6px; border: 1px solid #ccc; border-radius: 3px; }
    .btn-green { background:#28a745; color:white; border:none; cursor: pointer; }
    
    .chart-wrap { display: flex; height: 300px; width: 100%; border: 1px solid #ddd; padding: 10px 10px 10px 10px; margin-bottom: 30px; }
    .y-axis { width: 60px; text-align: right; display: flex; flex-direction: column; justify-content: space-between; padding-right: 10px; font-size: 11px; border-right: 1px solid #999; }
    .bars-area { flex: 1; display: flex; align-items: flex-end; border-bottom: 1px solid #999; padding: 0 10px; }
    
    .item { flex: 1; height: 100%; display: flex; flex-direction: column; justify-content: flex-end; align-items: center; }
    .bar { background: #bbb; border: 1px solid #888; width: 60%; max-width: 50px; transition: 0.3s; }
    .bar:hover { background: #888; }
    .date { font-size: 11px; margin-top: 5px; white-space: nowrap; }

    table { width: 100%; border-collapse: collapse; margin-top: 20px;}
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background: #eee; }

    @media print { .no-print { display: none; } .bar { -webkit-print-color-adjust: exact; } }
</style>
</head>
<body>

<h2>Rekap Penjualan</h2>
<p>Periode: <?= date('d M Y', strtotime($start)) ?> s/d <?= date('d M Y', strtotime($end)) ?></p>

<div class="toolbar no-print">
    <form>
        <input type="date" name="start" value="<?= $start ?>"> s/d 
        <input type="date" name="end" value="<?= $end ?>">
        <button class="btn-green">Tampilkan</button>
    </form>
    <div>
        <button onclick="window.print()">PDF</button>
        <a href="?start=<?=$start?>&end=<?=$end?>&excel=1"><button>Excel</button></a>
    </div>
</div>

<h3>Grafik</h3>
<div class="chart-wrap">
    <div class="y-axis">
        <?php for($i=5;$i>=0;$i--) echo "<span>".number_format($scale/5*$i)."</span>"; ?>
    </div>
    <div class="bars-area">
        <?php if(empty($data)): ?>
            <div style="width:100%; text-align:center; align-self:center;">Data Kosong</div>
        <?php else: ?>
            <?php foreach($data as $d): $h = ($d['total']/$scale)*100; ?>
            <div class="item">
                <div class="bar" style="height:<?=$h?>%" title="Rp <?=number_format($d['total'])?>"></div>
                <span class="date"><?=date('d-m-20y',strtotime($d['tgl']))?></span>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<h3>Rekap Data</h3>
<table>
    <tr><th width="50">No</th><th>Total Pendapatan</th><th>Tanggal</th></tr>
    <?php $n=1; foreach($data as $d): ?>
    <tr>
        <td><?=$n++?></td>
        <td>Rp <?=number_format($d['total'], 0, ',', '.')?></td>
        <td><?=date('d F Y', strtotime($d['tgl']))?></td>
    </tr>
    <?php endforeach; ?>
    <tr><td colspan="3"><b>Total Keseluruhan: Rp <?=number_format($g_total_rp, 0, ',', '.')?></b></td></tr>
</table>

</body>
</html>
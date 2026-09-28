<?php
$produk = [
    [
        "nama"     => "Laptop Thinkpad",
        "kategori" => "Laptop",
        "harga"    => 7499000,
        "stok"     => 8,
        "ikon"     => "💻"
    ],
    [
        "nama"     => "Macbook air 13",
        "kategori" => "Laptop",
        "harga"    => 1299000,
        "stok"     => 9,
        "ikon"     => "💻"
    ],
    [
        "nama"     => "Sony Alpha 7",
        "kategori" => "Kamera",
        "harga"    => 8999000,
        "stok"     => 0,
        "ikon"     => "📷"
    ],
    [
        "nama"     => "Mouse Logitech",
        "kategori" => "Perangkat Input",
        "harga"    => 185000,
        "stok"     => 25,
        "ikon"     => "🖱️"
    ],
    [
        "nama"     => "Monitor LG",
        "kategori" => "Monitor",
        "harga"    => 1699000,
        "stok"     => 7,
        "ikon"     => "🖥️"
    ],
    [
        "nama"     => "Stik PS 4",
        "kategori" => "Konsol Game",
        "harga"    => 3299000,
        "stok"     => 4,
        "ikon"     => "🎮"
    ],
];

shuffle($produk);

$totalProduk = count($produk);

function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="container nav-inner">
            <a href="#" class="logo">Cia<span>Store</span></a>
            <nav class="nav-links">
                <a href="#beranda">Beranda</a>
                <a href="#katalog">Katalog</a>
                <a href="#kontak">Kontak</a>
            </nav>
        </div>
    </header>

    <section class="hero" id="beranda">
        <div class="container">
            <h1>Selamat Datang di Toko Elektronik No. 1 di Indonesia</h1>
            <p>Cia Store, Toko Perangkat Elektronik Terbaik di Kotamu.</p>
            <a href="#katalog" class="btn btn-light">Lihat Katalog</a>
        </div>
    </section>

    <section class="info-bar">
        <div class="container">
            <div class="info-box">
                Total produk tersedia di katalog: <strong><?= $totalProduk; ?> produk</strong>
            </div>
        </div>
    </section>

    <main class="container" id="katalog">
        <h2 class="section-title">Katalog Produk</h2>

        <div class="grid">
            <?php foreach ($produk as $item) : ?>
                <?php
                if ($item["stok"] > 0) {
                    $status      = "Tersedia";
                    $kelasStatus = "tersedia";
                } else {
                    $status      = "Stok Habis";
                    $kelasStatus = "habis";
                }
                ?>
                <article class="card">
                    <div class="card-img"><?= $item["ikon"]; ?></div>
                    <div class="card-body">
                        <span class="kategori"><?= htmlspecialchars($item["kategori"]); ?></span>
                        <h3 class="nama"><?= htmlspecialchars($item["nama"]); ?></h3>
                        <p class="harga"><?= rupiah($item["harga"]); ?></p>
                        <p class="stok">Stok: <?= $item["stok"]; ?></p>
                        <span class="badge <?= $kelasStatus; ?>"><?= $status; ?></span>

                        <?php if ($item["stok"] > 0) : ?>
                            <button class="btn btn-primary">Beli Sekarang</button>
                        <?php else : ?>
                            <button class="btn btn-disabled" disabled>Tidak Tersedia</button>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="footer" id="kontak">
        <div class="container">
            <p><strong>Cia Store</strong> - Toko Perangkat &amp; Aksesoris Teknologi</p>
            <p>Jakarta Selatan, Indonesia | cia.store@email.com</p>
            <p>No. Admin +62 813-8566-1569<p>
            <p class="copy">&copy; <?= date("Y"); ?> Cia Store. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

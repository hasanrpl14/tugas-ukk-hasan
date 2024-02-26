CREATE TABLE transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_produk INT,
    jumlah INT,
    total_harga DECIMAL(10,2),
    waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_produk) REFERENCES produk(id)
);

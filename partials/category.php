<div class="col-lg-3">
  <br>
     <ul class="list-group">
        <a href="#" class="list-group-item active">
            List of category
         </a>
               <?php 
                    $query_kategori = $koneksi->query("SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");
                    while($data_kategori = $query_kategori->fetch_assoc()){
                        $id_kategori = $data_kategori['id_kategori'];
                        $query_produk = $koneksi->query("SELECT * FROM tb_produk WHERE id_kategori=$id_kategori ");
                        ?>
                         <li class="list-group-item">
                            <a href="?category=<?=$data_kategori['id_kategori']?>"><?= $data_kategori['nama_kategori'] ?></a>
                                <span class="badge badge-default badge-pill badge-green float-right"><?= $query_produk->num_rows?></span>
                         </li>
                        <?php 
                    }
                ?>
           </ul>
</div>
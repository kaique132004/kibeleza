<section class="servico">
        <div class="site servicos">
                <h2>Serviços</h2>
                <div>
                        <?php foreach(array_slice($listaServico,0,4) as $listar): ?>
                                <article>
                                        <img src="admin/<?php echo $listar['fotoServico1']; ?>" alt="<?php echo $listar['nomeServico']; ?>">
                                        <p><?php echo $listar['descricaoServico']; ?></p>
                                        <a href="servicos.php">Leia Mais >>></a>
                                </article>
                        <?php endforeach ?>     
                </div>
        </div>
</section>


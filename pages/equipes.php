<section class="equipe">
            <h2>Equipe</h2>
            <div class="func">
                <?php foreach($listaFunc as $linha): ?>
                <article>
                    <img src="img/Equipe.png" alt="">
                    <p><?php echo $linha['nomeFuncionario']; ?></p>
                    <p><?php echo $linha['nivelFuncionario']; ?></p>
                </article>
                <?php endforeach ?>
            </div>
    </section>
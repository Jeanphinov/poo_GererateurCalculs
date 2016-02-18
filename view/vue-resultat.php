<?php require_once('./base/head.php'); ?>


<section class="container-fluid">

    <div class="row">
        <div class="col-md-offset-2 col-md-8 alert alert-info">
            <h4>Résultat !</h4>

            <p>Vous avez obtenu <?php echo $score ?> réponses correctes. Voici votre copie corrigée.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>Réponse</th>
                    <th>Soluce</th>
                </tr>
                </thead>
                <?php
                foreach ($operations as $operation => $r) {
                    ?>
                    <tr class="<?php echo $decorations[$operation]["classe"]; ?>">
                        <td><?php echo $operation; ?></td>
                        <td><?php echo $reponses[$operation]; ?> </td>
                        <td><?php echo $r; ?></td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>

</section>


</body>
</html>
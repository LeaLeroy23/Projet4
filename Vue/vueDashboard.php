<?php $this->titre = "Espace Administration"; ?>

<p>Bonjour, Jean Forteroche</p>


    <section>
      <div class="col-md-12">
        <?php foreach ($chapitres as $chapitre):?>
        <div class="col-sm-6">
          <?= $chapitre['contenu']?>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

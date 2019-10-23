<?php $this->titre = "Espace Administration"; ?>

<body id="top">

    <section class="s-content" style="padding-bottom: 0; display: flex; padding-top: 7,8rem;">


          <div class="column">
            <nav class="nav-dashboard">
              <ul class="summary">
                <li class="li-dashboard"><a href="#" class="intern-link-dashboard">Tableau de bord</a></li>
                <li class="li-dashboard"><a href="#" class="intern-link-dashboard">Chapitres</a></li>
                <li class="li-dashboard"><a href="#" class="intern-link-dashboard">Ecriture d'un chapitre</a></li>
                <li class="li-dashboard"><a href="#" class="intern-link-dashboard">Modification d'un chapitre</a></li>
                <li class="li-dashboard"><a href="#" class="intern-link-dashboard">Commentaires</a></li>
              </ul>
            </nav>
          </div>
        
      <div class="container-dashboard">

          <div class="row" style="margin-bottom: 3%;">

            <div class="col-3" style="margin-right: 5%;">
              <h4 class="title-dashboard"><i class="fas fa-pen"></i>Ecrire un Chapitre</h4>
              <form method="post">
                
                <textarea id="chapitres" name="mytextarea">Ici vous pouvez rediger votre chapitre !</textarea>
              </form>
            </div>

            <div class="col-3">
              <h4 class="title-dashboard"><i class="fas fa-list-alt"></i>Liste des chapitres</h4>

              <div class="row">
                <div class="col-12">
                  <label>                   
                      <select name="chapters" multiple="yes" style="width: 100%; height: 275px;">
                          <?php foreach ($dashboard as $dashboard): ?>
                               <option value="<?= $dashboard['title'] ?>"><?= $dashboard['title'] ?></option>
                          <?php endforeach; ?>
                      </select>
                  </label>
                </div>
              </div>

            </div>

          </div>

          <div class="row">

            <div class="col-11" style="margin-bottom: 3%;">
              <h4 class="title-dashboard"><i class="fas fa-edit"></i>Supprimer / modifier un chapitre</h4>
            </div>

            <div class="col-11" style="margin-bottom: 3%;">
              <h4 class="title-dashboard"><i class="fas fa-comments"></i>Commentaires</h4>
            </div>

          </div>

      </div>
    </section>
</body>

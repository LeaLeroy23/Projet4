<?php $this->titre = "Espace Administration"; ?>

<body id="top">

    <section class="s-content" style="padding-bottom: 0; display: flex; padding-top: 7,8rem;">


          <div class="column">
            <nav class="nav-dashboard">
              <ul class="summary">
                <li class="li-dashboard"><a href="#dashboard" class="intern-link-dashboard">Tableau de bord</a></li>
                <li class="li-dashboard"><a href="#chapitres" class="intern-link-dashboard">Chapitres</a></li>
                <li class="li-dashboard"><a href="#ecrit" class="intern-link-dashboard">Ecriture d'un chapitre</a></li>
                <li class="li-dashboard"><a href="#modification" class="intern-link-dashboard">Modification d'un chapitre</a></li>
                <li class="li-dashboard"><a href="#commentaires" class="intern-link-dashboard">Commentaires</a></li>
              </ul>
            </nav>
          </div>
        
      <div class="container-dashboard" id="dashboard">

          <div class="row" style="margin-bottom: 3%;">

            <div class="col-12" id="box-dashboard" style="margin-bottom: 3%;">

              
                <form method="post" action="">
                <h4 class="title-dashboard"><i class="fas fa-pen"></i>Ecrire un Chapitre</h4>
                    <div class="col-12">
                      <input type="text" id="form-writting" name="title" placeholder="Titre" style="height: 3.3rem;">
                      <textarea id="form-writting" name="content"></textarea>
                      <input type="submit" id="form-writting" value="Publier">
                    </div>
                    
                </form>
              
            </div>

          </div>

          <div class="row" style="margin-bottom: 3%;">

            <div class="col-12" id="box-dashboard">
              <h4 class="title-dashboard"><i class="fas fa-list-alt"></i>Liste des chapitres (<?= $chapters->rowCount(); ?>)</h4>

              <div class="row">
                <div class="col-12">
                  <label>                   
                      <select name="chapters" multiple="yes" style="width: 100%; height: 350px;">
                          <?php foreach ($chapters as $chapter): ?>
                               <option value="<?= $chapter['title'] ?>"><?= $chapter['title'] ?></option>
                          <?php endforeach; ?>
                      </select>
                  </label>
                </div>
              </div>

            </div>

          </div>

          <!--<div class="row">

            <div class="col-11" id="modification" style="margin-bottom: 3%;">
              <h4 class="title-dashboard"><i class="fas fa-edit"></i>Supprimer / modifier un chapitre</h4>
            </div>

            <div class="col-12" id="box-dashboard" style="margin-bottom: 3%;">
              <h4 class="title-dashboard"><i class="fas fa-comments"></i>Commentaires</h4>
            </div>

          </div>-->

      </div>
    </section>
</body>

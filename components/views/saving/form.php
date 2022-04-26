<body>
    <div class="container mt-5">
        <h3 class="title mb-3 text-primary"><?= $create == 1 ? "Nouveau sauvetage" : "Modifier le sauvetage" ?></h3>
        <form action="">
            <div class="form-group">
                <input type="text" name="savingName" placeholder="Titre du sauvetage" class="form-control">
            </div>
            <div class="col-4" style="padding:0;">
                <label for="nbSauve">Nombre de personnes sauvés :</label>
                <input type="number" name="nbSauve" id="nbSauve" class="form-control" value="0">
            </div>
            <div class="form-group">
                <label for="">Equipage :</label>
                <div class="container template" id="template-person">
                    <div class="form-group" style="display:flex;">
                        <input type="hidden" name="crew[0][persons][id][]">
                        <input type="text" class="form-control" name="crew[0][persons][name][]" id="search-person" placeholder="Chercher une personne">
                        <button class="btn btn-primary ml-1" aria="0"><i class="fas fa-plus"></i> Nouveau</button>
                    </div>
                </div>
                <div class="form-group template" id="template-boat">
                    <div class="master-boat">
                        <div class="form-group" style="display:flex;">
                            <input type="hidden" name="crew[0][id]" value="0">
                            <input type="text" class="form-control" name="crew[0][name]" id="search-boat" placeholder="Chercher un bateau">
                            <button class="btn btn-primary ml-1"><i class="fas fa-plus"></i> Nouveau</button>
                        </div>
                        <div class="container" id="content-person" aria="0"></div>
                        <div class="form-group">
<button class="btn btn-primary btn-lg btn-block add-person" type="button" id="add-person" aria="0">Ajouter une personne</button>
                        </div>
                    </div>
                </div>
                <div id="content-boat"></div>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" type="button" id="add-boat">Ajouter un bateau</button>
                </div>
            </div>
            <div class="form-group">
                <label for="history">Histoire :</label>
                <textarea name="" id="history" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="text-right">
                <button class="btn btn-primary">Créer</button>
            </div>
        </form>
    </div>
</body>
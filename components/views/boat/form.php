<body>
    <div class="container mt-5">
        <h3 class="title mb-3 text-primary"><?= $create == 1 ? "Nouveau Bateau" : "Modifier le bateau" ?></h3>
        <form action="" method="POST">
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="bname" placeholder="Nom du bateau" class="form-control">
                    </div>
                    <div class="col-6">
                        <input type="text" name="imatriculation" placeholder="Immatriculation du bateau" class="form-control">
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="model" placeholder="Modèle du bateau" class="form-control">
                    </div>
                    <div class="col-6">
                        <input type="text" name="motor" placeholder="Moteur du bateau" class="form-control">
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="launchDate" placeholder="Date de lancement (dd/mm/yyyy)" class="form-control">
                    </div>
               </div>
            </div>
            <div class="text-right">
                <button class="btn btn-primary">Créer</button>
            </div>
        </form>
    </div>
</body>
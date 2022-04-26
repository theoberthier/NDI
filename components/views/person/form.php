<body>
    <div class="container mt-5">
        <h3 class="title mb-3 text-primary"><?= $create == 1 ? "Nouvelle personne" : "Modifier la personne" ?></h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="fullname" placeholder="Nom complet" class="form-control">
                    </div>
                    <div class="col-6">
                        <input type="text" name="grade" placeholder="Grade" class="form-control">
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="pics"></label>
                        <input type="file" class="form-control-file" name="pics" placeholder="Image" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="gender">Genre</label>
                        <select class="form-select" name="gender" aria-label="Genre">
                            <option value="0" selected>Homme</option>
                            <option value="1">Femme</option>
                        </select>
                    </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="birth" placeholder="Date de naissance (dd/mm/yyyy)" class="form-control">
                    </div>
                    <div class="col-6">
                        <input type="text" name="grade" placeholder="Date de decès (Optionnel) (dd/mm/yyyy)" class="form-control">
                    </div>
               </div>
            </div>
            <div class="form-group">
                <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="text-right">
                <button class="btn btn-primary">Créer</button>
            </div>
        </form>
    </div>
</body>
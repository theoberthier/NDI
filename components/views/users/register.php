<body>
    <div class="container mt-5">
        <h3 class="title mb-3 text-primary">Register</h3>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" name="email" placeholder="Votre adresse email" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="pseudonyme" placeholder="Votre pseudonyme" class="form-control">
            </div>
            <div class="form-group row">
                <div class="col-6" style="padding:0;">
                    <input type="text" name="firstName" placeholder="Votre prénom (facultatif)" class="form-control">
                </div>
                <div class="col-6" style="padding:0;">
                    <input type="text" name="lastName" placeholder="Votre nom de famille (facultatif)" class="form-control">
                </div>
            </div>
            <div class="form-group row">
            <div class="col-6" style="padding:0;">
                    <input type="password" name="passwd" placeholder="Votre mot de passe" class="form-control">
                </div>
                <div class="col-6" style="padding:0;">
                    <input type="password" name="confPasswd" placeholder="Confirmez votre mot de passe" class="form-control">
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</body>
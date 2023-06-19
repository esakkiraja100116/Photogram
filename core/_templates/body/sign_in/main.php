
<?php echo Load::body("sign_in", "action")?>

<main class="form-signin w-100 m-auto">
    <?php
    
    if(Session::get("user_login") == "failed") {
        Alert::msg("Authentication failed");
        Session::destroy();
    }

    ?>
    <form action="" method="POST">
        <img class="mb-4" src="../assets/insta.png" alt="" width="80" height="72">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn mt-3 btn-lg btn-primary" type="submit">Sign in</button>
    </form>
</main>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['user'])): ?>
                <script>
                    alert('You are logged in');
                    window.location.href = "/";
                </script>
            <?php else: ?>
                <form action="/auth/login" method="post" role="form">
                    <legend>Sign In</legend>
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" name="login" id="login">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php if ($data): ?>
                <div class="alert alert-danger" role="alert">
                    <?=$data?>
                </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

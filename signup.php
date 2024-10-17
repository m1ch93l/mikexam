<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location: admin/home');
}

if (isset($_SESSION['participant'])) {
    header('location: home');
}
?>
<!-- header of html -->
<?php include 'includes/header.php'; ?>

<body>
    <div class="container-fluid d-flex align-items-center justify-content-center vh-100">

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        <h3 class="card-title">mikexam</h3>
                    </div>
                    <div class="card-body">

                        <form action="crud" method="post">
                            <div class="form-group">
                                <label for="participant">Username</label>
                                <input type="text" class="form-control" id="participant" name="participant" autofocus>
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                <br>
                                <button type="submit" class="float-end btn btn-success btn-sm mb-1 me-2"
                                    name="register">
                                    Register
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
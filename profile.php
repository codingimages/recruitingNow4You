<?php
require_once 'partials/config.php';
require_once 'partials/db.php';
require_once 'partials/func.php';

if(!isset($_SESSION['user_data'])){
    return header('Location:login.php');
}
?>
    <?php require_once 'partials/header.php' ?>

    <header class="my-3 text-center">
        <div class="container">
            <div class="jumbotron jumbotron-fluid bg-primary text-light">
                <div class="container">
                    <h1 class="display-5">Profile</h1>
                    <p class="lead">Password update</p>
                </div>
            </div>
        </div>
    </header>

    <main class="mb-5">
        <div class="container">
            <div>
                <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
    ?>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="mb-3 text-right">
                        <a href="booking.php" class="btn btn-warning">Home</a>
                        <a href="viewAll.php" class="btn btn-success">See All</a>
                        <a href="logout.php" class="btn btn-danger">Log out</a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="cart-title">Profile details</h5>
                        </div>
                        <div class="card-body">

                            <table class="table table-hover table-responsive-md">
                                <?php $user_data = $_SESSION['user_data']; ?>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope='row'>
                                        <?php echo $user_data->id; ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Correo Electrónico</th>
                                    <td>
                                        <?php echo $user_data->email; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Password</th>
                                    <td>
                                        <form action="partials/processPassword.php" method="post">
                                            <div class="form-row align-items-center">
                                                <div class="col-auto">
                                                    <label class="sr-only">Password</label>
                                                    <input type="password" name="password" class="form-control mb-2" placeholder="Entra nueva contraseña" required>
                                                </div>
                                                <div class="col-auto">
                                                   <input type="hidden" name="id" value="<?php echo $user_data->id ?>">
                                                    <button type="submit" name="submit" class="btn btn-primary mb-2">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'partials/footer.php' ?>

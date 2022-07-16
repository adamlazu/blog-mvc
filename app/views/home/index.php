
<div class="jumbotron jumbotron-fluid mt-5">
  <div class="container text-center">
    <h1 class="display-4">Go-Blog</h1>
    <p class="lead">Welcome to go-blog.</p>
  </div>
  <div class="container">
    <?php if(!isset($_SESSION['user'])){ ?>
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Register!
        </button>
    <?php } ?>
        <?php Flash::getFlash(); ?>
    </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Register</h3>
        <form action="<?php echo BASEURL; ?>/user/register" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username">
            </div>

            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="password">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
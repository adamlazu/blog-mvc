<div class="container mt-5">
    <?php Flash::getFlash(); ?>
    <h2>login form</h2>
    <div class="row mt-3">
        <div class="col-md-4">
            <form action="<?php echo BASEURL; ?>/user/login" method="post">
                <div class="input-group mb-3">
                    
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username">
                </div>

                <div class="input-group mb-3">
                   
                    <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Login!</button>
            </form>
        </div>
        <div class="col-md-8">
            <h3 class="text-center">Experience the new kind of blog, Go-blog</h3>
        </div>
    </div>
</div>
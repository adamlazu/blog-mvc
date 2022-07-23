<div class="container">
    <?php Flash::getFlash(); ?>
    <nav aria-label="...">
  <ul class="pagination justify-content-center mt-3">
    <?php for($i = 1; $i<= $data['pages'];$i++){ ?>
        <li class="page-item" aria-current="page">
            <a class="page-link" href="<?php echo BASEURL; ?>/article/<?php echo $i ?>"><?php echo $i; ?></a>
        </li>
    <?php } ?>
  </ul>
</nav>
    <div class="row">
        <div class="col-md-8 mt-2">
            <?php if($data['total']!=0){ ?>
                <?php foreach($data['articles'] as $article){ ?>
                <div class="card mt-1">
                    <div class="card-body d-flex justify-content-between">
                        <div class="judul text-center">
                            <h3><?php echo $article->title; ?></h3>
                            <h5><?php echo $article->author; ?></h5>
                        </div>
                        <div class="button mt-3">
                            <a type="button" class="btn btn-primary" href="<?php echo BASEURL; ?>/article/read/<?php echo $article->id ?>">Read More</a>
                        </div>
                    </div>
                </div>
                <?php }?>
                <?php }else{ ?>
                    <div class="card mt-1">
                        <div class="card-body d-flex justify-content-between">
                            <div class="judul text-center">
                                <h2>There's no article yet, write some!</h2>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php if(isset($_SESSION['user'])){ ?>
                <div class="button mt-3">
                    <a type="button" class="btn btn-primary" href="<?php echo BASEURL; ?>/article/write">Write!</a>
                </div>
                <?php } ?>
        </div>
        <div class="col-md-4 mt-5">
            <h2 class="text-center">Our finest articles from top tier authors.</h2>
        </div>
    </div>

</div>
<div class="container">
    <h2 class="text-center my-3">Write a new article.</h2>
    <div class="row">
        <div class="col-md-8">
            <form action="<?php echo BASEURL; ?>/article/add" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1" name="title">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Tags" aria-label="Username" aria-describedby="basic-addon1" name="tag">
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px" name="content"></textarea>
                    <label for="floatingTextarea2">Content</label>
                </div>
            </div>
            <div class="col-md-4">
                <p class="lead">
                    Go-blog provides a place for every writers to share their ideas freely.
                </p>
                <button class="btn btn-primary" type="submit">add!</button>
            </form>
        </div>
    </div>
</div>
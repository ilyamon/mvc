<!-- Blog Entries Column -->
<div class="col-md-8">
    <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
    </h1>

<!-- Blog Post -->
<div class="card mb-4">
    <?php if($data) : ?>
        <?php foreach ($data as $dat) : ?>
            <img class="card-img-top" src="/web/site/image/post1.jpg" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title"><?php echo $dat->title; ?></h2>
                <p class="card-text"><?php echo $dat->sub_title; ?></p>
                <a href="/main/post?<?php echo $dat->id; ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on January 1, 2017 by
                <a href="#">Start Bootstrap</a>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
    <?php endif; ?>
</div>

<!-- Blog Entries Column -->
<?php if($data) : ?>
<?php foreach ($data as $data) : ?>
<div class="col-md-8">
    <h1 class="my-4"><?php echo $data->title; ?>
        <small>Secondary Text</small>
    </h1>

<!-- Blog Post -->

<div class="card mb-4">

            <img class="card-img-top" src="/web/site/image/post1.jpg" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title"></h2>
                <p class="card-text"><?php echo $data->sub_title; ?></p>
                <p class="card-text"><?php echo $data->content; ?></p>
            </div>
            <div class="card-footer text-muted">
                Posted on January 1, 2017 by
                <a href="#">Start Bootstrap</a>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
    <?php endif; ?>
</div>

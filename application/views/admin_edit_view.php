
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/main">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">update</li>
        </ol>

        <!-- Example DataTables Card-->
        <div class="row">
            <div class="col-12">
                <?php if($data) : ?>
                <?php foreach ($data as $data) : ?>
                <form method="POST" action="">
                    <label>
                        Title: <br>
                        <input name="title" type="text" value="<?php echo $data->title ?>" placeholder="" />
                    </label>
                    <br>
                    <label>
                        Sub Title: <br>
                        <textarea rows="6" cols="50"  name="sub_title" value=""><?php echo $data->sub_title ?></textarea>
                    </label>
                    <br>
                    <label>
                        Content: <br>
                        <textarea rows="6" cols="50" name="content"  value=""><?php echo $data->content ?></textarea>
                    </label>
                    <br>
                    <button>Save</button>
                </form>
                <?php endforeach; ?>
                <?php else: ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->


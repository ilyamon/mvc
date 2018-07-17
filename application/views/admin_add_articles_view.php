<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/main">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add new</li>
        </ol>

        <!-- Example DataTables Card-->
        <div class="row">
            <div class="col-12">
                <form method="POST" action="">
                    <label>
                        Title: <br>
                        <input name="title" type="text" value="" placeholder="" />
                    </label>
                    <br>
                    <label>
                        Sub Title: <br>
                        <textarea rows="6" cols="50"  name="sub_title" value=""></textarea>
                    </label>
                    <br>
                    <label>
                        Content: <br>
                        <textarea rows="6" cols="50" name="content"  value=""></textarea>
                    </label>
                    <br>
                    <button>Add</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
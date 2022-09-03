<!doctype html>
<html lang="en">
<head>
    <?php
    require_once 'admin -head.php';
    ?>
    <title>ADD TOVARY</title>
</head>
<body>
<?php
require_once 'sidebar.top.php';
?>

<?php
    include '../db/DB.php';
    $cats = getAllCategories();
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <form action="addgood.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" name="gname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label>description</label>
            <input type="text" name="gdescription" class="form-control" placeholder="Enter description">
        </div>

        <div class="form-group">
            <label>price</label>
            <input type="number" name="gprice" class="form-control" placeholder="Enter Price">
        </div>

        <div class="form-group">
                <label>Qty</label>
            <input type="text" name="qty" class="form-control" placeholder="Enter Qty">
        </div>

        <!--    <div class="form-group">-->
        <!--        <label>price</label>-->
        <!--        <input type="number" name="gprice" class="form-control"placeholder="Enter Price">-->
        <!--    </div>-->

        <div class="form-group">
            <label>category</label>
            <select name="gct" class="form-select" required>
                <?php
                if ($cats!=null){
                    foreach ($cats as $ct){

                        ?>
                        <option value="<?php echo $ct['id']; ?>"><?php echo $ct['name']; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control btn" type="file" name="gpic" id="formFile">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<?php
require_once 'sidebar-bottom.php';
?>
</body>
</html>

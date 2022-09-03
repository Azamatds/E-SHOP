<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once 'admin -head.php';
    ?>
</head>

<body id="page-top">
<?php
require_once 'sidebar.top.php';
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a class="btn btn-danger" href="">Add Category</a>
    </div>

    <?php
    require_once '../db/DB.php';
    ?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $categories = getAllCategories();
        foreach ($categories as $c){

            ?>
            <tr>
                <td> <?php echo $c['id']?> </td>
                <td><?php echo $c['name']?></td>
                <td><?php echo $c['description']?></td>
                <td><a class="btn btn-primary" href="onegood.php?id=<?php echo $c['id']; ?>">
                        Details</a>
                    <form action="deleteCategory.php" method="post" class="mt-3">
                        <input type="hidden" name="catid" value="<?php echo $c['id'];?>">
                        <button class="btn btn-danger">DELETE</button>
                    </form>
                </td>
            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

<?php
require_once 'sidebar-bottom.php';
?>
</body>

</html>
<?php
    // require the database connection
    require 'classes/conn.php';
    
    // --- ADDED: Get Sort and Order from URL ---
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'lname';
    $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

    // Safety Whitelist for columns
    $allowed = ['lname', 'age', 'email', 'course', 'lrn'];
    if (!in_array($sort, $allowed)) { $sort = 'lname'; }
    $order = ($order === 'DESC') ? 'DESC' : 'ASC';
    // ------------------------------------------

    if(isset($_POST['search_eleven'])){
        $keyword = $_POST['keyword'];
?>
<div class="table-responsive" style="width: 100%; overflow-x: auto;">
    <table class="table table-hover text-center table-bordered" style="min-width: 1000px;"> 
        <thead class="alert-info">
            <tr>
                <th> LRN </th>
                <th> Course </th>
                <th> Full Name </th>
                <th> Birthday</th>
                <th> Age </th>
                <th> Contact </th>
                <th> Email </th>
                <th> Actions</th>
            </tr>
        </thead>
        <tbody>    
            <?php
                // Use prepared statements correctly with placeholders
                $stmnt = $conn->prepare("SELECT * FROM `tbl_eleven` WHERE (`lname` LIKE :keyword 
                                         OR `fname` LIKE :keyword 
                                         OR `lrn` LIKE :keyword) 
                                         ORDER BY $sort $order");
                
                $stmnt->execute(['keyword' => "%$keyword%"]);
                
                while($view = $stmnt->fetch()){
            ?>
                <tr>
                    <td> <?= $view['lrn'];?> </td>
                    <td> <?= $view['course'];?> </td>  
                    <td> <?= $view['lname'];?>, <?= $view['fname'];?> <?= $view['mi'];?></td>
                    <td> <?= $view['bdate'];?> </td>
                    <td> <?= $view['age'];?> </td>
                    <td> <?= $view['contact'];?> </td>
                    <td> <?= $view['email'];?> </td>
                    <td>    
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewModalSearch<?= $view['id_resident'] ?>">
                            <i class="fa fa-eye"></i> View
                        </button>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="id_eleven" value="<?= $view['id_eleven'];?>">
                            <button class="btn btn-danger" type="submit" style="width: 90px; font-size: 17px; border-radius:30px;" name="delete_eleven"> Archive </button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
</div>

<?php       
    } else { 
    // DEFAULT VIEW
?>

<div class="table-responsive" style="width: 100%; overflow-x: auto;">
    <table class="table table-hover text-center table-bordered" style="min-width: 1000px;"> 
        <thead class="alert-info">
             <tr>
                <th> LRN </th>
                <th> Course </th>
                <th> Full Name </th>
                <th> Birthday</th>
                <th> Age </th>
                <th> Contact </th>
                <th> Email </th>
                <th> Actions</th>
            </tr>
        </thead>
        <tbody>
    <?php if(is_array($view)) { ?>
        <?php foreach($view as $row) { ?>
        <tr>
            <td> <?= $row['lrn'];?> </td>
            <td> <?= $row['course'];?> </td> 
            <td> <?= $row['lname'];?>, <?= $row['fname'];?> <?= $row['mi'];?></td>
            <td> <?= $row['bdate'];?> </td>
            <td> <?= $row['age'];?> </td>
            <td> <?= $row['contact'];?> </td>
            <td> <?= $row['email'];?> </td>
            <td>    
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewModal<?= $row['id_resident'] ?>">
                    <i class="fa fa-eye"></i> View
                </button>
                
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="id_eleven" value="<?= $row['id_eleven'];?>">
                    <button class="btn btn-danger" type="submit" name="delete_eleven"> Archive </button>
                </form>
            </td> 
        </tr>
        <?php } ?>
    <?php } ?>
</tbody>
    </table>
</div>
<?php
    }
$conn = null;
?>
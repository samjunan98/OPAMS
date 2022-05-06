<?php
include("config.php");
$query = "SELECT * FROM category";
$result1 = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html>
<select>
    <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
        <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
    <?php endwhile; ?>
</select>

</html>
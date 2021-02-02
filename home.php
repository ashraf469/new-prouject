<?php
session_start();
if(isset($_SESSION['Id'])){
    include 'cone.php';
echo "welcom";

?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
<input type="text" name="post">
<input type="hidden" name="user" value="<?php echo $_SESSION['Username']?>">
<button>send</button>
</form>

<?php
include 'cone.php';
$post = $_POST['post'];
$user = $_POST['user'];

$stmt = $conect->prepare("INSERT INTO post (`Post`, `Username`) VALUES (:a, :b)");
$stmt->execute(array('a' => $post, 'b' => $user));

}
else{
    echo 'this page is not avilable';
    }


?>
<div>
<?php
$st = $conect->prepare("SELECT * FROM `post`");
$st->execute();
$arrays = $st->fetchall();
foreach($arrays as $array){
    echo '<h5 class="user">' . $array['Username'] . '<h5>';
    echo '<div class="post">' . $array['Post'] . '<div>';
}
?>
</div>

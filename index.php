<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticket";
// Create connection - Créer connexion
$conn = new mysqli($servername, $username, $password, $dbname);

$code=0;
$code = $_POST["code"];

?>

<h1>ticket</h1>

<form method="POST">
    <label for="">entré le code:</label><input type="number" name="code" id="code" value="<?php echo $code; ?>">
    <button type="submit">confirmé code</button>

    </form>

<?php
$sql = "SELECT code, article FROM articles";
$result = $conn->query($sql);

if($code==0){
 echo "Le code zéro est un cas particulier !";
}elseif($code>=1000){
 echo "Le code est incorrect, trop grand !";
}else{
    while($row = $result->fetch_assoc()){
    if($row["code"]==$code){
echo "le code " . $row["code"]. " est correct." ." l'information correspondant est : ". $row["article"]. "<br>";   
    }
}
}

?>
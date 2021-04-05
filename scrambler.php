<?php
include_once("scramblerf.php");

$task = "encode";
if (isset($_GET['task'])  && $_GET['task'] != '') {
    $task = $_GET['task'];
}

$key = 'abcdefghijklmnpqrstuvwxyz1234567890';
if ('key' == $task) {
    $key_original = str_split($key);
    shuffle($key_original);
    $key = join('', $key_original);
}else if(isset($_REQUEST['key']) && $_REQUEST['key']!=""){
    $key=$_REQUEST['key'];
}
$scrambleData='';
if('encode'==$task){
    $data=$_REQUEST['data'] ??'';
    if($data !=''){
        $scrambleData=$scrambleData($data,$key);
    }
}
if('decode'==$task){
    $data=$_REQUEST['data'] ??'';
    if($data !=''){
        $scrambleData=$decodeData($data,$key);
    }
}






?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Data Scrambler</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-3 mb-3"> Data Scrambler</h2>
        <h3 class="text-center mt-3 mb-3">Use this application to scramble your data</h3>
        <div class="row offset-3">
            <div class="col-sm-3">
                <p class="font-weight-bolder">
                    <a class="text-decoration-none" href="/scrambler.php?task=encode">Encode</a>
                </p>
            </div>
            <div class="col-sm-3">
                <p class="font-weight-bolder">
                    <a class="text-decoration-none" href="/scrambler.php?task=decode&key=<?php echo $key ?>">Decode</a>
                </p>
            </div>
            <div class="col-sm-3">
                <p class="font-weight-bolder">
                    <a class="text-decoration-none" href="/scrambler.php?task=key">Generate Key</a>
                </p>
            </div>
        </div>

        <div class="mt-4 offset-3">

            <form method="REQUEST" action="scrambler.php"<?php if('decode'==$task) echo "?task=decode";?>>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <label for="key">Key:</label>
                        <br>
                        <input type="text" class="form-control" name="key" id="key" <?php displayKey($key) ?>>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <label for="data">Data</label>
                        <br>
                        <textarea name="data" class="form-control"  id="data" cols="2" rows="3"><?php  if(isset($_POST['data'])){echo $_POST['data'];}?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <label for="result">Result</label>
                        <br>
                        <textarea id="result" class="form-control"  cols="" rows="5" ><?php echo $scrambleData;?></textarea>
                    </div>
                </div>




                <div class="col-sm-3">
                    <button type="submit" class="form-control btn-sm bg bg-danger">Do It for me</button>
                </div>



        </div>


        </form>


    </div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>
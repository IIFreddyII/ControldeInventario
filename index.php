<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
</head>
<body>
<br>
<div class="container" style="border: 2px solid #d0d0d0; background: #F6F3B8;">
    <div class="text-center" >
    <form action="src/values.php" method="post">
        <br><h1 >Control de Produccion</h1><br>
            <div class="mb-3 row">
                <label for="idArticulo" class="col-sm-2 col-form-label fw-bold">ID Articulo: </label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="numberArticulo" min=0>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">T1: </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="T1" min=0>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">T2: </label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="T2" min=0>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">S1: </label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="S1" min=0>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">S2: </label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="S2" min=0>
                </div>
            </div>
            <div>
            <button class="btn btn-outline-primary btn-lg">Submit</button>
            </div>
            <br>
        </form>
    </div>
</div>

</body>
</html>
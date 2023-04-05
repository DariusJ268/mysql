<?php include "./DB.php" ?>
<?php include "./Book.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Knygu Duombaze</title>
</head>

<body>
    <?php
    $books = [];
    $db = new DB();
    $query = "SELECT * FROM `books`";
    $result = $db->conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $books[] = new Book($row['id'], $row['title'], $row['genre'], $row['author_id']);
    }
    $db->conn->close();

    // var_dump($books);

    ?>

    <h1 class="text-center">Biblioteka</h1>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <table class="table table-striped table-hover">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Author ID</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($books as $book) { ?>
                    <tr>
                        <td> <?= $book->id ?></td>
                        <td> <?= $book->title ?></td>
                        <td> <?= $book->genre ?></td>
                        <td> <?= $book->authorId ?></td>
                        <td> <button class="btn btn-outline-secondary">Show</button></td>
                        <td> <button class="btn btn-outline-success">Edit</button></td>
                        <td> <button class="btn btn-outline-danger">Delete</button></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="col-sm-2"></div>
    </div>

</body>

</html>
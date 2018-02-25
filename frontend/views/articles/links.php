<div class="container">
    <div class="row">
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Book_id</th>
                <th>Author_id</th>
                <th>Book</th>
                <th>Description</th>
            </tr>
            <?php foreach($res as $data): ?>
                <tr>
                    <td><?=$data['id']?></td>
                    <td><?=$data['book_id']?></td>
                    <td><?=$data['author_id']?></td>
                    <td><?=$data['book']?></td>
                    <td><?=$data['description']?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
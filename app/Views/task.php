<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <h1>Tasks List</h1>
            <span>Sort By</span>
            <span><a href="?orderBy=user_name" class="text-muted">name</a></span>
            <span><a href="?orderBy=email" class="text-muted">email</a></span>
            <span><a href="?orderBy=status" class="text-muted">status</a></span>
            <div class="row">
                <?php foreach ($data as $task): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow" style="width: 15rem;">
                            <img class="card-img-top" src="<?=$task['image_path']?>" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Author: <?=$task['user_name']?></p>
                                <p class="card-text">Email: <?=$task['email']?></p>
                                <p class="card-text"><?=$task['text']?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <?php if (isset($_SESSION['user']) && $_SESSION['user'] === 'admin'): ?>
                                        <div class="btn-group">
                                            <a class="btn btn-default" href="/task/edit/?id=<?=$task['id'];?>">Edit</a>
                                        </div>
                                    <?php endif; ?>
                                    <small class="text-muted">
                                        <?php if ($task['status'] === 0): ?>
                                            closed
                                        <?php else: ?>
                                            open
                                        <?php endif ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
                    <li class="page-item"><a class="page-link" href="?page=3">3</a></li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</main>
<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
    </div>
</footer>



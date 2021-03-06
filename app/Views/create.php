<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1>New Task</h1>
            <form action="/task/store" method="post" role="form" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="300000"/>
                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" name="user_name" id="user_name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="text">Task</label>
                    <textarea class="form-control" name="text" id="text"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <button type="button" class="btn btn-primary" id="preview">Preview</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-4" id="preview_card" style="display: none;">
            <h2>Preview</h2>
            <div class="card mb-4 box-shadow" style="width: 15rem;">
                <div class="card-body">
                    <p class="card-text" id="prev_user_name"></p>
                    <p class="card-text" id="prev_email"></p>
                    <p class="card-text" id="prev_text"></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">open</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/script.js"></script>

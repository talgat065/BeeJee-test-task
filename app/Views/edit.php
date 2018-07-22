<div class="container">
    <div class="row">
        <form action="/task/update" method="post" role="form" enctype="multipart/form-data">
            <legend>New Task</legend>
            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <input type="hidden" name="id" value="<?=$data['id']?>" />
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" class="form-control" disabled name="user_name" id="user_name" value="<?=$data['user_name']?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" disabled name="email" id="email" value="<?=$data['email']?>">
            </div>
            <div class="form-group">
                <label for="text">Task</label>
                <textarea class="form-control" name="text" id="text"><?=$data['text']?></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="1" <?php if ($data['status'] === 1): echo 'selected'; endif?>>Open</option>
                    <option value="0" <?php if ($data['status'] === 0): echo 'selected'; endif?>>Closed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

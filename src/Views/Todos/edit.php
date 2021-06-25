<h1>Edit todo</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" value="<?php if ($todo->get("title") !== null) echo $todo->get("title"); ?>">
    </div>

    <div class="form-group">
        <label for="user">User</label>
        <input type="text" class="form-control" id="user" placeholder="Enter a user" name="user" value="<?php if ($todo->get("user") !== null) echo $todo->get("user"); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
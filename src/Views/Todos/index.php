<h1>Todos</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            <a href="/MVC/todos/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new todo</a>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>User</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        foreach ($todos as $todo) {
            echo '<tr>';
            echo "<td>" . $todo->get("id") . "</td>";
            echo "<td>" . $todo->get("title") . "</td>";
            echo "<td>" . $todo->get("user") . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/MVC/todos/edit/" . $todo->get("id") . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/MVC/todos/delete/" . $todo->get("id") . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
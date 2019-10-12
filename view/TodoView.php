<?php

namespace view;

class TodoView {

    private static $addTodo = 'View::AddTodo';
    private $todos = array();

    public function response()
    {

        echo '<!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Todo</title>
                <link href="https://fonts.googleapis.com/css?family=Germania+One&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="css/main.css">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>
            <body>
                <div class="list">
                    <h1 class="header">To do.</h1>
                    <ul class="items">
                        ' . $this->renderTodos() . '
                    </ul>
                    <form class="item-add" method="post">
                        <input type="text" name="name" placeholder="Type a new todo here." class="input" autocomplete="off" required>
                        <input type="submit" value="Add" name="' . self::$addTodo . '" class="submit">
                    </form>
                </div>
            </body>
        </html>';
    }
}
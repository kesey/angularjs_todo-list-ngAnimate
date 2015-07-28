<!DOCTYPE html>
<html>
    <head>
        <title>TODO_List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/todo.css">
        <link rel="stylesheet" href="css/animate.css">
		<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular.min.js"></script>
        <script type="text/javascript" src="https://code.angularjs.org/1.4.2/angular-animate.min.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
    </head>
    <body ng-app="myApp">
        <section id="todoapp" ng-controller="TodoCtrl">
            <header id="header">
                <h1>Todo List</h1>
                <form action="#" id="todo-form" ng-submit="addTodo()">
                    <input type="text" id="new-todo" ng-model="newtodo" placeholder="{{placeholder}}" autofocus autocomplete="off">
                </form>
            </header>
            <section id="main">
                <input type="checkbox" ng-model="allchecked" ng-click="checkAllTodo(allchecked)">
                <ul id="todo-list">
                    <li ng-repeat="todo in todos | filter: statutFilter | orderBy: 'completed' : false" ng-class="{completed: todo.completed, editing: todo.editing}" class="view" ng-dblclick="todo.editing = true">
                        <div class="view">
                            <input type="checkbox" class="toggle" ng-model="todo.completed">
                            <label>{{todo.name}}</label>
                            <button class="destroy" ng-click="removeTodo($index)"></button>
                        </div>
                        <form action="#">
                            <input class="edit" ng-model="todo.name" ng-blur="editTodo(todo)">
                        </form>
                    </li>                    
                </ul>
            </section>
            <footer id="footer">
                <span id="todo-count"><strong>{{remaining}}</strong> Tâches restantes</span>
                <ul id="filters">
                    <li><a href="#" ng-class="{selected: location.path() == ''}">Toutes</a></li>
                    <li><a href="#/active" ng-class="{selected: location.path() == '/active'}">à faire</a></li>
                    <li><a href="#/done" ng-class="{selected: location.path() == '/done'}">Faites</a></li>
                </ul>
            </footer>
        </section>        
    </body>
</html>


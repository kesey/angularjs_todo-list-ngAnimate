var app = angular.module("myApp", ['ngAnimate']);

app.directive('ngBlur', function(){
    return function(scope, elem, attrs) {
        elem.bind('blur', function() {
            scope.$apply(attrs.ngBlur);
        });
    };
});

app.controller("TodoCtrl", function($scope, filterFilter, $http, $location) {
    $scope.placeholder = "Chargement...";
    $scope.todos = [];
    $scope.statutsFilter = {};
    
    $http.get('todos.php').success(function(data) {
        $scope.todos = data;
        $scope.placeholder = "Ajouter une nouvelle tâche";
    });
    
    $scope.$watch('todos', function(){
        $scope.remaining = filterFilter($scope.todos, {completed: false}).length;
        $scope.allchecked = !$scope.remaining;
    }, true);
    
    $scope.location = $location;
    $scope.$watch('location.path()', function(path){
        switch(path) {
            case '/active':
                $scope.statutFilter = {completed: false};
                break;
            case '/done':
                $scope.statutFilter = {completed: true};
                break;
            default: 
                $scope.statutFilter = {};
        }        
    });
    
    $scope.removeTodo = function(index) {
        $scope.todos.splice(index,1);
    };
    
    $scope.addTodo = function() { 
        $scope.todos.push({
            name: $scope.newtodo,
            completed: false
        });
        $scope.newtodo = "";
    };
    
    $scope.editTodo = function(todo) {
        todo.editing = false;
    };
    
    $scope.checkAllTodo = function(allchecked) {
        $scope.todos.forEach(function(todo) {
            todo.completed = allchecked;
        });
    };
});


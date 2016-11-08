## TASK #3
Using Angular 1.4.x and JQuery make a query to the database


## STEPS

- configured local server MAMP - https://www.mamp.info/en/;
- created database `student_registry` via http://localhost:8888/phpMyAdmin;
- created table `students` (`id`, `first_name`, `last_name`, `address`, `city`);
- created index.html;
- created angular script;

```
var app = angular.module("studentRegistryApp", []);



app.controller('MainController', function($scope, $http) {
  $scope.insertdata = function () {
    $http.post("insert.php", {
      'first_name':$scope.first_name,
      'last_name':$scope.last_name,
      'address':$scope.address,
      'city':$scope.city})
    .success(function (data) {
      console.log(data);
    });
  };
});

```

- created insert.php;

```
<?php
$data = json_decode(file_get_contents("php://input"));
$id = mysql_real_escape_string($data->id);
$first_name = mysql_real_escape_string($data->first_name);
$last_name = mysql_real_escape_string($data->last_name);
$address = mysql_real_escape_string($data->address);
$city = mysql_real_escape_string($data->city);

mysql_connect("localhost", "root", "");
mysql_select_db("student_registry");
mysql_query("INSERT INTO students (`first_name`, `last_name`, `address`, `city`) VALUES('".$id."', '".$first_name."', '".$last_name."', '".$address."', '".$city."')");
 ?>
```

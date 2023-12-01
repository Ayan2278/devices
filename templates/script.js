// var app=angular.module("Demo",["ngRoute"])
//                 app.config(function($routeProvider){
//                     $routeProvider
//                     .when("/", {
//                         templateUrl:"home.html",
//                         controller:"homeController"
//                     })
//                     .when("/courses", {
//                         templetaUrl:"courses.html",
//                         controller:"coursesController"
//                     })
//                     .when("/students", {
//                         templetaUrl:"students.html",
//                         controller:"studentController"
//                     });
//                 });
                // .controller("homeController", function ($scope) {
                //     $scope.message = "Home Page";
                // })
                // .controller("coursesController", function ($scope) {
                //     $scope.courses = ["C#", "VB.NET", "ASP.NET", "SQL Server", "AngularJS", "JavaScript"];
                // })
                //  .controller("studentController", function ($scope, $http) {
                //     $scope.student = ["Jinal", "Meet", "Ayan", "Varun", "Sanem", "JK"];
                //  })

                var app = angular.module("Demo", ["ngRoute"]);
                app.config(function ($routeProvider) {
                    $routeProvider
                        .when("/", {
                            templateUrl: "home.html",
                           
                        })
                        .when("/courses", {
                            templateUrl: "courses.html",
                           
                        })
                        .when("/students", {
                            templateUrl: "students.html",
                            
                        });
});
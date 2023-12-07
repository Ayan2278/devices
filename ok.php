<!DOCTYPE html> 
<html ng-app="myApp"> 

<head> 
	<meta name="viewport"
		content="width=device-width, 
				initial-scale=1"> 
	<link rel="stylesheet" href= 
"https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
	<script src= 
"https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"> 
	</script> 
	<style> 
		body { 
			font-family: Arial, sans-serif; 
			background-color: #f5f5f5; 
			margin: 0; 
			padding: 0; 
		} 

		.header { 
			text-align: center; 
			padding: 20px; 
			margin: 0; 
		} 

		.header h1 { 
			color: #4CAF50; 
			font-size: 36px; 
			margin: 0; 
			font-weight: bold; 
		} 

		.sub-header { 
			text-align: center; 
			color: #333; 
			font-size: 20px; 
			margin: 0; 
			padding: 10px; 
		} 

		.article-list { 
			list-style-type: none; 
			padding: 0; 
			margin: 20px; 
		} 

		.article-item { 
			margin: 10px 0; 
			padding: 10px; 
			background-color: #ffffff; 
			border-radius: 5px; 
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
		} 

		.filter-input { 
			width: 100%; 
			padding: 10px; 
			margin: 10px 0; 
			border: 1px solid #ccc; 
			border-radius: 5px; 
		} 

		@media (max-width: 767px) { 
			.filter-input { 
				margin: 10px 0 0; 
			} 
		} 
	</style> 
</head> 

<body> 
	<div ng-controller="myController"> 
		<div class="container"> 
			<div class="header"> 
				<h1>GeeksforGeeks</h1> 
			</div> 
			<div class="sub-header"> 
				<h3> 
					Approach 1: Using ng-repeat and 
					AngularJS Filters 
				</h3> 
			</div> 
			<div class="row"> 
				<div class="col-lg-6"> 
					<input class="filter-input"
						type="text"
						ng-model="filter.title"
						placeholder="Filter by Title"> 
				</div> 
				<div class="col-lg-6"> 
					<input class="filter-input"
						type="text"
						ng-model="filter.flavor"
						placeholder="Filter by Flavor"> 
				</div> 
			</div> 
			<ul class="article-list"> 
				<li class="article-item"
					ng-repeat="article in articles | filter: filter"> 
					{{article.title}} (Flavor: {{article.flavor}}) 
				</li> 
			</ul> 
		</div> 
	</div> 

	<script> 
		var app = angular.module('myApp', []); 

		app.controller('myController', function ($scope) { 
			$scope.articles = [ 
				{ title: 'AngularJS Introduction', 
				flavor: 'Frontend' }, 
				{ title: 'Node.js Basics', 
				flavor: 'Backend' }, 
				{ title: 'React vs. Angular Comparison', 
				flavor: 'Frontend' }, 
				{ title: 'JavaScript Fundamentals', 
				flavor: 'Frontend' }, 
				{ title: 'HTML5 and CSS3 Tutorial', 
				flavor: 'Frontend' }, 
				{ title: 'Python for Beginners', 
				flavor: 'Backend' }, 
				{ title: 'Data Structures in C++', 
				flavor: 'Programming' }, 
				{ title: 'Machine Learning with Python', 
				flavor: 'AI' }, 
				{ title: 'Web Development with React', 
				flavor: 'Frontend' }, 
				{ title: 'Java Programming Basics', 
				flavor: 'Backend' }, 
			]; 
			$scope.filter = {}; 
		}); 
	</script> 
</body> 

</html>

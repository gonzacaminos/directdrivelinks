var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope) {
  $scope.fileDirectLink = "";
  $scope.fileType = "file";
  $scope.hasLink = "none";

 $scope.$watchGroup(['format', 'fileType'], function(value) {
   if($scope.fileLink){
    $scope.makeFileLink();
   }
  });

$scope.setFormat = function(format){
  $scope.format = format;
}

$scope.makeFileLink = function(val){

  var oldLink = $scope.fileLink;
  var id = "";
  var directLink = ""
  var re = 'd/(.*)/';
  var id = oldLink.match(re)[1];
  $scope.hasLink = "hasLink";

  switch ($scope.fileType) {
    case "file":
    var linkModel = "https://drive.google.com/uc?export=download&id=";
    $scope.fileDirectLink = linkModel + id;
      break;
    case "docs":
    var linkModel = "https://docs.google.com/document/d/FILE_ID/export?format="+$scope.format;
    $scope.fileDirectLink = linkModel.replace("FILE_ID", id);
      break;
    case "sheets":
    var linkModel = "https://docs.google.com/spreadsheets/d/FILE_ID/export?format="+$scope.format;
    $scope.fileDirectLink = linkModel.replace("FILE_ID", id);
      break;
    case "slides":
    var linkModel = "https://docs.google.com/presentation/d/FILE_ID/export/"+$scope.format;
    $scope.fileDirectLink = linkModel.replace("FILE_ID", id);
      break;
  }

}

});



$(document).ready(function(){
  clipboard = new ClipboardJS('.copy');
  clipboard.on('success', function(e) {
    var oldText = $(e.trigger).text();
    $(e.trigger).find("span").text("Copied!");
    setTimeout(
      function(){
      $(e.trigger).find("span").text(oldText);
    }, 1500);

    e.clearSelection();

});
});

/////////////////////////GET Method///////////////////////////////////////////// 
app.controller('SymptomController',function($scope,$http){
 $http({
	   method:'GET',
	   url:'http://localhost:8080/GitHub/ACL/Get_Symptom.php',
	   headers:{'Content-Type':'text/plain'} 
	   })
 .success(function(data,status)
       {
	    $scope.get=data;
		console.log(data);
		console.log(status);
	   })
 .error(function(status,headers)
       {
	    console.log(status);
	   })
//////////////////////////POST Method/////////////////////////////////////////////////
//Reset Form Data
$scope.reset_data=function(){
 $scope.category="";
 $scope.sub_category="";
 $scope.symptom_name="";
 $scope.display_sequence="";
 document.getElementById("status").innerHTML="";
}
//Show/Hide Role Update Button
$scope.symptom_enable=true;
$scope.symptom_check=function(){
 this.symptom_enable=!this.symptom_enable;
 this.symptom_toggle=!this.symptom_toggle;
}
//Add Dropdown Category Data in Text Box
$scope.category_add=function(){
 $scope.category=this.a.category;
}
//Add Dropdown Sub_Category in Text Box
$scope.sub_category_add=function(){
 $scope.sub_category=this.b.sub_category;
}
//Add Dropdown Features Data in Text Box
$scope.symptom_add=function(){
 $scope.symptom_name=this.c.symptom_name;
}
//Add Dropdown Category Data in Text Box
$scope.category_add=function(){
 $scope.category=this.a.category;
}
//Add Symptom Data
$scope.add_symptom_data=function(){
  $http({
   method:'POST',
   url:'http://localhost:8080/GitHub/ACL/Add_Symptom.php',
   data:{'category':$scope.category,'sub_category':$scope.sub_category,'symptom_name':$scope.symptom_name,'display_sequence':$scope.display_sequence},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   document.getElementById("status").innerHTML=data;
   console.log(data);
   console.log(status);
  })
  .error(function(status){
   document.getElementById("status").innerHTML="Failed";
   console.log(status);
  })
 }
//Update Symptom Data
$scope.update_symptom_data=function(){
  this.symptom_enable=!this.symptom_enable;
  this.symptom_toggle=!this.symptom_toggle;
  $http({
   method:'POST',
   url:'http://localhost:8080/GitHub/ACL/Update_Symptom.php',
   data:{'id':this.w.id,'category':this.w.category,'sub_category':this.w.sub_category,'symptom_name':this.w.symptom_name,'display_sequence':this.w.display_sequence},
   headers:{'Content-Type':'text/plain'}
  })
  .success(function(data,status){
   document.getElementById("status").innerHTML=data;
   console.log(data);
   console.log(status);
  })
  .error(function(status){
   document.getElementById("status").innerHTML="Failed";
   console.log(status);
  })
 }
});
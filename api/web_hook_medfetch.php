<?
$method = $_SERVER('REQUEST_METHOD');
if($method = 'POST'){
$requestBody= file_get_contents("php://input");
$json = json_decode($requestBody);
$text = $json->result->parameter->facultyname;
switch ($text) {
	case 'hihi':
		# code...
	       $speech ="pandey.aditya579@gmail.com";
		break;
	
	default:
		# code...
		break;
$response= \stdClass();
$response->speech="";
$response->displayText="";
$response->source="webhook";
header('Content-type: application/json');
echo json_encode($response);


}else{
	echo "not suitable method";
}
?>
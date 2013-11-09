<?php



$handle = @fopen($_FILES['data']['tmp_name'], "r");
if ($handle) {
	 $i=0;
    while (!feof($handle)) {
		
		 fseek($handle,5,SEEK_CUR);
        $data['questions'][$i]['question'] = fgets($handle);
        fseek($handle,3,SEEK_CUR);
        $data['questions'][$i]['answers'][0] = fgets($handle);
		$data['questions'][$i]['answers'][0]=str_replace("\0", "", $data['questions'][$i]['answers'][0]);
        if((strcmp(substr(substr($data['questions'][$i]['answers'][0],-7),0,5),"(ans)"))==0){
			$ans=1;
			$data['questions'][$i]['answers'][0]=substr($data['questions'][$i]['answers'][0], 0, -7);
		}
        fseek($handle,2,SEEK_CUR);
        $data['questions'][$i]['answers'][1] = fgets($handle);
		$data['questions'][$i]['answers'][1]=str_replace("\0", "", $data['questions'][$i]['answers'][1]);
        if((strcmp(substr(substr($data['questions'][$i]['answers'][1],-7),0,5),"(ans)"))==0){
			$ans=2;
			$data['questions'][$i]['answers'][1]=substr($data['questions'][$i]['answers'][1], 0, -7);
		}
        fseek($handle,3,SEEK_CUR);
        $data['questions'][$i]['answers'][2] = fgets($handle);
		$data['questions'][$i]['answers'][2]=str_replace("\0", "", $data['questions'][$i]['answers'][2]);
        if((strcmp(substr(substr($data['questions'][$i]['answers'][2],-7),0,5),"(ans)"))==0){
			$ans=3;
			$data['questions'][$i]['answers'][2]=substr($data['questions'][$i]['answers'][2], 0, -7);
		}
        fseek($handle,3,SEEK_CUR);
        $data['questions'][$i]['answers'][3] = fgets($handle);
		$data['questions'][$i]['answers'][3]=str_replace("\0", "", $data['questions'][$i]['answers'][3]);
        if((strcmp(substr(substr($data['questions'][$i]['answers'][3],-7),0,5),"(ans)"))==0){
			$ans=4;
			$data['questions'][$i]['answers'][3]=substr($data['questions'][$i]['answers'][3], 0, -7);
		}
		
        $data['questions'][$i++]['correctAnswer']=$ans;
		
    }
    //var_dump($data);//for debugging
    //echo json_encode($data);
     foreach ($data['questions'] as $question) {
    	echo "<br>Question)".$question['question'];
    	
    	echo "<br>Answers)".
        "<br>".$question['answers'][0].
    	"<br>".$question['answers'][1].
    	"<br>".$question['answers'][2].
    	"<br>".$question['answers'][3];
    	
    	echo "<br>Correct answer)".$question['correctAnswer'];
     
    }
    fclose($handle);
}
echo "<a href='./'>Go Back</a>";
?> 


<?php
require_once 'vendor/autoload.php';

/*	// Initialize and load PDF Parser library 
$parser = new \Smalot\PdfParser\Parser(); 
 
// Source PDF file to extract text 
$file = 'C:\Users\Dell\Documents\Chetan Salary Slip for Sept 2022.pdf'; 
 
// Parse pdf file using Parser library 
$pdf = $parser->parseFile($file); 
 
// Extract text from PDF 
$textContent = $pdf->getText();

echo $textContent;
*/


$pdfText = ''; 
if(isset($_POST['submit'])){ 
    // If file is selected 
    if(!empty($_FILES["pdf_file"]["name"])){ 
        // File upload path 
        $fileName = basename($_FILES["pdf_file"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('pdf'); 
        if(in_array($fileType, $allowTypes)){ 
            
            // Initialize and load PDF Parser library 
            $parser = new \Smalot\PdfParser\Parser(); 
             
            // Source PDF file to extract text 
            $file = $_FILES["pdf_file"]["tmp_name"]; 
             
            // Parse pdf file using Parser library 
            $pdf = $parser->parseFile($file); 
             
            // Extract text from PDF 
            $text = $pdf->getText(); 
             
            // Add line break 
            $pdfText = nl2br($text); 
        }else{ 
            echo $statusMsg = '<p style="text-align: center; color:red;">Sorry, only PDF file is allowed to upload.</p>'; 
        } 
    }else{ 
        echo $statusMsg = '<p "text-align: center; color:red;">Please select a PDF file to extract text.</p>'; 
    } 
} 
 
// Display text content 
echo $pdfText;
?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="pdf">
		<div class="label">
			Extract Text from PDF
		</div>
	    <div class="form-input">
	        <label for="pdf_file" class="pdf_file">PDF File</label>
	        <input type="file" name="pdf_file" placeholder="Select a PDF file" required="">
	    </div>
	    <div class="extract-button">
    		<input type="submit" name="submit" class="btn" value="Extract Text">
    	</div>
	</div>
</form>
<style type="text/css">
	input.btn {
    color: #FFFFFF;
    padding: 0.5em 0;
    font-size: 1em;
    margin: 1em 0 0 0;
    -webkit-appearance: none;
    background: deepskyblue;
    width: 47%;
    cursor: pointer;
    outline: auto;
}
input[type="file"] {
    width: 100%;
    color: deepskyblue;
    background: #fff;
    outline: none;
    font-size: 0.9em;
    padding: 0.7em 1em;
    border: 1px solid deepskyblue;
    -webkit-appearance: none;
    display: block;
    margin-bottom: 1.2em;
}
.pdf_file{

    font-size: 1em;
    color: #252525;
    margin-bottom: 0.5em;
    font-weight: 300;
    letter-spacing: 2px;
    margin-top: 20px;

}
.label {
    font-size: 24px;
    color: deepskyblue;
    margin-top: 0;
    text-align: center;
    margin-bottom: 5px;
}
.pdf {
    
    width: 350px;
    margin: 3em auto;
    background: #fff;
    padding: 2em;
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}
.extract-button{
	text-align: center;
}
</style>

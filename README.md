

# Tesseract OCR for PHP

A wrapper to work with Tesseract OCR inside PHP.


## Installation

Via [Composer][]:

    $ composer require smalot/pdfparser

## Use

require_once 'vendor/autoload.php';

  // Initialize and load PDF Parser library 
    $parser = new \Smalot\PdfParser\Parser(); 
 
// Source PDF file to extract text 
    $file = 'C:\Users\Dell\Documents\Chetan Salary Slip for Sept 2022.pdf'; 
 
// Parse pdf file using Parser library 
    $pdf = $parser->parseFile($file); 
 
// Extract text from PDF 
    $textContent = $pdf->getText();

    echo $textContent;

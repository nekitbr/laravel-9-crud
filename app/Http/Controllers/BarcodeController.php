<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

// https://www.codeproject.com/Articles/10162/Creating-EAN-13-Barcodes-with-C
class BarcodeController extends BaseController
{
    protected string $itemId;

    function __construct(string $itemId) {
        $this->itemId = $itemId;
    }

    function generateEAN13()
{
  $code = '200' . str_pad($this->itemId, 9, '0');
  $weightflag = true;
  $sum = 0;
  // Weight for a digit in the checksum is 3, 1, 3.. starting from the last digit. 
  // loop backwards to make the loop length-agnostic. The same basic functionality 
  // will work for codes of different lengths.
  for ($i = strlen($code) - 1; $i >= 0; $i--)
  {
    $sum += (int)$code[$i] * ($weightflag?3:1);
    $weightflag = !$weightflag;
  }
  $code .= (10 - ($sum % 10)) % 10;
  return $code;
}

    public function generateEAN132() {
        $countryCode = '200'; // fake country
        $manufacturerCode = '1234'; // random digits
        $itemCodeLength = strlen($this->itemId);

        if($itemCodeLength < 5) {
            while(true) {
                $this->itemId = '0' . $this->itemId;
                $itemCodeLength++;

                if($itemCodeLength >= 5) {
                    break;
                }
            }
        }

        $partialBarcode = $countryCode . $manufacturerCode . $this->itemId;

        $checksumDigit = $this->getChecksumDigit($partialBarcode);

        $barcode = $partialBarcode . $checksumDigit;

        return $barcode;
    }

    private function getChecksumDigit($partialBarcode) {
        $partialArray = array_reverse( str_split($partialBarcode) );
        $partialArraySize = count($partialArray);

        $checksum = 0;

        for ($i=0; $i < $partialArraySize; $i++) { 
            $elem = intval($partialArray[$i]);

            if($elem % 2 == 0) { // even
                $checksum += $elem;
            } else { // odd
                $checksum += $elem * 3;
            }
        }

        $checksum = $checksum % 10;

        $checksum = ( ( 10 - $checksum ) % 10 );

        return strval($checksum);
    }
}

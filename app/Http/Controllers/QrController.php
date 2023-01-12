<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeEnlarge;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeNone;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeInterface;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeShrink;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;
use Illuminate\Support\Facades\Redirect;

class QrController extends Controller
{
    public function index()
    {
        return view('qrcode.index')->with('image', 'image.png');
    }

    public function create(Request $request)
    {
        // return $request->url;
        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($request->url)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->setSize(500)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeEnlarge())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create(__DIR__ . '/assets/logo-etg.png')
            ->setResizeToWidth(250);

        // Create generic label
        $label = Label::create('Equine Technologies Group')
            ->setTextColor(new Color(0, 0, 0));

        $result = $writer->write($qrCode, $logo, $label);

        // Validate the result
        // $writer->validateResult($result, '1212121');

        // Directly output the QR code

        // Save it to a file
        $result->saveToFile(public_path(time() . '.png'));
        // return view('trainer.index')->with('image', $request->image_name . '.png');
        // Redirect::to('/' . time() . 'png');
        // return redirect()->route('qrcode.index');
    }
}

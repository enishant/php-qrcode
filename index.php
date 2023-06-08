<?php
require_once 'vendor/autoload.php';

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

if( isset( $_GET['data'] ) === true && empty( $_GET['data'] ) === false ) {
	$data = $_GET['data'];

	$file = 'qrcode/' . time() . '.png';

	$renderer = new ImageRenderer(
	    new RendererStyle( 300 ),
	    new ImagickImageBackEnd()
	);

	$writer = new Writer($renderer);
	$writer->writeFile($data, $file);

	if( file_exists( $file ) === true ) {
		echo '<img src="' . $file . '" alt="QR Code">';
	}
}
?>

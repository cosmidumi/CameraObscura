<?php
class resize {
	private $image;
	private $width;
	private $height;
	private $imageResized;
	private $img;
	private $state;

	function __construct( $fileName ) {
		$this->image = $this->openImage( $fileName );
		$this->width  = imagesx( $this->image );
		$this->height = imagesy( $this->image );
		$this->state = 0;
	}


	private function openImage( $file ) {
		$extension = strtolower( strrchr( $file, '.' ) );

		switch ( $extension ) {
		case '.jpg':
		case '.jpeg':
			$this->img = @imagecreatefromjpeg( $file );
			break;
		case '.gif':
			$this->img = @imagecreatefromgif( $file );
			break;
		case '.png':
			$this->img = @imagecreatefrompng( $file );
			break;
		default:
			$this->img = false;
			break;
		}
		return $this->img;
	}



	public function cropImage( $newWidth, $newHeight, $x, $y, $option="auto" ) {
		$this->imageResized = imagecreatetruecolor( $newWidth, $newHeight );

		imagecopyresampled( $this->imageResized, $this->img, 0, 0, $x, $y, $newWidth, $newHeight, $newWidth, $newHeight );
		$this->state=1;
	}



	public function resizeImage( $size, $option="resize" ) {
		$array = array ( "1" => "0.75", "2" => "0.5", "3" => "0.4", "4" => "0.25" );
		$newWidth=$this->width * ( $array[$size] );
		$newHeight=$this->height * ( $array[$size] );
		$this->imageResized = imagecreatetruecolor( $newWidth, $newHeight );

		imagecopyresampled( $this->imageResized, $this->img, 0, 0, 0, 0, $newWidth, $newHeight, $this->width, $this->height );
		$this->state=1;
	}


	public function applyEffect( $type ) {

		$this->imageResized = imagecreatetruecolor( $this->width, $this->height );
		imagecopyresampled( $this->imageResized, $this->img, 0, 0, 0, 0, $this->width, $this->height, $this->width, $this->height );
		if ( $type=="1e" ) {

			imagefilter( $this->imageResized, IMG_FILTER_GRAYSCALE );
			imagefilter( $this->imageResized, IMG_FILTER_COLORIZE, 100, 50, 0 );
		}
		else if ( $type=="2e")
		{
			imagefilter($this->imageResized, IMG_FILTER_NEGATE);
		}
		else if ( $type=="3e")
		{
			imagefilter($this->imageResized, IMG_FILTER_GRAYSCALE);
		}
		else if ( $type=="4e")
		{
			imagefilter($this->imageResized, IMG_FILTER_COLORIZE, 100, 0, 0);
		}
		else if ( $type=="5e")
		{
			imagefilter($this->imageResized, IMG_FILTER_EDGEDETECT);
		}
		$this->state=1;
	}

	public function rotateImage( $deg )
	{

		$this->imageResized = imagecreatetruecolor( $this->width, $this->height );
		imagecopyresampled( $this->imageResized, $this->img, 0, 0, 0, 0, $this->width, $this->height, $this->width, $this->height );
		$this->imageResized = imagerotate($this->imageResized, $deg, 0);
		$this->state=1;
	}


	public function saveImage( $savePath, $imageQuality="100" ) {
		$extension = strrchr( $savePath, '.' );
		$extension = strtolower( $extension );

		switch ( $extension ) {
		case '.jpg':
		case '.jpeg':
			if ( imagetypes() & IMG_JPG ) {
				if ( $this -> state == 0 ) {
					$this->imageResized = imagecreatetruecolor( $this->width, $this->height );

					imagecopyresampled( $this->imageResized, $this->img, 0, 0, 0, 0, $this->width, $this->height, $this->width, $this->height );
				}
				imagejpeg( $this->imageResized, $savePath, $imageQuality );
			}
			break;

		case '.gif':
			if ( $this -> state == 0 ) {
				$this->imageResized = imagecreatetruecolor( $this->width, $this->height );

				imagecopyresampled( $this->imageResized, $this->img, 0, 0, 0, 0, $this->width, $this->height, $this->width, $this->height );
			}
			if ( imagetypes() & IMG_GIF ) {
				imagegif( $this->imageResized, $savePath );
			}
			break;

		case '.png':
			$scaleQuality = round( ( $imageQuality/100 ) * 9 );

			$invertScaleQuality = 9 - $scaleQuality;
			if ( $this -> state == 0 ) {
				$this->imageResized = imagecreatetruecolor( $this->width, $this->height );

				imagecopyresampled( $this->imageResized, $this->img, 0, 0, 0, 0, $this->width, $this->height, $this->width, $this->height );
			}
			if ( imagetypes() & IMG_PNG ) {
				imagepng( $this->imageResized, $savePath, $invertScaleQuality );
			}
			break;


		default:
			break;
		}

		imagedestroy( $this->imageResized );
	}


}
?>

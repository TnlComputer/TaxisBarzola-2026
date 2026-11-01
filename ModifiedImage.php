<?php
// Redimensiona las fotos subidas de 0KM y usados (reemplaza la clase original, que faltaba en el proyecto).
// Uso: $img = new ModifiedImage($tmp); $img->resizeToFit(700, 500, true, 'ffffff'); $img->save('images/0km/big...jpg');
class ModifiedImage
{
	private $imagen = null;

	public function __construct($ruta)
	{
		$info = @getimagesize($ruta);
		if (!$info) {
			return;
		}
		switch ($info[2]) {
			case IMAGETYPE_JPEG:
				$this->imagen = @imagecreatefromjpeg($ruta);
				$this->corregirOrientacion($ruta);
				break;
			case IMAGETYPE_PNG:
				$this->imagen = @imagecreatefrompng($ruta);
				break;
			case IMAGETYPE_GIF:
				$this->imagen = @imagecreatefromgif($ruta);
				break;
			case IMAGETYPE_WEBP:
				$this->imagen = @imagecreatefromwebp($ruta);
				break;
		}
	}

	public function esValida()
	{
		return $this->imagen !== null && $this->imagen !== false;
	}

	// Ajusta la foto dentro de ancho x alto sin deformarla. Con $rellenar, el resultado mide
	// exactamente ancho x alto y el espacio sobrante se completa con el color $fondo (hex).
	public function resizeToFit($ancho, $alto, $rellenar = true, $fondo = 'ffffff')
	{
		if (!$this->esValida()) {
			return $this;
		}
		$w = imagesx($this->imagen);
		$h = imagesy($this->imagen);
		$escala = min($ancho / $w, $alto / $h);
		$nw = max(1, (int) round($w * $escala));
		$nh = max(1, (int) round($h * $escala));
		$lienzoW = $rellenar ? $ancho : $nw;
		$lienzoH = $rellenar ? $alto : $nh;

		$nueva = imagecreatetruecolor($lienzoW, $lienzoH);
		$rgb = sscanf(str_pad(ltrim((string) $fondo, '#'), 6, 'f'), '%2x%2x%2x');
		imagefill($nueva, 0, 0, imagecolorallocate($nueva, $rgb[0], $rgb[1], $rgb[2]));
		imagecopyresampled($nueva, $this->imagen, (int) (($lienzoW - $nw) / 2), (int) (($lienzoH - $nh) / 2), 0, 0, $nw, $nh, $w, $h);
		imagedestroy($this->imagen);
		$this->imagen = $nueva;
		return $this;
	}

	// Guarda según la extensión del destino (jpg por defecto). Solo se escriben formatos de imagen.
	public function save($destino, $calidad = 85)
	{
		if (!$this->esValida()) {
			return false;
		}
		switch (strtolower(pathinfo($destino, PATHINFO_EXTENSION))) {
			case 'png':
				return imagepng($this->imagen, $destino, 6);
			case 'gif':
				return imagegif($this->imagen, $destino);
			case 'webp':
				return imagewebp($this->imagen, $destino, $calidad);
			case 'jpg':
			case 'jpeg':
				return imagejpeg($this->imagen, $destino, $calidad);
			default:
				// Extensión no permitida (ej. .php): no se guarda nada
				return false;
		}
	}

	// Las fotos de celular traen la rotación en EXIF: se aplica para que no queden acostadas
	private function corregirOrientacion($ruta)
	{
		if (!$this->esValida() || !function_exists('exif_read_data')) {
			return;
		}
		$exif = @exif_read_data($ruta);
		$giro = [3 => 180, 6 => -90, 8 => 90][$exif['Orientation'] ?? 1] ?? 0;
		if ($giro) {
			$this->imagen = imagerotate($this->imagen, $giro, 0);
		}
	}
}

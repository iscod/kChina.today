<?php

ob_start();
		// imagejpeg($image);
		$image_stream = ob_get_contents();
		ob_end_clean();
		// imagedestroy($image);
		echo 'xxx';
?>
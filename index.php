<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced index of 
	<?php $path = getcwd(); $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $path); echo $relativePath;?></title>
    <style>
        @media only screen and (max-device-width: 400px) {
            .text {
                width: 90%;
                padding-left: 5%;
            }

            h1 {
                font-size: 18px;
            }

            ul {
                justify-content: center;
            }

            .file, .folder {
                margin: 2.5vw;
                width: 145px;
                padding: 125px 0 0 5px;
			    font-size: 14px;
            }
        }

        @media only screen and (min-device-width: 401px) and (max-device-width: 649px) {
            .text {
                width: 90%;
                padding-left: 5%;
            }

            h1 {
                font-size: 20px;
            }

            ul {
                justify-content: center;
            }

            .file, .folder {
                margin: 2.5vw;
                width: 170px;
                padding: 150px 0 0 5px;
			    font-size: 16px;
            }
        }

        @media only screen and (min-device-width: 650px) {
            .text {
                width: 98%;
                padding-left: 1%;
            }

            h1 {
			    font-size: 24px;
            }

            .file, .folder {
                margin: 0.5vw;
                width: 165px;
                padding: 145px 0 0 5px;
			    font-size: 16.5px;
            }

        }

        body {
            overflow-x: hidden;
            overflow-y: auto;
            background-color: #eee;
            color: #000;
        }

        .title {
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 12px 0 6px 0;
        }

        .text{
            background-color: #fff;
			border-radius: 12px;
			box-shadow: 2px 2px 4px #00000040;
        }
		
		h1 {
			font-family: "Bahnschrift";
			font-weight: normal;
			vertical-align: middle;
            line-height: 1.2em;
            white-space: nowrap;
			overflow: hidden;
		}

        .directory-listing {
            width: 100%;
            height: 100%;
            display: flex;
        }

        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
			margin: 0;
        }

        .file {
			font-style: italic;
            background-color: #fff;
        }

        .image{
            background-color: #ccc;
            background-size: cover;
        }
		
        .image:hover{
            background-color: #999;
            scale: 1.08;
        }

        .document{
			background-image: url('data:image/svg+xml;utf8,<svg enable-background="new 0 0 48 48" height="48px" id="Layer_1" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M37,47H11c-2.209,0-4-1.791-4-4V5c0-2.209,1.791-4,4-4h18.973  c0.002,0,0.005,0,0.007,0h0.02H30c0.32,0,0.593,0.161,0.776,0.395l9.829,9.829C40.84,11.407,41,11.68,41,12l0,0v0.021  c0,0.002,0,0.003,0,0.005V43C41,45.209,39.209,47,37,47z M31,4.381V11h6.619L31,4.381z M39,13h-9c-0.553,0-1-0.448-1-1V3H11  C9.896,3,9,3.896,9,5v38c0,1.104,0.896,2,2,2h26c1.104,0,2-0.896,2-2V13z M33,39H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18  c0.553,0,1,0.448,1,1C34,38.553,33.553,39,33,39z M33,31H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18c0.553,0,1,0.448,1,1  C34,30.553,33.553,31,33,31z M33,23H15c-0.553,0-1-0.447-1-1c0-0.552,0.447-1,1-1h18c0.553,0,1,0.448,1,1C34,22.553,33.553,23,33,23  z" fill-rule="evenodd"/></svg>');
		}
		
		.video{
			background-image: url('data:image/svg+xml;utf8,<svg enable-background="new 0 0 48 48" height="48px" id="Layer_1" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M43,42H5c-2.209,0-4-1.791-4-4V10c0-2.209,1.791-4,4-4h38c2.209,0,4,1.791,4,4v28  C47,40.209,45.209,42,43,42z M12,8H5c-1.104,0-2,0.896-2,2v2h9V8z M23,8h-9v4h9V8z M34,8h-9v4h9V8z M45,10c0-1.104-0.896-2-2-2h-7v4  h9l0,0V10z M45,14L45,14H3v20h42l0,0V14z M45,36L45,36h-9v4h-2v-4h-9v4h-2v-4h-9v4h-2v-4H3v2c0,1.104,0.896,2,2,2h38  c1.104,0,2-0.896,2-2V36z M21.621,29.765C21.449,29.904,21.238,30,21,30c-0.553,0-1-0.447-1-1V19c0-0.552,0.447-1,1-1  c0.213,0,0.4,0.082,0.563,0.196l7.771,4.872C29.72,23.205,30,23.566,30,24c0,0.325-0.165,0.601-0.405,0.783L21.621,29.765z" fill-rule="evenodd"/></svg>');
		}

		.music{
			background-image: url('data:image/svg+xml;utf8,<svg viewBox="-2 -2 27 27" id="apple-music" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg"> <defs id="defs18" /> <path d="M 17.508,24 H 6.938 C 6.389021,24.00645 5.8400503,23.986427 5.293,23.94 4.8409273,23.905357 4.3934041,23.825969 3.957,23.703 2.375,23.228 1.228,22.233 0.547,20.747 0.17,19.924 0.072,19.046 0.026,18.295 L 0.001,17.894 0,6.143 C 0,6.119 0.006,6.062 0.01,6.038 0.022,5.634 0.056,5.235 0.11,4.852 0.171,4.439 0.269,3.9 0.494,3.376 1.082,1.992 2.099,1.005 3.515,0.444 4.267,0.147 5.044,0.067 5.772,0.026 L 6.203,0.001 17.759,0 c 0.02,0 0.102,0.008 0.122,0.01 0.531416,0.01203956 1.061206,0.06351435 1.585,0.154 0.733,0.132 1.4,0.391 1.983,0.77 1.202,0.789 1.976,1.871 2.302,3.218 0.161,0.659 0.241,1.367 0.244,2.161 0.002,0.018263 0.003,0.036625 0.003,0.055 L 24,17.287 c 0.001,0.56 -0.014,1.297 -0.138,2.038 -0.095,0.561 -0.219,1.001 -0.391,1.389 -0.42003,0.954014 -1.109607,1.764545 -1.984,2.332 -0.691,0.455 -1.479,0.735 -2.411,0.855 C 18.55,23.966 18.023,24 17.508,24 Z M 1.6596538,20.041495 c 0.563,1.23 1.476,2.021 2.789,2.415 0.394,0.119 0.817,0.169 1.141,0.199 0.536,0.051 1.081,0.055 1.551,0.055 H 17.508 c 0.473,0 0.958,-0.031 1.442,-0.092 0.776,-0.1 1.427,-0.328 1.988,-0.698 0.713209,-0.462835 1.131389,-1.181313 1.475247,-1.958902 0.137,-0.309 0.238,-0.675 0.318,-1.15 0.112,-0.667 0.125,-1.35 0.125,-1.871 l -0.004,-10.3448897 c -0.002,-0.017931 -0.003,-0.035959 -0.003,-0.054 0,-0.736 -0.071,-1.384 -0.216,-1.98 -0.268,-1.108 -0.737247,-1.906099 -1.732247,-2.559099 -0.489885,-0.3148435 -1.038666,-0.526803 -1.613,-0.623 -0.470542,-0.081299 -0.946576,-0.126763 -1.424,-0.136 -0.016,0 -0.089,-0.008 -0.104,-0.01 l -11.3213462,-0.002 -0.405,0.024 c -0.646,0.037 -1.328,0.105 -1.948,0.35 -1.175,0.466 -1.982,1.25 -2.47,2.396 -0.179,0.418 -0.261,0.875 -0.313,1.226 -0.051,0.355 -0.08,0.713 -0.09,1.073 -0.001,0.02 -0.008,0.096 -0.011,0.115 l 0.026,11.5248907 c 0.042,0.696 0.124,1.429 0.432,2.101 z" id="path11" /> <path d="m 5.8182473,20.676 c -1.1543873,0.0091 -2.1444509,-0.821579 -2.336,-1.96 -0.193,-1.12 0.39,-2.173 1.452,-2.622 h 0.001 c 0.393,-0.165 0.792,-0.254 1.2,-0.339 l 0.767,-0.155 c 0.404,-0.081 0.837,-0.168 0.995,-0.201 0.157,-0.034 0.198,-0.083 0.205,-0.248 v -0.128 l 0.002,-8.883 c 0,-0.171 0.019,-0.335 0.056,-0.488 C 8.2702473,5.204 8.737,4.89 9.213,4.769 9.412,4.717 9.617,4.677 9.821,4.636 l 0.19,-0.038 C 10.362,4.526 10.655,4.454 10.946,4.384 11.28289,4.299384 11.621642,4.2223647 11.962,4.153 L 16.243,3.29 c 0.263,-0.052 0.493,-0.095 0.721,-0.114 0.567,-0.046 1.062951,0.3160495 1.120951,0.9030495 0.01,0.084 0.015,0.178 0.015,0.272 0.002,1.83 0.002,3.663 0,5.493 v 5.9549995 c 0,0.555 -0.097,1.021 -0.295,1.426 -0.348,0.708 -0.947951,1.208951 -1.728951,1.429951 -0.386191,0.109859 -0.783878,0.174295 -1.185,0.192 -1.194129,0.06872 -2.279357,-0.738921 -2.485951,-1.917049 -0.19,-1.036 0.377951,-2.117951 1.338951,-2.589951 0.386,-0.191 0.791,-0.291 1.135,-0.364 l 0.734,-0.154 c 0.439413,-0.08979 0.878094,-0.183125 1.316,-0.28 0.114,-0.026 0.12,-0.061 0.131,-0.12 l 0.011,-0.098 V 7.988 c -0.174,0.031 -0.487,0.091 -1.046,0.204 -0.847,0.167 -1.606,0.32 -2.365,0.473 l -4.411,0.93 0.016,7.949 c 0,0.565 -0.081,1.018 -0.255,1.424 -0.332,0.765 -1.0667527,1.274 -1.8977527,1.516 -0.3899935,0.112686 -0.792324,0.177166 -1.198,0.192 z M 5.2932968,17.160753 c -0.77,0.325 -0.8541484,0.853296 -0.7681484,1.355296 0.121,0.691 0.6141484,1.10705 1.3221484,1.10105 0.316,-0.011 0.637,-0.062 0.957,-0.154 0.538,-0.156 0.902,-0.467 1.112,-0.951 0.118,-0.275 0.1636075,-0.39945 0.173,-0.825346 0.025012,-0.387878 -0.0034,-0.77739 -0.010999,-1.166 -0.16,0.034 -0.599,0.122 -1.008,0.204 l -0.76,0.153 c -0.373,0.078 -0.706,0.152 -1.017001,0.283 z m 11.6040002,-2.483 c -0.272,0.061 -0.798,0.17 -1.254,0.266 l -0.729,0.153 c -0.286,0.061 -0.615,0.141 -0.903,0.283 -0.442135,0.413168 -0.639474,0.728742 -0.536396,1.339247 0.125,0.687 0.722,1.068148 1.428,1.040148 0.327,-0.014 0.648,-0.066 0.957,-0.155 0.884285,-0.355409 1.061142,-0.686253 1.037396,-1.633395 z m 0.05965,-10.3290003 c -0.158,0 -0.308,0.03 -0.457,0.059 l -4.311,0.87 c -0.369,0.074 -0.672,0.148 -0.978,0.222 -0.303,0.074 -0.607,0.148 -0.972,0.223 l -0.197,0.039 c -0.1850005,0.037 -0.3700005,0.073 -0.5520005,0.12 -0.157,0.04 -0.173,0.105 -0.185,0.153 -0.018,0.074 -0.026867,0.1600071 -0.028,0.25 L 9.248,8.4691978 l 4.207,-0.901 c 0.766,-0.155 1.527,-0.308 2.288,-0.458 0.789,-0.159 1.15,-0.226 1.329,-0.253 l 0.02795,-2.3344451 c 0,-0.057 -0.003,-0.113 -0.009,-0.167 -0.04454,-0.00428 -0.08925,-0.00661 -0.134,-0.007 z" id="path13" /></svg>');
        }

        .unknown{
            background-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"> <path clip-rule="evenodd" d="M 37 47 L 11 47 C 8.791 47 7 45.209 7 43 L 7 5 C 7 2.791 8.791 1 11 1 L 29.973 1 C 29.975 1 29.978 1 29.98 1 L 30 1 C 30.32 1 30.593 1.161 30.776 1.395 L 40.605 11.224 C 40.84 11.407 41 11.68 41 12 L 41 12.021 C 41 12.023 41 12.024 41 12.026 L 41 43 C 41 45.209 39.209 47 37 47 Z M 31 4.381 L 31 11 L 37.619 11 L 31 4.381 Z M 39 13 L 30 13 C 29.447 13 29 12.552 29 12 L 29 3 L 11 3 C 9.896 3 9 3.896 9 5 L 9 43 C 9 44.104 9.896 45 11 45 L 37 45 C 38.104 45 39 44.104 39 43 L 39 13 Z" fill-rule="evenodd"/><document style="font-family: Dubai; font-size: 32px; white-space: pre;" x="16.886" y="36.271">?</document></svg>');
        }
		
        .document, .video, .music, .unknown, .folder{
			background-size: 70%;
			background-repeat: no-repeat;
			background-position: center 33%;
        }
		
        .document:hover, .video:hover, .music:hover, .unknown:hover, .folder:hover{
            background-color: #fff;
            scale: 1.08;
        }

        .file, .folder {
			line-height: 25px;
			white-space: nowrap;
			overflow: hidden;
            border-radius: 12px;
            font-family: "Bahnschrift";
            cursor: pointer;
            vertical-align: middle;
            cursor: pointer;
            height: 25px;
			box-shadow: 2px 2px 4px #00000040;
        }

        .folder {
			font-weight: bold;
			background-color: #fff;
			background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="80" height="80" viewBox="0 0 50 50"><path d="M 5 4 C 3.3544268 4 2 5.3555411 2 7 L 2 16 L 2 26 L 2 43 C 2 44.644459 3.3544268 46 5 46 L 45 46 C 46.645063 46 48 44.645063 48 43 L 48 26 L 48 16 L 48 11 C 48 9.3549372 46.645063 8 45 8 L 18 8 C 18.08657 8 17.96899 8.000364 17.724609 7.71875 C 17.480227 7.437136 17.179419 6.9699412 16.865234 6.46875 C 16.55105 5.9675588 16.221777 5.4327899 15.806641 4.9628906 C 15.391504 4.4929914 14.818754 4 14 4 L 5 4 z M 5 6 L 14 6 C 13.93925 6 14.06114 6.00701 14.308594 6.2871094 C 14.556051 6.5672101 14.857231 7.0324412 15.169922 7.53125 C 15.482613 8.0300588 15.806429 8.562864 16.212891 9.03125 C 16.619352 9.499636 17.178927 10 18 10 L 45 10 C 45.562937 10 46 10.437063 46 11 L 46 13.1875 C 45.685108 13.07394 45.351843 13 45 13 L 5 13 C 4.6481575 13 4.3148915 13.07394 4 13.1875 L 4 7 C 4 6.4364589 4.4355732 6 5 6 z M 5 15 L 45 15 C 45.56503 15 46 15.43497 46 16 L 46 26 L 46 43 C 46 43.562937 45.562937 44 45 44 L 5 44 C 4.4355732 44 4 43.563541 4 43 L 4 26 L 4 16 C 4 15.43497 4.4349698 15 5 15 z"></path></svg>');
		}


        .file:hover {
            scale: 1.08;
        }
		
		.file-info {
			background: rgba(0, 0, 0, 0.8);
			color: #fff;
			font-size: 12px;
			font-family: "Bahnschrift";
			padding: 5px;
			border-radius: 5px;
			z-index: 9999;
			pointer-events: none;
		}
    </style>
    <script>		
        function changeGradient(element) {
            element.style.backgroundImage = "linear-gradient(#ffffff00 40%, #ffffffff), url(\"" + element.dataset.image + "\")";
            element.style.backgroundSize = "cover";
            element.style.backgroundPosition = "center";
        }

        function restoreGradient(element) {
            element.style.backgroundImage = "linear-gradient(#ffffff20, #ffffffff), url(\"" + element.dataset.image + "\")";
            element.style.backgroundSize = "cover";
            element.style.backgroundPosition = "center";
        }

        function openFile(filePath) {
            window.location.href = filePath;
        }
		
		function showFileInfo(event, lastModified, size, file) {
			const bytes = ['B', 'KB', 'MB', 'GB', 'TB'];
			const i = Math.floor(Math.log(size) / Math.log(1024));
			const formattedSize = (size / Math.pow(1024, i)).toFixed(2) + ' ' + bytes[i];
			
			const fileInfoElement = document.createElement('div');
			fileInfoElement.className = 'file-info';
			fileInfoElement.innerHTML = `<B>${file}</B><br>Last modified: ${lastModified}`;
            if (size !== "none" && size !== "0") {
                fileInfoElement.innerHTML += `<br>Size: ${formattedSize}`;
            } else if (size === "0") {
                fileInfoElement.innerHTML += `<br>Size: 0.00 B`;
            }

			document.body.appendChild(fileInfoElement);
			fileInfoElement.style.position = 'absolute';
			fileInfoElement.style.top = event.clientY + 'px';
			fileInfoElement.style.left = event.clientX + 'px';
		}

		function hideFileInfo() {
			const fileInfoElement = document.querySelector('.file-info');
			if (fileInfoElement) {
				fileInfoElement.remove();
			}
		}
    </script>
</head>
<body>
    <div class="title">
        <div class="text">
            <h1><B>Enhanced index of </B><?php $path = getcwd(); $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $path); echo $relativePath;?></h1>
        </div>
    </div>
    <div class="directory-listing">
        <ul>
            <?php
            $files = scandir('./');
            
            $folders = [];
            $filesList = [];
            foreach($files as $file){
                if($file != '.' && $file != '..'){
                    if(is_dir($file)){
                        $folders[] = $file;
                    } elseif(!in_array(pathinfo($file, PATHINFO_EXTENSION), ['php'])){
                        $filesList[] = $file;
                    }
                }
            }
            
            foreach($folders as $folder){
                $size = filesize($folder);
                $modTime = date("M d Y H:i:s", filemtime($folder));
                $escapedFolderName = htmlspecialchars($folder, ENT_QUOTES, 'UTF-8');
                echo "<li class='folder' onclick='openFile(\"{$escapedFolderName}\")' onmouseover='showFileInfo(event, \"{$modTime}\", \"none\", \"{$escapedFolderName}\")' onmouseout='hideFileInfo()'>$folder</li>";
            }
            
            foreach($filesList as $file){
                $filePath = "{$folder}/{$file}";
                $escapedFileName = htmlspecialchars($file, ENT_QUOTES, 'UTF-8');
                $fileName = pathinfo($escapedFileName, PATHINFO_FILENAME);
                $fileExtension = pathinfo($escapedFileName, PATHINFO_EXTENSION);
                
                $size = filesize($file);
                $modTime = date("M d Y H:i:s", filemtime($file));
                
                if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'ico', 'svg', 'webp', 'doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'rtf', 'odt', 'mp4', 'avi', 'mkv', 'mov', 'wmv', 'flv', 'webm', 'mpeg', 'mpg', 'm4v', 'mp3', 'wav', 'ogg', 'flac', 'm4a', 'aac', 'wma', 'alac'])){
                    if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'ico', 'svg', 'webp'])){
                        echo "<li class='file image' data-image='{$fileName}.{$fileExtension}' onmouseover='changeGradient(this); showFileInfo(event, \"{$modTime}\", \"{$size}\", \"{$escapedFileName}\")' onmouseout='restoreGradient(this); hideFileInfo()' onclick='openFile(\"{$escapedFileName}\")' style='background-image: linear-gradient(#ffffff20, #ffffffff), url(\"{$fileName}.{$fileExtension}\"); background-size: cover; background-position: center;'>$file</li>";
                    } elseif(in_array($fileExtension, ['doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'rtf', 'odt'])){
                        echo "<li class='file document' onmouseover='showFileInfo(event, \"{$modTime}\", \"{$size}\", \"{$escapedFileName}\")' onmouseout='hideFileInfo()' onclick='openFile(\"{$escapedFileName}\")'>$file</li>";
                    } elseif(in_array($fileExtension, ['mp4', 'avi', 'mkv', 'mov', 'wmv', 'flv', 'webm', 'mpeg', 'mpg', 'm4v'])){
                        echo "<li class='file video' onmouseover='showFileInfo(event, \"{$modTime}\", \"{$size}\", \"{$escapedFileName}\")' onmouseout='hideFileInfo()' onclick='openFile(\"{$escapedFileName}\")'>$file</li>";
                    } else {
                        echo "<li class='file music' onmouseover='showFileInfo(event, \"{$modTime}\", \"{$size}\", \"{$escapedFileName}\")' onmouseout='hideFileInfo()' onclick='openFile(\"{$escapedFileName}\")'>$file</li>";
                    }
                } else {
                    echo "<li class='file unknown' onclick='openFile(\"{$escapedFileName}\")' onmouseover='showFileInfo(event, \"{$modTime}\", \"{$size}\", \"{$escapedFileName}\");' onmouseout='hideFileInfo();'>$file</li>";
                }
            }
            ?>
        </ul>
    </div>
</body>
</html>

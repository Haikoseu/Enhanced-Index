<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced index of 
	<?php $path = getcwd(); $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $path); echo $relativePath;?></title>
    <style>
        :root {
            --should-execute: 0;
        }

        @media only screen and (max-device-width: 649px) {
            .text {
                width: 90%;
                padding-left: 5%;
            }

            ul {
                justify-content: center;
            }

            #directoryMenu {
                display: none;
            }
        }

        @media only screen and (max-device-width: 400px) {

            h1 {
                font-size: 18px;
            }

            .file, .folder {
                margin: 2.5vw;
                width: 145px;
                padding: 125px 0 0 5px;
			    font-size: 14px;
            }
        }

        @media only screen and (min-device-width: 401px) and (max-device-width: 649px) {
            h1 {
                font-size: 20px;
            }

            .file, .folder {
                margin: 2.5vw;
                width: 170px;
                padding: 150px 0 0 5px;
			    font-size: 16px;
            }
        }

        @media only screen and (min-device-width: 650px) {
            :root {
                --should-execute: 1;
            }

            .text {
                width: calc(99% - 15px);
                padding-left: 15px;
            }

            h1 {
			    font-size: 24px;
            }

            .file, .folder {
                margin: 8px;
                width: 162px;
                padding: 142px 0 0 5px;
			    font-size: 16.5px;
            }

            #directoryContent {
                float: right;
                z-index: 3;
                width: calc(100% - 20px);
            }

            #directoryMenu {
                position: fixed;
                width: 260px;
                height: 93%;
                overflow-y: auto;
                background-color: #fff;
                border-right: 1px solid #ccc;
                padding: 11px;
                margin: 8px 0;
                left: 0;
                border-radius: 0 12px 12px 0;
                overflow-x: hidden;
                overflow-y: auto;
                z-index: 8;
                width: 0;
			    box-shadow: 2px 2px 4px #00000020;
            }

            .tree {
                font-size: 16.5px;
                z-index: 9;
            }

            .tree li {
                overflow: hidden;
                max-width: 240px;
                min-width: 480px;
                white-space: nowrap;
            }

            .current-directory {
                font-weight: bold;
			    font-style: italic;
            }

            #toggleButton {
                position: absolute;
                top: 0;
                right: 0;
                height: 100%;
                width: 20px;
                background-color: #fff;
                color: #000;
                border: none;
                cursor: pointer;
            }

            #toggleButton.collapsed {
                width: 20px;
            }

            html::-webkit-scrollbar, #directoryMenu::-webkit-scrollbar {
                width: 0;
                height: 0;
            }

            body, #directoryMenu{
                overflow: scroll;
            }

            html, #directoryMenu {
                scrollbar-width: none;
            }

            html::-ms-scrollbar, #directoryMenu::-ms-scrollbar{
                display: none;
            }
        }

        body {
            overflow-x: hidden;
            overflow-y: auto;
            background-color: #eee;
            color: #000;
			font-family: "Bahnschrift";
        }

        a {
            text-decoration: None;
            color: #000;
        }

        .title {
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 8px 0 6px 0;
        }

        .text{
            background-color: #fff;
			border-radius: 12px;
			box-shadow: 2px 2px 4px #00000040;
        }
		
		h1 {
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
			background-image: url('data:image/svg+xml;utf8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path d="M28.681 7.159c-0.694-0.947-1.662-2.053-2.724-3.116s-2.169-2.030-3.116-2.724c-1.612-1.182-2.393-1.319-2.841-1.319h-15.5c-1.378 0-2.5 1.121-2.5 2.5v27c0 1.378 1.122 2.5 2.5 2.5h23c1.378 0 2.5-1.122 2.5-2.5v-19.5c0-0.448-0.137-1.23-1.319-2.841zM24.543 5.457c0.959 0.959 1.712 1.825 2.268 2.543h-4.811v-4.811c0.718 0.556 1.584 1.309 2.543 2.268zM28 29.5c0 0.271-0.229 0.5-0.5 0.5h-23c-0.271 0-0.5-0.229-0.5-0.5v-27c0-0.271 0.229-0.5 0.5-0.5 0 0 15.499-0 15.5 0v7c0 0.552 0.448 1 1 1h7v19.5z"></path><path d="M23 26h-14c-0.552 0-1-0.448-1-1s0.448-1 1-1h14c0.552 0 1 0.448 1 1s-0.448 1-1 1z"></path><path d="M23 22h-14c-0.552 0-1-0.448-1-1s0.448-1 1-1h14c0.552 0 1 0.448 1 1s-0.448 1-1 1z"></path><path d="M23 18h-14c-0.552 0-1-0.448-1-1s0.448-1 1-1h14c0.552 0 1 0.448 1 1s-0.448 1-1 1z"></path></svg>');
		}
		
		.video{
			background-image: url('data:image/svg+xml;utf8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path d="M28.681 7.159c-0.694-0.947-1.662-2.053-2.724-3.116s-2.169-2.030-3.116-2.724c-1.612-1.182-2.394-1.319-2.841-1.319h-15.5c-1.378 0-2.5 1.121-2.5 2.5v27c0 1.378 1.121 2.5 2.5 2.5h23c1.378 0 2.5-1.122 2.5-2.5v-19.5c0-0.448-0.137-1.23-1.319-2.841v0 0zM24.543 5.457c0.959 0.959 1.712 1.825 2.268 2.543h-4.811v-4.811c0.718 0.556 1.584 1.309 2.543 2.268v0 0zM28 29.5c0 0.271-0.229 0.5-0.5 0.5h-23c-0.271 0-0.5-0.229-0.5-0.5v-27c0-0.271 0.229-0.5 0.5-0.5 0 0 15.499-0 15.5 0v7c0 0.552 0.448 1 1 1h7v19.5z"></path><path d="M8 16h10v10h-10v-10z"></path><path d="M18 20l6-4v10l-6-4z"></path></svg>');
		}

		.music{
			background-image: url('data:image/svg+xml;utf8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path d="M28.681 7.159c-0.694-0.947-1.662-2.053-2.724-3.116s-2.169-2.030-3.116-2.724c-1.612-1.182-2.393-1.319-2.841-1.319h-15.5c-1.378 0-2.5 1.121-2.5 2.5v27c0 1.378 1.121 2.5 2.5 2.5h23c1.378 0 2.5-1.122 2.5-2.5v-19.5c0-0.448-0.137-1.23-1.319-2.841v0zM24.543 5.457c0.959 0.959 1.712 1.825 2.268 2.543h-4.811v-4.811c0.718 0.556 1.584 1.309 2.543 2.268v0zM28 29.5c0 0.271-0.229 0.5-0.5 0.5h-23c-0.271 0-0.5-0.229-0.5-0.5v-27c0-0.271 0.229-0.5 0.5-0.5 0 0 15.499-0 15.5 0v7c0 0.552 0.448 1 1 1h7v19.5z"></path><path d="M23.634 12.227c-0.232-0.19-0.536-0.266-0.83-0.207l-10 2c-0.467 0.094-0.804 0.504-0.804 0.981v7.402c-0.588-0.255-1.271-0.402-2-0.402-2.209 0-4 1.343-4 3s1.791 3 4 3 4-1.343 4-3v-7.18l8-1.6v4.183c-0.588-0.255-1.271-0.402-2-0.402-2.209 0-4 1.343-4 3s1.791 3 4 3 4-1.343 4-3v-10c0-0.3-0.134-0.583-0.366-0.773z"></path></svg>');
        }

        .zip{
            background-image: url('data:image/svg+xml;utf8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path d="M28.681 7.159c-0.694-0.947-1.662-2.053-2.724-3.116s-2.169-2.030-3.116-2.724c-1.612-1.182-2.393-1.319-2.841-1.319h-15.5c-1.378 0-2.5 1.121-2.5 2.5v27c0 1.378 1.121 2.5 2.5 2.5h23c1.378 0 2.5-1.122 2.5-2.5v-19.5c0-0.448-0.137-1.23-1.319-2.841v0 0zM24.543 5.457c0.959 0.959 1.712 1.825 2.268 2.543h-4.811v-4.811c0.718 0.556 1.584 1.309 2.543 2.268v0 0zM28 29.5c0 0.271-0.229 0.5-0.5 0.5h-23c-0.271 0-0.5-0.229-0.5-0.5v-27c0-0.271 0.229-0.5 0.5-0.5 0 0 15.499-0 15.5 0v7c0 0.552 0.448 1 1 1h7v19.5z"></path><path d="M8 2h4v2h-4v-2z"></path><path d="M12 4h4v2h-4v-2z"></path><path d="M8 6h4v2h-4v-2z"></path><path d="M12 8h4v2h-4v-2z"></path><path d="M8 10h4v2h-4v-2z"></path><path d="M12 12h4v2h-4v-2z"></path><path d="M8 14h4v2h-4v-2z"></path><path d="M12 16h4v2h-4v-2z"></path><path d="M8 26.5c0 0.825 0.675 1.5 1.5 1.5h5c0.825 0 1.5-0.675 1.5-1.5v-5c0-0.825-0.675-1.5-1.5-1.5h-2.5v-2h-4v8.5zM14 24v2h-4v-2h4z"></path></svg>');
        }

        .unknown{
            background-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M28.681 7.159c-0.694-0.947-1.662-2.053-2.724-3.116s-2.169-2.030-3.116-2.724c-1.612-1.182-2.393-1.319-2.841-1.319h-15.5c-1.378 0-2.5 1.121-2.5 2.5v27c0 1.378 1.122 2.5 2.5 2.5h23c1.378 0 2.5-1.122 2.5-2.5v-19.5c0-0.448-0.137-1.23-1.319-2.841zM24.543 5.457c0.959 0.959 1.712 1.825 2.268 2.543h-4.811v-4.811c0.718 0.556 1.584 1.309 2.543 2.268zM28 29.5c0 0.271-0.229 0.5-0.5 0.5h-23c-0.271 0-0.5-0.229-0.5-0.5v-27c0-0.271 0.229-0.5 0.5-0.5 0 0 15.499-0 15.5 0v7c0 0.552 0.448 1 1 1h7v19.5z"/><text style="font-family: Dubai; font-size: 25px; white-space: pre;" x="10.25" y="27.336">?</text></svg>');
        }
		
        .document, .video, .music, .zip, .unknown{
			background-size: 55%;
			background-repeat: no-repeat;
			background-position: center 45%;
        }

        .folder{
			background-size: 60%;
			background-repeat: no-repeat;
			background-position: center 45%;
        }
		
        .document:hover, .video:hover, .music:hover, .zip:hover, .unknown:hover, .folder:hover{
            background-color: #fff;
            scale: 1.08;
        }

        .file, .folder {
			line-height: 25px;
			white-space: nowrap;
			overflow: hidden;
            border-radius: 12px;
            cursor: pointer;
            vertical-align: middle;
            cursor: pointer;
            height: 25px;
			box-shadow: 2px 2px 4px #00000040;
        }

        .folder {
			font-weight: bold;
			background-color: #fff;
			background-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M 27.347 9.296 C 27.294 8.516 27.415 5.462 27.366 3.81 C 27.304 1.73 25.667 1.797 25.219 1.797 L 2.651 1.753 C 1.273 1.753 0.151 2.874 0.151 4.253 L 0.151 27.617 C 0.151 28.995 0.492 29.857 1.87 29.857 C 2.071 22.287 2.777 16.916 3.545 13.226 C 4.143 10.346 4.611 8.474 6.009 7.478 C 8.152 5.951 11.834 6.778 16.032 7.363 C 17.54 7.573 19.064 8.503 20.86 8.878 C 22.775 9.276 24.985 9.119 27.347 9.296 Z M 5.557 7.205 C 2.772 9.178 1.935 28.105 1.935 27.834 L 2.151 4.253 C 2.151 3.982 2.38 3.753 2.651 3.753 C 2.651 3.753 21.66 3.717 24.092 3.754 C 25.466 3.775 25.501 3.769 25.479 5.557 C 25.471 6.179 25.415 8.104 25.465 8.827 C 25.567 10.297 23.213 9.808 20.229 8.667 C 19.245 8.291 18.47 7.414 17.325 7.082 C 13.941 6.101 9.626 6.196 8.008 6.297 C 6.447 6.413 6.598 6.497 5.557 7.205 Z"/><path d="M 31.689 11.324 C 32.106 9.603 31.459 8.489 29.56 8.513 C 29.56 8.513 26.447 8.523 22.646 8.467 C 20.892 8.441 21.302 8.477 20.511 8.294 C 19.739 8.116 18.971 7.2 18.824 7.027 C 18.161 6.248 17.341 5.77 16.329 5.759 C 12.89 5.721 6.707 5.643 6.707 5.643 C 5.332 5.643 4.384 6.759 4.211 8.133 L 0.222 27.566 C 0.222 28.938 0.563 30.056 2.718 30.056 L 25.335 30.056 C 26.712 30.056 27.331 29.67 27.831 27.566 C 31.931 10.329 31.272 13.045 31.689 11.324 Z M 25.834 27.566 C 25.834 27.836 25.606 28.063 25.335 28.063 L 2.718 28.063 C 2.447 28.063 2.306 27.836 2.306 27.566 L 6.208 8.133 C 6.208 7.863 6.436 7.634 6.707 7.634 C 6.707 7.634 11.245 7.565 15.102 7.57 C 15.699 7.571 16.382 7.682 16.717 7.893 C 17.061 8.111 17.624 8.648 17.624 8.648 C 17.624 8.648 18.056 9.188 18.664 9.566 C 19.245 9.928 19.533 10.279 21.071 10.303 C 25.63 10.374 28.181 10.331 28.901 10.336 C 29.66 10.341 30.117 10.313 29.82 11.324 L 25.834 27.566 Z" style=""/></svg>');
		}


        .file:hover {
            scale: 1.08;
        }
		
		.file-info {
			background: rgba(0, 0, 0, 0.8);
			color: #fff;
			font-size: 12px;
			padding: 5px;
			border-radius: 5px;
			z-index: 5;
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
        
        function toggleMenu() {
            var menu = document.getElementById('directoryMenu');
            var button = document.getElementById('toggleButton');
            var content = document.getElementById('directoryContent');
            var EIOmenu = localStorage.getItem('EIOmenu');
            if (button.innerHTML === '⟨') {
                menu.style.width = '0';
                button.innerHTML = '⟩';
                button.classList.add('collapsed');
                content.style.width = 'calc(100% - 20px)';
                localStorage.setItem('EIOmenu', 'closed');
            } else {
                menu.style.width = '260px';
                button.innerHTML = '⟨';
                button.classList.remove('collapsed');
                content.style.width = 'calc(100% - 280px)';
                localStorage.setItem('EIOmenu', 'open');
            }
        }

        window.onload = function() {
            var menu = document.getElementById('directoryMenu');
            var button = document.getElementById('toggleButton');
            var content = document.getElementById('directoryContent');
            var EIOmenu = localStorage.getItem('EIOmenu');
            var shouldExecute = getComputedStyle(document.documentElement).getPropertyValue('--should-execute').trim();

            if (shouldExecute === '1') {
                if (EIOmenu === 'closed') {
                    menu.style.width = '0';
                    button.innerHTML = '⟩';
                    button.classList.add('collapsed');
                    content.style.width = 'calc(100% - 20px)';
                } else {
                    menu.style.width = '260px';
                    button.innerHTML = '⟨';
                    button.classList.remove('collapsed');
                    content.style.width = 'calc(100% - 280px)';
                }
            }
        }
    </script>
</head>
<body>
    <?php
    function listDirectories($dir) {
        $result = [];
        foreach (scandir($dir) as $filename) {
            if ($filename[0] === '.') continue;
            $filePath = $dir . '/' . $filename;
            if (is_dir($filePath)) {
                $result[$filename] = listDirectories($filePath);
            }
        }
        return $result;
    }
    $directoryTree = listDirectories($_SERVER['DOCUMENT_ROOT']);

    function displayTree($tree, $rootPath, $prefixes = []) {
        $currentPath = str_replace($_SERVER['DOCUMENT_ROOT'], '', getcwd());
        echo '<ul style="list-style-type: none;">';
        $lastKey = end(array_keys($tree));
        foreach ($tree as $dir => $subDirs) {
            $linkPath = $rootPath . '/' . $dir;
            $isCurrent = $linkPath == $currentPath ? ' class="current-directory"' : '';
            echo '<li>';

            foreach ($prefixes as $prefix) {
                echo $prefix;
            }
            echo ($dir === $lastKey) ? '└─ ' : '├─ ';
    
            echo '<a href="' . $linkPath . '"' . $isCurrent . '>' . $dir . '</a>' . '&thinsp;';
    
            if (!empty($subDirs)) {
                $newPrefixes = $prefixes;
                $newPrefixes[] = ($dir === $lastKey) ? '&emsp;&ensp;&thinsp;' : '│&emsp;';
                displayTree($subDirs, $linkPath, $newPrefixes);
            }
            echo '</li>';
        }
        echo '</ul>';
    }
    ?>
    <div id="directoryMenu">
        <div class="tree">
            <a href='/'>/</a>
            <?php displayTree($directoryTree, ''); ?>
        </div>
        <button id="toggleButton" onclick="toggleMenu()">⟩</button>
    </div>
    <div id="directoryContent">
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
                    
                    if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'ico', 'svg', 'webp', 'doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'rtf', 'odt', 'mp4', 'avi', 'mkv', 'mov', 'wmv', 'flv', 'webm', 'mpeg', 'mpg', 'm4v', 'mp3', 'wav', 'ogg', 'flac', 'm4a', 'aac', 'wma', 'zip', 'tar', 'gz', '7z', 'rar', 'bz2', 'xz', 'iso', 'dmg'])){
                        if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'ico', 'svg', 'webp'])){
                            echo "<li class='file image' data-image='{$fileName}.{$fileExtension}' onmouseover='changeGradient(this); showFileInfo(event, \"{$modTime}\", \"{$size}\", \"{$escapedFileName}\")' onmouseout='restoreGradient(this); hideFileInfo()' onclick='openFile(\"{$escapedFileName}\")' style='background-image: linear-gradient(#ffffff20, #ffffffff), url(\"{$fileName}.{$fileExtension}\"); background-size: cover; background-position: center;'>$file</li>";
                        } elseif(in_array($fileExtension, ['doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'rtf', 'odt'])){
                            echo "<li class='file document' onmouseover='showFileInfo(event, \"{$modTime}\", \"{$size}\", \"{$escapedFileName}\")' onmouseout='hideFileInfo()' onclick='openFile(\"{$escapedFileName}\")'>$file</li>";
                        } elseif(in_array($fileExtension, ['mp4', 'avi', 'mkv', 'mov', 'wmv', 'flv', 'webm', 'mpeg', 'mpg', 'm4v'])){
                            echo "<li class='file video' onmouseover='showFileInfo(event, \"{$modTime}\", \"{$size}\", \"{$escapedFileName}\")' onmouseout='hideFileInfo()' onclick='openFile(\"{$escapedFileName}\")'>$file</li>";
                        } elseif(in_array($fileExtension, ['zip', 'tar', 'gz', '7z', 'rar', 'bz2', 'xz', 'iso', 'dmg'])){
                            echo "<li class='file zip' onmouseover='showFileInfo(event, \"{$modTime}\", \"{$size}\", \"{$escapedFileName}\")' onmouseout='hideFileInfo()' onclick='openFile(\"{$escapedFileName}\")'>$file</li>";
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
    </div>
</body>
</html>

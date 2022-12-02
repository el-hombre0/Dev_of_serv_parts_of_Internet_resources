<?php
session_start();
require_once 'connect.php';
$login = $_SESSION['user']['login_user'];
// Название <input type="file">
$input_name = 'file';
 
// Разрешенные расширения файлов.
$allow = array();
 
// Запрещенные расширения файлов.
$deny = array(
	'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
	'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
	'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi'
);
 
// Директория куда будут загружаться файлы.
$path = __DIR__ . '../uploads/resumes/';
if (isset($_FILES[$input_name])) {
	// Проверим директорию для загрузки.
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
 
	// Преобразуем массив $_FILES в удобный вид для перебора в foreach.
	$files = array();
	$diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
	if ($diff == 0) {
		$files = array($_FILES[$input_name]);
	} else {
		foreach($_FILES[$input_name] as $k => $l) {
			foreach($l as $i => $v) {
				$files[$i][$k] = $v;
			}
		}		
	}	
	foreach ($files as $file) {
		$error = $success = '';
 
		// Проверим на ошибки загрузки.
		if (!empty($file['error']) || empty($file['tmp_name'])) {
			switch (@$file['error']) {
				case 1:
				case 2: $error = 'The size of the uploaded file has been exceeded.'; break;
				case 3: $error = 'The file was gotten partly'; break;
				case 4: $error = 'The file wasn\'t uploaded.'; break;
				case 6: $error = 'The file is not uploaded - the temporary directory is absent.'; break;
				case 7: $error = 'Failed to write to disk.'; break;
				case 8: $error = 'PHP extension stopped the file\'s uploading.'; break;
				case 9: $error = 'The file wasn\t uploaded - the directory is not exists.'; break;
				case 10: $error = 'The max acceptable file size is exceeded.'; break;
				case 11: $error = 'This file type is forbidden.'; break;
				case 12: $error = 'Error while copieng file.'; break;
				default: $error = 'The file wasn\t uplpaded - unknown error.'; break;
			}
		} elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
			$error = 'Failed to upload the file.';
		} else {
			// Оставляем в имени файла только буквы, цифры и некоторые символы.
			$pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
			$name = mb_eregi_replace($pattern, '-', $file['name']);
			$name = mb_ereg_replace('[-]+', '-', $name);
			// Т.к. есть проблема с кириллицей в названиях файлов (файлы становятся недоступны).
			// Сделаем их транслит:
			$converter = array(
				'а' => 'a',   'б' => 'b',   'в' => 'v',    'г' => 'g',   'д' => 'd',   'е' => 'e',
				'ё' => 'e',   'ж' => 'zh',  'з' => 'z',    'и' => 'i',   'й' => 'y',   'к' => 'k',
				'л' => 'l',   'м' => 'm',   'н' => 'n',    'о' => 'o',   'п' => 'p',   'р' => 'r',
				'с' => 's',   'т' => 't',   'у' => 'u',    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
				'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',  'ь' => '',    'ы' => 'y',   'ъ' => '',
				'э' => 'e',   'ю' => 'yu',  'я' => 'ya', 
			
				'А' => 'A',   'Б' => 'B',   'В' => 'V',    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
				'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
				'Л' => 'L',   'М' => 'M',   'Н' => 'N',    'О' => 'O',   'П' => 'P',   'Р' => 'R',
				'С' => 'S',   'Т' => 'T',   'У' => 'U',    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
				'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',  'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
				'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
			);
 
			$name = strtr($name, $converter);
			$parts = pathinfo($name);
			if (empty($name) || empty($parts['extension'])) {
				$error = 'Invalid file type.';
			} elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
				$error = 'Invalid file type.';
			} elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
				$error = 'Invalid file type.';
			} else {
				// Чтобы не затереть файл с таким же названием, добавим префикс.
				$i = 0;
				$prefix = '';
				while (is_file($path . $parts['filename'] . $prefix . '.' . $parts['extension'])) {
		  			$prefix = '(' . ++$i . ')';
				}
				$name = $parts['filename'] . $prefix . '.' . $parts['extension'];
				// Перемещаем файл в директорию.
					if (move_uploaded_file($file['tmp_name'], $path . $name)) {
					// Далее можно сохранить название файла в БД и т.п.
					$dbpath = $path.$name;
					mysqli_query($connect, "UPDATE auth_users SET `resume`='$dbpath' WHERE login_user='$login'");
					$success = 'The file «' . $name . '» has been successfully uploaded.<br/>File type is '.$_FILES[$input_name]['type'].'<br/>File size is '.$_FILES[$input_name]['size'].'B' ;
				} else {
					$error = 'Failed to upload the file.';
				}
			}
		}
		$_SESSION['user']['resume'] = $path . $name;
		header('Location: ./profile.php');
	}
}
?>
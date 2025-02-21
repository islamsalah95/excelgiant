<?php
namespace App\Controller;


class SchoolImageController {


    public function uploadImage($file) {
        $uploadDir = __DIR__ . '/../../assets/schools/'; // تأكد من أن المسار صحيح ومجلد "schools" موجود
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . '_' . basename($file['name']);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return $fileName;
        }
        return false;
    }

    public function getAllImages() {
        $uploadDir = __DIR__ . '/../../assets/schools/';
        return array_diff(scandir($uploadDir), array('.', '..'));
    }

    public function deleteImage($imageName) {
        $filePath = __DIR__ . '/../../assets/schools/' . $imageName;
        if (file_exists($filePath)) {
            unlink($filePath);
            return true;
        }
        return false;
    }
}
?>

<?php


class ModelAdmin extends Model
{

    /**
     *
     */
    public function getUsers()
    {
        $data = null;
        try {
            $data = $this->connect()->query("SELECT * FROM  users")->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $data;
    }


    /**
     *
     */
    public function getOneArticle($id)
    {
        $data = null;
        try {
            $data = $this->connect()->query("SELECT * FROM  articles WHERE id = '$id'")->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $data;
    }





    public function updateArticle($data, $id)
    {
//        $filePath = null;
//        if (isset($_FILES)) {
//            $filePath = $this->saveImage();
//        }
//        if ($filePath != null) {
//            $article = $this->getOneArticle($id);
//            if ($article['image']) {
//                unlink(__DIR__ . '/../../' . $article['image']);
//            }
//        }
        $title = $data["title"];
        $sub_title = $data["sub_title"];
        $content = $data["content"];


        if ($this->connect()) {

            $sql = "UPDATE articles
               SET title = '$title',
               sub_title = '$sub_title',
               content = '$content'
               WHERE id = '$id' ";
            return $this->connect()->prepare($sql)->execute();
        }
        return false;
    }


    /**
     * @return bool
     */
    protected function saveImage()
    {
        if (!isset($_FILES)) {
            return false;
        }
        $uploadsDir = __DIR__ . '/../../uploads';
//        if (!file_exists($uploadsDir)) {
//            mkdir($uploadsDir, 777, false);
//        }
        foreach ($_FILES as $file) {
            if ($file['type'] != 'image/jpeg' && $file['type'] != 'image/png') {
                return false;
            }
            $dateTime = new DateTime();
            $name = (string)$dateTime->getTimestamp();
            $explodeName = explode('.', $file['name']);
            $result = move_uploaded_file($file['tmp_name'], $uploadsDir . '/' . $name . '.' . end($explodeName));
            if ($result) {
                return '/uploads/' . $name . '.' . end($explodeName);
            }
        }
    }

    public function addArticle()
    {
        if ($this->connect()) {

            $sql = "INSERT INTO articles (title, sub_title, content, url, author) 
        VALUES ( :title,  :subtitle,  :content, :url, :author)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':subtitle', $subtitle, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':url', $url, PDO::PARAM_STR);
            $stmt->bindParam(':author', $author, PDO::PARAM_STR);
            $title = $_POST['title'];
            $subtitle = $_POST['sub_title'];
            $content = $_POST['content'];
            $url = '1';
            $author = '1';
            $stmt->execute();
        }
    }

    /**
     * @param $id
     */
    public function deleteArticle($id)
    {
        if ($this->connect()) {
            $sql = "DELETE
                FROM articles
                WHERE id=$id
                ";
            return $this->connect()->prepare($sql)->execute();
        }
        return false;
    }

    /**
     * @param $id
     */
    public function deleteUser($id)
    {
        if ($this->connect()) {
            $sql = "DELETE
                FROM users
                WHERE id=$id
                ";
            return $this->connect()->prepare($sql)->execute();
        }
        return false;
    }



}
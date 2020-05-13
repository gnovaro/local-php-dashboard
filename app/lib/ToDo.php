<?php
/**
 *
 */
class ToDo
{
    protected $_db;

    public function __construct()
    {
        $path = dirname(__DIR__).DIRECTORY_SEPARATOR.'db';
        try {
            $this->_db = new PDO('sqlite:'.$path.DIRECTORY_SEPARATOR.'dashboard.sqlite3');// success
            // Set errormode to exceptions
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            var_dump($e);
            die('Error to connect sqlite');
        }
    }

    /**
     * Get all pending tasks
     */
    public function getAllPendingTasks()
    {
        $tasks = null;
        $sql = 'SELECT * FROM task WHERE done IS NULL';
        $result = $this->_db->query($sql);
        if($result){
            foreach($result as $row)
            {
                $tasks[] = $row;
            }
        }
        return $tasks;
    }

    public function addTask($description)
    {
        $sql = "INSERT INTO task (description,created_at)
                VALUES(:description,now())";
        $stmt = $this->_db->prepare($sql);
        // Bind parameters to statement variables
        $stmt->bindParam(':description', $description);
        // Execute statement
        $stmt->execute();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM task WHERE id = $id";

        return $task;
    }

    public function editTask($id, $description)
    {
        $task = $this->getById($id);

    }
}

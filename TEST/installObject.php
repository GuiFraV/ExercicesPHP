<?php
class DatabaseInstaller {
    private $databasePath;
    private $dsn;
    private $sqlFilePath;

    public function __construct($root) {
        $this->databasePath = $root . '/data/data.sqlite';
        $this->dsn = 'sqlite:' . $this->databasePath;
        $this->sqlFilePath = $root . '/data/init.sql';
    }

    public function run() {
        try {
            $this->checkExistingDatabase();
            $this->createDatabaseFile();
            $this->executeSql();
            $this->reportRowCount();
        } catch (Exception $e) {
            $this->renderErrorMessage($e->getMessage());
            return;
        }
        $this->renderSuccessMessage();
    }

    private function checkExistingDatabase() {
        if (is_readable($this->databasePath) && filesize($this->databasePath) > 0) {
            throw new Exception('Please delete the existing database manually before installing it afresh');
        }
    }

    private function createDatabaseFile() {
        if (!touch($this->databasePath)) {
            throw new Exception('Could not create the database file. Please check permissions.');
        }
    }

    private function executeSql() {
        $pdo = new PDO($this->dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = file_get_contents($this->sqlFilePath);
        if ($sql === false) {
            throw new Exception('Cannot find SQL file');
        }

        $pdo->exec($sql);
    }

    private function reportRowCount() {
        $pdo = new PDO($this->dsn);
        $stmt = $pdo->query("SELECT COUNT(*) AS c FROM posts");
        echo $stmt->fetchColumn() . " rows created.\n";
    }

    private function renderErrorMessage($message) {
        echo "<div class=\"error box\">$message</div>";
    }

    private function renderSuccessMessage() {
        echo "<div class=\"success box\">The database and demo data was created OK.</div>";
    }
}

$installer = new DatabaseInstaller(realpath(__DIR__));
$installer->run();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Blog Installer</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <style type="text/css">
            .box { border: 1px dotted silver; border-radius: 5px; padding: 4px; }
            .error { background-color: #ff6666; }
            .success { background-color: #88ff88; }
        </style>
    </head>
    <body>
        <!-- Les messages seront affichés ici -->
    </body>
</html>
<?
include "wtosConfig.php";
global $site;
function MysqlError($conn)
{
    if (mysqli_errno($conn))
    {
        echo "<b>Mysql Error: " . mysqli_error($conn) . "</b>\n";
    }
}

$username = $site["user"];
$password = $site["pass"];
$db = $site["db"];
$host = $site["host"];

$target_charset = "utf8";
$target_collate = "utf8_general_ci";

echo "<pre>";

$conn = mysqli_connect($host, $username, $password);
mysqli_select_db($conn, $db);

$tabs = array();
$res = mysqli_query($conn,"SHOW TABLES");
MysqlError($conn);
while (($row = mysqli_fetch_row($res)) != null)
{
    $tabs[] = $row[0];
}

// now, fix tables
foreach ($tabs as $tab)
{
    $res = mysqli_query($conn,"show index from {$tab}");
    MysqlError($conn);
    $indicies = array();

    while (($row = mysqli_fetch_array($res)) != null)
    {
        if ($row[2] != "PRIMARY")
        {
            $indicies[] = array("name" => $row[2], "unique" => !($row[1] == "1"), "col" => $row[4]);
            mysqli_query($conn,"ALTER TABLE {$tab} DROP INDEX {$row[2]}");
            MysqlError($conn);
            echo "Dropped index {$row[2]}. Unique: {$row[1]}\n";
        }
    }

    $res = mysqli_query($conn,"DESCRIBE {$tab}");
    MysqlError($conn);
    while (($row = mysqli_fetch_array($res)) != null)
    {
        $name = $row[0];
        $type = $row[1];
        $set = false;
        if (preg_match("/^varchar\((\d+)\)$/i", $type, $mat))
        {
            $size = $mat[1];
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} VARBINARY({$size})");
            MysqlError($conn);
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} VARCHAR({$size}) CHARACTER SET {$target_charset}");
            MysqlError($conn);
            $set = true;

            echo "Altered field {$name} on {$tab} from type {$type}\n";
        }
        else if (!strcasecmp($type, "CHAR"))
        {
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} BINARY(1)");
            MysqlError($conn);
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} VARCHAR(1) CHARACTER SET {$target_charset}");
            MysqlError($conn);
            $set = true;

            echo "Altered field {$name} on {$tab} from type {$type}\n";
        }
        else if (!strcasecmp($type, "TINYTEXT"))
        {
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} TINYBLOB");
            MysqlError($conn);
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} TINYTEXT CHARACTER SET {$target_charset}");
            MysqlError($conn);
            $set = true;

            echo "Altered field {$name} on {$tab} from type {$type}\n";
        }
        else if (!strcasecmp($type, "MEDIUMTEXT"))
        {
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} MEDIUMBLOB");
            MysqlError($conn);
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} MEDIUMTEXT CHARACTER SET {$target_charset}");
            MysqlError($conn);
            $set = true;

            echo "Altered field {$name} on {$tab} from type {$type}\n";
        }
        else if (!strcasecmp($type, "LONGTEXT"))
        {
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} LONGBLOB");
            MysqlError($conn);
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} LONGTEXT CHARACTER SET {$target_charset}");
            MysqlError($conn);
            $set = true;

            echo "Altered field {$name} on {$tab} from type {$type}\n";
        }
        else if (!strcasecmp($type, "TEXT"))
        {
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} BLOB");
            MysqlError($conn);
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} TEXT CHARACTER SET {$target_charset}");
            MysqlError($conn);
            $set = true;

            echo "Altered field {$name} on {$tab} from type {$type}\n";
        }

        if ($set)
            mysqli_query($conn,"ALTER TABLE {$tab} MODIFY {$name} COLLATE {$target_collate}");
    }

    // re-build indicies..
    foreach ($indicies as $index)
    {
        if ($index["unique"])
        {
            mysqli_query($conn,"CREATE UNIQUE INDEX {$index["name"]} ON {$tab} ({$index["col"]})");
            MysqlError($conn);
        }
        else
        {
            mysqli_query($conn,"CREATE INDEX {$index["name"]} ON {$tab} ({$index["col"]})");
            MysqlError($conn);
        }

        echo "Created index {$index["name"]} on {$tab}. Unique: {$index["unique"]}\n";
    }

    // set default collate
    mysqli_query($conn,"ALTER TABLE {$tab}  DEFAULT CHARACTER SET {$target_charset} COLLATE {$target_collate}");
}

// set database charset
mysqli_query($conn,"ALTER DATABASE {$db} DEFAULT CHARACTER SET {$target_charset} COLLATE {$target_collate}");

mysqli_close($conn);
echo "</pre>";

?>

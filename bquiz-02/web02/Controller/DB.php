<?php

class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db02";
    protected $pdo;
    protected $links;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function all(...$arg)
    {
        $sql = "select * from $this->table ";
        $sql = $this->sql_all($sql, ...$arg);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$arg)
    {
        $sql = "select count(*) from $this->table ";
        $sql = $this->sql_all($sql, ...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($arg)
    {
        $sql = "select * from $this->table ";
        $sql = $this->sql_one($sql, $arg);
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($arg)
    {
        $sql = "delete from $this->table ";
        $sql = $this->sql_one($sql, $arg);
        return $this->pdo->exec($sql);
    }

    function save($arg)
    {
        if (isset($arg['id'])) {
            $tmp = $this->a2s($arg);
            $sql = "update $this->table set " . join(" , ", $tmp);
            $sql = $sql . " where `id` = {$arg['id']}";
        } else {
            $keys = join("`,`", array_keys($arg));
            $values = join("','", $arg);
            $sql = "INSERT INTO $this->table (`" . $keys . "`) VALUES ('" . $values . "')";
        }
        return $this->pdo->exec($sql);
    }

    function max($col, ...$arg)
    {
        return $this->math('max', $col, ...$arg);
    }

    function min($col, ...$arg)
    {
        return $this->math('min', $col, ...$arg);
    }

    function sum($col, ...$arg)
    {
        return $this->math('sum', $col, ...$arg);
    }

    protected function math($math, $col, ...$arg)
    {
        $sql = "select $math($col) from $this->table ";
        $sql = $this->sql_all($sql, ...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }

    protected function a2s($array)
    {
        foreach ($array as $key => $value) {
            if ($key != 'id') {
                $tmp[] = "`$key`='$value'";
            }
        }
        return $tmp;
    }

    protected function sql_all($sql, ...$arg)
    {
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql = $sql . " where " . join(" && ", $tmp);
            } else {
                $sql = $sql . $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql = $sql . $arg[1];
        }
        return $sql;
    }

    protected function sql_one($sql, $arg)
    {
        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql = $sql . " where " . join(" && ", $tmp);
        } else {
            $sql = $sql . " where `id` = '{$arg}' ";
        }
        return $sql;
    }

    function view($path, $arg = [])
    {
    //extract()會把陣列中的key值變成變數名稱，value值變成變數值
        extract($arg);
        include($path);
    }


    function paginate($num, $arg = null, $arg2 = null)
    {
        $total = $this->count($arg, $arg2);
        $pages = ceil($total / $num);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $num;

        $rows = $this->all($arg, $arg2 . " limit $start,$num");

        $this->links = [
            'total' => $total,
            'pages' => $pages,
            'now' => $now,
            'start' => $start,
            'num' => $num,
            'table' => $this->table
        ];
        return $rows;
    }

    function links($page = null)
    {
        if (is_null($page)) {
            $page = $this->table;
        }
        $html = '';

        if ($this->links['now'] - 1 >= 1) {
            $prev = $this->links['now'] - 1;
            $html .= "<a href='?do=$page&p=$prev'> &lt; </a>";
        }

        for ($i = 1; $i <= $this->links['pages']; $i++) {
            $fontsize = ($i == $this->links['now']) ? "24px" : "16px";
            $html .= "<a href='?do=$page&p=$i' style='font-size:$fontsize'> $i </a>";
        }

        if ($this->links['now'] + 1 <= $this->links['pages']) {
            $next = $this->links['now'] + 1;
            $html .= "<a href='?do=$page&p=$next'> &gt; </a>";
        }
        return $html;
    }
}

// $db= new DB('test');
// $db->save(['text'=>'考試加油!!']);
// $db->save(['id'=>2,'text'=>'結訓順利!!']);
// echo $db->find(3)['text'];
// $db->del(2);

// $DB = new DB('test');
// if (!isset(($DB->find(1))['id'])) {
//     $DB->save(['text' => 1]);
//     $DB->save(['text' => 2]);
//     $DB->save(['text' => 3]);
//     $DB->save(['id' => 1, 'text' => 2]);
//     $DB->del(3);
//     $DB->save(['text' => 4]);
// }
// echo "<pre>";
// print_r($DB->all());
// echo "</pre>";
// $rows = $DB->paginate(1);
// $start = $DB->test()['start'];
// foreach ($rows as $key => $val) {
//     echo "<br>" . $key +  $start + 1 . "=>" . $val['text'] . "<br>";
// };
// echo $DB->links('db');
<?php

class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db04";
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

    function links($do = null)
    {
        if (is_null($do)) {
            $do = $this->table;
        }

        $html = '';

        if ($this->links['now'] - 1 >= 1) {
            $prev = $this->links['now'] - 1;
            $html .= "<a href='?do=$do&p=$prev'> &lt; </a>";
        }

        for ($i = 1; $i <= $this->links['pages']; $i++) {
            $fontsize = ($i == $this->links['now']) ? "24px" : "16px";
            $html .= "<a href='?do=$do&p=$i' style='font-size:$fontsize'> $i </a>";
        }

        if ($this->links['now'] + 1 <= $this->links['pages']) {
            $next = $this->links['now'] + 1;
            $html .= "<a href='?do=$do&p=$next'> &gt; </a>";
        }
        return $html;
    }
}

<?php

class DB{
    protected $table;
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db04";
    protected $pdo;
    protected $links;

    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    // 我們先將 SQL 語法當作字串放到變數
    // 再來執行 PDO 物件並導向到裡面的query()函數。讓 PDO 進行 SQL 連接並且執行 query()。
    // 每次 PDO 連線結束後會 return 資料給我們，我們可以用個變數（名稱自訂）存起來。
    function all(...$arg){
        $sql="select * from $this->table ";
        $sql=$this->sql_all($sql,...$arg);
        // PDO::FETCH_ASSOC 返回以欄位名稱作為索引鍵(key)的陣列(array)
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$arg){
        $sql="select count(*) from $this->table ";
        $sql=$this->sql_all($sql,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($arg){
        $sql="select * from $this->table ";
        $sql=$this->sql_one($sql,$arg);
        // PDO::FETCH_ASSOC 返回以欄位名稱作為索引鍵(key)的陣列(array)
        // `name`='admin',`pw`='1234'
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($arg){
        $sql="delete from $this->table ";
        $sql=$this->sql_one($sql,$arg);
        return $this->pdo->exec($sql);
    }

    function save($arg){
        if(isset($arg['id'])){
            $tmp=$this->a2s($arg);
            $sql="update $this->table set ". join(",",$tmp);
            $sql=$sql . " where `id`='{$arg['id']}'";
        }else{
            $keys=join("`,`",array_keys($arg));
            $values=join("','",$arg);
            $sql="insert into $this->table (`".$keys."`) values('".$values."')";
        }
        return $this->pdo->exec($sql);
    }

    function max($col,...$arg){
        return $this->math('max',$col,...$arg);
    }

    function min($col,...$arg){
        return $this->math('min',$col,...$arg);
    }

    function sum($col,...$arg){
        return $this->math('sum',$col,...$arg);
    }

    protected function math($math,$col,...$arg){
        $sql="select $math($col) from $this->table ";
        $sql=$this->sql_all($sql,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    
    // Tools
    protected function a2s($array){
        foreach ($array as $key => $value) {
            if($key!='id'){
                $tmp[]="`$key`='$value'";
            }
        }
        return $tmp;
    }

    protected function sql_all($sql,...$arg){
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp=$this->a2s($arg[0]);
            // select * from `users` where `name` = 'admin' && `pw` = '1234';
                $sql=$sql . " where " .join(" && ",$tmp);
            }else{
                $sql=$sql . $arg[0];
            }
        }
        if(isset($arg[1])){
            $sql=$sql. $arg[1];
        }
        return $sql;
    }

    protected function sql_one($sql,$arg){
        if(is_array($arg)){
            $tmp=$this->a2s($arg);
            // select * from `users` where `name` = 'admin' && `pw` = '1234';
            $sql=$sql . " where " .join(" && ",$tmp);
        }else{
            // select * from `users` where `id` = '3' ;
            $sql=$sql . " where `id`='$arg'";
        }
        return $sql;
    }

    // view畫面
    function view($path,$arg=[]){
        extract($arg);
        include($path);
    }
    // function view($url,$data=null){
    //     extract($data);
    //     include($url);
    // }

    // $num每頁資料筆數，$arg代入參數
    function paginate($num,$arg=null,$arg2=null){
        $total = $this->count($arg,$arg2); //資料總筆數
        $pages = ceil($total/$num);  //資料總頁數
        $now = $_GET['p']??1; //當前頁數
        $start = ($now-1)*$num; //每頁開頭為第幾筆資料

        // $rows=$this->all($arg," limit $start,$num");
        $rows = $this->all($arg,$arg2 . " limit $start,$num");
        $this->links=[
                      'total'=>$total,
                      'pages'=>$pages,
                      'now'=>$now,
                      'start'=>$start,
                      'num'=>$num,
                      'table'=>$this->table
                     ];
        return $rows;
    }
    
    function links($do=null){
        if(is_null($do)){
            $do = $this->table;
        }

        $html = '';
        if($this->links['now']-1 >= 1 ){
            $prev = $this->links['now']-1;
            // $html .= "<a href='?do=$this->table&p=$prev'> &lt; </a>";
            $html .= "<a href='?do=$do&p=$prev'> &lt; </a>";
        }

        for($i=1 ;$i <= $this->links['pages'];$i++){
            $fontsize = ($i==$this->links['now'])?"24px":"16px";
            // $html .= "<a href='?do=$this->table&p=$i' style='font-size:$fontsize'> $i </a>";
            $html .= "<a href='?do=$do&p=$i' style='font-size:$fontsize'> $i </a>";
        }

        if($this->links['now']+1 <= $this->links['pages']){
            $next = $this->links['now']+1;
            // $html .= "<a href='?do=$this->table&p=$next'> &gt; </a>";
            $html .= "<a href='?do=$do&p=$next'> &gt; </a>";
        }

        return $html;
    }
}

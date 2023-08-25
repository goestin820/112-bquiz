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

    // 先將 SQL 語法當作字串放到變數
    // 再來執行 PDO 物件並導向到裡面的query()函數，讓 PDO 進行 SQL 連接並執行 query()。
    // 每次 PDO 連線結束後會 return 資料給我們，可以用變數（自訂名稱）存起來。
    function all(...$arg){
        //建立一個基礎語法字串
        $sql="select * from $this->table ";
        $sql=$this->sql_all($sql,...$arg);
        // PDO::FETCH_ASSOC 返回以欄位名稱作為索引鍵(key)的陣列(array)
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    //因為這類方法大多是只會回傳一個值,所以使用fetchColumn()的方式來回傳
    function count(...$arg){
        $sql="select count(*) from $this->table ";
        $sql=$this->sql_all($sql,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }

    // find(1)['viewer']
    function find($arg){
        $sql="select * from $this->table ";
        $sql=$this->sql_one($sql,$arg);
        // PDO::FETCH_ASSOC 返回以欄位名稱作為索引鍵(key)的陣列(array)
        // `acc`='admin',`pw`='1234'
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    // del(1)
    function del($arg){
        $sql="delete from $this->table ";
        $sql=$this->sql_one($sql,$arg);
        return $this->pdo->exec($sql);
    }
    
    /**
     * $arg 必須是個陣列，但考量速度，所以程式中沒有特別檢查是否為陣列，
     * 依據$arg是否帶有'id'這個key值，來決定是更新(有id)還是新增(沒id)
     */
    function save($arg){
        if(isset($arg['id'])){
            $tmp=$this->a2s($arg);
            $sql="update $this->table set ". join(",",$tmp);
            $sql=$sql . " where `id`='{$arg['id']}'"; //加上id值做為條件
            // save(['id'=>1,'viewer'=>50'])
        }else{
             //利用php內建的array_keys()函式把陣列的key值獨立成為一個陣列
            $keys=join("`,`",array_keys($arg));
            $values=join("','",$arg);
            $sql="insert into $this->table (`".$keys."`) values('".$values."')";
            // save(['date'=>date('Y-m-d'),'viewer'=>100])
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

    // math('max','goods',`type`=>'4' )
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

    /** 
    * 此方法僅供類別內部使用，外部無法呼叫
    * $sql 一個sql的字串，主要是where 前的語法
    * 根據不同的參數內容，會組合出適合的sql語句來回傳
    **/    
    protected function sql_all($sql,...$arg){
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp=$this->a2s($arg[0]);
            //如果第一個參數是陣列，則依欄位條件組成sql語句
            // select * from `users` where `acc` = 'admin' && `pw` = '1234';
                $sql=$sql . " where " .join(" && ",$tmp);
            }else{
                //如果第一個參數不是陣列，則視同字串和$sql串在一起
                $sql=$sql . $arg[0];
            }
        }
        if(isset($arg[1])){
            $sql=$sql. $arg[1];
        }
        return $sql;
    }

    /** 
     * $sql 一個sql的字串，主要是where 前的語法
     * $arg 可能是id值或一個陣列，陣列的話會是key-value的型式
     * 此方法用來建立一個包含where中會有 `id`='$arg'型式的sql語句
     * 如果$arg不是id則會把陣列做成where後的條件語句
    **/
    protected function sql_one($sql,$arg){
        if(is_array($arg)){
            $tmp=$this->a2s($arg);
            // select * from `users` where `acc` = 'admin' && `pw` = '1234';
            $sql=$sql . " where " .join(" && ",$tmp);
        }else{
            // select * from `users` where `id` = '3' ;
            $sql=$sql . " where `id`='$arg'";
        }
        return $sql;
    }

    // 引入頁面模版
    //view("./view/backend/user.php",$data); $data=['rows'=>$this->all(),]
    function view($path,$arg=[]){
        extract($arg);  //將陣列內容解開為數個變數
        include($path); //引入指定路徑的檔案
    }


    // $num每頁資料筆數，$arg代入條件式，可能是陣列也可能是字串
    function paginate($num,$arg=null,$arg2=null){
        $total = $this->count($arg,$arg2); //資料總筆數
        $pages = ceil($total/$num);  //資料總頁數
        $now = $_GET['p']??1; //根據網址是否帶有p參數來決定目前的頁碼
        $start = ($now-1)*$num; //每頁開頭為第幾筆資料

        //利用內部的all方法來取得資料，其中最後的參數為sql 中的limit語法
        // $rows=$this->all($arg," limit $start,$num");
        $rows = $this->all($arg,$arg2 . " limit $start,$num");

         //完成資料取得後，將分頁資訊寫入到類別中的links成員，方便換頁連結使用
        $this->links=[
                      'total'=>$total,
                      'pages'=>$pages,
                      'now'=>$now,
                      'start'=>$start,
                      'num'=>$num,
                      'table'=>$this->table
                     ];
        return $rows; //回傳分頁需要的資料陣列
    }
    
    function links($do=null){
        if(is_null($do)){
            $do = $this->table;
        }

        $html = '';
        //判斷是否有上一頁，有的話則建立起上一頁的連結html碼
        if($this->links['now']-1 >= 1 ){
            $prev = $this->links['now']-1;
            // $html .= "<a href='?do=$this->table&p=$prev'> &lt; </a>";
            $html .= "<a href='?do=$do&p=$prev'> &lt; </a>";
        }

        //使用回圈印出每一頁的連結html碼
        for($i=1 ;$i <= $this->links['pages'];$i++){
             //判斷是否為當前頁，當前頁則字型放大
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

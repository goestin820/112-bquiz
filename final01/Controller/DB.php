<?php
class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db77";
    protected $table;
    protected $user="root";
    protected $pw="";
    protected $pdo;
    protected $add_header='';
    protected $header='';
    protected $links;
    /**
     * 建構式
     * 在實例化時，需要帶入一個資料表名稱，並會在實例化時，建立起對資料庫的連線
     */
    function __construct($table)
    {
        $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
        $this->table=$table;
    }

    /**
     * 取得多筆資料的方法
     * 採用不定參數，因此使用方法可以有：
     * all() 不帶參數，表示要撈取資料表全部內容
     * all($array) 帶入一個陣列，表示要撈取符合陣列條件的資料
     * all($array,$sql) 帶入陣列及其他sql字串，表示要撈取符合陣列條件及其它限制條件的資料
     * all($sql) 帶入一個sql字串，表示要撈取符合sql字串條件的資料
     */
    function all(...$arg){
        $sql="select * from $this->table ";

        if(!empty($arg)){
            if(is_array($arg[0])){

                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }

                $sql=$sql . " where " . join(" && " ,$tmp);
            }else{
                $sql=$sql . $arg[0];
            }

            if(isset($arg[1])){
                $sql=$sql . $arg[1];
            }
        }
        
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 取得單筆資料的方法
     * 限定只能帶入一個參數
     * $arg 如果是陣列，表示要撈取符合陣列條件的資料
     * $arg 如果是id，表示要撈取指定id的資料
     */
    function find($arg){
        $sql="select * from $this->table ";

            if(is_array($arg)){

                foreach($arg as $key => $value){
                    $tmp[]="`$key`='$value'";
                }

                $sql=$sql . " where " . join(" && " ,$tmp);
            }else{

                $sql=$sql . " where `id`='$arg'";
            }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * 新增或更新資料的方法
     * 限制只能帶入一個參數，而且這個參數必須是陣列
     * 如果$arg陣列中有id這個項目,表示要進行更新資料
     * 如果$arg陣列中沒有id這個項目，表示要進行新增資料
     */
    function save($arg){
        if(isset($arg['id'])){
            //update
            foreach($arg as $key => $value){
                $tmp[]="`$key`='$value'";
            }

            $sql="update $this->table set ".join(',',$tmp)." where `id`='{$arg['id']}'";

        }else{
            //insert

            $cols=array_keys($arg);

            $sql="insert into  $this->table (`".join("`,`",$cols)."`) 
                                      values('".join("','",$arg)."')";
        }

        return $this->pdo->exec($sql);
    }

    /**
     * 刪除資料的方法
     * 限制只能帶入一個參數
     * $arg 如果是陣列，表示要刪除符合陣列條件的資料(可能是多筆刪除)
     * $arg 如果是數字，表示要刪除指定id的資料
     * $arg 如果是字串，表示要刪除指定SQL條件語法的資料
     */
    function del($arg){
        $sql="delete from $this->table ";

            if(is_array($arg)){

                foreach($arg as  $key => $value){
                    $tmp[]="`$key`='$value'";
                }

                $sql=$sql . " where " . join(" && " ,$tmp);
            }else if(is_numeric($arg)){

                $sql=$sql . " where `id`=". $arg;

            }else{

                $sql=$sql . $arg;
            }

          //  echo $sql;

        return $this->pdo->exec($sql);
    }

    /**
     * 計算資料表筆數的方法
     * 利用原有的all()方法來取得符合條件的資料
     * 計算all()所回傳的陣列內容筆數即為資料筆數
     */
    function count(...$arg){
        $result=$this->all(...$arg);
        return count($result);
    }

    /**
     * 利用原有的math()方法，
     * 用來簡化方法的應用，但又不影響原本math()的其它彈性應用 
     */
    function sum($col,...$arg){
        return $this->math('sum',$col,...$arg);
    }

    function max($col,...$arg){
        return $this->math('max',$col,...$arg);
    }

    function min($col,...$arg){
        return $this->math('min',$col,...$arg);
    }

    function avg($col,...$arg){
        return $this->math('avg',$col,...$arg);
    }

    /**
     * 聚合函數的方法
     * 帶入聚合函數的名稱及指定要計算的欄位，即可計算結果
     */
    function math($math,$col,...$arg){
        $sql="select $math($col) from $this->table ";

        if(!empty($arg)){
            if(is_array($arg[0])){

                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }

                $sql=$sql . " where " . join(" && " ,$tmp);
            }else{
                $sql=$sql . $arg[0];
            }

            if(isset($arg[1])){
                $sql=$sql . $arg[1];
            }
        }

        return $this->pdo->query($sql)->fetchColumn();
    }

    /**
     * $path:要include進來的頁面檔案
     * $arg:要在頁面檔案中使用的變數內容
     */
    function view($path,$arg=[]){
        //extract()函式可以把key-value的陣列拆解成$key=value的型式
        extract($arg);
        include $path;
    }

    /**
     * 彈出視窗的共同模板
     */
    public function modal($slot,$action){
    ?>
    <h3><?=$this->add_header;?></h3>
    <hr>
    <form action="<?=$action;?>" method="post" enctype="multipart/form-data">
        <table>
            <?=$slot;?>
            <tr>
            <input type="hidden" name="table" value='<?=$this->table;?>'>
                <td><input type="submit" value="新增"></td>
                <td><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
    
    <?php
    }

    /**
     * 分頁功能，此函式主要在根據參數來回傳分頁的資料
     * $div:每頁的資料數
     * $arg:用在SQL語法中的指令字串或條件陣列
     */
    function paginate($div,$arg=null){
        $total=$this->count($arg);   //計算需要分頁的資料總筆數
        $pages=ceil($total/$div);    //計算總頁數
        $now=$_GET['page']??1;       //使用GET來取得當前頁面,預設為1
        $start=($now-1)*$div;        //計算要從那筆資料開始取
        $rows=$this->all( $arg," limit $start,$div"); //將條件代入all()函式來取出資料

        //將以上計算出的相關參數記入類別中的links成員
        $this->links=[
            'total'=>$total,
            'pages'=>$pages,
            'now'=>$now,
            'start'=>$start,
        ];
        return $rows;
    }

    /**
     * links()方法一定要在paginate()執行後才會有效果，
     * 用途是在頁面上秀出分頁的連結
     * 重要的參數是利用$this->links中的資料來計算各個連結的功能
     */
    function links(){

        //判斷是否還有前一頁，然後顯示前一頁的連結
        if(($this->links['now']-1)>=1){
            $prev=$this->links['now']-1;
           echo "<a href='?do=$this->table&page=$prev'> &lt; </a>";

        }
        
        //根據總頁數來顯示所有頁面的連結
        for($i=1;$i<=$this->links['pages'];$i++){
            $fontsize=($i==$this->links['now'])?'24px':'16px';
            echo "<a href='?do=$this->table&page=$i' style='font-size:$fontsize'> $i </a>";
        }   

        //判斷是否還有下一頁，然後顯示下一頁的連結
        if(($this->links['now']+1)<=$this->links['pages']){
             $next=$this->links['now']+1;
            echo "<a href='?do=$this->table&page=$next'> &gt; </a>";
        }
     
    }
    
}
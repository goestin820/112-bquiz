<?php

class DB{
    protected $table;
    protected $pdo;
    protected $dsn='mysql:host=localhost;charset=utf8;dbname=db77';
    protected $links;

    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    /** 功能方法 */
    function all(...$arg){
        $sql="select * from $this->table ";
        $sql=$this->sql($sql,...$arg);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($arg){
        $sql="select * from $this->table ";

        if(is_array($arg)){
            $tmp=$this->a2s($arg);
            $sql=$sql." where ". join(" && ",$tmp);
        }else{
            $sql=$sql. " where `id`='$arg'";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

    }

    function count(...$arg){
        $sql="select count(*) from $this->table ";
        $sql=$this->sql($sql,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }

    function save($arg){
        if(isset($arg['id'])){
            // $sql="update $this->table set ";
            // $sql=$sql . join(",",$tmp);
            // $sql=$sql . " where `id`='{$arg['id']}'";
            $tmp=$this->a2s($arg);
            $sql="update $this->table set ". join(",",$tmp) . " where `id`='{$arg['id']}'";
        }else{
            $key=array_keys($arg);
            $sql="insert into $this->table (`".join("`,`",$key)."`) value('".join("','",$arg)."')";
        }

        return $this->pdo->exec($sql);
    }

    function del($arg){
        $sql="delete from $this->table ";

        if(is_array($arg)){
            $tmp=$this->a2s($arg);
            $sql=$sql." where ". join(" && ",$tmp);
        }else{
            $sql=$sql. " where `id`='$arg'";
        }

        return $this->pdo->exec($sql);
    }

    //     protected function sql_one($sql,$arg){
    //     if(is_array($arg)){
    //         $tmp=$this->a2s($arg);
    //         $sql= $sql . " where " . join(" && ",$tmp);
    //     }else{
    //         $sql=$sql . " where `id`='$arg'";
    //     }
    //     return $sql;
    // }

    function max($col,...$arg){
        return $this->math('max',$col,...$arg);
    }

    function min($col,...$arg){
        return $this->math('min',$col,...$arg);
    }

    function sum($col,...$arg){
        return $this->math('sum',$col,...$arg);
    }

    /** 畫面資料方法 */

    function view($path,$arg=[]){
        extract($arg);
        include($path);
    }

    function paginate($num,$arg=null){
        $total=$this->count($arg);
        $pages=ceil($total/$num);
        $now=$_GET['p']??1;
        $start=($now-1)*$num;

        $rows=$this->all($arg," limit $start,$num");
        $this->links=[
            'total'=>$total,
            'pages'=>$pages,
            'now'=>$now,
            'start'=>$start,
            'table'=>$this->table
        ];

        return $rows;
    }

    function links(){
        $html='';
        if($this->links['now']-1>=1){
            $prev=$this->links['now']-1;
            $html.="<a href='?do=$this->table&p=$prev'> &lt; </a>";
        }
        for($i=1;$i<=$this->links['pages'];$i++){
            $size=($this->links['now']==$i)?'24px':'18px';
            $html.="<a href='?do=$this->table&p=$i' style='font-size:$size'> $i </a>";
        }
        if($this->links['now']+1<=$this->links['pages']){
            $next=$this->links['now']+1;
            $html.="<a href='?do=$this->table&p=$next'> &gt; </a>";
        }
        return $html;
    }
    /** 工具型方法 */

    protected function math($math,$col,...$arg){

        $sql="select $math($col) from $this->table ";

        $sql=$this->sql($sql,...$arg);

        return $this->pdo->query($sql)->fetchColumn();

    }

    protected function  a2s($array){
        foreach($array as $key => $value){
            // 假如key不是id的話，就將key=value資料存入$tmp[]陣列
            if($key!='id'){
                $tmp[]="`$key`='$value'";
            }
        }
        //回傳$tmp值
        return $tmp;
    }

    protected function sql($sql,...$arg){

        if(!empty($arg)){
            if(is_array($arg[0])){
                $tmp=$this->a2s($arg[0]);

                $sql=$sql . " where ".join(" && ",$tmp);
            }else{
                $sql=$sql .$arg[0];
            }

            if(isset($arg[1])){
                $sql=$sql. $arg[1];
            }
        }

        return $sql;

    }
}
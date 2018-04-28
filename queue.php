<?php
/** 
*  php队列算法 
*   
*  Create On 2010-6-4 
*  Author Been 
*  QQ:281443751 
*  Email:binbin1129@126.com 
**/  
class data {  
    //数据  
    private $data;  
      
    public function __construct($data){  
        $this->data=$data;  
        echo $data.":哥进队了！".PHP_EOL;  
    }  
      
    public function getData(){  
        return $this->data;  
    }  
    public function __destruct(){  
        echo $this->data."：哥走了！".PHP_EOL;  
    }  
}  
class queue{  
    protected $front;//队头  
    protected $rear;//队尾  
    protected $queue=array('0'=>'队尾');//存储队列  
    protected $maxsize;//最大数  
      
    public function __construct($size){  
        $this->initQ($size);  
    }  
    //初始化队列  
    private function initQ($size){  
        $this->front=0;  
        $this->rear=0;  
        $this->maxsize=$size;  
    }  
    //判断队空  
    public function QIsEmpty(){  
        return $this->front==$this->rear;  
    }  
    //判断队满  
    public function QIsFull(){  
        return ($this->front-$this->rear)==$this->maxsize;  
    }  
    //获取队首数据  
    public function getFrontDate(){  
        return $this->queue[$this->front]->getData();  
    }  
    //入队  
    public function InQ($data){  
        if($this->QIsFull())echo $data.":我一来咋就满了！（队满不能入队，请等待！）".PHP_EOL;  
        else {  
            $this->front++;  
            // echo $this->front.PHP_EOL;  
            for($i=$this->front;$i>$this->rear;$i--){   
                if (isset($this->queue[$i])) unset($this->queue[$i]);  
                $this->queue[$i]=$this->queue[$i-1];  
            }  
            $this->queue[$this->rear+1]=new data($data);  
            // print_r($this->queue);  
            // echo '入队成功!'.PHP_EOL;  
        }  
    }  
    //出队  
    public function OutQ(){  
        if($this->QIsEmpty())echo "队空不能出队！<br>";  
        else{  
            unset($this->queue[$this->front]);  
            $this->front--;  
            // print_r($this->queue);  
            //echo $this->front;  
            echo "出队成功！".PHP_EOL;  
        }  
    }  
}  
$q = new queue(3);  
$q->InQ('one');  
$q->InQ('two');
// $q->InQ('three');
$q->OutQ();



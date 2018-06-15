<?php

namespace app\index\model;

use think\Model;

class Articlecate extends Model
{
    //
    public function cateTree()
    {
        $data=db("article_cate")->where("pid",0)->select(); 
        $data=$this->getCatelist();
        return $data;
    }
    /**
     *递归获取数据
     */
    protected function getCatelist($pid = 0,&$result = array()){

            $arr=db('article_cate')
                ->where("pid = '".$pid."'")->select(); 
        if(empty($arr)){
            return array();
        }
        foreach ($arr as $cm) {
            $thisArr=&$result[];
            $cm["children"] = $this->getCatelist($cm["id"],$thisArr);
            $thisArr = $cm;
        }
        return $result;
    }



}

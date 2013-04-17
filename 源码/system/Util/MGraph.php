<?php  
namespace Util;

/**
 * PHP 实现图邻接矩阵
 * 算法来源：http://bbs.phpchina.com/blog-954727-192702.html
 * @author zhaojiangwei
 * @since 2011/10/31 17:23
 */
class MGraph{
	private $vexs; //顶点数组
	private $arc; //边邻接矩阵,即二维数组
	private $arcData; //边的数组信息
	private $direct; //图的类型(无向或有向)
	private $hasList; //尝试遍历时存储遍历过的结点
	private $queue; //广度优先遍历时存储孩子结点的队列,用数组模仿
	private $infinity = 65535;//代表无穷,即两点无连接,建带权值的图时用,本示例不带权值
	private $primVexs; //prim算法时保存顶点
	private $primArc; //prim算法时保存边
	private $krus;//kruscal算法时保存边的信息

	public function MGraph($vexs, $arc, $direct = 0){
		$this->vexs = $vexs;
		$this->arcData = $arc;
		$this->direct = $direct;
		$this->initalizeArc();
		$this->createArc();
	}

	private function initalizeArc(){
		foreach($this->vexs as $value){
			foreach($this->vexs as $cValue){
				$this->arc[$value][$cValue] = ($value == $cValue ? 0 : $this->infinity);
			}
		}
	}

	//创建图 $direct:0表示无向图,1表示有向图
	private function createArc(){
		foreach($this->arcData as $key=>$value){
			$strArr = str_split($key);
			$first = $strArr[0];
			$last = $strArr[1];
			 
			$this->arc[$first][$last] = $value;
			if(!$this->direct){
				$this->arc[$last][$first] = $value;
			}
		}
	}

	//floyd算法
	public function floyd(){
		$path = array();//路径数组
		$distance = array();//距离数组

		foreach($this->arc as $key=>$value){
			foreach($value as $k=>$v){
				$path[$key][$k] = $k;
				$distance[$key][$k] = $v;
			}
		}

		for($j = 0; $j < count($this->vexs); $j ++){
			for($i = 0; $i < count($this->vexs); $i ++){
				for($k = 0; $k < count($this->vexs); $k ++){
					if($distance[$this->vexs[$i]][$this->vexs[$k]] > $distance[$this->vexs[$i]][$this->vexs[$j]] + $distance[$this->vexs[$j]][$this->vexs[$k]]){
						$path[$this->vexs[$i]][$this->vexs[$k]] = $path[$this->vexs[$i]][$this->vexs[$j]];
						$distance[$this->vexs[$i]][$this->vexs[$k]] = $distance[$this->vexs[$i]][$this->vexs[$j]] + $distance[$this->vexs[$j]][$this->vexs[$k]];
					}
				}
			}
		}

		return array($path, $distance);
	}

	//djikstra算法
	public function dijkstra(){
		$final = array();
		$pre = array();//要查找的结点的前一个结点数组
		$weight = array();//权值和数组
		foreach($this->arc[$this->vexs[0]] as $k=>$v){
			$final[$k] = 0;
			$pre[$k] = $this->vexs[0];
			$weight[$k] = $v;
		}

		$final[$this->vexs[0]] = 1;

		for($i = 0; $i < count($this->vexs); $i ++){
			$key = 0;
			$min = $this->infinity;

			for($j = 1; $j < count($this->vexs); $j ++){
				$temp = $this->vexs[$j];
				if($final[$temp] != 1 && $weight[$temp] < $min){
					$key = $temp;
					$min = $weight[$temp];
				}
			}

			$final[$key] = 1;

			for($j = 0; $j < count($this->vexs); $j ++){
				$temp = $this->vexs[$j];
				if($final[$temp] != 1 && ($min + $this->arc[$key][$temp]) < $weight[$temp]){
					$pre[$temp] = $key;
					$weight[$temp] = $min + $this->arc[$key][$temp];
				}
			}
		}

		return $pre;
	}

	//kruscal算法
	private function kruscal(){
		$this->krus = array();

		foreach($this->vexs as $value){
			$krus[$value] = 0;
		}

		foreach($this->arc as $key=>$value){
			$begin = $this->findRoot($key);

			foreach($value as $k=>$v){
				$end = $this->findRoot($k);
				if($begin != $end){
					$this->krus[$begin] = $end;
				}
			}
		}
	}

	//查找子树的尾结点
	private function findRoot($node){
		while($this->krus[$node] > 0){
			$node = $this->krus[$node];
		}

		return $node;
	}



	//prim算法,生成最小生成树
	public function prim(){
		$this->primVexs = array();
		$this->primArc = array($this->vexs[0]=>0);

		for($i = 1; $i < count($this->vexs); $i ++){
			$this->primArc[$this->vexs[$i]] = $this->arc[$this->vexs[0]][$this->vexs[$i]];
			$this->primVexs[$this->vexs[$i]] = $this->vexs[0];
		}

		for($i = 0; $i < count($this->vexs); $i ++){
			$min = $this->infinity;
			$key;

			foreach($this->vexs as $k=>$v){
				if($this->primArc[$v] != 0 && $this->primArc[$v] < $min){
					$key = $v;
					$min = $this->primArc[$v];
				}
			}

			$this->primArc[$key] = 0;

			foreach($this->arc[$key] as $k=>$v){
				if($this->primArc[$k] != 0 && $v < $this->primArc[$k]){
					$this->primArc[$k] = $v;
					$this->primVexs[$k] = $key;
				}
			}
		}

		return $this->primVexs;
	}

	//一般算法,生成最小生成树
	public function bst(){
		$this->primVexs = array($this->vexs[0]);
		$this->primArc = array();

		next($this->arc[key($this->arc)]);
		$key = NULL;
		$current = NULL;

		while(count($this->primVexs) < count($this->vexs)){
			foreach($this->primVexs as $value){
				foreach($this->arc[$value] as $k=>$v){
					if(!in_array($k, $this->primVexs) && $v != 0 && $v != $this->infinity){
						if($key == NULL || $v < current($current)){
							$key = $k;
							$current = array($value . $k=>$v);
						}
					}

				}
			}

			$this->primVexs[] = $key;
			$this->primArc[key($current)] = current($current);
			$key = NULL;
			$current = NULL;
		}

		return array('vexs'=>$this->primVexs, 'arc'=>$this->primArc);
	}

	//一般遍历
	public function reserve(){
		$this->hasList = array();

		foreach($this->arc as $key=>$value){
			if(!in_array($key, $this->hasList)){
				$this->hasList[] = $key;
			}

			foreach($value as $k=>$v){
				if($v == 1 && !in_array($k, $this->hasList)){
					$this->hasList[] = $k;
				}
			}
		}

		foreach($this->vexs as $v){
			if(!in_array($v, $this->hasList))
				$this->hasList[] = $v;
		}

		return implode($this->hasList);
	}

	//广度优先遍历
	public function bfs(){
		$this->hasList = array();
		$this->queue = array();

		foreach($this->arc as $key=>$value){
			if(!in_array($key, $this->hasList)){
				$this->hasList[] = $key;
				$this->queue[] = $value;

				while(!emptyempty($this->queue)){
					$child = array_shift($this->queue);

					foreach($child as $k=>$v){
						if($v == 1 && !in_array($k, $this->hasList)){
							$this->hasList[] = $k;
							$this->queue[] = $this->arc[$k];
						}
					}
				}
			}
		}

		return implode($this->hasList);
		 
	}

	//执行深度优先遍历
	public function excuteDfs($key){
		$this->hasList[] = $key;

		foreach($this->arc[$key] as $k=>$v){
			if($v == 1 && !in_array($k, $this->hasList))
				$this->excuteDfs($k);
		}
	}

	//深度优先遍历
	public function dfs(){
		$this->hasList = array();

		foreach($this->vexs as $key){
			if(!in_array($key, $this->hasList))
				$this->excuteDfs($key);
		}

		return implode($this->hasList);
	}

	//返回图的二维数组表示
	public function getArc(){
		return $this->arc;
	}

	//返回结点个数
	public function getVexCount(){
		return count($this->vexs);
	}
}

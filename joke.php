<?php 

include_once 'vendor/autoload.php';


use QL\QueryList;


class Collection{

	/**
	 * 需要请求的地址
	 * @var [type]
	 */
	public $url;

	/**
	 * 请求类型
	 * @var [type]
	 */
	public $type;

	/**
	 * 初始化数据
	 */
	public function __construct($data = []){
		if($data && isset($data['type'])){
			$this->type = $data['type'];
			$this->url = $this->getUrl($this->type);
		}
	}

	/**
	 * 获取目标采集地址
	 * @param  [type] $type [description]
	 * @return [type]       [description]
	 */
	public function getUrl($type){
		switch ($type) {
			case 'jokeIndex':
			$url = 'http://www.qiushibaike.com/text';
			break;
		}
		return $url;
	}

	/**
	 * 获取数据
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function getData(){
		$hj = QueryList::Query($this->url,$this->createRules($this->type));
		$data = $hj->data;
		return $data;
	}

	/**
	 * 生成采集规则
	 * @param  [type] $ruleType [description]
	 * @return [type]           [description]
	 */
	public function createRules($ruleType){
		switch ($ruleType) {
			case 'jokeIndex':
			$baseUrl = 'http://www.qiushibaike.com';
			$rules = [
				'url' => ['#home div.listArticle article.newArticle div.content-text a','href','',function($content) use ($baseUrl){
					return $baseUrl . $content;
				}],
			];
			break;
			case 'jokeContent':
			$baseUrl = 'http://www.qiushibaike.com';
			$rules = [
				'url' => [],
				'comment_count' => [],
				'hot_comment' => [],
				'hot_comment_count' => [],
				'laud' => [],
				'writer' => [],
				'url' => [],
				'sex' => [],
				'age' => [],
			];
			break;
		}
		return $rules;
	}
}


$model = new Collection($_GET);
$result = $model->getData();
print_r($result);die;
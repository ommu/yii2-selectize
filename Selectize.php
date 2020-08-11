<?php
/**
 * Class Selectize
 * @package ommu\selectize
 *
 * For more details and usage information on Selectize, see the [guide article on Selectize](guide:selectize).
 * @see yii2mod\selectize\Selectize
 * 
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2019 OMMU (www.ommu.id)
 * @created date 29 April 2019, 12:28 WIB
 * @link https://github.com/ommu/yii2-selectize
 *
 */

namespace ommu\selectize;

use yii\helpers\Url;
use yii\web\JsExpression;
use yii\helpers\Json;
use yii2mod\selectize\SelectizeAsset;
use yii\helpers\Inflector;

class Selectize extends \yii2mod\selectize\Selectize
{
	/**
	 * {@inheritdoc}
	 */
	public $cascade = false;

	/**
	 * @var string the parameter name
	 */
	public $queryParam = 'query'; 

	/**
	 * Register client assets
	 */
	protected function registerAssets()
	{
		$view = $this->getView();
		SelectizeAsset::register($view);
		if($this->cascade) {
			$inputIdVar = Inflector::underscore(Inflector::id2camel($this->getInputId()));
			$jsVar = "var $inputIdVar, f_$inputIdVar;";
			$js = "f_$inputIdVar = $('#".$this->getInputId()."').selectize(".$this->getPluginOptions().");\n$inputIdVar = f_".$inputIdVar."[0].selectize;";
			$view->registerJs($jsVar, $view::POS_HEAD);
		} else
			$js = '$("#' . $this->getInputId() . '").selectize(' . $this->getPluginOptions() . ');';
		$view->registerJs($js, $view::POS_END);
	}

	/**
	 * Get plugin options in the json format
	 *
	 * @return string
	 */
	public function getPluginOptions()
	{
		if ($this->url !== null) {
			$url = Url::to($this->url);
			$queryParam = $this->queryParam;
			$this->pluginOptions['load'] = new JsExpression("
				function (query, callback) {
					if (!query.length) return callback();
					$.getJSON('$url', { $queryParam: encodeURIComponent(query) }, function (data) { callback(data); })
					.fail(function () { callback(); });
				}
			");
		}

		return Json::encode($this->pluginOptions);
	}
}

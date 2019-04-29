<?php
/**
 * Class Selectize
 * @package ommu\selectize
 *
 * For more details and usage information on Selectize, see the [guide article on Selectize](guide:selectize).
 * @see yii2mod\selectize\Selectize
 * 
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2019 OMMU (www.ommu.co)
 * @created date 29 April 2019, 12:28 WIB
 * @link https://github.com/ommu/yii2-selectize
 *
 */

namespace ommu\selectize;

use yii2mod\selectize\SelectizeAsset;

class Selectize extends \yii2mod\selectize\Selectize
{
	/**
	 * Register client assets
	 */
	protected function registerAssets()
	{
		$view = $this->getView();
		SelectizeAsset::register($view);
		$js = '$("#' . $this->getInputId() . '").selectize(' . $this->getPluginOptions() . ');';
		$view->registerJs($js, $view::POS_END);
	}
}
